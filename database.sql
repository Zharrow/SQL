-- Clients
CREATE TABLE Clients (
  ClientID int NOT NULL AUTO_INCREMENT,
  Lastname varchar(255) NOT NULL,
  Firstname varchar(255) NOT NULL,
  Phone varchar(255) NOT NULL,
  PRIMARY KEY (ClientID)
);

-- Restaurants
CREATE TABLE Restaurants (
  RestaurantID int NOT NULL AUTO_INCREMENT,
  Name varchar(255) NOT NULL,
  AddressID int,
  PRIMARY KEY (RestaurantID),
  FOREIGN KEY (AddressID) REFERENCES Addresses(AddressID)
);

-- Addresses
CREATE TABLE Addresses (
  AddressID int NOT NULL AUTO_INCREMENT,
  Street varchar(255) NOT NULL,
  Postal int NOT NULL,
  City varchar(255) NOT NULL,
  PRIMARY KEY (AddressID)
);

-- Food
CREATE TABLE Food (
  FoodID int NOT NULL AUTO_INCREMENT,
  Name varchar(255) NOT NULL,
  Price float NOT NULL,
  RestaurantID int NOT NULL,
  PRIMARY KEY (FoodID),
  FOREIGN KEY (RestaurantID) REFERENCES Restaurants(RestaurantID)
);

-- Orders
CREATE TABLE Orders (
  OrderID int NOT NULL AUTO_INCREMENT,
  ClientID int NOT NULL,
  RestaurantID int NOT NULL,
  Date date NOT NULL,
  Time time NOT NULL,
  TotalPrice int NOT NULL,
  PRIMARY KEY (OrderID),
  FOREIGN KEY (ClientID) REFERENCES Clients(ClientID),
  FOREIGN KEY (RestaurantID) REFERENCES Restaurants(RestaurantID)
);

-- Command Details
CREATE TABLE CommandDetails (
  OrderID int NOT NULL,
  FoodID int NOT NULL,
  Quantity int NOT NULL,
  FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY (FoodID) REFERENCES Food(FoodID)
);

-- Feedbacks
CREATE TABLE Feedbacks (
  FeedbackID int NOT NULL AUTO_INCREMENT,
  OrderID int NOT NULL,
  ClientID int NOT NULL,
  Rate int NOT NULL,
  Comment varchar(255),
  PRIMARY KEY (FeedbackID),
  FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY (ClientID) REFERENCES Clients(ClientID)
);
