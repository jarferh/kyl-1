-- Create batches table
CREATE TABLE batches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    application_start DATETIME NOT NULL,
    application_end DATETIME NOT NULL,
    status ENUM('pending', 'open', 'closed') DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Add batch_id to fellowship_applications table
ALTER TABLE fellowship_applications 
ADD COLUMN batch_id INT,
ADD CONSTRAINT fk_batch
FOREIGN KEY (batch_id)
REFERENCES batches(id)
ON DELETE SET NULL;
