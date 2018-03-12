-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 12:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cts`
--

-- --------------------------------------------------------

--
-- Table structure for table `academicinfo`
--

CREATE TABLE IF NOT EXISTS `academicinfo` (
  `AcademicID` int(11) NOT NULL,
  `CanID` int(11) DEFAULT NULL,
  `DegreeTitle` varchar(100) DEFAULT NULL,
  `DegreeType` varchar(100) DEFAULT NULL COMMENT 'MS,BS,Matric,PHd etc',
  `MajorSubject` varchar(255) DEFAULT NULL,
  `Enrollyear` date DEFAULT NULL,
  `YearPassing` date DEFAULT NULL,
  `ObtainedMarks` decimal(10,0) DEFAULT NULL,
  `TotalMarks` decimal(10,0) DEFAULT NULL,
  `BoardUniversity` varchar(150) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Notes:` longtext,
  PRIMARY KEY (`AcademicID`),
  KEY `CanID` (`CanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicinfo`
--

INSERT INTO `academicinfo` (`AcademicID`, `CanID`, `DegreeTitle`, `DegreeType`, `MajorSubject`, `Enrollyear`, `YearPassing`, `ObtainedMarks`, `TotalMarks`, `BoardUniversity`, `Country`, `Notes:`) VALUES
(1, 3, 'software engineering', NULL, 'computer scinece', NULL, '0000-00-00', '541', '850', 'international islamic university islamabad', 'pakistan', 'nothing to report'),
(2, 3, 'faculty of comuter scinece', NULL, 'math stats', NULL, '0000-00-00', '740', '740', 'fedral board of intermediate  and secondry education', 'paksitan', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE IF NOT EXISTS `bankdetails` (
  `AccNumber` varchar(50) NOT NULL,
  `BankName` varchar(100) DEFAULT NULL,
  `BranchName` varchar(50) DEFAULT NULL,
  `Branchcode` varchar(100) NOT NULL,
  `BankLogo` varchar(50) DEFAULT NULL,
  `AccTitle` varchar(100) NOT NULL,
  `BarCodeChallan` varchar(100) NOT NULL,
  `Note` longtext,
  `CanID` int(11) DEFAULT NULL,
  PRIMARY KEY (`AccNumber`),
  UNIQUE KEY `AccNumber` (`AccNumber`),
  KEY `CanID` (`CanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`AccNumber`, `BankName`, `BranchName`, `Branchcode`, `BankLogo`, `AccTitle`, `BarCodeChallan`, `Note`, `CanID`) VALUES
('571702701', 'standard chartered', 'f7 markaz', '005714', 'img', 'current', '215487', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `candidatedetails`
--

CREATE TABLE IF NOT EXISTS `candidatedetails` (
  `CanID` int(11) NOT NULL AUTO_INCREMENT,
  `CandidateID` varchar(50) DEFAULT NULL,
  `CanRegistrationNo` varchar(100) DEFAULT NULL,
  `CanRollNumber` varchar(50) DEFAULT NULL,
  `CanPic` longtext,
  `CanFirstName` varchar(25) DEFAULT NULL,
  `CanLastName` varchar(25) DEFAULT NULL,
  `CanCNIC` double DEFAULT NULL,
  `CanPassportNo` varchar(100) DEFAULT NULL,
  `CanGender` varchar(25) DEFAULT NULL,
  `CanDOB` date DEFAULT NULL,
  `CanProvince` varchar(50) DEFAULT NULL,
  `CanDistrict` varchar(25) DEFAULT NULL,
  `CanCity` varchar(25) DEFAULT NULL,
  `CanPostalAdd` varchar(255) DEFAULT NULL,
  `CanPhNo` decimal(10,0) DEFAULT NULL,
  `CanMobile` decimal(10,0) DEFAULT NULL,
  `CanReligion` varchar(15) DEFAULT NULL,
  `CanOther` longtext,
  `CanPrefTestLoc` varchar(15) DEFAULT NULL,
  `TotalExperience` int(6) DEFAULT NULL,
  `IsFeeSubmit` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CanID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `candidatedetails`
--

INSERT INTO `candidatedetails` (`CanID`, `CandidateID`, `CanRegistrationNo`, `CanRollNumber`, `CanPic`, `CanFirstName`, `CanLastName`, `CanCNIC`, `CanPassportNo`, `CanGender`, `CanDOB`, `CanProvince`, `CanDistrict`, `CanCity`, `CanPostalAdd`, `CanPhNo`, `CanMobile`, `CanReligion`, `CanOther`, `CanPrefTestLoc`, `TotalExperience`, `IsFeeSubmit`) VALUES
(2, '336', '336525', NULL, 'hi i m alone', 'jibran', 'sohai', 2147483647, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'cad0001', '1253456987bhbhbhb', NULL, NULL, 'jibran', 'sohail', 3740681358553, NULL, 'male', '1989-11-01', NULL, 'rawapindi', 'wah cantt', NULL, '3335336952', '3335336952', 'islam', NULL, 'islamabad', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidatesignup`
--

CREATE TABLE IF NOT EXISTS `candidatesignup` (
  `CandID` int(11) NOT NULL,
  `CandEmail` varchar(100) DEFAULT NULL,
  `CandCreateDate` timestamp NULL DEFAULT NULL,
  `CandPassowrd` varchar(255) DEFAULT NULL,
  `CandReTypePassword` varchar(255) DEFAULT NULL,
  `CanID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CandID`),
  UNIQUE KEY `CanID` (`CanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `certificatedetails`
--

CREATE TABLE IF NOT EXISTS `certificatedetails` (
  `CertID` int(11) NOT NULL,
  `CertName` varchar(100) DEFAULT NULL,
  `CertInstitute` varchar(100) DEFAULT NULL,
  `CertFrom` date DEFAULT NULL,
  `CertTo` date DEFAULT NULL,
  `CertGrade` varchar(10) DEFAULT NULL,
  `CertCertifiedBy` varchar(100) DEFAULT NULL COMMENT 'microsoft,orcale, java,redhat etc',
  `CertCountry` varchar(100) DEFAULT NULL,
  `Skills` varchar(255) DEFAULT NULL,
  `SkillLevel` varchar(100) DEFAULT NULL COMMENT 'beginner,expert, intermediate',
  `CanID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CertID`),
  KEY `CanID` (`CanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificatedetails`
--

INSERT INTO `certificatedetails` (`CertID`, `CertName`, `CertInstitute`, `CertFrom`, `CertTo`, `CertGrade`, `CertCertifiedBy`, `CertCountry`, `Skills`, `SkillLevel`, `CanID`) VALUES
(0, 'safety and security course', 'international federation of red crescent society', '2015-06-02', '2015-11-04', '1', 'ciscom', NULL, NULL, NULL, 3),
(1, 'safety and security course', 'international federation of red crescent society', '2015-06-02', '2015-11-04', '1', 'ciscom', NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `ContactName` varchar(25) DEFAULT NULL,
  `ContactAddress` varchar(100) DEFAULT NULL,
  `ContactLocation` varchar(100) DEFAULT NULL,
  `ContactPhone` varchar(25) DEFAULT NULL,
  `ContactFax` varchar(25) DEFAULT NULL,
  `ContactWWW` varchar(50) DEFAULT NULL,
  `ContacTiming` varchar(50) DEFAULT NULL,
  `ContactEmail` varchar(50) DEFAULT NULL,
  `ContactQuery` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employmentdetails`
--

CREATE TABLE IF NOT EXISTS `employmentdetails` (
  `EmployerID` int(11) NOT NULL,
  `EmployerName` varchar(100) DEFAULT NULL,
  `EmployerAddress` varchar(150) DEFAULT NULL,
  `EmployerIndustry` varchar(100) DEFAULT NULL COMMENT 'animation,Computer H/W, computer S/W, chemicals etc',
  `Jobtitle` varchar(100) DEFAULT NULL,
  `JobDesc` longtext,
  `JobFrom` date DEFAULT NULL,
  `JobTo` date DEFAULT NULL,
  `CanID` int(11) DEFAULT NULL,
  `JobStatus` tinyint(1) DEFAULT NULL COMMENT 'currenly workig or not',
  `CountryLocation` varchar(100) DEFAULT NULL COMMENT 'experience in which country',
  PRIMARY KEY (`EmployerID`),
  KEY `CanID` (`CanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formheader`
--

CREATE TABLE IF NOT EXISTS `formheader` (
  `FormHeaderKey` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(255) DEFAULT NULL,
  `ProjectName` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FormHeaderKey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `LID` int(11) NOT NULL AUTO_INCREMENT,
  `LocationID` varchar(50) DEFAULT NULL,
  `Region` varchar(25) DEFAULT NULL,
  `DomicileProvince` varchar(25) DEFAULT NULL,
  `DomicileDistrict` varchar(25) DEFAULT NULL,
  `City` varchar(25) DEFAULT NULL,
  `Qouta` varchar(25) DEFAULT NULL,
  `IsActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`LID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locpost`
--

CREATE TABLE IF NOT EXISTS `locpost` (
  `LocPostID` int(11) NOT NULL AUTO_INCREMENT,
  `LID` int(11) DEFAULT NULL,
  `PID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LocPostID`),
  KEY `PID` (`PID`),
  KEY `LID` (`LID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `OrgID` int(11) NOT NULL,
  `OrgName` varchar(50) DEFAULT NULL,
  `OrgPositionopened` int(11) DEFAULT NULL,
  `OrgDesc` longtext,
  `OrgRegistered` date DEFAULT NULL,
  `OrgStatus` tinyint(1) DEFAULT NULL,
  `SUBID` int(11) DEFAULT NULL,
  PRIMARY KEY (`OrgID`),
  KEY `SUBID` (`SUBID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `PostID` varchar(50) DEFAULT NULL,
  `PostName` varchar(100) DEFAULT NULL,
  `PostGrade` varchar(20) DEFAULT NULL,
  `PostAmount` int(11) DEFAULT NULL,
  `Qouta` varchar(25) DEFAULT NULL,
  `TID` int(11) DEFAULT NULL,
  `PostActive` tinyint(1) DEFAULT NULL,
  `PostApplydate` date DEFAULT NULL,
  `OrgID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PID`),
  KEY `TID` (`TID`),
  KEY `OrgID` (`OrgID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pstcandloctestcentr`
--

CREATE TABLE IF NOT EXISTS `pstcandloctestcentr` (
  `PCLTCID` int(11) NOT NULL,
  `CanID` int(11) DEFAULT NULL,
  `TCID` int(11) DEFAULT NULL,
  `LocPostID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PCLTCID`),
  KEY `CanID` (`CanID`),
  KEY `LocPostID` (`LocPostID`),
  KEY `TCID` (`TCID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sectorcategory`
--

CREATE TABLE IF NOT EXISTS `sectorcategory` (
  `SCID` int(11) NOT NULL AUTO_INCREMENT,
  `SCType` varchar(100) DEFAULT NULL COMMENT 'Government,Education',
  PRIMARY KEY (`SCID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sectorcategory`
--

INSERT INTO `sectorcategory` (`SCID`, `SCType`) VALUES
(1, 'Government'),
(2, 'Private'),
(3, 'University Education');

-- --------------------------------------------------------

--
-- Table structure for table `sectorname`
--

CREATE TABLE IF NOT EXISTS `sectorname` (
  `SNID` int(11) NOT NULL,
  `SCID` int(11) DEFAULT NULL,
  `SNName` varchar(100) DEFAULT NULL COMMENT 'Ministry of interior,Defednce,IIU,Fast etc',
  PRIMARY KEY (`SNID`),
  KEY `SCID` (`SCID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sectorname`
--

INSERT INTO `sectorname` (`SNID`, `SCID`, `SNName`) VALUES
(1, 1, 'Ministry of Interior'),
(2, 1, 'Ministry of Foreign Affairs'),
(3, 1, 'Ministry of Defense'),
(4, 3, 'Riphah international ');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `SUBID` int(11) NOT NULL,
  `SUBType` varchar(100) DEFAULT NULL,
  `sectorcategory_SCID` int(11) NOT NULL,
  `sub_category_SUBID` int(11) NOT NULL,
  PRIMARY KEY (`SUBID`),
  KEY `fk_sub_category_sectorcategory1_idx` (`sectorcategory_SCID`),
  KEY `fk_sub_category_sub_category1_idx` (`sub_category_SUBID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testcategory`
--

CREATE TABLE IF NOT EXISTS `testcategory` (
  `TCatID` int(11) NOT NULL,
  `TCatName` varchar(50) DEFAULT NULL COMMENT 'Admission,Scholorship,Recruitment',
  PRIMARY KEY (`TCatID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcategory`
--

INSERT INTO `testcategory` (`TCatID`, `TCatName`) VALUES
(1, 'Admission');

-- --------------------------------------------------------

--
-- Table structure for table `testcentres`
--

CREATE TABLE IF NOT EXISTS `testcentres` (
  `TCID` int(11) NOT NULL AUTO_INCREMENT,
  `TestCenterID` varchar(50) DEFAULT NULL,
  `TCCity` varchar(50) DEFAULT NULL,
  `TCProvince` varchar(50) DEFAULT NULL,
  `TCWebsite` varchar(100) DEFAULT NULL,
  `TCChiefAdminName` varchar(30) DEFAULT NULL,
  `TCChiefMobile` varchar(12) DEFAULT NULL,
  `TCChiefPhone` varchar(15) DEFAULT NULL,
  `TCChiefEmail` varchar(50) DEFAULT NULL,
  `TCChiefExaminerprotector` varchar(20) DEFAULT NULL,
  `TCExTitle` char(5) DEFAULT NULL,
  `TCExCNIC` decimal(10,0) DEFAULT NULL,
  `TCExHighestDegree` mediumtext,
  `TCExFieldOfStudy` varchar(50) DEFAULT NULL,
  `TCExTestingExperience` decimal(3,0) DEFAULT NULL,
  `TCExPhone` int(60) DEFAULT NULL,
  `TCExEmail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TCID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testscore`
--

CREATE TABLE IF NOT EXISTS `testscore` (
  `TSID` int(11) NOT NULL,
  `TSMarksTotalMCQ` int(11) DEFAULT NULL,
  `TSMarksObtainedMCQ` int(11) DEFAULT NULL,
  `TSMarksTotalSubjective` int(11) DEFAULT NULL,
  `TSMarksObtainedSubjective` int(11) DEFAULT NULL,
  `TSGrandTotal` int(11) DEFAULT NULL,
  `TSGrade` varchar(10) DEFAULT NULL,
  `TSResultDate` date DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `CanID` int(11) DEFAULT NULL,
  `TID` int(11) DEFAULT NULL,
  `PID` int(11) DEFAULT NULL,
  PRIMARY KEY (`TSID`),
  KEY `CanID` (`CanID`),
  KEY `PID` (`PID`),
  KEY `TID` (`TID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testtype`
--

CREATE TABLE IF NOT EXISTS `testtype` (
  `TID` int(11) NOT NULL AUTO_INCREMENT,
  `TestID` varchar(50) DEFAULT NULL,
  `TCatID` int(11) DEFAULT NULL,
  `SNID` int(11) DEFAULT NULL,
  `TestName` varchar(100) DEFAULT NULL,
  `TestCriteria` longtext,
  `TestDesc` longtext,
  `TestDate` datetime DEFAULT NULL,
  `ApplicationStartDate` date DEFAULT NULL,
  `ApplicationEndDate` date DEFAULT NULL,
  `TestValidity` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TID`),
  KEY `TCatID` (`TCatID`),
  KEY `SNID` (`SNID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `academicinfo`
--
ALTER TABLE `academicinfo`
  ADD CONSTRAINT `academicinfo_ibfk_1` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`);

--
-- Constraints for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD CONSTRAINT `bankdetails_ibfk_1` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`);

--
-- Constraints for table `candidatesignup`
--
ALTER TABLE `candidatesignup`
  ADD CONSTRAINT `candidatesignup_ibfk_1` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`);

--
-- Constraints for table `certificatedetails`
--
ALTER TABLE `certificatedetails`
  ADD CONSTRAINT `certificatedetails_ibfk_1` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`);

--
-- Constraints for table `employmentdetails`
--
ALTER TABLE `employmentdetails`
  ADD CONSTRAINT `employmentdetails_ibfk_1` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`);

--
-- Constraints for table `locpost`
--
ALTER TABLE `locpost`
  ADD CONSTRAINT `locpost_ibfk_1` FOREIGN KEY (`PID`) REFERENCES `post` (`PID`),
  ADD CONSTRAINT `locpost_ibfk_2` FOREIGN KEY (`LID`) REFERENCES `location` (`LID`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`SUBID`) REFERENCES `sub_category` (`SUBID`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`TID`) REFERENCES `testtype` (`TID`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`OrgID`) REFERENCES `organization` (`OrgID`);

--
-- Constraints for table `pstcandloctestcentr`
--
ALTER TABLE `pstcandloctestcentr`
  ADD CONSTRAINT `pstcandloctestcentr_ibfk_4` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`),
  ADD CONSTRAINT `pstcandloctestcentr_ibfk_5` FOREIGN KEY (`LocPostID`) REFERENCES `locpost` (`LocPostID`),
  ADD CONSTRAINT `pstcandloctestcentr_ibfk_6` FOREIGN KEY (`TCID`) REFERENCES `testcentres` (`TCID`);

--
-- Constraints for table `sectorname`
--
ALTER TABLE `sectorname`
  ADD CONSTRAINT `sectorname_ibfk_1` FOREIGN KEY (`SCID`) REFERENCES `sectorcategory` (`SCID`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `fk_sub_category_sectorcategory1` FOREIGN KEY (`sectorcategory_SCID`) REFERENCES `sectorcategory` (`SCID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sub_category_sub_category1` FOREIGN KEY (`sub_category_SUBID`) REFERENCES `sub_category` (`SUBID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testscore`
--
ALTER TABLE `testscore`
  ADD CONSTRAINT `testscore_ibfk_1` FOREIGN KEY (`CanID`) REFERENCES `candidatedetails` (`CanID`),
  ADD CONSTRAINT `testscore_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `post` (`PID`),
  ADD CONSTRAINT `testscore_ibfk_3` FOREIGN KEY (`TID`) REFERENCES `testtype` (`TID`);

--
-- Constraints for table `testtype`
--
ALTER TABLE `testtype`
  ADD CONSTRAINT `testtype_ibfk_1` FOREIGN KEY (`TCatID`) REFERENCES `testcategory` (`TCatID`),
  ADD CONSTRAINT `testtype_ibfk_2` FOREIGN KEY (`SNID`) REFERENCES `sectorname` (`SNID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
