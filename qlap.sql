-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2019 pada 07.24
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlap`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cyi_kategori`
--

CREATE TABLE `cyi_kategori` (
  `id` int(11) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `keterangan` text NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cyi_kategori`
--

INSERT INTO `cyi_kategori` (`id`, `slug`, `nama`, `keterangan`, `logo`) VALUES
(4, 'bus-kota', 'Bus Kota', 'Bus Kota adalah alat transportasi bus dalam kota.', 'trans-logo.png'),
(5, 'angkudes', 'Angkudes', 'Akutan Desa demi menunjangnya transportasi di desa-desa.', 'akutan-logo.png'),
(6, 'bandara', 'Bandara', 'Bandara adalah stasiun penerbangan pesawat', 'bandara-logo.png'),
(7, 'dermaga', 'Dermaga', 'Dermaga adalah tempat pemberhentian kapal ataupun stasiun kapal laut', 'dermaga-logo.png'),
(8, 'stasiun-kereta-api', 'Stasiun Kereta Api', 'Stasiun Kereta api demi menunjangnya transportasi darat jarak jauh.', 'stasiun-kereta-logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cyi_kecamatan`
--

CREATE TABLE `cyi_kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `informasi` text NOT NULL,
  `baner` varchar(200) DEFAULT NULL,
  `wilayah` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cyi_kecamatan`
--

INSERT INTO `cyi_kecamatan` (`id`, `nama`, `informasi`, `baner`, `wilayah`) VALUES
(13, 'Babakancikao', 'Babakancikao adalah sebuah kecamatan di Kabupaten Purwakarta, Provinsi Jawa Barat, Indonesia. Berbatasan dengan Kabupaten Karawang, kecamatan Jatiluhur di barat, kecamatan Bungursari di timur, dan kecamatan Purwakarta di selatan.', NULL, '{\"area\":\"58327200.82\",\"corner\":\"30\",\"lat\":\"-6.48685896235824\",\"lng\":\"107.42465396753599\",\"coords\":[{\"lat\":\"-6.454763182992385\",\"lng\":\"107.43381983604627\"},{\"lat\":\"-6.456468912143079\",\"lng\":\"107.42043024864392\"},{\"lat\":\"-6.453057448096576\",\"lng\":\"107.40463740196424\"},{\"lat\":\"-6.455445475342164\",\"lng\":\"107.39605433311658\"},{\"lat\":\"-6.457151202194375\",\"lng\":\"107.38197810020642\"},{\"lat\":\"-6.460562638655674\",\"lng\":\"107.37442499962049\"},{\"lat\":\"-6.465338611057497\",\"lng\":\"107.3751116451283\"},{\"lat\":\"-6.467385442563963\",\"lng\":\"107.37957484092908\"},{\"lat\":\"-6.47182021572242\",\"lng\":\"107.37854487266736\"},{\"lat\":\"-6.477278344615267\",\"lng\":\"107.3809481319447\"},{\"lat\":\"-6.48034851617893\",\"lng\":\"107.38472468223767\"},{\"lat\":\"-6.487853301314784\",\"lng\":\"107.38472468223767\"},{\"lat\":\"-6.495016855575612\",\"lng\":\"107.38850123253064\"},{\"lat\":\"-6.499792501775662\",\"lng\":\"107.39468104210096\"},{\"lat\":\"-6.502180307871265\",\"lng\":\"107.40498072471814\"},{\"lat\":\"-6.512072526540218\",\"lng\":\"107.41150385704236\"},{\"lat\":\"-6.518553529636009\",\"lng\":\"107.42043024864392\"},{\"lat\":\"-6.533220753525627\",\"lng\":\"107.42352015342908\"},{\"lat\":\"-6.539019304887732\",\"lng\":\"107.4248934444447\"},{\"lat\":\"-6.535267308742359\",\"lng\":\"107.43244654503064\"},{\"lat\":\"-6.529127617979341\",\"lng\":\"107.43725306358533\"},{\"lat\":\"-6.530833095191928\",\"lng\":\"107.4461794551869\"},{\"lat\":\"-6.517530218924506\",\"lng\":\"107.44995600547986\"},{\"lat\":\"-6.509002548492266\",\"lng\":\"107.46025568809705\"},{\"lat\":\"-6.502521422102019\",\"lng\":\"107.4571657833119\"},{\"lat\":\"-6.495699093522372\",\"lng\":\"107.4626589473744\"},{\"lat\":\"-6.473525887339782\",\"lng\":\"107.46574885215955\"},{\"lat\":\"-6.472502485060657\",\"lng\":\"107.4575091060658\"},{\"lat\":\"-6.456468912143079\",\"lng\":\"107.45613581505017\"},{\"lat\":\"-6.455445475342164\",\"lng\":\"107.4410296138783\"}]}'),
(14, 'Bojong', 'Bojong adalah sebuah kecamatan di Kabupaten Purwakarta, Provinsi Jawa Barat, Indonesia. Berbatasan dengan kecamatan Pondoksalam di utara, kecamatan Darangdan di barat, kecamatan Wanayasa di timur, dan Kabupaten Bandung Barat di selatan.', NULL, '{\"area\":\"114283075.85\",\"corner\":\"13\",\"lat\":\"-6.704093042516337\",\"lng\":\"107.51463924442136\",\"coords\":[{\"lat\":\"-6.6402824762571\",\"lng\":\"107.47567241800357\"},{\"lat\":\"-6.647102821903735\",\"lng\":\"107.46468608987857\"},{\"lat\":\"-6.6716552821562525\",\"lng\":\"107.466746026402\"},{\"lat\":\"-6.707799718948357\",\"lng\":\"107.47498577249576\"},{\"lat\":\"-6.752124139430073\",\"lng\":\"107.50794475687076\"},{\"lat\":\"-6.78348973947188\",\"lng\":\"107.51137798440982\"},{\"lat\":\"-6.777353152049014\",\"lng\":\"107.54777019632388\"},{\"lat\":\"-6.758942921398309\",\"lng\":\"107.56699627054263\"},{\"lat\":\"-6.724848051711886\",\"lng\":\"107.55600994241763\"},{\"lat\":\"-6.674383257412247\",\"lng\":\"107.53472393167544\"},{\"lat\":\"-6.663471265255248\",\"lng\":\"107.54090374124576\"},{\"lat\":\"-6.6375543115283\",\"lng\":\"107.5264841855817\"},{\"lat\":\"-6.630733833584343\",\"lng\":\"107.50313823831607\"}]}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cyi_pengaduan`
--

CREATE TABLE `cyi_pengaduan` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `maps_lat` varchar(100) NOT NULL,
  `maps_lng` varchar(100) NOT NULL,
  `maps_zoom` varchar(100) NOT NULL,
  `maps_alamat` text NOT NULL,
  `status` int(1) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cyi_pengaduan`
--

INSERT INTO `cyi_pengaduan` (`id`, `id_kategori`, `id_pengguna`, `judul`, `keterangan`, `maps_lat`, `maps_lng`, `maps_zoom`, `maps_alamat`, `status`, `waktu`) VALUES
(1, 6, 5, 'Bandara Bocor', 'Apalah', '-6.6402824762571', '107.47567241800357', '11', 'Jl. Pangeran Puger No.32a, Kudus, Demaan, Kec. Bojong, Kabupaten Kudus, Jawa Tengah 59313, Indonesia', 2, '2019-08-16 09:03:52'),
(2, 6, 5, 'Bandara Bocor', 'Apalah', '-6.647102821903735', '107.46468608987857', '11', 'Jl. Pangeran Puger No.32a, Kudus, Demaan, Kec. Bojong, Kabupaten Kudus, Jawa Tengah 59313, Indonesia', 4, '2019-08-16 09:13:37'),
(3, 5, 5, 'Akutan', 'Angkutan Keterangan', '-6.8048', '110.84050000000002', '11', 'Jl. Pangeran Puger No.32a, Kudus, Demaan, Kec. Kota Kudus, Kabupaten Kudus, Jawa Tengah 59313, Indonesia', 3, '2019-08-16 09:26:24'),
(4, 8, 6, 'Jalan Masuk Stasiun Kereta Rusak', 'Rusak', '-6.675455332514177', '107.51808153476566', '11', 'Sindangpanon, Bojong, Purwakarta Regency, West Java, Indonesia', 2, '2019-08-17 05:35:22'),
(5, 6, 6, 'Bandara e dalan e bolong', 'Bolong - Bolong POKOE,', '-6.503827624056249', '107.52111606035157', '11', 'Cilandak, Cibatu, Purwakarta Regency, West Java, Indonesia', 1, '2019-08-18 15:56:28'),
(6, 8, 5, 'sd', 'sd', '-6.7847786999999995', '110.86536369999999', '1', 'Kayuapu Kulon, Gondangmanis, Kec. Bae, Kabupaten Kudus, Jawa Tengah, Indonesia', 5, '2019-10-11 07:37:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cyi_pengaduan_gambar`
--

CREATE TABLE `cyi_pengaduan_gambar` (
  `id` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cyi_pengaduan_gambar`
--

INSERT INTO `cyi_pengaduan_gambar` (`id`, `id_pengaduan`, `gambar`) VALUES
(1, 3, 'P8AAK4.jpg'),
(2, 3, 'admin.png'),
(3, 3, '50637492-airport-railway-and-marine-station-bus-and-taxi-stop-subway-flat-icons-set-transportation-public-tra.jpg'),
(4, 4, 'logo-1.png'),
(5, 5, 'kisspng-e-government-electronic-governance-smart-city-smart-governance-solutions-for-smart-cities-e-gov-5baa3c0ad3c997.9885958415378831468675.png'),
(6, 5, 'hero.png'),
(7, 6, 'banner.jpg'),
(8, 6, 'banner-smarthome1 - Copy.jpg'),
(9, 6, 'banner-smarthome1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cyi_pengguna`
--

CREATE TABLE `cyi_pengguna` (
  `id` int(11) NOT NULL,
  `surel` varchar(225) NOT NULL,
  `sandi` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jekel` int(11) DEFAULT NULL,
  `lahir` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `lv` int(11) NOT NULL,
  `token` varchar(225) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cyi_pengguna`
--

INSERT INTO `cyi_pengguna` (`id`, `surel`, `sandi`, `nama`, `jekel`, `lahir`, `status`, `lv`, `token`, `foto`) VALUES
(4, 'staf@qlap.id', '57e4c249477785dcd6248178c40d109098103e52', 'Staf', 2, '1965-12-02', 1, 2, NULL, NULL),
(5, 'admin@qlap.id', '513acc3c3d1758bdb76284a20af618f6362635a5', 'Administrator', 1, '1995-03-02', 1, 1, NULL, 'generate.png'),
(6, 'masyarakat@qlap.id', '204a3ab136d12f616917bd8fb14cb7041386378c', 'Masyarakat', 1, '1921-01-01', 1, 3, NULL, NULL),
(9, 'mail.gilangas@gmail.com', '82427ca5fb314b0431da47bdd53c4ec08fb9f2c4', 'Gilang Adi S', 1, '2022-02-02', 1, 3, '854981', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cyi_kategori`
--
ALTER TABLE `cyi_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cyi_kecamatan`
--
ALTER TABLE `cyi_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cyi_pengaduan`
--
ALTER TABLE `cyi_pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `cyi_pengaduan_gambar`
--
ALTER TABLE `cyi_pengaduan_gambar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indeks untuk tabel `cyi_pengguna`
--
ALTER TABLE `cyi_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cyi_kategori`
--
ALTER TABLE `cyi_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `cyi_kecamatan`
--
ALTER TABLE `cyi_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `cyi_pengaduan`
--
ALTER TABLE `cyi_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `cyi_pengaduan_gambar`
--
ALTER TABLE `cyi_pengaduan_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `cyi_pengguna`
--
ALTER TABLE `cyi_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
