-- Add credit_units and grade columns
ALTER TABLE first_year_first_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE first_year_second_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE second_year_first_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE second_year_second_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE third_year_first_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE third_year_second_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE fourth_year_first_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;

ALTER TABLE fourth_year_second_semester
ADD COLUMN credit_units INT,
ADD COLUMN grade FLOAT;
