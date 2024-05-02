# library
АИС для работы с клиентами Библиотеки.<br>
SQL-скрипт<br>
<pre>CREATE DATABASE library;
USE library;
CREATE TABLE readers(
reader_id INT NOT NULL AUTO_INCREMENT,
first_name VARCHAR(20) NOT NULL,
second_name VARCHAR(20) NOT NULL,
last_name VARCHAR(20) NOT NULL,
birthday DATE NOT NULL,
address VARCHAR(50) NOT NULL,
telephone VARCHAR(20) NOT NULL,
PRIMARY KEY (reader_id)
);

INSERT INTO readers (first_name, second_name, last_name, birthday, address, telephone)
VALUES
('Екатерина', 'Константиновна', 'Петрова', '2009-08-22', 'бульвар Косиора', '74371396672'),
('Григорий', 'Николаевич', 'Дроздов', '2005-03-24', 'пер Косиора', '7436015999'),
('Артём', 'Даниилович', 'Абрамов', '2010-05-15', 'наб Славы', '7134814457');

CREATE TABLE books(
book_id INT NOT NULL AUTO_INCREMENT,
book_name VARCHAR(100) NOT NULL,
author VARCHAR(50) NOT NULL,
publishing_year YEAR NOT NULL,
genre VARCHAR(20) NOT NULL,
publishing VARCHAR(50) NOT NULL,
PRIMARY KEY (book_id)
);

INSERT INTO books (book_name, author, publishing_year, genre, publishing)
VALUES
('La Tortilla Macaco', 'Merle Prado Menendez', '1977', 'Геология', 'Línea Editorial'),
('La Redención Monarca', 'Noah Caban Maldonado', '1999', 'Научная фантастика', 'Editorial Forja'),
('El Mercado Karateca', 'Tor Becerra Delagarza', '2005', 'Юмор', 'Ediciones Geo');

CREATE TABLE subscriptions(
subscription_id INT NOT NULL AUTO_INCREMENT,
reader_id INT,
book_id INT,
CONSTRAINT FK_1 FOREIGN KEY (reader_id) REFERENCES readers(reader_id) ON DELETE CASCADE ON UPDATE CASCADE,
CONSTRAINT FK_2 FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE ON UPDATE CASCADE,
subscription_date DATE NOT NULL,
PRIMARY KEY (subscription_id)</pre>
);

INSERT INTO subscriptions (reader_id, book_id, subscription_date)
VALUES
('1', '2', '2022-05-24'),
('3', '1', '2023-06-28'),
('2', '3', '2021-04-15');
