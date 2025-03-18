CREATE TABLE clients (
    username VARCHAR(32),
    user_email VARCHAR(255),
    pass VARCHAR(32),
    id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE menu (
    item_name VARCHAR(64),
    item_type VARCHAR(16),
    item_price FLOAT UNSIGNED,
    id INT AUTO_INCREMENT PRIMARY KEY
);

-- inicial data to check if tables are working
INSERT INTO clients (username, user_email, pass)
VALUES ('user1', 'aaaaaa@amail.com', 'very_secure_password');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('chesse-burger', 'burger', 15.99);
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('salad-burger', 'burger', 13.99);
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('soda', 'drink', 3.99);
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('french-fries', '', 6.99);