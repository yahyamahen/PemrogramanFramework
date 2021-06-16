-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 03:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikupar`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Role Administrator'),
(2, 'users', 'Role Users');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin.sikupar.sby@gmail.com', 1, '2021-06-08 21:29:18', 1),
(2, '::1', 'kiky.mahendra21@gmail.com', 2, '2021-06-08 21:42:31', 1),
(3, '0.0.0.0', 'adminsikuparsby', NULL, '2021-06-08 23:36:00', 0),
(4, '0.0.0.0', 'haha@gmail.com', 3, '2021-06-08 23:37:15', 1),
(5, '0.0.0.0', 'adminsikuparsby', NULL, '2021-06-09 06:26:00', 0),
(6, '0.0.0.0', 'admin.sikupar.sby@gmail.com', 1, '2021-06-09 06:26:18', 1),
(7, '0.0.0.0', 'admin.sikupar.sby@gmail.com', 1, '2021-06-10 07:54:29', 1),
(8, '0.0.0.0', 'admin.sikupar.sby@gmail.com', 1, '2021-06-10 12:23:38', 1),
(9, '0.0.0.0', 'admin.sikupar.sby@gmail.com', 1, '2021-06-11 05:28:54', 1),
(10, '0.0.0.0', 'admin.sikupar.sby@gmail.com', 1, '2021-06-11 07:28:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL,
  `nama_destinasi` varchar(512) NOT NULL,
  `alamat_destinasi` varchar(512) DEFAULT NULL,
  `foto_destinasi` varchar(512) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `instagram` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `deskripsi` varchar(1024) DEFAULT NULL,
  `koordinat` varchar(255) DEFAULT NULL,
  `iframe_link` varchar(1024) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`id`, `kategori`, `nama_destinasi`, `alamat_destinasi`, `foto_destinasi`, `harga`, `kontak`, `email`, `instagram`, `facebook`, `deskripsi`, `koordinat`, `iframe_link`, `slug`, `total_score`) VALUES
(2, 'Wisata', 'Monumen Kapal Selam', 'Jl. Pemuda No. 39, Embong Kaliasin, Kec. Genteng, Kota Surabaya, Jawa Timur', '1623151505_4a65515b0a54cbe2b0e0.jpg', 25000, '62315490410', '', '@monkaselsurabaya', 'Monumen Kapal Selam (Monkasel)', 'Monumen Kapal Selam atau disingkat Monkasel adalah sebuah museum kapal selam yang terletak di pusat kota, monumen ini sebernarnya merupakan kapal selam KRI Pasopati 410, salah satu armada Angkatan Laut Republik Indonesia Buatan Uni Soviet Tahun 1952', '-7.2657,112.7502', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3957.7837773903852!2d112.7481165!3d-7.2654304!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9628df520e5%3A0x577443720136fb0b!2sMonumen%20Kapal%20Selam%20Surabaya!5e0!3m2!1sid!2sid!4v1623249894784!5m2!1sid!2sid', 'monumen-kapal-selam', NULL),
(3, 'Wisata', 'Kenpark Surabaya', 'Jl. Pantai Ria Kenjeran, Sukolilo Baru, Kec. Bulak, Kota Surabaya, Jawa Timur.', '1623153018_4721649ea1102fb529fa.jpg', 125000, '62313821351', 'kenparksurabaya@gmail.com', '@KENPARK', 'Kenpark Surabaya', 'Berkunjung ke Kenpark seperti menikamati paket wisata dalam satu tempat, karena didalamnya tersaji wisata pantai, rekreasi, edukasi sampai dengan religi.', '-7.2626076,112.798', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d63324.93810644319!2d112.7129042!3d-7.2626076!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9e5db556f41%3A0x327b3374f934a295!2sKenpark%20Kenjeran!5e0!3m2!1sid!2sid!4v1623341507006!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'kenpark-surabaya', NULL),
(4, 'Wisata', 'Kebun Binatang Surabaya', 'Jl. Setail No. 1, Darmo, Kec. Wonokromo, Kota Surabaya, Jawa Timur.', '1623153574_37dc5362c7decef48ca4.jpg', 15000, '62315678703', '', '@Kebun Binatang Surabaya (KBS)', 'Kebun Binatang Surabaya (Surabaya ZOO)', 'Salah satu tempat wsata yang paling sering dikunjungi wisatawan adalah Kebun Binatang Surabaya ini. Terletak di pusat kota, menjadikan kebun binatang ini sangat ramai setiap harinya. Kebun binatang ini merupakan salah satu yang tertua di Indonesia', '-7.2959546,112.7344207', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5144035959665!2d112.73442071376434!3d-7.295954594734144!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb97917c2fad%3A0x21b1122d5fe174cc!2sKebun%20Binatang%20Surabaya!5e0!3m2!1sid!2sid!4v1623341649479!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'kebun-binatang-surabaya', NULL),
(5, 'Kuliner', 'Lontong Kupang', 'Jl. Raya Manyar No.5J, Manyar Sabrangan, Kec. Mulyorejo, Kota SBY, Jawa Timur 60117', '1623153994_8d67599a0971c23cd693.jpg', 28000, '6285776154089', 'kupanglontong@gmail.com', '@kupangsurabaya', 'kupanglontong', 'Lontong Kupang atau Soto kupang adalah kuliner yang berbahan kupang atau makhluk laut sejenis kerang yang dimasak dengan dicampur rempah-rempah agar memiliki rasa yang nikmat dan gurih', '-7.288872900000003,126642.4639713672', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126642.4639713672!2d112.6932530582031!3d-7.288872900000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa4b2ea5d8bb%3A0xbb3c1c894b716272!2sLontong%20Kupang%20ARTOMORO!5e0!3m2!1sid!2sid!4v1623341844400!5m2!1sid!2sid', 'lontong-kupang', NULL),
(6, 'Kuliner', 'Rujak Cingur', 'Jl. Achmad Jais No.40, Peneleh, Kec. Genteng, Kota SBY, Jawa Timur 60274', '1623154261_0c56ad65e5cb6a6921cd.jpg', 30000, '62315328443', 'rujakcingur@gmail.com', '@rujakenak', 'rujakenak', 'Rujak cingur terdiri dari lontong, taoge, kangkung, tahu, tempe, cingur, dan buah-buahan yang disiram bumbu petis.', '-7.255428894762747,112.73797361376401', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8717956213736!2d112.73797361376401!3d-7.255428894762747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9683c1d4801%3A0xf6cc17ed25b27178!2sJl.%20Achmad%20Jais%20No.40%2C%20Peneleh%2C%20Kec.%20Genteng%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060274!5e0!3m2!1sid!2sid!4v1623341956011!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'rujak-cingur', NULL),
(7, 'Kuliner', 'Pecel Semanggi', 'Jl. Rungkut Madya No.127, Rungkut Kidul, Kec. Rungkut, Kota SBY, Jawa Timur 60293', '1623154429_6b9d53f0e2426149df06.jpg', 57000, '6286543163718', 'pecelsemanggi@gmail.com', '@pecelsemanggi', 'pecelsemanggi', 'Pecel semanggi terdiri dari berbagai sayuran, seperti daun pepaya, daun bayam, kangkung, dan semanggi. Bumbu cokelatnya terbuat dari singkong', '-7.331397294709123,112.77858371376468', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.200215067334!2d112.77858371376468!3d-7.331397294709123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fac6a080f6fd%3A0x8ad812874d24e90b!2sJl.%20Rungkut%20Madya%20No.127%2C%20Rungkut%20Kidul%2C%20Kec.%20Rungkut%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060293!5e0!3m2!1sid!2sid!4v1623342141969!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'pecel-semanggi', NULL),
(8, 'Landmark', 'Patung Sura dan Baya', 'Jl. Diponegoro No.1-B, Darmo, Kec. Wonokromo, Kota SBY, Jawa Timur 60241', '1623342633_6682a23b436c9635511a.jpg', 10000, '6285437888767', 'surabaya@gmail.com', '@surabaya', 'surabaya', 'Patung Sura dan Baya adalah sebuah patung yang merupakan lambang kota Surabaya. Patung ini berada di depan Kebun Binatang Surabaya. Patung ini terdiri atas dua hewan ini yang menjadi inspirasi nama kota Surabaya: ikan sura dan baya.', '-7.296049194734081,3957.5135670119016', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.5135670119016!2d112.73651251477507!3d-7.296049194734081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb97dde14831%3A0x9e68091c03f959fb!2sPatung%20Suro%20dan%20Boyo!5e0!3m2!1sid!2sid!4v1623342528911!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'patung-sura-dan-baya', NULL),
(9, 'Landmark', 'Monumen Tugu Pahlawan dan Museum Sepuluh Nopember Surabaya', 'Jl. Pahlawan, Alun-alun Contong, Kec. Bubutan, Kota SBY, Jawa Timur 60174', '1623342828_0117ff2509ca7f90e835.jpg', 0, '6286543781340', 'tugupahlawan@gmail.com', '@tugunasional', 'tugupahlawan', 'Tugu Pahlawan adalah sebuah monumen yang menjadi markah tanah Kota Surabaya. Tinggi monumen ini adalah 41,15 meter dan berbentuk lingga atau paku terbalik. Tubuh monumen berbentuk lengkungan-lengkungan sebanyak 10 lengkungan, dan terbagi atas 11 ruas.', '-7.246174794769299,d3957.953128895588', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.953128895588!2d112.73557651477478!3d-7.246174794769299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f93fc001bc5d%3A0x110e38d8a6c23fbe!2sMonumen%20Tugu%20Pahlawan%20dan%20Museum%20Sepuluh%20Nopember%20Surabaya!5e0!3m2!1sid!2sid!4v1623342763244!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'monumen-tugu-pahlawan-dan-museum-sepuluh-nopember-surabaya', NULL),
(10, 'Landmark', 'Monumen Yos Sudarso', 'Komplek Kobangdikal Surabaya, Putra Samudra, Perak Bar., Kec. Krembangan, Kota SBY, Jawa Timur 60177', '1623343325_eadacc93598ada9ee218.jpg', 0, '6285643129087', 'yossudarso@gmail.com', '@yossudarso', 'yossudarso', 'Ada sejarah pertempuran di laut Aru pada 1962 yang menewaskan Yos Sudarso beserta tenggelamnnya kapalnya KRI Macan Tutul, serta proses Penentuan Pendapat Rakyat (Pepera) pada tahun 1969 yang mengembalikan Papua Barat ke tangan Indonesia.', '-7.288872900000003,3958.15352507985', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.15352507985!2d112.71870341477457!3d-7.223323394785445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f8d6a41a53f7%3A0xe8bb6bdc0bda7aed!2sMonumen%20Yos%20Sudarso!5e0!3m2!1sid!2sid!4v1623343252644!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'monumen-yos-sudarso', NULL),
(11, 'Pusat Oleh-Oleh', 'Kuliner Surabaya RK', 'Jl. Dukuh Kupang Timur XII No.31 A, Pakis, Kec. Sawahan, Kota SBY, Jawa Timur 60256', '1623343683_af4f2f9d2a4248ffe187.jpg', 40000, '6281230327223', 'kulinersurabayaRK@gmail.com', '@kulinersurabayaRK', 'kulinersurabayaRK', 'Menjual berbagai macam macam oleh oleh khas kota Surabaya', '-7.288872900000003,253259.54124630828', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253259.54124630828!2d112.57259286263873!3d-7.333634517414476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb1274adbb39%3A0x518b1d864bafc54a!2sKuliner%20Surabaya%20RK!5e0!3m2!1sid!2sid!4v1623343401019!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'kuliner-surabaya-rk', NULL),
(12, 'Pusat Oleh-Oleh', 'Toko Oleh Oleh Panen Raya', 'Jl. Genteng Besar No.77 A, Genteng, Kec. Genteng, Kota SBY, Jawa Timur 60275', '1623343946_eebbf6d4d79fa6fce6e5.jpg', 60000, '623181877180', 'TokoOlehOlehPanenRaya@gmail.com', '@TokoOlehOlehPanenRaya', 'TokoOlehOlehPanenRaya', 'Toko super lengkap menjual berbagai macam cemilan ringan hingga makanan berat', '-7.288872900000003,253259.54124630828', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253259.54124630828!2d112.57259286263873!3d-7.333634517414476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f967918494b3%3A0x8545a635fb648d6b!2sToko%20Oleh%20Oleh%20Panen%20Raya!5e0!3m2!1sid!2sid!4v1623343796787!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'toko-oleh-oleh-panen-raya', NULL),
(13, 'Pusat Oleh-Oleh', 'Toko wisata Rasa', 'Jl. Mayjen Sungkono No.135, Dukuh Pakis, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60225', '1623344078_e6c5427d209f1b4d852c.png', 75000, '628655413892', 'TokowisataRasa@gmail.com', '@TokowisataRasa', 'TokowisataRasa', 'Toko super lengkap di surabaya', '-7.2959546,253259.54124630828', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253259.54124630828!2d112.57259286263873!3d-7.333634517414476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fd173f9e7aa1%3A0x67e5984523cfd7f1!2sToko%20wisata%20Rasa!5e0!3m2!1sid!2sid!4v1623344009084!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"', 'toko-wisata-rasa', NULL),
(15, 'Wisata', 'kue', '', 'No_Image_Available.jpg', 0, '62', '', '', '', '', ',', '', 'kue', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1623205667, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_comment` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comments` varchar(1024) NOT NULL,
  `score_review` int(11) DEFAULT NULL,
  `tgl_review` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `nama_lengkap`, `kontak`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin.sikupar.sby@gmail.com', 'adminsikuparsby', NULL, NULL, 'default.svg', '$2y$10$G6K77YjP7UshBdtzx2zO1u.YmSwl/Vc6Cz/uyX9o61jBkK5EOzkJe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-08 21:29:04', '2021-06-08 21:29:04', NULL),
(2, 'kiky.mahendra21@gmail.com', 'yahyamahen', NULL, NULL, 'default.svg', '$2y$10$vWV2bEzR4AC/UXd9RWx29ux9UuFzZgMnpTWcd6PTEnmj0v/qI1YOO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-08 21:42:22', '2021-06-08 21:42:22', NULL),
(3, 'haha@gmail.com', 'haha', NULL, NULL, 'default.svg', '$2y$10$7yfiXPcWKPdXldzPGWWTo.8wb2EFWV23yZjnLvshfVtW.pMQIohgu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-06-08 23:37:03', '2021-06-08 23:37:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id` (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinasi`
--
ALTER TABLE `destinasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id`) REFERENCES `destinasi` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
