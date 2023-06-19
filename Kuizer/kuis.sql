-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 07.26
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `benar` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_pertanyaan`, `deskripsi`, `benar`) VALUES
(1, 1, 'Random Access Memory', 1),
(2, 1, 'Read-Only Memory', 0),
(3, 1, 'Random Algorithm Machine', 0),
(4, 1, 'Remote Access Manager', 0),
(5, 2, 'Menyimpan data dan program komputer', 0),
(6, 2, 'Menyediakan koneksi antara berbagai komponen komputer', 1),
(7, 2, 'Memproses instruksi-instruksi komputer', 0),
(8, 2, 'Menyediakan tampilan visual pada layar monitor', 0),
(9, 3, 'Perangkat keras untuk menyimpan data', 0),
(10, 3, 'Perangkat lunak untuk mengedit gambar', 0),
(11, 3, 'Perlindungan keamanan untuk mencegah akses yang tidak sah ke jaringan\r\n', 1),
(12, 3, 'Layar sentuh untuk mengoperasikan komputer', 0),
(13, 4, 'Perangkat keras adalah komponen fisik komputer, sedangkan perangkat lunak adalah instruksi-instruksi yang dieksekusi oleh komputer.', 1),
(14, 4, 'Perangkat keras adalah instruksi-instruksi yang dieksekusi oleh komputer, sedangkan perangkat lunak adalah komponen fisik komputer.', 0),
(15, 4, 'Perangkat keras dan perangkat lunak adalah istilah yang sama dan dapat saling dipertukarkan.', 0),
(16, 4, 'Perangkat keras dan perangkat lunak adalah perangkat yang berfungsi menyimpan data dan program komputer.', 0),
(17, 5, 'Perangkat keras yang mengendalikan operasi komputer', 0),
(18, 5, 'Perangkat lunak yang mengelola sumber daya komputer dan menyediakan antarmuka untuk pengguna', 1),
(19, 5, 'Perangkat keras yang menyediakan tampilan visual pada layar monitor', 0),
(20, 5, 'Perangkat lunak yang mengubah kode-kode bahasa manusia menjadi bahasa mesin', 0),
(21, 6, 'ENIAC', 1),
(22, 6, 'UNIVAC I', 0),
(23, 6, 'IBM 650', 0),
(24, 6, 'Apple I', 0),
(25, 7, 'Pengurangan kebutuhan daya', 0),
(26, 7, 'Perkembangan dalam teknologi tampilan', 0),
(27, 7, 'Miniaturisasi komponen elektronik', 1),
(28, 7, 'Peningkatan kapasitas penyimpanan', 0),
(29, 8, 'Penggunaan transistor sebagai pengganti tabung vakum', 1),
(30, 8, 'Perkembangan sistem operasi', 0),
(31, 8, 'Pengenalan mikroprosesor', 0),
(32, 8, 'Peningkatan kecepatan pemrosesan', 0),
(33, 9, 'Proses komputer untuk menyimpan dan mengelola data', 0),
(34, 9, 'Kemampuan komputer untuk memproses instruksi-instruksi', 0),
(35, 9, 'Penggunaan komputer untuk mengelola sumber daya', 0),
(36, 9, 'Simulasi kecerdasan manusia oleh komputer', 1),
(37, 10, 'Jaringan komputer yang menghubungkan perangkat-perangkat elektronik', 0),
(38, 10, 'Penggunaan komputer dalam industri manufaktur', 0),
(39, 10, 'Pengembangan perangkat keras komputer', 0),
(40, 10, 'Konsep bahwa objek-objek dapat terhubung ke internet dan saling berkomunikasi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_profile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `id_role`, `id_profile`) VALUES
(18, 'abdilah', '202cb962ac59075b964b07152d234b70', 2, NULL),
(19, 'budi', '202cb962ac59075b964b07152d234b70', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `deskripsi`, `skor`) VALUES
(1, 'Apa kepanjangan dari singkatan RAM pada komputer?', 1),
(2, 'Apa fungsi dari motherboard pada komputer?', 1),
(3, 'Apa yang dimaksud dengan istilah \"firewall\" pada komputer?', 1),
(4, 'Apa perbedaan antara perangkat keras (hardware) dan perangkat lunak (software)?', 1),
(5, 'Apa yang dimaksud dengan sistem operasi (operating system)?', 1),
(6, 'Komputer pertama yang dianggap sebagai komputer modern adalah:', 1),
(7, 'Perkembangan apa yang memungkinkan ukuran komputer menjadi lebih kecil dari waktu ke waktu?', 1),
(8, 'Komputer generasi ketiga (1965-1971) ditandai dengan:', 1),
(9, 'Apa yang dimaksud dengan \"kecerdasan buatan\" (artificial intelligence) dalam konteks perkembangan komputer?', 1),
(10, 'Apa yang dimaksud dengan \"Internet of Things\" (IoT) dalam perkembangan komputer?', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kelas` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `biografi` varchar(100) DEFAULT NULL,
  `jenis_kelamin` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `nama`, `kelas`, `alamat`, `biografi`, `jenis_kelamin`, `foto`) VALUES
(1, '-', '-', '-', '-', 0, 'unknown.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'student');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pertanyaan` (`id_pertanyaan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profile` (`id_profile`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `id_pertanyaan` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id`);

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
