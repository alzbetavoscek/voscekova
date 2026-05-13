CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE kategoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazov VARCHAR(50) NOT NULL
);

CREATE TABLE knihy (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazov VARCHAR(100) NOT NULL,
    autor VARCHAR(100),
    pocet_stran INT,
    hodnotenie INT CHECK (hodnotenie >= 1 AND hodnotenie <= 5),
    stav ENUM('prečítané', 'rozčítané', 'neprečítané') DEFAULT 'neprečítané',
    datum_pridania TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    kategoria_id INT,
    FOREIGN KEY (kategoria_id) REFERENCES kategoria(id)
);

INSERT INTO kategoria (nazov) VALUES ('Fantasy'), ('Detektívka'), ('Odborná literatúra');
INSERT INTO knihy (nazov, autor, pocet_stran, hodnotenie, stav, kategoria_id) VALUES 
('Harry Potter a Kameň mudrcov', 'J.K. Rowling', 309, 5, 'prečítané', 1),
('Sherlock Holmes: Štúdia v šarlátovej', 'Arthur Conan Doyle', 256, 4, 'rozčítané', 2),
('Čistý kód', 'Robert C. Martin', 464, 5, 'neprečítané', 3);