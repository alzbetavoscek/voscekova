CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE kategoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazov VARCHAR(50) NOT NULL
);

CREATE TABLE knihy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nauov VARCHAR(100) NOT NULL,
    autor VARCHAR(100),
    kategoria_id INT,
    FOREIGN KEY (kategoria_id) REFERENCES kategoria(id)
);

INSERT INTO kategoria (nazov) VALUES ('Fantasy'), ('Detektívka'), ('Odborná literatúra');
INSERT INTO knihy (nazov, autor, kategoria_id) VALUES 
('Harry Potter a Kameň mudrcov', 'J.K. Rowling', 1),
('Sherlock Holmes: Štúdia v šarlátovej', 'Arthur Conan Doyle', 2),
('Čistý kód', 'Robert C. Martin', 3);