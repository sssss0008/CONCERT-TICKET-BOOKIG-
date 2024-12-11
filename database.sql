CREATE DATABASE concert_booking;

USE concert_booking;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    phone VARCHAR(15)
);

CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    seat_type VARCHAR(50),
    quantity INT,
    total_price INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
