CREATE TABLE clients (
    username VARCHAR(32),
    user_email VARCHAR(255),
    pass VARCHAR(32),
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(32)
);


INSERT INTO clients (username, user_email, pass, token)
VALUES ('user1', 'aaa', 'pass', 'toktok');
