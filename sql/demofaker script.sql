CREATE DATABASE DEMOFAKER;

USE DEMOFAKER;

-- Office Table (Created First to Avoid Foreign Key Issues)
CREATE TABLE office (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    contactnum VARCHAR(20),
    email VARCHAR(100),
    address VARCHAR(255),
    city VARCHAR(100),
    country VARCHAR(50),
    postal VARCHAR(20)
);

-- Employee Table (Now office_id Can Reference office.id)
CREATE TABLE employee (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(50),
    firstname VARCHAR(50),
    office_id INT,
    address VARCHAR(255),
    FOREIGN KEY (office_id) REFERENCES office(id) ON DELETE SET NULL
);

-- Transaction Table
CREATE TABLE transaction (
    id INT AUTO_INCREMENT PRIMARY KEY,
    employee_id INT,
    office_id INT,
    datelog DATE,
    action VARCHAR(255),
    remarks TEXT,
    documentcode VARCHAR(50),
    FOREIGN KEY (employee_id) REFERENCES employee(id) ON DELETE CASCADE,
    FOREIGN KEY (office_id) REFERENCES office(id) ON DELETE CASCADE
);
