CREATE DATABASE omcms;

USE omcms;

CREATE TABLE users(
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    email VARCHAR(100),
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20)
);

CREATE TABLE clients(
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    business_type VARCHAR(50)
);

CREATE TABLE campaigns(
    campaign_id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT,
    campaign_name VARCHAR(100),
    platform VARCHAR(50),
    budget DECIMAL(10,2),
    start_date DATE,
    end_date DATE,

    FOREIGN KEY(client_id)
    REFERENCES clients(client_id)
);

CREATE TABLE performance(
    performance_id INT AUTO_INCREMENT PRIMARY KEY,
    campaign_id INT,
    clicks INT,
    leads INT,
    sales INT,
    record_date DATE,

    FOREIGN KEY(campaign_id)
    REFERENCES campaigns(campaign_id)
);
CREATE TABLE performance(

performance_id INT
AUTO_INCREMENT PRIMARY KEY,

campaign_id INT,

clicks INT,

leads INT,

sales INT,

record_date DATE,

FOREIGN KEY(campaign_id)
REFERENCES campaigns(campaign_id)

);
