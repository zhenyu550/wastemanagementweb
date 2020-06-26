CREATE TABLE transaction_bin (
  transaction_id int(20) NOT NULL AUTO_INCREMENT,
  bin_id int(20) NOT NULL,
  weight decimal(10,3) DEFAULT 0,
  PRIMARY KEY(transaction_id, bin_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE waste_type (
  id int(20) NOT NULL AUTO_INCREMENT,
  name varchar(30)  NOT NULL,
   PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;