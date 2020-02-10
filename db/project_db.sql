-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2020 at 03:54 AM
-- Server version: 5.7.12
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincouncil_announcement_isread_table`
--

CREATE TABLE `admincouncil_announcement_isread_table` (
  `admincouncilReadID` int(6) NOT NULL,
  `adminID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincouncil_announcement_isread_table`
--

INSERT INTO `admincouncil_announcement_isread_table` (`admincouncilReadID`, `adminID`, `council_announcementID`) VALUES
(6, 3, 25),
(7, 4, 25);

-- --------------------------------------------------------

--
-- Table structure for table `admincsc_announcement_isread_table`
--

CREATE TABLE `admincsc_announcement_isread_table` (
  `admincsc_announcementID` int(6) NOT NULL,
  `adminID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admincsc_announcement_isread_table`
--

INSERT INTO `admincsc_announcement_isread_table` (`admincsc_announcementID`, `adminID`, `csc_announcementID`) VALUES
(1, 3, 1),
(2, 3, 4),
(3, 3, 5),
(4, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `admindepartment_announcement_isread_table`
--

CREATE TABLE `admindepartment_announcement_isread_table` (
  `admindepartmentReadId` int(6) NOT NULL,
  `adminID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindepartment_announcement_isread_table`
--

INSERT INTO `admindepartment_announcement_isread_table` (`admindepartmentReadId`, `adminID`, `DannouncementID`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminsocial_announcement_isread_table`
--

