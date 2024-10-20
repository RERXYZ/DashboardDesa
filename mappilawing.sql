-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2024 pada 03.17
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mappilawing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `profil` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `profil`, `username`, `email`, `password`) VALUES
(7, '65b1cc472a1a5.png', 'admin nih bos', 'admin@gmail.com', '$2y$10$Ie3sjagUc3ldGDZ4rU/EfOj/Wb/tTjb5j227Zm33x7HSsmqYE1j7u'),
(8, '65b1cfc5218d7.png', 'admin2 nih bos', 'admin2@gmail.com', '$2y$10$db1UsR/ejMbvMLLucj3NIuSifMjDZ1Ez0HboeXxXffKLdcw1GeL8a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `user_id`, `gambar`, `judul`, `isi`, `tanggal_dibuat`, `tanggal_update`) VALUES
(16, 7, '65b1cca880e15.png', 'lsla,lasd6', 'jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd \r\n\r\njjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd \r\njjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd \r\n\r\njjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd jjoasdjoadjapod daojdawodj djoadjawojdowd doawdjowajd ', '2024-01-25 10:51:20', '2024-01-25 10:51:20'),
(19, 8, '65b1e142b6d27.jpeg', 'wdawdwadawdwa', 'ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd \r\n\r\nojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd \r\n\r\nojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd \r\nojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd \r\n\r\n\r\nojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ojada dawidiwd dwiajdiawdnwd awidjwaidna dawidjawd ', '2024-01-25 12:19:14', '2024-01-25 12:19:14'),
(20, 7, '65b7a39fa92fd.png', 'testes', 'dowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkd\r\n\r\ndowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkddowkdoad wodkowkdwdokd wokdoawkd\r\n\r\nakowkdkow owokwaolp adlpaldspadlap wpldpwldpwldl', '2024-01-28 22:03:25', '2024-01-29 21:28:42'),
(21, 7, '65b715312ab71.png', 'berita123', 'Icon of the Seas: World&#039;s largest cruise ship sets sail from Miami\r\n\r\nNewsworthy Event\r\nThe world&#039;s largest cruise ship has set sail from Miami, Florida, on its maiden voyage, but there are concerns about the vessel&#039;s methane emissions.\r\n\r\nBackground Event\r\nThe 365m-long (1,197 ft) Icon of the Seas has 20 decks and can house a maximum of 7,600 passengers. It is owned by Royal Caribbean Group.\r\nThe vessel is going on a seven-day island-hopping voyage in the Caribbean.\r\nEnvironmentalists warn the liquefied natural gas (LNG)-powered ship will leak harmful methane into the air.\r\nBuilt at a shipyard in Turku, Finland, the Bahamas-registered ship has seven swimming pools and six water slides.\r\nIt cost $2bn (£1.6bn) to build and also has more than 40 restaurants, bars and lounges.\r\n\r\n \r\n\r\nAlthough LNG burns more cleanly than traditional marine fuels such as fuel oil, there is a risk that some gas escapes, causing methane to leak into the atmosphere.\r\nMethane is a much more potent greenhouse gas than carbon dioxide.\r\n&quot;It&#039;s a step in the wrong direction,&quot; Bryan Comer, director of the Marine Programme at the International Council on Clean Transportation (ICCT), was quoted as saying by Reuters news agency.\r\n&quot;We would estimate that using LNG as a marine fuel emits over 120% more life-cycle greenhouse gas emissions than marine gas oil,&quot; he said.\r\nEarlier this week, the ICCT released a report arguing that methane emissions from LNG-fuelled ships were higher than current regulations assumed.\r\n\r\n \r\n\r\nA powerful greenhouse gas, methane in the atmosphere traps 80 times more heat than carbon dioxide over 20 years. Cutting these emissions is seen as crucial to slowing down global warming.\r\n\r\nSources\r\nRoyal Caribbean says the Icon of the Seas is 24% more energy efficient than required by the International Maritime Organization for modern ships. The company plans to introduce a net-zero ship by 2035.\r\nThe cruise industry is one of the fastest growing sectors of tourism, with young people in particular interested in cruise holidays, according to the trade body Cruise Lines International Association.\r\nIt said that the cruise industry contributed $75bn (£59bn) to the global economy in 2021.\r\nOn Thursday, Argentina&#039;s World Cup winning captain Lionel Messi, who currently plays for Inter Miami, took part in the ship&#039;s naming ceremony. He was seen placing a football on a specially built stand to trigger the traditional &quot;good luck&quot; breaking of a champagne bottle against the vessel&#039;s bow.\r\n\r\n', '2024-01-29 11:02:09', '2024-01-29 21:09:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booklet`
--

CREATE TABLE `booklet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `dokumen` varchar(200) NOT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_update` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `booklet`
--

INSERT INTO `booklet` (`id`, `user_id`, `gambar`, `judul`, `dokumen`, `tanggal_dibuat`, `tanggal_update`) VALUES
(6, 7, '65b63f1253578.png', 'tes1', '65b63f12537e5.pdf', '2024-01-28 19:48:34', '2024-01-28 19:48:34'),
(7, 7, '65b63f2eaf1ca.png', 'tes2', '65b63f2eaf3ee.pdf', '2024-01-28 19:49:02', '2024-01-28 19:49:02'),
(8, 7, '65b652e1f235e.jpg', 'tes5', '65b652e1f2709.pdf', '2024-01-28 21:13:05', '2024-01-29 10:22:56'),
(10, 7, '65b70c8834894.png', 'tes3', '65b70c8834c12.pdf', '2024-01-29 10:25:12', '2024-01-29 10:26:09'),
(11, 7, '65b70ce616d02.png', 'tes4', '65b70ce6172e0.pdf', '2024-01-29 10:26:46', '2024-01-29 10:26:46'),
(15, 7, '65b7a611c56e2.png', 'adasdadad', '65b7a63101ca8.pdf', '2024-01-29 20:09:04', '2024-01-29 21:20:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT current_timestamp(),
  `diperbarui` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `gambar`, `keterangan`, `dibuat`, `diperbarui`) VALUES
(1, '65b71d3a56588.png', '2', '2023-10-16 21:49:40', '2024-01-29 11:36:26'),
(2, '653850fdc28a0.jpg', '2', '2023-10-16 21:49:40', '2023-10-25 07:19:25'),
(3, '653851e135382.jpg', '3', '2023-10-16 21:50:26', '2023-10-25 07:23:13'),
(4, '6538511338827.jpg', '4', '2023-10-17 23:35:09', '2023-10-25 07:19:47'),
(5, '653066b99c0da.jpg', 'Peta Desa Mappilawing', '2023-10-17 23:35:09', '2023-10-19 07:14:01'),
(6, '65385151902a6.jpg', '5', '2023-10-17 23:35:09', '2023-10-25 07:20:49'),
(7, '65385162091f0.jpg', '6', '2023-10-17 23:35:09', '2023-10-25 07:21:06'),
(8, '653852077bcf6.jpg', '7', '2023-10-17 23:35:09', '2023-10-25 07:23:51'),
(9, '653852113ece8.jpg', '8', '2023-10-17 23:35:09', '2023-10-25 07:24:01'),
(10, '653851ba66622.jpg', '9', '2023-10-17 23:35:09', '2023-10-25 07:22:34'),
(11, '6538522b5532c.jpg', '10', '2023-10-17 23:35:09', '2023-10-25 07:24:27'),
(12, '65385414307f1.jpeg', '11', '2023-10-17 23:35:09', '2023-10-25 07:32:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `teks` longtext NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id`, `logo`, `judul`, `teks`, `tanggal`) VALUES
(19, '6534f91274ea8.jpg', 'adsadadasd', 'wowwoowwoowowow adkaskdad aodkwodkwkdwkd', '2024-01-25 09:47:35'),
(20, '65327fd053d68.jpeg', 'adwdwd', 'dav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa adav aada acfs vad aa a dav aada acfs vad aa adav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa adav aada acfs vad aa a dav aada acfs vad aa adav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa a dav aada acfs vad aa adav aada acfs vad aa a dav aada acfs vad aa adav aada acfs vad aa a ', '2023-10-20 21:25:36'),
(22, '6534f8b742567.jpg', 'reynard anak baik', 'reynard adalah anak yang baik betul. reynard adalah anak yang baik betul. reynard adalah anak yang baik betul. reynard adalah anak yang baik betul. reynard adalah anak yang baik betul. reynard adalah anak yang baik betul. reynard adalah anak yang baik betul. ', '2023-10-20 21:48:28'),
(25, '6535ddbb186da.jpg', 'wowowoowowoow', 'Babak Final sekaligus penutupan Telkom Schools Cup Vol. II bertajuk Sportifity above Rivalty telah dilangsungkan pada 11 Oktober 2023 di Lapangan SMK Telkom Makassar. Pada pertandingan babak final ini dihadiri oleh SMPN 2 Makassar, SMPN 5 Makassar, SMPN 27 Makassar untuk memperebutkan Juara 1, 2, dan 3 tingkat SMP dan SMA Athirah Baruga, SMAN 1 Makassar, SMAN 16 Makassar, MAN 2 Makassar yang juga memperebutkan juara 1, 2, dan 3 tingkat SMA/SMK/MA serta para supporter dari tiap sekolah. Pada penutupan event ini diisi penampilan dari ekskul sanset juga dihadiri oleh Bpk. Yuddy Aryadi – Director Shared Service Yayasan Pendidikan Telkom, Bpk. Arif Rudiana – Director Primary &amp; Secondary Education Yayasan Pendidikan Telkom, Bapak Kepala SMK Telkom Makassar dan juga WAKASEK Kesiswaan SMK Telkom Makassar, Bpk Musliadi, S.ST.\r\n\r\nPenutupan kali ini juga diumumkan pemenang Supporter Terbaik, Best Goal Keeper, Best Player, dan Top Score. Adapun pemenang pada babak final ini ialah:\r\n\r\nSupporter Terbaik\r\n\r\nJuara 1                         : SMAN 16 Makassar\r\n\r\nJuara 2                         : MAN 2 Makassar\r\n\r\nJuara 3                         : SMPN 24 Makassar\r\n\r\n \r\n\r\nPemenang Tingkat SMP/MTs\r\n\r\nBest Goal Keeper       : SMPN 5 Makassar\r\n\r\nBest Player                 : Alfian - SMPN 2 Makassar Tim A\r\n\r\nTop Score                    : Adnan - SMPN 2 Makassar Tim A\r\n\r\nJuara 1                         : SMPN 2 Makassar A\r\n\r\nJuara 2                         : SMPN 2 Makassar Tim B\r\n\r\nJuara 3                         : SMPN 27 Makassar Tim A\r\n\r\n \r\n\r\nPemenang Tingkat SMA/SMK/MA\r\n\r\nBest Goal Keeper       : M. Rayhan - SMAN 16 Makassar\r\n\r\nBest Player                 : Revan Jaya – SMAN 16 Makassar\r\n\r\nTop Score                    : SMA Athirah Baruga\r\n\r\nJuara 1                         : SMAN 16 Makassar\r\n\r\nJuara 2                         : MAN 2 Makassar\r\n\r\nJuara 3                         : SMAN 1 Makassar Tim A\r\n\r\nSelamat kepada para pemenang, semoga menjadi motivasi kepada siapapun dan terima kasih kepada seluruh pihak yang telah memberikan supportnya dalam bentuk apapun. Event ini disponsori oleh Telkom University, Universitas Ciputra Makassar, PT. Telkom Akses, Penerbit Erlangga, Skuterid dan Paintball.', '2024-01-25 09:47:12'),
(27, '65b1d8b2ab509.png', 'adadadsa', 'owkodkwoowkdowdkw', '2024-01-25 11:42:42'),
(28, '65b1e191dd727.png', 'adadad', 'akndndddda', '2024-01-25 12:20:33'),
(30, '65b71d523c376.png', 'reynard', 'awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd \r\n\r\nawokwokdokwod daodkaodkd aodkaodkwd adokawowdkd awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd awokwokdokwod daodkaodkd aodkaodkwd adokawowdkd ', '2024-01-29 11:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur`
--

CREATE TABLE `struktur` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `kutipan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `struktur`
--

INSERT INTO `struktur` (`id`, `foto`, `nama`, `jabatan`, `kutipan`) VALUES
(1, '65b1de167ce88.png', 'Muh. Asri S.Sos., M.Adm., SDA', 'Kepala Desa', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(2, '6531f893d02d5.png', 'Abd.Azis, SE', 'Sekretaris Desa', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(3, '65311af831042.png', 'Rini Rezki', 'Kasi Pemerintahan', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(4, '65311c65539ad.png', 'Suaib', 'Kasi Pelayanan', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(5, '6531253a6204d.png', 'Darmawati', 'Kasi Kesejahteraan', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(6, '6531257ae49c8.png', 'Hamsiah, SE', 'Kaur Tata Usaha dan Umum', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(7, '6531258abe2eb.png', 'Hadirman, SE', 'Kaur Perencanaan', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(8, '653125954f98d.png', 'Rahmawati', 'Kaur Keuangan', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(9, '6531259de74a6.png', 'Sukanto', 'Kepala Dusun Sarroanging', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(10, '653125ad68ed7.png', 'Baso Gasali, S.Pd', 'Kepala Dusun Bambala', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu'),
(11, '653125b582d65.png', 'Akbar Sese', 'Kepala Dusun Teko', 'hidup ini begini begitu dan selalu begini begitu. Jangan pernah menyerah, tetap semangat. Sehat selalu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `booklet`
--
ALTER TABLE `booklet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `struktur`
--
ALTER TABLE `struktur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `booklet`
--
ALTER TABLE `booklet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `struktur`
--
ALTER TABLE `struktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
