-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2022 pada 05.20
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `email`, `username`, `password`, `no_hp`, `alamat`, `agama`, `tempat_lahir`, `tanggal_lahir`) VALUES
(2, 'Zahira', 'zahiraira@gmail.com', 'ira', 'zahir123', '097678567456', 'Garut', 'Islam', 'Yogya', '1998-11-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_periksa`
--

CREATE TABLE `daftar_periksa` (
  `daftar_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_periksa`
--

INSERT INTO `daftar_periksa` (`daftar_id`, `pasien_id`, `dokter_id`, `tanggal`, `keluhan`) VALUES
(2, 1, 2, '2022-11-22', 'Pusing, dll');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `dokter_id` int(11) NOT NULL,
  `dokter_nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_praktek` varchar(20) NOT NULL,
  `poliklinik_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`dokter_id`, `dokter_nama`, `email`, `username`, `password`, `no_hp`, `alamat`, `agama`, `tempat_lahir`, `tanggal_lahir`, `no_praktek`, `poliklinik_id`) VALUES
(2, 'Rida Amalia, Sp.BS', 'rida@gmail.com', 'dr.rida', 'rida123', '087456543678', 'Bandung', 'Islam', 'Bandung', '1995-07-23', '01', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `jadwal_id` int(11) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `dokter_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`jadwal_id`, `waktu_mulai`, `waktu_selesai`, `dokter_id`) VALUES
(2, '00:00:13', '00:00:17', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1667816641),
('m130524_201442_init', 1667816647),
('m190124_110200_add_verification_token_column_to_user_table', 1667816647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) NOT NULL,
  `obat_nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `produksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `obat_nama`, `harga`, `stok`, `satuan`, `produksi`) VALUES
(1, 'Paramex', 3000, 30, 'box', 'PT KONIMEX'),
(2, 'Ultraflu', 2500, 30, 'box', 'PT HENSON FARMA'),
(3, 'Paracetamol', 4500, 30, 'box', 'PT Kimia Farma'),
(4, 'Entrostop', 5000, 24, 'box', 'PT Konimex'),
(5, 'Albothyl Konsentrate 5 ml', 2300, 6, 'box', 'PT. Pharos'),
(6, 'Clarithromycin', 6000, 24, 'box', 'PT Kimia Farma');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `pasien_id` int(11) NOT NULL,
  `pasien_nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`pasien_id`, `pasien_nama`, `email`, `username`, `password`, `no_hp`, `alamat`, `agama`, `tempat_lahir`, `tanggal_lahir`) VALUES
(1, 'Sani', 'sani@gmail.com', 'sani', 'sani123', '089765345678', 'Makam Godog', 'Islam', 'Garut', '2000-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `pegawai_id` int(11) NOT NULL,
  `pegawai_nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(40) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`pegawai_id`, `pegawai_nama`, `email`, `username`, `password`, `no_hp`, `alamat`, `agama`, `tempat_lahir`, `tanggal_lahir`) VALUES