CREATE TABLE `adminsocial_announcement_isread_table` (
  `adminsocial_announcementID` int(6) NOT NULL,
  `adminID` int(6) DEFAULT NULL,
  `social_announcementID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminsocial_announcement_isread_table`
--

INSERT INTO `adminsocial_announcement_isread_table` (`adminsocial_announcementID`, `adminID`, `social_announcementID`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_account_table`
--

CREATE TABLE `admin_account_table` (
  `adminID` int(10) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_account_table`
--

INSERT INTO `admin_account_table` (`adminID`, `username`, `password`) VALUES
(3, 'admin', 'admin'),
(4, 'admins', 'ss'),
(5, 'awawa//\'\'', '123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_account_view`
-- (See below for the actual view)
--
CREATE TABLE `admin_account_view` (
`adminID` int(10)
,`username` varchar(60)
,`password` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adminId` int(6) NOT NULL,
  `credentialId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adminId`, `credentialId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_view`
-- (See below for the actual view)
--
CREATE TABLE `admin_view` (
`adminId` int(6)
,`credentialId` int(6)
,`username` varchar(60)
,`password` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_social_report_view`
-- (See below for the actual view)
--
CREATE TABLE `all_social_report_view` (
`stdsocialID` int(6)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`accID` int(6)
,`StudentID` int(10)
,`socialClubId` int(6)
,`socialClubName` varchar(60)
,`socialClubcode` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `buttontoggle_table`
--

CREATE TABLE `buttontoggle_table` (
  `showID` int(6) NOT NULL,
  `toggleonoroff` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buttontoggle_table`
--

INSERT INTO `buttontoggle_table` (`showID`, `toggleonoroff`) VALUES
(1, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_table`
--

CREATE TABLE `calendar_table` (
  `calendarID` int(6) NOT NULL,
  `calendarIMGname` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar_table`
--

INSERT INTO `calendar_table` (`calendarID`, `calendarIMGname`) VALUES
(1, 'img/b9ff71daaf8c5db2304ec5adcb52e9d6calendar.png');

-- --------------------------------------------------------

--
-- Table structure for table `club_position_table`
--

CREATE TABLE `club_position_table` (
  `positionID` int(11) NOT NULL,
  `positionName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_position_table`
--

INSERT INTO `club_position_table` (`positionID`, `positionName`) VALUES
(1, 'President'),
(2, 'Vice President'),
(3, 'Secretary'),
(4, 'Asst.Secretary'),
(5, 'Treasurer'),
(6, 'Auditor'),
(7, 'Business Manager'),
(8, 'P.R.O'),
(9, 'P.C.O'),
(10, '1st Year REP'),
(11, '2nd Year REP'),
(12, '3rd Year REP'),
(13, '4th Year REP'),
(14, '5th year REP'),
(15, 'Mayor'),
(16, 'Vice Mayor'),
(17, 'Historian'),
(18, 'V-PRES.for Academics'),
(19, 'V-PRES.for Non-Acad'),
(20, 'General Secretary'),
(21, 'V-PRES.for Finance'),
(22, 'V-PRES.for Membership'),
(23, 'V-PRES.for Communication'),
(24, 'V-PRES.for Graphics & Pub'),
(25, 'Regional Representative'),
(26, 'Chairperson'),
(27, 'Vice Chairperson for Church involvement'),
(28, 'Vice Chairperson for Formation'),
(29, 'Vice Chairperson for Social Apostolate'),
(30, 'Executive Assistant'),
(31, 'Finance Officer'),
(32, 'Com.Officer'),
(33, 'Operations Manager'),
(34, 'Ambassador'),
(35, 'Editor in Chief'),
(36, 'Associate Editor'),
(37, 'Managing Editor'),
(38, 'Cartoonist'),
(39, 'Lay-out Artist');

-- --------------------------------------------------------

--
-- Table structure for table `councilreject_announcement_table`
--

CREATE TABLE `councilreject_announcement_table` (
  `council_rejectID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `councilreject_announcement_table`
--

INSERT INTO `councilreject_announcement_table` (`council_rejectID`, `stprofID`, `council_announcementID`, `CounID`, `isApproved`) VALUES
(12, 12, 25, 1, 'Reject'),
(13, 17, 25, 1, 'Reject'),
(14, 12, 26, 1, 'Reject'),
(15, 25, 25, 1, 'Reject'),
(16, 25, 26, 1, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `council_announcement_isread_table`
--

CREATE TABLE `council_announcement_isread_table` (
  `council_announcementReadID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `council_announcementID` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `council_announcement_isread_table`
--

INSERT INTO `council_announcement_isread_table` (`council_announcementReadID`, `stprofID`, `council_announcementID`, `CounID`, `isApproved`) VALUES
(1, 19, 27, 2, 'Yes'),
(2, 12, 28, 1, 'Yes'),
(3, 25, 28, 1, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `council_announcement_table`
--

CREATE TABLE `council_announcement_table` (
  `council_announcementID` int(6) NOT NULL,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `CounID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `council_announcement_table`
--

INSERT INTO `council_announcement_table` (`council_announcementID`, `dateSubmit`, `toWhom`, `message`, `CounID`, `isApproved`, `timeStart`, `timeEnd`, `subjectann`, `venueID`, `annreason`) VALUES
(25, '2019-09-08 11:39:28', 'sadasd', 'ads', 1, 'Reject', '2019-09-10 10:00:00', '2019-09-10 11:00:00', 'asdad', 9, 'the date is expired'),
(26, '2019-09-12 06:03:09', 'sd', 'awds', 1, 'Reject', '2019-09-12 14:30:00', '2019-09-12 15:30:00', 'dsd', 9, ''),
(27, '2020-01-29 01:54:45', 'sadd', 'asdda', 2, 'Yes', '2020-01-29 22:30:00', '2020-01-29 23:30:00', 'adsad', 8, NULL),
(28, '2020-02-10 09:25:33', 'asdad', 'asdadad', 1, 'Yes', '2020-02-14 10:30:00', '2020-02-14 11:30:00', 'adasda', 8, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `council_club_announcement_view`
-- (See below for the actual view)
--
CREATE TABLE `council_club_announcement_view` (
`council_announcementID` int(6)
,`dateSubmit` datetime
,`toWhom` varchar(100)
,`message` text
,`CounID` int(6)
,`CounName` varchar(60)
,`isApproved` varchar(10)
,`timeStart` datetime
,`timeEnd` datetime
,`subjectann` varchar(100)
,`venueID` int(6)
,`venueName` varchar(60)
,`annreason` text
);

-- --------------------------------------------------------

--
-- Table structure for table `council_officers_table`
--

CREATE TABLE `council_officers_table` (
  `councilID` int(6) NOT NULL,
  `CounID` int(6) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `positionIDcouncil` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `council_officers_table`
--

INSERT INTO `council_officers_table` (`councilID`, `CounID`, `stprofID`, `positionIDcouncil`, `perpost`) VALUES
(55, 2, 18, 3, 'No'),
(61, 3, 23, 3, 'No'),
(65, 1, 17, 6, 'No'),
(66, 1, 25, 1, 'Yes'),
(67, 2, 19, 6, 'Yes'),
(68, 1, 12, 2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `council_position_table`
--

CREATE TABLE `council_position_table` (
  `positionIDcouncil` int(6) NOT NULL,
  `positionNamecouncil` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `council_position_table`
--

INSERT INTO `council_position_table` (`positionIDcouncil`, `positionNamecouncil`) VALUES
(1, 'Mayor'),
(2, 'Vice Mayor'),
(3, 'Ass.Sec'),
(4, 'Treasurer'),
(5, 'Auditor'),
(6, 'Bus.Mngr'),
(7, 'P.R.O'),
(8, 'P.C.O.S');

-- --------------------------------------------------------

--
-- Stand-in structure for view `council_report_view`
-- (See below for the actual view)
--
CREATE TABLE `council_report_view` (
`councilID` int(6)
,`CounID` int(6)
,`CounName` varchar(60)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`accID` int(6)
,`StudentID` int(10)
,`positionIDcouncil` int(6)
,`positionNamecouncil` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `council_table`
--

CREATE TABLE `council_table` (
  `CounID` int(6) NOT NULL,
  `CounName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `council_table`
--

INSERT INTO `council_table` (`CounID`, `CounName`) VALUES
(1, 'CAS-ED Council'),
(2, 'CBTV Council'),
(3, 'Nursing Council');

-- --------------------------------------------------------

--
-- Stand-in structure for view `council_view`
-- (See below for the actual view)
--
CREATE TABLE `council_view` (
`councilID` int(6)
,`CounID` int(6)
,`CounName` varchar(60)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`positionIDcouncil` int(6)
,`positionNamecouncil` varchar(60)
,`perpost` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `course_table`
--

CREATE TABLE `course_table` (
  `CourseID` int(6) NOT NULL,
  `CourseName` varchar(60) DEFAULT NULL,
  `departmentClubId` int(6) DEFAULT NULL,
  `CounID` int(6) DEFAULT NULL,
  `coursecode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_table`
--

INSERT INTO `course_table` (`CourseID`, `CourseName`, `departmentClubId`, `CounID`, `coursecode`) VALUES
(1, 'Bachelor of Science in Computer Science', 1, 1, 'BSCS'),
(4, 'Bachelor of Science  in Nursing', 7, 3, 'BSN'),
(6, 'Bachelor of Science in Hospitality Management', 4, 2, 'BSHM'),
(7, 'Bachelor of Science in Computer Engineering', 2, 1, 'BSCPE');

-- --------------------------------------------------------

--
-- Stand-in structure for view `course_view`
-- (See below for the actual view)
--
CREATE TABLE `course_view` (
`CourseID` int(6)
,`CourseName` varchar(60)
,`coursecode` varchar(20)
,`departmentClubId` int(6)
,`CounID` int(6)
,`departmentClubName` varchar(60)
,`CounName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `credential_table`
--

CREATE TABLE `credential_table` (
  `credentialId` int(6) NOT NULL,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential_table`
--

INSERT INTO `credential_table` (`credentialId`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'testing', 'adminako');

-- --------------------------------------------------------

--
-- Table structure for table `cscannouncement_read_table`
--

CREATE TABLE `cscannouncement_read_table` (
  `cscreadID` int(10) NOT NULL,
  `csc_announcementID` int(10) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  `stprofID` int(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cscreject_announcement_table`
--

CREATE TABLE `cscreject_announcement_table` (
  `csc_rejectID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cscreject_announcement_table`
--

INSERT INTO `cscreject_announcement_table` (`csc_rejectID`, `stprofID`, `csc_announcementID`, `isApproved`) VALUES
(1, 12, 3, 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `csc_announcement_click_table`
--

CREATE TABLE `csc_announcement_click_table` (
  `csc_annClickID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  `clicked` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `csc_announcement_isread_table`
--

CREATE TABLE `csc_announcement_isread_table` (
  `csc_announcementReadID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `csc_announcementID` int(6) DEFAULT NULL,
  `isApproved` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csc_announcement_isread_table`
--

INSERT INTO `csc_announcement_isread_table` (`csc_announcementReadID`, `stprofID`, `csc_announcementID`, `isApproved`) VALUES
(1, 12, 1, 'Yes'),
(2, 16, 1, 'Yes'),
(3, 12, 2, 'Yes'),
(4, 16, 2, 'Yes'),
(5, 17, 1, 'Yes'),
(6, 14, 1, 'Yes'),
(7, 20, 1, 'Yes'),
(8, 20, 2, 'Yes'),
(9, 21, 1, 'Yes'),
(10, 21, 2, 'Yes'),
(11, 22, 1, 'Yes'),
(12, 23, 1, 'Yes'),
(13, 23, 2, 'Yes'),
(14, 25, 1, 'Yes'),
(15, 25, 2, 'Yes'),
(16, 15, 1, 'Yes'),
(17, 15, 2, 'Yes'),
(18, 19, 1, 'Yes'),
(19, 19, 2, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `csc_announcement_table`
--

CREATE TABLE `csc_announcement_table` (
  `csc_announcementID` int(6) NOT NULL,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csc_announcement_table`
--

INSERT INTO `csc_announcement_table` (`csc_announcementID`, `dateSubmit`, `toWhom`, `message`, `isApproved`, `timeStart`, `timeEnd`, `subjectann`, `venueID`, `annreason`) VALUES
(1, '2019-09-24 03:09:25', 'adsda', 'adsad', 'Yes', '2019-09-25 10:00:00', '2019-09-25 11:00:00', 'adada', 8, NULL),
(2, '2019-10-04 04:10:14', 'sdada', 'aw', 'Yes', '2019-10-04 10:30:00', '2019-10-04 10:30:00', 'adada', 8, NULL),
(3, '2020-01-28 12:27:51', 'aw`````', 'aw\'\'\'\'', 'Reject', '2020-02-14 10:30:00', '2020-02-14 09:30:00', 'aw11```\'\'\'\'', 8, 'expire'),
(4, '2020-01-28 12:29:20', 'awasd', 'asdad', 'No', '2020-01-28 10:30:00', '2020-01-28 11:30:00', 'sadad', 8, NULL),
(5, '2020-01-28 12:48:59', 'asadd', 'asdad', 'No', '2020-01-28 10:00:00', '2020-01-28 10:00:00', 'dsdsd', 8, NULL),
(6, '2020-02-10 08:24:36', 'ASDASDA````', 'AWASA````1``````\'\'\'\'\'\'\'', 'No', '2020-02-15 15:30:00', '2020-02-15 16:30:00', 'ASDADAD````', 8, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `csc_announcement_view`
-- (See below for the actual view)
--
CREATE TABLE `csc_announcement_view` (
`csc_announcementID` int(6)
,`dateSubmit` datetime
,`toWhom` varchar(100)
,`message` text
,`isApproved` varchar(10)
,`timeStart` datetime
,`timeEnd` datetime
,`subjectann` varchar(100)
,`venueName` varchar(60)
,`venueID` int(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `csc_members_table`
--

CREATE TABLE `csc_members_table` (
  `cscmemID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `positionIDcsc` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csc_members_table`
--

INSERT INTO `csc_members_table` (`cscmemID`, `stprofID`, `positionIDcsc`, `perpost`) VALUES
(26, 12, 2, 'Yes'),
(27, 19, 6, 'No'),
(28, 24, 9, 'No');

-- --------------------------------------------------------

--
-- Stand-in structure for view `csc_mem_view`
-- (See below for the actual view)
--
CREATE TABLE `csc_mem_view` (
`cscmemID` int(6)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`positionIDcsc` int(6)
,`positionNamecsc` varchar(60)
,`perpost` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `csc_officers_view`
-- (See below for the actual view)
--
CREATE TABLE `csc_officers_view` (
`cscmemID` int(6)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`accID` int(6)
,`StudentID` int(10)
,`positionIDcsc` int(6)
,`positionNamecsc` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `csc_position_table`
--

CREATE TABLE `csc_position_table` (
  `positionIDcsc` int(6) NOT NULL,
  `positionNamecsc` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `csc_position_table`
--

INSERT INTO `csc_position_table` (`positionIDcsc`, `positionNamecsc`) VALUES
(1, 'President'),
(2, 'Vice President'),
(3, 'Secretary'),
(4, 'Asst. Secretary'),
(5, 'Treasurer'),
(6, 'Auditor'),
(7, 'Bus.Mngr'),
(8, 'P.R.O'),
(9, 'P.C.O');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmental_club_announcement_view`
-- (See below for the actual view)
--
CREATE TABLE `departmental_club_announcement_view` (
`DannouncementID` int(6)
,`dateSubmit` datetime
,`toWhom` varchar(100)
,`message` text
,`departmentClubId` int(6)
,`departmentClubName` varchar(60)
,`isApproved` varchar(10)
,`timeStart` datetime
,`timeEnd` datetime
,`subjectann` varchar(100)
,`venueID` int(6)
,`venueName` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `departmental_club_table`
--

CREATE TABLE `departmental_club_table` (
  `departmentClubId` int(6) NOT NULL,
  `departmentClubName` varchar(60) DEFAULT NULL,
  `departmentcode` varbinary(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_club_table`
--

INSERT INTO `departmental_club_table` (`departmentClubId`, `departmentClubName`, `departmentcode`) VALUES
(1, 'Philippine Society of Information Technology Students', 0x5053495453),
(2, 'Institute of Computer Engineers of the Philippines S.E', 0x494345502e7365),
(4, 'Junior Hoteliers and Restaurateurs Association', 0x4a485241),
(6, ' Mathematics Club ', 0x204d4320),
(7, ' Philippine Nursing Student Association ', 0x20504e534120);

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmental_club_view`
-- (See below for the actual view)
--
CREATE TABLE `departmental_club_view` (
`departmentClubId` int(6)
,`departmentClubName` varchar(60)
,`departmentcode` varbinary(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `departmental_officersandmembers_table`
--

CREATE TABLE `departmental_officersandmembers_table` (
  `departmentmemID` int(6) NOT NULL,
  `departmentClubId` int(6) DEFAULT NULL,
  `positionIDdepartmental` int(6) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_officersandmembers_table`
--

INSERT INTO `departmental_officersandmembers_table` (`departmentmemID`, `departmentClubId`, `positionIDdepartmental`, `stprofID`, `perpost`) VALUES
(1, 1, 1, 12, 'Yes'),
(12, 2, 13, 16, 'Yes'),
(13, 2, 6, 15, 'No');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmental_officersandmembers_view`
-- (See below for the actual view)
--
CREATE TABLE `departmental_officersandmembers_view` (
`departmentmemID` int(6)
,`departmentClubId` int(6)
,`departmentClubName` varchar(60)
,`positionIDdepartmental` int(6)
,`positionNameDP` varchar(60)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`perpost` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `departmental_position_table`
--

CREATE TABLE `departmental_position_table` (
  `positionIDdepartmental` int(6) NOT NULL,
  `positionNameDP` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmental_position_table`
--

INSERT INTO `departmental_position_table` (`positionIDdepartmental`, `positionNameDP`) VALUES
(1, 'Mayor'),
(2, 'Vice Mayor'),
(3, 'Secretary'),
(4, 'Asst.Sec'),
(5, 'Treasurer'),
(6, 'Auditor'),
(7, 'P.R.O'),
(8, 'Bus.Mngr'),
(9, 'P.C.O.S'),
(10, '1st Year Rep'),
(11, '3rd Year Rep'),
(12, '4th Year Rep'),
(13, 'Historian'),
(14, 'President'),
(15, 'V-President. For Academics'),
(16, 'V-Pres. For Non-Acad.'),
(17, 'General Secretary'),
(18, 'V-Pres. For Finance'),
(19, 'V-Pres. For Membership'),
(20, 'V-Pres. For Communication'),
(21, 'VI-Pres. For Graphics & Pub.'),
(22, 'Regional Rep');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmental_report_view`
-- (See below for the actual view)
--
CREATE TABLE `departmental_report_view` (
`departmentmemID` int(6)
,`departmentClubId` int(6)
,`departmentClubName` varchar(60)
,`positionIDdepartmental` int(6)
,`positionNameDP` varchar(60)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`accID` int(6)
,`StudentID` int(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `departmentreject_announcement_table`
--

CREATE TABLE `departmentreject_announcement_table` (
  `Dannouncement_rejectID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL,
  `departmentClubID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_announcement_isread_table`
--

CREATE TABLE `department_announcement_isread_table` (
  `dpannouncementIsReadID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `DannouncementID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL,
  `departmentClubId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department_announcement_table`
--

CREATE TABLE `department_announcement_table` (
  `DannouncementID` int(6) NOT NULL,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `departmentClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `annreason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_announcement_table`
--

INSERT INTO `department_announcement_table` (`DannouncementID`, `dateSubmit`, `toWhom`, `message`, `departmentClubId`, `isApproved`, `timeStart`, `timeEnd`, `subjectann`, `venueID`, `annreason`) VALUES
(1, '2020-02-10 09:26:28', 'asdadadfffdf', 'asdada', 1, 'No', '2020-02-14 10:30:00', '2020-02-14 11:30:00', 'fdffgfgfdg', 8, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dsa_announcement_isread_table`
--

CREATE TABLE `dsa_announcement_isread_table` (
  `dsaAnnouncementIsReadID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `dsaAnnouncementID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsa_announcement_isread_table`
--

INSERT INTO `dsa_announcement_isread_table` (`dsaAnnouncementIsReadID`, `stprofID`, `dsaAnnouncementID`) VALUES
(27, 12, 6),
(28, 16, 6),
(29, 19, 6),
(30, 18, 6),
(31, 12, 7),
(32, 16, 7),
(33, 17, 6),
(34, 14, 6),
(35, 20, 6),
(36, 20, 7),
(37, 21, 6),
(38, 21, 7),
(39, 22, 6),
(40, 23, 6),
(41, 23, 7),
(42, 25, 6),
(43, 25, 7),
(44, 15, 6),
(45, 15, 7),
(46, 19, 7);

-- --------------------------------------------------------

--
-- Table structure for table `dsa_announcement_table`
--

CREATE TABLE `dsa_announcement_table` (
  `dsaAnnouncementID` int(6) NOT NULL,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `isApproved` varchar(3) DEFAULT 'Yes',
  `venueID` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsa_announcement_table`
--

INSERT INTO `dsa_announcement_table` (`dsaAnnouncementID`, `dateSubmit`, `toWhom`, `message`, `timeStart`, `timeEnd`, `subjectann`, `isApproved`, `venueID`) VALUES
(6, '2019-09-08 11:36:27', 'aw', 'aw', '2019-09-10 09:00:00', '2019-09-09 10:00:00', 'aw', 'Yes', 8),
(7, '2019-10-04 03:41:58', 'to all ngongo', 'sawasdad', '2019-10-04 22:30:00', '2019-10-04 23:30:00', 'test', 'Yes', 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dsa_announcement_view`
-- (See below for the actual view)
--
CREATE TABLE `dsa_announcement_view` (
`dsaAnnouncementID` int(6)
,`dateSubmit` datetime
,`toWhom` varchar(100)
,`message` text
,`timeStart` datetime
,`timeEnd` datetime
,`subjectann` varchar(100)
,`isApproved` varchar(3)
,`venueID` int(6)
,`venueName` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_social_club_view`
-- (See below for the actual view)
--
CREATE TABLE `list_social_club_view` (
`stdsocialID` int(6)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`CourseID` int(6)
,`CourseName` varchar(60)
,`socialClubId` int(6)
,`socialClubName` varchar(60)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_student_view`
-- (See below for the actual view)
--
CREATE TABLE `list_student_view` (
`stprofID` int(6)
,`lname` varchar(60)
,`fname` varchar(60)
,`mname` varchar(60)
,`address` varchar(60)
,`CourseID` int(6)
,`accID` int(6)
,`email` varchar(60)
,`pandg` varchar(60)
,`contactnum` varchar(60)
,`religion` varchar(60)
,`tribe` varchar(60)
,`birthday` date
,`gender` varchar(60)
,`CourseName` varchar(60)
,`departmentClubId` int(6)
,`CounID` int(6)
,`StudentID` int(10)
,`StudentPassword` varchar(50)
,`isDeleted` tinyint(4)
,`CounName` varchar(60)
,`departmentClubName` varchar(60)
,`departmentcode` varbinary(20)
,`fullName` varchar(182)
);

-- --------------------------------------------------------

--
-- Table structure for table `membershiptoggle_table`
--

CREATE TABLE `membershiptoggle_table` (
  `membershipID` int(6) NOT NULL,
  `toggleonoroff` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membershiptoggle_table`
--

INSERT INTO `membershiptoggle_table` (`membershipID`, `toggleonoroff`) VALUES
(1, 'ON');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `id` int(11) NOT NULL,
  `notif_msg` text,
  `notif_time` datetime DEFAULT NULL,
  `notif_repeat` int(11) DEFAULT '1' COMMENT 'schedule in minute',
  `notif_loop` int(11) DEFAULT '1',
  `publish_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(13) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif`
--

INSERT INTO `notif` (`id`, `notif_msg`, `notif_time`, `notif_repeat`, `notif_loop`, `publish_date`, `username`) VALUES
(1, 'hello, this is sample web push notification, you will redirect to seegatesite.com after click this notify', '2017-02-08 08:48:54', 1, 0, '2017-02-08 00:47:54', 'ronaldo'),
(2, 'hello, this is sample web push notification, you will redirect to seegatesite.com after click this notify', '2017-02-08 09:17:11', 1, 2, '2017-02-08 01:16:11', 'donald');

-- --------------------------------------------------------

--
-- Table structure for table `socialreject_announcement_table`
--

CREATE TABLE `socialreject_announcement_table` (
  `socialrejectID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `socialClubId` int(6) DEFAULT NULL,
  `social_announcementID` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `social_announcement_isread_table`
--

CREATE TABLE `social_announcement_isread_table` (
  `social_announcement_isread_table` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `social_announcementID` int(6) DEFAULT NULL,
  `socialClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_announcement_isread_table`
--

INSERT INTO `social_announcement_isread_table` (`social_announcement_isread_table`, `stprofID`, `social_announcementID`, `socialClubId`, `isApproved`) VALUES
(1, 12, 1, 8, 'Yes'),
(2, 19, 1, 8, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `social_announcement_table`
--

CREATE TABLE `social_announcement_table` (
  `social_announcementID` int(6) NOT NULL,
  `dateSubmit` datetime DEFAULT NULL,
  `toWhom` varchar(100) DEFAULT NULL,
  `message` text,
  `socialClubId` int(6) DEFAULT NULL,
  `isApproved` varchar(10) DEFAULT 'No',
  `timeStart` datetime DEFAULT NULL,
  `timeEnd` datetime DEFAULT NULL,
  `venueID` int(6) DEFAULT NULL,
  `subjectann` varchar(100) DEFAULT NULL,
  `annreason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_announcement_table`
--

INSERT INTO `social_announcement_table` (`social_announcementID`, `dateSubmit`, `toWhom`, `message`, `socialClubId`, `isApproved`, `timeStart`, `timeEnd`, `venueID`, `subjectann`, `annreason`) VALUES
(1, '2020-01-29 02:12:51', 'ddd', 'dsfsfs', 8, 'Yes', '2020-01-30 10:30:00', '2020-01-30 12:30:00', 9, 'dddfd', NULL),
(2, '2020-02-10 09:27:04', 'ad22d', 'asdad', 8, 'No', '2020-02-14 13:30:00', '2020-02-14 14:30:00', 8, 'dfgdfgdfghfxcxv', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `social_club_announcement_view`
-- (See below for the actual view)
--
CREATE TABLE `social_club_announcement_view` (
`social_announcementID` int(6)
,`dateSubmit` datetime
,`toWhom` varchar(100)
,`message` text
,`socialClubId` int(6)
,`socialClubName` varchar(60)
,`isApproved` varchar(10)
,`timeStart` datetime
,`timeEnd` datetime
,`venueID` int(6)
,`venueName` varchar(60)
,`subjectann` varchar(100)
,`annreason` text
);

-- --------------------------------------------------------

--
-- Table structure for table `social_club_table`
--

CREATE TABLE `social_club_table` (
  `socialClubId` int(6) NOT NULL,
  `socialClubName` varchar(60) DEFAULT NULL,
  `socialClubcode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_club_table`
--

INSERT INTO `social_club_table` (`socialClubId`, `socialClubName`, `socialClubcode`) VALUES
(4, 'Youth Servant Leaders Clubs', 'YSLC'),
(5, 'Kristiyanong Kabataan para sa Bayan', 'KKB'),
(6, 'Catechetical Guild', 'CG'),
(7, 'Muslim Students Organization', 'MSO'),
(8, 'Association of Student Personnel Assistants', 'ASPA'),
(10, 'Cantores et Sesyonistas', 'CES'),
(11, 'Junior Ecologist Movement', 'JEM'),
(12, 'Sports Club', 'SP'),
(13, 'Karate-do Club', 'KDC'),
(14, 'Peer Counselors Club', 'PCC');

-- --------------------------------------------------------

--
-- Stand-in structure for view `social_club_view`
-- (See below for the actual view)
--
CREATE TABLE `social_club_view` (
`socialClubId` int(6)
,`socialClubName` varchar(60)
,`socialClubcode` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `social_officerandmembers_table`
--

CREATE TABLE `social_officerandmembers_table` (
  `socialoffID` int(6) NOT NULL,
  `socialClubId` int(6) DEFAULT NULL,
  `positionIDsocial` int(6) DEFAULT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `perpost` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_officerandmembers_table`
--

INSERT INTO `social_officerandmembers_table` (`socialoffID`, `socialClubId`, `positionIDsocial`, `stprofID`, `perpost`) VALUES
(13, 5, 6, 16, 'Yes'),
(18, 10, 8, 24, 'No'),
(20, 8, 1, 19, 'Yes'),
(21, 8, 4, 12, 'Yes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `social_officerandmembers_view`
-- (See below for the actual view)
--
CREATE TABLE `social_officerandmembers_view` (
`socialoffID` int(6)
,`socialClubId` int(6)
,`socialClubName` varchar(60)
,`positionIDsocial` int(6)
,`positionNameSocial` varchar(60)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`perpost` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `social_position_table`
--

CREATE TABLE `social_position_table` (
  `positionIDsocial` int(6) NOT NULL,
  `positionNameSocial` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_position_table`
--

INSERT INTO `social_position_table` (`positionIDsocial`, `positionNameSocial`) VALUES
(1, 'Mayor'),
(2, 'Vice Mayor'),
(3, 'Secretary'),
(4, 'Asst.Sec'),
(5, 'Treasurer'),
(6, 'Auditor'),
(7, 'P.R.O'),
(8, 'Bus.Mngr'),
(9, 'P.C.O'),
(10, 'P.C.O.S'),
(11, 'Chairperson'),
(12, 'Vice Chairperson for Church Involement'),
(13, 'Vice Chairperson for Formation'),
(14, 'Vice Chairperson for social Apostolate'),
(15, 'Executive Assistant '),
(16, 'Finance Officer'),
(17, 'Operations Mngr'),
(18, 'Ambassador');

-- --------------------------------------------------------

--
-- Stand-in structure for view `social_reports_all_view`
-- (See below for the actual view)
--
CREATE TABLE `social_reports_all_view` (
`socialoffID` int(6)
,`socialClubId` int(6)
,`socialClubName` varchar(60)
,`socialClubcode` varchar(20)
,`positionIDsocial` int(6)
,`positionNameSocial` varchar(60)
,`stdsocialID` int(6)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`accID` int(6)
,`StudentID` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `social_reports_view`
-- (See below for the actual view)
--
CREATE TABLE `social_reports_view` (
`socialoffID` int(6)
,`socialClubId` int(6)
,`socialClubName` varchar(60)
,`socialClubcode` varchar(20)
,`positionIDsocial` int(6)
,`positionNameSocial` varchar(60)
,`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`accID` int(6)
,`StudentID` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `std_prof_view`
-- (See below for the actual view)
--
CREATE TABLE `std_prof_view` (
`stprofID` int(6)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`address` varchar(60)
,`CourseID` int(6)
,`accID` int(6)
,`StudentID` int(10)
,`StudentPassword` varchar(50)
,`isDeleted` tinyint(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `studentprofile_table`
--

CREATE TABLE `studentprofile_table` (
  `stprofID` int(6) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `CourseID` int(6) DEFAULT NULL,
  `accID` int(6) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `contactnum` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(60) DEFAULT NULL,
  `IMG` text,
  `mname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `religion` varchar(60) DEFAULT NULL,
  `tribe` varchar(60) DEFAULT NULL,
  `pandg` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentprofile_table`
--

INSERT INTO `studentprofile_table` (`stprofID`, `fname`, `address`, `CourseID`, `accID`, `email`, `contactnum`, `birthday`, `gender`, `IMG`, `mname`, `lname`, `religion`, `tribe`, `pandg`) VALUES
(12, 'Jude Jeremy', 'new tacurong city', 1, 16, 'judejeremy@gmail.com', '1', '0001-01-01', 'Male', 'img/80bb47059ac1f9cc4b1733be76d9c8268-1280x640.png', 'Sajor', 'Bilgera', 'Roman Catholic', 'Ilocanno', 'Papot style'),
(14, '3', '3', 4, 18, '3@yahoo.com', '3', '0003-03-31', 'Male', 'img/8782da00d36340883acbff43a128a6cbanime-clipart-thumbs-up-838919-1472937.png', '3', '3', '3', '3', '3'),
(15, 'aw', 'aw', 7, 17, 'aw@yahoo.com', 'aw', '0002-02-22', 'Male', 'img/efc1b7e703b00979a8b9e019d67a0f81cute_anime_girl_render_by_hyori_sama-d8v4bsq.png', 'aw', 'aw', 'aw', 'aw', 'aw'),
(16, 'john', 'purok waling waling', 7, 19, 'johnmark@yahoo.com', '12', '0012-12-12', 'Male', 'img/411e2f3c9bfd3c488c282d16b243f28666422510_2070729719887419_1279927832193007616_n.jpg', 'mark', 'rosal', 'Catholic', '12', 'tisay rosal'),
(17, '7', '7', 1, 24, '7@yahoo.com', '7', '2019-08-27', 'Male', 'img/226c70f812bef5c50a788be64ffc45e766700024_10155520710032185_6890532628449984512_n.jpg', '7', '7', '7', '7', '7'),
(18, '8', '8', 6, 25, '8@yahoo.com', '8', '2019-08-27', 'Male', 'img/549b8a45fc48435cb373bd1b5f026526706a700cbca91cf964b8fa480d6c0585.jpg', '8', '8', '8', '8', '8'),
(19, 'jaja', 'aw', 6, 26, 'awaw@gmail.com', '1234567891111', '2019-09-04', 'Male', 'img/949cc26e170646a4bc9fe4372e14269a1493574220529.png', 'jaja', 'jaja', 'aw', 'aw', 'aw'),
(20, 'ddd', 'ddd', 6, 23, 'ddd@yahoo.com', '000000000099', '2019-10-09', 'Male', 'img/d73b3f32ea49e18e337413ee4b3675221493574220529.png', 'ddd', 'ddd', 'dd', 'dd', 'dd'),
(21, 'dds', 'adsad', 6, 27, 'sadad@yahoo.com', '4545454', '2019-10-09', 'Male', 'img/47d46d727e51b0a19c066ea524a7d0aeanime-clipart-thumbs-up-838919-1472937.png', 'sdsda', 'sdada', 'adsad', 'adsad', 'sadadadsd'),
(22, 'sdsd', 'dd', 6, 28, 'dddd@yahoo.com', '12121212', '2019-10-16', 'Male', 'img/baae9717c7fdefa48f9c303686e5f0dc243891027011212.png', 'dddd', 'dddd', 'sadsd', 'sdad', 'sadasda'),
(23, 'asdad', 'sadasda', 4, 29, 'adsada@yahoo.com', '1212121', '2019-10-09', 'Male', 'img/ff02352af1182124652deb82cca51033anime-clipart-thumbs-up-838919-1472937.png', 'sdadasd', 'dasdada', 'adsad', 'asda', 'a'),
(24, 'Test', 'Test', 1, 30, 'test@gmail.com', '0912345675', '2002-02-02', 'Male', 'img/4d9f535cc21a61390cf9b896dcd6e28e1372963051355.png', 'test', 'Test', 'Catholic', 'Ilonggo', 'test t. jr'),
(25, '1', '1', 1, 31, '1@1', '1', '2020-02-01', 'Female', 'img/db3f5c3d593f692f1377617a15707bcfpnglot.com-golden-flower-png-1827436.png', '1', '1', '1', '1', '1'),
(26, 'asadad`', 'asdadada`', 1, 33, 'jsdadad@gmail.com', '3213123213122131', '2020-01-20', 'Male', 'img/75c9b34c99eb5ef8581c2f7e744d867b41990522_1842857032470539_869579651641507840_n.png', '`asadsa', 'adwdas-', 'Ed\'l Ft\'r', 't-boli', '`efdsfs');

-- --------------------------------------------------------

--
-- Table structure for table `student_account_table`
--

CREATE TABLE `student_account_table` (
  `accID` int(6) NOT NULL,
  `StudentID` int(10) DEFAULT NULL,
  `StudentPassword` varchar(50) DEFAULT NULL,
  `isDeleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account_table`
--

INSERT INTO `student_account_table` (`accID`, `StudentID`, `StudentPassword`, `isDeleted`) VALUES
(16, 1, '1', 0),
(17, 2, '2', 0),
(18, 3, '12', 0),
(19, 12, '1', 0),
(23, 4, 'aw', 1),
(24, 7, '7', 0),
(25, 8, '8', 0),
(26, 35181, 'aw', 0),
(27, 2323, 'aw', 1),
(28, 13, 'aw', 1),
(29, 5, 'aw', 0),
(30, 10, '12345', 0),
(31, 6, '1', 0),
(32, 80, '123', 0),
(33, 51, '1', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_account_view`
-- (See below for the actual view)
--
CREATE TABLE `student_account_view` (
`accID` int(6)
,`StudentID` int(10)
,`StudentPassword` varchar(50)
,`isDeleted` tinyint(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_portfolio_table`
--

CREATE TABLE `student_portfolio_table` (
  `stportfolioID` int(10) NOT NULL,
  `stprofID` int(10) DEFAULT NULL,
  `styear` varchar(60) DEFAULT NULL,
  `sem` varchar(60) DEFAULT NULL,
  `schoolyr` varchar(60) DEFAULT NULL,
  `act1` varchar(150) DEFAULT NULL,
  `rank1` varchar(20) DEFAULT NULL,
  `act2` varchar(150) DEFAULT NULL,
  `rank2` varchar(20) DEFAULT NULL,
  `act3` varchar(150) DEFAULT NULL,
  `rank3` varchar(20) DEFAULT NULL,
  `act4` varchar(150) DEFAULT NULL,
  `rank4` varchar(20) DEFAULT NULL,
  `comm1` varchar(150) DEFAULT NULL,
  `comm2` varchar(150) DEFAULT NULL,
  `comm3` varchar(150) DEFAULT NULL,
  `comm4` varchar(150) DEFAULT NULL,
  `seminar1` varchar(150) DEFAULT NULL,
  `seminar2` varchar(150) DEFAULT NULL,
  `seminar3` varchar(150) DEFAULT NULL,
  `seminar4` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_portfolio_table`
--

INSERT INTO `student_portfolio_table` (`stportfolioID`, `stprofID`, `styear`, `sem`, `schoolyr`, `act1`, `rank1`, `act2`, `rank2`, `act3`, `rank3`, `act4`, `rank4`, `comm1`, `comm2`, `comm3`, `comm4`, `seminar1`, `seminar2`, `seminar3`, `seminar4`) VALUES
(1, 12, '2nd Year', '1st Semester', '2019-2020', 'S.o days Mass dance', '1st place', 'dasda', '2nd place', '', '', '', '', 'community service', '', '', '', 'tablet', '', 'new world experience', ''),
(2, 25, '1st Year', '1st Semester', '2019-2020', 'Intrams', 'rank 2', 'mass dance', '2nd runner up', '', '', '', '', '', '', '', '', 'ha hatdog', '', '', ''),
(3, 19, '2nd Year', '1st Semester', '2019-2020', 'aw````\'\'\'\'', 'aw1`', '', '', '', '', '', '', 'awa', '', '', '', 'QWAWAW``````\'\'\'\'\'', '', '', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_portfolio_view`
-- (See below for the actual view)
--
CREATE TABLE `student_portfolio_view` (
`stportfolioID` int(10)
,`stprofID` int(10)
,`fname` varchar(60)
,`mname` varchar(60)
,`lname` varchar(60)
,`CourseID` int(6)
,`CourseName` varchar(60)
,`departmentClubId` int(6)
,`departmentClubName` varchar(60)
,`CounID` int(6)
,`CounName` varchar(60)
,`styear` varchar(60)
,`sem` varchar(60)
,`schoolyr` varchar(60)
,`act1` varchar(150)
,`rank1` varchar(20)
,`act2` varchar(150)
,`rank2` varchar(20)
,`act3` varchar(150)
,`rank3` varchar(20)
,`act4` varchar(150)
,`rank4` varchar(20)
,`comm1` varchar(150)
,`comm2` varchar(150)
,`comm3` varchar(150)
,`comm4` varchar(150)
,`seminar1` varchar(150)
,`seminar2` varchar(150)
,`seminar3` varchar(150)
,`seminar4` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_profile_table`
--

CREATE TABLE `student_profile_table` (
  `studentprofID` int(6) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `CourseID` int(6) DEFAULT NULL,
  `accID` int(6) DEFAULT NULL,
  `contactnum` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `picture` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_social_club_view`
-- (See below for the actual view)
--
CREATE TABLE `student_social_club_view` (
`stdsocialID` int(6)
,`stprofID` int(6)
,`socialClubId` int(6)
,`socialClubName` varchar(60)
,`socialClubcode` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_social_table`
--

CREATE TABLE `student_social_table` (
  `stdsocialID` int(6) NOT NULL,
  `stprofID` int(6) DEFAULT NULL,
  `socialClubId` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_social_table`
--

INSERT INTO `student_social_table` (`stdsocialID`, `stprofID`, `socialClubId`) VALUES
(12, 12, 8),
(14, 14, 8),
(15, 15, 10),
(16, 16, 5),
(18, 17, 8),
(19, 18, 6),
(20, 19, 8),
(21, 20, 13),
(22, 20, 7),
(23, 21, 11),
(24, 22, 8),
(25, 22, 11),
(27, 23, 6),
(28, 23, 8),
(29, 24, 8),
(30, 24, 10),
(31, 24, 6),
(32, 25, 4),
(33, 26, 8),
(34, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `testingtbl`
--

CREATE TABLE `testingtbl` (
  `testID` int(5) NOT NULL,
  `name` int(5) DEFAULT NULL,
  `isSend` int(5) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testingtbl`
--

INSERT INTO `testingtbl` (`testID`, `name`, `isSend`) VALUES
(10, 1, 1),
(11, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '123'),
('donald', '123'),
('ronaldo', '123'),
('messi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `venue_table`
--

CREATE TABLE `venue_table` (
  `venueID` int(6) NOT NULL,
  `venueName` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue_table`
--

INSERT INTO `venue_table` (`venueID`, `venueName`) VALUES
(8, 's-204'),
(9, 's-205');

-- --------------------------------------------------------

--
-- Structure for view `admin_account_view`
--
DROP TABLE IF EXISTS `admin_account_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_account_view`  AS  select `admin_account_table`.`adminID` AS `adminID`,`admin_account_table`.`username` AS `username`,`admin_account_table`.`password` AS `password` from `admin_account_table` ;

-- --------------------------------------------------------

--
-- Structure for view `admin_view`
--
DROP TABLE IF EXISTS `admin_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view`  AS  select `admin_table`.`adminId` AS `adminId`,`admin_table`.`credentialId` AS `credentialId`,`credential_table`.`username` AS `username`,`credential_table`.`password` AS `password` from (`admin_table` join `credential_table` on((`admin_table`.`credentialId` = `credential_table`.`credentialId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `all_social_report_view`
--
DROP TABLE IF EXISTS `all_social_report_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_social_report_view`  AS  select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode` from (((`student_social_table` join `studentprofile_table` on((`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `social_club_table` on((`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `council_club_announcement_view`
--
DROP TABLE IF EXISTS `council_club_announcement_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_club_announcement_view`  AS  select `council_announcement_table`.`council_announcementID` AS `council_announcementID`,`council_announcement_table`.`dateSubmit` AS `dateSubmit`,`council_announcement_table`.`toWhom` AS `toWhom`,`council_announcement_table`.`message` AS `message`,`council_announcement_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_announcement_table`.`isApproved` AS `isApproved`,`council_announcement_table`.`timeStart` AS `timeStart`,`council_announcement_table`.`timeEnd` AS `timeEnd`,`council_announcement_table`.`subjectann` AS `subjectann`,`council_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName`,`council_announcement_table`.`annreason` AS `annreason` from ((`council_announcement_table` join `venue_table` on((`council_announcement_table`.`venueID` = `venue_table`.`venueID`))) join `council_table` on((`council_announcement_table`.`CounID` = `council_table`.`CounID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `council_report_view`
--
DROP TABLE IF EXISTS `council_report_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_report_view`  AS  select `council_officers_table`.`councilID` AS `councilID`,`council_officers_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_officers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`council_officers_table`.`positionIDcouncil` AS `positionIDcouncil`,`council_position_table`.`positionNamecouncil` AS `positionNamecouncil` from ((((`council_officers_table` join `studentprofile_table` on((`council_officers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) join `council_table` on((`council_officers_table`.`CounID` = `council_table`.`CounID`))) join `council_position_table` on((`council_officers_table`.`positionIDcouncil` = `council_position_table`.`positionIDcouncil`))) ;

-- --------------------------------------------------------

--
-- Structure for view `council_view`
--
DROP TABLE IF EXISTS `council_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `council_view`  AS  select `council_officers_table`.`councilID` AS `councilID`,`council_officers_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`council_officers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`council_officers_table`.`positionIDcouncil` AS `positionIDcouncil`,`council_position_table`.`positionNamecouncil` AS `positionNamecouncil`,`council_officers_table`.`perpost` AS `perpost` from (((`council_officers_table` join `council_position_table` on((`council_officers_table`.`positionIDcouncil` = `council_position_table`.`positionIDcouncil`))) join `council_table` on((`council_officers_table`.`CounID` = `council_table`.`CounID`))) join `studentprofile_table` on((`council_officers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `course_view`
--
DROP TABLE IF EXISTS `course_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `course_view`  AS  select `course_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`coursecode` AS `coursecode`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`council_table`.`CounName` AS `CounName` from ((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `csc_announcement_view`
--
DROP TABLE IF EXISTS `csc_announcement_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_announcement_view`  AS  select `csc_announcement_table`.`csc_announcementID` AS `csc_announcementID`,`csc_announcement_table`.`dateSubmit` AS `dateSubmit`,`csc_announcement_table`.`toWhom` AS `toWhom`,`csc_announcement_table`.`message` AS `message`,`csc_announcement_table`.`isApproved` AS `isApproved`,`csc_announcement_table`.`timeStart` AS `timeStart`,`csc_announcement_table`.`timeEnd` AS `timeEnd`,`csc_announcement_table`.`subjectann` AS `subjectann`,`venue_table`.`venueName` AS `venueName`,`venue_table`.`venueID` AS `venueID` from (`csc_announcement_table` join `venue_table` on((`csc_announcement_table`.`venueID` = `venue_table`.`venueID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `csc_mem_view`
--
DROP TABLE IF EXISTS `csc_mem_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_mem_view`  AS  select `csc_members_table`.`cscmemID` AS `cscmemID`,`csc_members_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`csc_members_table`.`positionIDcsc` AS `positionIDcsc`,`csc_position_table`.`positionNamecsc` AS `positionNamecsc`,`csc_members_table`.`perpost` AS `perpost` from ((`csc_members_table` join `csc_position_table` on((`csc_members_table`.`positionIDcsc` = `csc_position_table`.`positionIDcsc`))) join `studentprofile_table` on((`csc_members_table`.`stprofID` = `studentprofile_table`.`stprofID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `csc_officers_view`
--
DROP TABLE IF EXISTS `csc_officers_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `csc_officers_view`  AS  select `csc_members_table`.`cscmemID` AS `cscmemID`,`csc_members_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`csc_members_table`.`positionIDcsc` AS `positionIDcsc`,`csc_position_table`.`positionNamecsc` AS `positionNamecsc` from (((`csc_members_table` join `csc_position_table` on((`csc_members_table`.`positionIDcsc` = `csc_position_table`.`positionIDcsc`))) join `studentprofile_table` on((`csc_members_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `departmental_club_announcement_view`
--
DROP TABLE IF EXISTS `departmental_club_announcement_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_announcement_view`  AS  select `department_announcement_table`.`DannouncementID` AS `DannouncementID`,`department_announcement_table`.`dateSubmit` AS `dateSubmit`,`department_announcement_table`.`toWhom` AS `toWhom`,`department_announcement_table`.`message` AS `message`,`department_announcement_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`department_announcement_table`.`isApproved` AS `isApproved`,`department_announcement_table`.`timeStart` AS `timeStart`,`department_announcement_table`.`timeEnd` AS `timeEnd`,`department_announcement_table`.`subjectann` AS `subjectann`,`department_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from ((`department_announcement_table` join `venue_table` on((`department_announcement_table`.`venueID` = `venue_table`.`venueID`))) join `departmental_club_table` on((`department_announcement_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `departmental_club_view`
--
DROP TABLE IF EXISTS `departmental_club_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_club_view`  AS  select `departmental_club_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_club_table`.`departmentcode` AS `departmentcode` from `departmental_club_table` ;

-- --------------------------------------------------------

--
-- Structure for view `departmental_officersandmembers_view`
--
DROP TABLE IF EXISTS `departmental_officersandmembers_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_officersandmembers_view`  AS  select `departmental_officersandmembers_table`.`departmentmemID` AS `departmentmemID`,`departmental_officersandmembers_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_officersandmembers_table`.`positionIDdepartmental` AS `positionIDdepartmental`,`departmental_position_table`.`positionNameDP` AS `positionNameDP`,`departmental_officersandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`departmental_officersandmembers_table`.`perpost` AS `perpost` from (((`departmental_officersandmembers_table` join `departmental_club_table` on((`departmental_officersandmembers_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `departmental_position_table` on((`departmental_officersandmembers_table`.`positionIDdepartmental` = `departmental_position_table`.`positionIDdepartmental`))) join `studentprofile_table` on((`departmental_officersandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `departmental_report_view`
--
DROP TABLE IF EXISTS `departmental_report_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmental_report_view`  AS  select `departmental_officersandmembers_table`.`departmentmemID` AS `departmentmemID`,`departmental_officersandmembers_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_officersandmembers_table`.`positionIDdepartmental` AS `positionIDdepartmental`,`departmental_position_table`.`positionNameDP` AS `positionNameDP`,`departmental_officersandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID` from ((((`studentprofile_table` join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) join `departmental_officersandmembers_table` on((`departmental_officersandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `departmental_club_table` on((`departmental_officersandmembers_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `departmental_position_table` on((`departmental_officersandmembers_table`.`positionIDdepartmental` = `departmental_position_table`.`positionIDdepartmental`))) ;

-- --------------------------------------------------------

--
-- Structure for view `dsa_announcement_view`
--
DROP TABLE IF EXISTS `dsa_announcement_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dsa_announcement_view`  AS  select `dsa_announcement_table`.`dsaAnnouncementID` AS `dsaAnnouncementID`,`dsa_announcement_table`.`dateSubmit` AS `dateSubmit`,`dsa_announcement_table`.`toWhom` AS `toWhom`,`dsa_announcement_table`.`message` AS `message`,`dsa_announcement_table`.`timeStart` AS `timeStart`,`dsa_announcement_table`.`timeEnd` AS `timeEnd`,`dsa_announcement_table`.`subjectann` AS `subjectann`,`dsa_announcement_table`.`isApproved` AS `isApproved`,`dsa_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName` from (`dsa_announcement_table` join `venue_table` on((`dsa_announcement_table`.`venueID` = `venue_table`.`venueID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `list_social_club_view`
--
DROP TABLE IF EXISTS `list_social_club_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_social_club_view`  AS  select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName` from (((`studentprofile_table` join `course_table` on((`studentprofile_table`.`CourseID` = `course_table`.`CourseID`))) join `student_social_table` on((`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `social_club_table` on((`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `list_student_view`
--
DROP TABLE IF EXISTS `list_student_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_student_view`  AS  select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`studentprofile_table`.`email` AS `email`,`studentprofile_table`.`pandg` AS `pandg`,`studentprofile_table`.`contactnum` AS `contactnum`,`studentprofile_table`.`religion` AS `religion`,`studentprofile_table`.`tribe` AS `tribe`,`studentprofile_table`.`birthday` AS `birthday`,`studentprofile_table`.`gender` AS `gender`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`course_table`.`CounID` AS `CounID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted`,`council_table`.`CounName` AS `CounName`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`departmental_club_table`.`departmentcode` AS `departmentcode`,concat(`studentprofile_table`.`lname`,' ',`studentprofile_table`.`fname`,' ',`studentprofile_table`.`mname`) AS `fullName` from ((((`course_table` join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `studentprofile_table` on((`studentprofile_table`.`CourseID` = `course_table`.`CourseID`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) where (`student_account_table`.`isDeleted` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `social_club_announcement_view`
--
DROP TABLE IF EXISTS `social_club_announcement_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_announcement_view`  AS  select `social_announcement_table`.`social_announcementID` AS `social_announcementID`,`social_announcement_table`.`dateSubmit` AS `dateSubmit`,`social_announcement_table`.`toWhom` AS `toWhom`,`social_announcement_table`.`message` AS `message`,`social_announcement_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_announcement_table`.`isApproved` AS `isApproved`,`social_announcement_table`.`timeStart` AS `timeStart`,`social_announcement_table`.`timeEnd` AS `timeEnd`,`social_announcement_table`.`venueID` AS `venueID`,`venue_table`.`venueName` AS `venueName`,`social_announcement_table`.`subjectann` AS `subjectann`,`social_announcement_table`.`annreason` AS `annreason` from ((`social_announcement_table` join `venue_table` on((`social_announcement_table`.`venueID` = `venue_table`.`venueID`))) join `social_club_table` on((`social_announcement_table`.`socialClubId` = `social_club_table`.`socialClubId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `social_club_view`
--
DROP TABLE IF EXISTS `social_club_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_club_view`  AS  select `social_club_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode` from `social_club_table` ;

-- --------------------------------------------------------

--
-- Structure for view `social_officerandmembers_view`
--
DROP TABLE IF EXISTS `social_officerandmembers_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_officerandmembers_view`  AS  select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_officerandmembers_table`.`positionIDsocial` AS `positionIDsocial`,`social_position_table`.`positionNameSocial` AS `positionNameSocial`,`social_officerandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`social_officerandmembers_table`.`perpost` AS `perpost` from (((`social_officerandmembers_table` join `studentprofile_table` on((`social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `social_position_table` on((`social_officerandmembers_table`.`positionIDsocial` = `social_position_table`.`positionIDsocial`))) join `social_club_table` on((`social_officerandmembers_table`.`socialClubId` = `social_club_table`.`socialClubId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `social_reports_all_view`
--
DROP TABLE IF EXISTS `social_reports_all_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_reports_all_view`  AS  select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode`,`social_officerandmembers_table`.`positionIDsocial` AS `positionIDsocial`,`social_position_table`.`positionNameSocial` AS `positionNameSocial`,`student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID` from (((((`student_social_table` join `studentprofile_table` on((`student_social_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `social_club_table` on((`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`))) join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) join `social_officerandmembers_table` on(((`social_officerandmembers_table`.`socialClubId` = `social_club_table`.`socialClubId`) and (`social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`)))) join `social_position_table` on((`social_officerandmembers_table`.`positionIDsocial` = `social_position_table`.`positionIDsocial`))) ;

-- --------------------------------------------------------

--
-- Structure for view `social_reports_view`
--
DROP TABLE IF EXISTS `social_reports_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `social_reports_view`  AS  select `social_officerandmembers_table`.`socialoffID` AS `socialoffID`,`social_officerandmembers_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode`,`social_officerandmembers_table`.`positionIDsocial` AS `positionIDsocial`,`social_position_table`.`positionNameSocial` AS `positionNameSocial`,`social_officerandmembers_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID` from ((((`studentprofile_table` join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) join `social_officerandmembers_table` on((`social_officerandmembers_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `social_position_table` on((`social_officerandmembers_table`.`positionIDsocial` = `social_position_table`.`positionIDsocial`))) join `social_club_table` on((`social_officerandmembers_table`.`socialClubId` = `social_club_table`.`socialClubId`))) ;

-- --------------------------------------------------------

--
-- Structure for view `std_prof_view`
--
DROP TABLE IF EXISTS `std_prof_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `std_prof_view`  AS  select `studentprofile_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`address` AS `address`,`studentprofile_table`.`CourseID` AS `CourseID`,`studentprofile_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from (`studentprofile_table` join `student_account_table` on((`studentprofile_table`.`accID` = `student_account_table`.`accID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `student_account_view`
--
DROP TABLE IF EXISTS `student_account_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_account_view`  AS  select `student_account_table`.`accID` AS `accID`,`student_account_table`.`StudentID` AS `StudentID`,`student_account_table`.`StudentPassword` AS `StudentPassword`,`student_account_table`.`isDeleted` AS `isDeleted` from `student_account_table` ;

-- --------------------------------------------------------

--
-- Structure for view `student_portfolio_view`
--
DROP TABLE IF EXISTS `student_portfolio_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_portfolio_view`  AS  select `student_portfolio_table`.`stportfolioID` AS `stportfolioID`,`student_portfolio_table`.`stprofID` AS `stprofID`,`studentprofile_table`.`fname` AS `fname`,`studentprofile_table`.`mname` AS `mname`,`studentprofile_table`.`lname` AS `lname`,`studentprofile_table`.`CourseID` AS `CourseID`,`course_table`.`CourseName` AS `CourseName`,`course_table`.`departmentClubId` AS `departmentClubId`,`departmental_club_table`.`departmentClubName` AS `departmentClubName`,`course_table`.`CounID` AS `CounID`,`council_table`.`CounName` AS `CounName`,`student_portfolio_table`.`styear` AS `styear`,`student_portfolio_table`.`sem` AS `sem`,`student_portfolio_table`.`schoolyr` AS `schoolyr`,`student_portfolio_table`.`act1` AS `act1`,`student_portfolio_table`.`rank1` AS `rank1`,`student_portfolio_table`.`act2` AS `act2`,`student_portfolio_table`.`rank2` AS `rank2`,`student_portfolio_table`.`act3` AS `act3`,`student_portfolio_table`.`rank3` AS `rank3`,`student_portfolio_table`.`act4` AS `act4`,`student_portfolio_table`.`rank4` AS `rank4`,`student_portfolio_table`.`comm1` AS `comm1`,`student_portfolio_table`.`comm2` AS `comm2`,`student_portfolio_table`.`comm3` AS `comm3`,`student_portfolio_table`.`comm4` AS `comm4`,`student_portfolio_table`.`seminar1` AS `seminar1`,`student_portfolio_table`.`seminar2` AS `seminar2`,`student_portfolio_table`.`seminar3` AS `seminar3`,`student_portfolio_table`.`seminar4` AS `seminar4` from ((((`studentprofile_table` join `course_table` on((`studentprofile_table`.`CourseID` = `course_table`.`CourseID`))) join `departmental_club_table` on((`course_table`.`departmentClubId` = `departmental_club_table`.`departmentClubId`))) join `student_portfolio_table` on((`student_portfolio_table`.`stprofID` = `studentprofile_table`.`stprofID`))) join `council_table` on((`course_table`.`CounID` = `council_table`.`CounID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `student_social_club_view`
--
DROP TABLE IF EXISTS `student_social_club_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_social_club_view`  AS  select `student_social_table`.`stdsocialID` AS `stdsocialID`,`student_social_table`.`stprofID` AS `stprofID`,`student_social_table`.`socialClubId` AS `socialClubId`,`social_club_table`.`socialClubName` AS `socialClubName`,`social_club_table`.`socialClubcode` AS `socialClubcode` from (`student_social_table` join `social_club_table` on((`student_social_table`.`socialClubId` = `social_club_table`.`socialClubId`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admincouncil_announcement_isread_table`
--
ALTER TABLE `admincouncil_announcement_isread_table`
  ADD PRIMARY KEY (`admincouncilReadID`),
  ADD KEY `FK_admincouncil_announcement_isread_table` (`council_announcementID`);

--
-- Indexes for table `admincsc_announcement_isread_table`
--
ALTER TABLE `admincsc_announcement_isread_table`
  ADD PRIMARY KEY (`admincsc_announcementID`),
  ADD KEY `FK_admincsc_announcement_isread_table` (`csc_announcementID`);

--
-- Indexes for table `admindepartment_announcement_isread_table`
--
ALTER TABLE `admindepartment_announcement_isread_table`
  ADD PRIMARY KEY (`admindepartmentReadId`),
  ADD KEY `FK_admindepartment_announcement_isread_table` (`DannouncementID`);

--
-- Indexes for table `adminsocial_announcement_isread_table`
--
ALTER TABLE `adminsocial_announcement_isread_table`
  ADD PRIMARY KEY (`adminsocial_announcementID`),
  ADD KEY `FK_adminsocial_announcement_isread_table` (`social_announcementID`);

--
-- Indexes for table `admin_account_table`
--
ALTER TABLE `admin_account_table`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adminId`),
  ADD KEY `FK_admin_table` (`credentialId`);

--
-- Indexes for table `buttontoggle_table`
--
ALTER TABLE `buttontoggle_table`
  ADD PRIMARY KEY (`showID`);

--
-- Indexes for table `calendar_table`
--
ALTER TABLE `calendar_table`
  ADD PRIMARY KEY (`calendarID`);

--
-- Indexes for table `club_position_table`
--
ALTER TABLE `club_position_table`
  ADD PRIMARY KEY (`positionID`);

--
-- Indexes for table `councilreject_announcement_table`
--
ALTER TABLE `councilreject_announcement_table`
  ADD PRIMARY KEY (`council_rejectID`),
  ADD KEY `FK_councilreject_announcement_table` (`council_announcementID`);

--
-- Indexes for table `council_announcement_isread_table`
--
ALTER TABLE `council_announcement_isread_table`
  ADD PRIMARY KEY (`council_announcementReadID`),
  ADD KEY `FK_council_announcement_isread_table` (`council_announcementID`);

--
-- Indexes for table `council_announcement_table`
--
ALTER TABLE `council_announcement_table`
  ADD PRIMARY KEY (`council_announcementID`);

--
-- Indexes for table `council_officers_table`
--
ALTER TABLE `council_officers_table`
  ADD PRIMARY KEY (`councilID`),
  ADD KEY `FK_council_officers_table` (`CounID`),
  ADD KEY `FK_council_officers_tables` (`stprofID`),
  ADD KEY `FK_council_officers_tablesd` (`positionIDcouncil`);

--
-- Indexes for table `council_position_table`
--
ALTER TABLE `council_position_table`
  ADD PRIMARY KEY (`positionIDcouncil`);

--
-- Indexes for table `council_table`
--
ALTER TABLE `council_table`
  ADD PRIMARY KEY (`CounID`);

--
-- Indexes for table `course_table`
--
ALTER TABLE `course_table`
  ADD PRIMARY KEY (`CourseID`),
  ADD KEY `FK_course_tables` (`CounID`),
  ADD KEY `FK_course_table` (`departmentClubId`);

--
-- Indexes for table `credential_table`
--
ALTER TABLE `credential_table`
  ADD PRIMARY KEY (`credentialId`);

--
-- Indexes for table `cscannouncement_read_table`
--
ALTER TABLE `cscannouncement_read_table`
  ADD PRIMARY KEY (`cscreadID`),
  ADD KEY `FK_cscannouncement_read_table` (`stprofID`),
  ADD KEY `FK_cscannouncement_read_tablexs` (`csc_announcementID`);

--
-- Indexes for table `cscreject_announcement_table`
--
ALTER TABLE `cscreject_announcement_table`
  ADD PRIMARY KEY (`csc_rejectID`),
  ADD KEY `FK_cscreject_announcement_table` (`stprofID`);

--
-- Indexes for table `csc_announcement_click_table`
--
ALTER TABLE `csc_announcement_click_table`
  ADD PRIMARY KEY (`csc_annClickID`);

--
-- Indexes for table `csc_announcement_isread_table`
--
ALTER TABLE `csc_announcement_isread_table`
  ADD PRIMARY KEY (`csc_announcementReadID`);

--
-- Indexes for table `csc_announcement_table`
--
ALTER TABLE `csc_announcement_table`
  ADD PRIMARY KEY (`csc_announcementID`);

--
-- Indexes for table `csc_members_table`
--
ALTER TABLE `csc_members_table`
  ADD PRIMARY KEY (`cscmemID`),
  ADD KEY `FK_csc_members_table` (`stprofID`),
  ADD KEY `FK_csc_members_tableds` (`positionIDcsc`);

--
-- Indexes for table `csc_position_table`
--
ALTER TABLE `csc_position_table`
  ADD PRIMARY KEY (`positionIDcsc`);

--
-- Indexes for table `departmental_club_table`
--
ALTER TABLE `departmental_club_table`
  ADD PRIMARY KEY (`departmentClubId`);

--
-- Indexes for table `departmental_officersandmembers_table`
--
ALTER TABLE `departmental_officersandmembers_table`
  ADD PRIMARY KEY (`departmentmemID`),
  ADD KEY `FK_departmental_officersandmembers_table` (`departmentClubId`),
  ADD KEY `FK_departmental_officersandmembers_tablex` (`stprofID`),
  ADD KEY `FK_departmental_officersandmembers_tabledp` (`positionIDdepartmental`);

--
-- Indexes for table `departmental_position_table`
--
ALTER TABLE `departmental_position_table`
  ADD PRIMARY KEY (`positionIDdepartmental`);

--
-- Indexes for table `departmentreject_announcement_table`
--
ALTER TABLE `departmentreject_announcement_table`
  ADD PRIMARY KEY (`Dannouncement_rejectID`),
  ADD KEY `FK_departmentreject_announcement_table` (`DannouncementID`);

--
-- Indexes for table `department_announcement_isread_table`
--
ALTER TABLE `department_announcement_isread_table`
  ADD PRIMARY KEY (`dpannouncementIsReadID`),
  ADD KEY `FK_department_announcement_isread_table` (`DannouncementID`);

--
-- Indexes for table `department_announcement_table`
--
ALTER TABLE `department_announcement_table`
  ADD PRIMARY KEY (`DannouncementID`);

--
-- Indexes for table `dsa_announcement_isread_table`
--
ALTER TABLE `dsa_announcement_isread_table`
  ADD PRIMARY KEY (`dsaAnnouncementIsReadID`),
  ADD KEY `FK_dsa_announcement_isread_table` (`dsaAnnouncementID`);

--
-- Indexes for table `dsa_announcement_table`
--
ALTER TABLE `dsa_announcement_table`
  ADD PRIMARY KEY (`dsaAnnouncementID`);

--
-- Indexes for table `membershiptoggle_table`
--
ALTER TABLE `membershiptoggle_table`
  ADD PRIMARY KEY (`membershipID`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialreject_announcement_table`
--
ALTER TABLE `socialreject_announcement_table`
  ADD PRIMARY KEY (`socialrejectID`),
  ADD KEY `FK_socialreject_announcement_table` (`social_announcementID`);

--
-- Indexes for table `social_announcement_isread_table`
--
ALTER TABLE `social_announcement_isread_table`
  ADD PRIMARY KEY (`social_announcement_isread_table`),
  ADD KEY `FK_social_announcement_isread_table` (`social_announcementID`);

--
-- Indexes for table `social_announcement_table`
--
ALTER TABLE `social_announcement_table`
  ADD PRIMARY KEY (`social_announcementID`),
  ADD KEY `FK_social_announcement_table` (`socialClubId`),
  ADD KEY `FK_social_announcement_tablesd` (`venueID`);

--
-- Indexes for table `social_club_table`
--
ALTER TABLE `social_club_table`
  ADD PRIMARY KEY (`socialClubId`);

--
-- Indexes for table `social_officerandmembers_table`
--
ALTER TABLE `social_officerandmembers_table`
  ADD PRIMARY KEY (`socialoffID`),
  ADD KEY `FK_social_officerandmembers_table` (`socialClubId`),
  ADD KEY `FK_social_officerandmembers_tablex` (`stprofID`),
  ADD KEY `FK_social_officerandmembers_tablesocial` (`positionIDsocial`);

--
-- Indexes for table `social_position_table`
--
ALTER TABLE `social_position_table`
  ADD PRIMARY KEY (`positionIDsocial`);

--
-- Indexes for table `studentprofile_table`
--
ALTER TABLE `studentprofile_table`
  ADD PRIMARY KEY (`stprofID`),
  ADD KEY `FK_studentprofileS_table` (`accID`),
  ADD KEY `FK_studentprofile_table` (`CourseID`);

--
-- Indexes for table `student_account_table`
--
ALTER TABLE `student_account_table`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `student_portfolio_table`
--
ALTER TABLE `student_portfolio_table`
  ADD PRIMARY KEY (`stportfolioID`),
  ADD KEY `FK_student_portfolio_table` (`stprofID`);

--
-- Indexes for table `student_profile_table`
--
ALTER TABLE `student_profile_table`
  ADD PRIMARY KEY (`studentprofID`);

--
-- Indexes for table `student_social_table`
--
ALTER TABLE `student_social_table`
  ADD PRIMARY KEY (`stdsocialID`),
  ADD KEY `FK_student_social_table` (`socialClubId`),
  ADD KEY `FK_student_sociasl_table` (`stprofID`);

--
-- Indexes for table `testingtbl`
--
ALTER TABLE `testingtbl`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `venue_table`
--
ALTER TABLE `venue_table`
  ADD PRIMARY KEY (`venueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admincouncil_announcement_isread_table`
--
ALTER TABLE `admincouncil_announcement_isread_table`
  MODIFY `admincouncilReadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `admincsc_announcement_isread_table`
--
ALTER TABLE `admincsc_announcement_isread_table`
  MODIFY `admincsc_announcementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `admindepartment_announcement_isread_table`
--
ALTER TABLE `admindepartment_announcement_isread_table`
  MODIFY `admindepartmentReadId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adminsocial_announcement_isread_table`
--
ALTER TABLE `adminsocial_announcement_isread_table`
  MODIFY `adminsocial_announcementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin_account_table`
--
ALTER TABLE `admin_account_table`
  MODIFY `adminID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `adminId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `buttontoggle_table`
--
ALTER TABLE `buttontoggle_table`
  MODIFY `showID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `calendar_table`
--
ALTER TABLE `calendar_table`
  MODIFY `calendarID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `club_position_table`
--
ALTER TABLE `club_position_table`
  MODIFY `positionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `councilreject_announcement_table`
--
ALTER TABLE `councilreject_announcement_table`
  MODIFY `council_rejectID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `council_announcement_isread_table`
--
ALTER TABLE `council_announcement_isread_table`
  MODIFY `council_announcementReadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `council_announcement_table`
--
ALTER TABLE `council_announcement_table`
  MODIFY `council_announcementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `council_officers_table`
--
ALTER TABLE `council_officers_table`
  MODIFY `councilID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `council_position_table`
--
ALTER TABLE `council_position_table`
  MODIFY `positionIDcouncil` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `council_table`
--
ALTER TABLE `council_table`
  MODIFY `CounID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_table`
--
ALTER TABLE `course_table`
  MODIFY `CourseID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `credential_table`
--
ALTER TABLE `credential_table`
  MODIFY `credentialId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cscannouncement_read_table`
--
ALTER TABLE `cscannouncement_read_table`
  MODIFY `cscreadID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cscreject_announcement_table`
--
ALTER TABLE `cscreject_announcement_table`
  MODIFY `csc_rejectID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `csc_announcement_click_table`
--
ALTER TABLE `csc_announcement_click_table`
  MODIFY `csc_annClickID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `csc_announcement_isread_table`
--
ALTER TABLE `csc_announcement_isread_table`
  MODIFY `csc_announcementReadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `csc_announcement_table`
--
ALTER TABLE `csc_announcement_table`
  MODIFY `csc_announcementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `csc_members_table`
--
ALTER TABLE `csc_members_table`
  MODIFY `cscmemID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `csc_position_table`
--
ALTER TABLE `csc_position_table`
  MODIFY `positionIDcsc` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `departmental_club_table`
--
ALTER TABLE `departmental_club_table`
  MODIFY `departmentClubId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `departmental_officersandmembers_table`
--
ALTER TABLE `departmental_officersandmembers_table`
  MODIFY `departmentmemID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `departmental_position_table`
--
ALTER TABLE `departmental_position_table`
  MODIFY `positionIDdepartmental` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `departmentreject_announcement_table`
--
ALTER TABLE `departmentreject_announcement_table`
  MODIFY `Dannouncement_rejectID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_announcement_isread_table`
--
ALTER TABLE `department_announcement_isread_table`
  MODIFY `dpannouncementIsReadID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_announcement_table`
--
ALTER TABLE `department_announcement_table`
  MODIFY `DannouncementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dsa_announcement_isread_table`
--
ALTER TABLE `dsa_announcement_isread_table`
  MODIFY `dsaAnnouncementIsReadID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `dsa_announcement_table`
--
ALTER TABLE `dsa_announcement_table`
  MODIFY `dsaAnnouncementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `membershiptoggle_table`
--
ALTER TABLE `membershiptoggle_table`
  MODIFY `membershipID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `socialreject_announcement_table`
--
ALTER TABLE `socialreject_announcement_table`
  MODIFY `socialrejectID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_announcement_isread_table`
--
ALTER TABLE `social_announcement_isread_table`
  MODIFY `social_announcement_isread_table` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `social_announcement_table`
--
ALTER TABLE `social_announcement_table`
  MODIFY `social_announcementID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `social_club_table`
--
ALTER TABLE `social_club_table`
  MODIFY `socialClubId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `social_officerandmembers_table`
--
ALTER TABLE `social_officerandmembers_table`
  MODIFY `socialoffID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `social_position_table`
--
ALTER TABLE `social_position_table`
  MODIFY `positionIDsocial` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `studentprofile_table`
--
ALTER TABLE `studentprofile_table`
  MODIFY `stprofID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `student_account_table`
--
ALTER TABLE `student_account_table`
  MODIFY `accID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `student_portfolio_table`
--
ALTER TABLE `student_portfolio_table`
  MODIFY `stportfolioID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_profile_table`
--
ALTER TABLE `student_profile_table`
  MODIFY `studentprofID` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_social_table`
--
ALTER TABLE `student_social_table`
  MODIFY `stdsocialID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `testingtbl`
--
ALTER TABLE `testingtbl`
  MODIFY `testID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `venue_table`
--
ALTER TABLE `venue_table`
  MODIFY `venueID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admincouncil_announcement_isread_table`
--
ALTER TABLE `admincouncil_announcement_isread_table`
  ADD CONSTRAINT `FK_admincouncil_announcement_isread_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`);

--
-- Constraints for table `admincsc_announcement_isread_table`
--
ALTER TABLE `admincsc_announcement_isread_table`
  ADD CONSTRAINT `FK_admincsc_announcement_isread_table` FOREIGN KEY (`csc_announcementID`) REFERENCES `csc_announcement_table` (`csc_announcementID`);

--
-- Constraints for table `admindepartment_announcement_isread_table`
--
ALTER TABLE `admindepartment_announcement_isread_table`
  ADD CONSTRAINT `FK_admindepartment_announcement_isread_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`);

--
-- Constraints for table `adminsocial_announcement_isread_table`
--
ALTER TABLE `adminsocial_announcement_isread_table`
  ADD CONSTRAINT `FK_adminsocial_announcement_isread_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`);

--
-- Constraints for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD CONSTRAINT `FK_admin_table` FOREIGN KEY (`credentialId`) REFERENCES `credential_table` (`credentialId`);

--
-- Constraints for table `councilreject_announcement_table`
--
ALTER TABLE `councilreject_announcement_table`
  ADD CONSTRAINT `FK_councilreject_announcement_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`);

--
-- Constraints for table `council_announcement_isread_table`
--
ALTER TABLE `council_announcement_isread_table`
  ADD CONSTRAINT `FK_council_announcement_isread_table` FOREIGN KEY (`council_announcementID`) REFERENCES `council_announcement_table` (`council_announcementID`);

--
-- Constraints for table `council_officers_table`
--
ALTER TABLE `council_officers_table`
  ADD CONSTRAINT `FK_council_officers_table` FOREIGN KEY (`CounID`) REFERENCES `council_table` (`CounID`),
  ADD CONSTRAINT `FK_council_officers_tables` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`),
  ADD CONSTRAINT `FK_council_officers_tablesd` FOREIGN KEY (`positionIDcouncil`) REFERENCES `council_position_table` (`positionIDcouncil`);

--
-- Constraints for table `course_table`
--
ALTER TABLE `course_table`
  ADD CONSTRAINT `FK_course_table` FOREIGN KEY (`departmentClubId`) REFERENCES `departmental_club_table` (`departmentClubId`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_course_tables` FOREIGN KEY (`CounID`) REFERENCES `council_table` (`CounID`);

--
-- Constraints for table `cscannouncement_read_table`
--
ALTER TABLE `cscannouncement_read_table`
  ADD CONSTRAINT `FK_cscannouncement_read_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`),
  ADD CONSTRAINT `FK_cscannouncement_read_tablexs` FOREIGN KEY (`csc_announcementID`) REFERENCES `csc_announcement_table` (`csc_announcementID`);

--
-- Constraints for table `csc_members_table`
--
ALTER TABLE `csc_members_table`
  ADD CONSTRAINT `FK_csc_members_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`),
  ADD CONSTRAINT `FK_csc_members_tableds` FOREIGN KEY (`positionIDcsc`) REFERENCES `csc_position_table` (`positionIDcsc`);

--
-- Constraints for table `departmental_officersandmembers_table`
--
ALTER TABLE `departmental_officersandmembers_table`
  ADD CONSTRAINT `FK_departmental_officersandmembers_table` FOREIGN KEY (`departmentClubId`) REFERENCES `departmental_club_table` (`departmentClubId`),
  ADD CONSTRAINT `FK_departmental_officersandmembers_tabledp` FOREIGN KEY (`positionIDdepartmental`) REFERENCES `departmental_position_table` (`positionIDdepartmental`),
  ADD CONSTRAINT `FK_departmental_officersandmembers_tablex` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`);

--
-- Constraints for table `departmentreject_announcement_table`
--
ALTER TABLE `departmentreject_announcement_table`
  ADD CONSTRAINT `FK_departmentreject_announcement_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`);

--
-- Constraints for table `department_announcement_isread_table`
--
ALTER TABLE `department_announcement_isread_table`
  ADD CONSTRAINT `FK_department_announcement_isread_table` FOREIGN KEY (`DannouncementID`) REFERENCES `department_announcement_table` (`DannouncementID`);

--
-- Constraints for table `dsa_announcement_isread_table`
--
ALTER TABLE `dsa_announcement_isread_table`
  ADD CONSTRAINT `FK_dsa_announcement_isread_table` FOREIGN KEY (`dsaAnnouncementID`) REFERENCES `dsa_announcement_table` (`dsaAnnouncementID`);

--
-- Constraints for table `socialreject_announcement_table`
--
ALTER TABLE `socialreject_announcement_table`
  ADD CONSTRAINT `FK_socialreject_announcement_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`);

--
-- Constraints for table `social_announcement_isread_table`
--
ALTER TABLE `social_announcement_isread_table`
  ADD CONSTRAINT `FK_social_announcement_isread_table` FOREIGN KEY (`social_announcementID`) REFERENCES `social_announcement_table` (`social_announcementID`);

--
-- Constraints for table `social_announcement_table`
--
ALTER TABLE `social_announcement_table`
  ADD CONSTRAINT `FK_social_announcement_table` FOREIGN KEY (`socialClubId`) REFERENCES `social_club_table` (`socialClubId`),
  ADD CONSTRAINT `FK_social_announcement_tablesd` FOREIGN KEY (`venueID`) REFERENCES `venue_table` (`venueID`);

--
-- Constraints for table `social_officerandmembers_table`
--
ALTER TABLE `social_officerandmembers_table`
  ADD CONSTRAINT `FK_social_officerandmembers_table` FOREIGN KEY (`socialClubId`) REFERENCES `social_club_table` (`socialClubId`),
  ADD CONSTRAINT `FK_social_officerandmembers_tablesocial` FOREIGN KEY (`positionIDsocial`) REFERENCES `social_position_table` (`positionIDsocial`),
  ADD CONSTRAINT `FK_social_officerandmembers_tablex` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`);

--
-- Constraints for table `studentprofile_table`
--
ALTER TABLE `studentprofile_table`
  ADD CONSTRAINT `FK_studentprofileS_table` FOREIGN KEY (`accID`) REFERENCES `student_account_table` (`accID`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_studentprofile_table` FOREIGN KEY (`CourseID`) REFERENCES `course_table` (`CourseID`) ON DELETE SET NULL;

--
-- Constraints for table `student_portfolio_table`
--
ALTER TABLE `student_portfolio_table`
  ADD CONSTRAINT `FK_student_portfolio_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`);

--
-- Constraints for table `student_social_table`
--
ALTER TABLE `student_social_table`
  ADD CONSTRAINT `FK_student_social_table` FOREIGN KEY (`socialClubId`) REFERENCES `social_club_table` (`socialClubId`),
  ADD CONSTRAINT `FK_student_sociasl_table` FOREIGN KEY (`stprofID`) REFERENCES `studentprofile_table` (`stprofID`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
