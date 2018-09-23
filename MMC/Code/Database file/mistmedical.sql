-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 07:38 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mistmedical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` bigint(20) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `blood_donation` char(1) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `department` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `blood_group`, `gender`, `dob`, `blood_donation`, `designation`, `department`) VALUES
(111111, 'Abul', 'Khair', '', '', 'pass123', '', '', '0000-00-00', '', 'Commandant', ''),
(222222, 'Khalil', 'Ur Rahman', '', '', 'pass123', '', '', '0000-00-00', '', 'DSW', ''),
(2015141, 'Nazrul', 'Islam', '', '', 'pass123', '', '', '0000-00-00', '', 'CC', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `doctorId` bigint(20) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `topic` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`doctorId`, `degree`, `topic`) VALUES
(10001, 'MBBS', ''),
(10001, 'FCPS', 'Gynecology'),
(10002, 'MBBS', ''),
(10002, 'FCPS', 'Medicine'),
(10002, 'FRCS', 'Neurology');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctorId` bigint(20) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `BloodDonation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctorId`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `blood_group`, `gender`, `DOB`, `BloodDonation`, `designation`, `created_at`, `updated_at`) VALUES
(10001, 'Mahbuba', 'Alam', 'mahbuba.alam@gmail.com', 1928338484, 'pass123', 'O+', 'F', '1978-04-03', 'YES', 'Chief Doctor', NULL, NULL),
(10002, 'Harun', 'Hamza', 'harun.hamza@gmail.com', 1283446455, 'pass123', 'B+', 'M', '1974-06-08', 'Y', 'Chief Doctor', NULL, NULL),
(10003, '10003', NULL, '', 0, 'passw', '', '', '0000-00-00', '', '', NULL, NULL),
(10003, '10003', NULL, '', 0, 'passw', '', '', '0000-00-00', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `health_tips`
--

CREATE TABLE `health_tips` (
  `id` int(11) NOT NULL,
  `tips` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_tips`
--

INSERT INTO `health_tips` (`id`, `tips`) VALUES
(1, 'Stretching exercises after wake up boosts circulation and digestion, and eases back pain'),
(2, 'Bone density declines after the age of 30,so get your daily calcium'),
(3, 'Sugary drinks are the most fattening things you can put into your body'),
(4, 'Despite being high in fat, nuts are incredibly nutritious and healthy'),
(5, 'People who eat the most fish have a lower risk of all sorts of diseases, including heart disease, dementia and depression '),
(6, 'Half a liter of water, 30 minutes before each meal, increased weight loss by 44%'),
(7, 'Take Vitamin D3 If You Don\'t Get Much Sun');

-- --------------------------------------------------------

--
-- Table structure for table `issued_medicine`
--

CREATE TABLE `issued_medicine` (
  `prescriptionId` bigint(20) NOT NULL,
  `medicineName` varchar(30) NOT NULL,
  `quantity` varchar(3) NOT NULL,
  `issued_by` bigint(20) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issued_medicine`
--

INSERT INTO `issued_medicine` (`prescriptionId`, `medicineName`, `quantity`, `issued_by`, `issue_date`) VALUES
(200003, 'Bisocor', '10', 20001, '2018-05-15'),
(200003, 'Fixal', '5', 20001, '2018-05-15'),
(200003, 'Syp. Mucolyt', '6', 20001, '2018-05-15'),
(200010, 'Thiazide diuretics', '45', 20001, '2018-05-15'),
(200011, 'Zmax pro', '12', 20001, '2018-05-15'),
(200018, 'Fluoxetine', '23', 20001, '2018-05-15'),
(200019, 'Monti fast', '20', 20001, '2018-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `medicalrecords`
--

CREATE TABLE `medicalrecords` (
  `prescriptionid` bigint(20) NOT NULL,
  `patientId` bigint(20) NOT NULL,
  `doctorid` bigint(30) NOT NULL,
  `prescription_date` date NOT NULL,
  `desease` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bp` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temparature` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `advice` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicalrecords`
--

INSERT INTO `medicalrecords` (`prescriptionid`, `patientId`, `doctorid`, `prescription_date`, `desease`, `bp`, `weight`, `temparature`, `advice`) VALUES
(200001, 201514033, 10001, '2018-01-06', NULL, NULL, NULL, NULL, 'Check Pressure everyday and make a chart.'),
(200002, 201514033, 10001, '2018-01-06', NULL, NULL, NULL, NULL, ''),
(200003, 201514033, 10001, '2018-02-06', NULL, NULL, NULL, NULL, 'Pls Maintain a BP chart'),
(200004, 201514057, 10001, '2018-03-06', NULL, NULL, NULL, NULL, ''),
(200005, 201514057, 10001, '2018-03-11', NULL, NULL, NULL, NULL, ''),
(200006, 201514057, 10001, '2018-03-17', NULL, NULL, NULL, NULL, 'Drink Hot Water.'),
(200007, 201514033, 10002, '2018-03-27', NULL, NULL, NULL, NULL, ''),
(200008, 201514033, 10002, '2018-03-30', 'High press', '100/140', '58kg', '98F', 'Check pressure regularly. Avoid red meat.'),
(200009, 201514057, 10001, '2018-04-11', 'extra weig', '', '', '', ''),
(200010, 201514057, 10001, '2018-04-11', 'High Blood', '100/150', '106.3kg', '99F', ''),
(200011, 201514057, 10001, '2018-04-11', 'Viral Feve', '91/115', '70', '101', ''),
(200012, 201514033, 10001, '2018-05-11', 'Caugh,Feve', '81/110', '56', '98', ''),
(200013, 201514057, 10001, '2018-05-11', 'Blue-green', '', '', '', ''),
(200014, 201514033, 10001, '2018-05-11', ' Bacterial', '', '', '', ''),
(200015, 201514057, 10001, '2018-05-11', 'Chickenpox', '', '', '102', ''),
(200016, 201514033, 10001, '2018-05-11', 'Depression', '', '', '', ''),
(200017, 201514057, 10001, '2018-05-11', ' Cryptospo', '', '', '', ''),
(200018, 201514057, 10001, '2018-05-11', 'Celiac Dis', '', '', '', ''),
(200019, 201514033, 10001, '2018-05-11', 'Asthsma', '80/120', '67', '', 'Avoid dust'),
(200020, 201514033, 10001, '2018-05-29', '', '', '', '', ''),
(200021, 201514057, 10002, '2018-06-03', 'Over weigh', '100/180', '105', '', 'Control your diet'),
(200022, 201514057, 10001, '2018-09-11', 'Over weigh', '100/180', '95', '', 'Control diet,drink much');

-- --------------------------------------------------------

--
-- Table structure for table `medicalstaffs`
--

CREATE TABLE `medicalstaffs` (
  `staffId` bigint(20) NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `BloodDonation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicalstaffs`
--

INSERT INTO `medicalstaffs` (`staffId`, `first_name`, `last_name`, `email`, `mobile_no`, `password`, `blood_group`, `gender`, `DOB`, `BloodDonation`, `designation`, `created_at`, `updated_at`) VALUES
(20001, 'Zubair', 'Hossain', 'zubair.hossain@gmail.com', 1923875656, 'pass123', 'AB+', 'M', '1982-07-14', 'No', 'Medical staff', NULL, NULL),
(20002, 'Monoyar', 'Aziz', 'monoyar.aziz@gmail.com', 1643839294, 'pass123', 'A-', 'M', '1985-02-14', 'YES', 'Medical staff', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicineName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `chemicalName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `companyName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicineName`, `chemicalName`, `companyName`, `quantity`) VALUES
('Napa', 'Paracitamol', 'Square', 20),
('Alatrol', 'Cetrigin', 'Acme', 30);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2018_04_19_154243_create_all_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permitted_account`
--

CREATE TABLE `permitted_account` (
  `id` bigint(20) NOT NULL,
  `id_category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permitted_account`
--

INSERT INTO `permitted_account` (`id`, `id_category`) VALUES
(10003, 'DOCTOR');

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_medicine`
--

CREATE TABLE `prescribed_medicine` (
  `prescriptionId` bigint(20) NOT NULL,
  `medicineName` varchar(40) NOT NULL,
  `dose` varchar(6) NOT NULL,
  `morning` varchar(5) NOT NULL,
  `noon` varchar(5) NOT NULL,
  `night` varchar(5) NOT NULL,
  `day` varchar(6) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribed_medicine`
--

INSERT INTO `prescribed_medicine` (`prescriptionId`, `medicineName`, `dose`, `morning`, `noon`, `night`, `day`, `description`) VALUES
(200001, 'Ace', '500', '1', '1', '1', '5', ''),
(200001, 'Propranolol', '10', '1', '0', '0', '30', ''),
(200001, 'Esoral', '20', '1', '1', '0', '', 'Before Eating'),
(200002, 'Promotil', '5', '1', '1', '0', '5', ''),
(200002, 'Esoral', '20', '1', '1', '0', '5', 'Before Eating'),
(200002, 'Neosaline', '', '', '', '', '', ''),
(200003, 'Bisocor', '2.5', '0', '1', '0', '30', ''),
(200003, 'Fixal', '120', '0', '1', '0', '5', ''),
(200003, 'Syp. Mucolyt', '', '', '', '', '7', '2 spoon each time'),
(200004, 'Ontin', '20', '1', '1', '0', '5', ''),
(200004, 'Tofen', '1', '1', '1', '0', '5', ''),
(200004, 'Napa Extra', '', '1', '1', '0', '3', ''),
(200005, 'Seclo', '20', '1', '1', '0', '3', 'Before Eating'),
(200005, 'NRG', '', '', '', '', '', ''),
(200005, 'Neosaline', '', '', '', '', '', ''),
(200006, 'Ace', '250', '1', '1', '0', '3', ''),
(200006, 'Syp. Mucoten', '', '', '', '', '5', '2 spoon each time'),
(200006, 'Tofen', '1', '1', '1', '0', '3', ''),
(200007, 'Xeldrin', '20', '1', '1', '0', '7', 'empty stomach'),
(200007, 'Neoronta', '', '1', '1', '1', '3', ''),
(200007, 'Renitidin', '50', '0', '1', '0', '', ''),
(200008, 'Cinajin', '30', '1', '0', '1', '30', 'Regularly'),
(200008, 'Seclo', '10', '0', '1', '0', '7', 'empty stomach'),
(200009, 'napa', '400', '1', '1', '', '7', ''),
(200010, 'Thiazide diuretics', '100mg', '1', '1', '1', '15', ''),
(200011, 'Zmax pro', '100', '0', '1', '0', '5', ''),
(200012, 'Alatrol,Citin', '12', '1', '1', '1', '5', ''),
(200013, 'A-Phedrin', '100', '1', '1', '0', '3', ''),
(200014, 'Abciximab', '15', '1', '1', '0', '', ''),
(200015, 'Codeine', '50', '0', '1', '1', '10', ''),
(200016, 'pregabalin ', '10', '1', '1', '0', '30', ''),
(200017, 'Prednisone', '500', '1', '1', '1', '7', ''),
(200018, 'Fluoxetine', '15', '1', '1', '1', '7', ''),
(200019, 'Monti fast', '20', '1', '2', '0', '10', ''),
(200020, 'NAPA', '400', '1', '1', '0', '7', ''),
(200021, 'Napa', '500', '1', '1', '0', '7', 'After meal'),
(200021, 'Antacid', '', '0', '1', '0', '3', 'Empty stomach'),
(200022, 'Napa', '250', '1', '0', '0', '15', 'After meal'),
(200022, 'Alatrol', '25', '1', '1', '1', '15', '');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `proposalid` bigint(20) NOT NULL,
  `generatedby` bigint(20) NOT NULL,
  `proposaldate` date NOT NULL,
  `medicalincharge` char(1) NOT NULL DEFAULT 'p',
  `dsw` char(1) NOT NULL DEFAULT 'p',
  `commandant` char(1) NOT NULL DEFAULT 'p',
  `accountofficer` char(1) NOT NULL DEFAULT 'p'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`proposalid`, `generatedby`, `proposaldate`, `medicalincharge`, `dsw`, `commandant`, `accountofficer`) VALUES
(200001, 20001, '2018-05-13', 'a', 'a', 'p', 'p'),
(200002, 20002, '2018-05-19', 'r', 'p', 'p', 'p'),
(200003, 20002, '2018-05-19', 'a', 'a', 'a', 'p'),
(200004, 20002, '2018-05-19', 'a', 'a', 'p', 'p'),
(200005, 20001, '2018-06-03', 'a', 'a', 'a', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `proposedmedicines`
--

CREATE TABLE `proposedmedicines` (
  `proposalid` bigint(20) NOT NULL,
  `medicineName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `dose` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ChemicalName` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Company` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proposedmedicines`
--

INSERT INTO `proposedmedicines` (`proposalid`, `medicineName`, `dose`, `ChemicalName`, `Company`, `quantity`, `cost`) VALUES
(200001, 'napa', '', 'paracitamol bp', 'Beximco', 20, '2000'),
(200001, 'Alatrol', '', 'cetrigin', 'Acme', 30, '4500'),
(200002, 'Altace', '250', 'ramipril', 'Beximco', 500, '15000'),
(200002, 'Amaryl', '10', 'glimepiride', 'Beximco', 1000, '7500'),
(200002, 'Celexa', '500', 'citalopram', 'SK-F', 100, '3500'),
(200002, 'Pepcid', '50', 'famotidine', 'SK-F', 10000, '18000'),
(200002, 'Zestril', '250', 'lisinopril', 'SK-F', 100, '9000'),
(200003, 'Wellbutrin', '1', 'bupropion', '', 200, '1500'),
(200003, 'Ultram', '10', 'tramadol', '', 1000, '18000'),
(200003, 'Mevacor', '250', 'lovastatin', '', 2000, '70000'),
(200003, 'Procardia', '500', 'nifedipine', '', 500, '101500'),
(200004, 'Effexor', '10', 'venlafaxine', 'SK-F', 2000, '30000'),
(200004, 'Diabeta', '500', 'glyburide', 'Beximco', 1500, '7500'),
(200004, 'Glucotrol', '250', 'glipizide', 'Square', 500, '20000'),
(200004, 'Lasix', '10', 'furosemide', 'Beximco', 200, '18750'),
(200004, 'Prinivil', '1', 'lisinopril', 'Square', 500, '35250'),
(200004, 'Synthroid', '25', 'levothyroxine', 'ACI', 1000, '18000'),
(200004, 'Zovirax', '500', 'acyclovir', 'ACI', 1000, '25500'),
(200005, 'Napa', '500', 'Paracitamol', 'Square', 2000, '4000'),
(200005, 'Alatrol', '25', 'Cetrigin', 'Acme', 500, '6000');

-- --------------------------------------------------------

--
-- Table structure for table `stored_medicine`
--

CREATE TABLE `stored_medicine` (
  `proposalid` bigint(20) NOT NULL,
  `medicineName` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `issued_by` bigint(20) NOT NULL,
  `issue_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stored_medicine`
--

INSERT INTO `stored_medicine` (`proposalid`, `medicineName`, `quantity`, `issued_by`, `issue_date`) VALUES
(200003, 'Wellbutrin', 1213, 20002, '2018-06-02'),
(200003, 'Ultram', 12, 20002, '2018-06-02'),
(200003, 'Mevacor', 300, 20002, '2018-06-02'),
(200003, 'Procardia', 455, 20002, '2018-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentId` bigint(20) NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Last_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `level` int(11) NOT NULL,
  `BloodDonation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentId`, `first_name`, `Last_name`, `email`, `mobile_no`, `password`, `blood_group`, `gender`, `department`, `DOB`, `level`, `BloodDonation`, `section`, `created_at`, `updated_at`) VALUES
(201514033, 'Ahasanul', 'Alam', 'ahasanul.alam@gmail.com', 12345657674, 'pass123', 'A+', 'M', 'CSE', '1995-12-05', 4, 'NO', 'A', NULL, NULL),
(201514057, 'Akil', 'Jawad', 'akil.jawad@gmail.com', 1822533824, 'pass1234', 'B+', 'F', 'CSE', '1995-12-05', 4, 'NO', 'A', NULL, NULL),
(201514089, 'Yousuf', 'Antu', 'yousuf.ahmed@gmail.com', 1328553824, 'pass1234', 'B+', 'M', 'CSE', '2017-03-11', 4, 'NO', 'B', NULL, NULL),
(201514076, 'Koushik', 'Solaiman', 'rafsan.monu@gmail.com', 1329375483, 'pass1234', 'B+', 'M', 'CSE', '2016-04-21', 4, 'NO', 'B', NULL, NULL),
(201414054, NULL, NULL, '', 0, '', '', '', '', '0000-00-00', 0, '', '', NULL, NULL),
(201412093, 'Ferdous', 'patwary', 'patwary@mail.com', 17219394572, 'pass123', 'b+', 'M', 'EECE', '1994-11-02', 4, '', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_tips`
--
ALTER TABLE `health_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  ADD PRIMARY KEY (`prescriptionid`),
  ADD UNIQUE KEY `prescriptionId` (`prescriptionid`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health_tips`
--
ALTER TABLE `health_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicalrecords`
--
ALTER TABLE `medicalrecords`
  MODIFY `prescriptionid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200023;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
