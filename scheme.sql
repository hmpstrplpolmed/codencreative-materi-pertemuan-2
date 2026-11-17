CREATE DATABASE IF NOT EXISTS db_kampus;
USE db_kampus;

CREATE TABLE IF NOT EXISTS mahasiswa (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  nim VARCHAR(20) NOT NULL,
  jurusan VARCHAR(100) NOT NULL
);

INSERT INTO mahasiswa (nama, nim, jurusan) VALUES
('Andi',  '24001', 'TRPL'),
('Budi',  '24002', 'TRPL'),
('Citra', '24003', 'TRPL');
