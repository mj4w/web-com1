
ALTER TABLE first_year_first_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE first_year_second_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE second_year_first_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE second_year_second_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE third_year_first_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE third_year_second_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE fourth_year_first_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;

ALTER TABLE fourth_year_second_semester
MODIFY COLUMN earned_units FLOAT GENERATED ALWAYS AS (IF(grade <= 3.00, credit_units, 0)) STORED;
