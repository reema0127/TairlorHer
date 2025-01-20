-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 20, 2025 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailorher`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `Order_ID` int(11) NOT NULL,
  `Order_Status` varchar(20) NOT NULL,
  `Order_Date` date NOT NULL,
  `Total_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_`
--

INSERT INTO `order_` (`Order_ID`, `Order_Status`, `Order_Date`, `Total_Price`) VALUES
(1, 'Completed', '2024-12-18', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) DEFAULT NULL,
  `Fabric_Options` varchar(50) DEFAULT NULL,
  `Color` varchar(20) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Size` varchar(100) DEFAULT NULL,
  `Category` enum('Dress','Skirt','Top','Bottom') DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Fabric_Options`, `Color`, `Price`, `Size`, `Category`, `Image`) VALUES
(9, 'fvdv', 'Cotton,Linen,Maza', 'blue', '12', 'Small,Medium,Large,Custom', 'Dress', 'TailorHer/App/Uploads/dress_2.jpg'),
(10, 'df', 'Cotton,Linen', 'dds', '1212', 'Small,Medium', 'Dress', 'TailorHer/App/Uploads/top_4.jpg'),
(12, 'Floral Top', 'Satin,Cotton', 'purple', '5000', 'Large,XL', 'Top', 'TailorHer/App/Uploads/userdb_4.jpg'),
(16, 'reema', 'Maza', 'Blue', '123', 'Large', 'Dress', 'TailorHer/App/Uploads/dress_2.jpg'),
(17, 'df', 'Satin', 'blue', '1234', 'Medium,Large', 'Top', NULL),
(19, 'edsedef', 'Satin,Linen', 'pink', '12345678', 'Large,XL', 'Bottom', 'TailorHer/App/Uploads/skirt_2.2.jpg'),
(20, 'wertghbvcds', 'Cotton,Linen', 'purple', '1234567890', 'Small,Medium,Large', 'Top', 'TailorHer/App/Uploads/userdb_6.jpg'),
(21, 'wedsa', 'Satin,Linen', 'blue', '9646464', 'Large,XL', 'Bottom', 'TailorHer/App/Uploads/skirt_2.3.jpg'),
(22, 'vdfvd', 'Linen,Custom', 'purple', '1000', 'Custom', 'Top', 'TailorHer/App/Uploads/dress_1.jpg'),
(23, 'df', 'Satin,Cotton', 'purple', '4560', 'Medium,Large', 'Bottom', 'TailorHer/App/Uploads/userdb_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Name`, `Email`, `Password`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$sRXzw9qj9ZKeFNmdgH38juRXHgbutZLOWrHuf9asbrb7BBIBI1sHG'),
(2, 'reema', 'minhaamohamed99@gmail.com', '$2y$10$IfMqK53R5gXjy3heIk1zAeRE6I1t3ZO2hTrUCthILjOQkY8.0UR42'),
(6, 'reema', 'reema@gmail.com', '$2y$10$tsB0QUKELlHJbpt/kNDJE.b1HYueuXoegKSCcSY4ZsxUg4.zlo8xW'),
(7, 'rurfk', 'minhaamohamed99@gmail.com', '$2y$10$DCjJyYiXGrqwtKXbXxCsbObJIt58syFH8cq46hHWsgnwp1U1Jmsu6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
