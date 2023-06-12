-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 06:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sn`
--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `lang_keyword` varchar(250) NOT NULL,
  `lang_code` varchar(40) NOT NULL,
  `str` varchar(255) NOT NULL,
  `indonesian` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `lang_keyword`, `lang_code`, `str`, `indonesian`) VALUES
(1, 'connection_closed', 'en', 'connection lost', 'Koneksi terputus'),
(2, 'connecting', 'en', 'Connecting...', 'Menghubungkan...'),
(3, 'close2', 'en', 'WaWeb Logout', 'Logout WaWeb'),
(4, 'connected', 'en', 'Connected', 'Terhubung'),
(5, 'succes_register', 'en', 'Success register, welcome back!', 'Sukses daftar, selamat datang kembali!'),
(6, 'system_error', 'en', 'Error system', 'Kesalahan system'),
(7, 'username_registered', 'en', 'Username has been registered', 'Username telah terdaftar'),
(8, 'succces_login', 'en', 'login successfully, welcome back!', 'berhasil login, selamat datang kembali!'),
(9, 'username_password_notfound', 'en', 'wrong username or password', 'Username atau password salah'),
(10, 'add_numb', 'en', 'Add number', 'Tambahkan nomor'),
(11, 'add_numb_desc', 'en', 'Start with the country code. e.g. 62815xxx, don\'t using space', 'Mulailah dengan kode negara. misalnya 62815xxx, jangan pakai spasi'),
(12, 'number', 'en', 'Number', 'Nomor'),
(13, 'save', 'en', 'Save', 'Simpan'),
(14, 'cancel', 'en', 'Cancel', 'Batal'),
(15, 'logout', 'en', 'Log out', 'Keluar'),
(16, 'languages', 'en', 'Languages', 'Bahasa'),
(17, 'Login', 'en', 'Login', 'Login'),
(18, 'username', 'en', 'Username', 'Username'),
(19, 'password', 'en', 'Password', 'Kata sandi'),
(20, 'register', 'en', 'Register', 'Daftar'),
(21, 'not_have_account', 'en', 'Don\'t have an account?', 'Tidak mempunyai akun?'),
(44, 'button_message', 'en', 'Button message', 'Pesan button'),
(46, 'list_button', 'en', 'Message Button List', 'Pesan list button'),
(48, 'test_send', 'en', 'Test send', 'Uji coba kirim'),
(50, 'contact_admin', 'en', 'Contact Admin', 'Hubungi admin'),
(52, 'want_this', 'en', 'Want this?', 'Mau ini?'),
(54, 'not_connected', 'en', 'Not connected', 'Tidak terhubung'),
(56, 'time_hasro', 'en', 'Time has run out', 'Waktu habis'),
(58, 'logout_wa', 'en', 'Please Log out the connection before deleting', 'Harap Logout koneksi sebelum menghapus'),
(60, 's_delete_wa', 'en', 'Successfully delete number', 'Berhasil menghapus nomor'),
(62, 'already_number', 'en', 'Number already in database', 'Nomor sudah ada di database'),
(64, 's_add_number', 'en', 'Number added successfully', 'Nomor berhasil ditambahkan'),
(66, 'number_saved', 'en', 'Number saved', 'Nomor disimpan'),
(68, 'message_sent', 'en', 'Message sent', 'Pesan terkirim'),
(70, 'wait_m_schedule', 'en', 'WAITING FOR DELIVERY SCHEDULE', 'MENUNGGU JADWAL PENGIRIMAN'),
(72, 'delete', 'en', 'Delete', 'Hapus'),
(75, 'auto_reply', 'en', 'Auto reply', 'Balasan otomatis'),
(77, 'auto_reply_btn', 'en', 'Auto reply with button', 'Balas otomatis dengan button'),
(79, 'dat_number', 'en', 'Data number', 'Data nomor'),
(81, 'dat_contact', 'en', 'Data contact', 'Data kontak'),
(83, 'send_bulk_schedule', 'en', 'Send bulk / schedule', 'Kirim massal / jadwal'),
(85, 'def_message', 'en', 'Default message', 'Pesan default'),
(87, 'setting', 'en', 'Setting', 'Pengaturan'),
(89, 'success_delete', 'en', 'Successfully deleted', 'Berhasil dihapus'),
(91, 'numb_with_key_already', 'en', 'The number with the keyword already exists', 'Angka dengan kata kunci sudah ada'),
(93, 'success_added', 'en', 'Successfully added', 'Berhasil menambahkan'),
(95, 'add_auto_reply', 'en', 'Add auto reply', 'Tambah balasan otomatis'),
(97, 'contacts_from_numb', 'en', 'Contact from number ?', 'Kontak dari nomor?'),
(99, 'numb_has_scanned', 'en', 'choose number has scanned', 'pilih nomor yang telah dipindai'),
(101, 'get_contacts', 'en', 'Get Contacts', 'Dapatkan Kontak'),
(103, 'name', 'en', 'Name', 'Nama'),
(105, 'starting_from_line', 'en', 'Starting from line', 'Mulai dari baris'),
(107, 'message', 'en', 'Message', 'Pesan'),
(109, 'change', 'en', 'Change', 'Ubah'),
(111, 'new_password', 'en', 'New Password', 'Kata sandi baru'),
(113, 'enable', 'en', 'Enable', 'Enable'),
(115, 'disable', 'en', 'Disable', 'Disable'),
(117, 'send', 'en', 'Send', 'Kirim'),
(119, 'schedule', 'en', 'Schedule', 'Jadwal'),
(121, 'sent', 'en', 'Sent', 'Terkirim'),
(123, 'fail', 'en', 'Fail', 'Gagal'),
(125, 'button_message_desc', 'en', 'Can send multiple destination numbers separated by comma. eg 62815xxx,62815xxx', 'Dapat mengirim beberapa nomor tujuan yang dipisahkan koma. misalnya 62815xxx,62815xxx'),
(127, 'button_message_desc2', 'en', 'Image url * fill if the message wants with a picture', 'Image url * isi jika pesan ingin dengan gambar'),
(129, 'button_message_desc3', 'en', 'Empty this form if you only send 1 button', 'Kosongkan formulir ini jika Anda hanya mengirim 1 tombol'),
(131, 'sure', 'en', 'Are u sure?', 'Apakah anda yakin?'),
(133, 'close', 'en', 'Close', 'Tutup'),
(135, 'rid_total', 'BY RIDPEDIA', 'Total', 'Total'),
(136, 'rid_device', 'BY RIDPEDIA', 'Device', 'Perangkat'),
(137, 'rid_account', 'BY RIDPEDIA', 'Account', 'Akun'),
(138, 'rid_expired', 'BY RIDPEDIA', 'Your account has been expired.', 'Akun Anda telah kedaluwarsa.'),
(139, 'rid_expired_warning', 'BY RIDPEDIA', 'Please extend before the time expires!. avoid your WhatsApp connection being deleted.', 'Harap perpanjang sebelum waktunya habis!. menghindari koneksi WhatsApp Anda dihapus.'),
(140, 'rid_start', 'BY RIDPEDIA', 'Start', 'Mulai'),
(141, 'rid_ex', 'BY RIDPEDIA', 'Expired', 'Kedaluwarsa'),
(142, 'rid_desc_connected', 'BY RIDPEDIA', 'This is your whatsapp the connected', 'Ini whatsapp Anda yang terhubung'),
(143, 'rid_desc_not_have_connected', 'BY RIDPEDIA', 'Looks like your not have whatsapp connected', 'Sepertinya Anda tidak memiliki whatsapp yang terhubung'),
(144, 'rid_waiting', 'BY RIDPEDIA', 'Waiting...', 'Menunggu...'),
(145, 'rid_add', 'BY RIDPEDIA', 'Add', 'Tambah'),
(149, 'rid_pages', 'BY RIDPEDIA', 'Pages', 'Halaman'),
(150, 'rid_ses_ex', 'BY RIDPEDIA', 'Your session was expired!', 'Sesi Anda telah kedaluwarsa!'),
(151, 'rid_ses_notvalid', 'BY RIDPEDIA', 'Your session is not valid!.', 'Sesi Anda tidak valid!.'),
(152, 'rid_404', 'BY RIDPEDIA', 'Page not found!', 'Halaman tidak ditemukan!'),
(153, 'rid_404_desc', 'BY RIDPEDIA', 'The page you are looking for was not found.', 'Halaman yang Anda cari tidak ditemukan.'),
(154, 'rid_areply_error1', 'BY RIDPEDIA', 'Please write more than 4 characters', 'Harap tulis lebih dari 4 karakter'),
(155, 'rid_nothave_access', 'BY RIDPEDIA', 'You do not have access to use this', 'Anda tidak memiliki akses untuk menggunakan ini'),
(156, 'f_disabled', 'BY RIDPEDIA', 'This Feature Disabled', 'Fitur Ini Dinonaktifkan'),
(157, 's_generate_sender', 'BY RIDPEDIA', 'Successfully create, please scan!', 'Berhasil membuat, silahkan pindai!'),
(158, 'rid_s_scan', 'BY RIDPEDIA', 'isLogged. Please wait...', 'Berhasil di pindai. Mohon tunggu...'),
(159, 'rid_s_logout', 'BY RIDPEDIA', 'Success. Please wait...', 'Berhasil. Mohon tunggu...'),
(160, 'rid_create', 'BY RIDPEDIA', 'Create', 'Buat'),
(161, 'rid_sdn', 'BY RIDPEDIA', 'According to data number', 'Sesuai data nomor'),
(162, 'api_codesendtext', 'BY RIDPEDIA', 'CODE Send Text Message', 'KODE Kirim Pesan Teks'),
(163, 'api_codesendmedia', 'BY RIDPEDIA', 'CODE Send Media Message', 'CODE Kirim Pesan Media'),
(164, 'api_codesendbtn', 'BY RIDPEDIA', 'CODE Send Button Message', 'CODE Tombol Kirim Pesan'),
(165, 'only_sender_active', 'BY RIDPEDIA', 'Only senders that are (active) will be displayed.', 'Hanya pengirim yang (aktif) yang akan ditampilkan.'),
(166, 'rid_note_media', 'BY RIDPEDIA', 'filename, typemedia & urlmedia must be filled in!. Be a smart consumer!.', 'nama file, typemedia & urlmedia wajib diisi!. Jadilah konsumen yang cerdas.'),
(167, 'write_message', 'BY RIDPEDIA', 'Write your message here.', 'Tulis pesan Anda di sini.'),
(168, 'u_want_del', 'BY RIDPEDIA', 'You want to delete?', 'Anda ingin menghapus?'),
(169, 'new_pass_error1', 'BY RIDPEDIA', 'Password must be more than 5 characters', 'Kata sandi harus lebih dari 5 karakter'),
(170, 'new_pass_error2', 'BY RIDPEDIA', 'Password does not match', 'Kata sandi tidak cocok'),
(171, 'cannot_add_device', 'BY RIDPEDIA', 'Sorry you have reached the limit, you cannot add a device back. contact admin for more.', 'Maaf Anda telah mencapai batas, Anda tidak dapat menambahkan perangkat kembali. hubungi admin untuk lebih lanjut.'),
(173, 'f_delete_file', 'BY RIDPEDIA', 'Failed delete file', 'Gagal menghapus file'),
(174, 'empty_form_login', 'BY RIDPEDIA', 'Please check all forms!', 'Silahkan periksa semua formulir!'),
(175, 'u_must_be5', 'BY RIDPEDIA', 'Username must be more than 5 characters!', 'Username harus lebih dari 5 karakter!'),
(176, 'pass_too_shorts', 'BY RIDPEDIA', 'Passwords are too short!', 'Password terlalu pendek!'),
(177, 'nowa_regsitered', 'BY RIDPEDIA', 'The number has been used!', 'Nomor sudah di gunakan!'),
(178, 'e_used', 'BY RIDPEDIA', 'Email already in use', 'Email sudah di gunakan'),
(179, 'note_add_ccr', 'BY RIDPEDIA', 'Edit the code in any code editor, then paste it here.', 'Edit kode di editor kode apa pun, lalu tempel di sini.'),
(180, 'e_name_file', 'BY RIDPEDIA', 'Enter file name', 'Masukkan nama file'),
(181, 'e_own', 'BY RIDPEDIA', 'Enter your own kode here', 'Masukkan kode Anda sendiri di sini'),
(182, 'announcement', 'BY RIDPEDIA', 'Announcement', 'Pengumuman');

-- --------------------------------------------------------

--
-- Table structure for table `rid_account`
--

CREATE TABLE `rid_account` (
  `id` int(11) NOT NULL,
  `rid_username` varchar(250) NOT NULL,
  `rid_password` varchar(250) NOT NULL,
  `rid_level` varchar(40) NOT NULL,
  `nd` varchar(10) DEFAULT NULL,
  `c_wa` varchar(40) DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cookie` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rid_account`
--

INSERT INTO `rid_account` (`id`, `rid_username`, `rid_password`, `rid_level`, `nd`, `c_wa`, `full_name`, `email`, `cookie`) VALUES
(184, 'ridahcorp', '$2y$10$z0rnMpj6dVYOlz50Ey7IGedfz73gaWFs7Jgs2/Fw0Y1M2v3OyLUV2', '1', '2', '62857575723', 'Rid', 'ridah@gmail.com', 'e24b2904b4d6808ed4c71b5592500482'),
(187, 'demouser', '$2y$10$6v/Y8mpr7L8GEsQ8cM4G/u57Y0PaIASOQIEP/8zC.Wwa246CfJBRO', '1', '2', '085777533599', 'Just demo', 'demo@gmail.com', '91017d590a69dc49807671a51f10ab7f'),
(242, 'Joseph', '$2y$10$qsCxZohlEFtwrXy7W/XKD.rahJQxyrDXC3WmsmFzkReUomhCFp036', '2', '2', '', 'Ario biesch', 'ario.biesch@gmail.com', '6a1a376d8169cfc1835f59ac934edbb7'),
(243, 'testcuy', '$2y$10$QtbwxLnkqbovekvfLuBUy.TOQ9wc5qooN.ZrCJyv57SWNquy.PpTK', '2', '2', '', 'testcuy', 'testcuy@gmail.com', '0f9f6aa02624016cbddeabdabdc8a499');

-- --------------------------------------------------------

--
-- Table structure for table `rid_chats`
--

CREATE TABLE `rid_chats` (
  `id` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `c_with` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rid_chats`
