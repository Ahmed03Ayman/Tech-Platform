CREATE DATABASE IF NOT EXISTS kidlearn_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE kidlearn_db;
-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(20),
    dob DATE,
    gender VARCHAR(10) NOT NULL, -- values: male or female
    password VARCHAR(255) NOT NULL,
    img_url VARCHAR(255) DEFAULT 'default_avatar.png',
    role VARCHAR(20) DEFAULT 'Student', -- values: Student,Admin
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Categories table
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    icon VARCHAR(255)
);
-- Instructors table
CREATE TABLE IF NOT EXISTS instructors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    bio TEXT
);
-- Courses table
CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    category_id INT,
    instructor_id INT,
    duration VARCHAR(50),
    grade_level VARCHAR(50),
    thumbnail_url VARCHAR(255),
    is_free BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
    FOREIGN KEY (instructor_id) REFERENCES instructors(id) ON DELETE SET NULL
);
-- User-Course Table
CREATE TABLE IF NOT EXISTS user_course (
    user_id INT,
    course_id INT,
    enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    progress_percentage INT DEFAULT 0,
    is_completed BOOLEAN DEFAULT FALSE,
    PRIMARY KEY (user_id, course_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);
-- Subscriptions table
CREATE TABLE IF NOT EXISTS subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    plan_duration INT NOT NULL, -- values: 1, 3, or 12 for months
    amount_paid DECIMAL(10, 2) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    status VARCHAR(20) DEFAULT 'Active', -- values: Active, Expired, Cancelled
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
-- Reviews table 
CREATE TABLE IF NOT EXISTS reviews (
    user_id INT,
    course_id INT,
    rating INT, -- values: 1 to 5
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, course_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);
-- Quizzes table
CREATE TABLE IF NOT EXISTS quizzes (
    user_id INT,
    course_id INT,
    score DECIMAL(5,2) DEFAULT 0, -- Max value 100.00%
    passed BOOLEAN DEFAULT FALSE,
    taken_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id, course_id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);
-- Reels table
CREATE TABLE IF NOT EXISTS reels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    video_url VARCHAR(255) NOT NULL,
    thumbnail_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-- Dummy Data for KidLearn Platform
INSERT INTO categories (name, icon) VALUES 
('البرمجة', 'fa-solid fa-code'), 
('التكنولوجيا', 'fa-solid fa-laptop'), 
('الرياضيات', 'fa-solid fa-calculator'), 
('اللغات', 'fa-solid fa-language');
INSERT INTO instructors (name, bio) VALUES 
('أ. أحمد محمود', 'خبير تدريس تكنولوجيا المعلومات للمرحلة الإعدادية.'),
('م. خالد طارق', 'مهندس برمجيات ومدرب معتمد لطلاب المرحلة الثانوية.');
INSERT INTO courses (title, category_id, instructor_id, duration, grade_level, is_free) VALUES 
('مادة التكنولوجيا - الفصل الدراسي الأول', 2, 1, '10h 30m', 'الصف الأول الإعدادي', 0),
('أساسيات البرمجة (Python)', 1, 2, '15h 00m', 'الصف الأول الثانوي', 0),
('مراجعة ليلة الامتحان - رياضيات', 3, 1, '2h 15m', 'الصف الثالث الإعدادي', 1);