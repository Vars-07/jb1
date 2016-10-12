-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2013 at 01:19 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobbureau`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE IF NOT EXISTS `achievements` (
  `aid` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `s_time` timestamp NULL DEFAULT NULL,
  `e_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `required` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`aid`, `type`, `discription`, `s_time`, `e_time`, `required`, `status`, `exp`, `money`) VALUES
(1, 1, 'Make money atleast 50000Rs at 11pm on 23-10-2013 and get a benifit of  10000Rs.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50000, 1, 0, 10000),
(2, 1, 'Make money atleast 20000Rs at 9pm on 23-10-2013 and get a benifit of  5000Rs.', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 20000, 1, 0, 5000),
(3, 2, 'Complete project " E-Learning Applications  by Tata Consultancy Services" between 3am - 4am on 24/10/13 and increase your  EXPERIENCE by 10.', '2013-10-24 10:00:00', '2013-10-24 11:00:00', 77, 1, 10, 0),
(4, 2, 'Complete project "Sales portal by  IRCTC " before 5pm, 24-10-2013 and get experience of  20 and increase money by 10000Rs.', '2013-10-24 00:00:00', '2013-10-25 00:00:00', 92, 1, 20, 10000),
(5, 3, 'Complete 8 projects before 10pm 23-10-2013 and boost experience by 7. (Except Novice))', '2013-10-24 00:00:00', '2013-10-23 05:00:00', 8, 1, 7, 0),
(6, 3, 'Complete 25 projects before 7:30pm 24-10-2013 and boost your money by 10000Rs. (Except Novice))', '2013-10-24 00:00:00', '2013-10-25 02:30:00', 25, 1, 0, 10000),
(7, 4, 'Complete all projects of level 1 and get an increment of 30 Experience and 30000Rs money', '2013-10-24 00:00:00', '2013-10-25 06:59:59', 1, 1, 30, 30000),
(8, 4, 'Complete all projects of level 2 and get an increment of 35 Experience and 35000Rs money', '2013-10-24 00:00:00', '2013-10-25 06:59:59', 2, 1, 35, 35000),
(9, 5, 'Complete all projects of "NIC" company and get a gift wrap of suprise money and experience.', '2013-10-24 00:00:00', '2013-10-25 06:59:59', 72, 1, 25, 20000),
(10, 6, 'Collect 100000rs and get 50000rs more', '2013-10-24 00:00:00', '2013-10-24 06:59:59', 100000, 1, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `action_log`
--

CREATE TABLE IF NOT EXISTS `action_log` (
  `uid` varchar(50) NOT NULL,
  `event` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `information` varchar(100) NOT NULL,
  `action` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `battery`
--

CREATE TABLE IF NOT EXISTS `battery` (
  `battery_consumption` int(2) NOT NULL,
  `battery_gain` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `battery`
--

INSERT INTO `battery` (`battery_consumption`, `battery_gain`) VALUES
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `cid` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_details` varchar(1000) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  PRIMARY KEY (`company_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `company_name`, `company_details`, `logo`) VALUES
(13, 'Apple Inc', 'Apple Inc. is an American multinational corporation that designs and markets consumer electronics, computer software, and personal computers', 'company_logo/apple.jpg'),
(31, 'Sony Corporation', 'Sony Corporation commonly referred to as Sony, is a Japanese multinational conglomerate corporation which  is one of the leading manufacturers of electronics, video, communications, video game consoles, and information technology products for the consumer and professional markets.', 'company_logo/sony.jpg'),
(14, 'Aditya Birla Group', 'The Aditya Birla Group is a multinational conglomerate corporation which is organized into various subsidiaries like  viscose staple fibre, non-ferrous metals, cement ,etc', 'company_logo/aditya birla group.jpeg'),
(15, 'Alienware', 'Alienware is an American computer hardware company which  assembles third party components into desktops and laptops with custom enclosures for high-performance gaming.', 'company_logo/allianware.jpeg'),
(16, 'Samsonite', 'The Samsonite Corporation makes luggage with its products ranging from large suitcases to small toiletries bags and briefcases.', 'company_logo/samsonite.jpeg'),
(17, 'DELL', 'DELL is a multinational information technology corporation based in Round Rock, Texas, United States, that develops, sells and supports computers and related products and services.', 'company_logo/dell.jpg'),
(18, 'Google', 'Google is a multinational public cloud computing, Internet search, and advertising technologies corporation. ', 'company_logo/google.jpg'),
(19, 'HITACHI', 'HITACHI is a Japanese multinational corporation specializing in high-technology and services that include appliances like Personal computers,LCD projector,servers etc.s', 'company_logo/hitachi.jpeg'),
(20, 'Hewlett-Packard Company', 'Hewlett-Packard Company commonly referred to as HP, is an American multinational information technology corporation which specializes in developing and manufacturing computing, data storage, and networking hardware, designing software and delivering services. ', 'company_logo/hp(hewlett packard).jpeg'),
(21, 'Industrial Credit and Investment Corporation of India.', ' Industrial Credit and Investment Corporation of India  is a major banking and financial services organization in India.', 'company_logo/icici.jpg'),
(22, 'Mitsubishi Group', 'The Mitsubishi Group of Companies, or Mitsubishi Companies is a Japanese conglomerate consisting of a range of autonomous businesses which share the Mitsubishi brand, trademark and legacy.', 'company_logo/mitsubishi.jpeg'),
(23, 'Nvidia ', 'Nvidia is a multinational corporation which specializes in the development of graphics processing units and chipset  technologies for workstations, personal computers, and mobile devices.', 'company_logo/nvidia.jpeg'),
(24, 'Reliance Power', 'Reliance Power Limited, a part of the Reliance Anil Dhirubhai Ambani Group, was established to develop, construct and operate power projects in the domestic and international markets.', 'company_logo/reliance.jpeg'),
(25, 'Samsung Group', 'The Samsung Group is a multinational conglomerate corporation which include Electronics Industries,Financial Services,Chemical Industries etc.', 'company_logo/samsung.jpeg'),
(26, 'YAHOO!', 'Yahoo! Inc.  is an American public corporationthat provides Internet services worldwide. ', 'company_logo/yahoo.jpeg'),
(27, 'Whirlpool Corporation', 'Whirlpool Corporation is a Fortune 500 company and a global manufacturer and marketer of major home appliances.', 'company_logo/whirlpool.jpeg'),
(28, 'Voltas Limited', 'Voltas Limited is an engineering, air conditioning and refrigeration company based in Mumbai, India. It offers engineering solutions for a wide spectrum of industries in areas such as heating, ventilation and air conditioning, refrigeration,etc.', 'company_logo/voltas.jpeg'),
(29, 'Tech Mahindra', 'Tech Mahindra Ltd.  is an Information Technology service provider company providing Telecom Solutions .', 'company_logo/tech mahindra.jpg'),
(30, 'Tata Consultancy Services', 'Tata Consultancy Services is a Software services consulting company which  is the largest provider of information technology and business process outsourcing services in Asia', 'company_logo/tata consultancy solutions.jpg'),
(32, 'Hindustan Petroleum Corporation Limited', 'Hindustan Petroleum Corporation Limited (HPCL), a state-owned oil company of the Government of India.HPCL operates 2 major refineries[4] producing a wide variety of petroleum fuels & specialties', 'company_logo/hindustan petrolium.jpg'),
(33, 'BSNL', 'Telephone service Providing Company', 'company_logo/bsnl.jpg'),
(34, 'Cisco Systems', 'It is an American Multinational corporation that designs and sells Consumer electronics,Networking and Communications Technology and services', 'company_logo/cisco-logo.gif'),
(35, 'Microsoft', 'It develops and manufactures wide range of products and services related to computing through its various product divisionsctures', 'company_logo/microsoft_logo.jpg'),
(36, 'IBM', 'It manufactures and sells computer hardware and software and offers infrastructure services and consulting services ranging from mainframe computers to nano technology.', 'company_logo/IBM_logo.jpg'),
(37, 'SAP AG', 'It is a German software corporation that provides enterprise software applications and support to businesses of all sizes globally.', 'company_logo/sap_logo.gif'),
(38, 'Accenture', 'It is a global management consulting,technology consulting and outsourcing company.', 'company_logo/Accenture_Logo.jpg'),
(39, 'Computer science corporation(CSC)', 'It predominantly provides IT personnel staffing services in,systems integration and professional services.', 'company_logo/csc-logo.gif'),
(40, 'CA technologies', 'It develops and markets informationa nd technology management software,value added resellers and other service providers', 'company_logo/ca_logo.jpg'),
(41, 'A G Technologies Pvt Ltd', 'This company provides ERP,IT enabled services,web enablement and application development services', 'company_logo/ag_logo.jpg'),
(42, 'Acumen Software Technologies', 'This company provides internet desktop business solutions for manufacturing sectors.', 'company_logo/acumen_logo2.gif'),
(43, 'Fasthosts', 'It finds the dedicated windows hosting and linux server hosting as well as email hosting,domain registration services and reseller plans.', 'company_logo/Fasthosts-logo.jpg'),
(44, 'Nucleus Softwares', 'This is a global banking software specialist and provides all types of banking products and solutions. ', 'company_logo/nuc_logo1.jpg'),
(45, 'Wipro Technologies', 'It is a giant information technologies services corporation', 'company_logo/wipro_logo.jpg'),
(46, 'NEC Corporation', 'It is a Japanese multinational IT company', 'company_logo/NEC-S.jpg'),
(47, 'Nokia Corporation', 'It is a Finnish multinational communications corporation.', 'company_logo/nokia-logo.jpg'),
(76, 'Amdocs', 'is a provider of software and services for billing, customer relationship management (CRM), operations support systems (OSS).', 'company_logo/amdocs.jpg'),
(75, 'Flipkart', 'is an Indian online shopping company', 'company_logo/flipkart.jpg'),
(50, 'Robosapiens India', 'robotics education Organization', 'company_logo/images1.jpg'),
(51, 'Valve', ' American video game development and digital distribution', 'company_logo/valve.jpg'),
(52, 'Toonz India Ltd', 'animation company in India', 'company_logo/logo.jpg'),
(59, 'Polaris', 'Polaris Software is the world''s most sophisticated banking and insurance software company. ', 'company_logo/polaris.jpg'),
(60, 'SnapDeal', 'Snapdeal aims at making life more fun for consumers. Being India''s best daily deals website, they bring to you up to 90% discounts on dining, health and beauty services, branded products, travel and more.', 'company_logo/snap deal.jpg'),
(58, 'Motorola', 'was an American multinational[5] telecommunications company based in Schaumburg, Illinois,', 'company_logo/motorola.jpg'),
(61, 'Cognizant', 'Cognizant Technology Solutions  is an American multinational provider of custom information technology.', 'company_logo/cognizant.jpg'),
(62, 'Oracle', 'Oracle engineers hardware and software to work together in the cloud and in your data centerâ€“from servers and storage', 'company_logo/oracle.jpg'),
(63, 'Sun Microsystems', 'Sun Microsystems, Inc. was a company that sold computers, computer components, computer software, and information technology services.', 'company_logo/sun microsystems.jpg'),
(64, 'HTC', 'HTC Corporation, formerly High Tech Computer Corporation,[2] is a Taiwanese manufacturer of smartphones.', 'company_logo/htc.jpg'),
(65, 'Deloitte', 'Deloitte Touche Tohmatsu Limited , commonly referred to as Deloitte, is one of the Big Four accountancy firms along with PricewaterhouseCoopers, Ernst & Young, and KPMG.', 'company_logo/deloitte.jpg'),
(66, 'Vodafone', 'Vodafone Group Plc (LSE: VOD, NASDAQ: VOD) is a global telecommunications company', 'company_logo/vodafone.jpg'),
(67, 'IRCTC', '', 'company_logo/irctc.jpg'),
(68, 'Philips', '', 'company_logo/philips.jpg'),
(69, 'Asus', 'is a multinational computer product manufacturer ', 'company_logo/asus.jpg'),
(70, 'Intel', 'is an American multinational semiconductor chip maker corporation', 'company_logo/intel.jpg'),
(71, 'HCL', 'HCLis a global Electronics, Computing and IT company', 'company_logo/hcl.jpg'),
(72, 'NIC', 'is the main science & technology organisation of India''s Union Government', 'company_logo/nic.jpg'),
(73, 'Amazon', 'is a US-based multinational electronic commerce company.', 'company_logo/amazon.jpg'),
(74, 'Infinite-Eurekas', '', 'company_logo/435.jpg'),
(77, 'Electronic Arts', 'is a major American developer, marketer, publisher and distributor of video games', 'company_logo/images.jpg'),
(78, 'McKinsey & Company', 'is a global management consulting firm that focuses on solving issues of concern to senior management', 'company_logo/mckinsey.jpg'),
(79, 'EPSON', 'Known for Micro Piezo piezoelectric printing technology and 3LCD LCD projection technology.', 'company_logo/epson.jpg'),
(80, 'Symantic', 'Software Security Company', 'company_logo/symantec.jpg'),
(81, 'Nintendo', 'Gaming Company', 'company_logo/nintendo.jpg'),
(82, 'EMC^2', 'Information Management Company', 'company_logo/emc_square.jpg'),
(83, 'Activision Blizzard', 'Gaming Company', 'company_logo/activision_blizzard.jpg'),
(2, 'i-Gate Patni', 'Provider of IT services and business solutions', 'company_logo/iGATE_Patni.jpg'),
(86, 'SYNOPSYS', ' Electronic Design Automation', 'company_logo/synopsys.jpg'),
(87, 'ALCATEL LUCENT', 'telecommunications equipment corporation', 'company_logo/ALCATEL_LUCENT.jpg'),
(88, 'LOGITECH', 'Computer Accessories ', 'company_logo/logitech.jpg'),
(89, 'DASSAULT SYSTEMS', 'design and manufacturing of aerospace equipment', 'company_logo/DASSAULT.jpg'),
(90, 'I-Ball', 'Computer Accessories', 'company_logo/iball.jpg'),
(91, 'Idea', 'Telecom Company', 'company_logo/idea.jpg'),
(92, 'Lenovo', 'Computer Hardware', 'company_logo/lenovo.jpg'),
(93, 'Bajaj', 'Automobile Company', 'company_logo/bajaj.jpg'),
(94, 'Videocon', 'Electronics Appliances Manufacturing', 'company_logo/videocon.jpg'),
(95, 'Netwok 18', 'Media Company', 'company_logo/network18.jpg'),
(96, 'Nestle', 'FMCG Sector Company', 'company_logo/nestle.jpg'),
(97, 'Hindustan Unilever Ltd.', 'FMCG Sector Company', 'company_logo/hul.jpg'),
(98, 'Infusion', 'Business Software Solutions', 'company_logo/infusion.jpg'),
(99, 'Sega', 'Game Company', 'company_logo/sega.jpg'),
(100, 'EA Sports', 'Game Company', 'company_logo/EA.jpg'),
(101, 'Decent Solutions', 'Decent Solutions is a professional web-design and web-development company offering exclusive and affordable services for businesses from all round the world.', 'company_logo/DecentSolutions.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `completed_project`
--

CREATE TABLE IF NOT EXISTS `completed_project` (
  `pid` int(10) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `completion_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE IF NOT EXISTS `count` (
  `id` int(2) NOT NULL,
  `companies` int(2) NOT NULL,
  `packages` int(2) NOT NULL,
  `projects` int(2) NOT NULL,
  `users` int(2) NOT NULL,
  `updates` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`id`, `companies`, `packages`, `projects`, `users`, `updates`) VALUES
(0, 1, 123, 127, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `user_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gamestatus`
--

CREATE TABLE IF NOT EXISTS `gamestatus` (
  `start` datetime NOT NULL,
  `login` varchar(100) NOT NULL,
  `end` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamestatus`
--

INSERT INTO `gamestatus` (`start`, `login`, `end`, `status`) VALUES
('0000-00-00 00:00:00', 'index.php?value=Game is over.', '0000-00-00 00:00:00', 0),
('0000-00-00 00:00:00', 'index.php?value=Trials starts from 5:10 pm, 23/10/2013.', '0000-00-00 00:00:00', 0),
('0000-00-00 00:00:00', 'logincheck1.php', '0000-00-00 00:00:00', 1),
('0000-00-00 00:00:00', 'logout.php', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `infotsav`
--

CREATE TABLE IF NOT EXISTS `infotsav` (
  `id` int(60) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `institute` varchar(111) NOT NULL,
  `branch` varchar(111) NOT NULL,
  `year` varchar(111) NOT NULL,
  `username` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `gender` varchar(111) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `address` varchar(600) NOT NULL,
  `email_flag` tinyint(1) NOT NULL,
  `timestamp` datetime NOT NULL,
  `external_ip` varchar(20) NOT NULL,
  `internal_ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE IF NOT EXISTS `login_log` (
  `uid` varchar(50) NOT NULL,
  `time` datetime NOT NULL,
  `status` binary(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE IF NOT EXISTS `offer` (
  `package_id` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `money` int(20) NOT NULL,
  `dis_money` int(20) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  `is_visible` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`package_id`, `type`, `name`, `description`, `money`, `dis_money`, `logo`, `is_visible`, `time`) VALUES
(4, 'Software', 'Adobe Photoshop 7.0', 'It is a graphics editing program for making high quality images', 7499, 7000, 'package_logo/Photoshop_7.0.jpg', 0, '0000-00-00 00:00:00'),
(11, 'Software', 'Adobe Dreamweaver', 'Adobe Dreamweaver s a web development application originally created by Macromedia, and is now developed by Adobe Systems.', 22999, 21000, 'package_logo/icon_adobedreamweaverCS4.png', 0, '0000-00-00 00:00:00'),
(104, 'software', 'InterBase XE Desktop', 'InterBase XE Desktop Edition is a powerful, cost effective DBMS for standalone applications	', 44000, 40999, 'package_logo/Interbase.jpg', 0, '0000-00-00 00:00:00'),
(77, 'Software', 'Adobe Encore CS5', 'Adobe Encore (previously Adobe Encore DVD) is a DVD authoring software tool produced by Adobe Systems and targeted at professional video producers.', 44000, 41000, 'package_logo/icon_cs5encore.png', 0, '0000-00-00 00:00:00'),
(121, 'Software', 'Roxio Creator', 'Pro-quality projects with video, audio and photos', 7000, 6700, 'package_logo/roxio.jpg', 0, '0000-00-00 00:00:00'),
(99, 'software', 'Nusphere PhpED', 'NuSphere is provider of the best PHP Tools, the home of PhpED - state of the art PHP Edito', 26000, 24490, 'package_logo/Nusphere.jpg', 0, '0000-00-00 00:00:00'),
(31, 'Software', 'Drupal', 'is a content management system', 6499, 6300, 'package_logo/drupal_makes_me_hapi.jpg', 0, '0000-00-00 00:00:00'),
(107, 'software', 'Clustrix', 'Clustrix makes the leading NewSQL Database that''s distributed for scale,performance, fault tolerance, and high availability.', 36000, 34500, 'package_logo/clustrix.jpg', 0, '0000-00-00 00:00:00'),
(33, 'Software', 'Adobe Fireworks', 'Adobe Fireworks (formerly Macromedia Fireworks) is a bitmap and vector graphics editor.', 4500, 4350, 'package_logo/AdobeFireworksCS3.png', 0, '0000-00-00 00:00:00'),
(38, 'Software', 'WinZip 14.5', 'File compression, file encryption and data backup', 2999, 2900, 'package_logo/winzip.png', 0, '0000-00-00 00:00:00'),
(122, 'Software', 'Acronis Vm Protect', 'Protection of VMWARE, backup of data', 27000, 25000, 'package_logo/acronis.jpg', 0, '0000-00-00 00:00:00'),
(111, 'software', 'Intuit Quicken Deluxe', 'Organize all your accounts bank, credit card, investments, loans, retirement accounts all in one place', 8500, 8200, 'package_logo/quicken.jpg', 0, '0000-00-00 00:00:00'),
(45, 'Software', 'Adobe Flash Builder ', 'AdobeÂ® FlashÂ® Builderâ„¢ 4.5.1 for PHP, which includes a tightly integrated Zend Studio 8, enables you to run a single code base on multiple devices, including iOS, Android and Blackberry Tablet.  ', 38950, 36999, 'package_logo/flash builder.jpg', 0, '0000-00-00 00:00:00'),
(46, 'Software', 'Zend Studio 7', 'Zend Studio is our professional-grade PHP IDE. It has been designed to maximize developer productivity by enabling you to develop and maintain code faster', 17500, 16990, 'package_logo/zend-studio.jpg', 0, '0000-00-00 00:00:00'),
(47, 'software', 'php storm', 'PhpStorm provides rich and intelligent code editor for PHP with syntax highlighting, extended code formatting configuration, on-the-fly error checking, and smart code completion.', 18000, 16999, 'package_logo/phpstorm.png', 0, '0000-00-00 00:00:00'),
(49, 'software', 'RubyMine', 'RubyMine â€” Ruby and Rails IDE providing the most essential tools for developers, all integrated together to ensure a convenient environment for Web development with Ruby on Rails.', 13000, 11490, 'package_logo/rubymine_150.png', 0, '0000-00-00 00:00:00'),
(50, 'Software', 'PyCharm', 'Lightweight IDE for Python programming language with support of Web development with Django framework and Google App Engine.', 11500, 11090, 'package_logo/phycharm.jpg', 0, '0000-00-00 00:00:00'),
(51, 'Software', 'dotPeeK', 'Free .NET decompiler that is empowered with ReSharper-style navigation and displays decompiled code as C#.', 18000, 16900, 'package_logo/dotPeek.gif', 0, '0000-00-00 00:00:00'),
(53, 'Software', 'Pinnacle Studio HD', 'Quickly import videos and photos from a wide range of devicesâ€”then edit scenes and create professional-looking HD movies with over 1,800 included effects, titles, and other content.', 6000, 5690, 'package_logo/pinnacle studio.jpeg', 0, '0000-00-00 00:00:00'),
(54, 'Software', 'Microsoft Office Visio', 'Build diagram with professional-looking templates and modern, pre-drawn shapes. ', 57000, 54990, 'package_logo/4.jpg', 0, '0000-00-00 00:00:00'),
(56, 'Software', 'Adobe Soundbooth CS5', 'to edit, repair, and enhance audio. Record voiceovers, remove unwanted noises, add effects, and integrate professional sounding audio projects in other Creative Suite applications.', 19500, 17990, 'package_logo/adobe soundbooth.jpeg', 0, '0000-00-00 00:00:00'),
(57, 'Software', 'Adobe  Audition  CS5.5 ', 'delivers the professional tools you need to make your video and audio productions sound their best. Handle a wide range of audio production tasks efficiently, including recording, mixing, and sound restoration.', 23500, 20999, 'package_logo/adobe audition.jpeg', 0, '0000-00-00 00:00:00'),
(58, 'Software', 'toon Boom Studio 4', 'Toon Boom Studio is one of the best animation programs for internet users, and is well known for its depth and quality of their technical support.', 19000, 17490, 'package_logo/toon boom.jpeg', 0, '0000-00-00 00:00:00'),
(62, 'software', 'Sony Vegas Movie Studio', 'Edit video in nearly any format including HDV and AVCHD. Powerful features for video compositing, color correction, and soundtrack creation ', 7509, 7200, 'package_logo/sony vegas.jpeg', 0, '0000-00-00 00:00:00'),
(65, 'software', 'Autodesk AutoSketch', 'AutoSketch 9 software provides a comprehensive set of CAD tools for creating precision drawings...', 13500, 11000, 'package_logo/autosketch.jpeg', 0, '0000-00-00 00:00:00'),
(71, 'software', 'Busy Accounting 3.6 Standard', 'Accounting Software with Multi-location Inventory', 29999, 27990, 'package_logo/29arvwj.jpg.png', 0, '0000-00-00 00:00:00'),
(76, 'Software', 'Adobe photoshop lightroom 3', 'Adobe Photoshop Lightroom is a photography software program developed by Adobe Systems for Mac OS X and Microsoft Windows, designed to assist professional photographers in managing thousands of digital images.', 27000, 24990, 'package_logo/Lightroom_3_Logo.PNG', 0, '0000-00-00 00:00:00'),
(93, 'Software', 'JBuilder', ' is a complete Java IDE for EJB, Web and Web Services, offering integration with application servers (namely BEA Weblogic)', 17999, 15990, 'package_logo/jbuilder.jpg', 0, '0000-00-00 00:00:00'),
(96, 'hardware', 'ASUS GeForce GTX 590 ', 'Full throttle overclocking with exclusive ASUS Voltage \r\nTweak via Smart Doctor â€“ boosting 50%* more speed, \r\nperformance and satisfaction! ', 41500, 38990, 'package_logo/nvidia gtx 590.jpeg', 0, '0000-00-00 00:00:00'),
(97, 'hardware', 'MSI GeForce GT 430 ', 'The new GeForce GT 430 comes to replace the GeForce GT 220, which is a DirectX 10.1 part.', 11000, 9999, 'package_logo/The new GeForce GT 430 comes to replace the GeForce GT 220.jpeg', 0, '0000-00-00 00:00:00'),
(100, 'software', 'CodeLobster ', 'Codelobster PHP Edition streamlines and simplifies php development process.', 4000, 3800, 'package_logo/codeLobster.jpg', 0, '0000-00-00 00:00:00'),
(103, 'software', 'CodeGear 3rdRail', 'CodeGear 3rdRail is the intuitive IDE that delivers the power you need to dramatically accelerate Ruby on Railsâ„¢ web development.', 11000, 9990, 'package_logo/codeGear.jpg', 0, '0000-00-00 00:00:00'),
(106, 'software', 'SPSS', 'Predictive analytics helps your organization anticipate change so that you can plan and carry out strategies that improve outcomes.', 8000, 7490, 'package_logo/spss.jpg', 0, '0000-00-00 00:00:00'),
(113, 'software', 'IMSI TurboFLOORPLAN', 'TurboFLOORPLAN 3D Home & Landscape Pro is a landscape design software. More professional quality \r\ntools make it easy to quickly layout your dream home to exact specifications', 13700, 13190, 'package_logo/turboFloor plam.jpg', 0, '0000-00-00 00:00:00'),
(116, 'software', 'Microsoft Picture It!', 'Picture It! Photo Premium''s powerful photo-editing tools and built-in wizards make it easy for everyone to improve their photos. ', 18700, 17490, 'package_logo/pictureut.jpg', 0, '0000-00-00 00:00:00'),
(117, 'software', 'Microsoft Works 9', 'including word processor, spreadsheet, database, and calendar.', 14000, 13499, 'package_logo/works9.jpg', 0, '0000-00-00 00:00:00'),
(118, 'software', 'Netbeans 7.0', 'both a platform framework for Java desktop applications, and an integrated development environment (IDE) for developing with Java', 18999, 17000, 'package_logo/netbeans7.jpg', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE IF NOT EXISTS `package` (
  `package_id` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `money` int(20) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  PRIMARY KEY (`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `type`, `name`, `description`, `money`, `logo`) VALUES
(1, 'Software', 'Adobe Dreamweaver 8', 'Used for making web pages and designs', 1499, 'package_logo/dreamweaver_8.jpg'),
(2, 'Software', 'Netbeans IDE 6.0', 'A platform for developing software using Open source languages.', 9599, 'package_logo/netbeans0.png'),
(3, 'Software', 'Tally 8.0', 'An accountancy tool for business related solutions', 17499, 'package_logo/TallyLogo.jpg'),
(4, 'Software', 'Adobe Photoshop 7.0', 'It is a graphics editing program for making high quality images', 7499, 'package_logo/Photoshop_7.0.jpg'),
(5, 'Software', 'BAASS', 'A business solution for analysis of sales and production.', 26999, 'package_logo/Oryx Antelope.jpg'),
(6, 'Software', 'Inventory', 'A basic tool for keeping the records of a firm', 21999, 'package_logo/Tree.jpg'),
(11, 'Software', 'Adobe Dreamweaver', 'Adobe Dreamweaver s a web development application originally created by Macromedia, and is now developed by Adobe Systems.', 22999, 'package_logo/icon_adobedreamweaverCS4.png'),
(21, 'Software', 'Microsoft Office 2010', 'Office 2010 includes extended file format support,  user interface updates,  and a refined user experience.  With the introduction of Office 2010, a 64-bit version of Office  is available, although not for Windows XP or Windows Server 2003.  Office 2010 does not support Windows XP Professional x64 Edition.', 11999, 'package_logo/microsoft-office-2010.jpg'),
(19, 'Software', 'Adobe Photoshop cs3', 'Adobe Photoshop is a graphics editing program developed and published by Adobe Systems.', 17999, 'package_logo/CS3-icon.png'),
(20, 'Software', 'Microsoft Visual Studio 2010', 'Microsoft Visual Studio is an integrated development environment (IDE) from Microsoft. It can be used to develop console and graphical user interface applications  along with Windows Forms applications, web sites, ', 27099, 'package_logo/Visual_Studio_icon_1-1.jpg'),
(18, 'Software', 'Adobe flash cs3', 'Adobe Flash (formerly Macromedia Flash) is a multimedia platform used to add animation, video, and interactivity to Web pages', 34999, 'package_logo/icon_adobeflashCS4.png'),
(22, 'Software', 'Oracle 10g', 'The Oracle Database is a relational database management system.', 101000, 'package_logo/oracle 10g'),
(121, 'Software', 'Roxio Creator', 'Pro-quality projects with video, audio and photos', 7000, 'package_logo/roxio.jpg'),
(24, 'Software', 'Adobe Flash cs4', 'It is a multimedia platform used to add   animation, video, and interactivity to Web pages.', 35926, 'package_logo/Adobe Flash cs4'),
(25, 'Software', 'Adobe Dreamweaver cs4', 'It is a web development   application.', 26359, 'package_logo/Dreamweaver'),
(26, 'Software', 'Macromedia flash 8', 'It is a multimedia platform used to add   animation, video, and interactivity to Web page.', 7600, 'package_logo/macromedia flash 8.jpg'),
(27, 'Software', 'VideoLAN', 'It is a product that develops software for playing video and other media formats   across a local area network', 3925, 'package_logo/vediolan.jpg'),
(28, 'Software', 'Poster Forge', 'It is a software program for quick Making of professional looking Posters', 6040, 'package_logo/poster forge.jpg'),
(29, 'Software', 'Netbeans IDE 3.5', 'A platform for developing software using Open source languages.', 6099, 'package_logo/3.5.png'),
(30, 'Software', 'Microsoft Office 2007', 'is a Windows version of the Microsoft Office System', 7025, 'package_logo/microsoft-office-2007-logo.png'),
(31, 'Software', 'Drupal', 'is a content management system', 6499, 'package_logo/drupal_makes_me_hapi.jpg'),
(36, 'Software', 'CorelDRAW Premium Suite X5', 'Professional graphic design, website creation, video editing and flash animation software', 36100, 'package_logo/63816_CorelDRAWGraphicsSuiteX5box01.jpg'),
(33, 'Software', 'Adobe Fireworks', 'Adobe Fireworks (formerly Macromedia Fireworks) is a bitmap and vector graphics editor.', 4500, 'package_logo/AdobeFireworksCS3.png'),
(34, 'Software', 'Adobe Indesign cs5', 'Adobe InDesign is a software application produced by Adobe Systems. It can be used to create works such as posters, flyers, brochures, magazines and books.', 7100, 'package_logo/indesign.jpg'),
(37, 'Software', ' VideoStudio Pro X3', 'Powerful video-editing software for creating high-quality HD and standard-definition movies, slideshows and DVDs', 3800, 'package_logo/dbtwec.jpg'),
(38, 'Software', 'WinZip 14.5', 'File compression, file encryption and data backup', 2999, 'package_logo/winzip.png'),
(39, 'Software', 'MATLAB 7', 'numerical computing environment and fourth-generation programming language', 100999, 'package_logo/matlab7_logo.jpg'),
(40, 'Software', 'Corel Digital Studio 2010', 'Photo editing, video editing, DVD burning and DVD playback in one simple multimedia suite', 7799, 'package_logo/corel-digital-studio-multilingual-1.jpg'),
(41, 'Software', 'Windows 7 Utimate', 'is the latest release of Microsoft Windows, a series of operating systems ', 12799, 'package_logo/windows-7-ultimate.png'),
(42, 'Software', 'Windows 7 Home Premium', 'latest release of Microsoft Windows, a series of operating systems', 7799, 'package_logo/images (1).jpg'),
(43, 'Software', 'Adobe After Effects CS5', 'collection of graphic design, video editing, and web development applications', 38000, 'package_logo/cfb54_vhbwv5.jpg'),
(44, 'Software', 'Autodesk Maya', 'is a software application used for 3D animation, 3D modeling, simulation, visual effects, rendering, match moving, and compositing', 205800, 'package_logo/autodesk_maya_2009.jpg'),
(45, 'Software', 'Adobe Flash Builder ', 'AdobeÂ® FlashÂ® Builderâ„¢ 4.5.1 for PHP, which includes a tightly integrated Zend Studio 8, enables you to run a single code base on multiple devices, including iOS, Android and Blackberry Tablet.  ', 38950, 'package_logo/flash builder.jpg'),
(46, 'Software', 'Zend Studio 7', 'Zend Studio is our professional-grade PHP IDE. It has been designed to maximize developer productivity by enabling you to develop and maintain code faster', 17500, 'package_logo/zend-studio.jpg'),
(47, 'software', 'php storm', 'PhpStorm provides rich and intelligent code editor for PHP with syntax highlighting, extended code formatting configuration, on-the-fly error checking, and smart code completion.', 18000, 'package_logo/phpstorm.png'),
(48, 'Software', 'IntelliJ IDEA', 'the best Java IDE on the market. With its industry-leading features, IntelliJ IDEA relieves Java programmers of time consuming routine tasks, remarkably boosting their productivity.', 27999, 'package_logo/idea-icon.png'),
(49, 'software', 'RubyMine', 'RubyMine â€” Ruby and Rails IDE providing the most essential tools for developers, all integrated together to ensure a convenient environment for Web development with Ruby on Rails.', 13000, 'package_logo/rubymine_150.png'),
(50, 'Software', 'PyCharm', 'Lightweight IDE for Python programming language with support of Web development with Django framework and Google App Engine.', 11500, 'package_logo/phycharm.jpg'),
(51, 'Software', 'dotPeeK', 'Free .NET decompiler that is empowered with ReSharper-style navigation and displays decompiled code as C#.', 18000, 'package_logo/dotPeek.gif'),
(52, 'Software', 'Roxio Creator 2012', 'Enhance, preserve, capture and share your digital media', 7499, 'package_logo/t_Roxio-Creator-2012-Pro-8369.jpg'),
(53, 'Software', 'Pinnacle Studio HD', 'Quickly import videos and photos from a wide range of devicesâ€”then edit scenes and create professional-looking HD movies with over 1,800 included effects, titles, and other content.', 6000, 'package_logo/pinnacle studio.jpeg'),
(54, 'Software', 'Microsoft Office Visio', 'Build diagram with professional-looking templates and modern, pre-drawn shapes. ', 57000, 'package_logo/4.jpg'),
(55, 'Software', 'Adobe Kuler', 'Discover Adobe Kuler â€” the web-hosted application for generating color themes that can inspire any project.', 27000, 'package_logo/adobe kuler.jpeg'),
(56, 'Software', 'Adobe Soundbooth CS5', 'to edit, repair, and enhance audio. Record voiceovers, remove unwanted noises, add effects, and integrate professional sounding audio projects in other Creative Suite applications.', 19500, 'package_logo/adobe soundbooth.jpeg'),
(57, 'Software', 'Adobe  Audition  CS5.5 ', 'delivers the professional tools you need to make your video and audio productions sound their best. Handle a wide range of audio production tasks efficiently, including recording, mixing, and sound restoration.', 23500, 'package_logo/adobe audition.jpeg'),
(58, 'Software', 'toon Boom Studio 4', 'Toon Boom Studio is one of the best animation programs for internet users, and is well known for its depth and quality of their technical support.', 19000, 'package_logo/toon boom.jpeg'),
(59, 'software', 'ZBrush', 'ZBrush is a digital sculpting tool that combines 3D/2.5D modeling, texturing and painting', 36000, 'package_logo/zbrush.jpeg'),
(60, 'software', 'SolidWorks', 'SolidWorks is a 3D mechanical CAD (computer-aided design) program that runs on Microsoft Windows', 25000, 'package_logo/solidworks.jpeg'),
(61, 'software', 'Komodo', 'Phython Commercial; integrated debugger; interfaces with Qt Designer ', 17750, 'package_logo/komodo.jpeg'),
(62, 'software', 'Sony Vegas Movie Studio', 'Edit video in nearly any format including HDV and AVCHD. Powerful features for video compositing, color correction, and soundtrack creation ', 7509, 'package_logo/sony vegas.jpeg'),
(63, 'software', 'Sony Media Acid Pro', 'ACID Pro 7 software is a DAW powerhouse that combines full multitrack recording and mixing, MIDI sequencing, and legendary ACID looping functionality for a seamless music-creation ', 17590, 'package_logo/39649-sony-media-acid-pro-7-thumb.jpg'),
(64, 'software', 'Adobe Captivate 5.0', 'the best solution in the industry for the rapid creation and maintenance of professional projects for e-learning without having to write code. ', 57000, 'package_logo/adobe captivate.jpeg'),
(65, 'software', 'Autodesk AutoSketch', 'AutoSketch 9 software provides a comprehensive set of CAD tools for creating precision drawings...', 13500, 'package_logo/autosketch.jpeg'),
(66, 'software', 'Zend Server Basic', 'Zend Server helps deliver PHP applications faster and better throughout every phase of the application lifecycle. ', 86000, 'package_logo/zend server.gif'),
(67, 'Software', 'Microsoft Visual FoxPro 9.0', 'database server', 88999, 'package_logo/1254660569_fjqa6d.jpg'),
(68, 'software', 'MS SQL Server 2008', ' is a relational model database server produced by Microsoft.', 48500, 'package_logo/1425.sqlserver2008logo_5F00_6957E50A.png'),
(69, 'sotware', 'Tally.ERP 9.0', 'An accountancy tool for business related solutions ', 40400, 'package_logo/tally.jpg'),
(70, 'software', 'MS Project 2010 Professional', 'is a project management software program designed to assist project managers in developing plans, assigning resources to tasks, tracking progress, managing budgets and analyzing workloads.', 47700, 'package_logo/en-US111_Office_Project_Pro_2010_H30-02670.png'),
(71, 'software', 'Busy Accounting 3.6 Standard', 'Accounting Software with Multi-location Inventory', 29999, 'package_logo/29arvwj.jpg.png'),
(72, 'software', 'AutoCAD--2011(commercial)', 'software application for 2D and 3D design and drafting', 160000, 'package_logo/images (2).jpg'),
(73, 'software', 'Adobe Photoshop CS5', ' is a graphics editing program developed and published by Adobe Systems Incorporated', 20200, 'package_logo/images (3).jpg'),
(74, 'hardware', 'intel core i-7 extreme (965)', 'the best processor of intel family.', 57700, 'package_logo/intel-core-i7-930-.jpg'),
(75, 'software', 'Microsoft Expression Studio 3', ' designing for standards-based Web sites, rich desktop experiences, or Silverlight. Includes Expression Web, Expression Blend, Expression Design and Expression Encoder.', 35800, 'package_logo/images.jpg'),
(76, 'Software', 'Adobe photoshop lightroom 3', 'Adobe Photoshop Lightroom is a photography software program developed by Adobe Systems for Mac OS X and Microsoft Windows, designed to assist professional photographers in managing thousands of digital images.', 27000, 'package_logo/Lightroom_3_Logo.PNG'),
(77, 'Software', 'Adobe Encore CS5', 'Adobe Encore (previously Adobe Encore DVD) is a DVD authoring software tool produced by Adobe Systems and targeted at professional video producers.', 44000, 'package_logo/icon_cs5encore.png'),
(78, 'software', 'Autodesk Inventor', 'Autodesk Inventor, developed by U.S.-based software company Autodesk, is a 3D mechanical solid modeling design software for creating 3D digital prototypes .', 49000, 'package_logo/AutodeskInventorLogo.png'),
(79, 'Software', 'Autodesk 3ds Max', 'Autodesk 3ds Max, formerly 3D Studio MAX, is a modeling, animation and rendering package developed by Autodesk Media and Entertainment. ', 39000, 'package_logo/3dsmaxlogob_2.jpg'),
(80, 'Software', 'corel paintshop photo pro x3', 'Paint Shop Pro (PSP) is a raster graphics editor and, later in the series, a vector graphics editor for computers running the Microsoft Windows operating system.', 18000, 'package_logo/Corel_PaintShop_Photo_Pro_X3_01.jpg'),
(81, 'Software', 'corel painter 11', 'Corel Painter is a raster-based digital art application created to simulate as accurately as possible the appearance and behavior of traditional media associated with drawing, painting, and printmaking. ', 27000, 'package_logo/Corel-Painter-112.jpg'),
(82, 'software', 'PaintShop Photo Express 2010', 'photos and video editing software.', 14000, 'package_logo/1518555.jpg'),
(83, 'software', 'corel grafigo 2', 'Corel Grafigo 2 lets you capture ideas, annotate documents and collaborate with others Ã¢â‚¬â€ all from your tablet pc.', 17540, 'package_logo/grafigo.jpg'),
(84, 'software', 'Corel knockout 2', 'Professional image masking plug-in.', 20000, 'package_logo/corel-knockout-2-box.jpg'),
(85, 'Software', 'Corel ventura 10', 'The only tool you need for transforming long, complex documents into highly formatted and visually rich publications.', 39000, 'package_logo/31KQqoLI2oL._SL500_AA300_.jpg'),
(86, 'Software', 'Corel animation shop', 'used for making complex gif images.', 27000, 'package_logo/bs_AnimationShop3_lg.jpg'),
(92, 'Software', 'Adobe Authorware 7', ' flowchart based, graphical programming language. Authorware is used for creating interactive programs that can integrate a range of multimedia content, particularly e-learning applications. ', 44000, 'package_logo/aw.jpg'),
(89, 'software', 'Adobe bussiness catalyst', 'Business Catalyst is a hosted (SaaS) all-in-one solution for building and managing business websites.', 54000, 'package_logo/n308682304888_852.jpg'),
(90, 'Software', 'Adobe JRun 4', 'JRun is a J2EE application server.', 49000, 'package_logo/Adobe_JRun_5.png.jpg'),
(93, 'Software', 'JBuilder', ' is a complete Java IDE for EJB, Web and Web Services, offering integration with application servers (namely BEA Weblogic)', 17999, 'package_logo/jbuilder.jpg'),
(94, 'Software', 'Adobe Flash CS5', 'is a multimedia authoring program used to create content for the Adobe Engagement Platform, such as web applications, games and movies, and content for mobile phones and other embedded devices.', 49999, 'package_logo/flashcs5.jpg'),
(95, 'Software', 'Adobe Dreaweaver CS5', 'is a proprietary web development application originally created by Macromedia, and is now developed by Adobe Systems, which acquired Macromedia in 2005.', 38999, 'package_logo/images1.jpg'),
(96, 'hardware', 'ASUS GeForce GTX 590 ', 'Full throttle overclocking with exclusive ASUS Voltage \r\nTweak via Smart Doctor â€“ boosting 50%* more speed, \r\nperformance and satisfaction! ', 41500, 'package_logo/nvidia gtx 590.jpeg'),
(97, 'hardware', 'MSI GeForce GT 430 ', 'The new GeForce GT 430 comes to replace the GeForce GT 220, which is a DirectX 10.1 part.', 11000, 'package_logo/The new GeForce GT 430 comes to replace the GeForce GT 220.jpeg'),
(110, 'software', 'PocketBuilder', 'A rapid application development tool for building mobile and wireless applications.', 27000, 'package_logo/pocketbuilder.jpg'),
(99, 'software', 'Nusphere PhpED', 'NuSphere is provider of the best PHP Tools, the home of PhpED - state of the art PHP Edito', 26000, 'package_logo/Nusphere.jpg'),
(100, 'software', 'CodeLobster ', 'Codelobster PHP Edition streamlines and simplifies php development process.', 4000, 'package_logo/codeLobster.jpg'),
(101, 'software', 'RadPHP XE2', 'RadPHP XE2 provides the fastest way to build Web, Facebook, and mobile applications with the only visual PHP framework and IDE for Web and mobile', 18000, 'package_logo/radphp.jpg'),
(102, 'software', 'Embarcadero Prism XE2', 'Embarcadero Prismâ„¢ XE2 Enterprise is designed for developers building data-driven and multi-tier Web and database applications.', 75950, 'package_logo/prism.jpg'),
(103, 'software', 'CodeGear 3rdRail', 'CodeGear 3rdRail is the intuitive IDE that delivers the power you need to dramatically accelerate Ruby on Railsâ„¢ web development.', 11000, 'package_logo/codeGear.jpg'),
(104, 'software', 'InterBase XE Desktop', 'InterBase XE Desktop Edition is a powerful, cost effective DBMS for standalone applications	', 44000, 'package_logo/Interbase.jpg'),
(105, 'software', 'Mathcad', 'Mathcad simplifies engineering calculations by combining equations, text and graphics in a presentable format, making it easy to keep track of the most complex calculations for verification and validation.', 36500, 'package_logo/mathcad.jpg'),
(106, 'software', 'SPSS', 'Predictive analytics helps your organization anticipate change so that you can plan and carry out strategies that improve outcomes.', 8000, 'package_logo/spss.jpg'),
(107, 'software', 'Clustrix', 'Clustrix makes the leading NewSQL Database that''s distributed for scale,performance, fault tolerance, and high availability.', 36000, 'package_logo/clustrix.jpg'),
(111, 'software', 'Intuit Quicken Deluxe', 'Organize all your accounts bank, credit card, investments, loans, retirement accounts all in one place', 8500, 'package_logo/quicken.jpg'),
(112, 'software', 'Cisco Catalyst 3750', 'Cisco system software provides common functionality, scalability, and security for Cisco products and allows centralized, integrated, and automated installation and management of networks.', 55000, 'package_logo/cisco catalyst.jpg'),
(113, 'software', 'IMSI TurboFLOORPLAN', 'TurboFLOORPLAN 3D Home & Landscape Pro is a landscape design software. More professional quality \r\ntools make it easy to quickly layout your dream home to exact specifications', 13700, 'package_logo/turboFloor plam.jpg'),
(114, 'software', 'Sage Peachtree ', 'Sage Peachtree Pro Accounting, plus in-depth inventory and job costing capabilities, online bank reconciliation, electronic bill pay.', 14400, 'package_logo/sagepeachtree.jpg'),
(119, 'Software', 'EduOS', 'Education based OS', 176000, 'package_logo/EduOS.jpg'),
(120, 'Software', 'Cold Fusion', 'Build, Deploy and Maintenance of JAVA-EE Applications', 196000, 'package_logo/cold fusion.png'),
(116, 'software', 'Microsoft Picture It!', 'Picture It! Photo Premium''s powerful photo-editing tools and built-in wizards make it easy for everyone to improve their photos. ', 18700, 'package_logo/pictureut.jpg'),
(117, 'software', 'Microsoft Works 9', 'including word processor, spreadsheet, database, and calendar.', 14000, 'package_logo/works9.jpg'),
(118, 'software', 'Netbeans 7.0', 'both a platform framework for Java desktop applications, and an integrated development environment (IDE) for developing with Java', 18999, 'package_logo/netbeans7.jpg'),
(122, 'Software', 'Acronis Vm Protect', 'Protection of VMWARE, backup of data', 27000, 'package_logo/acronis.jpg'),
(123, 'Software', 'Quick Books', 'Organizing Business finances', 13500, 'package_logo/Quick.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `uid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(10) NOT NULL,
  `nick` varchar(100) NOT NULL DEFAULT 'player',
  `email` varchar(100) NOT NULL,
  `college` varchar(100) NOT NULL,
  `battery` int(4) NOT NULL,
  `experience` int(4) NOT NULL,
  `money` int(4) NOT NULL,
  `firstlogin` datetime NOT NULL,
  `latestlogin` datetime NOT NULL,
  `flag` int(1) NOT NULL,
  `pic` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `pid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cid` int(10) NOT NULL,
  `battery` int(10) NOT NULL,
  `experience` int(10) NOT NULL,
  `money` int(20) NOT NULL,
  `members` int(5) NOT NULL,
  `level` int(5) NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `per_done` float NOT NULL,
  `money_gain` int(8) NOT NULL,
  `released_time` datetime NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`pid`, `name`, `description`, `cid`, `battery`, `experience`, `money`, `members`, `level`, `is_visible`, `is_new`, `per_done`, `money_gain`, `released_time`) VALUES
(43, 'Logo Making', 'Using Adobe Indesign and PosterForge', 98, 28, 6, 5000, 1, 1, 1, 1, 7.15, 357, '0000-00-00 00:00:00'),
(4, 'Web Development', 'Drupal And Dreamweaver', 20, 26, 10, 4500, 1, 1, 1, 1, 7.7, 346, '0000-00-00 00:00:00'),
(5, 'Website Development', 'using indesign and posterforge', 16, 34, 12, 3000, 1, 1, 1, 1, 5.89, 176, '0000-00-00 00:00:00'),
(93, 'Data Feeding', 'Data manipulation and maintaining the records.', 79, 12, 0, 1800, 1, 0, 1, 0, 16.67, 300, '0000-00-00 00:00:00'),
(7, 'Product DBMS', 'using inventory', 27, 22, 5, 6500, 1, 1, 1, 1, 9.1, 590, '0000-00-00 00:00:00'),
(45, 'Software Development', 'uisng netbeans and dreamweaver', 28, 34, 9, 13500, 1, 1, 1, 1, 5.89, 794, '0000-00-00 00:00:00'),
(47, 'Basic Browser Development', 'using Visual Studio', 29, 34, 8, 5500, 1, 1, 1, 1, 5.89, 323, '0000-00-00 00:00:00'),
(10, 'Flash Games', 'using macromediaflasg', 52, 24, 7, 4500, 1, 1, 1, 1, 8.34, 375, '0000-00-00 00:00:00'),
(11, 'Poster Making', 'using photoshop and coffee cup', 75, 28, 9, 7000, 1, 1, 1, 1, 7.15, 500, '0000-00-00 00:00:00'),
(48, 'Media Streaming', '', 17, 34, 6, 9000, 1, 1, 1, 1, 5.89, 529, '0000-00-00 00:00:00'),
(13, 'Database Management', 'using visual studio and oracle', 19, 38, 12, 15000, 1, 2, 1, 1, 5.27, 789, '0000-00-00 00:00:00'),
(14, 'CMS development', '', 24, 28, 12, 4000, 1, 1, 1, 1, 7.15, 285, '0000-00-00 00:00:00'),
(15, 'Graphic designing', '', 42, 32, 8, 20000, 1, 2, 1, 1, 6.25, 1250, '0000-00-00 00:00:00'),
(16, 'compilation of linux drivers', '', 20, 24, 11, 7000, 1, 1, 1, 1, 8.34, 583, '0000-00-00 00:00:00'),
(17, 'Data Entry', '', 87, 20, 12, 13000, 1, 1, 1, 1, 10, 1300, '0000-00-00 00:00:00'),
(18, 'ERP suite Development', '', 33, 14, 5, 4500, 1, 1, 1, 1, 14.29, 642, '0000-00-00 00:00:00'),
(49, 'circuit designing ', '70', 70, 40, 24, 15000, 2, 2, 1, 1, 5, 750, '0000-00-00 00:00:00'),
(50, 'Lan talk Application', '', 60, 30, 18, 20000, 2, 2, 1, 1, 6.67, 1333, '0000-00-00 00:00:00'),
(53, 'Billing Management', 'Hospitals', 31, 34, 12, 10000, 1, 1, 1, 1, 5.89, 588, '0000-00-00 00:00:00'),
(23, 'Mangement System of Bills', 'chemist shops', 89, 38, 18, 14000, 2, 1, 1, 1, 5.27, 736, '0000-00-00 00:00:00'),
(52, 'Entry of Data', '', 72, 18, 15, 15000, 1, 1, 1, 1, 11.12, 1668, '0000-00-00 00:00:00'),
(25, 'Vector Graphic Editing', '', 23, 22, 8, 3500, 1, 1, 1, 1, 9.1, 318, '0000-00-00 00:00:00'),
(54, 'Flyers and graphic editing', '', 51, 22, 10, 3000, 1, 1, 1, 1, 9.1, 272, '0000-00-00 00:00:00'),
(55, 'Poster Making', '', 76, 14, 5, 2500, 1, 1, 1, 1, 14.29, 357, '0000-00-00 00:00:00'),
(28, 'Audting Software Development', 'accounting', 47, 38, 12, 11500, 1, 1, 1, 1, 5.27, 605, '0000-00-00 00:00:00'),
(56, 'Employee Database Management ', '', 21, 20, 13, 11200, 1, 1, 1, 1, 10, 1120, '0000-00-00 00:00:00'),
(30, 'Animated Games', 'using FLAsh', 74, 42, 17, 15000, 1, 2, 1, 1, 4.77, 714, '0000-00-00 00:00:00'),
(57, 'Telecomm Billing system', '', 87, 30, 12, 11500, 1, 1, 1, 1, 6.67, 766, '0000-00-00 00:00:00'),
(32, 'Telecomm Billing system', 'hard', 61, 48, 24, 15800, 2, 2, 1, 1, 4.17, 658, '0000-00-00 00:00:00'),
(58, 'Data backup & File compression', '', 81, 26, 6, 3800, 1, 1, 1, 1, 7.7, 292, '0000-00-00 00:00:00'),
(34, 'Automation system Development ', 'oracle as database,flash,dreamweaver', 69, 70, 33, 24000, 2, 3, 1, 1, 2.86, 685, '0000-00-00 00:00:00'),
(35, 'Video-editing & slideshow maker', '', 47, 28, 8, 8700, 1, 1, 1, 1, 7.15, 621, '0000-00-00 00:00:00'),
(59, 'Lan video-confrencing software', '', 25, 52, 21, 19700, 1, 2, 1, 1, 3.85, 757, '0000-00-00 00:00:00'),
(60, 'Service Automatic Help', 'after interpreting messaged store that into database', 80, 58, 18, 19000, 1, 2, 1, 1, 3.45, 655, '0000-00-00 00:00:00'),
(38, 'Technical Computing', 'using MATLAB', 59, 48, 22, 15500, 1, 2, 1, 1, 4.17, 645, '0000-00-00 00:00:00'),
(46, 'Development of Basic Browser', '', 71, 38, 18, 17000, 1, 1, 1, 1, 5.27, 894, '0000-00-00 00:00:00'),
(61, 'HD Gaming & Video Development', 'using After effects & matlab', 100, 58, 35, 18000, 1, 2, 1, 1, 3.45, 620, '0000-00-00 00:00:00'),
(41, ' Computer graphics and animation', 'Autodesk Maya', 61, 64, 24, 28000, 2, 3, 1, 1, 3.13, 875, '0000-00-00 00:00:00'),
(63, 'Flash Game Development', '', 77, 46, 21, 12500, 1, 3, 1, 0, 4.35, 543, '0000-00-00 00:00:00'),
(64, 'Web publishing', 'using Pycharm,Komodo', 61, 28, 10, 12000, 1, 1, 1, 0, 8, 857, '0000-00-00 00:00:00'),
(65, '3D Game development', 'using zbrush,solidworks', 64, 44, 14, 19000, 1, 2, 1, 0, 5, 863, '0000-00-00 00:00:00'),
(66, 'Animated Commercials', 'using adobe audition & sony acid for sound mixing and toon boom for animation', 58, 32, 18, 15000, 1, 2, 1, 0, 7, 937, '0000-00-00 00:00:00'),
(67, 'PHP Website Designing', 'Using Adobe Flash Builder,and mysql server and corel painter', 40, 36, 24, 16000, 1, 2, 1, 0, 5.56, 888, '0000-00-00 00:00:00'),
(68, 'J2EE Application Development', 'using IntelliJ IDEA as IDE and JRun as App server and ', 92, 48, 22, 27000, 1, 3, 1, 0, 4.17, 1125, '0000-00-00 00:00:00'),
(69, 'Internet  Banking  Portal', 'SSL encrypted portal for money transfer so Jsp server required.', 76, 34, 14, 16000, 1, 2, 1, 0, 5.89, 941, '0000-00-00 00:00:00'),
(70, 'Stock Market portal', 'using Adobe catalyst and tally erp 9.0', 72, 34, 18, 19000, 1, 2, 1, 0, 6, 1117, '0000-00-00 00:00:00'),
(71, 'Cartoon Animation', 'evelopment of basic level animated video clip', 25, 38, 18, 17000, 1, 2, 1, 0, 6, 894, '0000-00-00 00:00:00'),
(72, 'HD Video Editing', 'devloping video clips of Hd format', 69, 24, 10, 9000, 1, 1, 1, 0, 9, 750, '0000-00-00 00:00:00'),
(73, 'Automated Project maintenance', 'using captivate and Kuler', 73, 40, 20, 20000, 1, 2, 1, 0, 5, 1000, '0000-00-00 00:00:00'),
(74, 'Project management', 'using Ms Project', 94, 26, 13, 14000, 1, 1, 1, 0, 7.7, 1076, '0000-00-00 00:00:00'),
(75, 'Finance management', 'using busy accounting', 59, 24, 10, 12000, 1, 1, 1, 0, 9, 1000, '0000-00-00 00:00:00'),
(76, '3D mechanical designing', 'using inventor', 93, 38, 18, 17500, 1, 2, 1, 0, 5.27, 921, '0000-00-00 00:00:00'),
(77, ' E-Learning Applications', 'Rich media appls using authorware', 30, 32, 12, 19000, 1, 2, 1, 0, 6.25, 1187, '0000-00-00 00:00:00'),
(78, 'Online Shopping Portal', 'using zend server and zend studio ', 65, 44, 26, 24000, 1, 3, 1, 0, 4.55, 1090, '0000-00-00 00:00:00'),
(79, '3D design and drafting ', 'using autocad', 24, 42, 34, 30000, 1, 3, 1, 0, 5, 1428, '0000-00-00 00:00:00'),
(80, 'Static  .NET decompilation', 'using dotpeek', 66, 34, 16, 13000, 2, 2, 1, 0, 5.89, 764, '0000-00-00 00:00:00'),
(81, '3D modeling & simualtion', 'using maya', 77, 42, 27, 28000, 1, 3, 1, 0, 5, 1333, '0000-00-00 00:00:00'),
(82, 'Simualtion game Development', 'using dreamweaver and clustrix', 62, 38, 18, 16000, 1, 2, 1, 0, 5.27, 842, '0000-00-00 00:00:00'),
(83, 'Image Masking', 'usinf grafigo', 36, 32, 12, 11200, 1, 1, 1, 1, 6.25, 700, '0000-00-00 00:00:00'),
(84, 'Wallpaper Making', 'using lightroom,ventura', 23, 26, 10, 14000, 1, 2, 1, 0, 8, 1076, '0000-00-00 00:00:00'),
(85, 'Ruby Web Development', 'using RubyMine and 3rd rail', 81, 34, 15, 14000, 1, 2, 1, 0, 5.89, 823, '0000-00-00 00:00:00'),
(86, 'Mobile App Development', 'using pocketbuilder and RADPhp', 58, 44, 19, 12000, 1, 2, 1, 0, 4.55, 545, '0000-00-00 00:00:00'),
(87, 'E-Banking Reconciliation', 'using Sage Peachtree and ', 45, 48, 19, 8500, 1, 1, 1, 0, 4.17, 354, '0000-00-00 00:00:00'),
(88, 'E-bill payment portal', 'using 	Embarcadero Prism XE2 and Nusphere PhpED', 75, 40, 18, 18000, 1, 2, 1, 0, 5, 900, '0000-00-00 00:00:00'),
(89, 'Sales Software', 'using CodeLobster and MS works as DB', 97, 24, 6, 4500, 1, 1, 1, 0, 8.34, 375, '0000-00-00 00:00:00'),
(90, 'Graphic designing', 'using corel', 52, 34, 13, 14000, 1, 2, 1, 0, 5.89, 823, '0000-00-00 00:00:00'),
(91, 'EJB Applications', 'using NetBeans 7.0 and InterBase XE Desktop', 63, 30, 15, 14000, 1, 2, 1, 0, 7, 933, '0000-00-00 00:00:00'),
(92, 'Sales portal', 'using php storm ', 67, 36, 17, 19000, 1, 2, 1, 0, 6, 1055, '0000-00-00 00:00:00'),
(96, 'Microsoft Powerpoint Presentation ', '', 101, 10, 0, 1600, 1, 0, 1, 0, 20, 320, '0000-00-00 00:00:00'),
(95, 'Documentation of the products. ', '', 80, 16, 0, 2200, 1, 0, 1, 0, 12.5, 275, '0000-00-00 00:00:00'),
(97, 'Academica', 'Educational Institute modules development.', 101, 50, 30, 35000, 1, 3, 1, 0, 4, 1400, '0000-00-00 00:00:00'),
(98, 'Networks Management ', 'Automated installation and management of networks. ', 38, 44, 19, 16700, 1, 2, 1, 0, 4.55, 759, '0000-00-00 00:00:00'),
(99, 'Developing an Application', 'Developing a java application', 2, 66, 29, 25000, 1, 3, 1, 0, 3.04, 757, '0000-00-00 00:00:00'),
(100, 'Directory Management', 'using win 7 and acronics', 39, 36, 10, 12000, 1, 1, 1, 0, 5.56, 666, '0000-00-00 00:00:00'),
(101, 'Business Financing', '', 41, 34, 14, 14000, 1, 1, 1, 0, 5.89, 823, '0000-00-00 00:00:00'),
(102, 'Economic Assistance for Businesses', '', 42, 30, 8, 12000, 1, 1, 1, 0, 6.67, 800, '0000-00-00 00:00:00'),
(103, 'Engineering Support', '', 22, 48, 20, 19000, 1, 2, 1, 0, 4.17, 791, '0000-00-00 00:00:00'),
(104, 'Network Management', '', 91, 40, 15, 10000, 1, 2, 1, 0, 5, 500, '0000-00-00 00:00:00'),
(105, 'Animation Support', '', 95, 50, 17, 17000, 1, 2, 1, 0, 4, 680, '0000-00-00 00:00:00'),
(106, 'Website Development', '', 96, 38, 15, 13000, 1, 1, 1, 0, 5.27, 684, '0000-00-00 00:00:00'),
(107, 'Account Management', '', 90, 30, 6, 4500, 1, 1, 1, 0, 6.67, 300, '0000-00-00 00:00:00'),
(108, 'Game Development', '', 99, 46, 18, 19500, 1, 2, 1, 0, 4.35, 847, '0000-00-00 00:00:00'),
(109, 'Providing IT Solutions', '', 101, 40, 22, 18000, 1, 2, 1, 0, 5, 900, '0000-00-00 00:00:00'),
(110, 'School Management System', '', 37, 64, 36, 30000, 1, 3, 1, 0, 3.13, 937, '0000-00-00 00:00:00'),
(111, 'Image Processing', '', 13, 26, 12, 10000, 1, 1, 1, 0, 7.7, 769, '0000-00-00 00:00:00'),
(112, 'Web Development', '', 15, 24, 9, 15000, 1, 1, 1, 0, 8.34, 1250, '0000-00-00 00:00:00'),
(113, 'Accounting', '', 44, 28, 18, 16000, 1, 2, 1, 0, 7.15, 1142, '0000-00-00 00:00:00'),
(114, 'Audio and Vedio Editing', '', 68, 38, 25, 23000, 1, 2, 1, 0, 5.27, 1210, '0000-00-00 00:00:00'),
(115, 'Building Design', '', 14, 24, 13, 11000, 1, 1, 1, 0, 8.34, 916, '0000-00-00 00:00:00'),
(116, 'Database Design', '', 18, 34, 22, 22500, 1, 2, 1, 0, 5.89, 1323, '0000-00-00 00:00:00'),
(119, 'Database Management', '', 26, 48, 29, 34500, 1, 3, 1, 0, 4.17, 1437, '0000-00-00 00:00:00'),
(120, 'Network Managemnet', '', 34, 36, 26, 21600, 1, 2, 1, 0, 5.56, 1200, '0000-00-00 00:00:00'),
(121, 'Payment Gateway', '', 32, 26, 16, 24900, 1, 2, 1, 0, 7.7, 1915, '0000-00-00 00:00:00'),
(122, 'Poster Making', '', 35, 28, 13, 23700, 1, 1, 1, 0, 7.15, 1692, '0000-00-00 00:00:00'),
(123, 'Web Development', '', 35, 24, 14, 14700, 1, 1, 1, 0, 8.34, 1225, '0000-00-00 00:00:00'),
(124, 'Automation', '', 18, 32, 27, 26000, 1, 3, 1, 0, 6.25, 1625, '0000-00-00 00:00:00'),
(125, 'Game Animation', '', 83, 28, 18, 17800, 1, 2, 1, 0, 7.15, 1271, '0000-00-00 00:00:00'),
(126, 'Poster Designing', '', 88, 26, 17, 15000, 1, 2, 1, 0, 7.7, 1153, '0000-00-00 00:00:00'),
(127, 'Video Editing', '', 50, 26, 18, 17500, 1, 2, 1, 0, 7.7, 1346, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_requirement`
--

CREATE TABLE IF NOT EXISTS `project_requirement` (
  `pid` int(10) NOT NULL,
  `package_id` int(10) NOT NULL,
  PRIMARY KEY (`pid`,`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_requirement`
--

INSERT INTO `project_requirement` (`pid`, `package_id`) VALUES
(0, 0),
(4, 1),
(4, 31),
(4, 62),
(5, 28),
(5, 34),
(6, 26),
(7, 6),
(8, 2),
(8, 25),
(9, 29),
(10, 26),
(11, 4),
(11, 26),
(12, 27),
(13, 31),
(13, 37),
(13, 51),
(13, 52),
(13, 55),
(14, 11),
(14, 29),
(15, 18),
(15, 19),
(15, 26),
(16, 29),
(16, 47),
(17, 30),
(17, 48),
(18, 1),
(18, 2),
(19, 39),
(19, 80),
(20, 20),
(20, 41),
(23, 3),
(23, 5),
(23, 6),
(23, 29),
(24, 30),
(25, 33),
(25, 62),
(26, 86),
(27, 28),
(28, 3),
(28, 6),
(29, 21),
(30, 18),
(30, 80),
(31, 21),
(31, 29),
(32, 2),
(32, 41),
(32, 42),
(32, 80),
(32, 111),
(32, 114),
(33, 38),
(34, 2),
(34, 22),
(34, 24),
(34, 25),
(34, 41),
(34, 43),
(35, 37),
(35, 53),
(36, 2),
(36, 27),
(36, 40),
(36, 42),
(36, 67),
(37, 18),
(37, 33),
(37, 41),
(37, 54),
(37, 80),
(38, 26),
(38, 41),
(38, 42),
(38, 122),
(38, 123),
(40, 39),
(40, 42),
(40, 43),
(40, 80),
(41, 43),
(41, 44),
(43, 26),
(43, 28),
(43, 34),
(43, 81),
(45, 46),
(45, 81),
(46, 25),
(46, 29),
(47, 20),
(48, 27),
(48, 40),
(48, 58),
(49, 4),
(49, 5),
(49, 11),
(49, 41),
(50, 42),
(50, 45),
(50, 81),
(52, 30),
(52, 57),
(53, 3),
(53, 5),
(53, 6),
(54, 19),
(54, 21),
(54, 24),
(55, 28),
(56, 21),
(56, 56),
(57, 21),
(57, 29),
(57, 61),
(58, 38),
(59, 2),
(59, 26),
(59, 27),
(59, 40),
(59, 42),
(59, 54),
(60, 2),
(60, 18),
(60, 20),
(60, 33),
(60, 42),
(61, 42),
(61, 90),
(61, 93),
(63, 24),
(63, 33),
(63, 43),
(63, 102),
(64, 50),
(64, 61),
(65, 59),
(65, 60),
(66, 57),
(66, 58),
(66, 63),
(67, 45),
(67, 83),
(68, 48),
(68, 67),
(68, 82),
(68, 90),
(69, 65),
(69, 67),
(69, 90),
(69, 93),
(70, 3),
(70, 89),
(71, 73),
(71, 77),
(72, 53),
(72, 56),
(72, 62),
(73, 55),
(73, 64),
(74, 70),
(74, 89),
(75, 69),
(75, 71),
(76, 59),
(76, 78),
(77, 80),
(77, 92),
(78, 46),
(78, 66),
(78, 85),
(78, 94),
(79, 72),
(79, 74),
(79, 96),
(80, 20),
(80, 51),
(80, 75),
(81, 41),
(81, 44),
(81, 79),
(81, 97),
(82, 86),
(82, 95),
(82, 107),
(83, 83),
(83, 84),
(84, 76),
(84, 85),
(85, 49),
(85, 82),
(85, 107),
(86, 94),
(86, 101),
(86, 110),
(87, 49),
(87, 111),
(87, 114),
(88, 64),
(88, 100),
(88, 101),
(89, 52),
(89, 100),
(89, 117),
(90, 36),
(90, 113),
(91, 104),
(91, 118),
(92, 47),
(92, 73),
(92, 107),
(97, 119),
(98, 27),
(98, 50),
(98, 112),
(99, 102),
(99, 120),
(100, 41),
(100, 122),
(101, 3),
(101, 123),
(102, 106),
(102, 123),
(103, 59),
(103, 105),
(104, 74),
(104, 112),
(105, 18),
(105, 36),
(105, 121),
(106, 31),
(106, 36),
(107, 111),
(107, 114),
(108, 92),
(108, 94),
(109, 106),
(109, 119),
(110, 105),
(110, 106),
(110, 119),
(111, 4),
(111, 52),
(111, 73),
(111, 116),
(112, 1),
(112, 99),
(112, 101),
(113, 3),
(113, 69),
(113, 71),
(113, 111),
(113, 114),
(114, 56),
(114, 62),
(114, 73),
(114, 80),
(114, 81),
(114, 82),
(115, 60),
(115, 65),
(115, 113),
(116, 68),
(116, 104),
(116, 107),
(119, 22),
(119, 68),
(119, 89),
(120, 27),
(120, 112),
(120, 117),
(120, 118),
(121, 1),
(121, 2),
(121, 48),
(121, 93),
(121, 111),
(121, 114),
(122, 28),
(122, 34),
(122, 73),
(122, 76),
(123, 46),
(123, 99),
(123, 100),
(123, 101),
(123, 103),
(124, 48),
(124, 93),
(124, 118),
(124, 120),
(125, 74),
(125, 94),
(125, 96),
(125, 97),
(126, 73),
(126, 82),
(126, 84),
(126, 86),
(126, 116),
(127, 36),
(127, 37),
(127, 43),
(127, 62),
(127, 82),
(127, 121);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `status` int(11) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`status`, `detail`, `image`) VALUES
(1, '', 'sponsor_logo/l2.png');

-- --------------------------------------------------------

--
-- Table structure for table `undergoing`
--

CREATE TABLE IF NOT EXISTS `undergoing` (
  `uid` varchar(100) NOT NULL,
  `pid` varchar(4) NOT NULL,
  `percentagedone` int(4) NOT NULL,
  `starttym` datetime NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `undergoing_project`
--

CREATE TABLE IF NOT EXISTS `undergoing_project` (
  `uid` varchar(50) NOT NULL,
  `pid` int(10) NOT NULL,
  `percentage_done` float NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
  `update_text` varchar(200) NOT NULL,
  `is_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`update_text`),
  FULLTEXT KEY `update_text` (`update_text`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_text`, `is_visible`) VALUES
('', 0),
('<ul>\r\n<li>New Projects have been released, check it out to accelerate your experience.</li>\r\n<li>New Users will get initial balance of Rs. 100000.</li>\r\n<li>Job Bureau has started and will continue ti', 0),
('Event Job Bureau has started!\nExplore yours great world of job!', 1),
('Event Job Bureau has started!\nExplore yours great world of job!</br>Job bureau trials end at 11:59, 24/10/13.', 2),
('Job Bureau has started and will continue till 23:59 Nov 8th, 2012.', 0),
('Job Bureau is going to start at 5.00 pm, Nov 6, 2012.', 0),
('Job Bureau is going to start at 5.00 pm, Nov 6th 2012. ', 0),
('Job Bureau is temporarily down due to technical reasons, keep checking our facebook page for updates. We''re really sorry for inconvenience caused.', 0),
('Job Bureau Trials is going to start at 5:10 pm, Oct 23, 2013 .', 0),
('New Projects have been released, check it out to accelerate your experience.\r\n<br/>\r\nJob Bureau has started and will continue till 23:59 Nov 8th, 2012. ', 0),
('New Projects have been released, check it out to accelerate your experience. <br/>\r\nNew Users will get initial balance of Rs. 100000.<br/>\r\nJob Bureau has started and will continue till 23:59 Nov 8th,', 0),
('Offer of the day has been updated. Check it out.\r\n<br/>\r\nJob Bureau has started and will continue till 23:59 Nov 8th, 2012. ', 0),
('The game has been rolled back to 4:00 AM due to technical reasons.<br/>\r\nSorry for the inconvenience caused.<br/>\r\nJob Bureau will continue till 23:59 Nov 8th, 2012. ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_achievements`
--

CREATE TABLE IF NOT EXISTS `user_achievements` (
  `uid` varchar(50) NOT NULL,
  `aid` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_hour_offer`
--

CREATE TABLE IF NOT EXISTS `user_hour_offer` (
  `uid` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_package`
--

CREATE TABLE IF NOT EXISTS `user_package` (
  `uid` varchar(50) NOT NULL,
  `package_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `offerflag` int(1) DEFAULT NULL,
  PRIMARY KEY (`uid`,`package_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
