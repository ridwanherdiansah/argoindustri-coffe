-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2021 pada 08.31
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `argoindustri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_pengepul` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `is_active` int(2) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `id_pengepul`, `nama`, `email`, `password`, `alamat`, `provinsi`, `kota`, `is_active`, `date_created`, `image`) VALUES
(6, 'PE0001', 'Ridwan Herdiansah', 'r@gmail.com', '$2y$10$LdcAVm0UEnWxlQ1K0MzSse/3ZwtPJFA2sbVEkACn34FiqAEP/xSNe', '1', '1', '1', 1, '2021-03-03', 'default.jpg'),
(7, 'PE0002', 'Ridwan Herdiansah', 'ridwan@gmail.com', '$2y$10$mCmvz9VIa5SzjputNvn8e.NC4U0pw3tLXlgUt/SpZWb4rZcErk8o2', '1', '9', '22', 1, '2021-03-02', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_gudang`
--

CREATE TABLE `admin_gudang` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `date_cerated` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_gudang`
--

INSERT INTO `admin_gudang` (`id`, `email`, `password`, `nama`, `alamat`, `provinsi`, `kota`, `date_cerated`, `image`) VALUES
(1, 'ridwan@gmail.com', '$2y$10$mCmvz9VIa5SzjputNvn8e.NC4U0pw3tLXlgUt/SpZWb4rZcErk8o2', 'Ridwan Herdiansah', 'bandung', '9', '22', '111', 'default.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `sub_title` varchar(128) NOT NULL,
  `title_2` varchar(128) NOT NULL,
  `deskripsi_2` text NOT NULL,
  `title_3` varchar(128) NOT NULL,
  `deskripsi_3` text NOT NULL,
  `image_3` varchar(128) NOT NULL,
  `title_4` varchar(128) NOT NULL,
  `deskripsi_4` text NOT NULL,
  `image_4` varchar(128) NOT NULL,
  `title_5` varchar(128) NOT NULL,
  `deskripsi_5` text NOT NULL,
  `image_5` varchar(128) NOT NULL,
  `title_6` varchar(128) NOT NULL,
  `deskripsi_6` text NOT NULL,
  `image_6` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` double NOT NULL,
  `whatsap` double NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `youtube` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dashboard`
--

INSERT INTO `dashboard` (`id`, `title`, `sub_title`, `title_2`, `deskripsi_2`, `title_3`, `deskripsi_3`, `image_3`, `title_4`, `deskripsi_4`, `image_4`, `title_5`, `deskripsi_5`, `image_5`, `title_6`, `deskripsi_6`, `image_6`, `alamat`, `email`, `telepon`, `whatsap`, `facebook`, `youtube`, `instagram`) VALUES
(1, 'ARGO GIRIMEKAR', 'Kelompok Tani Hutan Girisenang memanfaatkan lahan di bawah tegakan hutan sejak 2007, dan tanaman kopi merupakan salah satu tana', 'Pemilihan Bibit - Cara Penyemaian - Jenis Bibit dan Perawatan - Persiapan Lahan - Penanaman - Pemeliharaan - Panen', 'Kelompok Tani Hutan Girisenang memanfaatkan lahan di bawah tegakan hutan sejak 2007, dan tanaman kopi merupakan salah satu tanaman yang cocok untuk memanfaatkan lahan tersebut. Sejak saat itu KTH Girisenang dapat menghasilkan biji kopi yang berkualitas, pada tahun 2015 kementrian LHK meresmikan dan memfasilitasi KTH Girisenang sebagai \"Lembaga Pelatihan dan Pemagangan Usaha Kehutanan Swadaya\" WANAWIYATA WIDYAKARYA GIRISENANG untuk melatih dan pemagangan bagi masyarakat di sekitar maupun masyarakat di luar Jawabarat.', 'KOPI', 'Kopi merupakan komoditas utama yang diperdagangkan di seluruh dunia dengan kontribusi setengah dari total ekspor komuditas tropis. Popularitas dan daya tarik dunia terhadap kopi, utamanya dikarenakan rasanya yang unik serta didukung oleh faktor sejarah, tradisional, sosial dan kepentingan ekonomi. Kopi yang dijual dipasar dunia biasanya kombinasi dari biji kopi varietas arabika dan robusta. Perbedaan antara kedua kopi ini adalah kadar kafeinnya. Wilayah subtropis dan tropis merupakan lokasi yang baik untuk budidaya kopi. Oleh karena itu, negara-negara yang mendominasi produksi kopi dunia berada di wilayah Amerika Selatan, Afrika dan Asia Tenggara. Minuman kopi dengan bahan dasar ekstraksi biji kopi dikonsumsi sekitar 2,25 milyar gelas setiap hari didunia.', '51851945_2151094968262116_6383830584644337664_o.jpg', 'LIBERICA', 'Kami mendapati kabar bahwa di daerah kebun palasari ada spesies Liberika Kami langsung membuktikannya dengan menyambangi kebun milik anggota kelompok girisenang ini, Dan Hasilnya kami juga kaget ternyata benar , kami medapati spesies kopi liberika yang tumbuh kokoh, berdampingan dengan spesies robusta dan arabica Setelah saya coba cicipi lendir dari liberika ini saya pun kaget seketika , liberika ternyata lebih manis dari arabika.', '119110150_3384842574887343_1197410971374077087_n.jpg', 'KOPI YANG TERLUPAKAN', 'Arabika dan robusta merupakan mayoritas perdagangan kopi dunia. Dan menurut media yang saya baca Liberica menyumbang kurang dari 1 persen, sementara hanya beberapa negara di Asia dan Afrika yang menumbuhkan spesies secara komersial saat ini. Kenapa liberica tidak pernah masuk radar komunitas kopi spesial??? Di sela sela percakapan dan candaan kami , bahwa spesies tersebut telah diabaikan secara tidak adil. hampir tidak ada pengetahuan tentang liberika meskipun ia merupakan spesies terbesar ketiga ini.', '119444615_3384842944887306_2993352780135860006_n.jpg', 'Argo girimekar', '2', '1', 'Kampung Legok Nyenang, Desa Girimekar', 'argogiri2@gmail.com', 8524505151, 8524505151, 'https://web.facebook.com/kopi_palasara-107884081048827/?ref=page_internal', '2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_kopi` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `waktu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_kopi`, `email`, `nama`, `komentar`, `tanggal`, `waktu`) VALUES
(1, 'KOPI001', '$email', '$nama', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nostrud...', '$tanggal', '$waktu'),
(2, 'KOPI002', 'r@gmail.com', 'Ridwan Herdiansah', '1111', '2021-03-10', '1615454896'),
(3, 'KOPI001', 'r@gmail.com', 'Ridwan Herdiansah', '2', '2021-03-10', '1615454962'),
(4, 'KOPI001', 'ridwan@gmail.com', 'Ridwan Herdiansah', 'dsdad', '2021-03-10', '1615541010');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kopi`
--

CREATE TABLE `kopi` (
  `id_kopi` varchar(128) NOT NULL,
  `id_petani` varchar(128) NOT NULL,
  `id_pengepul` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kopi`
--

INSERT INTO `kopi` (`id_kopi`, `id_petani`, `id_pengepul`, `nama`) VALUES
('KOPI001', 'SUP001', 'PE0002', 'Arabika bukit palasari'),
('KOPI002', 'SUP001', 'PE0002', 'Arabika bukit palasari'),
('KOPI003', 'SUP001', 'PE0002', 'Kopi jalu palasari'),
('KOPI004', 'SUP001', 'PE0002', 'ARABIKA Bukit palasari'),
('KOPI005', 'SUP001', 'PE0002', 'COFFEE PALASARI bandung coffee original'),
('KOPI006', 'SUP001', 'PE0002', 'COFFEE MJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_expedisi`
--

CREATE TABLE `k_expedisi` (
  `id` int(11) NOT NULL,
  `id_expedisi` varchar(128) NOT NULL,
  `no_resi` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `lama_hari` varchar(128) NOT NULL,
  `berat` double NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_expedisi`
--

INSERT INTO `k_expedisi` (`id`, `id_expedisi`, `no_resi`, `nama`, `deskripsi`, `lama_hari`, `berat`, `harga`) VALUES
(7, 'EXP001', '0001', 'CTCYES', 'JNE City Courier', '1-1', 500, 10000),
(8, 'EXP002', '0', 'CTC', 'JNE City Courier', '1-2', 1000, 8000),
(9, 'EXP003', '0', 'CTC', 'JNE City Courier', '1-2', 2000, 16000),
(10, 'EXP004', '0', 'CTC', 'JNE City Courier', '1-2', 1000, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_kopi`
--

CREATE TABLE `k_kopi` (
  `id` int(11) NOT NULL,
  `id_kopi` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `keterangan_kopi` text NOT NULL,
  `type_kopi` varchar(50) NOT NULL,
  `jenis_kopi` varchar(50) NOT NULL,
  `tempat_tanam` varchar(128) NOT NULL,
  `tanggal_tanam` varchar(128) NOT NULL,
  `tanggal_panen` varchar(128) NOT NULL,
  `pupuk` varchar(128) NOT NULL,
  `keterangan_pupuk` text NOT NULL,
  `riwayat_penyakit` text NOT NULL,
  `berat` int(128) NOT NULL,
  `harga` int(128) NOT NULL,
  `harga_jual` int(128) NOT NULL,
  `rating` double NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_kopi`
--

INSERT INTO `k_kopi` (`id`, `id_kopi`, `nama`, `keterangan_kopi`, `type_kopi`, `jenis_kopi`, `tempat_tanam`, `tanggal_tanam`, `tanggal_panen`, `pupuk`, `keterangan_pupuk`, `riwayat_penyakit`, `berat`, `harga`, `harga_jual`, `rating`, `image`) VALUES
(10, 'KOPI001', 'Arabika bukit palasari', 'Kopi yang di olah langsung dari perkebunan kopi yang ada di pegunungan palasari.', 'Arabika', 'Kering', 'Pegunungan palasari kabupaten bandung', '2020-10-01', '2021-01-01', 'Organik', 'Menggunakan pupuk kandang yang di olah dan di campur dengan bahan - bahan tertentu', 'Tidak ada', 1000, 30000, 32000, 3, 'kopi8.JPG'),
(11, 'KOPI002', 'Arabika bukit palasari', 'Kopi yang di olah langsung dari perkebunan kopi yang ada di pegunungan palasari.', 'Natural', 'Kering', 'Pegunungan palasari kabupaten bandung', '2020-10-01', '2021-01-25', 'organik', 'Menggunakan pupuk kandang yang di olah dan di campur dengan bahan - bahan tertentu', 'Tidak ada', 1000, 40000, 42000, 0, 'kopi9.JPG'),
(12, 'KOPI003', 'Kopi jalu palasari', 'Kopi yang di olah langsung dari perkebunan kopi yang ada di pegunungan palasari.', 'Robusta', 'Kering', 'Pegunungan palasari kabupaten bandung', '2020-10-01', '2021-01-01', 'organik', 'Menggunakan pupuk kandang yang di olah dan di campur dengan bahan - bahan tertentu', 'tidak ada', 500, 40000, 42000, 0, 'kopi10.JPG'),
(13, 'KOPI004', 'ARABIKA Bukit palasari', 'Kopi yang di olah langsung dari perkebunan kopi yang ada di pegunungan palasari.', 'Arabika', 'Kering', 'Pegunungan palasari kabupaten bandung', '2020-10-01', '2021-01-01', 'organik', 'Menggunakan pupuk kandang yang di olah dan di campur dengan bahan - bahan tertentu', 'tidak ada', 1000, 30000, 32000, 0, 'kopi6.jpg'),
(14, 'KOPI005', 'COFFEE PALASARI bandung coffee original', 'Kopi yang di olah langsung dari perkebunan kopi yang ada di pegunungan palasari.', 'Arabika', 'Kering', 'Pegunungan palasari kabupaten bandung', '2021-01-01', '2021-04-01', 'organik', 'Menggunakan pupuk kandang yang di olah dan di campur dengan bahan - bahan tertentu', 'tidak ada', 500, 40000, 42000, 0, 'kopi2.jpg'),
(15, 'KOPI006', 'COFFEE MJ', 'Kopi yang di olah langsung dari perkebunan kopi yang ada di pegunungan palasari.', 'Original', 'Kering', 'Pegunungan palasari kabupaten bandung', '2020-12-31', '2021-03-01', 'organik', 'Menggunakan pupuk kandang yang di olah dan di campur dengan bahan - bahan tertentu', 'tidak ada', 500, 40000, 42000, 0, 'kopi14.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_petani`
--

CREATE TABLE `k_petani` (
  `id` int(11) NOT NULL,
  `id_petani` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `telepon` double NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_petani`
--

INSERT INTO `k_petani` (`id`, `id_petani`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `desa`, `kecamatan`, `kota`, `email`, `telepon`, `image`) VALUES
(2, 'SUP001', 'Nuryadin', 'bandung', '1998-07-08', 'laki-laki', 'Kampung Legok Nyenang ', 'girimekar', 'cilengkrang', 'bandung', 'nuryadin@gmail.com', 85950245151, 'yadin.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_transaksi`
--

CREATE TABLE `k_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(128) NOT NULL,
  `id_pengepul` varchar(128) NOT NULL,
  `id_petani` varchar(128) NOT NULL,
  `id_kopi` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `harga` double NOT NULL,
  `jumlah` double NOT NULL,
  `total_harga` double NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_transaksi`
--

INSERT INTO `k_transaksi` (`id`, `id_transaksi`, `id_pengepul`, `id_petani`, `id_kopi`, `nama`, `harga`, `jumlah`, `total_harga`, `image`) VALUES
(13, 'TR001', 'PE0002', 'SUP001', 'KOPI001', 'Kopi legok palasari', 3000, 1, 3000, 'Nonton_Film_Ant-Man_And_The_Wasp_(2018)_Subtitle_Indonesia_XX1_mp4_snapshot_00_00_20_2019_08_15_17_58_18.jpg'),
(14, 'TR002', 'PE0002', 'SUP001', 'KOPI001', 'Arabika bukit palasari', 32000, 1, 32000, 'kopi8.JPG'),
(15, 'TR003', 'PE0002', 'SUP001', 'KOPI001', 'Arabika bukit palasari', 32000, 2, 64000, 'kopi8.JPG'),
(16, 'TR004', 'PE0002', 'SUP001', 'KOPI001', 'Arabika bukit palasari', 32000, 1, 32000, 'kopi8.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_user`
--

CREATE TABLE `k_user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `telepon` double NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(128) NOT NULL,
  `kecamatan` varchar(128) NOT NULL,
  `kota` varchar(128) NOT NULL,
  `provinsi` varchar(128) NOT NULL,
  `kode_pos` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `k_user`
--

INSERT INTO `k_user` (`id`, `id_user`, `telepon`, `alamat`, `desa`, `kecamatan`, `kota`, `provinsi`, `kode_pos`) VALUES
(13, 'CO001', 0, 'bandung', 'belum di isi', 'belum di isi', '23', '9', 0),
(14, 'CO002', 0, 'belum di isi', 'belum di isi', 'belum di isi', '0', '0', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `id_pengepul` varchar(128) NOT NULL,
  `id_petani` varchar(128) NOT NULL,
  `id_kopi` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `id_pengepul`, `id_petani`, `id_kopi`, `nama`, `jumlah`, `tanggal`) VALUES
(6, 'PE0002', 'SUP001', 'KOPI001', 'Kopi legok palasari', 20, '2021-03-06'),
(7, 'PE0002', 'SUP001', 'KOPI001', 'Kopi legok palasari', 20, '2021-03-06'),
(8, 'PE0002', 'SUP001', 'KOPI001', 'Kopi legok palasari', 20, '2021-03-07'),
(9, 'PE0001', 'SUP001', 'KOPI002', '1', 1, '2021-03-02'),
(10, 'PE0002', 'SUP001', 'KOPI001', 'Arabika bukit palasari', 12, '2021-03-08'),
(11, 'PE0002', 'SUP001', 'KOPI002', 'Arabika bukit palasari', 10, '2021-03-08'),
(12, 'PE0002', 'SUP001', 'KOPI003', 'Kopi jalu palasari', 10, '2021-03-08'),
(13, 'PE0002', 'SUP001', 'KOPI004', 'ARABIKA Bukit palasari', 10, '2021-03-08'),
(14, 'PE0002', 'SUP001', 'KOPI005', 'COFFEE PALASARI bandung coffee original', 10, '2021-03-08'),
(15, 'PE0002', 'SUP001', 'KOPI006', 'COFFEE MJ', 10, '2021-03-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `id_pengepul` varchar(128) NOT NULL,
  `id_suplier` varchar(128) NOT NULL,
  `id_kopi` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `jumlah` double NOT NULL,
  `tanggal` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id_petani` varchar(128) NOT NULL,
  `id_pengepul` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`id_petani`, `id_pengepul`, `nama`) VALUES
('SUP001', 'PE0002', 'Nuryadin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s_kopi`
--

CREATE TABLE `s_kopi` (
  `id` int(11) NOT NULL,
  `id_kopi` varchar(128) NOT NULL,
  `stok` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `s_kopi`
--

INSERT INTO `s_kopi` (`id`, `id_kopi`, `stok`) VALUES
(10, 'KOPI001', 12),
(11, 'KOPI002', 10),
(12, 'KOPI003', 10),
(13, 'KOPI004', 10),
(14, 'KOPI005', 10),
(15, 'KOPI006', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(128) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `id_expedisi` varchar(128) NOT NULL,
  `total_pembayaran` double NOT NULL,
  `total_berat` double NOT NULL,
  `tanggal` varchar(128) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_expedisi`, `total_pembayaran`, `total_berat`, `tanggal`, `status`) VALUES
('TR001', 'CO001', 'EXP001', 13000, 500, '2021-03-01', 2),
('TR002', 'CO001', 'EXP002', 40000, 1000, '2021-03-12', 3),
('TR003', 'CO001', 'EXP003', 80000, 2000, '2021-04-05', 0),
('TR004', 'CO001', 'EXP004', 40000, 1000, '2021-06-08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `nama`, `is_active`, `date_created`, `image`) VALUES
('CO001', 'mawarridwan@gmail.com', '$2y$10$cbXinIyFjNljTYlx1Vva0ulUSQB3a/AeQJOWLJ1BQsj3uaWW/37Wu', 'Ridwan Herdiansah', 1, '2021-03-12', 'default.jpg'),
('CO002', 'dmdmbtch@gmail.com', '$2y$10$o8Gl5EFK9RVgFgF6Jo/e5.No0gCLfNrmA/9nPjTelZJlzzanBHjQS', 'Aksaw', 0, '2021-03-12', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_gudang`
--
ALTER TABLE `admin_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kopi`
--
ALTER TABLE `kopi`
  ADD PRIMARY KEY (`id_kopi`);

--
-- Indeks untuk tabel `k_expedisi`
--
ALTER TABLE `k_expedisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_kopi`
--
ALTER TABLE `k_kopi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_petani`
--
ALTER TABLE `k_petani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_transaksi`
--
ALTER TABLE `k_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_user`
--
ALTER TABLE `k_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`);

--
-- Indeks untuk tabel `s_kopi`
--
ALTER TABLE `s_kopi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `admin_gudang`
--
ALTER TABLE `admin_gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `k_expedisi`
--
ALTER TABLE `k_expedisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `k_kopi`
--
ALTER TABLE `k_kopi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `k_petani`
--
ALTER TABLE `k_petani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `k_transaksi`
--
ALTER TABLE `k_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `k_user`
--
ALTER TABLE `k_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `s_kopi`
--
ALTER TABLE `s_kopi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