--

INSERT INTO `rid_chats` (`id`, `id_user`, `c_with`) VALUES
(79, '184', '243'),
(80, '243', '184');

-- --------------------------------------------------------

--
-- Table structure for table `rid_messages`
--

CREATE TABLE `rid_messages` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `to_id` int(11) NOT NULL DEFAULT 0,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT 0,
  `seen` int(11) NOT NULL DEFAULT 0,
  `deleted_one` int(10) DEFAULT 0,
  `deleted_two` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rid_messages`
--

INSERT INTO `rid_messages` (`id`, `from_id`, `to_id`, `text`, `time`, `seen`, `deleted_one`, `deleted_two`) VALUES
(647, 184, 243, 'asdasd', 1686366075, 0, 0, 0),
(648, 243, 184, 'kelas ga anjai?', 1686366090, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rid_posts`
--

CREATE TABLE `rid_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `postType` varchar(30) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  `postText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rid_posts`
--

INSERT INTO `rid_posts` (`id`, `user_id`, `postType`, `time`, `postText`) VALUES
(195, 184, 'text', 1686544901, 'cuakss');

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `footer` longtext NOT NULL,
  `nd_default` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `themes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`id`, `title`, `footer`, `nd_default`, `description`, `themes`) VALUES
(1, 's-network', 'FROM RIDPEDIA', '2', 'Just a simple social network', 's-lite');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rid_account`
--
ALTER TABLE `rid_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rid_chats`
--
ALTER TABLE `rid_chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rid_messages`
--
ALTER TABLE `rid_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`),
  ADD KEY `seen` (`seen`),
  ADD KEY `time` (`time`),
  ADD KEY `order1` (`from_id`,`id`),
  ADD KEY `order2` (`id`),
  ADD KEY `order3` (`to_id`,`id`),
  ADD KEY `order7` (`seen`,`id`),
  ADD KEY `order8` (`time`,`id`),
  ADD KEY `order4` (`from_id`,`id`),
  ADD KEY `order5` (`id`),
  ADD KEY `order6` (`to_id`,`id`);

--
-- Indexes for table `rid_posts`
--
ALTER TABLE `rid_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `postType` (`postType`),
  ADD KEY `time` (`time`),
  ADD KEY `order1` (`user_id`,`id`),
  ADD KEY `order2` (`id`),
  ADD KEY `order3` (`id`),
  ADD KEY `order4` (`id`),
  ADD KEY `order5` (`id`),
  ADD KEY `order6` (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `rid_account`
--
ALTER TABLE `rid_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `rid_chats`
--
ALTER TABLE `rid_chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rid_messages`
--
ALTER TABLE `rid_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=649;

--
-- AUTO_INCREMENT for table `rid_posts`
--
ALTER TABLE `rid_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