(2, 'Fikri Ramdani', 'deki@gmail.com', 'deki', 'deki123', '08765342345', 'Garut', 'Islam', 'Garut', '2000-01-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `biaya_periksa` varchar(20) NOT NULL,
  `total` varchar(20) NOT NULL,
  `resep_id` int(11) NOT NULL,
  `periksa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `biaya_periksa`, `total`, `resep_id`, `periksa_id`) VALUES
(2, '500.000', '100.000', 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periksa`
--

CREATE TABLE `periksa` (
  `periksa_id` int(11) NOT NULL,
  `bb` int(3) NOT NULL,
  `tb` int(3) NOT NULL,
  `goldar` varchar(2) NOT NULL,
  `diagnosa` text NOT NULL,
  `catatan` text NOT NULL,
  `dokter_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `tindakan_id` int(2) NOT NULL,
  `daftar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `periksa`
--

INSERT INTO `periksa` (`periksa_id`, `bb`, `tb`, `goldar`, `diagnosa`, `catatan`, `dokter_id`, `pasien_id`, `tindakan_id`, `daftar_id`) VALUES
(2, 50, 156, 'b', '-', '-', 2, 1, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `poliklinik`
--

CREATE TABLE `poliklinik` (
  `poliklinik_id` int(2) NOT NULL,
  `poliklinik_nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `poliklinik`
--

INSERT INTO `poliklinik` (`poliklinik_id`, `poliklinik_nama`, `keterangan`) VALUES
(3, 'Poliklinik Bedah', 'Tersedia bedah umum, bedah kardiotorasik, bedah onkologi, bedah urologi, bedah anak, bedah plastik, bedah thoraks.'),
(4, 'Poliklinik Penyakit Dalam', 'Tersedia klinik penyakit dalam umum, lansia, endokrin & metabolisme, infeksi, paru dan asma, ginjal dan hipertensi.'),
(5, 'Poliklinik Kebidanan dan Kandungan', 'Tersedia obstetri umum, ginekologi umum, onkologi, endokrinologi, uroginekologi, infertilitas, keluarga berencana, USG , dan fetomaternal diagnostic'),
(6, 'Poliklinik Anak', 'Tersedia kesehatan anak umum, hemato-onkologi, respirologi, gastro-hepatologi, neuropediatri, kardiologi, infeksi, nefrologi, tumbuh kembang dan pediatri sosial, thalassemia.'),
(7, 'Poliklinik Bedah Saraf', 'Tersedia umum, trauma, infeksi dan fungsional, vaskular/pembuluh darah, tulang belakang dan saraf perifer, skull base (Tumor), onkologi, dan anak/pediatric');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `resep_id` int(11) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `obat_id` int(11) NOT NULL,
  `periksa_id` int(11) NOT NULL,
  `aturan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resep`
--

INSERT INTO `resep` (`resep_id`, `total_harga`, `obat_id`, `periksa_id`, `aturan`) VALUES
(2, '500.000', 1, 2, '2 kali sehari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `tindakan_id` int(2) NOT NULL,
  `tindakan_nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`tindakan_id`, `tindakan_nama`, `harga`) VALUES
(1, 'Operasi', 500000),
(2, 'Rawat inap', 300000),
(3, 'Gawat darurat', 3500000),
(4, 'Konsultasi', 90000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `role`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'adminklinik', 'BKaPElAA2KEOqudHrXkjrN8Kff6PwF13', '$2y$13$zHec5OlfZr57AvpdI/q07Ocg9xZKpxwd26Dy0FlmgkunvFoOvS6yO', NULL, 'adminklinik@gmail.com', 10, 0, 1667823034, 1667823034, '2zakBMZ4wO1ayzALbxRq57kKIEWmvLxP_1667823034'),
(2, 'iyul', 'Hz8qXdvHwueL80Y20O47RRqKT3DtfBCR', '$2y$13$bKJ0PE3zKUU4UyhxMV6ZzuIUGaW/ZPCnR8c4LDo2lBCvP8HVqJk4C', '', 'iyul@gmail.com', 10, 0, 1668055465, 1668055465, 'AOIdXhjgDZiLLCtfYiegbVkMaX-Z-kLq_1668055465'),
(4, 'iyul2', 'Gx4V_IErmH8kha5q20wZOnnoDMYBghWX', '$2y$13$pOkRsYCuNNCezXWvriTfJ.iO4Di/NJ4n0AHSaXzl.HgbbrMfRmiv.', NULL, 'saryshantika@gmail.com', 9, 0, 1669431027, 1669431027, '3LxsyB3WdrTrGpCcNdx5AZlCWRodYH2H_1669431026');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `daftar_periksa`
--
ALTER TABLE `daftar_periksa`
  ADD PRIMARY KEY (`daftar_id`),
  ADD KEY `pasien_id` (`pasien_id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`dokter_id`),
  ADD KEY `poliklinik_id` (`poliklinik_id`);

--
-- Indeks untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `dokter_id` (`dokter_id`);

--
-- Indeks untuk tabel `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`pegawai_id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `resep_id` (`resep_id`),
  ADD KEY `periksa_id` (`periksa_id`);

--
-- Indeks untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`periksa_id`),
  ADD KEY `dokter_id` (`dokter_id`),
  ADD KEY `pasien_id` (`pasien_id`),
  ADD KEY `tindakan_id` (`tindakan_id`),
  ADD KEY `daftar_id` (`daftar_id`);

--
-- Indeks untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`poliklinik_id`);

--
-- Indeks untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`resep_id`),
  ADD KEY `obat_id` (`obat_id`),
  ADD KEY `periksa_id` (`periksa_id`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`tindakan_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `daftar_periksa`
--
ALTER TABLE `daftar_periksa`
  MODIFY `daftar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `dokter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `periksa`
--
ALTER TABLE `periksa`
  MODIFY `periksa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `poliklinik_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `resep`
--
ALTER TABLE `resep`
  MODIFY `resep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `tindakan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_periksa`
--
ALTER TABLE `daftar_periksa`
  ADD CONSTRAINT `daftar_periksa_ibfk_1` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`pasien_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `daftar_periksa_ibfk_2` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`poliklinik_id`) REFERENCES `poliklinik` (`poliklinik_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `dokter_id` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `periksa_id` FOREIGN KEY (`periksa_id`) REFERENCES `periksa` (`periksa_id`);

--
-- Ketidakleluasaan untuk tabel `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`dokter_id`) REFERENCES `dokter` (`dokter_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`tindakan_id`) REFERENCES `tindakan` (`tindakan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_3` FOREIGN KEY (`daftar_id`) REFERENCES `daftar_periksa` (`daftar_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_4` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`pasien_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `obat_id` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`periksa_id`) REFERENCES `periksa` (`periksa_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
