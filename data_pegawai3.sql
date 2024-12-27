-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 05:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_pegawai3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_diklat`
--

CREATE TABLE `tb_diklat` (
  `id_diklat` int(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `kursus` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `title` varchar(50) NOT NULL,
  `size` varchar(500) NOT NULL,
  `ekstensi` varchar(500) NOT NULL,
  `filename` varchar(500) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_diklat`
--

INSERT INTO `tb_diklat` (`id_diklat`, `nip`, `kursus`, `mulai`, `selesai`, `title`, `size`, `ekstensi`, `filename`, `tempat`, `keterangan`) VALUES
(1, '21120121120025', 'Bahasa Inggris', '2023-07-04', '2023-07-11', '', '', '', 'Screenshot 2023-03-09 044654.png', 'Bogor', 'Lulus'),
(5, '198302262008121001', 'PRAJABAT GOL III', '2009-04-14', '2009-04-14', '', '', '', 'Pipin Dien L..png', 'APARATUR PERHUBUNGAN', 'LULUS'),
(15, '197805142000121001', 'Sertifikasi Kompetensi PPSPM', '2022-07-05', '2022-07-05', '', '', '', 'SERTIFIKAT_AHLI.PENGADAAN.NASIONAL.2009.pdf', 'Jakarta', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluarga`
--

CREATE TABLE `tb_keluarga` (
  `id_keluarga` int(10) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `hubungan` enum('','Isteri/ Suami','Anak','Orang Tua Kandung','Saudara Kandung','Bapak/ Ibu Mertua') NOT NULL,
  `nip` varchar(50) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('','P','L') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_nikah` date NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `filename` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keluarga`
--

INSERT INTO `tb_keluarga` (`id_keluarga`, `NIK`, `hubungan`, `nip`, `id_pegawai`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `tanggal_nikah`, `pekerjaan`, `keterangan`, `filename`) VALUES
(9, '7768978', 'Anak', '21120121120025', '', 'Zayn Malik', '', 'Nganjuk', '2023-08-21', '0000-00-00', '-', 'Anak', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(50) NOT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `id_pendidikan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('','P','L') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status` enum('','Data Penelitian dan Informasi','Tata Usaha','Observasi') NOT NULL,
  `golongan` enum('','I A/ Juru Muda','I B/ Juru Muda Tingkat 1','I C/ Juru','I D/ Juru Tingkat 1','II A/ Pengatur Muda','II B/ Pengatur Muda Tingkat 1','II C/ Pengatur','II D/ Pengatur Tingkat 1','III A/ Penata Muda','III B/ Penata Muda Tingkat 1','III C/ Penata','III D/ Penata Tingkat 1','IV A/ Pembina','IV B/ Pembina Tingkat 1','IV C/ Pembina Utama Muda','IV D/ Pembina Utama Madya','IV E/ Pembina Utama') NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `id_pengguna`, `id_pendidikan`, `nama`, `jenis_kelamin`, `tempat_lahir`, `date`, `agama`, `email`, `alamat`, `no_hp`, `status`, `golongan`, `foto`) VALUES
('196607231989031001', '37', '', 'Denny Sukmana', 'L', 'Semarang', '1966-07-21', 'Islam', '-', '-', '0', 'Tata Usaha', 'III B/ Penata Muda Tingkat 1', ''),
('196703041990031001', '3', '', 'SUKASNO', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('196806231989031001', '24', '', 'Joko Cahyono', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('196901241992021001', '34', '', 'Achmad Sulistyo', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('196904011997031001', '15', '', 'Budi Hariyanto', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('196907311994022001', '25', '', 'Muryanti', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('196910041990032001', '11', '', 'Hesty Panitiastuti', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('196912111993021002', '16', '', 'Nurfitriyanto', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197001281992022001', '9', '', 'Sulistiyowati', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197003131993032001', '38', '', 'Rini Suryati', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197209051995032001', '6', '', 'Septima Ernawati', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197211131995031002', '8', '', 'Tris Adi', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197409221998032002', '33', '', 'Tutik Suprihatin', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197502222009111001', '20', '', 'Taufan Hermawan', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197602082006041009', '42', '', 'Jumari', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197602231999031001', '17', '', 'Rudi Setyo', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197604192008012015', '27', '', 'Sri Endah', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197607222006041003', '22', '', 'Abdul Latif', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197611141997031001', '12', '', 'Edy Susanto', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197706282000121002', '10', '', 'Zauyik Nana', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197801221998031001', '7', '', 'Iis Widya', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('197805142000121001', '4', '', 'Wahyu Prasetya', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198003042009112001', '39', '', 'Rr. Fitri Damaryanti', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198007302008011013', '21', '', 'Ikhsan Yuliyono', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198107212008121002', '29', '', 'Sidiq Prasetyo', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198112052006042002', '30', '', 'Restu Tresnawati', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198210022006042005', '13', '', 'Nursamsiah', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198302262008121001', '18', '', 'R. Teguh Prayitno', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198310012009111001', '35', '', 'Afandi', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198403262008122002', '31', '', 'Ema Tri Catur', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198408112006042002', '28', '', 'Umaroh', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198503082007012003', '19', '', 'Rosyidah', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198512282008011004', '23', '', 'Indri Budiarto', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198607142008122001', '32', '', 'Nurul Intan', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198609212008011004', '14', '', 'Eko Taufiq', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198708302012121003', '41', '', 'Aris Herizaldi', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('198910102010122001', '26', '', 'Stefani Putri', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('199109152015022001', '36', '', 'Noris Mestika', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('199310132013122001', '40', '', 'Hana Amalina', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('199712022023021001', '43', '', 'Bagus Reza Falehvi', '', '', '0000-00-00', '', '', '', '', '', '', ''),
('21120121120007', '1', '0', 'Admin', 'P', 'Banyumas', '2023-07-23', 'Islam', 'joejoeshepira@yahoo.com', 'Karang roto', '08574050948', 'Data Penelitian dan Informasi', 'IV A/ Pembina', 'WhatsApp Image 2023-07-22 at 23.40.47.jpeg'),
('21120121120025', '2', '1', 'Pipin Dien L', 'P', 'Banyumas', '2023-07-13', 'Islam', 'pipindnvn@gmail.com', 'Jl. Perum Griya Utama Banjar Dowo Baru, Flamboyan 2 RT12 RW11', '08315480774', 'Data Penelitian dan Informasi', 'I D/ Juru Tingkat 1', 'Pipin Foto - Copy.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `pangkat` enum('','I A/ Juru Muda','I B/ Juru Muda Tingkat 1','I C/ Juru','I D/ Juru Tingkat 1','II A/ Pengatur Muda','II B/ Pengatur Muda Tingkat 1','II C/ Pengatur','II D/ Pengatur Tingkat 1','III A/ Penata Muda','III B/ Penata Muda Tingkat 1','III C/ Penata','III D/ Penata Tingkat 1','IV A/ Pembina','IV B/ Pembina Tingkat 1','IV C/ Pembina Utama Muda','IV D/ Pembina Utama Madya','IV E/ Pembina Utama') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `date_mulai` date NOT NULL,
  `gaji` varchar(50) NOT NULL,
  `pejabat` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `date_sk` date NOT NULL,
  `filename` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `nip`, `pangkat`, `jabatan`, `date_mulai`, `gaji`, `pejabat`, `nomor`, `date_sk`, `filename`) VALUES
(32, '197805142000121001', 'II B/ Pengatur Muda Tingkat 1', 'Kepala Sub Bagian Tata Usaha Stasiun Klimatologi K', '2000-12-01', 'Rp 10.000.000', '-', '2001', '2017-10-01', 'Sk. CPNS IIb.pdf'),
(33, '197805142000121001', 'IV A/ Pembina', 'Kepala Sub Bagian Tata Usaha Stasiun Klimatologi K', '2017-10-01', '-', '-', '2017', '2017-10-01', 'SK.KP_WAHYU.IVa.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `tingkat` enum('','SD','SMP','SMA','S1','S2','S3') NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `tahun_lulus` int(30) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `nama_kepala` varchar(50) NOT NULL,
  `tgl_up` date NOT NULL,
  `filename` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `nip`, `id_pegawai`, `tingkat`, `nama_sekolah`, `jurusan`, `tahun_lulus`, `kota`, `nama_kepala`, `tgl_up`, `filename`) VALUES
(2, '21120121120025', '', 'SMP', 'SMP 1Solo', '-', 2012, 'Solo', 'Irawan', '2023-06-25', ''),
(29, '197805142000121001', '', 'S1', 'Universitas Negeri Makasar', 'Fisika', 2006, 'Makasar', '-', '2006-07-22', 'IJAZAH_S.1_WAHYU.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','User','PPNPN') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '123', 'Administrator'),
(2, 'Pipin Dien L', 'Pdl12', '1209', 'User'),
(3, 'Sukasno', '196703041990031001', '196703041990031001', 'User'),
(4, 'Wahyu Prasetya', '197805142000121001', '197805142000121001', 'User'),
(5, 'Tuban Wiyoso', '196306281989031001', '196306281989031001', 'User'),
(6, 'Septima Ernawati', '197209051995032001', '197209051995032001', 'User'),
(7, 'Iis Widya', '197801221998031001', '197801221998031001', 'User'),
(8, 'Tris Adi', '197211131995031002', '197211131995031002', 'User'),
(9, 'Sulistiyowati', '197001281992022001', '197001281992022001', 'User'),
(10, 'Zauyik Nana', '197706282000121002', '197706282000121002', 'User'),
(11, 'Hesty Panitiastuti', '196910041990032001', '196910041990032001', 'User'),
(12, 'Edy Susanto', '197611141997031001', '197611141997031001', 'User'),
(13, 'Nursamsiah', '198210022006042005', '198210022006042005', 'User'),
(14, 'Eko Taufiq', '198609212008011004', '198609212008011004', 'User'),
(15, 'Budi Hariyanto', '196904011997031001', '196904011997031001', 'User'),
(16, 'Nurfitriyanto', '196912111993021002', '196912111993021002', 'User'),
(17, 'Rudi Setyo', '197602231999031001', '197602231999031001', 'User'),
(18, 'R. Teguh Prayitno', '198302262008121001', '198302262008121001', 'User'),
(19, 'Rosyidah', '198503082007012003', '198503082007012003', 'User'),
(20, 'Taufan Hermawan', '197502222009111001', '197502222009111001', 'User'),
(21, 'Ikhsan Yuliyono', '198007302008011013', '198007302008011013', 'User'),
(22, 'Abdul Latif', '197607222006041003', '197607222006041003', 'User'),
(23, 'Indri Budiarto', '198512282008011004', '198512282008011004', 'User'),
(24, 'Joko Cahyono', '196806231989031001', '196806231989031001', 'User'),
(25, 'Muryanti ', '196907311994022001', '196907311994022001', 'User'),
(26, 'Stefani Putri', '198910102010122001', '198910102010122001', 'User'),
(27, 'Sri Endah', '197604192008012015', '197604192008012015', 'User'),
(28, 'Umaroh', '198408112006042002', '198408112006042002', 'User'),
(29, 'Sidiq Prasetyo', '198107212008121002', '198107212008121002', 'User'),
(30, 'Restu Tresnawati', '198112052006042002', '198112052006042002', 'User'),
(31, 'Ema Tri Catur', '198403262008122002', '198403262008122002', 'User'),
(32, 'Nurul Intan', '198607142008122001', '198607142008122001', 'User'),
(33, 'Tutik Suprihatin', '197409221998032002', '197409221998032002', 'User'),
(34, 'Achmad Sulistyo', '196901241992021001', '196901241992021001', 'User'),
(35, 'Afandi', '198310012009111001', '198310012009111001', 'User'),
(36, 'Noris Mestika', '199109152015022001', '199109152015022001', 'User'),
(37, 'Denny Sukmana', '196607231989031001', '196607231989031001', 'User'),
(38, 'Rini Suryati', '197003131993032001', '197003131993032001', 'User'),
(39, 'Rr. Fitri Damaryanti', '198003042009112001', '198003042009112001', 'User'),
(40, 'Hana Amalina', '199310132013122001', '199310132013122001', 'User'),
(41, 'Aris Herizaldi', '198708302012121003', '198708302012121003', 'User'),
(42, 'Jumari', '197602082006041009', '197602082006041009', 'User'),
(43, 'Bagus Reza Falehvi', '199712022023021001', '199712022023021001', 'User'),
(44, 'Agung Yulianto', '001', '001', 'PPNPN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppnpn`
--

CREATE TABLE `tb_ppnpn` (
  `id_pegawai` varchar(50) NOT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `id_pengguna` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `status` enum('','Sopir','Security','Kebersihan') NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `golongan` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_ppnpn`
--

INSERT INTO `tb_ppnpn` (`id_pegawai`, `nip`, `id_pengguna`, `nama`, `jenis_kelamin`, `tempat_lahir`, `date`, `agama`, `email`, `alamat`, `no_hp`, `status`, `jabatan`, `golongan`, `foto`) VALUES
('001', NULL, '44', 'Agung Yulianto', '', '', '0000-00-00', '', '', '', '', '', '', '', 'koeching.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bidang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_profil`, `alamat`, `bidang`) VALUES
(1, 'Stasiun Klimatologi Jawa Tengah', 'Jl. Siliwangi No.291, Kalibanteng Kulon, Kec. Semarang Barat', 'Jasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_diklat`
--
ALTER TABLE `tb_diklat`
  ADD PRIMARY KEY (`id_diklat`);

--
-- Indexes for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_ppnpn`
--
ALTER TABLE `tb_ppnpn`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_diklat`
--
ALTER TABLE `tb_diklat`
  MODIFY `id_diklat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_keluarga`
--
ALTER TABLE `tb_keluarga`
  MODIFY `id_keluarga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
