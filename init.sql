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
CREATE TABLE menu_description (
    id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES menu(id) ON DELETE CASCADE,
    content TEXT
);