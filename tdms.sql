-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 12:45 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvaltbl`
--

CREATE TABLE `approvaltbl` (
  `id` int(4) NOT NULL,
  `approved_idnum` int(4) NOT NULL,
  `approved_fname` varchar(18) NOT NULL,
  `approved_mname` varchar(18) NOT NULL,
  `approved_lname` varchar(18) NOT NULL,
  `approved_contact` varchar(11) NOT NULL,
  `approved_email_address` varchar(25) NOT NULL,
  `approved_psw` varchar(50) NOT NULL,
  `approved_type` varchar(5) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `approvaltbl`
--

INSERT INTO `approvaltbl` (`id`, `approved_idnum`, `approved_fname`, `approved_mname`, `approved_lname`, `approved_contact`, `approved_email_address`, `approved_psw`, `approved_type`, `token`, `status`) VALUES
(27, 456, 'Joey', 'L.', 'De Vera', '09421234567', 'Joey', '250cf8b51c773f3f8dc8b4be867a9a02', 'user', '', ''),
(28, 3432432, 'Daryl', 'Villas', 'Tan Feliz', '9369211250', 'dar', '202cb962ac59075b964b07152d234b70', 'admin', '', ''),
(29, 234567, 'jeje', 'jejjjj', 'hertert', '9369211250', 'vzx', '202cb962ac59075b964b07152d234b70', 'user', '', ''),
(30, 234567, 'jeje', 'jejjjj', 'hertert', '9369211250', 'vzx', '202cb962ac59075b964b07152d234b70', 'user', '', ''),
(34, 2232006, 'Loujill', 'Dela Cruz', 'Nabong', '09666329932', 'Loujill', '3159c757035fc56d56ee1814db293d11', 'user', '', ''),
(36, 180761, 'Daryl', 'Villas', 'Tan Feliz', '09369211250', '@admin', '202cb962ac59075b964b07152d234b70', 'admin', '', ''),
(39, 3432432, 'Daryl', 'Villas', 'Tan Feliz', '09369211250', '@dvtanfeliz999', '541a3926811c72da8500c018f8786108', 'admin', '', ''),
(40, 9809809, '123', 'baba', 'fafaff', '21231231231', 'beatrice', '25d55ad283aa400af464c76d713c07ad', 'user', '', ''),
(41, 12345678, 'vvvvv', 'vvvvvv', 'vvvvvvvvvv', '11111111111', 'mamiemoko', '25f9e794323b453885f5181f1b624d0b', 'user', '', ''),
(42, 12345678, 'mmmmmmmmmmm', 'hhhhhhhhhhhhhh', 'ghggggggggggggggg', '98988989898', 'wewewewewwe', '25f9e794323b453885f5181f1b624d0b', 'user', '', ''),
(43, 89946607, 'ddddddddddd', 'ddddddddddddddd', 'dddddddddddddddddd', '12312312312', 'qwqwqwqwqw', '25f9e794323b453885f5181f1b624d0b', 'user', '', ''),
(45, 12345678, 'Mark', 'Christian', 'Battaler', '09369211250', '@markchristian_admin', '25d55ad283aa400af464c76d713c07ad', 'admin', '', ''),
(48, 87654321, 'juan', 'dela', 'cruz', '09369211250', 'juandelacruz', '25d55ad283aa400af464c76d713c07ad', 'admin', '', ''),
(51, 123, '123', '123', '123', '123', '123123123', 'f5bb0c8de146c67b44babbf4e6584cc0', '', '', ''),
(52, 31231231, 'afafafafafa', 'sasasasasa', 'qweqweqweqwe', '23123121212', 'asdasdadas', '14361dcf4ac8c7ec16a8e12a1b6b5283', '', '', ''),
(53, 18076100, 'Daryl', 'Villas', 'Tan Feliz', '09369211250', 'tanfelizdaryl@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', '05d07931dde3ddcd72bd2f46dc81f420', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `categorytbl`
--

CREATE TABLE `categorytbl` (
  `id` int(4) NOT NULL,
  `categoryname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorytbl`
--

INSERT INTO `categorytbl` (`id`, `categoryname`) VALUES
(5, 'CANCER/CHEMOTHERAPY DRUGS'),
(6, 'ANTIALLERGICS'),
(7, 'ANTI-INFECTIVES'),
(8, 'VITAMINS AND MINERAL'),
(9, 'MEDICINES FOR PAIN MANAGEMENT'),
(10, 'CARDIOVASCULAR MEDICINES'),
(11, 'ANTI CHOLINERGIC'),
(13, 'ANTI CHOLINERGIC'),
(16, 'ANTI-FUNGAL');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetbl`
--

