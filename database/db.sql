CREATE TABLE `user` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(255) NOT NULL,
 `mobile_number` varchar(10) NOT NULL,
 `email_address` varchar(255) NOT NULL,
 `password` varchar(255) NOT NULL,
 `activation_code` varchar(255) NOT NULL,
 `confirm_status` int(1) DEFAULT '0',
 PRIMARY KEY (`user_id`)
);

INSERT INTO `user` (`user_id`,`username`,`mobile_number`,`email_address`,`password`,`confirm_status`) VALUES
    (1,'Sujith','9876543210', 'sujithsuji1098@gmail.com', 'c12b240b5710c6c9ee00ef4529803aac', 1),
    (2,'Subramanya','9988776655', 'subramanyarao4@gmail.com', 'a8c6b82ae79f5f29899228ced196b1b7', 1);