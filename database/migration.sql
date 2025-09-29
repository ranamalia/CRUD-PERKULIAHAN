-- Database Migration for Perkuliahan System
-- Create database if not exists
CREATE DATABASE IF NOT EXISTS Perkuliahan1;
USE Perkuliahan1;

-- Drop tables if exists (for clean migration)
DROP TABLE IF EXISTS Kuliah;
DROP TABLE IF EXISTS MataKuliah;
DROP TABLE IF EXISTS Dosen;
DROP TABLE IF EXISTS Mhs;

-- Create Mhs table
CREATE TABLE Mhs(
    NIM CHAR(10) PRIMARY KEY,
    Nama_Mhs VARCHAR(50) NOT NULL,
    Alamat_Mhs VARCHAR(100)
);

-- Create MataKuliah table
CREATE TABLE MataKuliah(
    KodeMatkul CHAR(10) PRIMARY KEY,
    NamaMatkul VARCHAR(50) NOT NULL,
    SKS INT NOT NULL,
    Semester INT NOT NULL
);

-- Create Dosen table
CREATE TABLE Dosen (
    NIP CHAR(10) PRIMARY KEY,
    Nama_Dosen VARCHAR(50) NOT NULL,
    Alamat_Dosen VARCHAR(100)
);

-- Create Kuliah table (transaction table)
CREATE TABLE Kuliah (
    NIM CHAR(10),
    NIP CHAR(10),
    KodeMatkul CHAR(10),
    Nilai CHAR(2),
    PRIMARY KEY (NIM, KodeMatkul),
    FOREIGN KEY (NIM) REFERENCES Mhs (NIM) ON DELETE CASCADE,
    FOREIGN KEY (NIP) REFERENCES Dosen (NIP) ON DELETE CASCADE,
    FOREIGN KEY (KodeMatkul) REFERENCES MataKuliah (KodeMatkul) ON DELETE CASCADE
);


-- Insert sample data for Mhs
INSERT INTO Mhs (NIM, Nama_Mhs, Alamat_Mhs)
VALUES 
('L0123123', 'Rizky Amalia Nugrahaeni', 'Sragen'), 
('L0123124', 'Raisa Andriana', 'Jakarta'),
('L0123125', 'Maudy Ayunda', 'Depok'),
('L0123126', 'Chelsea Islan', 'Bogor'),
('L0123127', 'Nicholas Saputra', 'Yogyakarta');

-- Insert sample data for MataKuliah
INSERT INTO MataKuliah (KodeMatkul, NamaMatkul, SKS, Semester)
VALUES 
('111204', 'Sistem Terdistribusi', 3, 5),
('111205', 'Interaksi Manusia dan Komputer', 2, 5),
('111206', 'Data Mining', 3, 5),
('111207', 'Pengolahan Citra Digital', 3, 5),
('111208', 'Manajemen Jaringan', 3, 5);

-- Insert sample data for Dosen
INSERT INTO Dosen (NIP, Nama_Dosen, Alamat_Dosen)
VALUES 
('RA170845', 'B.J. Habibie', 'Parepare'),
('RA170846', 'Anies Baswedan', 'Jakarta'),
('RA170847', 'K.H. Dewantara', 'Yogyakarta'),
('RA170848', 'Najwa Shihab', 'Makassar'),
('RA170849', 'Pratiwi Sudarmono', 'Jakarta');

-- Insert sample data for Kuliah
INSERT INTO Kuliah (NIM, NIP, KodeMatkul, Nilai)
VALUES 
('L0123123', 'RA170845', '111204', 'A'),
('L0123123', 'RA170846', '111205', 'A'),
('L0123123', 'RA170847', '111206', 'A'),
('L0123123', 'RA170848', '111207', 'A'),
('L0123123', 'RA170849', '111208', 'A'),
('L0123124', 'RA170845', '111204', 'B'),
('L0123124', 'RA170846', '111205', 'B'),
('L0123125', 'RA170847', '111206', 'A'),
('L0123126', 'RA170848', '111207', 'B'),
('L0123127', 'RA170849', '111208', 'A');
