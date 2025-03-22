INSERT INTO clients (username, user_email, pass)
VALUES ('user1', 'aaaaaa@amail.com', 'very_secure_password');

-- burgers
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Chesse-Burger', 'Burgers', 12.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), 'A very chessy burger with a extra succulent patty, sandwitched between 2 slices of cheddar and caramel onion. With our special chesse-burger burger bread.');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Salad-Burger', 'Burgers', 13.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Bacon-Burger', 'Burgers', 13.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Barbecue-Bacon-Burger', 'Burgers', 13.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Burger-Burger-Burger', 'Burgers', 18.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Fruity-Burger', 'Burgers', 14.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

-- drinks
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Coke', 'Drinks', 1.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Orange Soda', 'Drinks', 1.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Orange juice', 'Drinks', 1.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Tap Water', 'Drinks', 1.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), 'Our water comes from the very fresh public water supply, slighty warm yet refreshing, this cup of water is garuanteed to redritate you and your gut.');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Glue', 'Drinks', 3.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

-- dessert
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Ice-Cream', 'Dessert', 4.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

-- side meal
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('French Fries', 'Side-Meal', 7.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Fried Chicken', 'Side-Meal', 6.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Chicken Nuggets', 'Side-Meal', 6.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');

-- others
INSERT INTO menu (item_name, item_type, item_price)
VALUES ('Bat-Soup', '', 20.99);
INSERT INTO menu_description (id, content) 
VALUES (LAST_INSERT_ID(), '');
