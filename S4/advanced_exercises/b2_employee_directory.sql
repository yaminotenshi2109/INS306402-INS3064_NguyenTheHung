-- B2: Employee Directory - ENUM & Salary Precision
-- Create an employees table with the right types for HR data.

USE library_db;

CREATE TABLE IF NOT EXISTS employees (
    id          INT           NOT NULL AUTO_INCREMENT,
    full_name   VARCHAR(150)  NOT NULL,
    email       VARCHAR(255)  NOT NULL UNIQUE,
    phone       VARCHAR(20),
    department  ENUM(
                    'Engineering',
                    'Marketing',
                    'Sales',
                    'Human Resources',
                    'Finance',
                    'Operations',
                    'Legal',
                    'Customer Support'
                ) NOT NULL,
    job_title   VARCHAR(100),
    salary      DECIMAL(15,2) NOT NULL,           -- DECIMAL avoids floating-point rounding errors
    hire_date   DATE          NOT NULL,            -- DATE stores only the calendar date, no time
    is_active   BOOLEAN       NOT NULL DEFAULT TRUE,
    PRIMARY KEY (id),
    CONSTRAINT chk_salary_positive CHECK (salary >= 0)
);
