-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS Sql_resto_db;
USE Sql_resto_db;


-- CREATE TABLES
-- Create clients
CREATE TABLE `Clients`(
    `ClientID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Lastname` VARCHAR(255) NOT NULL,
    `Firstname` VARCHAR(255) NOT NULL,
    `Phone` VARCHAR(255) NOT NULL
);

-- Create food
CREATE TABLE `Food`(
    `FoodID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Name` VARCHAR(255) NOT NULL,
    `Price` DOUBLE(8, 2) NOT NULL,
    `Restaurant_ID` INT NOT NULL
);

-- Create orders
CREATE TABLE `Orders`(
    `OrderID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `TotalPrice` INT NOT NULL,
    `Date` DATE NOT NULL,
    `Time` TIME NOT NULL,
    `CommandDetails` VARCHAR(255) NOT NULL,
    `Client_ID` INT NOT NULL,
    `Restaurant_ID` INT NOT NULL
);

-- Create feedbacks
CREATE TABLE `Feedbacks`(
    `FeedbackID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Rate` INT NOT NULL,
    `Comment` VARCHAR(255) NOT NULL,
    `Order_ID` INT NOT NULL
);

-- Create addresses
CREATE TABLE `Addresses`(
    `AddressID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Client_ID` INT NULL,
    `Street` VARCHAR(255) NOT NULL,
    `Postal` INT NOT NULL,
    `City` VARCHAR(255) NOT NULL,
    `Restaurant_ID` INT NULL
);

-- Create restaurants
CREATE TABLE `Restaurants`(
    `RestaurantID` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `Name` VARCHAR(255) NOT NULL
);

-- Alter for foreign key
ALTER TABLE
    `Addresses` ADD CONSTRAINT `addresses_client_id_foreign` FOREIGN KEY(`Client_ID`) REFERENCES `Clients`(`ClientID`);
ALTER TABLE
    `Orders` ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY(`Client_ID`) REFERENCES `Clients`(`ClientID`);
ALTER TABLE
    `Orders` ADD CONSTRAINT `orders_restaurant_id_foreign` FOREIGN KEY(`Restaurant_ID`) REFERENCES `Restaurants`(`RestaurantID`);
ALTER TABLE
    `Feedbacks` ADD CONSTRAINT `feedbacks_order_id_foreign` FOREIGN KEY(`Order_ID`) REFERENCES `Orders`(`OrderID`);
ALTER TABLE
    `Addresses` ADD CONSTRAINT `addresses_restaurant_id_foreign` FOREIGN KEY(`Restaurant_ID`) REFERENCES `Restaurants`(`RestaurantID`);
ALTER TABLE
    `Food` ADD CONSTRAINT `food_restaurant_id_foreign` FOREIGN KEY(`Restaurant_ID`) REFERENCES `Restaurants`(`RestaurantID`);
