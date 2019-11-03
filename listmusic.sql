-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 03, 2019 at 06:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `listmusic`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fullname` varchar(1024) NOT NULL DEFAULT '',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'guestAvatar.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `username`, `password`, `email`, `user_type`, `avatar`) VALUES
(18, 'Phạm Minh Hoàng', 'MinhHoang', '123456', 'hoang@gmail.com', 'admin', '25-258694_cool-avatar-transparent-image-cool-boy-avatar.png.jpeg'),
(22, '', 'thanhtu', '123456', 'tu@gmail.com', 'user', 'guestAvatar.jpeg'),
(23, '', 'nguyenvanA', '123654', 'nguyenvanA@gmail.com', 'user', 'guestAvatar.jpeg'),
(24, '', 'nguyenvanB', '123546', 'nguyenvanB@gmail.com', 'user', 'guestAvatar.jpeg'),
(27, '', 'hoaivu', '321456', 'hoaivu@gmail.com', 'user', 'guestAvatar.jpeg'),
(29, '', 'nguyenkim', '123456', 'nguyenkiem@gmail.com', 'user', 'guestAvatar.jpeg'),
(38, '', 'nguyenthiB', '123456', 'nguyenthiB@gmail.com', 'user', 'guestAvatar.jpeg'),
(39, '', 'hoangvanD', '123456', 'hoangvanD', 'user', 'guestAvatar.jpeg'),
(40, '', 'maivanmanh', '123456', 'maivanmanh@gmail.com', 'user', 'guestAvatar.jpeg'),
(42, '', 'lykiet', '123456', 'lykiet@gmail.com', 'user', 'guestAvatar.jpeg'),
(43, 'Lê Minh Thắng', 'minhthang', '123456', 'minhthang@gmail.com', 'user', '25-258694_cool-avatar-transparent-image-cool-boy-avatar.png.jpeg'),
(44, '', 'vothisau', '123456', 'vothisau@gmail.com', 'user', 'guestAvatar.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
('nhacaumy', 'Nhạc Âu Mỹ'),
('nhachan', 'Nhạc Hàn'),
('nhachoa', 'Nhạc Hoa'),
('nhactrutinh', 'Nhạc trữ tình'),
('nhacviet', 'Nhạc Việt');

-- --------------------------------------------------------

--
-- Table structure for table `categories_music`
--

CREATE TABLE `categories_music` (
  `id_music` int(11) NOT NULL,
  `id_category` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories_music`
--

INSERT INTO `categories_music` (`id_music`, `id_category`) VALUES
(5, 'nhacviet');

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(11) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `link` varchar(1024) NOT NULL,
  `lyric` text NOT NULL,
  `singer` varchar(255) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `image` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `name`, `link`, `lyric`, `singer`, `views`, `image`) VALUES
(5, 'Em gì ơi', 'Em-Gi-Oi-Jack-K-ICM.mp3', 'Đừng khóc như thế\r\nXin đừng khóc như thế\r\nBao nhiêu niềm đau chôn dấu\r\nMong ngày sẽ trôi mau\r\nĐời phong ba, độc thân bước chân Sơn Hà\r\n\r\nBuổi sáng hôm ấy\r\nKhi còn trắng sương bay\r\nTa như là gió phiêu lãng\r\nMang hành lý thương nhớ\r\nChẳng sao đâu, sầu bi có khi còn lâu\r\nLạc mình trong cánh buồm phiêu du\r\nChiếc thuyền đong đưa\r\nNhững ngày xa xưa\r\nBé nhỏ hay thưa Mẹ thưa Cha\r\nRằng con đi học mới về\r\nGiờ tung bay, khúc nhạc mê say\r\nNỗi lòng tha hương, vướng đường tương lai\r\nƯớc rằng ngày mai nắng lên\r\nNgày mai nắng lên ta sẽ quên\r\nNày này này là em gì ơi\r\nEm gì ơi, em gì ơi!\r\nỞ lại và yêu được không \r\nYêu được không, yêu được không\r\nThật lòng này ta chỉ mong ta chỉ mong \r\nBên dòng sông, người có nhớ có trông ai...\r\nViệc gì phải ôm buồn đau \r\nRiêng mình ta riêng mình ta\r\nNụ cười nở muôn ngàn hoa \r\nMuôn ngàn hoa, muôn ngàn hoa\r\nCuộc đời này thật là vui biết bao\r\nTrời cao núi xanh mây ngàn sao\r\nKhi bánh xe còn lăn bánh\r\nKhi bánh xe còn lăn bánh\r\nTa xoay vòng với cuộc sống hối hả \r\nQuên đi mộng ước thanh xuân đã trôi qua\r\nTa ngại va chạm khi nhiều lần dối trá\r\nNhững lần áp lực bởi công việc muốn đi xa\r\nVứt hết một lần trước khi nhìn đời thoái hóa \r\nTự do tự tại như chim trời và thi ca\r\nBước qua nà\r\nĐời nhiều lúc cảm thấy rất nhiều trò\r\nThôi ta giang tay ôm lấy cả bầu trời!\r\nHỡi bạn thân ơi! Lá mù u rơi\r\nKhát vọng ra khơi, chúng mình đi chơi\r\nBước thật hiên ngang, lối về thênh thang\r\nChẳng cần cao sang, nỗi lòng sang trang và từ nay\r\nLạc mình trong cánh buồm phiêu du\r\nChiếc thuyền đong đưa\r\nNhững ngày xa xưa\r\nBé nhỏ hay thưa Mẹ thưa Cha\r\nRằng con đi học mới về\r\nGiờ tung bay, khúc nhạc mê say\r\nNỗi lòng tha hương, vướng đường tương lai\r\nƯớc rằng ngày mai nắng lên\r\nNgày mai nắng lên ta sẽ quên\r\nNày này này là em gì ơi\r\nEm gì ơi, em gì ơi!\r\nỞ lại và yêu được không \r\nYêu được không, yêu được không\r\nThật lòng này ta chỉ mong ta chỉ mong \r\nBên dòng sông, người có nhớ có trông ai...\r\nViệc gì phải ôm buồn đau \r\nRiêng mình ta riêng mình ta\r\nNụ cười nở muôn ngàn hoa \r\nMuôn ngàn hoa, muôn ngàn hoa\r\nCuộc đời này thật là vui biết bao\r\nTrời cao núi xanh mây ngàn sao\r\nNày này này là em gì ơi\r\nEm gì ơi, em gì ơi!\r\nỞ lại và yêu được không \r\nYêu được không, yêu được không\r\nThật lòng này ta chỉ mong ta chỉ mong \r\nBên dòng sông, người có nhớ có trông ai...\r\nViệc gì phải ôm buồn đau \r\nRiêng mình ta riêng mình ta\r\nNụ cười nở muôn ngàn hoa \r\nMuôn ngàn hoa, muôn ngàn hoa\r\nCuộc đời này thật là vui biết bao\r\nTrời cao núi xanh mây ngàn sao', 'Jack', 0, '353f305006cc99e50ef00877e4135d0e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_music`
--
ALTER TABLE `categories_music`
  ADD PRIMARY KEY (`id_music`,`id_category`);

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
