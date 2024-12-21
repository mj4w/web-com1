CREATE DATABASE college_courses;

USE college_courses;

CREATE TABLE first_year_first_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);

INSERT INTO first_year_first_semester (course_code, course_title) VALUES
('UTS 101', 'Understanding the Self'),
('STS 101', 'Science, Technology and Society'),
('PCM 101', 'Purposive Communication'),
('BSP 113', 'Basic Shop Practice'),
('CT 102', 'Operating Systems Concept and Configuration'),
('CSA 113', 'Computer Software Application'),
('IIT 112', 'Introduction to Industrial Technology'),
('PE 10', 'PATHFit 1'),
('NSTP 10', 'National Service Training Program 1');


CREATE TABLE first_year_second_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);
INSERT INTO first_year_second_semester (course_code, course_title) VALUES
('RPH 101', 'Readings in Philippine History'),
('AAP 101', 'Art Appreciation'),
('PID 101', 'Pagsasalin sa Iba’t Ibang Disiplina'),
('CT 103', 'Computer Programming'),
('CT 104', 'Logic Circuit Operation and Analysis'),
('CT 105', 'Electronics for Computer Technology'),
('PE 11', 'PATHFit 2'),
('NSTP 11', 'National Service Training Program 2');



CREATE TABLE second_year_first_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);

INSERT INTO second_year_first_semester (course_code, course_title) VALUES
('PAL 101', 'Panitikan at Lipuna'),
('TCW 101', 'The Contemporary World'),
('OSH 122', 'Occupational Safety and Health'),
('MMW 101', 'Mathematics in the Modern World'),
('FL 323', 'Foreign Language I'),
('AAH 101', 'Reading Visual Art'),
('CT 201', 'Computer Networking I'),
('CT 202', 'Computer Hardware Servicing and Maintenance'),
('PE 12', 'PATHFit 3');


CREATE TABLE second_year_second_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);

INSERT INTO second_year_second_semester (course_code, course_title) VALUES
('MST 101a', 'Environmental Science'),
('SSP 101d', 'The Entrepreneurial Mind'),
('HRM 223', 'Human Resource Management'),
('CT 203', 'Computer Programming 2'),
('CT 204', 'Database Management System'),
('PE 13', 'PATHFit 4');


CREATE TABLE third_year_first_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);
INSERT INTO third_year_first_semester (course_code, course_title) VALUES
('SFT 313', 'Statistics for Technology'),
('SM 313', 'Strategic Management in Computer Technology'),
('ETH 101', 'Ethics'),
('PVS 222', 'Plant Visit and Seminar'),
('TG 113', 'Technical Graphics'),
('CT 301', 'Computer Programming 3'),
('CT 302', 'Database Management System 2'),
('CT 303', 'Embedded System');

CREATE TABLE third_year_second_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);

INSERT INTO third_year_second_semester (course_code, course_title) VALUES
('TR 313', 'Technology Research'),
('TQM 223', 'Total Quality Management'),
('TE 323', 'Technopreneurship'),
('EWM 213', 'Environmental and Waste Management'),
('CT 304', 'Industrial Interface Design and Development'),
('CT 305', 'Computer Programming 4'),
('CT 306', 'Computer Networking 2');

CREATE TABLE fourth_year_first_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);

INSERT INTO fourth_year_first_semester (course_code, course_title) VALUES
('RLW 101', 'Life and Works of Rizal'),
('FL 413', 'Foreign Language II'),
('TR 323', 'Technology Research'),
('CT 413', 'Embedded System II'),
('IPR 313', 'Intellectual Property Rights'),
('CT 414', 'Operating System Administration and Management'),
('CT 415', 'Industrial Interface Design and Development 2');

CREATE TABLE fourth_year_second_semester (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(10),
    course_title VARCHAR(255)
);

INSERT INTO fourth_year_second_semester (course_code, course_title) VALUES
('SIP', 'Student Internship Program');
