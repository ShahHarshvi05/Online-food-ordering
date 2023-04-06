-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230319.4d612b0175
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 11:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(5, 'harshvi', 'harshvi123', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'praj', 'praj', '9c41f7637573ebe4de6afbaf3f27c06d'),
(9, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(2, 'Pizza', 'Food_Category_450.png', 'Yes', 'Yes'),
(4, 'Italian cusine', '', 'Yes', 'Yes'),
(5, 'Special Salads', '', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(6, 'Cheese and corn pizza', '', 340.00, 'Food_312.jpg', 2, 'Yes', 'Yes'),
(7, 'Indian Tandoori Panner', '', 480.00, 'Food_475.jpg', 2, 'Yes', 'Yes'),
(8, 'Paneer Makhani', '', 300.00, 'Food_426.jpg', 2, 'Yes', 'Yes'),
(10, 'pasta', '', 200.00, 'Food_665.jpg', 4, 'Yes', 'Yes'),
(11, 'Classic lasagna', '', 250.00, 'Food_408.jpg', 4, 'Yes', 'Yes'),
(12, 'Veg-Loaded', '', 200.00, 'Food-Name-8745.jpg', 4, 'Yes', 'Yes'),
(13, 'Red Chilli Enchiladas', '', 320.00, 'Food_355.jpg', 4, 'Yes', 'Yes'),
(14, 'Macroon Spice Pasta PIzza', '', 350.00, 'Food-Name-3542.jpg', 2, 'Yes', 'Yes'),
(15, 'Thai Salad', '', 160.00, 'Food_547.jpg', 5, 'Yes', 'Yes'),
(16, 'Spaghetti Salad', '', 120.00, 'Food_291.jpg', 5, 'Yes', 'Yes'),
(17, 'Brocoli Salad', '', 180.00, 'Food_38.jpg', 5, 'Yes', 'Yes'),
(18, 'Moroccan Salad', '', 200.00, 'Food_458.jpg', 5, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_address`) VALUES
(2, 'Red Chilli Enchiladas', 320.00, 2, 640.00, '2022-09-28 08:21:03', 'Delivered', 'bfghbtg', '4538', 'mhjkujty'),
(3, 'Classic lasagna', 250.00, 3, 750.00, '2022-09-30 03:34:05', 'Delivered', 'Vishaka', '987452136', 'pal'),
(4, 'Classic lasagna', 250.00, 2, 500.00, '2022-10-01 06:51:00', 'Delivered', 'maitri', '464', 'frijgri'),
(5, 'pasta', 200.00, 1, 200.00, '2022-10-01 07:40:49', 'Ordered', 'sdfg', '563', 'dfghj'),
(6, 'pasta', 200.00, 2, 400.00, '2022-10-01 08:22:43', 'Delivered', 'GDFHT', '565', 'JUIYIU'),
(7, 'pasta', 200.00, 2, 400.00, '2022-11-17 07:19:13', 'Ordered', 'harshvi shah', '495185', 'ds,'),
(8, 'Macroon Spice Pasta PIzza', 350.00, 2, 700.00, '2023-03-20 07:07:55', 'Ordered', 'bghtf', 'gf', 'bfghtyj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
