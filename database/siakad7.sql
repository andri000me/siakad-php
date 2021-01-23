-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 08:24 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad7`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_siswa` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_siswa`, `id_absen`, `id_kelas`, `id_angkatan`, `id_guru`, `sakit`, `izin`, `absen`) VALUES
(4, 1, 21, 2, 16, 2, 2, 5),
(4, 2, 26, 2, 16, 5, 2, 3),
(120, 3, 26, 2, 16, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE `angkatan` (
  `id_angkatan` int(100) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `semester` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `tahun`, `semester`) VALUES
(1, '2019-2020', 1),
(2, '2020-2021', 1),
(3, '2019-2020', 2),
(4, '2020-2021', 2);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `nuptk` varchar(16) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `agama` varchar(8) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_user`, `id_angkatan`, `id_kelas`, `nuptk`, `nama_guru`, `password`, `alamat`, `no_hp`, `email`, `agama`, `tempat_lahir`, `tanggal_lahir`, `status`, `jenis_kelamin`, `foto`) VALUES
(3, 1, 4, 31, '1762760661220002', 'Asih Thunagari', 'asih1', 'Jl. Dermaga Baru no. 48', '0882-1978-0366', 'asihthunagari82@gmail.com', 'Islam', 'Jakarta', '2001-10-14', 'aktif', 'perempuan', ''),
(9, 2, 2, 28, '4861763664230132', 'Mariana Berillyvin Kara', 'mariana1', 'jl. Mawar Dalam Tengah no.6', '0882-1328-2237', 'rillygabriela@gmail.com', 'Katholik', 'Jakarta', '29-05-1985', 'aktif', 'perempuan', ''),
(12, 32, 0, 0, '', 'Sinta Yulianingsih', 'sinta1', 'Jl Balimatraman Rt 12/10', '0899-3476-5121', 'shintayoshioka54@gmail.com', 'Islam', 'Jakarta', '05-07-1993', 'aktif', 'perempuan', ''),
(14, 4, 0, 0, '', 'Rica Matovani Sitorus', 'rica1', 'Jl. Swakarsa IV No. 66 Pondok Kelapa', '0899-7876-7111', 'ricamatovanisitorus@gmail.com', 'Kristen', 'Medan', '16-03-1990', 'aktif', 'perempuan', ''),
(16, 3, 2, 26, '12313241231', 'Sumadi2', 'sumadi1', 'Jl. Lap. Roos II', '0882-1978-0366', 'akungsumadi2017@gmail.com', 'islam', 'Wonogiri', '2001-10-11', 'aktif', 'laki-laki', '124.png'),
(18, 45, 1, 27, '2324', 'entahlaj', '2324', 'jl. balimatraman www', '0882-1978-0362', 'amasbaih04@gmail.com2', 'islam', '2323', '2020-10-14', 'aktif', 'laki-laki', ''),
(19, 46, 0, 0, '223323', 'AJI2', '223323', '12121212', '1234', 'ajiabsol@gmail.com', 'islam', 'hjfg213213', '2020-11-18', 'aktif', 'laki-laki', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`hari`) VALUES
('senin'),
('selasa'),
('rabu'),
('kamis'),
('jumat');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `mata_pelajaran` varchar(30) NOT NULL,
  `jam_pelajaran` varchar(13) NOT NULL,
  `guru_pengajar` varchar(40) NOT NULL,
  `nama_kelas` varchar(8) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_matpel` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_angkatan`, `hari`, `mata_pelajaran`, `jam_pelajaran`, `guru_pengajar`, `nama_kelas`, `id_kelas`, `id_guru`, `id_matpel`) VALUES
