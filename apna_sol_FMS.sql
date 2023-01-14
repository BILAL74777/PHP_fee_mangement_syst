-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 05, 2021 at 02:55 PM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pimmsedu_pims_fee`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(11) NOT NULL,
  `batch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `batch`) VALUES
(1, '2020 - 2022'),
(2, '2021 - 2021'),
(3, '2021 - 2023');

-- --------------------------------------------------------

--
-- Table structure for table `concissions`
--

CREATE TABLE `concissions` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `concission_upto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concissions`
--

INSERT INTO `concissions` (`id`, `student_id`, `semester_id`, `session_id`, `concission_upto`) VALUES
(1, 1, 1, 1, '4000'),
(2, 2, 1, 1, '5000'),
(3, 3, 1, 1, '2000'),
(4, 4, 1, 1, '5500'),
(5, 5, 1, 1, '4000'),
(6, 10, 1, 1, '4000'),
(7, 9, 1, 1, '1000'),
(8, 6, 1, 1, '2000'),
(9, 7, 1, 1, '2000'),
(10, 8, 1, 1, '4000'),
(11, 11, 1, 1, '4000'),
(12, 12, 1, 1, '4000'),
(13, 14, 1, 1, '9000'),
(14, 13, 1, 1, '4000'),
(15, 15, 1, 1, '4000'),
(16, 16, 1, 1, '2000'),
(17, 25, 1, 1, '4000'),
(18, 17, 1, 1, '2000'),
(19, 20, 1, 1, '4000'),
(20, 24, 1, 1, '3000'),
(21, 19, 1, 1, '4000'),
(22, 21, 1, 1, '4000'),
(23, 22, 1, 1, '1000'),
(24, 23, 1, 1, '3000'),
(25, 18, 1, 1, '4000'),
(26, 3, 2, 2, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_name`, `password`) VALUES
(1, 'pims@645', 'Pims@123#'),
(2, 'Hussain@pimms.info', 'Hussain@111#');

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

CREATE TABLE `marital` (
  `id` int(11) NOT NULL,
  `marital` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital`
--

INSERT INTO `marital` (`id`, `marital`) VALUES
(1, 'Singal'),
(2, 'Married');

-- --------------------------------------------------------

--
-- Table structure for table `prospectus_fee`
--

CREATE TABLE `prospectus_fee` (
  `id` int(11) NOT NULL,
  `prosfectus_fee` varchar(255) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registered_student`
--

CREATE TABLE `registered_student` (
  `id` int(11) NOT NULL,
  `technology` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `street` text NOT NULL,
  `district` varchar(255) NOT NULL,
  `domicile` varchar(255) NOT NULL,
  `cnic` varchar(255) NOT NULL,
  `fcnic` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `relegion` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `admission_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_student`
--

INSERT INTO `registered_student` (`id`, `technology`, `full_name`, `father_name`, `gender`, `dob`, `marital_status`, `street`, `district`, `domicile`, `cnic`, `fcnic`, `batch`, `email`, `relegion`, `semester`, `session_id`, `admission_id`, `phone`, `photo`, `admission_date`) VALUES
(1, '1', 'MUHAMMAD MURTAZA', 'ZARMAN SHAH', 'Male', '23-03-2005', 'Single', 'Orakzai Agency Tehsill Ismail zaye', 'Orazkzai', 'Orakzai Agency', '', '21602-5022844-9', '2020 - 2022', 'numanchd100@gmail.com', 'Others', '2', 'Spring - 2021', 'DAN-Fa 2021-67', '0331-9150883', 'Muhammad Murtaza son of Zarman Shah.jpg', '2021/08/06'),
(2, '1', 'ATIQ UR REHMAN', 'SHAD MUHAMMAD', 'Male', '20-10-2004', 'Single', 'Kandi Sarmat Khel F.R Peshawar', 'Peshawar', 'Peshawar', '17301-5486850-9', '17301-5486850-9', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DAN-Fa 2021-58', '0310-9942243', 'Atiquue Ur Rehman son of Shad Muhammad.jpg', '2021/08/06'),
(3, '1', 'LIAQAT ALI', 'AFTAB ALI', 'Male', '07-05-2002', 'Single', 'Kahi Hassan Khel Sarmat Khel F.R Peshawar', 'Peshawar', 'Peshawar', '22501-2224447-7', '22501-2224447-7', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DAN-Fa 2021-10', '0336-4255494', 'Liaqat ali son of Aftab Ali.jpg', '2021/08/06'),
(4, '1', 'SHAFI ULLAH', 'GHAREEB ULLAH', 'Male', '08-01-1998', 'Single', 'Mian Kaly Shabqadar Tehsil & District Charsadda', 'Charsadda', 'Momand Agency', '17101-8459822-3', '17101-8459822-3', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DAN-Fa 2021-76', '0332-8805777', 'Shafi ullah son of Ghareeb Ullah.jpg', '2021/08/06'),
(5, '1', 'WALE SHER', 'HUNAR SHER', 'Male', '11-03-2001', 'Single', 'Nahqai Charsadda Road Peshawar', 'Peshawar', 'Peshawar', '17301-8455185-1', '17301-8455185-1', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DAN-Fa 2021-19', '0300-5868338', 'Wali Sher son of Hunar Sher.jpg', '2021/08/06'),
(6, '1', 'LAIQ UR  REHMAN', 'GUL REHMAN', 'Male', '18-04-2001', 'Single', 'Janakor Ghazi Khel Peshawar', 'Peshawar', 'FR peshawar', '', '17505-8799624-5', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DAN-Fa 2021-73', '0335-9516695', 'Liaq Ur Rehman son of Gul rehman.jpg', '2021/08/06'),
(7, '1', 'SYED WASEEM HAIDER', 'SYED MIR HUSSAIN', 'Male', '20-09-2002', 'Single', 'Parachinar Kurram agency Danngilla', 'Kurram Agency', 'Kurram Agency', '21303-1937931-5', '21303-1937931-5', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DAN-Fa 2021-19', '0303-8350174', 'Sed Waseem Haider son of Mir Hussain.jpg', '2021/08/06'),
(8, '1', 'MUHAMMAD LUQMAN', 'MUHAMMAD SHAMIM KHAN', 'Male', '02-10-2003', 'Single', 'Village Koz Sam FR Bannu', 'Bannu', 'FR BAnnu', '', '11101-1443172-1', '2020 - 2022', 'numanchd100@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DAN-Fa 2021-45', '0349-2823569', 'Muhammad Luqman son of Muhammad Shamim Khan.jpg', '2021/08/06'),
(9, '1', 'FAWAD AHMAD', 'MUHAMMAD RAFIQ', 'Male', '04-07-2002', 'Single', 'Village Bishgram maidan Dir Lower', 'Lower Dir', 'kpk', '15305-4662166-9', '15305-4662166-9', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DAN-Fa 2021-97', '0349-1223268', 'Fawad Ahmad.jpg', '2021/08/06'),
(10, '1', 'TALHA KHAN', 'WAHID ZAMAN', 'Male', '04-03-2002', 'Single', 'Mohallah Bagbanan kot doulat zai batagram ghari kapura mardan', 'Mardan', 'Mardan', '16101-6664617-5', '16101-6664617-5', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DAN-Fa 2021-12', '0311-9983551', 'Talha Khan son of Wahid Zaman.jpg', '2021/08/06'),
(11, '5', 'ASIM ULLAH', 'SAIF ULLAH KHAN', 'Male', '02-04-2004', 'Single', 'Ghari Rasheeda tarnab frrm jagra peshwar', 'Peshawar', 'Peshawar', '17301-3346628-5', '17301-3346628-5', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DRA-Fa 2021-18', '0349-7433266', 'Assim Ullah son of Saif Ullah Khan.jpg', '2021/08/06'),
(12, '5', 'MUTASIM BILLAH', 'ZAKIR ULLAH KHAN', 'Male', '13-08-2000', 'Single', 'Taru Jabba Nowshehra', 'Nowshehra', 'Nowshehra', '', '17202-0361785-3', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DRA-Fa 2021-41', '0318-5509090', 'Mutasin Billah son of Zakir Khan.jpg', '2021/08/06'),
(13, '5', 'MURAD ALI', 'FARHAD ALI', 'Male', '06-10-1997', 'Single', 'Sufaid Sang mohallah essa khel shagai bazar peshawar', 'Peshawar', 'Peshawar', '17301-7077857-3', '17301-7077857-3', '2020 - 2022', 'Zaihu390@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DRA-Fa 2021-68', '0314-9070341', 'Murad Ali son of Farhad Khan.jpg', '2021/08/06'),
(14, '5', 'UZAIR ALAM', 'IKHTIAR ALAM', 'Male', '02-04-1998', 'Single', 'Mohallah Sadram Nisatta Distrruct Charsadda', 'Charsadda', 'charsadda', '17101-1947374-1', '17101-1947374-1', '2020 - 2022', 'Uzairalam6699@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DRA-Fa 2021-43', '0314-9213642', 'Uzair Alam son of Ikhtiar Alam.jpg', '2021/08/06'),
(15, '5', 'MUHAMMAD MAQSOOD', 'MUHAMMAD ISHTIAQ', 'Male', '25-01-2004', 'Single', 'Ghari Rasheeda tarnab frrm jagra peshwar', 'Peshawar', 'Peshawar', '17301-1386586-3', '17301-1386586-3', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DRA-Fa 2021-72', '0313-9181354', 'Muhammad Maqsood son of M.Ishtiaq.jpg', '2021/08/06'),
(16, '6', 'WAQAR ALI', 'MUHAMMAD ZAHIR', 'Male', '20-05-2000', 'Single', 'Village Chappar Tehsil Warai District Dir Upper', 'Dir Upper', 'KPK', '15702-2475272-3', '15702-2475272-3', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DSR-Fa 2021-13', '0347-5558447', 'Waqar Ali son of Muhammad zahid.jpg', '2021/08/06'),
(17, '6', 'JUNAID KHAN', 'SHAHABUDDIN', 'Male', '10-05-2001', 'Single', 'Sahib Abad Tehsil waraii Dir Upper', 'Dir Upper', 'Dir Upper', '15702-8644437-1', '15702-8644437-1', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-32', '0314-5869871', 'Junaid Khan son of Shahbuddin.jpg', '2021/08/06'),
(18, '6', 'MUHAMMAD ILYAS', 'FAZLI RABBI', 'Male', '01-01-2004', 'Single', 'Daman Batagram Tehsil Shabqadar District Charsadda', 'Charsadda', 'charsadda', '17101-3496896-7', '17101-4366751-3', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-89', '0334-0985425', 'Muhammad Ilyas son of Fazli Rabbi.jpg', '2021/08/06'),
(19, '6', 'INAM UL HAQ', 'MALIK DOULAT', 'Male', '08-10-1992', 'Single', 'Wadpagga Peshawar', 'Peshawar', 'Peshawar', '17301-1191928-1', '17301-1191928-1', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-67', '0315-9716033', 'Inam Ul Haq son of Malik Doulat.jpg', '2021/08/06'),
(20, '6', 'ABDAL ZAKA', 'MALIK ZAKAULLAH KHAN', 'Male', '25-01-2000', 'Single', 'Mohallah Gulabahar wadpagga Peshwar', 'Peshawar', 'Peshawar', '17301-5102850-7', '17301-5102850-7', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-53', '0344-9160294', 'Abdul Zaka son of Malik Zaka Ullah.jpg', '2021/08/06'),
(21, '6', 'MUHAMMAD ADNAN', 'FAYYAZ KHAN', 'Male', '15-10-1993', 'Single', 'Machine Chowk Tarnab Farm Peshwar', 'Peshawar', 'Peshawar', '17301-4899350-3', '17301-4899350-3', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '1', 'Fall - 2020', 'DSR-Fa 2021-68', '0333-9310536', 'Muhammad Adnan son of Fayaz Khan.jpg', '2021/08/06'),
(22, '6', 'MUHAMMAD LUQMAN', 'SHER ZAMAN', 'Male', '01-03-2003', 'Single', 'Palam Usherai Upper dir', 'Dir Upper', 'upper dir', '15701-2452302-5', '15701-4664887-7', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-83', '0308-5737323', 'Muhammad Luqman son of Sher Zaman.jpg', '2021/08/06'),
(23, '6', 'SYED JUNAID ALI SHAH', 'SYED SHER MUHAMMAD SHAH', 'Male', '18-03-2003', 'Single', 'Mohallah Khuda Khel Badbera Peshwar', 'Peshawar', 'Peshawar', '17301-7357587-9', '17301-7357587-9', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-88', '0346-9004796', 'Syed Junaid Ali Shah son of Syed Sher Ali Shah.jpg', '2021/08/06'),
(24, '6', 'ABUZAR', 'ZABEEH ULLAH', 'Male', '06-05-2002', 'Single', 'Zargar Abad Yaka toot Peshawar', 'Peshawar', 'Peshawar', '17301-6827570-7', '17301-1943894-1', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-60', '0332-9242250', 'Abu zar son of zabeeh Ullah.jpg', '2021/08/06'),
(25, '6', 'WASI ULLAH', 'HABIB ULLAH', 'Male', '06-10-1995', 'Single', 'Mohallah Morai payan Chitral', 'Chitral', 'Chitral', '15201-7513568-1', '15201-7513568-1', '2020 - 2022', 'numanchd47@gmail.com', 'ISLAM', '2', 'Spring - 2021', 'DSR-Fa 2021-19', '0348-7776725', 'Wasi Ullah son of Habib Ullah.jpg', '2021/08/06');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(1, 'First Semester'),
(2, 'Second Semester'),
(3, 'Third Semester'),
(4, 'Fourth Semester');

-- --------------------------------------------------------

--
-- Table structure for table `semester_fee`
--

CREATE TABLE `semester_fee` (
  `id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `semester_id` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `exame_fee` varchar(255) NOT NULL,
  `reg_fee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester_fee`
--

INSERT INTO `semester_fee` (`id`, `session_id`, `semester_id`, `batch`, `amount`, `exame_fee`, `reg_fee`) VALUES
(1, 1, '1', '2020 - 2022', '24000', '0', '0'),
(2, 2, '2', '2020 - 2022', '16000', '0', '0'),
(3, 2, '2', '2020 - 2022', '', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `batch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `batch`) VALUES
(1, 'Fall - 2020', '2020 - 2022'),
(2, 'Spring - 2021', 'Select Batch Please');

-- --------------------------------------------------------

--
-- Table structure for table `student_submitted_fee`
--

CREATE TABLE `student_submitted_fee` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `batch` varchar(255) NOT NULL,
  `submitted_fee` varchar(255) NOT NULL,
  `concision` varchar(255) NOT NULL,
  `submission_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_submitted_fee`
--

INSERT INTO `student_submitted_fee` (`id`, `student_id`, `semester_id`, `session_id`, `batch`, `submitted_fee`, `concision`, `submission_date`) VALUES
(1, 5, 1, 1, '', '5000', '0', '2021-08-06'),
(2, 5, 1, 1, '', '15000', '0', '2021-08-06'),
(3, 3, 1, 1, '', '7000', '0', '2021-08-06'),
(4, 3, 1, 1, '', '15000', '0', '2021-08-06'),
(5, 14, 1, 1, '', '5500', '0', '2021-08-07'),
(6, 10, 1, 1, '', '3500', '0', '2021-08-07'),
(7, 7, 1, 1, '', '22000', '0', '2021-08-07'),
(8, 8, 1, 1, '', '20000', '0', '2021-08-07'),
(9, 2, 1, 1, '', '17500', '0', '2021-08-07'),
(10, 1, 1, 1, '', '20000', '0', '2021-08-07'),
(11, 6, 1, 1, '', '6000', '0', '2021-08-07'),
(12, 4, 1, 1, '', '16500', '0', '2021-08-07'),
(13, 9, 1, 1, '', '21500', '0', '2021-08-07'),
(14, 11, 1, 1, '', '5000', '0', '2021-08-07'),
(15, 12, 1, 1, '', '20000', '0', '2021-08-07'),
(16, 13, 1, 1, '', '20000', '0', '2021-08-07'),
(17, 15, 1, 1, '', '11000', '0', '2021-08-07'),
(18, 16, 1, 1, '', '1500', '0', '2021-08-07'),
(19, 25, 1, 1, '', '20000', '0', '2021-08-07'),
(20, 17, 1, 1, '', '22000', '0', '2021-08-07'),
(21, 20, 1, 1, '', '11000', '0', '2021-08-07'),
(22, 24, 1, 1, '', '21000', '0', '2021-08-07'),
(23, 19, 1, 1, '', '11000', '0', '2021-08-07'),
(24, 21, 1, 1, '', '5000', '0', '2021-08-07'),
(25, 22, 1, 1, '', '23000', '0', '2021-08-07'),
(26, 23, 1, 1, '', '21000', '0', '2021-08-07'),
(27, 18, 1, 1, '', '20000', '0', '2021-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `id` int(11) NOT NULL,
  `technology` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`id`, `technology`) VALUES
(1, 'Anesthesia'),
(2, 'Dental'),
(3, 'Health'),
(4, 'Pathology'),
(5, 'Radiology'),
(6, 'Surgical');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concissions`
--
ALTER TABLE `concissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital`
--
ALTER TABLE `marital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prospectus_fee`
--
ALTER TABLE `prospectus_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_student`
--
ALTER TABLE `registered_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester_fee`
--
ALTER TABLE `semester_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_submitted_fee`
--
ALTER TABLE `student_submitted_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `concissions`
--
ALTER TABLE `concissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marital`
--
ALTER TABLE `marital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prospectus_fee`
--
ALTER TABLE `prospectus_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registered_student`
--
ALTER TABLE `registered_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semester_fee`
--
ALTER TABLE `semester_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_submitted_fee`
--
ALTER TABLE `student_submitted_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
