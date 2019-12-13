DROP DATABASE IF EXISTS expenses;
CREATE DATABASE expenses;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(255),
  username VARCHAR(255),
  email VARCHAR(255),
  user_image TEXT,
  user_bio TEXT,
  mobile_number BIGINT,
  hashed_password VARCHAR(255),  
  reg_date TIMESTAMP,  
  PRIMARY KEY (id)
);

CREATE TABLE userexpense (
  id INT(11) NOT NULL AUTO_INCREMENT,
  user_id INT(10),
  expense_date DATE,
  expense_item VARCHAR(255),
  expense_cost VARCHAR(255),
  note_date TIMESTAMP,
  PRIMARY KEY (id),
  KEY fk_user_id (user_id)
);


-- for user dummy data

INSERT INTO users (fullname, username, email, mobile_number, hashed_password, reg_date ) VALUES ('John Taylor', 'john', 'john@gmail.com', '09453567891', 'bdjsbsdgsdg', '2014-05-30 06:06:19');
INSERT INTO users (fullname, username, email, mobile_number, hashed_password, reg_date ) VALUES ('Howard Petersen', 'howard', 'hp_01@gmail.com', '09215678974', 'xssdgsgga', '2015-09-10 09:55:45');

-- for userexpense dummy data

INSERT INTO userexpense (user_id, expense_date, expense_item, expense_cost, note_date) VALUES (2, '2019-12-12', 'Car', '1200', '2019-12-12 10:06:19');
INSERT INTO userexpense (user_id, expense_date, expense_item, expense_cost, note_date) VALUES (2, '2019-12-01', 'Furnitures', '5000', '2019-12-01 05:50:01');
INSERT INTO userexpense (user_id, expense_date, expense_item, expense_cost, note_date) VALUES (2, '2019-12-02', 'Food', '50', '2019-12-02 03:30:09');

INSERT INTO userexpense (user_id, expense_date, expense_item, expense_cost, note_date) VALUES (3, '2019-12-06', 'Milk', '100', '2019-12-06 12:20:45');
INSERT INTO userexpense (user_id, expense_date, expense_item, expense_cost, note_date) VALUES (3, '2019-12-07', 'Vagetables', '70', '2019-12-06 08:10:09');
INSERT INTO userexpense (user_id, expense_date, expense_item, expense_cost, note_date) VALUES (3, '2019-12-08', 'Rent', '75', '2019-12-06 05:36:59');