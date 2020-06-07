-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2020 at 12:19 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_logs`
--

-- --------------------------------------------------------

--
-- Table structure for table `trade_info`
--

CREATE TABLE `trade_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `trade_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trade_info`
--

INSERT INTO `trade_info` (`id`, `name`, `price`, `qty`, `category`, `trade_date`) VALUES
(1, 'Indian Railway Catering and To', '1269.9', '10', 'B', '13/04/2020'),
(2, 'Indian Railway Catering and To', '1270', '22', 'B', '13/04/2020'),
(3, 'BALAJI TELEFILMS LTD.', '49.75', '80', 'B', '22/04/2020'),
(4, 'BALAJI TELEFILMS LTD.', '52.6', '80', 'S', '24/04/2020'),
(5, 'Indian Railway Catering and To', '1316.65', '2', 'S', '24/04/2020'),
(6, 'Indian Railway Catering and To', '1316.4', '30', 'S', '24/04/2020'),
(7, 'BALAJI TELEFILMS LTD.', '55.3', '80', 'B', '28/04/2020'),
(8, 'BALAJI TELEFILMS LTD.', '56.6', '80', 'S', '28/04/2020'),
(9, 'Indian Railway Catering and To', '1263.05', '1', 'B', '28/04/2020'),
(10, 'Indian Railway Catering and To', '1271.1', '1', 'B', '28/04/2020'),
(11, 'Indian Railway Catering and To', '1271.1', '19', 'B', '28/04/2020'),
(12, 'Indian Railway Catering and To', '1250.1', '10', 'B', '28/04/2020'),
(13, 'BALAJI TELEFILMS LTD.', '54.5', '80', 'B', '29/04/2020'),
(14, 'BALAJI TELEFILMS LTD.', '56.5', '80', 'S', '29/04/2020'),
(15, 'PVR LTD.', '1023.4', '10', 'B', '30/04/2020'),
(16, 'INOX LEISURE LTD.', '216', '100', 'B', '30/04/2020'),
(17, 'Indian Railway Catering and To', '1321', '31', 'S', '30/04/2020'),
(18, 'Indian Railway Catering and To', '1322.95', '31', 'B', '30/04/2020'),
(19, 'Indian Railway Catering and To', '1323.95', '1', 'S', '30/04/2020'),
(20, 'Indian Railway Catering and To', '1324', '10', 'S', '30/04/2020'),
(21, 'Indian Railway Catering and To', '1324', '16', 'S', '30/04/2020'),
(22, 'Indian Railway Catering and To', '1324', '3', 'S', '30/04/2020'),
(23, 'Indian Railway Catering and To', '1324', '1', 'S', '30/04/2020'),
(24, 'INDUSIND BANK LTD.', '427.55', '10', 'B', '04/05/2020'),
(25, 'PVR LTD.', '962', '10', 'B', '04/05/2020'),
(26, 'INOX LEISURE LTD.', '207.15', '50', 'B', '04/05/2020'),
(27, 'SBI CARDS AND PAYMENT SERVICES', '570.85', '2', 'B', '04/05/2020'),
(28, 'SBI CARDS AND PAYMENT SERVICES', '570.85', '1', 'B', '04/05/2020'),
(29, 'SBI CARDS AND PAYMENT SERVICES', '571', '9', 'B', '04/05/2020'),
(30, 'BALAJI TELEFILMS LTD.', '55.75', '80', 'B', '05/05/2020'),
(31, 'SBI CARDS AND PAYMENT SERVICES', '555', '1', 'B', '05/05/2020'),
(32, 'SBI CARDS AND PAYMENT SERVICES', '555', '2', 'B', '05/05/2020'),
(33, 'INDUSIND BANK LTD.', '458', '10', 'S', '07/05/2020'),
(34, 'INOX LEISURE LTD.', '213.85', '17', 'B', '07/05/2020'),
(35, 'INOX LEISURE LTD.', '213.9', '33', 'B', '07/05/2020'),
(36, 'INOX LEISURE LTD.', '213.65', '28', 'B', '07/05/2020'),
(37, 'INOX LEISURE LTD.', '213.7', '22', 'B', '07/05/2020'),
(38, 'INOX LEISURE LTD.', '213.7', '50', 'B', '07/05/2020'),
(39, 'INOX LEISURE LTD.', '218.4', '67', 'S', '07/05/2020'),
(40, 'INOX LEISURE LTD.', '218.35', '28', 'S', '07/05/2020'),
(41, 'INOX LEISURE LTD.', '218.3', '55', 'S', '07/05/2020'),
(42, 'BALAJI TELEFILMS LTD.', '60', '80', 'S', '08/05/2020'),
(43, 'INDUSIND BANK LTD.', '440', '10', 'B', '11/05/2020'),
(44, 'Future Retail Ltd.', '84.6', '50', 'S', '11/05/2020'),
(45, 'Future Retail Ltd.', '84.4', '50', 'B', '11/05/2020'),
(46, 'BATA INDIA LTD.', '1290', '4', 'B', '12/05/2020'),
(47, 'BATA INDIA LTD.', '1317.95', '4', 'S', '12/05/2020'),
(48, 'SBI CARDS AND PAYMENT SERVICES', '532.15', '4', 'B', '12/05/2020'),
(50, 'INDUSIND BANK LTD.', '419.1', '10', 'B', '15/05/2020'),
(51, 'INDUSIND BANK LTD.', '422.35', '10', 'S', '15/05/2020'),
(52, 'SBI CARDS AND PAYMENT SERVICES', '542', '3', 'S', '15/05/2020'),
(53, 'BATA INDIA LTD.', '1292', '4', 'B', '18/05/2020'),
(54, 'INDUSIND BANK LTD.', '390', '1', 'B', '18/05/2020'),
(55, 'INDUSIND BANK LTD.', '390', '2', 'B', '18/05/2020'),
(56, 'INDUSIND BANK LTD.', '391.55', '9', 'B', '18/05/2020'),
(58, 'BALAJI TELEFILMS LTD.', '58.35', '21', 'B', '20/05/2020'),
(59, 'BALAJI TELEFILMS LTD.', '58.5', '59', 'B', '21/05/2020'),
(60, 'BALAJI TELEFILMS LTD.', '63', '69', 'S', '21/05/2020'),
(61, 'BALAJI TELEFILMS LTD.', '63', '11', 'S', '21/05/2020'),
(62, 'INOX LEISURE LTD.', '214.45', '100', 'S', '21/05/2020'),
(63, 'INOX LEISURE LTD.', '214.45', '49', 'S', '21/05/2020'),
(64, 'INOX LEISURE LTD.', '209.8', '1', 'S', '21/05/2020'),
(65, 'BATA INDIA LTD.', '1274', '4', 'B', '22/05/2020'),
(66, 'ICICI BANK LTD.', '295', '10', 'B', '22/05/2020'),
(67, 'ICICI BANK LTD.', '286.95', '10', 'B', '22/05/2020'),
(68, 'INDUSIND BANK LTD.', '345', '12', 'B', '26/05/2020'),
(69, 'BALAJI TELEFILMS LTD.', '60', '97', 'B', '26/05/2020'),
(70, 'BALAJI TELEFILMS LTD.', '60', '103', 'B', '26/05/2020'),
(71, 'SBI CARDS AND PAYMENT SERVICES', '499', '10', 'B', '26/05/2020'),
(72, 'BATA INDIA LTD.', '1323', '8', 'S', '27/05/2020'),
(73, 'ICICI BANK LTD.', '306.85', '20', 'S', '27/05/2020'),
(74, 'INDUSIND BANK LTD.', '356', '12', 'S', '27/05/2020'),
(75, 'SBI CARDS AND PAYMENT SERVICES', '507.2', '10', 'S', '27/05/2020'),
(76, 'STANDARD CHARTERED PLC', '33', '120', 'B', '27/05/2020'),
(77, 'BATA INDIA LTD.', '1296', '10', 'B', '28/05/2020'),
(78, 'IFB INDUSTRIES LTD.', '396', '10', 'B', '28/05/2020'),
(79, 'IFB INDUSTRIES LTD.', '396', '5', 'B', '28/05/2020'),
(80, 'BALAJI TELEFILMS LTD.', '60', '100', 'B', '28/05/2020'),
(81, 'BALAJI TELEFILMS LTD.', '59', '53', 'B', '28/05/2020'),
(82, 'BALAJI TELEFILMS LTD.', '59', '10', 'B', '28/05/2020'),
(83, 'BALAJI TELEFILMS LTD.', '59', '166', 'B', '28/05/2020'),
(84, 'BALAJI TELEFILMS LTD.', '59', '21', 'B', '28/05/2020'),
(85, 'STANDARD CHARTERED PLC', '34.4', '11', 'S', '28/05/2020'),
(86, 'BATA INDIA LTD.', '1290', '10', 'B', '29/05/2020'),
(87, 'BATA INDIA LTD.', '1325', '20', 'S', '29/05/2020'),
(88, 'STANDARD CHARTERED PLC', '32.6', '200', 'B', '29/05/2020'),
(89, 'VOLTAS LTD.', '529', '20', 'B', '01/06/2020'),
(90, 'ZEE ENTERTAINMENT ENTERPRISES', '186.25', '20', 'B', '01/06/2020'),
(91, 'ZEE ENTERTAINMENT ENTERPRISES', '186', '3', 'B', '01/06/2020'),
(92, 'ZEE ENTERTAINMENT ENTERPRISES', '186', '37', 'B', '01/06/2020'),
(93, 'IFB INDUSTRIES LTD.', '402', '1', 'S', '01/06/2020'),
(94, 'IFB INDUSTRIES LTD.', '402', '1', 'S', '01/06/2020'),
(95, 'IFB INDUSTRIES LTD.', '402', '1', 'S', '01/06/2020'),
(96, 'IFB INDUSTRIES LTD.', '402', '10', 'S', '01/06/2020'),
(97, 'IFB INDUSTRIES LTD.', '402', '2', 'S', '01/06/2020'),
(98, 'ZEE MEDIA CORPORATION LIMITED', '5.2', '2000', 'B', '01/06/2020'),
(99, 'INDUSIND BANK LTD.', '420', '22', 'S', '02/06/2020'),
(100, 'MARUTI SUZUKI INDIA LTD.', '5824.4', '2', 'B', '02/06/2020'),
(101, 'Indian Railway Catering and To', '1413.05', '5', 'B', '02/06/2020'),
(102, 'ZEE MEDIA CORPORATION LIMITED', '5.3', '2000', 'S', '03/06/2020'),
(103, 'SBI CARDS AND PAYMENT SERVICES', '621', '20', 'B', '03/06/2020'),
(104, 'SBI CARDS AND PAYMENT SERVICES', '580.2', '10', 'S', '03/06/2020'),
(105, 'SBI CARDS AND PAYMENT SERVICES', '580.2', '2', 'S', '03/06/2020'),
(106, 'SBI CARDS AND PAYMENT SERVICES', '580.2', '2', 'S', '03/06/2020'),
(107, 'SBI CARDS AND PAYMENT SERVICES', '580.2', '1', 'S', '03/06/2020'),
(108, 'SBI CARDS AND PAYMENT SERVICES', '580.2', '1', 'S', '03/06/2020'),
(109, 'STANDARD CHARTERED PLC', '34.5', '19', 'S', '03/06/2020'),
(110, 'STANDARD CHARTERED PLC', '34.5', '250', 'S', '03/06/2020'),
(111, 'STANDARD CHARTERED PLC', '34.5', '12', 'S', '03/06/2020'),
(112, 'STANDARD CHARTERED PLC', '34.5', '28', 'S', '03/06/2020'),
(113, 'BATA INDIA LTD.', '1388.2', '4', 'B', '04/06/2020'),
(114, 'VOLTAS LTD.', '575', '20', 'S', '04/06/2020'),
(115, 'ZEE ENTERTAINMENT ENTERPRISES', '205', '52', 'S', '04/06/2020'),
(116, 'ZEE ENTERTAINMENT ENTERPRISES', '205', '8', 'S', '04/06/2020'),
(117, 'INDUSIND BANK LTD.', '428', '10', 'B', '04/06/2020'),
(118, 'HDFC LIFE INSURANCE COMPANY LI', '513', '20', 'B', '04/06/2020'),
(119, 'CIPLA LTD.', '654.6', '10', 'S', '05/06/2020'),
(120, 'CIPLA LTD.', '653', '10', 'B', '05/06/2020'),
(121, 'STATE BANK OF INDIA', '186', '5', 'B', '05/06/2020'),
(122, 'STATE BANK OF INDIA', '186', '25', 'B', '05/06/2020'),
(123, 'STATE BANK OF INDIA', '186', '70', 'B', '05/06/2020'),
(124, 'IFB INDUSTRIES LTD.', '428.9', '8', 'B', '05/06/2020'),
(125, 'IFB INDUSTRIES LTD.', '428.9', '10', 'B', '05/06/2020'),
(126, 'IFB INDUSTRIES LTD.', '428.9', '2', 'B', '05/06/2020'),
(127, 'INDUSIND BANK LTD.', '418', '10', 'B', '05/06/2020'),
(128, 'INOX LEISURE LTD.', '283', '3', 'B', '05/06/2020'),
(129, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(130, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(131, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(132, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(133, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(134, 'INOX LEISURE LTD.', '283', '2', 'B', '05/06/2020'),
(135, 'INOX LEISURE LTD.', '283', '2', 'B', '05/06/2020'),
(136, 'INOX LEISURE LTD.', '283', '2', 'B', '05/06/2020'),
(137, 'INOX LEISURE LTD.', '283', '2', 'B', '05/06/2020'),
(138, 'INOX LEISURE LTD.', '283', '2', 'B', '05/06/2020'),
(139, 'INOX LEISURE LTD.', '283', '2', 'B', '05/06/2020'),
(140, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(141, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(142, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(143, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(144, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(145, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(146, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(147, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(148, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(149, 'INOX LEISURE LTD.', '283', '1', 'B', '05/06/2020'),
(150, 'HDFC LIFE INSURANCE COMPANY LI', '517', '20', 'S', '05/06/2020'),
(151, 'Indian Railway Catering and To', '1480', '5', 'S', '05/06/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trade_info`
--
ALTER TABLE `trade_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trade_info`
--
ALTER TABLE `trade_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
