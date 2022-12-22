-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2022 pada 14.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typodeo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_movies` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_film` int(100) NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `foto_film` varchar(255) NOT NULL,
  `waktu_film` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_movies`, `id`, `id_film`, `nama_film`, `foto_film`, `waktu_film`) VALUES
(851742, 3, 505642, 'Black Panther: Wakanda Forever', '/sv1xJUazXeYqALzczSZ3O6nkH75.jpg', 'Nov 22, 2022'),
(851745, 8, 436270, 'Black Adam', '/pFlaoHTZeyNkG83vxsAJiGzfSsa.jpg', 'Nov 22, 2022'),
(851747, 8, 851644, '20세기 소녀', '/od22ftNnyag0TTxcnJhlsu3aLoU.jpg', 'Nov 22, 2022'),
(851748, 3, 900667, 'ONE PIECE FILM RED', '/m80kPdrmmtEh9wlLroCp0bwUGH0.jpg', 'Nov 22, 2022'),
(851750, 3, 676701, 'Tadeo Jones 3: La Tabla Esmeralda', '/jvIVl8zdNSOAJImw1elQEzxStMN.jpg', 'Nov 22, 2022'),
(851751, 8, 551271, 'Medieval', '/4njdAkiBdC5LnFApeXSkFQ78GdT.jpg', 'Nov 22, 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_doang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`, `foto_doang`) VALUES
(3, 'dira', 'diraa', 'dira@gmail.com', '$2y$10$J79U/DYKYSGRpd/Ce4WpheewJWDC0GETBUMdcK8I2JPAsu5oKFO.m', 'Rulect JS.png'),
(8, 'aryadira', 'aryadira', 'arya@gmail.com', '$2y$10$89u/eCk5y0qVSLeU49EYpu.XiKluRr6HeErbqOhRjnNwu19vua8Dq', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_movies`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_movies` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=851752;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
