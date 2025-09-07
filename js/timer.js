document.addEventListener('DOMContentLoaded', function() {
    fetchTimer();
    // Update timer every second
    setInterval(updateTimer, 1000);
});

function fetchTimer() {
    fetch('get_active_timer.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('countdown-title').textContent = data.data.title + ' Starting In:';
                document.getElementById('countdown-card').style.display = 'block';
                updateTimer(new Date(data.data.event_datetime));
            } else {
                document.getElementById('countdown-card').style.display = 'none';
            }
        })
        .catch(error => {
            console.error('Error fetching timer:', error);
            document.getElementById('countdown-card').style.display = 'none';
        });
}

function updateTimer() {
    fetch('get_active_timer.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const eventDate = new Date(data.data.event_datetime);
                const now = new Date();
                const diff = eventDate - now;

                if (diff > 0) {
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

                    document.getElementById('days').textContent = String(days).padStart(2, '0');
                    document.getElementById('hours').textContent = String(hours).padStart(2, '0');
                    document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
                    document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
                } else {
                    document.getElementById('countdown-card').style.display = 'none';
                }
            }
        })
        .catch(error => console.error('Error updating timer:', error));
}
