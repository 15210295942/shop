CREATE DATABASE go4shop;

USE go4shop;

CREATE TABLE admin(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`username` VARCHAR(100) NOT NULL,
`password` VARCHAR(40) NOT NULL
)
ENGINE = InnoDB;


CREATE TABLE categories(
`id` TINYINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(100) NOT NULL) ENGINE = InnoDB;

CREATE TABLE customers(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`forname` VARCHAR(50) NOT NULL,
`surname` VARCHAR(50) NOT NULL,
`add1` VARCHAR(50) NOT NULL,
`add2` VARCHAR(50) NOT NULL,
`add3` VARCHAR(50) NOT NULL,
`postcode` VARCHAR(10) NOT NULL,
`phone` VARCHAR(20) NOT NULL,
`email` VARCHAR(150) NOT NULL,
`registered` TINYINT NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE delivery_addresses(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`forname` VARCHAR(50) NOT NULL,
`surname` VARCHAR(50) NOT NULL,
`add1` VARCHAR(50) NOT NULL,
`add2` VARCHAR(50) NOT NULL,
`add3` VARCHAR(50) NOT NULL,
`postcode` VARCHAR(10) NOT NULL,
`phone` VARCHAR(20) NOT NULL,
`email` VARCHAR(150) NOT NULL
)
ENGINE = InnoDB;

CREATE TABLE logins(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`customer_id` INT NOT NULL,
`username` VARCHAR(100) NOT NULL,
`password` VARCHAR(40) NOT NULL
)
ENGINE = InnoDB;


CREATE TABLE orderitems(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`order_id` INT NOT NULL,
`product_id` INT NOT NULL,
`quantity` INT NOT NULL
)
ENGINE = InnoDB;


CREATE TABLE orders(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`customer_id` INT NOT NULL,
`registered` INT NOT NULL,
`delivery_add_id` INT NOT NULL,
`payment_type` INT NOT NULL,
`date` DATETIME NOT NULL,
`status` TINYINT NOT NULL,
`session` VARCHAR(100) NOT NULL,
`total` FLOAT NOT NULL)
ENGINE = InnoDB;

CREATE TABLE products (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`cat_id` TINYINT NOT NULL,
`name` VARCHAR(150) NOT NULL,
`description` TEXT NOT NULL,
`image` VARCHAR(30) NOT NULL,
`price` FLOAT NOT NULL
)ENGINE = InnoDB;




INSERT INTO admin (`id`, `username`, `password`)
VALUES (NULL, 'admin', 'admin');

INSERT INTO categories(`id`, `name`)
VALUES (NULL, 'beverages'),
(NULL, 'cakes');

INSERT INTO customers (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`)
VALUES (NULL, 'Jack', 'zhao', 'Dhaka, Bangladesh', 'Gulshan 1', 'dkjf, lksd kl', '1200', '9879797', 'zhao@gmail.com', '1'), (NULL, 'Mike', 'wang', 'Dhaka', 'Coxbazar', 'Gulshan', '9879', '9898797', 'wang@gmail.com', '1');

INSERT INTO `go4shop`.`logins` (`id`, `customer_id`, `username`, `password`)
VALUES (NULL, '1', 'zhao', 'zhao'), (NULL, '2', 'wang', 'wang');

INSERT INTO products(`id`, `cat_id`, `name`, `description`, `image`, `price`)
VALUES (NULL, '1', 'Best Bags', 'A quality pack of tea bags.200 bags in each box', '', '2.99'),
(NULL, '1', 'Best Orange Juice', 'One gallon of quality sequeezed orange juice.', 'bestorange-juice.jpg', '0.9');

