-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS Sql_resto_db;
USE Sql_resto_db;

-- CREATE USER IF NOT EXISTS 'cv-php'@'localhost' IDENTIFIED BY 'password';
-- GRANT ALL PRIVILEGES ON Sql_resto_db.* TO 'cv-php'@'localhost';

-- CREATE TABLES
-- Create clients
CREATE TABLE IF NOT EXISTS Clients(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    lastname VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL
);

-- Create restaurants
CREATE TABLE IF NOT EXISTS Restaurants(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL
);

-- Create food
CREATE TABLE IF NOT EXISTS Food(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    price DOUBLE(8, 2) NOT NULL,
    restaurant_id INT NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES Restaurants(id) on delete cascade
);

-- Create orders
CREATE TABLE IF NOT EXISTS Orders(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    totalPrice INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    commandDetails VARCHAR(255) NOT NULL,
    client_id INT NOT NULL,
    FOREIGN KEY (client_id) REFERENCES Clients(id) on delete cascade,
    restaurant_id INT NOT NULL,
    FOREIGN KEY (restaurant_id) REFERENCES Restaurants(id) on delete cascade
);

-- Create feedbacks
CREATE TABLE IF NOT EXISTS Feedbacks(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rate INT NOT NULL,
    comment VARCHAR(255) NOT NULL,
    order_id INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES Orders(id) on delete cascade
);

-- Create addresses
CREATE TABLE IF NOT EXISTS Addresses(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    client_id INT,
    FOREIGN KEY (client_id) REFERENCES Clients(id) on delete cascade,
    street VARCHAR(255) NOT NULL,
    postal INT NOT NULL,
    city VARCHAR(255) NOT NULL,
    restaurant_id INT,
    FOREIGN KEY (restaurant_id) REFERENCES Restaurants(id) on delete cascade
);