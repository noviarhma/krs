-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 03:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(6) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password_admin` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password_admin`, `nama`) VALUES
('abc12', 'coba', '1234', 'novia');

-- --------------------------------------------------------

--
-- Table structure for table `ambil_matkul`
--

CREATE TABLE `ambil_matkul` (
  `id_krs` int(11) NOT NULL,
  `npm` varchar(6) NOT NULL,
  `kode_matkul` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambil_matkul`
--

INSERT INTO `ambil_matkul` (`id_krs`, `npm`, `kode_matkul`) VALUES
(1, '123456', 'AK0200'),
(2, '123456', 'AK0203'),
(3, '123456', 'It0011'),
(4, '123456', 'It0011'),
(5, '123456', 'IT0113');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(6) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `passwordmhs` varchar(15) NOT NULL,
  `kelas` varchar(6) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `fakultas` varchar(40) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama_mhs`, `gender`, `passwordmhs`, `kelas`, `jurusan`, `fakultas`, `nohp`, `email`, `alamat`, `tgl_lahir`, `foto`) VALUES
('102215', 'Fikri', 'Laki-Laki', 'default', '1EA22', 'Manajemen', 'Ekonomi', '08131', 'haniffikri415@gmail.', 'bbbb', '2021-09-08', ''),
('102218', 'Novia Rahma', 'Perempuan', '123', '4KA22', 'Sistem Informasi', 'Ilkom & TI', '098', 'noviarhma19@gmail.co', 'jhvui', '0000-00-00', 'profile.png'),
('102219', 'Hanif', 'Laki-Laki', 'default', '1EA27', 'Manajemen', 'Ekonomi', '0821', 'haniffikri415@gmail.', 'cibitung', '2021-09-24', ''),
('111577', 'Novia Rahma', 'Laki-Laki', 'default', '4KA21', 'Sistem Informasi', 'Ilkom & TI', '0000', 'dasyuma5@gmail.com', 'Array', '0000-00-00', ''),
('111723', 'Hanif Fikri', 'Laki-Laki', 'default', '1EA27', 'TI', 'FTI', '08577', 'dasyuma5@gmail.com', 'Bekasi', '2021-08-29', ''),
('111765', 'Afif Azhar', 'Laki-Laki', 'default', '1EA22', 'Manajemen', 'Ekonomi', '08577', 'dasyuma5@gmail.com', 'boihvdd', '0000-00-00', ''),
('123450', 'safirati s', 'Perempuan', 'default', '4ka22', 'Sistem Informasi', 'Ilkom & TI', '0897', 'noviarhma19@gmail.co', 'hjk', '2021-09-13', 'profile.png'),
('123456', 'novia', 'Perempuan', '1234', '4ka22', 'si', 'fikti', '08211477', 'coba@mail.com', 'ksksn csk', '2021-09-01', 'profile.png'),
('141722', 'Rifqi Tisya', 'Laki-Laki', 'default', '4KA26', 'Sistem Informasi', 'Ilkom & TI', '08131', 'dasyuma5@gmail.com', 'djdld', '2021-09-02', ''),
('151782', 'Siska Drata', 'Perempuan', 'default', '4ka22', 'Sistem Informasi', 'Ilkom & TI', '0855', 'noviarhma19@gmail.co', 'dff', '1998-06-25', ''),
('987690', 'Rifqi', 'Laki-Laki', 'default', '1EA22', 'TI', 'FTI', '98', 'noviarhma19@gmail.co', 'fdkdll', '2021-08-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` varchar(6) NOT NULL,
  `nama_matkul` varchar(30) NOT NULL,
  `sks` int(1) NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `sks`, `dosen`) VALUES
('AK0200', 'Bahasa Inggris Bisnis 2', 1, 'Rini'),
('AK0203', 'Sistem Informasi Geografi 2', 3, 'Irwan Bastian'),
('It0011', 'Sistem Basis Data', 3, 'Metty Mustikasari'),
('IT0112', 'Fisika dan Kimia Dasar', 2, 'Made'),
('IT0113', 'Matematika', 3, 'Azhar'),
('IT1004', 'Algoritma Pemrogramman 1', 3, 'Joko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ambil_matkul`
--
ALTER TABLE `ambil_matkul`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambil_matkul`
--
ALTER TABLE `ambil_matkul`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
