-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2020 pada 12.06
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_tb`
--

CREATE TABLE `post_tb` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `post_tb`
--

INSERT INTO `post_tb` (`id`, `content`, `image`, `id_user`) VALUES
(1, 'Jalan - jalan ke pulau kapuk', 'jalan.jpg', 1),
(2, 'Jalan - jalan ke luar rumah', 'rumah.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_tb`
--

CREATE TABLE `users_tb` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_tb`
--

INSERT INTO `users_tb` (`id`, `name`, `photo`, `email`, `password`) VALUES
(1, 'mochamad', 'default.png', 'megi@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'saputra', 'default.png', 'saputra@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `post_tb`
--
ALTER TABLE `post_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `post_tb`
--
ALTER TABLE `post_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
