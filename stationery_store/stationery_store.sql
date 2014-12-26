
CREATE TABLE `stationery_customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  UNIQUE KEY `customer_name` (`customer_name`)
);

CREATE TABLE `stationery_issue` (
  `iss_id` int(10) NOT NULL AUTO_INCREMENT,
  `iss_date` date NOT NULL,
  `iss_items` int(10) NOT NULL,
  `iss_qty` decimal(10,3) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `iss_remark` varchar(100) NOT NULL,
  `by_user` varchar(50) NOT NULL,
  `ip_1` varchar(50) NOT NULL,
  `iss_rate` decimal(10,2) NOT NULL,
  `customer_type` varchar(20) NOT NULL,
  `requisition_no` int(10) NOT NULL,
  PRIMARY KEY (`iss_id`)
);


CREATE TABLE `stationery_purchase` (
  `pr_id` int(10) NOT NULL AUTO_INCREMENT,
  `pr_date` date NOT NULL,
  `pr_items` int(10) NOT NULL,
  `pr_qty` decimal(10,3) NOT NULL,
  `supplier_name` varchar(150) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_no` varchar(20) NOT NULL,
  `pr_remark` varchar(100) NOT NULL,
  `by_user` varchar(50) NOT NULL,
  `ip_1` varchar(50) NOT NULL,
  `pr_rate` decimal(10,2) NOT NULL,
  `pr_vat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pindt_no` int(10) NOT NULL,
  PRIMARY KEY (`pr_id`)
);


CREATE TABLE `stationery_stock` (
  `st_id` int(10) NOT NULL AUTO_INCREMENT,
  `st_date` date NOT NULL,
  `st_items` varchar(50) NOT NULL,
  `st_qty` decimal(10,3) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `rate` decimal(15,2) NOT NULL DEFAULT '0.00',
  `st_remark` varchar(100) DEFAULT NULL,
  `min_stock` decimal(10,3) NOT NULL,
  `sell_rate` decimal(10,2) NOT NULL,
  PRIMARY KEY (`st_id`),
  UNIQUE KEY `st_items` (`st_items`)
);


 CREATE TABLE `stationery_supplier` (
  `supplier_id` int(10) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_contact` varchar(20) DEFAULT NULL,
  `supplier_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
);

