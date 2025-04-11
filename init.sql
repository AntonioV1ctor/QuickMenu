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
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE menu_description (
    id INT,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES menu(id) ON DELETE CASCADE,
    content TEXT,
    ingredients TEXT,
    image_path VARCHAR(255)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    user_id INT,
    user_note VARCHAR(200)
);
CREATE TABLE order_items (
    order_id INT,
    item_id INT,
    quantity INT,
    PRIMARY KEY (order_id, item_id),
    FOREIGN KEY (order_id) REFERENCES orders(id)  -- Linking back to the orders table
);