(6, 1, 'Senin', 'Matematika', '09.30 - 10.00', 'Asih Thunagari', 'X AP-1', 1, 16, 0),
(377, 0, 'senin', 'Bahasa Prancis', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2357),
(378, 0, 'senin', '', '07.40 - 08.20', '', '', 0, 0, 0),
(379, 0, 'senin', '', '08.20 - 09.00', '', '', 0, 0, 0),
(380, 0, 'senin', '', '09.20 - 10.00', '', '', 0, 0, 0),
(381, 0, 'senin', '', '10.00 - 10.40', '', '', 0, 0, 0),
(382, 0, 'senin', 'Bahasa Prancis', '10.40 - 11.20', 'Asih Thunagari', '', 0, 3, 2357),
(383, 0, 'senin', 'Bahasa Prancis', '11.20 - 12.00', 'Asih Thunagari', '', 0, 3, 2357),
(384, 0, 'senin', 'Bahasa Prancis', '12.20 - 13.00', 'Asih Thunagari', '', 0, 3, 2357),
(385, 0, 'senin', 'Bahasa Prancis', '13.00 - 13.40', 'Asih Thunagari', '', 0, 3, 2357),
(386, 0, 'selasa', 'Bahasa Prancis', '06.30 - 07.00', 'Asih Thunagari', '', 0, 3, 2357),
(387, 0, 'selasa', 'Bahasa Prancis', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2357),
(388, 0, 'selasa', 'Bahasa Prancis', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2357),
(389, 0, 'selasa', 'Bahasa Prancis', '08.20 - 08.55', 'Asih Thunagari', '', 0, 3, 2357),
(390, 0, 'selasa', 'Bahasa Prancis', '09.10 - 09.50', 'Asih Thunagari', '', 0, 3, 2357),
(391, 0, 'selasa', 'Bahasa Prancis', '09.50 - 10.25', 'Asih Thunagari', '', 0, 3, 2357),
(392, 0, 'selasa', 'Bahasa Prancis', '10.25 - 11.00', 'Asih Thunagari', '', 0, 3, 2357),
(393, 0, 'selasa', 'Bahasa Prancis', '11.00 - 11.40', 'Asih Thunagari', '', 0, 3, 2357),
(394, 0, 'selasa', 'Bahasa Prancis', '12.10 - 12.40', 'Asih Thunagari', '', 0, 3, 2357),
(395, 0, 'selasa', 'Bahasa Prancis', '12.40 - 13.15', 'Asih Thunagari', '', 0, 3, 2357),
(396, 0, 'selasa', 'Bahasa Prancis', '13.15 - 13.45', 'Asih Thunagari', '', 0, 3, 2357),
(397, 0, 'selasa', 'Bahasa Prancis', '13.45 - 14.20', 'Asih Thunagari', '', 0, 3, 2357),
(398, 0, 'rabu', 'Bahasa Prancis', '06.30 - 07.00', 'Asih Thunagari', '', 0, 3, 2357),
(399, 0, 'rabu', 'Bahasa Prancis', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2357),
(400, 0, 'rabu', 'Bahasa Prancis', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2357),
(401, 0, 'rabu', 'Bahasa Prancis', '08.20 - 08.55', 'Asih Thunagari', '', 0, 3, 2357),
(402, 0, 'rabu', 'Bahasa Prancis', '09.10 - 09.50', 'Asih Thunagari', '', 0, 3, 2357),
(403, 0, 'rabu', 'Bahasa Prancis', '09.50 - 10.25', 'Asih Thunagari', '', 0, 3, 2357),
(404, 0, 'rabu', 'Bahasa Prancis', '10.25 - 11.00', 'Asih Thunagari', '', 0, 3, 2357),
(405, 0, 'rabu', 'Bahasa Prancis', '11.00 - 11.40', 'Asih Thunagari', '', 0, 3, 2357),
(406, 0, 'rabu', 'Bahasa Prancis', '12.10 - 12.40', 'Asih Thunagari', '', 0, 3, 2357),
(407, 0, 'rabu', 'Bahasa Prancis', '12.40 - 13.15', 'Asih Thunagari', '', 0, 3, 2357),
(408, 0, 'rabu', 'Bahasa Prancis', '13.15 - 13.45', 'Asih Thunagari', '', 0, 3, 2357),
(409, 0, 'rabu', 'Bahasa Prancis', '13.45 - 14.20', 'Asih Thunagari', '', 0, 3, 2357),
(410, 0, 'kamis', 'Bahasa Prancis', '06.30 - 07.00', 'Asih Thunagari', '', 0, 3, 2357),
(411, 0, 'kamis', 'Bahasa Prancis', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2357),
(412, 0, 'kamis', 'Bahasa Prancis', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2357),
(413, 0, 'kamis', 'Bahasa Prancis', '08.20 - 08.55', 'Asih Thunagari', '', 0, 3, 2357),
(414, 0, 'kamis', 'Bahasa Prancis', '09.10 - 09.50', 'Asih Thunagari', '', 0, 3, 2357),
(415, 0, 'kamis', 'Bahasa Prancis', '09.50 - 10.25', 'Asih Thunagari', '', 0, 3, 2357),
(416, 0, 'kamis', 'Bahasa Prancis', '10.25 - 11.00', 'Asih Thunagari', '', 0, 3, 2357),
(417, 0, 'kamis', 'Bahasa Prancis', '11.00 - 11.40', 'Asih Thunagari', '', 0, 3, 2357),
(418, 0, 'kamis', 'Bahasa Prancis', '12.10 - 12.40', 'Asih Thunagari', '', 0, 3, 2357),
(419, 0, 'kamis', 'Bahasa Prancis', '12.40 - 13.15', 'Asih Thunagari', '', 0, 3, 2357),
(420, 0, 'kamis', 'Bahasa Prancis', '13.15 - 13.45', 'Asih Thunagari', '', 0, 3, 2357),
(421, 0, 'kamis', 'Bahasa Prancis', '13.45 - 14.20', 'Asih Thunagari', '', 0, 3, 2357),
(422, 0, 'jumat', 'Bahasa Prancis', '06.30 - 07.10', 'Asih Thunagari', '', 0, 3, 2357),
(423, 0, 'jumat', 'Bahasa Prancis', '07.10 - 07.50', 'Asih Thunagari', '', 0, 3, 2357),
(424, 0, 'jumat', 'Bahasa Prancis', '07.50 - 08.25', 'Asih Thunagari', '', 0, 3, 2357),
(425, 0, 'jumat', 'Bahasa Prancis', '08.25 - 09.00', 'Asih Thunagari', '', 0, 3, 2357),
(426, 0, 'jumat', 'Bahasa Prancis', '09.20 - 10.00', 'Asih Thunagari', '', 0, 3, 2357),
(427, 0, 'jumat', 'Bahasa Prancis', '10.00 - 10.40', 'Asih Thunagari', '', 0, 3, 2357),
(428, 0, 'jumat', 'Bahasa Prancis', '10.40 - 11.15', 'Asih Thunagari', '', 0, 3, 2357),
(429, 0, 'senin', 'Bahasa Prancis', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2357),
(430, 0, 'senin', 'Bahasa Prancis', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2357),
(431, 0, 'senin', 'Administrasi Umum', '08.20 - 09.00', 'Asih Thunagari', '', 0, 3, 2358),
(432, 0, 'senin', 'Administrasi Umum', '09.20 - 10.00', 'Asih Thunagari', '', 0, 3, 2358),
(433, 0, 'senin', 'Administrasi Umum', '10.00 - 10.40', 'Asih Thunagari', '', 0, 3, 2358),
(434, 0, 'senin', 'Administrasi Umum', '10.40 - 11.20', 'Asih Thunagari', '', 0, 3, 2358),
(435, 0, 'senin', 'Administrasi Umum', '11.20 - 12.00', 'Asih Thunagari', '', 0, 3, 2358),
(436, 0, 'senin', 'Administrasi Umum', '12.20 - 13.00', 'Asih Thunagari', '', 0, 3, 2358),
(437, 0, 'senin', 'Administrasi Umum', '13.00 - 13.40', 'Asih Thunagari', '', 0, 3, 2358),
(438, 0, 'selasa', 'Administrasi Umum', '06.30 - 07.00', 'Asih Thunagari', '', 0, 3, 2358),
(439, 0, 'selasa', 'Administrasi Umum', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2358),
(440, 0, 'selasa', 'Administrasi Umum', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2358),
(441, 0, 'selasa', 'Administrasi Umum', '08.20 - 08.55', 'Asih Thunagari', '', 0, 3, 2358),
(442, 0, 'selasa', 'Administrasi Umum', '09.10 - 09.50', 'Asih Thunagari', '', 0, 3, 2358),
(443, 0, 'selasa', 'Administrasi Umum', '09.50 - 10.25', 'Asih Thunagari', '', 0, 3, 2358),
(444, 0, 'selasa', 'Administrasi Umum', '10.25 - 11.00', 'Asih Thunagari', '', 0, 3, 2358),
(445, 0, 'selasa', 'Administrasi Umum', '11.00 - 11.40', 'Asih Thunagari', '', 0, 3, 2358),
(446, 0, 'selasa', 'Administrasi Umum', '12.10 - 12.40', 'Asih Thunagari', '', 0, 3, 2358),
(447, 0, 'selasa', 'Administrasi Umum', '12.40 - 13.15', 'Asih Thunagari', '', 0, 3, 2358),
(448, 0, 'selasa', 'Administrasi Umum', '13.15 - 13.45', 'Asih Thunagari', '', 0, 3, 2358),
(449, 0, 'selasa', 'Administrasi Umum', '13.45 - 14.20', 'Asih Thunagari', '', 0, 3, 2358),
(450, 0, 'rabu', 'Administrasi Umum', '06.30 - 07.00', 'Asih Thunagari', '', 0, 3, 2358),
(451, 0, 'rabu', 'Administrasi Umum', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2358),
(452, 0, 'rabu', 'Administrasi Umum', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2358),
(453, 0, 'rabu', 'Administrasi Umum', '08.20 - 08.55', 'Asih Thunagari', '', 0, 3, 2358),
(454, 0, 'rabu', 'Administrasi Umum', '09.10 - 09.50', 'Asih Thunagari', '', 0, 3, 2358),
(455, 0, 'rabu', 'Administrasi Umum', '09.50 - 10.25', 'Asih Thunagari', '', 0, 3, 2358),
(456, 0, 'rabu', 'Administrasi Umum', '10.25 - 11.00', 'Asih Thunagari', '', 0, 3, 2358),
(457, 0, 'rabu', 'Administrasi Umum', '11.00 - 11.40', 'Asih Thunagari', '', 0, 3, 2358),
(458, 0, 'rabu', 'Administrasi Umum', '12.10 - 12.40', 'Asih Thunagari', '', 0, 3, 2358),
(459, 0, 'rabu', 'Administrasi Umum', '12.40 - 13.15', 'Asih Thunagari', '', 0, 3, 2358),
(460, 0, 'rabu', 'Administrasi Umum', '13.15 - 13.45', 'Asih Thunagari', '', 0, 3, 2358),
(461, 0, 'rabu', 'Administrasi Umum', '13.45 - 14.20', 'Asih Thunagari', '', 0, 3, 2358),
(462, 0, 'kamis', 'Administrasi Umum', '06.30 - 07.00', 'Asih Thunagari', '', 0, 3, 2358),
(463, 0, 'kamis', 'Administrasi Umum', '07.00 - 07.40', 'Asih Thunagari', '', 0, 3, 2358),
(464, 0, 'kamis', 'Administrasi Umum', '07.40 - 08.20', 'Asih Thunagari', '', 0, 3, 2358),
(465, 0, 'kamis', 'Administrasi Umum', '08.20 - 08.55', 'Asih Thunagari', '', 0, 3, 2358),
(466, 0, 'kamis', 'Administrasi Umum', '09.10 - 09.50', 'Asih Thunagari', '', 0, 3, 2358),
(467, 0, 'kamis', 'Administrasi Umum', '09.50 - 10.25', 'Asih Thunagari', '', 0, 3, 2358),
(468, 0, 'kamis', 'Administrasi Umum', '10.25 - 11.00', 'Asih Thunagari', '', 0, 3, 2358),
(469, 0, 'kamis', 'Administrasi Umum', '11.00 - 11.40', 'Asih Thunagari', '', 0, 3, 2358),
(470, 0, 'kamis', 'Administrasi Umum', '12.10 - 12.40', 'Asih Thunagari', '', 0, 3, 2358),
(471, 0, 'kamis', 'Administrasi Umum', '12.40 - 13.15', 'Asih Thunagari', '', 0, 3, 2358),
(472, 0, 'kamis', 'Administrasi Umum', '13.15 - 13.45', 'Asih Thunagari', '', 0, 3, 2358),
(473, 0, 'kamis', 'Administrasi Umum', '13.45 - 14.20', 'Asih Thunagari', '', 0, 3, 2358),
(474, 0, 'jumat', 'Administrasi Umum', '06.30 - 07.10', 'Asih Thunagari', '', 0, 3, 2358),
(475, 0, 'jumat', 'Administrasi Umum', '07.10 - 07.50', 'Asih Thunagari', '', 0, 3, 2358),
(476, 0, 'jumat', 'Administrasi Umum', '07.50 - 08.25', 'Asih Thunagari', '', 0, 3, 2358),
(477, 0, 'jumat', 'Administrasi Umum', '08.25 - 09.00', 'Asih Thunagari', '', 0, 3, 2358),
(478, 0, 'jumat', 'Administrasi Umum', '09.20 - 10.00', 'Asih Thunagari', '', 0, 3, 2358),
(479, 0, 'jumat', 'Administrasi Umum', '10.00 - 10.40', 'Asih Thunagari', '', 0, 3, 2358),
(480, 0, 'jumat', 'Administrasi Umum', '10.40 - 11.15', 'Asih Thunagari', '', 0, 3, 2358),
(741, 2, 'senin', '', '07.00 - 07.40', '', 'X AP-2', 26, 0, 0),
(742, 2, 'senin', 'Bahasa Jepang', '07.40 - 08.20', 'Sumadi', 'X AP-2', 26, 16, 2359),
(743, 2, 'senin', 'Bahasa Jepang', '08.20 - 09.00', 'Sumadi', 'X AP-2', 26, 16, 2359),
(744, 2, 'senin', '', '09.20 - 10.00', '', 'X AP-2', 26, 0, 0),
(745, 2, 'senin', 'Administrasi Umum', '10.00 - 10.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(746, 2, 'senin', 'Administrasi Umum', '10.40 - 11.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(747, 2, 'senin', 'Administrasi Umum', '11.20 - 12.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(748, 2, 'senin', 'Administrasi Umum', '12.20 - 13.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(749, 2, 'senin', 'Administrasi Umum', '13.00 - 13.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(750, 2, 'selasa', 'Administrasi Umum', '06.30 - 07.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(751, 2, 'selasa', 'Administrasi Umum', '07.00 - 07.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(752, 2, 'selasa', 'Administrasi Umum', '07.40 - 08.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(753, 2, 'selasa', 'Administrasi Umum', '08.20 - 08.55', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(754, 2, 'selasa', 'Administrasi Umum', '09.10 - 09.50', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(755, 2, 'selasa', 'Administrasi Umum', '09.50 - 10.25', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(756, 2, 'selasa', 'Administrasi Umum', '10.25 - 11.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(757, 2, 'selasa', 'Administrasi Umum', '11.00 - 11.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(758, 2, 'selasa', 'Administrasi Umum', '12.10 - 12.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(759, 2, 'selasa', 'Administrasi Umum', '12.40 - 13.15', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(760, 2, 'selasa', 'Administrasi Umum', '13.15 - 13.45', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(761, 2, 'selasa', 'Administrasi Umum', '13.45 - 14.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(762, 2, 'rabu', 'Administrasi Umum', '06.30 - 07.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(763, 2, 'rabu', 'Administrasi Umum', '07.00 - 07.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(764, 2, 'rabu', 'Administrasi Umum', '07.40 - 08.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(765, 2, 'rabu', 'Administrasi Umum', '08.20 - 08.55', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(766, 2, 'rabu', 'Administrasi Umum', '09.10 - 09.50', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(767, 2, 'rabu', 'Administrasi Umum', '09.50 - 10.25', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(768, 2, 'rabu', 'Administrasi Umum', '10.25 - 11.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(769, 2, 'rabu', 'Administrasi Umum', '11.00 - 11.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(770, 2, 'rabu', 'Administrasi Umum', '12.10 - 12.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(771, 2, 'rabu', 'Administrasi Umum', '12.40 - 13.15', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(772, 2, 'rabu', 'Administrasi Umum', '13.15 - 13.45', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(773, 2, 'rabu', 'Administrasi Umum', '13.45 - 14.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(774, 2, 'kamis', 'Administrasi Umum', '06.30 - 07.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(775, 2, 'kamis', 'Administrasi Umum', '07.00 - 07.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(776, 2, 'kamis', 'Administrasi Umum', '07.40 - 08.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(777, 2, 'kamis', 'Administrasi Umum', '08.20 - 08.55', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(778, 2, 'kamis', 'Administrasi Umum', '09.10 - 09.50', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(779, 2, 'kamis', 'Administrasi Umum', '09.50 - 10.25', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(780, 2, 'kamis', 'Administrasi Umum', '10.25 - 11.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(781, 2, 'kamis', 'Administrasi Umum', '11.00 - 11.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(782, 2, 'kamis', 'Administrasi Umum', '12.10 - 12.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(783, 2, 'kamis', 'Administrasi Umum', '12.40 - 13.15', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(784, 2, 'kamis', 'Administrasi Umum', '13.15 - 13.45', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(785, 2, 'kamis', 'Administrasi Umum', '13.45 - 14.20', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(786, 2, 'jumat', 'Administrasi Umum', '06.30 - 07.10', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(787, 2, 'jumat', 'Administrasi Umum', '07.10 - 07.50', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(788, 2, 'jumat', 'Administrasi Umum', '07.50 - 08.25', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(789, 2, 'jumat', 'Administrasi Umum', '08.25 - 09.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(790, 2, 'jumat', 'Administrasi Umum', '09.20 - 10.00', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(791, 2, 'jumat', 'Administrasi Umum', '10.00 - 10.40', 'Asih Thunagari', 'X AP-2', 26, 3, 2360),
(792, 2, 'jumat', 'Administrasi Umum', '10.40 - 11.15', 'Asih Thunagari', 'X AP-2', 26, 3, 2360);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `nama_kelas` char(8) NOT NULL,
  `jumlah_siswa` int(100) NOT NULL,
  `angkatan` varchar(255) NOT NULL,
  `semester` int(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `id_guru` int(100) NOT NULL,
  `max_siswa` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`nama_kelas`, `jumlah_siswa`, `angkatan`, `semester`, `id_kelas`, `id_angkatan`, `id_guru`, `max_siswa`) VALUES
('X AP-2', 0, '2020-2021', 1, 26, 2, 16, 40),
('X AP-2', 0, '2019-2020', 2, 30, 3, 15, 40),
('X AP-1', 0, '2020-2021', 2, 31, 4, 3, 40),
('XI AP-1', 0, '2019-2020', 1, 32, 1, 20, 40),
('XII AP-2', 0, '2019-2020', 1, 44, 1, 12, 40),
('XI AP-1', 0, '2020-2021', 2, 45, 4, 19, 40),
('XI AP-2', 0, '2019-2020', 1, 46, 1, 19, 40);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `nama_kelas` varchar(8) NOT NULL,
  `jumlah_siswa` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`nama_kelas`, `jumlah_siswa`) VALUES
('X AP-1', '31'),
('X AP-2', '26'),
('XI AP-1', '24'),
('XI AP-2', '26'),
('XII AP-1', '35'),
('XII AP-2', '35'),
('XII AP-5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_matpel` int(11) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  `nama_matpel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_matpel`, `nama_guru`, `nama_matpel`) VALUES
(5, 'Djajadi Hamzah', 'Pendidikan Agama'),
(6, 'Yuliana', 'Pendidikan Pancasila dan Kewarganegaraan'),
(7, 'Sinta Yulianingsih', 'Bahasa Indonesia'),
(8, 'Hendri Wijaya', 'Matematika'),
(9, 'Chusnul Chotimah', 'Produk Kreatif dan Kewirausahaan'),
(10, 'Amas Baih', 'Front Office'),
(11, 'Asih Thunagari', 'IPA Terapan'),
(12, 'Andhika Indra', 'BP/BK'),
(13, 'Tetty', 'Bahasa Inggris'),
(15, 'Mariana Berillyvin Kara', 'F&B Product'),
(16, 'Toto Dwiananto Raharjo', 'Bahasa Jepang'),
(17, 'Josephine Merry', 'Bahasa Prancis'),
(18, 'Syamsul Azis', 'Pendidikan Jasmani, Olah Raga dan Kesehatan '),
(19, 'Rony Azwar', 'Industri Perhotelan'),
(20, 'Sri Sundari', 'Seni Budaya'),
(21, 'Hana Fazrina', 'Sejarah Indonesia'),
(22, 'Daniel Buhis', 'Laundry'),
(23, 'Radyta Achmad Burhanuddin', 'Kepariwisataan'),
(24, 'Agus Supriyanto', 'F&B Service'),
(25, 'Asep Supriatna', 'Campus Inggris'),
(26, 'Renida', 'Bahasa Inggris Profesional'),
(27, 'Asep Supriatna', 'Simulasi dan Komunikasi Digital'),
(28, 'Asep Supriatna', 'Housekeeping'),
(29, 'Asep Supriatna', 'Sanitasi, Hygiene, dan Keselamatan Kerja'),
(30, 'none', 'Komunikasi Industri Pariwisata'),
(31, 'Administrasi Umum', 'Administrasi Umum');

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `nama_matpel` varchar(100) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `id_matpel` int(100) NOT NULL,
  `id_guru` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`nama_matpel`, `nama_guru`, `id_matpel`, `id_guru`, `id_kelas`, `id_angkatan`) VALUES
('Bahasa Jepang', 'Sumadi', 2359, 16, 26, 2),
('Administrasi Umum', 'Asih Thunagari', 2360, 3, 26, 2),
('Bahasa Prancis', 'AJI2', 2361, 19, 31, 4),
('Campus Inggris', 'Sumadi2', 2362, 16, 26, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_matpel` int(100) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `nilai_pengetahuan` varchar(4) NOT NULL,
  `nilai_keterampilan` varchar(4) NOT NULL,
  `nilai_akhir` varchar(4) NOT NULL,
  `predikat` varchar(2) NOT NULL,
  `kkm` varchar(4) NOT NULL,
  `nama_matpel` varchar(100) NOT NULL,
  `nisn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_siswa`, `id_angkatan`, `id_kelas`, `id_matpel`, `nis`, `nama_siswa`, `kelas`, `semester`, `tahun_ajaran`, `nilai_pengetahuan`, `nilai_keterampilan`, `nilai_akhir`, `predikat`, `kkm`, `nama_matpel`, `nisn`) VALUES
(73, 4, 2, 21, 2338, '0673', 'Satria Aji Renaldo', 'XII AP-1', '1', '2020-2021', '72.5', '70', '71.2', 'B-', '80', 'Matematika', '0010186974'),
(74, 8, 2, 21, 2338, '0614', 'Abdullah Mubarak', 'XII AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0014678484'),
(75, 9, 2, 21, 2338, '0615', 'Achmad Novel', 'XII AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0001338368'),
(76, 10, 2, 21, 2338, '0624', 'Amalia Maharani', 'XII AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0020613386'),
(77, 14, 2, 21, 2338, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0052920293'),
(78, 15, 2, 21, 2338, '0834', 'DEWA SATRIA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0046317489'),
(79, 16, 2, 21, 2338, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0052992538'),
(80, 17, 2, 21, 2338, '0836', 'DZAIHAN AL GIBRAN', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '3056216541'),
(81, 18, 2, 21, 2338, '0838', 'FADHLI AHMAD', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0057714059'),
(82, 19, 2, 21, 2338, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', ''),
(83, 20, 2, 21, 2338, '0845', 'MAHARANI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0051372246'),
(84, 21, 2, 21, 2338, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0055527332'),
(85, 22, 2, 21, 2338, '0848', 'MUHAMMAD FARHAN', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0052275773'),
(86, 23, 2, 21, 2338, '0852', 'NATASHA HENDARSIWI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', ''),
(87, 24, 2, 21, 2338, '0853', 'NINI PURWATI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0043684484'),
(88, 25, 2, 21, 2338, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0054171081'),
(89, 26, 2, 21, 2338, '0858', 'RAJWA QANIAH', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0053146952'),
(90, 27, 2, 21, 2338, '0860', 'RIFQI HARDIANSYAH', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0055187290'),
(91, 28, 2, 21, 2338, '0861', 'SALDI NASLIYADI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '3032103277'),
(92, 29, 2, 21, 2338, '0864', 'SHAILA BURHAN', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0046535333'),
(93, 30, 2, 21, 2338, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0055175877'),
(94, 31, 2, 21, 2338, '0867', 'SITI NUR SYAIRRA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0057948354'),
(95, 32, 2, 21, 2338, '0868', 'SRI YULIANTI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '2041477469'),
(96, 33, 2, 21, 2338, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', ''),
(97, 34, 2, 21, 2338, '0873', 'VINA KHANSA HANAFI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0059258765'),
(98, 81, 2, 21, 2338, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', ''),
(99, 91, 2, 21, 2338, '0823', 'ADZIKRA AULIA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0052215252'),
(100, 110, 2, 21, 2338, '0824', 'AGUNG PRASETIYO', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0049371084'),
(101, 111, 2, 21, 2338, '0825', 'ANDIKA HABI ZANUAR', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0041266058'),
(102, 112, 2, 21, 2338, '0827', 'ARYA SAPUTRA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', ''),
(103, 113, 2, 21, 2338, '0830', 'BUNGA RANA GHAITSYA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Matematika', '0052892305'),
(105, 4, 2, 21, 2342, '0673', 'Satria Aji Renaldo', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0010186974'),
(106, 8, 2, 21, 2342, '0614', 'Abdullah Mubarak', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0014678484'),
(107, 9, 2, 21, 2342, '0615', 'Achmad Novel', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0001338368'),
(108, 10, 2, 21, 2342, '0624', 'Amalia Maharani', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0020613386'),
(109, 14, 2, 21, 2342, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0052920293'),
(110, 15, 2, 21, 2342, '0834', 'DEWA SATRIA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0046317489'),
(111, 16, 2, 21, 2342, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0052992538'),
(112, 17, 2, 21, 2342, '0836', 'DZAIHAN AL GIBRAN', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '3056216541'),
(113, 18, 2, 21, 2342, '0838', 'FADHLI AHMAD', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0057714059'),
(114, 19, 2, 21, 2342, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', ''),
(115, 20, 2, 21, 2342, '0845', 'MAHARANI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0051372246'),
(116, 21, 2, 21, 2342, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0055527332'),
(117, 22, 2, 21, 2342, '0848', 'MUHAMMAD FARHAN', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0052275773'),
(118, 23, 2, 21, 2342, '0852', 'NATASHA HENDARSIWI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', ''),
(119, 24, 2, 21, 2342, '0853', 'NINI PURWATI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0043684484'),
(120, 25, 2, 21, 2342, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0054171081'),
(121, 26, 2, 21, 2342, '0858', 'RAJWA QANIAH', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0053146952'),
(122, 27, 2, 21, 2342, '0860', 'RIFQI HARDIANSYAH', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0055187290'),
(123, 28, 2, 21, 2342, '0861', 'SALDI NASLIYADI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '3032103277'),
(124, 29, 2, 21, 2342, '0864', 'SHAILA BURHAN', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0046535333'),
(125, 30, 2, 21, 2342, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0055175877'),
(126, 31, 2, 21, 2342, '0867', 'SITI NUR SYAIRRA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0057948354'),
(127, 32, 2, 21, 2342, '0868', 'SRI YULIANTI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '2041477469'),
(128, 33, 2, 21, 2342, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', ''),
(129, 34, 2, 21, 2342, '0873', 'VINA KHANSA HANAFI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0059258765'),
(130, 81, 2, 21, 2342, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', ''),
(131, 91, 2, 21, 2342, '0823', 'ADZIKRA AULIA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0052215252'),
(132, 110, 2, 21, 2342, '0824', 'AGUNG PRASETIYO', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0049371084'),
(133, 111, 2, 21, 2342, '0825', 'ANDIKA HABI ZANUAR', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0041266058'),
(134, 112, 2, 21, 2342, '0827', 'ARYA SAPUTRA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', ''),
(135, 113, 2, 21, 2342, '0830', 'BUNGA RANA GHAITSYA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Jepang', '0052892305'),
(136, 4, 2, 21, 2343, '0673', 'Satria Aji Renaldo', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0010186974'),
(137, 8, 2, 21, 2343, '0614', 'Abdullah Mubarak', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0014678484'),
(138, 9, 2, 21, 2343, '0615', 'Achmad Novel', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0001338368'),
(139, 10, 2, 21, 2343, '0624', 'Amalia Maharani', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0020613386'),
(140, 14, 2, 21, 2343, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0052920293'),
(141, 15, 2, 21, 2343, '0834', 'DEWA SATRIA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0046317489'),
(142, 16, 2, 21, 2343, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0052992538'),
(143, 17, 2, 21, 2343, '0836', 'DZAIHAN AL GIBRAN', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '3056216541'),
(144, 18, 2, 21, 2343, '0838', 'FADHLI AHMAD', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0057714059'),
(145, 19, 2, 21, 2343, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', ''),
(146, 20, 2, 21, 2343, '0845', 'MAHARANI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0051372246'),
(147, 21, 2, 21, 2343, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0055527332'),
(148, 22, 2, 21, 2343, '0848', 'MUHAMMAD FARHAN', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0052275773'),
(149, 23, 2, 21, 2343, '0852', 'NATASHA HENDARSIWI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', ''),
(150, 24, 2, 21, 2343, '0853', 'NINI PURWATI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0043684484'),
(151, 25, 2, 21, 2343, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0054171081'),
(152, 26, 2, 21, 2343, '0858', 'RAJWA QANIAH', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0053146952'),
(153, 27, 2, 21, 2343, '0860', 'RIFQI HARDIANSYAH', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0055187290'),
(154, 28, 2, 21, 2343, '0861', 'SALDI NASLIYADI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '3032103277'),
(155, 29, 2, 21, 2343, '0864', 'SHAILA BURHAN', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0046535333'),
(156, 30, 2, 21, 2343, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0055175877'),
(157, 31, 2, 21, 2343, '0867', 'SITI NUR SYAIRRA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0057948354'),
(158, 32, 2, 21, 2343, '0868', 'SRI YULIANTI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '2041477469'),
(159, 33, 2, 21, 2343, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', ''),
(160, 34, 2, 21, 2343, '0873', 'VINA KHANSA HANAFI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0059258765'),
(161, 81, 2, 21, 2343, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', ''),
(162, 91, 2, 21, 2343, '0823', 'ADZIKRA AULIA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0052215252'),
(163, 110, 2, 21, 2343, '0824', 'AGUNG PRASETIYO', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0049371084'),
(164, 111, 2, 21, 2343, '0825', 'ANDIKA HABI ZANUAR', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0041266058'),
(165, 112, 2, 21, 2343, '0827', 'ARYA SAPUTRA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', ''),
(166, 113, 2, 21, 2343, '0830', 'BUNGA RANA GHAITSYA', 'X AP-1', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Agama', '0052892305'),
(198, 4, 2, 21, 2354, '0673', 'Satria Aji Renaldo', 'X AP-2', '1', '2020-2021', '74.7', '80', '77.3', 'B', '80', 'Industri Perhotelan', '0010186974'),
(199, 8, 2, 21, 2354, '0614', 'Abdullah Mubarak', 'X AP-2', '1', '2020-2021', '60', '56.6', '58.3', 'D', '80', 'Industri Perhotelan', '0014678484'),
(200, 9, 2, 21, 2354, '0615', 'Achmad Novel', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0001338368'),
(201, 10, 2, 21, 2354, '0624', 'Amalia Maharani', 'X AP-2', '1', '2020-2021', '40', '53.3', '46.6', 'E', '80', 'Industri Perhotelan', '0020613386'),
(202, 14, 2, 21, 2354, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0052920293'),
(203, 15, 2, 21, 2354, '0834', 'DEWA SATRIA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0046317489'),
(204, 16, 2, 21, 2354, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0052992538'),
(205, 17, 2, 21, 2354, '0836', 'DZAIHAN AL GIBRAN', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '3056216541'),
(206, 18, 2, 21, 2354, '0838', 'FADHLI AHMAD', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0057714059'),
(207, 19, 2, 21, 2354, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', ''),
(208, 20, 2, 21, 2354, '0845', 'MAHARANI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0051372246'),
(209, 21, 2, 21, 2354, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0055527332'),
(210, 22, 2, 21, 2354, '0848', 'MUHAMMAD FARHAN', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0052275773'),
(211, 23, 2, 21, 2354, '0852', 'NATASHA HENDARSIWI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', ''),
(212, 24, 2, 21, 2354, '0853', 'NINI PURWATI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0043684484'),
(213, 25, 2, 21, 2354, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0054171081'),
(214, 26, 2, 21, 2354, '0858', 'RAJWA QANIAH', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0053146952'),
(215, 27, 2, 21, 2354, '0860', 'RIFQI HARDIANSYAH', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0055187290'),
(216, 28, 2, 21, 2354, '0861', 'SALDI NASLIYADI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '3032103277'),
(217, 29, 2, 21, 2354, '0864', 'SHAILA BURHAN', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0046535333'),
(218, 30, 2, 21, 2354, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0055175877'),
(219, 31, 2, 21, 2354, '0867', 'SITI NUR SYAIRRA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0057948354'),
(220, 32, 2, 21, 2354, '0868', 'SRI YULIANTI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '2041477469'),
(221, 33, 2, 21, 2354, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', ''),
(222, 34, 2, 21, 2354, '0873', 'VINA KHANSA HANAFI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0059258765'),
(223, 81, 2, 21, 2354, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', ''),
(224, 91, 2, 21, 2354, '0823', 'ADZIKRA AULIA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0052215252'),
(225, 110, 2, 21, 2354, '0824', 'AGUNG PRASETIYO', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0049371084'),
(226, 111, 2, 21, 2354, '0825', 'ANDIKA HABI ZANUAR', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0041266058'),
(227, 112, 2, 21, 2354, '0827', 'ARYA SAPUTRA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', ''),
(228, 113, 2, 21, 2354, '0830', 'BUNGA RANA GHAITSYA', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '80', 'Industri Perhotelan', '0052892305'),
(229, 4, 2, 26, 2359, '0673', 'Satria Aji Renaldo', 'X AP-2', '1', '2020-2021', '72.5', '60', '66.2', 'C', '60', 'Bahasa Jepang', '0010186974'),
(231, 4, 2, 26, 2360, '0673', 'Satria Aji Renaldo', 'X AP-2', '1', '2020-2021', '0', '0', '0', 'E', '0', 'Administrasi Umum', '0010186974'),
(233, 4, 4, 31, 2361, '0673', 'Satria Aji Renaldo', 'X AP-1', '2', '2020-2021', '0', '0', '0', 'E', '0', 'Bahasa Prancis', '0010186974'),
(234, 4, 2, 26, 2362, '0673', 'Satria Aji Renaldo', 'X AP-2', '1', '2020-2021', '67.5', '50', '58.7', 'D', '70', 'Campus Inggris', '0010186974'),
(235, 121, 2, 26, 2362, '1234', 'AJI', 'X AP-2', '1', '2020-2021', '62.5', '70', '66.2', 'C', '70', 'Campus Inggris', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilaisiswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_matpel` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `mata_pelajaran` varchar(30) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `tahun_ajaran` varchar(11) NOT NULL,
  `nilai_kkm` varchar(4) NOT NULL,
  `nilai_tugas` varchar(4) NOT NULL,
  `nilai_uh` varchar(4) NOT NULL,
  `nilai_pts` varchar(4) NOT NULL,
  `nilai_pas` varchar(4) NOT NULL,
  `nilai_akhir_ap` varchar(4) NOT NULL,
  `nilai_praktek` varchar(4) NOT NULL,
  `nilai_portofolio` varchar(4) NOT NULL,
  `nilai_proyek` int(4) NOT NULL,
  `nilai_akhir_rap` varchar(4) NOT NULL,
  `predikat` varchar(2) NOT NULL,
  `nisn` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilaisiswa`, `id_siswa`, `id_matpel`, `id_angkatan`, `nis`, `nama_siswa`, `kelas`, `mata_pelajaran`, `semester`, `tahun_ajaran`, `nilai_kkm`, `nilai_tugas`, `nilai_uh`, `nilai_pts`, `nilai_pas`, `nilai_akhir_ap`, `nilai_praktek`, `nilai_portofolio`, `nilai_proyek`, `nilai_akhir_rap`, `predikat`, `nisn`) VALUES
(11, 4, 2338, 2, '0673', 'Satria Aji Renaldo', 'XII AP-1', 'Matematika', '1', '2020-2021', '80', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(12, 8, 2338, 2, '0614', 'Abdullah Mubarak', 'XII AP-1', 'Matematika', '1', '2020-2021', '80', '90', '50', '50', '50', '0', '70', '50', 50, '0', 'E', '0014678484'),
(13, 9, 2338, 2, '0615', 'Achmad Novel', 'XII AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0001338368'),
(14, 10, 2338, 2, '0624', 'Amalia Maharani', 'XII AP-1', 'Matematika', '1', '2020-2021', '80', '10', '50', '50', '50', '0', '50', '50', 60, '0', 'E', '0020613386'),
(15, 14, 2338, 2, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052920293'),
(16, 15, 2338, 2, '0834', 'DEWA SATRIA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046317489'),
(17, 16, 2338, 2, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052992538'),
(18, 17, 2338, 2, '0836', 'DZAIHAN AL GIBRAN', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3056216541'),
(19, 18, 2338, 2, '0838', 'FADHLI AHMAD', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057714059'),
(20, 19, 2338, 2, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(21, 20, 2338, 2, '0845', 'MAHARANI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0051372246'),
(22, 21, 2338, 2, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055527332'),
(23, 22, 2338, 2, '0848', 'MUHAMMAD FARHAN', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052275773'),
(24, 23, 2338, 2, '0852', 'NATASHA HENDARSIWI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(25, 24, 2338, 2, '0853', 'NINI PURWATI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0043684484'),
(26, 25, 2338, 2, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0054171081'),
(27, 26, 2338, 2, '0858', 'RAJWA QANIAH', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0053146952'),
(28, 27, 2338, 2, '0860', 'RIFQI HARDIANSYAH', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055187290'),
(29, 28, 2338, 2, '0861', 'SALDI NASLIYADI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3032103277'),
(30, 29, 2338, 2, '0864', 'SHAILA BURHAN', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046535333'),
(31, 30, 2338, 2, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055175877'),
(32, 31, 2338, 2, '0867', 'SITI NUR SYAIRRA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057948354'),
(33, 32, 2338, 2, '0868', 'SRI YULIANTI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '2041477469'),
(34, 33, 2338, 2, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(35, 34, 2338, 2, '0873', 'VINA KHANSA HANAFI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0059258765'),
(36, 81, 2338, 2, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(37, 91, 2338, 2, '0823', 'ADZIKRA AULIA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052215252'),
(38, 110, 2338, 2, '0824', 'AGUNG PRASETIYO', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0049371084'),
(39, 111, 2338, 2, '0825', 'ANDIKA HABI ZANUAR', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0041266058'),
(40, 112, 2338, 2, '0827', 'ARYA SAPUTRA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(41, 113, 2338, 2, '0830', 'BUNGA RANA GHAITSYA', 'X AP-1', 'Matematika', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052892305'),
(42, 4, 2342, 2, '0673', 'Satria Aji Renaldo', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(43, 8, 2342, 2, '0614', 'Abdullah Mubarak', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '90', '50', '50', '50', '0', '70', '50', 50, '0', 'E', '0014678484'),
(44, 9, 2342, 2, '0615', 'Achmad Novel', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0001338368'),
(45, 10, 2342, 2, '0624', 'Amalia Maharani', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '10', '50', '50', '50', '0', '50', '50', 60, '0', 'E', '0020613386'),
(46, 14, 2342, 2, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052920293'),
(47, 15, 2342, 2, '0834', 'DEWA SATRIA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046317489'),
(48, 16, 2342, 2, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052992538'),
(49, 17, 2342, 2, '0836', 'DZAIHAN AL GIBRAN', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3056216541'),
(50, 18, 2342, 2, '0838', 'FADHLI AHMAD', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057714059'),
(51, 19, 2342, 2, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(52, 20, 2342, 2, '0845', 'MAHARANI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0051372246'),
(53, 21, 2342, 2, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055527332'),
(54, 22, 2342, 2, '0848', 'MUHAMMAD FARHAN', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052275773'),
(55, 23, 2342, 2, '0852', 'NATASHA HENDARSIWI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(56, 24, 2342, 2, '0853', 'NINI PURWATI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0043684484'),
(57, 25, 2342, 2, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0054171081'),
(58, 26, 2342, 2, '0858', 'RAJWA QANIAH', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0053146952'),
(59, 27, 2342, 2, '0860', 'RIFQI HARDIANSYAH', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055187290'),
(60, 28, 2342, 2, '0861', 'SALDI NASLIYADI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3032103277'),
(61, 29, 2342, 2, '0864', 'SHAILA BURHAN', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046535333'),
(62, 30, 2342, 2, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055175877'),
(63, 31, 2342, 2, '0867', 'SITI NUR SYAIRRA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057948354'),
(64, 32, 2342, 2, '0868', 'SRI YULIANTI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '2041477469'),
(65, 33, 2342, 2, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(66, 34, 2342, 2, '0873', 'VINA KHANSA HANAFI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0059258765'),
(67, 81, 2342, 2, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(68, 91, 2342, 2, '0823', 'ADZIKRA AULIA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052215252'),
(69, 110, 2342, 2, '0824', 'AGUNG PRASETIYO', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0049371084'),
(70, 111, 2342, 2, '0825', 'ANDIKA HABI ZANUAR', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0041266058'),
(71, 112, 2342, 2, '0827', 'ARYA SAPUTRA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(72, 113, 2342, 2, '0830', 'BUNGA RANA GHAITSYA', 'X AP-1', 'Bahasa Jepang', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052892305'),
(73, 4, 2343, 2, '0673', 'Satria Aji Renaldo', 'X AP-1', 'Agama', '1', '2020-2021', '0', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(74, 8, 2343, 2, '0614', 'Abdullah Mubarak', 'X AP-1', 'Agama', '1', '2020-2021', '0', '90', '50', '50', '50', '0', '70', '50', 50, '0', 'E', '0014678484'),
(75, 9, 2343, 2, '0615', 'Achmad Novel', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0001338368'),
(76, 10, 2343, 2, '0624', 'Amalia Maharani', 'X AP-1', 'Agama', '1', '2020-2021', '0', '10', '50', '50', '50', '0', '50', '50', 60, '0', 'E', '0020613386'),
(77, 14, 2343, 2, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052920293'),
(78, 15, 2343, 2, '0834', 'DEWA SATRIA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046317489'),
(79, 16, 2343, 2, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052992538'),
(80, 17, 2343, 2, '0836', 'DZAIHAN AL GIBRAN', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3056216541'),
(81, 18, 2343, 2, '0838', 'FADHLI AHMAD', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057714059'),
(82, 19, 2343, 2, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(83, 20, 2343, 2, '0845', 'MAHARANI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0051372246'),
(84, 21, 2343, 2, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055527332'),
(85, 22, 2343, 2, '0848', 'MUHAMMAD FARHAN', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052275773'),
(86, 23, 2343, 2, '0852', 'NATASHA HENDARSIWI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(87, 24, 2343, 2, '0853', 'NINI PURWATI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0043684484'),
(88, 25, 2343, 2, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0054171081'),
(89, 26, 2343, 2, '0858', 'RAJWA QANIAH', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0053146952'),
(90, 27, 2343, 2, '0860', 'RIFQI HARDIANSYAH', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055187290'),
(91, 28, 2343, 2, '0861', 'SALDI NASLIYADI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3032103277'),
(92, 29, 2343, 2, '0864', 'SHAILA BURHAN', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046535333'),
(93, 30, 2343, 2, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055175877'),
(94, 31, 2343, 2, '0867', 'SITI NUR SYAIRRA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057948354'),
(95, 32, 2343, 2, '0868', 'SRI YULIANTI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '2041477469'),
(96, 33, 2343, 2, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(97, 34, 2343, 2, '0873', 'VINA KHANSA HANAFI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0059258765'),
(98, 81, 2343, 2, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(99, 91, 2343, 2, '0823', 'ADZIKRA AULIA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052215252'),
(100, 110, 2343, 2, '0824', 'AGUNG PRASETIYO', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0049371084'),
(101, 111, 2343, 2, '0825', 'ANDIKA HABI ZANUAR', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0041266058'),
(102, 112, 2343, 2, '0827', 'ARYA SAPUTRA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(103, 113, 2343, 2, '0830', 'BUNGA RANA GHAITSYA', 'X AP-1', 'Agama', '1', '2020-2021', '0', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052892305'),
(135, 4, 2354, 2, '0673', 'Satria Aji Renaldo', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(136, 8, 2354, 2, '0614', 'Abdullah Mubarak', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '90', '50', '50', '50', '0', '70', '50', 50, '0', 'E', '0014678484'),
(137, 9, 2354, 2, '0615', 'Achmad Novel', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0001338368'),
(138, 10, 2354, 2, '0624', 'Amalia Maharani', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '10', '50', '50', '50', '0', '50', '50', 60, '0', 'E', '0020613386'),
(139, 14, 2354, 2, '0831', 'CALFIN ZAKIO TAURIZKY', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052920293'),
(140, 15, 2354, 2, '0834', 'DEWA SATRIA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046317489'),
(141, 16, 2354, 2, '0835', 'DINIANTI KHOIRUNNISA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052992538'),
(142, 17, 2354, 2, '0836', 'DZAIHAN AL GIBRAN', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3056216541'),
(143, 18, 2354, 2, '0838', 'FADHLI AHMAD', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057714059'),
(144, 19, 2354, 2, '0842', 'JONATHAN CHRISTIAN IMMANUEL', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(145, 20, 2354, 2, '0845', 'MAHARANI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0051372246'),
(146, 21, 2354, 2, '0847', 'MAVRIZA INDIRANDA JACOB', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055527332'),
(147, 22, 2354, 2, '0848', 'MUHAMMAD FARHAN', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052275773'),
(148, 23, 2354, 2, '0852', 'NATASHA HENDARSIWI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(149, 24, 2354, 2, '0853', 'NINI PURWATI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0043684484'),
(150, 25, 2354, 2, '0854', 'NOFITRI WAHDATUL ULYA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0054171081'),
(151, 26, 2354, 2, '0858', 'RAJWA QANIAH', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0053146952'),
(152, 27, 2354, 2, '0860', 'RIFQI HARDIANSYAH', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055187290'),
(153, 28, 2354, 2, '0861', 'SALDI NASLIYADI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '3032103277'),
(154, 29, 2354, 2, '0864', 'SHAILA BURHAN', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0046535333'),
(155, 30, 2354, 2, '0865', 'SHIFA MAULIDA APRILLIA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0055175877'),
(156, 31, 2354, 2, '0867', 'SITI NUR SYAIRRA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0057948354'),
(157, 32, 2354, 2, '0868', 'SRI YULIANTI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '2041477469'),
(158, 33, 2354, 2, '0869', 'SYARIFAH LAILA HUMNAH', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(159, 34, 2354, 2, '0873', 'VINA KHANSA HANAFI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0059258765'),
(160, 81, 2354, 2, '0822', 'ADISTY NEYSA SAVITRI', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(161, 91, 2354, 2, '0823', 'ADZIKRA AULIA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052215252'),
(162, 110, 2354, 2, '0824', 'AGUNG PRASETIYO', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0049371084'),
(163, 111, 2354, 2, '0825', 'ANDIKA HABI ZANUAR', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0041266058'),
(164, 112, 2354, 2, '0827', 'ARYA SAPUTRA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', ''),
(165, 113, 2354, 2, '0830', 'BUNGA RANA GHAITSYA', 'X AP-2', 'Industri Perhotelan', '1', '2020-2021', '80', '0', '0', '0', '0', '0', '0', '0', 0, '0', 'E', '0052892305'),
(166, 4, 2359, 2, '0673', 'Satria Aji Renaldo', 'X AP-2', 'Administrasi Umum', '1', '2020-2021', '60', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(168, 4, 2360, 2, '0673', 'Satria Aji Renaldo', 'X AP-2', 'Administrasi Umum', '1', '2020-2021', '0', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(170, 4, 2361, 4, '0673', 'Satria Aji Renaldo', 'X AP-1', 'Bahasa Prancis', '2', '2020-2021', '0', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(171, 4, 2362, 2, '0673', 'Satria Aji Renaldo', 'X AP-2', 'Campus Inggris', '1', '2020-2021', '70', '90', '50', '50', '80', '0', '70', '40', 40, '0', 'E', '0010186974'),
(172, 121, 2362, 2, '1234', 'AJI', 'X AP-2', 'Campus Inggris', '1', '2020-2021', '70', '50', '50', '100', '50', '0', '70', '70', 70, '0', 'E', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id_spp` int(11) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal_bayar` varchar(10) NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`id_spp`, `id_siswa`, `id_angkatan`, `id_kelas`, `angkatan`, `nis`, `nama_siswa`, `semester`, `status`, `tanggal_bayar`, `jumlah`) VALUES
(5, 4, 2, 26, '2020-2021', '0673', 'Satria Aji Renaldo', '1', 'lunas', '2020-10-30', 5000),
(7, 4, 2, 26, '2020-2021', '0673', 'Satria Aji Renaldo', '1', 'belom lunas', '2020-10-30', 800000);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id_register` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id_register`, `nama`, `username`, `password`) VALUES
(2, 'theja', 'theja1', 'theja1'),
(3, 'theja', 'theja2', 'theja2'),
(4, 'Satria Aji Renaldo', 'satria1', 'satria1'),
(5, 'Prayid', 'prayid1', 'prayid1'),
(6, 'Sumadi', 'sumadi1', 'sumadi1'),
(7, 'Asih Thunagari', 'asih1', 'asih1');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `agama` varchar(8) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `id_angkatan`, `id_kelas`, `password`, `nama_siswa`, `kelas`, `alamat`, `no_hp`, `email`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `nis`, `nisn`, `foto`) VALUES
(4, 2, 2, 26, '06731', 'Satria Aji Renaldo', 'X AP-2', 'Jalan Rumah indah', '0882-1978-0362', 'satria1@gmail.com', 'islam', 'Jakarta', '2001-10-14', 'laki-laki', '0673', '0010186974', '[BLuSuKan]_Little_Busters!~Refrain_-_06(720p)[8F4B0B0B]_animesave[(013824)2018-06-18-12-01-37].JPG'),
(121, 49, 3, 26, '12345678', 'AJI', 'X AP-2', 'Jl.poncol indah v', '0882-1978-036', 'ajishigure@gmail.com', 'islam', 'Jakarta2', '1996-06-20', 'laki-laki', '12345678', '123456789', '');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `nis` varchar(4) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `program_studi` varchar(11) NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `id_siswa`, `nis`, `nama_siswa`, `alamat`, `program_studi`, `jumlah`) VALUES
(1, 0, '0673', 'Satria Aji Renaldo', 'jl. balimatraman', 'Perhotelan', 'Rp. 400.000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Prayid', 'prayid123', '123456', 'admin'),
(2, 'Satria123', 'satria1', 'satria1', 'siswa'),
(3, 'Sumadi', 'sumadi1', 'sumadi1', 'guru'),
(4, 'Asih', 'asih1', 'asih1', 'walikelas'),
(8, 'Theja', 'theja1', 'theja1', 'admin'),
(24, '0882-1978-03622', '0882197803622', '0882197803622', 'guru'),
(25, '', '', '', 'guru'),
(26, 'Matematika', 'prayid123', 'prayid123', 'admin'),
(27, '1234', '2222', '2222', 'siswa'),
(28, '1234', '2222', '2222', 'siswa'),
(29, '1234', '2222', '2222', 'siswa'),
(30, '1234', '2222', '2222', 'siswa'),
(31, '2323', '23232', '23232', 'siswa'),
(32, '0673', '0010186974', '0010186974', 'siswa'),
(33, '0673', '0010186974', '0010186974', 'siswa'),
(34, '0673', '0010186974', '0010186974', 'siswa'),
(35, '0673', '0010186974', '0010186974', 'siswa'),
(36, '0673', '0010186974', '0010186974', 'siswa'),
(37, '0673', '0010186974', '0010186974', 'siswa'),
(38, '0673', '0010186974', '0010186974', 'siswa'),
(39, '0673', '0010186974', '0010186974', 'siswa'),
(40, '0673', '0010186974', '0010186974', 'siswa'),
(41, '0673', '0010186974', '0010186974', 'siswa'),
(42, '0673', '0010186974', '0010186974', 'siswa'),
(43, '2323', '1111111', '1111111', 'siswa'),
(44, '2323', '1111111', '1111111', 'siswa'),
(45, '0882-1978-0362', '088219780362', '088219780362', 'guru'),
(46, '1234', '1234', '1234', 'guru'),
(48, '0673', '0010186974', '0010186974', 'siswa'),
(49, '12345678', '123456789', '123456789', 'siswa'),
(50, '0673', '0010186974', '0010186974', 'siswa'),
(51, '12345678', '123456789', '123456789', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id_walikelas` int(11) NOT NULL,
  `id_guru` int(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(100) NOT NULL,
  `id_angkatan` int(100) NOT NULL,
  `kelas` varchar(8) NOT NULL,
  `nuptk` varchar(16) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_guru` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id_walikelas`, `id_guru`, `id_user`, `id_kelas`, `id_angkatan`, `kelas`, `nuptk`, `password`, `nama_guru`) VALUES
(5, 0, 0, 0, 0, 'X AP-1', '', 'sinta1', 'Sinta Yulianingsih'),
(6, 0, 0, 0, 0, 'X AP-2', '', 'rica1', 'Rica Matovani Sitorus'),
(7, 0, 0, 0, 0, 'XI AP-1', '8739733636200012', 'amas1', 'Amas Baih'),
(8, 0, 0, 0, 0, 'XI AP-2', '1352750652120003', 'toto1', 'Toto Dwiananto Raharjo'),
(9, 0, 0, 0, 0, 'XII AP-1', '4861763664230132', 'maria1', 'Mariana Berillyvin Kara'),
(10, 0, 0, 0, 0, 'XII AP-2', '1762760661220002', 'asih1', 'Asih Thunagari'),
(11, 16, 3, 21, 2, 'X AP-2', '1762760661220002', 'asih1', 'sumadi');

-- --------------------------------------------------------

--
-- Table structure for table `wali_siswa`
--

CREATE TABLE `wali_siswa` (
  `id_wali` int(11) NOT NULL,
  `kode_wali` varchar(5) NOT NULL,
  `nama_wali` varchar(40) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `password` varchar(8) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `agama` varchar(8) NOT NULL,
  `tempat_lahir` varchar(10) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_siswa`
--

INSERT INTO `wali_siswa` (`id_wali`, `kode_wali`, `nama_wali`, `nama_siswa`, `password`, `alamat`, `no_hp`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`) VALUES
(2, '08211', 'Hamdani', 'Adinda Suci Ramadhani', 'hamda1', 'jl. tanah rendah ', '0882-1933-4465', 'Islam', 'Jakarta', '20-02-1972', 'laki-laki'),
(3, '08221', 'Agus Susilo', 'Adisty Neysa Savitri', 'agus1', 'jl. kh abdullah syafei', '0219-8339-6571', 'Islam', 'Jakarta', '13-01-1986', 'laki-laki'),
(4, '08231', 'Sahmandi', 'Adzikra Aulia', 'sahma1', 'jl. menteng granit', '0899-7476-7331', 'Islam', 'Jakarta', '12-12-1985', 'laki-laki'),
(5, '08241', 'Rosadi', 'Agung Prasetyo', 'rosadi1', 'jl. asem baris', '0219-8389-7799', 'Islam', 'Jakarta', '11-02-1981', 'laki-laki'),
(6, '08251', 'Subarna', 'Andika Habi Zanuar', 'subarna1', 'jl. balimatraman', '0882-3458-7337', 'Islam', 'Jakarta', '30-04-1982', 'laki-laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `angkatan`
--
ALTER TABLE `angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`nama_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_matpel`),
  ADD KEY `nama_guru` (`nama_guru`),
  ADD KEY `nama_matpel` (`nama_matpel`);

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `nama_matpel` (`nama_matpel`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilaisiswa`);

--
-- Indexes for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id_register`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id_walikelas`),
  ADD KEY `nama_guru` (`nama_guru`);

--
-- Indexes for table `wali_siswa`
--
ALTER TABLE `wali_siswa`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angkatan`
--
ALTER TABLE `angkatan`
  MODIFY `id_angkatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=793;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `id_matpel` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2363;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_nilaisiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id_register` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id_walikelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wali_siswa`
--
ALTER TABLE `wali_siswa`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `create guru` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
