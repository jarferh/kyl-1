ALTER TABLE fellowship_applications
ADD COLUMN state VARCHAR(50) AFTER gender,
ADD COLUMN residential_address TEXT AFTER current_address,
ADD COLUMN employer_name VARCHAR(255) AFTER current_occupation,
ADD COLUMN work_experience TEXT AFTER employer_name,
ADD COLUMN skills_competencies TEXT AFTER volunteer_experience,
ADD COLUMN leadership_roles TEXT AFTER skills_competencies,
ADD COLUMN challenge_description TEXT AFTER why_fellowship,
ADD COLUMN fellowship_goals TEXT AFTER challenge_description,
ADD COLUMN skills_application TEXT AFTER fellowship_goals,
ADD COLUMN can_accommodate VARCHAR(10) AFTER skills_application,
ADD COLUMN video_path VARCHAR(255) AFTER can_accommodate,
ADD COLUMN passport_photo_path VARCHAR(255) AFTER video_path;

-- Rename some existing columns to match new names
ALTER TABLE fellowship_applications
CHANGE COLUMN field_of_study course_of_study VARCHAR(255);
