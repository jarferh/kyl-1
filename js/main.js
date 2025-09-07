// Mobile Menu Toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mainNav = document.getElementById('mainNav');

mobileMenuBtn.addEventListener('click', () => {
    mainNav.classList.toggle('active');
    mobileMenuBtn.innerHTML = mainNav.classList.contains('active') ?
        '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>';
});

// Scroll Header Effect
const header = document.getElementById('header');

window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Aims Toggle
const aimsToggleBtns = document.querySelectorAll('.aims-toggle button');

aimsToggleBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        // Remove active class from all buttons and content
        document.querySelector('.aims-toggle button.active').classList.remove('active');
        document.querySelector('.aims-content.active').classList.remove('active');

        // Add active class to clicked button and corresponding content
        btn.classList.add('active');
        const lang = btn.getAttribute('data-lang');
        document.getElementById(`${lang}-aims`).classList.add('active');
    });
});

// Scroll Animation
const fadeElements = document.querySelectorAll('.fade-in');

const fadeInOnScroll = () => {
    fadeElements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (elementTop < windowHeight - 100) {
            element.classList.add('visible');
        }
    });
};

window.addEventListener('scroll', fadeInOnScroll);
window.addEventListener('load', fadeInOnScroll);

// Form Submission
const volunteerForm = document.getElementById('volunteerForm');
const contactForm = document.getElementById('contactForm');

// Google Apps Script Web App URLs
const GOOGLE_SHEET_URL = 'https://script.google.com/macros/s/AKfycbwOjUiss76xxbYIIDOe8yaRNBgkfJYyTxR2es1yH7BT702HDXLrjCaS1GobxIrZCvt-0Q/exec';
const CONTACT_FORM_URL = 'https://script.google.com/macros/s/AKfycbw3ackhF2ltd7cJ_E9SV3WTGyHdBc7A6am48dNImsmJRVxa1eP9dYtvXvcnmoGs-54Y/exec';

volunteerForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const submitBtn = volunteerForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Loading...';
    submitBtn.disabled = true;
    const formData = new FormData(volunteerForm);
    try {
        await fetch(GOOGLE_SHEET_URL, {
            method: 'POST',
            body: formData
        });
        alert('Thank you for your interest! We will get back to you soon.');
        volunteerForm.reset();
    } catch (error) {
        alert('An error occurred. Please try again later.');
        volunteerForm.reset();
    } finally {
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    }
});

// Close mobile menu when clicking a link
const navLinks = document.querySelectorAll('nav ul li a');

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        mainNav.classList.remove('active');
        mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
    });
});