CREATE TABLE `medicinetbl` (
  `id` int(4) NOT NULL,
  `med_id` varchar(20) NOT NULL,
  `med_dorder` date NOT NULL,
  `med_nom` varchar(100) NOT NULL,
  `med_qty` int(5) NOT NULL,
  `med_prc` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicinetbl`
--

INSERT INTO `medicinetbl` (`id`, `med_id`, `med_dorder`, `med_nom`, `med_qty`, `med_prc`) VALUES
(8, '5', '2022-02-01', 'Mesna Injection: 100 mg/ml, 4 ml ampule', 20, 20),
(9, '5', '2022-02-01', 'Etoposide Injection: 20 mg/ml, 5 ml ampule', 0, 100),
(10, '5', '2022-02-01', 'Ifosfamide Injection: 2 g vial', 0, 100),
(11, '5', '2022-02-01', 'Cisplatin Injection: 1 mg/ml, 50 ml vial', 0, 100),
(12, '5', '2022-02-01', 'Gemcitabine Injection: 200 mg vial', 0, 100),
(13, '6', '2022-02-01', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 9, 200),
(14, '6', '2022-02-01', 'Diphenhydramine Oral: 50mg capsule', 0, 200),
(15, '6', '2022-02-01', 'Diphenhydramine Oral: 25mg capsule', 9, 200),
(16, '6', '2022-02-01', 'Cetirizine Oral: 10mg tablet', 8, 200),
(17, '6', '2022-02-01', 'Loratadine Oral: 10mg tablet', 6, 200),
(18, '7', '2022-02-01', 'Amoxicillin Oral: 500 mg capsule', 13, 300),
(19, '7', '2022-02-01', 'Oxacillin Injection: 500 mg vial', 23, 300),
(20, '7', '2022-02-01', 'Penicillin G Crystalline Injection: 5M units vial', 0, 300),
(21, '7', '2022-02-01', 'Amikacin Injection: 250mg, 2ml vial', 7, 300),
(22, '7', '2022-02-01', 'Cefazolin Injection: 1 g vial', 19, 300),
(23, '8', '2022-02-01', 'Ascorbic Acid 500 mg tablet', 20, 400),
(24, '8', '2022-02-01', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 0, 400),
(25, '8', '2022-02-01', 'Vitamin B1 B6 B12 Oral: 100 mg/5 mg/50 mcg tablet', 3, 400),
(26, '8', '2022-02-01', 'Calcium 500 mg tablet', 1, 400),
(27, '8', '2022-02-01', 'Zinc Gluconate Oral: 30mg tablet', 20, 400),
(28, '9', '2022-02-01', 'Paracetamol Oral: 500 mg tablet', 40, 500),
(29, '9', '2022-02-01', 'Paracetamol Oral: 250 mg/5 ml Syrup/ Susp; 60 ml b', 31, 500),
(30, '9', '2022-02-01', 'Paracetamol Injection: 150 mg/ml, 2 ml ampule', 25, 500),
(31, '9', '2022-02-01', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 18, 500),
(32, '9', '2022-02-01', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 15, 500),
(33, '10', '2022-02-02', 'Amlodipine Oral: 5 mg tablet', 54, 600),
(34, '10', '2022-02-02', 'Aspirin Oral: 80mg tablet', 1, 580),
(35, '10', '2022-02-02', 'Nicardipine 1mg/ml, 2ml ampule', 5, 600),
(36, '10', '2022-02-02', 'Telmisartan Oral: 40 mg tablet', 54, 600),
(37, '10', '2022-02-02', 'Telmisartan Oral: 80 mg tablet', 13, 700),
(93, '7', '2022-05-22', 'V injection 15mg', 60, 100);

-- --------------------------------------------------------

--
-- Table structure for table `patientprofiletbl`
--

CREATE TABLE `patientprofiletbl` (
  `id` int(5) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `wrd` varchar(18) NOT NULL,
  `cnum` varchar(7) NOT NULL,
  `weight` varchar(11) NOT NULL,
  `height` varchar(16) NOT NULL,
  `diet` varchar(250) NOT NULL,
  `sstat` varchar(10) NOT NULL,
  `dadmit` varchar(10) NOT NULL,
  `bday` varchar(10) NOT NULL,
  `age` varchar(12) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `gend` varchar(6) NOT NULL,
  `ddis` varchar(10) NOT NULL,
  `diag` varchar(250) NOT NULL,
  `alerg` varchar(25) NOT NULL,
  `aphy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patientprofiletbl`
--

INSERT INTO `patientprofiletbl` (`id`, `lname`, `fname`, `mname`, `wrd`, `cnum`, `weight`, `height`, `diet`, `sstat`, `dadmit`, `bday`, `age`, `contact`, `gend`, `ddis`, `diag`, `alerg`, `aphy`) VALUES
(46, 'Villero', 'Robert', 'Villas', 'Emergency Room', '0936921', '50kg', '165cm', 'none', 'Single', '2022-05-05', '08/09/1999', '22 years old', '09369211250', 'Male', '', 'Stress fracture', 'None', 'Dr. Jerome Singgit'),
(47, 'Manuel', 'Joan', 'p', 'Observation Unit W', '789', '50', '165', 'soft food', 'Single', '2022-05-05', '08/08/2000', '21 years old', '09421234567', 'Female', '', 'diag', 'none', 'Dr. Victoria'),
(48, 'VIctoria', 'Paulo', 'A', 'Male Service B War', '321', '80', '250', 'No Diet', 'Married', '2022-05-05', '04/02/1972', '50 years old', '09424567893', 'Male', '', 'diag', 'none', 'Dr. Dumlao'),
(49, 'VICTORIA', 'PAULO', 'AGUSTIN', 'Emergency Room', '1234567', '80', '2 feet 9 inches', 'hard food', 'Married', '2022-05-05', '2022-05-16', '1 day old', '09439164305', 'Male', '1994-03-16', 'sprained', 'none', 'Mang Kepweng'),
(50, 'VICTORIA', 'PAULO', 'AGUSTIN', 'Emergency Room', '1234567', '80', '182', 'hard food', 'Married', '2022-05-05', '04/04/2022', '1 month old', '09439164305', 'Male', '2022-05-05', 'sdfg', 'none', 'Mang Kepweng'),
(51, 'aaa', 'eto', 'na', 'Emergency Room', '1234567', '23kg', '1 feet 5 in', 'banana', 'Separated', '2022-05-06', '08/09/1999', '22 years old', '93692112500', 'Male', '', 'asdf', 'qwerty', 'test'),
(52, 'user', 'user', 'user', 'Childrens Ward', '1234567', '9kg', '1 feet 10 i', 'DAT (Diet as Tolerated)', 'Married', '2022-05-06', '08/09/1999', '22 years old', '09369211250', 'Male', '2022-05-09', 'diag', 'user', 'user'),
(53, 'use', 'use', 'use', 'Emergency Room', '1234567', '5kg', '1 feet 10 i', 'High protein diet', 'Married', '2022-05-06', '04/18/1999', '23 years old', '09369211250', 'Male', '2022-05-06', 'diag', 'test', 'test'),
(54, 'sss', 'sss', 'sss', 'Observation Unit W', '1234567', '5kg', '1 feet 5 in', 'High carb diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '09369211250', 'Male', '2022-05-19', 'oks na pota ka', 'qwerty', 'Dr. Hilao'),
(55, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'Low protein diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '09369211250', 'Male', '2022-05-19', 'sss', 'sss', 'Dr. Hilao'),
(56, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'High protein diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '09369211250', 'Male', '2022-05-19', 'sss', 'sss', 'sss'),
(57, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'High protein diet', 'Widowed', '2022-05-06', '08/09/1999', '', '09369211250', 'Male', '2022-05-19', 'sss', 'sss', 'sss'),
(58, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'High protein diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '93692112500', 'Male', '2022-05-19', 'sss', 'sss', 'sss'),
(59, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'High protein diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '93692112500', 'Male', '2022-05-19', 'sss', 'sss', 'sss'),
(60, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'High protein diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '09369211250', 'Male', '2022-05-19', 'sss', 'sss', 'sss'),
(61, 'sss', 'sss', 'sss', 'Childrens Ward', '1234567', '5kg', '1 feet 5 in', 'High protein diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '09369211250', 'Male', '2022-05-19', 'sss', 'sss', 'sss'),
(62, 'Tan Feliz', 'Daryl', '', 'Emergency Ward', '1234566', '5kg', '2 feet 6 in', 'High carb diet', 'Widowed', '2022-05-06', '08/09/1999', '22 years old', '9369211250', 'Male', '', '', '', 'Dr. Hilao'),
(63, 'Nabong', 'Nabong', 'Dela Cruz', 'Emergency Room', '7000001', '50kg', '', 'DAT (Diet as Tolerated)', 'Single', '2022-05-05', '02/23/2006', '16 years old', '09756724553', 'Female', '', 'Bone Fracture', 'none', 'Dr.Jerome Singgit'),
(64, 'Nabong', 'Loujill', 'Dela Cruz', 'Emergency Room', '7000002', '70kg', '6 feet 6 in', 'DAT (Diet as Tolerated)', 'Single', '2022-05-07', '02/23/2006', '16 years old', '09666329932', 'Female', '', 'Carpal Tunnel Syndrome', 'none', 'Dr. Cruz'),
(65, 'bataller', 'mark', 'christian', 'Observation Unit W', '7654321', '50kg', '5 feet', 'High fat diet', 'Widowed', '2022-05-08', '1999-08-09', '22 years old', '93692112500', 'Male', '', 'bone dislocation', 'test', 'Dr. Alvarez'),
(66, 'Marcos', 'Bong', 'Bong', 'Spinal Ward', '1807611', '50kg', '2 feet 5 in', 'High fat diet', 'Separated', '2022-05-09', '2021-11-10', '5 months old', '09369211250', 'Male', '', 'None', 'None', 'Dr. Abella'),
(67, 'Nabong', 'Beatriz', 'Dela Cruz', 'Female Service War', '7000004', '50kg', '5 feet', 'DAT (Diet as Tolerated)', 'Divorced', '2022-05-06', '2000-07-03', '21 years old', '09756724553', 'Female', '', 'osteoporosis', 'none', 'Dr. Lee'),
(68, 'Tan Feliz', 'Daryl', 'Villas', 'Observation Unit W', '8000001', '50kg', '2 feet 8 in', 'High protein diet', 'Separated', '2022-05-10', '2022-05-09', '1 day old', '09369211250', 'Male', '', 'test', 'test', 'Dr. How'),
(69, 'Nabong', 'Beatriz', 'Dela Cruz', 'Emergency Room', '7000005', '50kg', '5 feet', 'Low Salt Diet', 'Single', '2022-05-07', '2000-07-03', '21 years old', '09756724553', 'Female', '', 'May toyo', 'Sa tao', 'Dr. Hernandez'),
(70, 'singgit', 'jerome', 'escollar', 'Emergency Room', '0912223', '50kg', '6 feet 11 i', 'Low fat diet', 'Single', '2022-05-04', '1999-04-04', '23 years old', '09122244908', 'Male', '', 'none', 'try', 'Dr. Mendoza'),
(71, 'bataller', 'mark ', 'Christian', 'Emergency Room', '0000123', '70kg', '5 feet 9 in', 'Low carb diet', 'Married', '2022-05-10', '1995-06-13', '26 years old', '12331243431', 'Male', '', 'none', 'none', 'Dr. How'),
(72, 'Nabong', 'Sandra', 'Dela Cruz', 'Emergency Room', '1000001', '50kg', '5 feet', 'High protein diet', 'Single', '2022-05-10', '1995-09-13', '26 years old', '09767878655', 'Female', '', 'covid', 'none', 'Dr. Young'),
(73, 'layno', 'jessie', 'gutib', 'Childrens Ward', '0931331', '70kg', '6 feet 1 in', 'Low Salt Diet', 'Married', '2022-05-10', '1955-06-11', '66 years old', '09123312353', 'Male', '', '', '', 'Dr. Cañete'),
(74, 'mane', 'paq', 'ewan', 'Childrens Ward', '6757657', '50kg', '1 feet 9 in', 'Low fat diet', 'Divorced', '2022-05-10', '2022-05-10', '1 day old', '55366876875', 'Male', '', 'new', 'none', 'Dr. Supapo'),
(75, 'Bebe', 'baby', 'babe', 'Emergency Room', '1234556', '50kg', '5 feet 7 in', 'Low Salt Diet', 'Single', '2022-05-10', '1998-07-31', '23 years old', '74253433344', 'Male', '', 'heartache', 'love', 'Dr. Si'),
(76, 'VICTORIA', 'PAULO', 'AGUSTIN', 'Emergency Room', '1234569', '80', '6 feet', 'Low fat diet', 'Married', '2022-05-11', '2022-05-10', '1 day old', '09439164305', 'Male', '2022-05-09', 'dfghj', 'jhjkl', 'Dr. Alvarez'),
(77, 'try', 'co', 'lang', 'Emergency Room', '7000007', '50kg', '6 feet', 'DAT (Diet as Tolerated)', 'Married', '2022-05-13', '2011-12-15', '10 years old', '09876543214', 'Male', '2022-06-12', '', '', 'Dr. How'),
(78, 'Try', 'Me', 'Now', 'Observation Unit W', '7000008', '70kg', '5 feet 2 in', '', '', '2022-05-12', '2009-03-09', '13 years old', '09876543211', 'Male', '', 'Covid19', 'None', 'Dr. Abella'),
(79, 'Tipay', 'Darwin', 'Cabrera', 'Emergency Room', '7000009', '50kg', '5 feet 6 in', '', '', '2022-05-12', '1997-02-28', '25 years old', '98877564554', 'Male', '', 'Carpal Tunnel Syndrome', 'None', 'Dr. Aragon'),
(80, 'ong', 'ninet', 'chua', 'Emergency Room', '7000010', '70kg', '5 feet', 'Low Salt Diet', 'Divorced', '2022-05-12', '1992-04-08', '30 years old', '98734728934', 'Female', '', 'wala', 'wala', 'Dr. Supapo'),
(81, 'Basco', 'RIcci', 'T.F.', 'Emergency Room', '8000003', '50kg', '2 feet 6 in', 'High fat diet', 'Divorced', '2022-05-13', '2022-05-12', '1 day old', '09369211250', 'Female', '2022-05-13', 'test', 'test', 'Dr. Estrada Jr.'),
(82, 'Tan Feliz', 'Judy', 'Villas', 'Emergency Ward', '8000004', '50kg', '4 feet 11 i', 'Low carb diet', 'Married', '2022-05-13', '2022-05-10', '3 days old', '09565655576', 'Female', '2022-05-14', 'kinakaya hahha', 'hahaa', 'Dr. How'),
(83, 'isa', 'uno', 'one', 'Spinal Ward', '7000011', '70kg', '7 feet 1 in', 'Low carb diet', 'Divorced', '2022-05-14', '1997-12-25', '24 years old', '09876543211', 'Male', '', 'nezuko', 'nani', 'Dr. Abella'),
(84, 'dalawa', 'dos', 'two', 'Male Traction Serv', '7000012', '70kg', '6 feet 5 in', 'Low Salt Diet', 'Divorced', '2022-05-14', '1998-01-01', '24 years old', '09876543323', 'Female', '', 'naruto', 'aniyha', 'Dr. Nismal'),
(85, 'Mia', 'James', 'Caras', 'Rehab ward', '180654', '50kg', '5 feet 9 in', 'Low carb diet', 'Single', '2022-05-15', '1998-12-03', '23 years old', '09427382618', 'Male', '', 'none', 'none', 'Dr. Bonifacio'),
(86, 'Tan Feliz', 'dada', 'vvvv', 'Emergency Ward', '8000005', '50kg', '2 feet 9 in', 'High protein diet', 'Widowed', '2022-05-15', '2022-05-02', '1 week old', '09369211250', 'Male', '2022-05-16', 'dadadada', 'dadadad', 'Dr. Supapo'),
(87, 'kleo', 'boss', 'abelido', 'Observation Unit W', '8000006', '50kg', '2 feet 6 in', 'Low protein diet', 'Married', '2022-05-15', '2022-05-03', '1 week old', '09565655576', 'Male', '2022-05-16', 'asdas', 'asdas', 'Dr. Clet'),
(88, 'dalisan ', 'cardo ', 'ewan', 'Emergency Room', '7000013', '70kg', '7 feet 11 i', '', 'Divorced', '2022-05-15', '2006-02-28', '16 years old', '98797979797', 'Male', '', 'hgchfchdfxgxgs', 'none', 'Dr. Supapo'),
(89, 'later', 'now', 'today', 'Rehab ward', '7000014', '50kg', '5 feet', 'Low fat diet', 'Single', '2022-05-16', '1999-12-16', '22 years old', '23123123123', 'Male', '', 'Bone Fracture ', 'None', 'Dr. Acuña'),
(90, 'Nabong', 'Betty', 'Dela Cruz', 'Emergency Room', '7000016', '50kg', '4 feet 11 i', 'DAT (Diet as Tolerated)', 'Single', '2022-05-16', '1989-05-09', '33 years old', '09873768446', 'Female', '2022-05-16', 'Bone Fracture', 'None', 'Dr. Enriquez'),
(91, 'Bologa', 'Aaron', 'Joshua', 'New Service Ward', '5729374', '50kg', '5 feet 6 in', 'Low Salt Diet', 'Single', '2022-05-16', '1999-11-16', '22 years old', '09137593744', 'Male', '', 'none', 'none', 'Dr. Camagay'),
(92, 'Dela cruz', 'erick', 'cruz', 'Male Service B War', '7000018', '50kg', '6 feet 1 in', 'Low Salt Diet', 'Divorced', '2022-05-16', '2013-12-25', '8 years old', '09757262873', 'Male', '2022-05-16', 'Bone Fracture ', 'None', 'Dr. De Leon'),
(93, 'test', 'test', 'test', 'Emergency Ward', '7000019', '50kg', '6 feet 1 in', 'High protein diet', 'Single', '2022-05-16', '2017-01-31', '5 years old', '42342334545', 'Male', '2022-05-16', 'bone fracture', 'none', 'Dr. Hernandez'),
(94, 'try', 'try', 'try', 'Emergency Room', '7000020', '70kg', '6 feet 8 in', 'Low protein diet', 'Married', '2022-05-16', '2013-01-29', '9 years old', '09687687587', 'Male', '2022-05-16', 'Bone fracture', 'None', 'Dr. Supapo'),
(95, 'ngaun', 'now', 'nyi', 'Emergency Room', '7000021', '50kg', '6 feet 7 in', 'High carb diet', 'Single', '2022-05-16', '2018-01-30', '4 years old', '09238172983', 'Male', '2022-05-16', 'Bone fracture', 'None', 'Dr. Estrada Jr.'),
(96, 'Tan Feliz', 'jerome', 'escollar', 'Emergency Room', '8000007', '50kg', '2 feet 11 inches', 'Low fat diet', 'Married', '2022-05-16', '1999-02-03', '23 years old', '09369211250', 'Female', '2022-05-27', 'Bone fracture hips', 'seafoods', 'Dr. How'),
(97, 'Tikyo', 'Tikyo', 'Tikyo', 'Emergency Room', '7000022', '50kg', '10 feet 1 inches', 'DAT (Diet as Tolerated)', 'Divorced', '2022-05-17', '2002-10-16', '19 years old', '09757457456', 'Female', '2022-05-30', 'Fracture', 'None', 'Dr. Hernandez'),
(98, 'Nathaniel', 'Nathaniel', 'Nathaniel', 'Emergency Ward', '7000023', '30kg', '3 feet 6 inches', 'DAT (Diet as Tolerated)', 'Single', '2022-05-17', '2017-01-19', '5 years old', '09867646534', 'Male', '2022-05-20', 'Fracture right arm', 'NONE', 'Dr. Pasion'),
(99, 'Dela Cruz', 'Gab', 'Entado', 'Emergency Ward', 'fjdksje', '50kg', '5 feet 9 inches', 'Low carb diet', 'Single', '2022-05-18', '2004-03-17', '18 years old', 'xhdkdjgdmdc', 'Male', '', 'none', 'none', 'Dr. Sadorra'),
(100, 'Acido', 'Glyzel', 'Ann', 'Female Service War', 'snfksbc', '50kg', '5 feet 7 inches', 'Low protein diet', 'Single', '2022-05-17', '1999-10-16', '22 years old', 'fjdksjcjcid', 'Female', '', 'none', 'none', 'Dr. Uy'),
(101, 'di magiba', 'mark', 'santos', 'Emergency Ward', '5393759', '50kg', '7 feet 5 inches', 'High fat diet', 'Single', '2022-05-19', '1951-05-19', '71 years old', '09536185173', 'Male', '', 'none', 'none', 'Dr. Bonifacio'),
(102, 'Tan Feliz', 'Rolando', 'Bautista', 'Emergency Room', '8000008', '50kg', '2 feet 8 inches', 'DAT (Diet as Tolerated)', 'Single', '2022-05-19', '2008-06-19', '13 years old', '09369211250', 'Male', '2022-06-15', 'Bone Fracture', 'Seafoods', 'Dr. De Vera'),
(103, 'mami', ' mami', ' mami', 'Emergency Room', '7000025', '50kg', '7 feet 11 inches', 'Low protein diet', 'Single', '2022-05-18', '1993-02-02', '29 years old', '09876655443', 'Male', '', 'fracture', 'none', 'Dr. Diycon'),
(104, 'test101', 'test101', 'test101', 'Emergency Room', '7000024', '50kg', '6 feet 8 inches', 'Low Salt Diet', 'Single', '2022-05-19', '2015-04-03', '7 years old', '09876654321', 'Male', '', '', '', 'Dr. Clet'),
(105, 'Gueno', 'jane', 'sta. Ana', 'Childrens Ward', '5824739', '50kg', '5 feet 8 inches', 'High fat diet', 'Single', '2022-05-19', '1967-05-19', '55 years old', '09472836382', 'Male', '', 'none, bone fracture & head ache', 'none', 'Dr. Delmindo'),
(106, 'singgit', 'jerome3', 'escollar', 'Observation Unit W', '4839274', '50kg', '4 feet 10 inches', 'Low fat diet', 'Single', '2022-05-22', '1972-05-22', '50 years old', '09122244908', 'Male', '', 'none', 'none', 'Dr. Cañete'),
(107, 'singgit', 'Jerome2', 'escollar', 'Emergency Ward', '4729357', '50kg', '5 feet 3 inches', 'Low carb diet', 'Married', '2022-05-22', '1968-05-22', '54 years old', '09125385739', 'Male', '', 'none', 'none', 'Dr. Bonifacio'),
(108, 'Tan Feliz', 'Daryl', 'Villas', 'Observation Unit W', '8000009', '50kg', '2 feet 5 inches', 'Low carb diet', 'Divorced', '2022-05-24', '2002-05-06', '20 years old', '09369211250', 'Male', '2022-05-24', 'bone fracture', 'None', 'Dr. Arroyo Sy T.'),
(109, 'bologa', 'aaron', 'joshua', 'Rehab ward', '1245676', '50kg', '6 feet 4 inches', 'Low fat diet', 'Married', '2022-05-25', '1978-06-15', '43 years old', '09563845626', 'Male', '', 'none', 'meron', 'Dr. Delmindo'),
(110, 'burdagol', 'juan', 'magsaysay', 'Emergency Ward', '2345676', '50kg', '2 feet 6 inches', 'Low fat diet', 'Single', '2022-05-25', '1989-01-25', '33 years old', '98643456543', 'Male', '', 'none', 'meron', 'Dr. Delmindo'),
(111, 'De Vera', 'qwerty', 'A', 'Observation Unit W', '123', '65', '5 feet 5 inches', 'Low protein diet', 'Single', '2022-05-25', '2007-09-25', '14 years old', '09424567894', 'Male', '2022-05-26', 'Low Blood', 'Girl', 'Dr. Bengzon');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptiontbl`
--

CREATE TABLE `prescriptiontbl` (
  `id` int(5) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_dorder` date NOT NULL,
  `patient_nom` text NOT NULL,
  `patient_qty` int(5) NOT NULL,
  `patient_prc` int(6) NOT NULL,
  `item_total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescriptiontbl`
--

INSERT INTO `prescriptiontbl` (`id`, `patient_id`, `patient_dorder`, `patient_nom`, `patient_qty`, `patient_prc`, `item_total`) VALUES
(243, 87, '2022-05-15', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 5, 5, ''),
(244, 87, '2022-05-15', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 5, 5, ''),
(245, 87, '2022-05-15', 'Paracetamol Injection: 150 mg/ml, 2 ml ampule', 5, 5, ''),
(246, 87, '2022-05-15', 'Paracetamol Oral: 250 mg/5 ml Syrup/ Susp; 60 ml b', 5, 5, ''),
(247, 87, '2022-05-15', 'Paracetamol Oral: 500 mg tablet', 5, 5, ''),
(248, 87, '2022-05-15', 'Etoposide Injection: 20 mg/ml, 5 ml ampule', 1, 1, ''),
(249, 87, '2022-05-15', 'Mesna Injection: 100 mg/ml, 4 ml ampule', 1, 1, ''),
(250, 87, '2022-05-15', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 5, 15, ''),
(251, 87, '2022-05-15', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 5, 14, ''),
(252, 87, '2022-05-15', 'Paracetamol Injection: 150 mg/ml, 2 ml ampule', 5, 13, ''),
(253, 87, '2022-05-15', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 10, 2, ''),
(254, 87, '2022-05-15', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 10, 46, ''),
(255, 87, '2022-05-15', 'Paracetamol Injection: 150 mg/ml, 2 ml ampule', 10, 6, ''),
(256, 87, '2022-05-15', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 5, 500, ''),
(257, 87, '2022-05-15', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 5, 500, ''),
(258, 87, '2022-05-15', 'Paracetamol Injection: 150 mg/ml, 2 ml ampule', 5, 500, ''),
(259, 87, '2022-05-15', 'Etoposide Injection: 20 mg/ml, 5 ml ampule', 1, 3, ''),
(260, 87, '2022-05-15', 'Ifosfamide Injection: 2 g vial', 1, 3, ''),
(261, 87, '2022-05-15', 'Cisplatin Injection: 1 mg/ml, 50 ml vial', 1, 3, ''),
(262, 87, '2022-05-15', 'Etoposide Injection: 20 mg/ml, 5 ml ampule', 1, 5, ''),
(263, 87, '2022-05-15', 'Ifosfamide Injection: 2 g vial', 2, 5, ''),
(264, 87, '2022-05-15', 'Cisplatin Injection: 1 mg/ml, 50 ml vial', 1, 12, ''),
(265, 87, '2022-05-15', 'Cisplatin Injection: 1 mg/ml, 50 ml vial', 1, 1, ''),
(266, 87, '2022-05-15', 'Etoposide Injection: 20 mg/ml, 5 ml ampule', 1, 6, ''),
(267, 87, '2022-05-15', 'Ifosfamide Injection: 2 g vial', 1, 1, ''),
(268, 87, '2022-05-15', 'Cisplatin Injection: 1 mg/ml, 50 ml vial', 1, 1, ''),
(269, 87, '2022-05-15', 'Gemcitabine Injection: 200 mg vial', 1, 1, ''),
(270, 87, '2022-05-15', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 1, 1, ''),
(271, 87, '2022-05-15', 'Diphenhydramine Oral: 50mg capsule', 1, 10, ''),
(272, 87, '2022-05-15', 'Diphenhydramine Oral: 50mg capsule', 1, 6, ''),
(273, 87, '2022-05-15', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 1, 6, ''),
(274, 84, '2022-05-15', 'V injection 15mg', 20, 250, ''),
(275, 86, '2022-05-15', 'Diphenhydramine Oral: 50mg capsule', 3, 6, ''),
(276, 84, '2022-05-15', 'Vitamin B1 B6 B12 Oral: 100 mg/5 mg/50 mcg tablet', 20, 100, ''),
(277, 83, '2022-05-15', 'Amikacin Injection: 250mg, 2ml vial', 20, 2000, ''),
(278, 84, '2022-05-15', 'Penicillin G Crystalline Injection: 5M units vial', 5, 100, ''),
(279, 84, '2022-05-15', 'Penicillin G Crystalline Injection: 5M units vial', 5, 100, ''),
(280, 84, '2022-05-15', 'Penicillin G Crystalline Injection: 5M units vial', 5, 100, ''),
(281, 84, '2022-05-15', 'Penicillin G Crystalline Injection: 5M units vial', 5, 100, ''),
(282, 84, '2022-05-15', 'Penicillin G Crystalline Injection: 5M units vial', 5, 100, ''),
(283, 84, '2022-05-15', 'Penicillin G Crystalline Injection: 5M units vial', 5, 100, ''),
(284, 84, '2022-05-15', 'Mesna Injection', 1, 100, ''),
(285, 84, '2022-05-15', 'Mesna Injection', 1, 100, ''),
(286, 84, '2022-05-15', 'Mesna Injection', 1, 100, ''),
(287, 84, '2022-05-15', 'Mesna Injection', 1, 100, ''),
(288, 84, '2022-05-15', 'Mesna Injection', 1, 100, ''),
(289, 88, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 1, 6, ''),
(290, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(291, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(292, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(293, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(294, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(295, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(296, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(297, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(298, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(299, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(300, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(301, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(302, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(303, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(304, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(305, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(306, 88, '2022-05-16', 'Phytomenadione Injection: 10 mg/ml, 1 ml ampule', 2, 100, ''),
(307, 89, '2022-05-16', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 1, 100, ''),
(308, 89, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 5, 30, ''),
(309, 89, '2022-05-16', 'Cefazolin Injection: 1 g vial', 5, 2000, ''),
(310, 89, '2022-05-16', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 1, 100, ''),
(311, 89, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 5, 30, ''),
(312, 89, '2022-05-16', 'Cefazolin Injection: 1 g vial', 5, 2000, ''),
(313, 89, '2022-05-16', 'Ascorbic Acid 500 mg tablet', 1, 10, ''),
(314, 88, '2022-05-16', 'MEDICINE/NEW', 2, 20, ''),
(315, 89, '2022-05-16', 'Calcium 500 mg tablet', 5, 400, ''),
(316, 91, '2022-05-16', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 2, 11, ''),
(317, 91, '2022-05-16', 'Cetirizine Oral: 10mg tablet', 4, 200, ''),
(318, 91, '2022-05-16', 'Zinc Gluconate Oral: 30mg tablet', 12, 400, ''),
(319, 91, '2022-05-16', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 5, 500, ''),
(320, 91, '2022-05-16', 'Ketorolac Injection: 30 mg/ml, 1 ml ampule', 5, 500, ''),
(321, 91, '2022-05-16', 'TEST/MEDICINE', 2, 1000, ''),
(322, 91, '2022-05-16', 'antibiotic', 3, 500, ''),
(323, 92, '2022-05-16', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 1, 200, ''),
(324, 92, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 1, 200, ''),
(325, 92, '2022-05-16', 'Diphenhydramine Oral: 25mg capsule', 1, 200, ''),
(326, 92, '2022-05-16', 'Cetirizine Oral: 10mg tablet', 1, 200, ''),
(327, 92, '2022-05-16', 'Loratadine Oral: 10mg tablet', 1, 200, ''),
(328, 92, '2022-05-16', 'Amoxicillin Oral: 500 mg capsule', 1, 300, ''),
(329, 92, '2022-05-16', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 1, 200, ''),
(330, 92, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 1, 200, ''),
(331, 92, '2022-05-16', 'Diphenhydramine Oral: 25mg capsule', 1, 200, ''),
(332, 92, '2022-05-16', 'Cetirizine Oral: 10mg tablet', 1, 200, ''),
(333, 92, '2022-05-16', 'Loratadine Oral: 10mg tablet', 1, 200, ''),
(334, 92, '2022-05-16', 'Amoxicillin Oral: 500 mg capsule', 1, 300, ''),
(335, 92, '2022-05-16', 'Ascorbic Acid 500 mg tablet', 1, 400, ''),
(336, 95, '2022-05-16', 'Cetirizine Oral: 10mg tablet', 1, 200, ''),
(337, 95, '2022-05-16', 'Loratadine Oral: 10mg tablet', 1, 200, ''),
(338, 95, '2022-05-16', 'Amoxicillin Oral: 500 mg capsule', 1, 300, ''),
(339, 95, '2022-05-16', 'Amikacin Injection: 250mg, 2ml vial', 1, 300, ''),
(340, 95, '2022-05-16', 'Paracetamol Oral: 500 mg tablet', 2, 500, ''),
(341, 95, '2022-05-16', 'Amoxicillin Oral: 500 mg capsule', 2, 300, ''),
(342, 95, '2022-05-16', 'Ascorbic Acid 500 mg tablet', 5, 400, ''),
(343, 95, '2022-05-16', 'Calcium 500 mg tablet', 1, 400, ''),
(344, 96, '2022-05-16', 'Cefazolin Injection: 1 g vial', 1, 300, ''),
(345, 96, '2022-05-16', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 4, 200, ''),
(346, 96, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 1, 200, ''),
(347, 96, '2022-05-16', 'Diphenhydramine Oral: 50mg capsule', 1, 200, ''),
(348, 97, '2022-05-17', 'Vitamin B1 B6 B12 Oral: 100 mg/5 mg/50 mcg tablet', 5, 400, ''),
(349, 97, '2022-05-17', 'Aspirin Oral: 80mg tablet', 2, 580, ''),
(350, 97, '2022-05-17', 'Oxacillin Injection: 500 mg vial', 1, 300, ''),
(351, 97, '2022-05-17', 'Calcium 500 mg tablet', 2, 400, ''),
(352, 98, '2022-05-17', 'Oxacillin Injection: 500 mg vial', 2, 300, ''),
(353, 98, '2022-05-17', 'Amikacin Injection: 250mg, 2ml vial', 2, 300, ''),
(354, 98, '2022-05-17', 'Paracetamol Oral: 250 mg/5 ml Syrup/ Susp; 60 ml b', 2, 500, ''),
(355, 98, '2022-05-17', 'Ascorbic Acid 500 mg tablet', 1, 400, ''),
(356, 99, '2022-05-17', 'try', 2, 10, ''),
(357, 99, '2022-05-17', 'Ascorbic Acid 500 mg tablet', 12, 400, ''),
(358, 99, '2022-05-17', 'TEST/MEDICINE', 2, 1000, ''),
(359, 99, '2022-05-17', 'Aspirin Oral: 80mg tablet', 4, 580, ''),
(360, 100, '2022-05-17', 'V injection 15mg', 3, 24, ''),
(361, 100, '2022-05-17', 'Amlodipine Oral: 5 mg tablet', 4, 600, ''),
(362, 100, '2022-05-17', 'try', 12, 10, ''),
(363, 100, '2022-05-17', 'antibiotic', 3, 500, ''),
(364, 100, '2022-05-17', 'Vitamin B1 B6 B12 Oral: 100 mg/5 mg/50 mcg tablet', 4, 400, ''),
(365, 98, '2022-05-17', 'Diphenhydramine Oral: 25mg capsule', 1, 200, ''),
(366, 98, '2022-05-17', 'MEDICINE/NEW', 3, 60, ''),
(367, 97, '2022-05-17', 'Mesna Injection', 1, 10, ''),
(368, 97, '2022-05-17', 'Mesna Injection', 9, 10, ''),
(369, 98, '2022-05-17', 'MEDICINE/NEW', 5, 60, ''),
(370, 98, '2022-05-17', 'MEDICINE/NEW', 5, 20, ''),
(371, 98, '2022-05-17', 'MEDICINE/NEW', 5, 60, ''),
(372, 98, '2022-05-17', 'MEDICINE/NEW', 5, 20, ''),
(373, 98, '2022-05-17', 'MEDICINE/NEW', 5, 60, ''),
(374, 98, '2022-05-17', 'MEDICINE/NEW', 1, 60, ''),
(375, 98, '2022-05-17', 'MEDICINE/NEW', 2, 20, ''),
(376, 98, '2022-05-17', 'MEDICINE/NEW', 5, 60, ''),
(377, 98, '2022-05-17', 'MEDICINE/NEW', 1, 20, ''),
(378, 101, '2022-05-18', 'Ifosfamide Injection: 2 g vial', 2, 15, ''),
(379, 101, '2022-05-18', 'Ifosfamide Injection: 2 g vial', 3, 12, ''),
(380, 101, '2022-05-18', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 4, 15, ''),
(381, 101, '2022-05-18', 'Calcium 500 mg tablet', 12, 400, ''),
(382, 101, '2022-05-18', 'Diphenhydramine HCl Injection: 50 mg/ml, 1 ml ampule', 1, 200, ''),
(383, 102, '2022-05-18', 'Calcium 500 mg tablet', 5, 400, ''),
(384, 102, '2022-05-18', 'Calcium 500 mg tablet', 12, 400, ''),
(385, 102, '2022-05-18', 'Xarelto 10mg', 50, 50, ''),
(386, 103, '2022-05-19', 'MEDICINE/NEW', 1, 20, ''),
(387, 103, '2022-05-19', 'MEDICINE/NEW', 2, 60, ''),
(388, 103, '2022-05-19', 'Mesna Injection', 2, 10, ''),
(389, 104, '2022-05-19', 'Telmisartan Oral: 40 mg tablet', 1, 600, ''),
(390, 50, '2022-05-19', 'Cetirizine Oral: 10mg tablet', 3, 200, ''),
(391, 102, '2022-05-19', 'Calcium 500 mg tablet', 1, 400, ''),
(392, 104, '2022-05-19', 'Calcium 500 mg tablet', 1, 400, ''),
(393, 104, '2022-05-19', 'Diphenhydramine Oral: 25mg capsule', 2, 200, ''),
(394, 104, '2022-05-19', 'Cetirizine Oral: 10mg tablet', 2, 200, ''),
(395, 104, '2022-05-19', 'Vitamin B1 B6 B12 Oral: 100 mg/5 mg/50 mcg tablet', 3, 400, ''),
(396, 105, '2022-05-19', 'Diphenhydramine Oral: 25mg capsule', 3, 200, ''),
(397, 105, '2022-05-19', 'Aspirin Oral: 80mg tablet', 45, 580, ''),
(398, 105, '2022-05-19', 'Paracetamol Oral: 250 mg/5 ml Syrup/ Susp; 60 ml b', 4, 500, ''),
(399, 98, '2022-05-19', 'Oxacillin Injection: 500 mg vial', 2, 300, ''),
(400, 98, '2022-05-19', 'Telmisartan Oral: 80 mg tablet', 1, 600, ''),
(401, 106, '2022-05-22', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 2, 500, ''),
(402, 106, '2022-05-22', 'Butorphanol Tartrate Injection: 2 mg/ml, 1 ml ampule', 3, 500, ''),
(403, 106, '2022-05-22', 'Aspirin Oral: 80mg tablet', 4, 580, ''),
(404, 106, '2022-05-22', 'Amlodipine Oral: 5 mg tablet', 2, 600, ''),
(405, 98, '2022-05-22', 'Paracetamol Oral: 500 mg tablet', 2, 500, ''),
(406, 98, '2022-05-22', 'Paracetamol Oral: 250 mg/5 ml Syrup/ Susp; 60 ml b', 3, 500, ''),
(407, 98, '2022-05-22', 'Amoxicillin Oral: 500 mg capsule', 1, 300, ''),
(408, 98, '2022-05-22', 'Loratadine Oral: 10mg tablet', 2, 200, ''),
(409, 98, '2022-05-22', 'Loratadine Oral: 10mg tablet', 1, 200, ''),
(410, 98, '2022-05-22', 'Zinc Gluconate Oral: 30mg tablet', 2, 400, ''),
(411, 98, '2022-05-22', 'Zinc Gluconate Oral: 30mg tablet', 1, 400, ''),
(412, 107, '2022-05-22', 'Telmisartan Oral: 40 mg tablet', 3, 600, ''),
(413, 107, '2022-05-22', 'Telmisartan Oral: 80 mg tablet', 45, 700, ''),
(414, 107, '2022-05-22', 'V injection 15mg', 12, 71, ''),
(415, 107, '2022-05-22', 'Diphenhydramine Oral: 25mg capsule', 3, 200, ''),
(416, 107, '2022-05-22', 'Aspirin Oral: 80mg tablet', 2, 580, ''),
(417, 108, '2022-05-24', 'Zinc Gluconate Oral: 30mg tablet', 1, 400, ''),
(418, 108, '2022-05-24', 'Calcium 500 mg tablet', 1, 400, ''),
(419, 108, '2022-05-24', 'Calcium 500 mg tablet', 1, 400, ''),
(420, 109, '2022-05-24', 'Nicardipine 1mg/ml, 2ml ampule', 55, 600, ''),
(421, 109, '2022-05-24', 'Calcium 500 mg tablet', 5, 400, ''),
(422, 109, '2022-05-24', 'Telmisartan Oral: 80 mg tablet', 2, 700, ''),
(423, 109, '2022-05-24', 'Paracetamol Oral: 500 mg tablet', 1, 500, ''),
(424, 109, '2022-05-24', 'Telmisartan Oral: 40 mg tablet', 2, 600, ''),
(425, 110, '2022-05-24', 'Amoxicillin Oral: 500 mg capsule', 1, 300, ''),
(426, 110, '2022-05-24', 'Mesna Injection: 100 mg/ml, 4 ml ampule', 2, 20, ''),
(427, 111, '2022-05-24', 'Oxacillin Injection: 500 mg vial', 2, 300, ''),
(428, 50, '2022-05-24', 'Mesna Injection: 100 mg/ml, 4 ml ampule', 44, 20, ''),
(429, 50, '2022-05-24', 'Mesna Injection: 100 mg/ml, 4 ml ampule', 5, 20, ''),
(430, 111, '2022-05-24', 'Paracetamol Oral: 250 mg/5 ml Syrup/ Susp; 60 ml b', 5, 500, ''),
(431, 49, '2022-05-24', 'Loratadine Oral: 10mg tablet', 2, 200, ''),
(432, 49, '2022-05-24', 'Loratadine Oral: 10mg tablet', 2, 200, ''),
(433, 49, '2022-05-24', 'Loratadine Oral: 10mg tablet', 3, 200, ''),
(434, 49, '2022-05-24', 'Loratadine Oral: 10mg tablet', 1, 200, '');

-- --------------------------------------------------------

--
-- Table structure for table `registertbl`
--

CREATE TABLE `registertbl` (
  `id` int(4) NOT NULL,
  `registered_idnum` int(4) NOT NULL,
  `registered_fname` varchar(18) NOT NULL,
  `registered_mname` varchar(18) NOT NULL,
  `registered_lname` varchar(18) NOT NULL,
  `registered_contact` varchar(11) NOT NULL,
  `registered_uname` varchar(25) NOT NULL,
  `registered_psw` varchar(50) NOT NULL,
  `registered_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registertbl`
--

INSERT INTO `registertbl` (`id`, `registered_idnum`, `registered_fname`, `registered_mname`, `registered_lname`, `registered_contact`, `registered_uname`, `registered_psw`, `registered_type`) VALUES
(3, 180761, 'Default', 'Default', 'Defaukt', '2147483647', '@default01', '202cb962ac59075b964b07152d234b70', 'admin'),
(7, 180762, 'Default', 'Default', 'Default', '2147483647', '@user', '202cb962ac59075b964b07152d234b70', 'user'),
(15, 4705, 'Paulo', 'Agustin', 'Victoria', '09231234567', 'paulo', '79cfeb94595de33b3326c06ab1c7dbda', 'admin'),
(16, 456, 'Joey', 'L.', 'De Vera', '09421234567', 'Joey', '250cf8b51c773f3f8dc8b4be867a9a02', 'user'),
(17, 3432432, 'Daryl2', 'Villas', 'Tan Feliz2', '9369211250', 'lyrad', '202cb962ac59075b964b07152d234b70', 'user'),
(18, 7032000, 'Beatriz', 'Dela Cruz', 'Nabong', '09756724553', 'Beatriz', '0d4a41d6292ff86912e609f0687a9695', 'user'),
(19, 11, 'Jerome', 'Escollar', 'Singgit', '09122244908', 'Jerome', '3e2959dcb5ae9022f356b64db796bd76', 'user'),
(20, 3022000, 'Beatriz', 'Dela Cruz', 'Nabong', '09756724553', 'Beatriz', '0d4a41d6292ff86912e609f0687a9695', 'user'),
(21, 180762, 'Jerome', 'Escolar', 'Singgit', '09352331627', '@users', 'caf1a3dfb505ffed0d024130f58c5cfa', 'user'),
(22, 1234, 'Joey', 'L', 'de Vera', '09421234567', 'Joeydevera', '7adfca2f2aba4cd301a02b9f33ca9037', 'admin'),
(23, 9876543, 'juan', 'dela', 'cruz', '09369211250', 'juandelacruz', 'b7a2c3b25c9441b0a38d0a874ace268b', ''),
(24, 4705, 'PAULO', 'AGUSTIN', 'VICTORIA', '09439164305', 'paulo123', '0192023a7bbd73250516f069df18b500', 'admin'),
(25, 4705, 'PAULO', 'AGUSTIN', 'VICTORIA', '09439164305', 'paulo123', 'adcebeafbb16fc1ac715d06e0d66b986', ''),
(26, 1234, 'Paulo', 'AGUSTIN', 'VICTORIA', '1234567', 'paupau12345', 'c141d8a38568b4925d86a7adaa49b32f', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `total_price`
--

CREATE TABLE `total_price` (
  `patient_id` int(11) NOT NULL,
  `grand_total` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `total_price`
--

INSERT INTO `total_price` (`patient_id`, `grand_total`) VALUES
(46, 72),
(47, 72),
(49, 10),
(50, 100),
(52, 72),
(61, 3),
(62, 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvaltbl`
--
ALTER TABLE `approvaltbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorytbl`
--
ALTER TABLE `categorytbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinetbl`
--
ALTER TABLE `medicinetbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientprofiletbl`
--
ALTER TABLE `patientprofiletbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptiontbl`
--
ALTER TABLE `prescriptiontbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registertbl`
--
ALTER TABLE `registertbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_price`
--
ALTER TABLE `total_price`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approvaltbl`
--
ALTER TABLE `approvaltbl`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `categorytbl`
--
ALTER TABLE `categorytbl`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `medicinetbl`
--
ALTER TABLE `medicinetbl`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `patientprofiletbl`
--
ALTER TABLE `patientprofiletbl`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `prescriptiontbl`
--
ALTER TABLE `prescriptiontbl`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;

--
-- AUTO_INCREMENT for table `registertbl`
--
ALTER TABLE `registertbl`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `total_price`
--
ALTER TABLE `total_price`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
