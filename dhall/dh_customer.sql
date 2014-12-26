
CREATE TABLE `dh_customer`(
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL UNIQUE,
  `customer_place` varchar(20) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar (50) NOT NULL,
   PRIMARY KEY (`customer_id`)
   );
