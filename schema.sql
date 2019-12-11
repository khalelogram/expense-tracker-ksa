DROP DATABASE IF EXISTS expenses;
CREATE DATABASE expenses;

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(255),
  username VARCHAR(255),
  email VARCHAR(255),
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


-- for dummy data try this

INSERT INTO users (fullname, username, email, mobile_number, hashed_password, reg_date ) VALUES ('John Taylor', 'john', 'john@gmail.com', '09453567891', 'bdjsbsdgsdg', 'now()');
INSERT INTO users (fullname, username, email, mobile_number, hashed_password, reg_date ) VALUES ('Howard Petersen', 'howard', 'hp_01@gmail.com', '09215678974', 'xssdgsgga', 'now()');
