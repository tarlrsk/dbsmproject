-- Create Table for Buyer data

CREATE TABLE `buyer_tb` (
  `buyer_id` int(11) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(50) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_pass` varchar(50) NOT NULL,
  `buyer_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`buyer_id`),
  UNIQUE KEY `buyer_phone` (`buyer_phone`),
  UNIQUE KEY `buyer_email` (`buyer_email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


-- Create Table for seller data

CREATE TABLE `seller_tb` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(50) NOT NULL,
  `seller_email` varchar(50) NOT NULL,
  `seller_pass` varchar(50) NOT NULL,
  `seller_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`seller_id`),
  UNIQUE KEY `seller_phone` (`seller_phone`),
  UNIQUE KEY `seller_email` (`seller_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Create Table for mechanic data
CREATE TABLE `mechanic_tb` (
  `mechanic_id` int(11) NOT NULL AUTO_INCREMENT,
  `mechanic_name` varchar(50) NOT NULL,
  `mechanic_email` varchar(50) NOT NULL,
  `mechanic_pass` varchar(50) NOT NULL,
  `mechanic_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`mechanic_id`),
  UNIQUE KEY `mechanic_phone` (`mechanic_phone`),
  UNIQUE KEY `mechanic_email` (`mechanic_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Create Table for car data
CREATE TABLE `car_tb` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_img` text NOT NULL,
  `car_brand` varchar(20) NOT NULL,
  `car_model` varchar(20) NOT NULL,
  `car_year` year(4) NOT NULL,
  `car_mileage` int(11) NOT NULL,
  `car_location` varchar(50) NOT NULL,
  `car_seat` int(11) NOT NULL,
  `car_gear` varchar(20) NOT NULL,
  `car_engine` varchar(20) NOT NULL,
  `car_fuel` varchar(20) NOT NULL,
  `car_price` int(11) NOT NULL,
  `car_des` text NOT NULL,
  `seller_id` int(11) NOT NULL,
  `car_status` varchar(15) NOT NULL,
  `car_list_date` date NOT NULL,
  PRIMARY KEY (`car_id`),
  KEY `seller_id` (`seller_id`),
  CONSTRAINT `car_tb_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller_tb` (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;


-- Create Table for seller appointment slot for each vehicle
CREATE TABLE `seller_slot_tb` (
  `seller_slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_slot_date` date NOT NULL,
  `seller_slot_status` tinyint(1) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  PRIMARY KEY (`seller_slot_id`),
  KEY `seller_id` (`seller_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `seller_slot_tb_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `seller_tb` (`seller_id`),
  CONSTRAINT `seller_slot_tb_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `car_tb` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Create Table for mechanic appointment slot for each buyer

CREATE TABLE `mechanic_slot_tb` (
  `mechanic_slot_id` int(11) NOT NULL AUTO_INCREMENT,
  `mechanic_slot_date` date NOT NULL,
  `mechanic_slot_status` tinyint(1) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `mechanic_price` int(11) NOT NULL,
  PRIMARY KEY (`mechanic_slot_id`),
  KEY `mechanic_id` (`mechanic_id`),
  CONSTRAINT `mechanic_slot_tb_ibfk_1` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanic_tb` (`mechanic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


-- Create tabel for each appointment data
CREATE TABLE `appoint_tb` (
  `appoint_id` int(11) NOT NULL AUTO_INCREMENT,
  `appoint_date` date NOT NULL,
  `car_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `mechanic_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) NOT NULL,
  `seller_status` tinyint(1) NOT NULL,
  `mechanic_status` tinyint(1) DEFAULT NULL,
  `buyer_status` tinyint(1) NOT NULL,
  `mechanic_advise` tinyint(1) DEFAULT NULL,
  `mechanic_slot_id` int(11) DEFAULT NULL,
  `appoint_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`appoint_id`),
  KEY `car_id` (`car_id`),
  KEY `seller_id` (`seller_id`),
  KEY `mechanic_id` (`mechanic_id`),
  KEY `mechanic_slot_id` (`mechanic_slot_id`),
  KEY `buyer_id` (`buyer_id`),
  CONSTRAINT `appoint_tb_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car_tb` (`car_id`),
  CONSTRAINT `appoint_tb_ibfk_2` FOREIGN KEY (`seller_id`) REFERENCES `seller_tb` (`seller_id`),
  CONSTRAINT `appoint_tb_ibfk_3` FOREIGN KEY (`mechanic_slot_id`) REFERENCES `mechanic_slot_tb` (`mechanic_slot_id`),
  CONSTRAINT `appoint_tb_ibfk_4` FOREIGN KEY (`buyer_id`) REFERENCES `buyer_tb` (`buyer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;



-- REGISTER THE SELLER
/* INSERT INTO seller_tb (seller_name, seller_email, seller_pass, seller_phone ) 
                  VALUES('$name', '$email', '$password', '$phone')"; */

-- REGISTER THE BUY
/* INSERT INTO buyer_tb (buyer_name, buyer_email, buyer_pass, buyer_phone ) 
                  VALUES('$name', '$email', '$password', '$phone')"; */
          
-- REGISTER THE MECHANIC
/* INSERT INTO mechanic_tb (mechanic_name, mechanic_email, mechanic_pass, mechanic_phone ) 
                  VALUES('$name', '$email', '$password', '$phone')";         */         

-- LOGIN
/* $query_buyer = "SELECT * FROM buyer_tb WHERE buyer_email='$email' AND buyer_pass='$password'";
$query_seller = "SELECT * FROM seller_tb WHERE seller_email='$email' AND seller_pass='$password'";
$query_mechanic = "SELECT * FROM mechanic_tb WHERE mechanic_email='$email' AND mechanic_pass='$password'"; */

