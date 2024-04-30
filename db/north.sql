-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 10:04 AM
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
-- Database: `north`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_cert`
--

CREATE TABLE `business_cert` (
  `id` int(11) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `typeOfBusiness` varchar(100) NOT NULL,
  `businessAddress` varchar(100) NOT NULL,
  `date_issued` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cert_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_cert`
--

INSERT INTO `business_cert` (`id`, `ownerId`, `businessName`, `typeOfBusiness`, `businessAddress`, `date_issued`, `amount`, `status`, `cert_amount`) VALUES
(1, 1, 'Kopi Ko', 'Coffee Shop', '012, Mahogany North Poblacion', '0000-00-00', '', 'Approved', ''),
(2, 2, 'Sana Oil', 'Gasoline Station', '189, Narra Street North Poblacion', '0000-00-00', '', 'Approved', ''),
(3, 3, 'Malou Sari - Sari Store', 'Store', '11 Quirino Street', '0000-00-00', '', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_cert`
--

CREATE TABLE `clearance_cert` (
  `id` int(11) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `clearanceNo` varchar(100) NOT NULL,
  `resident_id` varchar(100) NOT NULL,
  `findings` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `bcNo` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `date_issued` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cert_amount` varchar(100) NOT NULL,
  `pickup_date` varchar(100) NOT NULL,
  `rs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance_cert`
--

INSERT INTO `clearance_cert` (`id`, `ownerId`, `fname`, `mname`, `lname`, `age`, `clearanceNo`, `resident_id`, `findings`, `purpose`, `bcNo`, `amount`, `date_issued`, `status`, `cert_amount`, `pickup_date`, `rs`) VALUES
(15, 15, 'Josamine', 'R.', 'Parungao', '22', '', '18', '', 'School Requirement', '84-31', '', '2024-04-21', 'Approved', '', '2025-06-25', 'Single'),
(16, 16, 'Elena', 'S.', 'Bataller', '23', '', '19', '', 'School Requirement', '74-33', '', '2024-04-21', '2025-05-26', '', 'New', ''),
(17, 17, 'Honeylehi', 'M.', 'Santos', '21', '', '19', '', 'School Requirement', '21-11', '', '', 'Approved', '', '2024-04-25', ''),
(19, 7, 'Josamine', 'R.', 'Parungao', '22', '', '', '', 'School Requirement', '', '', '', 'Approved', '', '2026-06-06', ''),
(20, 15, 'Honeylehi', 'M.', 'Santos', '23', '', '', '', 'Travel Abroad, Overseas Employment', '', '', '', 'Approved', '', '2026-06-06', ''),
(21, 0, 'Juana', '', 'Martinez', '19', '', '6', '', '', '85-35', '', '', 'Walk-in', '', '', ''),
(24, 0, 'Antonio', '', 'Hernandez', '20', '', '8', '', '', '', '', '', 'Walk-in', '100', '', ''),
(25, 0, 'Josefa', '', 'Garcia', '21', '', '7', '', '', '', '', '', 'Walk-in', '100', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `indigency_cert`
--

CREATE TABLE `indigency_cert` (
  `id` int(11) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `year_stayed` varchar(100) NOT NULL,
  `date_issued` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `cert_amount` varchar(100) NOT NULL,
  `pickup` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indigency_cert`
--

INSERT INTO `indigency_cert` (`id`, `ownerId`, `fname`, `mname`, `lname`, `age`, `bday`, `purok`, `year_stayed`, `date_issued`, `amount`, `status`, `purpose`, `cert_amount`, `pickup`) VALUES
(5, 5, 'Elena', 'S.', 'Bataller', '27', '1999-12-25', 'Narra', '2000', '2024-04-24', '', 'Approved', 'medical assistance', '', '2025-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `land_cert`
--

CREATE TABLE `land_cert` (
  `id` int(11) NOT NULL,
  `sellerId` int(255) NOT NULL,
  `sellerName` varchar(255) NOT NULL,
  `sellerAddress` varchar(255) NOT NULL,
  `buyerName` varchar(255) NOT NULL,
  `buyerAddress` varchar(100) NOT NULL,
  `landArea` varchar(100) NOT NULL,
  `propertySold` varchar(100) NOT NULL,
  `amount` int(255) NOT NULL,
  `amount_words` varchar(255) NOT NULL,
  `legalAgree` varchar(100) NOT NULL,
  `paymentConfirm` varchar(100) NOT NULL,
  `confirmationPay` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `witness` varchar(100) NOT NULL,
  `notarizeDate` date NOT NULL,
  `locationNota` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cert_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_cert`
--

INSERT INTO `land_cert` (`id`, `sellerId`, `sellerName`, `sellerAddress`, `buyerName`, `buyerAddress`, `landArea`, `propertySold`, `amount`, `amount_words`, `legalAgree`, `paymentConfirm`, `confirmationPay`, `date`, `witness`, `notarizeDate`, `locationNota`, `status`, `cert_amount`) VALUES
(1, 1, 'Josamine Parungao', 'Mulawin, North Poblacion Gabaldon', 'Honeylhei Santos', 'Malinao, Gabaldon', '123', 'North', 70000, 'SEVENTY THOUSAND PESOS', 'yes', 'cash', 'cash', '2020-04-15', 'Nina', '2020-04-14', 'Gabaldon', 'Disapproved', ''),
(2, 2, 'Nina Sara', 'Bagting, Gabaldon', 'Honeylhei Santos', 'Malinao, Gabaldon', '568', 'North', 100000, 'ONE HUNDRED THOUSAND PESOS', 'yes', 'cash', 'cash', '2026-06-20', 'Elena Bataller', '2026-06-20', 'Gabaldon', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `livestock_cert`
--

CREATE TABLE `livestock_cert` (
  `id` int(11) NOT NULL,
  `sellerId` int(255) NOT NULL,
  `sellerName` varchar(100) NOT NULL,
  `sellerAddress` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `amount_words` varchar(255) NOT NULL,
  `buyerName` varchar(100) NOT NULL,
  `buyerAddress` varchar(100) NOT NULL,
  `itemSold` varchar(100) NOT NULL,
  `quantity` int(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `cowlicks` varchar(100) NOT NULL,
  `brandMun` varchar(100) NOT NULL,
  `brandOwn` varchar(100) NOT NULL,
  `transacDate` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `cert_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livestock_cert`
--

INSERT INTO `livestock_cert` (`id`, `sellerId`, `sellerName`, `sellerAddress`, `amount`, `amount_words`, `buyerName`, `buyerAddress`, `itemSold`, `quantity`, `age`, `sex`, `cowlicks`, `brandMun`, `brandOwn`, `transacDate`, `status`, `cert_amount`) VALUES
(3, 3, 'jhsdgh', 'zhdtgdzh', 'etyery5', '', 'tezhehe', 'styhe3s', 'erteg', 1, '22', 'Male', 'rtretyy5', 'Gabaldon', 'Gabaldon', '2024-04-15', 'Approved', ''),
(5, 5, 'Josamine Parungao', 'Mulawin, North Poblacion Gabaldon', '10000', 'One Thousand pesos', 'Jhocel B. Melindo', 'Mabini, Cabanatuan City', 'Dog', 1, '4 Months', 'Male', '', 'Gabaldon', 'Gabaldon', '2024-04-20', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `permit`
--

CREATE TABLE `permit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `businessAddress` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `orNumber` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permit_re`
--

CREATE TABLE `permit_re` (
  `id` int(11) NOT NULL,
  `businessName` varchar(100) NOT NULL,
  `businessAddress` varchar(100) NOT NULL,
  `typeOfBusiness` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `orNumber` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permit_re`
--

INSERT INTO `permit_re` (`id`, `businessName`, `businessAddress`, `typeOfBusiness`, `status`, `orNumber`, `amount`) VALUES
(1, 'Kape Ko', '0321, Banaba steet', 'Coffe Shop', '', '', ''),
(2, 'Sanaoil', '011, mahogany', 'Oil', 'New', '', ''),
(3, 'Ukay-ukay', '011, Narra', 'Clothing', 'New', '', ''),
(4, 'Ukay-ukay', '011, Narra', 'Clothing', 'New', '', ''),
(5, 'Kape Mo', '011, mahogany', 'Coffe Shop', 'New', '', ''),
(6, 'Kape Kope', '0321, Banaba steet', 'Coffe Shop', 'New', '', ''),
(7, '', '', '', 'New', '', ''),
(8, '', '', '', 'New', '', ''),
(9, '', '', '', 'New', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `residency_cert`
--

CREATE TABLE `residency_cert` (
  `id` int(11) NOT NULL,
  `ownerId` int(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` varchar(20) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `year_stayed` varchar(100) NOT NULL,
  `date_issued` date NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cert_amount` varchar(100) NOT NULL,
  `pickup_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residency_cert`
--

INSERT INTO `residency_cert` (`id`, `ownerId`, `fname`, `mname`, `lname`, `age`, `bday`, `purok`, `year_stayed`, `date_issued`, `amount`, `status`, `cert_amount`, `pickup_date`) VALUES
(18, 18, 'Honeylehi', 'M.', 'Santos', '22', '2001-12-04', 'Mahogany', '2001', '2024-04-21', '', 'Approved', '', '2025-04-30'),
(19, 16, 'Josamine', 'M.', 'Parungao', '22', '2001-06-06', 'Kamagong', '2001', '0000-00-00', '', 'New', '', '2024-06-06'),
(20, 2, 'Honeylehi', 'R.', 'Santos', '22', '2001-12-05', 'Kamagong', 'Since Birth', '0000-00-00', '', 'New', '', '2025-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `resident_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `houseNo` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `brgy` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `civil_status` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `monthly_income` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `year_stayed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`resident_id`, `fname`, `mname`, `lname`, `address`, `houseNo`, `purok`, `brgy`, `municipality`, `contact`, `civil_status`, `occupation`, `monthly_income`, `age`, `bday`, `image`, `year_stayed`) VALUES
(3, 'Juan', '', 'Dela Cruz', '', '001', 'Mabolo', 'North Poblacion', 'Gabaldon', '', 'Single', 'Student', '', '18', '2006-04-05', '1714092844683_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(4, 'Maria', '', 'Santos', '', '002', 'Banaba', 'North Poblacion', 'Gabaldon', '', 'Single', 'Student', '', '19', '2005-09-15', '1714092903305_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(5, 'Pedro', '', 'Reyes', '', '003', 'Narra', 'North Poblacion', 'Gabaldon', '', 'Single', 'Student', '', '20', '2003-02-10', '1714092959065_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(6, 'Juana', '', 'Martinez', '', '004', 'Kamagong', 'North Poblacion', 'Gabaldon', '', 'Single', 'Student', '', '20', '2003-07-20', '1714096719435_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(7, 'Josefa', '', 'Garcia', '', '005', 'Calumpit', 'North Poblacion', 'Gabaldon', '', 'Single', 'Office Assistant', '15000', '23', '2001-05-25', '1714097107269_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(8, 'Antonio', '', 'Hernandez', '', '006', 'Acasia', 'North Poblacion', 'Gabaldon', '', 'Single', 'Elementary Teacher', '25000', '25', '1998-11-30', '1714097238748_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(9, 'Francisca', '', 'Lopez', '', '007', 'Mabolo', 'North Poblacion', 'Gabaldon', '', 'Single', 'Elementary Teacher', '25000', '25', '1998-03-12', '1714097303820_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(10, 'Manuel', '', 'Cruz', '', '008', 'Banaba', 'North Poblacion', 'Gabaldon', '', 'Single', 'Sales Representative', '15000', '25', '1998-12-07', '1714097372361_default-avatar-icon-of-social-media-user-vector.jpg', '2001'),
(11, 'Rosario', '', 'Torres', '', '0009', 'Narra', 'North Poblacion', 'Gabaldon', '', 'Single', 'HIghschool Teacher', '30000', '30', '', 'default.png', '2001');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivity`
--

CREATE TABLE `tblactivity` (
  `id` int(11) NOT NULL,
  `dateofactivity` date NOT NULL,
  `activity` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblactivityphoto`
--

CREATE TABLE `tblactivityphoto` (
  `id` int(11) NOT NULL,
  `activityid` int(11) NOT NULL,
  `filename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblactivityphoto`
--

INSERT INTO `tblactivityphoto` (`id`, `activityid`, `filename`) VALUES
(18, 7, '1485255503893ChibiMaker.jpg'),
(19, 7, '1485255504014dental.jpg'),
(20, 7, '1485255504108images.jpg'),
(21, 8, '1485255608251dfxfxfxdfxfxfxdf.png'),
(22, 8, '1485255608315easy-nail-art-designs-for-beginners-youtube.jpg'),
(23, 8, '1485255608404Easy-Winter-Nail-Art-Tutorials-2013-2014-For-Beginners-Learners-10.jpg'),
(24, 8, '1485255608513motherboard.png'),
(25, 9, '148525575293111041019_1012143402147589_9043399646875097729_n.jpg'),
(26, 9, '1485255753089bg.PNG'),
(32, 10, '148526764905211041019_1012143402147589_9043399646875097729_n.jpg'),
(33, 10, '1485267649364bg.PNG'),
(34, 10, '1485267649563motherboard.png'),
(35, 10, '14855301764078196186971_2237f161bd_b.jpg'),
(36, 10, '1485530481111bicycle-1280x720.jpg'),
(38, 11, '1485530620716user2.jpg'),
(39, 10, '1711422261312cleanup.png'),
(40, 11, '1711422300525fiesta.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblblotter`
--

CREATE TABLE `tblblotter` (
  `id` int(11) NOT NULL,
  `yearRecorded` varchar(4) NOT NULL,
  `dateRecorded` date NOT NULL,
  `complainant` text NOT NULL,
  `cage` int(11) NOT NULL,
  `caddress` text NOT NULL,
  `ccontact` int(11) NOT NULL,
  `personToComplain` text NOT NULL,
  `page` int(11) NOT NULL,
  `paddress` text NOT NULL,
  `pcontact` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `actionTaken` varchar(50) NOT NULL,
  `sStatus` varchar(50) NOT NULL,
  `locationOfIncidence` text NOT NULL,
  `recordedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblblotter`
--

INSERT INTO `tblblotter` (`id`, `yearRecorded`, `dateRecorded`, `complainant`, `cage`, `caddress`, `ccontact`, `personToComplain`, `page`, `paddress`, `pcontact`, `complaint`, `actionTaken`, `sStatus`, `locationOfIncidence`, `recordedby`) VALUES
(7, '2024', '2024-04-27', 'Marian Ny', 25, 'ssad', 2233, 'John Smith', 30, 'ddas', 1155, 'Cyberbully', '2nd Option', 'Solved', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblhousehold`
--

CREATE TABLE `tblhousehold` (
  `id` int(11) NOT NULL,
  `houseno` int(11) NOT NULL,
  `purok` varchar(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblhousehold`
--

INSERT INTO `tblhousehold` (`id`, `houseno`, `purok`, `fname`, `mname`, `lname`, `image`) VALUES
(6, 1, 'Acasia', 'Evelyn', '', 'Garcia', '1714095116155_default-avatar-icon-of-social-media-user-vector.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblkabataan`
--

CREATE TABLE `tblkabataan` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblkabataan`
--

INSERT INTO `tblkabataan` (`id`, `fname`, `mname`, `lname`, `position`, `contact`, `bday`, `image`) VALUES
(1, 'Ma. Victoria', '', 'Diozon', 'SK Chairperson', '09562359843', '2000-01-19', '1713317905514_download.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblkawani`
--

CREATE TABLE `tblkawani` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `position` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `bday` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblkawani`
--

INSERT INTO `tblkawani` (`id`, `fname`, `mname`, `lname`, `position`, `contact`, `address`, `bday`, `image`) VALUES
(8, 'Divino', '', 'Eugenio', 'Brgy Administrator', '09094421486', 'Ligaya', '2024-03-02', '1711197295162_download.jpg'),
(9, 'Robelyn ', 'D.', 'Dacaran', 'Clerk/Secretary', '09123244227', 'Ligaya', '2023-12-06', '1711197333200_pngtree-woman-career-cartoon-vector-png-image_6633179.png'),
(10, 'Ferdinand', 'V. ', 'Sagat', 'OIC-BARC', '09556807335', 'Ligaya', '2024-04-01', '1711197457092_download.jpg'),
(11, 'Paulino', '', 'Balgos', 'BHRAO', '00', 'Ligaya', '00-00-0000', '1711190963028_360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg'),
(14, 'Rolly', '', 'Jose', 'Utility/Cemetery', '00', 'Ligaya', '00-00-0000', '1711191075448_360_F_364211147_1qgLVxv1Tcq0Ohz3FawUfrtONzz8nq3e.jpg'),
(15, 'Marlito', '', 'Sagat', 'Driver', '00', 'Ligaya', '', '1711197572928_istockphoto-165810917-612x612.jpg'),
(16, 'Nestor', 'P.', 'Vegiga JR.', 'Driver', '00', 'Ligaya', '', '1711197583498_istockphoto-165810917-612x612.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `logdate` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`id`, `user`, `logdate`, `action`) VALUES
(2, 'asd', '2017-01-04 00:00:00', 'Added Resident namedjayjay, asd asd'),
(3, 'asd', '2017-01-04 19:13:40', 'Update Resident named Sample1, User1 Brgy1'),
(4, 'sad', '2017-01-05 13:22:10', 'Update Official named eliezer a. vacalares, jr.'),
(7, 'sad', '2017-01-05 13:54:40', 'Update Household Number 1'),
(8, 'sad', '2017-01-05 14:00:08', 'Update Blotter Request sda, as das'),
(9, 'sad', '2017-01-05 14:15:39', 'Update Clearance with clearance number of 123131'),
(10, 'sad', '2017-01-05 14:25:03', 'Update Permit with business name of asda'),
(11, 'sad', '2017-01-05 14:25:25', 'Update Resident named Sample1, User1 Brgy1'),
(12, 'Administrator', '2017-01-24 16:32:40', 'Added Permit with business name of hahaha'),
(13, 'Administrator', '2017-01-24 16:35:41', 'Added Clearance with clearance number of 123'),
(14, 'Administrator', '2017-01-24 18:43:35', 'Added Activity sad'),
(15, 'Administrator', '2017-01-24 18:45:49', 'Added Activity qwe'),
(16, 'Administrator', '2017-01-24 18:46:20', 'Added Activity ss'),
(17, 'Administrator', '2017-01-24 18:47:39', 'Added Activity e'),
(18, 'Administrator', '2017-01-24 18:55:20', 'Added Activity activity'),
(19, 'Administrator', '2017-01-24 18:58:23', 'Added Activity Activity'),
(20, 'Administrator', '2017-01-24 19:00:07', 'Added Activity activity'),
(21, 'Administrator', '2017-01-24 19:02:32', 'Added Activity Activity'),
(22, 'Administrator', '2017-01-24 19:04:54', 'Added Activity activity'),
(23, 'Administrator', '2017-01-24 19:08:40', 'Update Activity activity'),
(24, 'Administrator', '2017-01-27 23:23:40', 'Added Activity teets'),
(25, 'Administrator', '2017-01-27 23:24:14', 'Update Resident named Sample1, User1 Brgy1'),
(26, 'Administrator', '2017-01-27 23:25:10', 'Update Resident named sda, as das'),
(27, 'Administrator', '2017-01-30 10:45:13', 'Added Resident named 2, 2 2'),
(28, 'Administrator', '2017-01-30 10:45:54', 'Added Resident named 2, 2 2'),
(29, 'Administrator', '2017-02-06 08:58:23', 'Update Resident named sda, as das'),
(30, 'Administrator', '2017-02-06 09:00:14', 'Update Resident named sda, as das'),
(31, 'Administrator', '2017-02-06 09:03:57', 'Added Household Number 2'),
(32, 'Administrator', '2017-02-06 09:04:25', 'Added Household Number 2'),
(33, 'Administrator', '2024-03-23 14:36:04', 'Added Official named BERNARD S. SORIANO'),
(34, 'Administrator', '2024-03-23 14:44:26', 'Update Official named EDISON L. GINES JR'),
(35, 'Administrator', '2024-03-23 14:44:54', 'Update Official named BERNARD S. SORIANO'),
(36, 'Administrator', '2024-03-23 14:45:22', 'Update Official named FRANKLIN C. BOCALERE'),
(37, 'Administrator', '2024-03-23 14:45:22', 'Update Official named FRANKLIN C. BOCALERE'),
(38, 'Administrator', '2024-03-23 14:46:13', 'Update Official named PAUL MC JOANNER T. SOTTO'),
(39, 'Administrator', '2024-03-23 14:47:06', 'Update Official named RANDY N. PAGARAGAN'),
(40, 'Administrator', '2024-03-23 14:47:49', 'Update Official named NORWEL P. TANAFRANCA'),
(41, 'Administrator', '2024-03-23 14:48:58', 'Update Official named REMIGIO B. VINO JR.'),
(42, 'Administrator', '2024-03-23 14:49:39', 'Update Official named JACINTO C. BALBIDO'),
(43, 'Administrator', '2024-03-23 14:50:38', 'Added Official named VICTORINO B. SOTTO JR.'),
(44, 'Administrator', '2024-03-23 14:58:30', 'Update Staff with name of sad'),
(45, 'Administrator', '2024-03-23 14:59:05', 'Update Staff with name of sad'),
(46, 'Administrator', '2024-03-23 15:00:18', 'Added Staff with name of Josamine'),
(47, 'Administrator', '2024-03-23 16:29:58', 'Added Resident named DARACAN, ROBELYN D'),
(48, 'Administrator', '2024-03-23 16:30:26', 'Added Resident named DARACAN, ROBELYN D'),
(49, 'Administrator', '2024-03-23 16:53:49', 'Added Resident named DARACAN, ROBELYN D'),
(50, 'Administrator', '2024-03-23 16:54:28', 'Added Resident named DARACAN, ROBELYN D'),
(51, 'Administrator', '2024-03-23 16:56:06', 'Added Resident named DARACAN, ROBELYN D'),
(52, 'Administrator', '2024-03-23 16:57:19', 'Added Resident named DARACAN, ROBELYN D'),
(53, 'Administrator', '2024-03-23 17:00:26', 'Added Resident named DARACAN, ROBELYN D'),
(54, 'Administrator', '2024-03-23 17:03:53', 'Added Resident named DARACAN, ROBELYN D'),
(55, 'Administrator', '2024-03-23 17:04:18', 'Added Resident named DARACAN, ROBELYN D'),
(56, 'Administrator', '2024-03-23 17:04:43', 'Added Resident named Parungao, Josamine Rillon'),
(57, 'Administrator', '2024-03-23 17:08:29', 'Added Resident named Parungao, Josamine Rillon'),
(58, 'Administrator', '2024-03-23 17:08:53', 'Added Resident named melindo, jho parungao'),
(59, 'Administrator', '2024-03-23 17:08:57', 'Added Resident named melindo, jho parungao'),
(60, 'Administrator', '2024-03-23 17:09:16', 'Added Resident named melindo, jho parungao'),
(61, 'Administrator', '2024-03-23 17:27:06', 'Added Staff named Parungao, jho melindo'),
(62, 'Administrator', '2024-03-23 17:27:55', 'Added Staff named MELINDO, JHO PARUNGAO'),
(63, 'Administrator', '2024-03-23 17:32:01', 'Added Staff named Josamine, Rillon Parungao'),
(64, 'Administrator', '2024-03-23 17:34:42', 'Added Staff named JHO, PARUNGAO MELINDO'),
(65, 'Administrator', '2024-03-23 17:42:20', 'Added Staff named Josamine, Rillon Parungao'),
(66, 'Administrator', '2024-03-23 17:43:14', 'Added Staff named JHO, PARUNGAO MELINDO'),
(67, 'Administrator', '2024-03-23 17:57:58', 'Added Staff named ROBELYN, D DARACAN'),
(68, 'Administrator', '2024-03-23 17:58:03', 'Added Staff named ROBELYN, D DARACAN'),
(69, 'Administrator', '2024-03-23 17:58:30', 'Added Staff named ROBELYN, D DARACAN'),
(70, 'Administrator', '2024-03-23 18:07:04', 'Added Staff named Divino,  Eugenio'),
(71, 'Administrator', '2024-03-23 18:07:36', 'Added Staff named Robelyn , D.  Dacaran'),
(72, 'Administrator', '2024-03-23 18:08:10', 'Added Staff named Ferdinand, V.  Sagat'),
(73, 'Administrator', '2024-03-23 18:08:34', 'Added Staff named Ferdinand, V.  Sagat'),
(74, 'Administrator', '2024-03-23 18:09:08', 'Added Staff named Paulino,  Balgos'),
(75, 'Administrator', '2024-03-23 18:09:35', 'Added Staff named Dolores, B. Pascual'),
(76, 'Administrator', '2024-03-23 18:09:59', 'Added Staff named Sosima, V. Colorado'),
(77, 'Administrator', '2024-03-23 18:40:15', 'Added Staff named Josamine, Rillon Parungao'),
(78, 'Administrator', '2024-03-23 18:46:48', 'Added Staff named Divino,  Eugenio'),
(79, 'Administrator', '2024-03-23 18:48:23', 'Added Staff named Robelyn , D. Dacaran'),
(80, 'Administrator', '2024-03-23 18:48:48', 'Added Staff named Ferdinand, V.  Sagat'),
(81, 'Administrator', '2024-03-23 18:49:23', 'Added Staff named Paulino,  Balgos'),
(82, 'Administrator', '2024-03-23 18:49:51', 'Added Staff named Dolores, B. Pascual'),
(83, 'Administrator', '2024-03-23 18:50:22', 'Added Staff named Sosima, V.  Colorado'),
(84, 'Administrator', '2024-03-23 18:51:15', 'Added Staff named Rolly,  Jose'),
(85, 'Administrator', '2024-03-23 18:51:45', 'Added Staff named Marlito,  Sagat'),
(86, 'Administrator', '2024-03-23 18:52:14', 'Added Staff named Nestor, P. Vegiga JR.'),
(87, 'Administrator', '2024-03-23 18:53:33', 'Added Staff named Berialdo, N. Agustin'),
(88, 'Administrator', '2024-03-23 18:54:16', 'Added Staff named Antonio, P. Novilla'),
(89, 'Administrator', '2024-03-23 18:55:00', 'Added Staff named Jean,  Felipe'),
(90, 'Administrator', '2024-03-23 18:55:45', 'Added Staff named Rachelle, D. Albinto'),
(91, 'Administrator', '2024-03-23 18:56:27', 'Added Staff named Jayson , P. Vegiga'),
(92, 'Administrator', '2024-03-23 19:30:23', 'Added Official named SORIANO, BERNARD S.'),
(93, 'Administrator', '2024-03-23 20:04:41', 'Update Staff named Divino,  Eugenio'),
(94, 'Administrator', '2024-03-23 20:04:53', 'Update Staff named Divino,  Eugenio'),
(95, 'Administrator', '2024-03-23 20:06:39', 'Update Staff named Divino, 8 Divino'),
(96, 'Administrator', '2024-03-23 20:06:48', 'Update Staff named Divino, 8 Divino'),
(97, 'Administrator', '2024-03-23 20:09:40', 'Update Staff named Divino, 8 Divino'),
(98, 'Administrator', '2024-03-23 20:09:50', 'Update Staff named Divino, 8 Divino'),
(99, 'Administrator', '2024-03-23 20:10:08', 'Update Staff named Robelyn , 9 Robelyn '),
(100, 'Administrator', '2024-03-23 20:13:14', 'Update Staff named Antonio, 18 Antonio'),
(101, 'Administrator', '2024-03-23 20:18:50', 'Update Staff named Berialdo, 17 Berialdo'),
(102, 'Administrator', '2024-03-23 20:33:19', 'Update Staff named Jean, 19 Jean'),
(103, 'Administrator', '2024-03-23 20:34:55', 'Update Staff named Divino, 8 Divino'),
(104, 'Administrator', '2024-03-23 20:35:33', 'Update Staff named Robelyn , 9 Robelyn '),
(105, 'Administrator', '2024-03-23 20:35:56', 'Update Staff named Ferdinand, 10 Ferdinand'),
(106, 'Administrator', '2024-03-23 20:37:26', 'Update Staff named Ferdinand, 10 Ferdinand'),
(107, 'Administrator', '2024-03-23 20:37:37', 'Update Staff named Ferdinand, 10 Ferdinand'),
(108, 'Administrator', '2024-03-23 20:37:49', 'Update Staff named Dolores, 12 Dolores'),
(109, 'Administrator', '2024-03-23 20:39:32', 'Update Staff named Marlito, 15 Marlito'),
(110, 'Administrator', '2024-03-23 20:39:43', 'Update Staff named Nestor, 16 Nestor'),
(111, 'Administrator', '2024-03-24 09:13:44', 'Added Staff named Josamine, Rillon Parungao'),
(112, 'Administrator', '2024-03-24 09:14:32', 'Added Staff named Josamine, Rillon Parungao'),
(113, 'Administrator', '2024-03-24 09:15:03', 'Added Staff named JHO, PARUNGAO MELINDO'),
(114, 'Administrator', '2024-03-24 09:15:58', 'Update Staff named Josamine, 12 Josamine'),
(115, 'Administrator', '2024-03-24 09:17:46', 'Update Staff named Josamine, 12 Josamine'),
(116, 'Administrator', '2024-03-24 09:18:27', 'Update Staff named Divino, 8 Divino'),
(117, 'Administrator', '2024-03-24 09:20:39', 'Update Staff named Divino, 8 Divino'),
(118, 'Administrator', '2024-03-24 09:26:52', 'Update Staff named Josamine, 12 Josamine'),
(119, 'Administrator', '2024-03-24 09:27:00', 'Update Staff named JHOCEL, 13 JHOCEL'),
(120, 'Administrator', '2024-03-24 09:30:56', 'Update Staff named Divino, 8 Divino'),
(121, 'Administrator', '2024-03-24 09:33:12', 'Update Staff named Divino,  Divino'),
(122, 'Administrator', '2024-03-24 09:34:39', 'Update Staff named Divino,  Divino'),
(123, 'Administrator', '2024-03-24 09:46:23', 'Added Staff named Edison, L.  Gines JR.'),
(124, 'Administrator', '2024-03-24 09:47:58', 'Added Staff named Bernard, S. Soriano'),
(125, 'Administrator', '2024-03-24 09:49:08', 'Added Staff named Franklin, C. Bocalere'),
(126, 'Administrator', '2024-03-24 09:50:21', 'Added Staff named Paul Mc Joanner, T. Sotto'),
(127, 'Administrator', '2024-03-24 09:51:10', 'Added Staff named Randy, N. Pagaragan'),
(128, 'Administrator', '2024-03-24 09:51:10', 'Added Staff named Randy, N. Pagaragan'),
(129, 'Administrator', '2024-03-24 09:52:00', 'Added Staff named Norwel, P. Tanafranca'),
(130, 'Administrator', '2024-03-24 09:53:04', 'Added Staff named Remegio, B. Vino SR'),
(131, 'Administrator', '2024-03-24 09:53:47', 'Added Staff named Jacinto, C. Balbido'),
(132, 'Administrator', '2024-03-24 09:54:45', 'Added Staff named Victorino, B. Sotto JR'),
(133, 'Administrator', '2024-03-24 09:55:36', 'Added Staff named Ruel, J. De Lara'),
(134, 'Administrator', '2024-03-24 09:55:45', 'Update Staff named Jacinto, 8 Jacinto'),
(135, 'Administrator', '2024-03-24 10:23:17', 'Added SK named Glaiza, A. Novilla'),
(136, 'Administrator', '2024-03-24 10:23:54', 'Added SK named Lei Anne, E. Tablang'),
(137, 'Administrator', '2024-03-24 10:24:35', 'Added SK named Fernando Philip, B. Verdad'),
(138, 'Administrator', '2024-03-24 10:25:03', 'Added SK named Wains Jonaline, V. De Guzman'),
(139, 'Administrator', '2024-03-24 10:25:39', 'Added SK named John Kenneth, T. Meradios'),
(140, 'Administrator', '2024-03-24 10:26:04', 'Added SK named Ariel, E. Peralta'),
(141, 'Administrator', '2024-03-24 10:26:38', 'Added SK named Andrei, T. Novilla'),
(142, 'Administrator', '2024-03-24 10:27:08', 'Added SK named Jomar, N. Valdez'),
(143, 'Administrator', '2024-03-24 10:52:41', 'Added Purok Leader named Rocky,  Victorio'),
(144, 'Administrator', '2024-03-24 10:53:13', 'Added Purok Leader named Reynaldo, T. Jose'),
(145, 'Administrator', '2024-03-24 10:53:38', 'Added Purok Leader named Gilberto, M. Sisor'),
(146, 'Administrator', '2024-03-24 10:54:28', 'Added Purok Leader named Gregorio,  Flores'),
(147, 'Administrator', '2024-03-24 10:54:55', 'Added Purok Leader named Alfredo,  Portin'),
(148, 'Administrator', '2024-03-24 10:55:19', 'Added Purok Leader named Alipio,  Dela Cruz'),
(149, 'Administrator', '2024-03-24 10:55:44', 'Added Purok Leader named Alipio,  Dela Cruz'),
(150, 'Administrator', '2024-03-24 10:56:50', 'Added Purok Leader named Rebecca,  Hila'),
(151, 'Administrator', '2024-03-24 10:57:53', 'Update Purok Leader named Reynaldo, 2 Reynaldo'),
(152, 'Administrator', '2024-03-24 11:00:10', 'Added Purok Leader named Richard, L. Yasay'),
(153, 'Administrator', '2024-03-24 11:09:20', 'Update Purok Leader named Rocky, 1 Rocky'),
(154, 'Administrator', '2024-03-24 11:09:52', 'Update Purok Leader named Rocky, 1 Rocky'),
(155, 'Administrator', '2024-03-24 11:10:30', 'Added Purok Leader named Rebecca,  Hila'),
(156, 'Administrator', '2024-03-24 11:11:21', 'Update Staff named Divino,  Divino'),
(157, 'Administrator', '2024-03-25 13:22:42', 'Added Resident named Parungao, Josamine Rillon'),
(158, 'Administrator', '2024-03-25 13:34:44', 'Added Clearance with clearance number of 12'),
(159, 'Administrator', '2024-03-26 10:33:53', 'Update Staff named Edison, 1 Edison'),
(160, 'Administrator', '2024-03-26 11:03:56', 'Update Activity Clean- up Drive'),
(161, 'Administrator', '2024-03-26 11:04:52', 'Update Activity Fiesta'),
(162, 'Administrator', '2024-03-26 11:08:14', 'Update Permit with business name of Kape Ko'),
(163, 'Administrator', '2024-03-28 10:34:22', 'Added Barangay Police named Berialdo, N. Agustin'),
(164, 'Administrator', '2024-03-28 10:35:50', 'Added Barangay Police named Berialdo, N. Agustin'),
(165, 'Administrator', '2024-03-28 10:36:32', 'Update Staff named Berialdo,  Berialdo'),
(166, 'Administrator', '2024-03-28 10:37:36', 'Update Staff named Berialdo,  Berialdo'),
(167, 'Administrator', '2024-03-28 10:42:31', 'Update Staff named Berialdo,  Berialdo'),
(168, 'Administrator', '2024-03-28 10:44:03', 'Update Staff named Berialdo,  Berialdo'),
(169, 'Administrator', '2024-03-28 10:45:37', 'Added Barangay Police named Antonio, P. Novilla'),
(170, 'Administrator', '2024-03-28 10:47:04', 'Added Barangay Police named Jean,  Felipe'),
(171, 'Administrator', '2024-03-28 10:48:03', 'Added Barangay Police named Jean,  Felipe'),
(172, 'Administrator', '2024-03-28 10:48:28', 'Added Barangay Police named Jean,  Felipe'),
(173, 'Administrator', '2024-03-28 10:51:53', 'Added Barangay Police named Rachelle, D. Albinto'),
(174, 'Administrator', '2024-03-28 10:52:29', 'Added Barangay Police named Jayson, P. Vegiga'),
(175, 'Administrator', '2024-03-28 10:53:35', 'Added Barangay Police named Manny, A. Mannuel'),
(176, 'Administrator', '2024-03-28 10:54:17', 'Added Barangay Police named Romulado,  Mariano'),
(177, 'Administrator', '2024-03-28 10:54:41', 'Added Barangay Police named Genie,  Victorio'),
(178, 'Administrator', '2024-03-28 10:55:06', 'Added Barangay Police named Genie,  Romulado'),
(179, 'Administrator', '2024-03-28 10:55:35', 'Added Barangay Police named Larry,  Bulalayao'),
(180, 'Administrator', '2024-03-28 10:56:22', 'Added Barangay Police named Mary Ann,  Espiritu'),
(181, 'Administrator', '2024-03-28 10:57:47', 'Update Staff named Jayson,  Jayson'),
(182, 'Administrator', '2024-03-28 10:58:23', 'Added Barangay Police named Jonathan, L. Antonio'),
(183, 'Administrator', '2024-03-28 10:58:52', 'Added Barangay Police named Nestor, B. Novilla'),
(184, 'Administrator', '2024-03-28 10:59:21', 'Added Barangay Police named Lope , T. Trinidad'),
(185, 'Administrator', '2024-03-28 10:59:53', 'Added Barangay Police named Michael, V. Cabaltera'),
(186, 'Administrator', '2024-03-28 11:00:25', 'Added Barangay Police named Leoncio, S. Cabico'),
(187, 'Administrator', '2024-03-28 11:03:44', 'Added Barangay Police named Reynaldo,  Dela Cruz'),
(188, 'Administrator', '2024-03-28 11:04:18', 'Added Barangay Police named Edwin,  Padua'),
(189, 'Administrator', '2024-03-28 11:04:51', 'Added Barangay Police named Wilmino, D. Aquino'),
(190, 'Administrator', '2024-03-28 11:05:13', 'Added Barangay Police named Lito,  Portin'),
(191, 'Administrator', '2024-03-28 11:05:37', 'Added Barangay Police named Dominador,  Galope JR'),
(192, 'Administrator', '2024-03-28 11:06:11', 'Added Barangay Police named Angelito, R. Manusig'),
(193, 'Administrator', '2024-03-28 11:06:47', 'Added Barangay Police named Romeo, A. Lopez JR'),
(194, 'Administrator', '2024-03-28 11:07:19', 'Added Barangay Police named Danilo,  Saludaga'),
(195, 'Administrator', '2024-03-28 11:11:50', 'Added Barangay Police named Catalino,  Tolentino'),
(196, 'Administrator', '2024-03-28 11:13:23', 'Added Barangay Police named Osmando,  Espiritu'),
(197, 'Administrator', '2024-03-28 11:13:48', 'Added Barangay Police named Jonathan,  Palara'),
(198, 'Administrator', '2024-03-30 12:18:10', 'Update Staff named Bernard, 2 Bernard'),
(199, 'Admin', '2024-03-30 19:39:41', 'Update Staff named Edison, 1 Edison'),
(200, 'Administrator', '2024-04-02 10:08:47', 'Update Staff named Franklin, 3 Franklin'),
(201, 'Administrator', '2024-04-02 10:09:12', 'Update Purok Leader named Rocky, 1 Rocky'),
(202, 'Administrator', '2024-04-09 18:46:17', 'Added SK named Marivic,  Diozon'),
(203, 'Administrator', '2024-04-09 20:25:50', 'Added Permit with business name of Kape Ko'),
(204, 'Administrator', '2024-04-09 20:48:16', 'Added Clearance with clearance number of 0224354'),
(205, 'Administrator', '2024-04-10 19:30:21', 'Added Staff named Edwin, P. Parungao'),
(206, 'Administrator', '2024-04-10 19:30:55', 'Added Staff named Jeorge, C. Bucaneg'),
(207, 'Administrator', '2024-04-10 19:31:39', 'Added Staff named Joey, L. Ordonez'),
(208, 'Administrator', '2024-04-10 19:33:34', 'Added Staff named Rodrigo, P. Danao JR'),
(209, 'Administrator', '2024-04-10 19:34:07', 'Added Staff named Engracia, G. Sumawang'),
(210, 'Administrator', '2024-04-10 19:34:28', 'Added Staff named Jefrey,  Moreno'),
(211, 'Administrator', '2024-04-10 19:35:04', 'Added Staff named John Bryan, D. Riparip'),
(212, 'Administrator', '2024-04-10 19:35:35', 'Added Staff named Rommel,  Dalacat'),
(213, 'Administrator', '2024-04-10 19:37:07', 'Update Staff named Ma. Victoria, 1 Ma. Victoria'),
(214, 'Administrator', '2024-04-10 19:37:52', 'Added Staff named Nelson, G. Vilacillo'),
(215, 'Administrator', '2024-04-10 19:38:24', 'Added Staff named Sherlita,  Caluducan'),
(216, 'Administrator', '2024-04-10 19:38:55', 'Added Staff named Rosemarie, O. Garcia'),
(217, 'Administrator', '2024-04-10 20:11:04', 'Update Staff named Jeorge, 12 Jeorge'),
(218, 'Administrator', '2024-04-10 20:11:10', 'Update Staff named Joey, 13 Joey'),
(219, 'Administrator', '2024-04-10 20:11:15', 'Update Staff named Rodrigo, 14 Rodrigo'),
(220, 'Administrator', '2024-04-10 20:12:00', 'Update Staff named Engracia, 15 Engracia'),
(221, 'Administrator', '2024-04-10 20:12:08', 'Update Staff named Jefrey, 16 Jefrey'),
(222, 'Administrator', '2024-04-10 20:12:16', 'Update Staff named John Bryan, 17 John Bryan'),
(223, 'Administrator', '2024-04-10 20:12:23', 'Update Staff named Rommel, 18 Rommel'),
(224, 'Administrator', '2024-04-12 10:07:07', 'Added Resident named Parungao, Josamine R.'),
(225, 'Administrator', '2024-04-12 10:09:46', 'Added Resident named Josamine, R. Parungao'),
(226, 'Captain', '2024-04-17 09:38:25', 'Update Staff named Ma. Victoria, 1 Ma. Victoria'),
(227, 'Administrator', '2024-04-17 09:45:08', 'Update Staff named Edwin, 11 Edwin'),
(228, 'Administrator', '2024-04-17 11:05:22', 'Update Staff named Josamine,  Josamine'),
(229, 'Administrator', '2024-04-17 11:06:24', 'Update Staff named Josamine,  Josamine'),
(230, 'Administrator', '2024-04-17 11:06:33', 'Update Staff named Josamine, R. Josamine'),
(231, 'Administrator', '2024-04-17 11:06:52', 'Update Staff named Josamine, R. Josamine'),
(232, 'Administrator', '2024-04-17 11:07:46', 'Update Staff named Josamine, R. Josamine'),
(233, 'Administrator', '2024-04-17 11:08:08', 'Update Staff named Josamine, R. Josamine'),
(234, 'Administrator', '2024-04-17 11:09:36', 'Update Staff named Josamine, R. Josamine'),
(235, 'Administrator', '2024-04-17 11:10:40', 'Update Staff named Josamine, R. Josamine'),
(236, 'Administrator', '2024-04-17 11:10:50', 'Update Staff named Josamine, R. Josamine'),
(237, 'Administrator', '2024-04-26 08:52:31', 'Added Resident named Juan,  de'),
(238, 'Administrator', '2024-04-26 08:54:04', 'Added Resident named Juan,  Dela Cruz'),
(239, 'Administrator', '2024-04-26 08:55:03', 'Added Resident named Maria,  Santos'),
(240, 'Administrator', '2024-04-26 08:55:59', 'Added Resident named Pedro,  Reyes'),
(241, 'Administrator', '2024-04-26 09:20:35', 'Added Staff named Evelyn,  Garcia'),
(242, 'Administrator', '2024-04-26 09:21:12', 'Added Staff named Evelyn,  Garcia'),
(243, 'Administrator', '2024-04-26 09:22:26', 'Added Staff named Evelyn,  Garcia'),
(244, 'Administrator', '2024-04-26 09:23:16', 'Added Staff named Evelyn,  Garcia'),
(245, 'Administrator', '2024-04-26 09:25:12', 'Added Staff named Luzviminda,  Javier'),
(246, 'Administrator', '2024-04-26 09:26:02', 'Added Staff named Luzviminda,  Javier'),
(247, 'Administrator', '2024-04-26 09:31:01', 'Added Staff named Luzviminda,  Javier'),
(248, 'Administrator', '2024-04-26 09:31:56', 'Added Staff named Evelyn,  Garcia'),
(249, 'Administrator', '2024-04-26 09:32:32', 'Added Staff named Evelyn,  Garcia'),
(250, 'Administrator', '2024-04-26 09:37:58', 'Added Staff named Evelyn,  Garcia'),
(251, 'Administrator', '2024-04-26 09:38:21', 'Added Staff named Evelyn,  Garcia'),
(252, 'Administrator', '2024-04-26 09:39:41', 'Added Staff named Evelyn,  Garcia'),
(253, 'Administrator', '2024-04-26 09:41:44', 'Added Staff named Evelyn,  Garcia'),
(254, 'Administrator', '2024-04-26 09:42:06', 'Added Staff named Evelyn,  Garcia'),
(255, 'Administrator', '2024-04-26 09:42:27', 'Added Staff named Evelyn,  Garcia'),
(256, 'Administrator', '2024-04-26 09:58:39', 'Added Resident named Juana,  Martinez'),
(257, 'Administrator', '2024-04-26 10:05:07', 'Added Resident named Josefa,  Garcia'),
(258, 'Administrator', '2024-04-26 10:07:18', 'Added Resident named Antonio,  Hernandez'),
(259, 'Administrator', '2024-04-26 10:08:23', 'Added Resident named Francisca,  Lopez'),
(260, 'Administrator', '2024-04-26 10:09:32', 'Added Resident named Manuel,  Cruz'),
(261, 'Administrator', '2024-04-26 10:10:48', 'Added Resident named Rosario,  Torres'),
(262, 'Administrator', '2024-04-26 10:10:58', 'Update Staff named ,  '),
(263, 'Administrator', '2024-04-26 10:33:42', 'Added Blotter Request by BERNARD S. SORIANO'),
(264, 'Administrator', '2024-04-26 10:35:27', 'Added Blotter Request by Nina Sara Sayaman'),
(265, 'Administrator', '2024-04-26 10:44:00', 'Added Staff named Edwin, P. Parungao'),
(266, 'Administrator', '2024-04-26 10:44:49', 'Added Staff named Jeorge, C. Bucaneg'),
(267, 'Administrator', '2024-04-26 10:45:28', 'Added Staff named Joey, L. Ordonez'),
(268, 'Administrator', '2024-04-26 10:46:40', 'Added Staff named Rodrigo, P. Danao JR.'),
(269, 'Administrator', '2024-04-26 10:47:12', 'Added Staff named Engracia, G. Sumawang'),
(270, 'Administrator', '2024-04-26 10:47:43', 'Added Staff named Jefrey,  Moreno'),
(271, 'Administrator', '2024-04-26 10:48:30', 'Added Staff named John Bryan, D. Riparip'),
(272, 'Administrator', '2024-04-26 10:49:10', 'Added Staff named Rommel,  Dalacat'),
(273, 'Administrator', '2024-04-26 10:49:38', 'Added Staff named Nelson, G. Vilacillo'),
(274, 'Administrator', '2024-04-26 10:50:04', 'Added Staff named Sherlita,  Caluducan'),
(275, 'Administrator', '2024-04-26 10:50:32', 'Added Staff named Rosemarie, O.  Garcia'),
(276, 'Administrator', '2024-04-26 11:16:08', 'Added Blotter Request by John Doe'),
(277, 'Administrator', '2024-04-27 09:40:32', 'Added Blotter Request by Marian Ny');

-- --------------------------------------------------------

--
-- Table structure for table `tblofficial`
--

CREATE TABLE `tblofficial` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblofficial`
--

INSERT INTO `tblofficial` (`id`, `fname`, `mname`, `lname`, `position`, `contact`, `bday`, `image`) VALUES
(22, 'Edwin', 'P.', 'Parungao', 'Punong Barangay', '', '', '1714099440325_default-avatar-icon-of-social-media-user-vector.jpg'),
(23, 'Jeorge', 'C.', 'Bucaneg', 'Committee on Education', '', '', '1714099489611_default-avatar-icon-of-social-media-user-vector.jpg'),
(24, 'Joey', 'L.', 'Ordonez', 'Committee on Peace and Order', '', '', '1714099528044_default-avatar-icon-of-social-media-user-vector.jpg'),
(25, 'Rodrigo', 'P.', 'Danao JR.', 'Committee on Agriculture', '', '', '1714099600998_default-avatar-icon-of-social-media-user-vector.jpg'),
(26, 'Engracia', 'G.', 'Sumawang', 'Committee on Health', '', '', '1714099632543_default-avatar-icon-of-social-media-user-vector.jpg'),
(27, 'Jefrey', '', 'Moreno', 'Committee on Intra.', '', '', '1714099663203_default-avatar-icon-of-social-media-user-vector.jpg'),
(28, 'John Bryan', 'D.', 'Riparip', 'Committee on Finance', '', '', '1714099710568_default-avatar-icon-of-social-media-user-vector.jpg'),
(29, 'Rommel', '', 'Dalacat', 'Commitee on Transpo.', '', '', '1714099750359_default-avatar-icon-of-social-media-user-vector.jpg'),
(30, 'Nelson', 'G.', 'Vilacillo', 'Barangay Treasurer', '', '', '1714099778936_default-avatar-icon-of-social-media-user-vector.jpg'),
(31, 'Sherlita', '', 'Caluducan', 'Barangay Secretary', '', '', '1714099804707_default-avatar-icon-of-social-media-user-vector.jpg'),
(32, 'Rosemarie', 'O. ', 'Garcia', 'Barangay Clerk', '', '', '1714099832364_default-avatar-icon-of-social-media-user-vector.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblpuroklead`
--

CREATE TABLE `tblpuroklead` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` varchar(10) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpuroklead`
--

INSERT INTO `tblpuroklead` (`id`, `fname`, `mname`, `lname`, `age`, `purok`, `contact`, `bday`, `image`) VALUES
(1, 'Rocky', '', 'Victorio', '35', 'Quirino', '09094421486', '', '1711248761768_images.png'),
(2, 'Reynaldo', 'T.', 'Jose', '55', 'Roxas', '', '', '1711248793212_images.png'),
(3, 'Gilberto', 'M.', 'Sisor', '', 'Quezon', '', '', '1711248818519_images.png'),
(4, 'Gregorio', '', 'Flores', '', 'Magsaysay', '', '', '1711248868114_images.png'),
(5, 'Alfredo', '', 'Portin', '', 'Osmena', '', '', '1711248895187_images.png'),
(6, 'Alipio', '', 'Dela Cruz', '', 'Garcia', '', '', '1711248919723_images.png'),
(8, 'Richard', 'L.', 'Yasay', '', 'Laurel', '', '', '1711249210535_images.png'),
(9, 'Rebecca', '', 'Hila', '', 'Sitio Mabaldog', '', '', '1711249830854_pngtree-for-profile-picture-png-image_6177046.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int(11) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `bdate` varchar(20) NOT NULL,
  `bplace` text NOT NULL,
  `age` int(11) NOT NULL,
  `barangay` varchar(120) NOT NULL,
  `zone` varchar(5) NOT NULL,
  `totalhousehold` int(5) NOT NULL,
  `differentlyabledperson` varchar(100) NOT NULL,
  `relationtohead` varchar(50) NOT NULL,
  `maritalstatus` varchar(50) NOT NULL,
  `bloodtype` varchar(10) NOT NULL,
  `civilstatus` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `monthlyincome` int(12) NOT NULL,
  `householdnum` int(11) NOT NULL,
  `lengthofstay` int(11) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `skills` text NOT NULL,
  `igpitID` int(11) NOT NULL,
  `philhealthNo` int(12) NOT NULL,
  `highestEducationalAttainment` varchar(50) NOT NULL,
  `houseOwnershipStatus` varchar(50) NOT NULL,
  `landOwnershipStatus` varchar(20) NOT NULL,
  `dwellingtype` varchar(20) NOT NULL,
  `waterUsage` varchar(20) NOT NULL,
  `lightningFacilities` varchar(20) NOT NULL,
  `sanitaryToilet` varchar(20) NOT NULL,
  `formerAddress` text NOT NULL,
  `remarks` text NOT NULL,
  `image` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `lname`, `fname`, `mname`, `bdate`, `bplace`, `age`, `barangay`, `zone`, `totalhousehold`, `differentlyabledperson`, `relationtohead`, `maritalstatus`, `bloodtype`, `civilstatus`, `occupation`, `monthlyincome`, `householdnum`, `lengthofstay`, `religion`, `nationality`, `gender`, `skills`, `igpitID`, `philhealthNo`, `highestEducationalAttainment`, `houseOwnershipStatus`, `landOwnershipStatus`, `dwellingtype`, `waterUsage`, `lightningFacilities`, `sanitaryToilet`, `formerAddress`, `remarks`, `image`, `username`, `password`) VALUES
(17, 'Parungao', 'Josamine', 'Rillon', '', '', 0, '', '', 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 0, 0, 'No schooling completed', 'Own Home', 'Owned', '1st Option', 'Faucet', 'Electric', 'Water-sealed', '', '', 'default.png', 'mine', 'mine'),
(18, 'Parungao', 'Josamine', 'R.', '', '', 0, 'Gabaldon', '', 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '1712887627072_431183216_792322619421322_7008080627837470288_n.jpg', '', ''),
(19, 'Santos', 'Honeylehi', 'M.', '', '', 0, 'dsad', '', 0, '', '', '', '', '', '', 0, 0, 0, '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsignup`
--

CREATE TABLE `tblsignup` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsignup`
--

INSERT INTO `tblsignup` (`id`, `name`, `mname`, `lname`, `age`, `contact`, `address`, `username`, `email`, `password`, `type`, `status`) VALUES
(1, 'John', '', '', 0, '09123456789', '188 Narra St. North Pob. Gab', 'admin', 'johndoe@mail.com', '1234', 'admin', ''),
(2, 'Josamine', 'R', 'Parungao', 22, '09815382299', '001, Acasia North Pob', 'mine', 'josamine@mail.com', 'mine06', 'resident', ''),
(3, 'Josamine', 'R', 'Parungao', 22, '09815382299', 'na', 'mine', 'josamine@mail.com', 'mine', 'resident', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`id`, `name`, `username`, `password`) VALUES
(1, 'sad', 'sad', 'sad'),
(2, 'Josamine', 'mine', 'mine');

-- --------------------------------------------------------

--
-- Table structure for table `tbltanod`
--

CREATE TABLE `tbltanod` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `sched` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bday` varchar(15) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltanod`
--

INSERT INTO `tbltanod` (`id`, `fname`, `mname`, `lname`, `position`, `sched`, `contact`, `address`, `bday`, `image`) VALUES
(2, 'Berialdo', 'N.', 'Agustin', 'EX-O', '2024-03-30', '09123456789', 'Ligaya', '2024-11-13', '1711593751287_download (1).png'),
(3, 'Antonio', 'P.', 'Novilla', 'Deputy', '2024-04-10', '09123456789', 'Ligaya', '', '1711593937223_download (1).png'),
(4, 'Jean', '', 'Felipe', 'Secretary', '', '', '', '', '1711594108816_3038364.png'),
(5, 'Rachelle', 'D.', 'Albinto', 'Treasurer', '', '', '', '', '1711594313375_3038364.png'),
(6, 'Jayson', 'P.', 'Vegiga', 'Member', '', '', '', '', '1711594667845_tanod.jpg'),
(7, 'Manny', 'A.', 'Mannuel', 'Member', '', '', '', '', '1711594415722_download (1).png'),
(8, 'Romulado', '', 'Mariano', 'Member', '', '', '', '', '1711594457914_download (1).png'),
(9, 'Genie', '', 'Romulado', 'Member', '', '', '', '', '1711594506813_3038364.png'),
(10, 'Larry', '', 'Bulalayao', 'Member', '', '', '', '', '1711594535857_download (1).png'),
(11, 'Mary Ann', '', 'Espiritu', 'Member', '', '', '', '', '1711594582052_3038364.png'),
(12, 'Jonathan', 'L.', 'Antonio', 'Member', '', '', '', '', '1711594703267_tanod.jpg'),
(13, 'Nestor', 'B.', 'Novilla', 'Member', '', '', '', '', '1711594732082_tanod.jpg'),
(14, 'Lope ', 'T.', 'Trinidad', 'Member', '', '', '', '', '1711594761412_tanod.jpg'),
(15, 'Michael', 'V.', 'Cabaltera', 'Member', '', '', '', '', '1711594793583_tanod.jpg'),
(16, 'Leoncio', 'S.', 'Cabico', 'Member', '', '', '', '', '1711594825094_tanod.jpg'),
(17, 'Reynaldo', '', 'Dela Cruz', 'Member', '', '', '', '', '1711595024692_tanod.jpg'),
(18, 'Edwin', '', 'Padua', 'Member', '', '', '', '', '1711595058977_download (1).png'),
(19, 'Wilmino', 'D.', 'Aquino', 'Member', '', '', '', '', '1711595091154_tanod.jpg'),
(20, 'Lito', '', 'Portin', 'Member', '', '', '', '', '1711595113225_tanod.jpg'),
(21, 'Dominador', '', 'Galope JR', 'Member', '', '', '', '', '1711595137003_tanod.jpg'),
(22, 'Angelito', 'R.', 'Manusig', 'Member', '', '', '', '', '1711595171255_tanod.jpg'),
(23, 'Romeo', 'A.', 'Lopez JR', 'Member', '', '', '', '', '1711595207812_tanod.jpg'),
(24, 'Danilo', '', 'Saludaga', 'Member', '', '', '', '', '1711595239208_tanod.jpg'),
(25, 'Catalino', '', 'Tolentino', '', '', '', '', '', '1711595510179_tanod.jpg'),
(26, 'Osmando', '', 'Espiritu', '', '', '', '', '', '1711595603894_tanod.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_cert`
--

CREATE TABLE `vehicle_cert` (
  `id` int(11) NOT NULL,
  `sellerId` int(255) NOT NULL,
  `sellerName` varchar(100) NOT NULL,
  `sellerAddress` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `amount_words` varchar(255) NOT NULL,
  `buyerName` varchar(100) NOT NULL,
  `buyerAddress` varchar(100) NOT NULL,
  `make` varchar(100) NOT NULL,
  `plateNum` varchar(100) NOT NULL,
  `engineNum` varchar(100) NOT NULL,
  `chasisNum` varchar(100) NOT NULL,
  `denomination` varchar(100) NOT NULL,
  `fuel` varchar(100) NOT NULL,
  `bodyType` varchar(100) NOT NULL,
  `crNo` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `witness` varchar(100) NOT NULL,
  `locationTran` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cert_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_cert`
--

INSERT INTO `vehicle_cert` (`id`, `sellerId`, `sellerName`, `sellerAddress`, `amount`, `amount_words`, `buyerName`, `buyerAddress`, `make`, `plateNum`, `engineNum`, `chasisNum`, `denomination`, `fuel`, `bodyType`, `crNo`, `date`, `witness`, `locationTran`, `status`, `cert_amount`) VALUES
(1, 1, 'Josamine Parungao', 'Mulawin, North Poblacion Gabaldon', '100000', 'One Hundred Thousand Pesos', 'Honeylhei Santos', 'Malinao, Gabaldon', 'Japan', '062324', '12345', '6789', 'NA', 'Gasoline', 'Sedan', '123456', '2026-04-20', 'Nina', 'Gabaldon', 'Approved', ''),
(2, 1, 'sasa', 'sas', '323', '', 'adsds', 'dsd', 'dsads', '3232', '3213', '232', 'dsd', 'dsads', 'ddsd', '323', '2024-04-28', 'dsadsad', 'sdasdsd', 'Approved', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_cert`
--
ALTER TABLE `business_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance_cert`
--
ALTER TABLE `clearance_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indigency_cert`
--
ALTER TABLE `indigency_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land_cert`
--
ALTER TABLE `land_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestock_cert`
--
ALTER TABLE `livestock_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permit`
--
ALTER TABLE `permit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permit_re`
--
ALTER TABLE `permit_re`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residency_cert`
--
ALTER TABLE `residency_cert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`resident_id`);

--
-- Indexes for table `tblactivity`
--
ALTER TABLE `tblactivity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblactivityphoto`
--
ALTER TABLE `tblactivityphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblblotter`
--
ALTER TABLE `tblblotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkabataan`
--
ALTER TABLE `tblkabataan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblkawani`
--
ALTER TABLE `tblkawani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficial`
--
ALTER TABLE `tblofficial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpuroklead`
--
ALTER TABLE `tblpuroklead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsignup`
--
ALTER TABLE `tblsignup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltanod`
--
ALTER TABLE `tbltanod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_cert`
--
ALTER TABLE `vehicle_cert`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_cert`
--
ALTER TABLE `business_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clearance_cert`
--
ALTER TABLE `clearance_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `indigency_cert`
--
ALTER TABLE `indigency_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `land_cert`
--
ALTER TABLE `land_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livestock_cert`
--
ALTER TABLE `livestock_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permit`
--
ALTER TABLE `permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permit_re`
--
ALTER TABLE `permit_re`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `residency_cert`
--
ALTER TABLE `residency_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblactivity`
--
ALTER TABLE `tblactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblactivityphoto`
--
ALTER TABLE `tblactivityphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblblotter`
--
ALTER TABLE `tblblotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblhousehold`
--
ALTER TABLE `tblhousehold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblkabataan`
--
ALTER TABLE `tblkabataan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblkawani`
--
ALTER TABLE `tblkawani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `tblofficial`
--
ALTER TABLE `tblofficial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblpuroklead`
--
ALTER TABLE `tblpuroklead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblsignup`
--
ALTER TABLE `tblsignup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltanod`
--
ALTER TABLE `tbltanod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vehicle_cert`
--
ALTER TABLE `vehicle_cert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
