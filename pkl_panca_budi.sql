-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2026 pada 03.50
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_panca_budi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok_pkl`
--

CREATE TABLE `kelompok_pkl` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` varchar(100) DEFAULT NULL,
  `id_pembimbing_sekolah` int(11) DEFAULT NULL,
  `id_pembimbing_univ` int(11) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kelompok_pkl`
--

INSERT INTO `kelompok_pkl` (`id_kelompok`, `nama_kelompok`, `id_pembimbing_sekolah`, `id_pembimbing_univ`, `keterangan`) VALUES
(13, 'Kelompok 1 SMKN9MEDAN 2025', 7, 10, '17 Nov 2025 s.d 14 Feb 2026\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing_sekolah`
--

CREATE TABLE `pembimbing_sekolah` (
  `id_pembimbing_sekolah` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `sekolah` varchar(150) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembimbing_sekolah`
--

INSERT INTO `pembimbing_sekolah` (`id_pembimbing_sekolah`, `nama`, `sekolah`, `kontak`) VALUES
(7, 'Hidayati S.Pd', 'SMKN 9 MEDAN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing_univ`
--

CREATE TABLE `pembimbing_univ` (
  `id_pembimbing_univ` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembimbing_univ`
--

INSERT INTO `pembimbing_univ` (`id_pembimbing_univ`, `nama`, `jabatan`, `kontak`) VALUES
(10, 'Pak Dedy', 'Unit UPSS', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_pkl`
--

CREATE TABLE `penilaian_pkl` (
  `id_penilaian` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_pembimbing_univ` int(11) DEFAULT NULL,
  `id_pembimbing_sekolah` int(11) DEFAULT NULL,
  `disiplin` int(11) DEFAULT 0,
  `kehadiran` int(11) DEFAULT 0,
  `keterampilan` int(11) DEFAULT 0,
  `tugas` int(11) DEFAULT 0,
  `nilai_akhir` float GENERATED ALWAYS AS ((`disiplin` + `kehadiran` + `keterampilan` + `tugas`) / 4) STORED,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penilaian_pkl`
--

INSERT INTO `penilaian_pkl` (`id_penilaian`, `id_siswa`, `id_pembimbing_univ`, `id_pembimbing_sekolah`, `disiplin`, `kehadiran`, `keterampilan`, `tugas`, `komentar`, `created_at`) VALUES
(6, 16, 10, 7, 100, 100, 100, 100, 'GANTENG', '2025-12-31 07:17:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nisn` varchar(50) DEFAULT NULL,
  `id_kelompok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `nisn`, `id_kelompok`) VALUES
(16, 'RICHARD SINURAYA', '0076121515', 13),
(17, 'MUHAMMAD RAKHA ALFIANSYAH', '', 13),
(18, 'ABDAN SAJIDAN', '', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'admin',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '2025-12-29 15:06:13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelompok_pkl`
--
ALTER TABLE `kelompok_pkl`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `id_pembimbing_sekolah` (`id_pembimbing_sekolah`),
  ADD KEY `id_pembimbing_univ` (`id_pembimbing_univ`);

--
-- Indeks untuk tabel `pembimbing_sekolah`
--
ALTER TABLE `pembimbing_sekolah`
  ADD PRIMARY KEY (`id_pembimbing_sekolah`);

--
-- Indeks untuk tabel `pembimbing_univ`
--
ALTER TABLE `pembimbing_univ`
  ADD PRIMARY KEY (`id_pembimbing_univ`);

--
-- Indeks untuk tabel `penilaian_pkl`
--
ALTER TABLE `penilaian_pkl`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pembimbing_univ` (`id_pembimbing_univ`),
  ADD KEY `id_pembimbing_sekolah` (`id_pembimbing_sekolah`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelompok` (`id_kelompok`);

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
-- AUTO_INCREMENT untuk tabel `kelompok_pkl`
--
ALTER TABLE `kelompok_pkl`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pembimbing_sekolah`
--
ALTER TABLE `pembimbing_sekolah`
  MODIFY `id_pembimbing_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembimbing_univ`
--
ALTER TABLE `pembimbing_univ`
  MODIFY `id_pembimbing_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penilaian_pkl`
--
ALTER TABLE `penilaian_pkl`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelompok_pkl`
--
ALTER TABLE `kelompok_pkl`
  ADD CONSTRAINT `kelompok_pkl_ibfk_1` FOREIGN KEY (`id_pembimbing_sekolah`) REFERENCES `pembimbing_sekolah` (`id_pembimbing_sekolah`) ON DELETE SET NULL,
  ADD CONSTRAINT `kelompok_pkl_ibfk_2` FOREIGN KEY (`id_pembimbing_univ`) REFERENCES `pembimbing_univ` (`id_pembimbing_univ`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `penilaian_pkl`
--
ALTER TABLE `penilaian_pkl`
  ADD CONSTRAINT `penilaian_pkl_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_pkl_ibfk_2` FOREIGN KEY (`id_pembimbing_univ`) REFERENCES `pembimbing_univ` (`id_pembimbing_univ`) ON DELETE SET NULL,
  ADD CONSTRAINT `penilaian_pkl_ibfk_3` FOREIGN KEY (`id_pembimbing_sekolah`) REFERENCES `pembimbing_sekolah` (`id_pembimbing_sekolah`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelompok`) REFERENCES `kelompok_pkl` (`id_kelompok`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
