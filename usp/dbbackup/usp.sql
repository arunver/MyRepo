-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 11, 2014 at 02:28 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `usp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlevel`
--

CREATE TABLE IF NOT EXISTS `adminlevel` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `adminlevel`
--

INSERT INTO `adminlevel` (`id`, `name`, `status`) VALUES
(-1, 'Super Administrator', '1'),
(9, 'admin', '1'),
(10, 'mukesh', '1'),
(12, 'vishal', '1');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL DEFAULT '',
  `userType` enum('1','2') NOT NULL COMMENT '1=administrator 2=other User',
  `password` varchar(250) NOT NULL DEFAULT '',
  `emailId` varchar(250) NOT NULL DEFAULT '',
  `apiKey` varchar(100) NOT NULL,
  `hash` varchar(250) NOT NULL DEFAULT '',
  `adminLevelId` int(5) NOT NULL DEFAULT '0',
  `lastLogin` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addedBy` tinyint(2) NOT NULL DEFAULT '0',
  `modDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modBy` tinyint(2) NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `userName`, `userType`, `password`, `emailId`, `apiKey`, `hash`, `adminLevelId`, `lastLogin`, `addDate`, `addedBy`, `modDate`, `modBy`, `status`) VALUES
(1, 'admin', '1', '21232f297a57a5a743894a0e4a801fc3', 'ashish@appstudioz.com', '40D575CA-6690-28B3-5C54-A2CF83A8FDB8', 'ed74773056341c6a480133c9da61b9b4', -1, '2014-12-11 13:24:27', '2010-06-11 00:00:00', 1, '2013-07-31 18:08:27', 1, '1'),
(2, 'ashish', '2', '21232f297a57a5a743894a0e4a801fc3', 'ashish.joshi@infogain.com', '12345', '', 0, '2014-05-12 11:56:16', '2014-05-05 00:00:00', 0, '0000-00-00 00:00:00', 0, '1'),
(3, 'ashish8', '2', '21232f297a57a5a743894a0e4a801fc3', 'ashish.joshi@infogain.com', '12345', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `adminpermission`
--

CREATE TABLE IF NOT EXISTS `adminpermission` (
  `adminLevelId` int(11) NOT NULL DEFAULT '0',
  `menuid` int(5) NOT NULL DEFAULT '0',
  `add_record` enum('0','1') NOT NULL DEFAULT '0',
  `edit_record` enum('0','1') NOT NULL DEFAULT '0',
  `delete_record` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `adminpermission`
--

INSERT INTO `adminpermission` (`adminLevelId`, `menuid`, `add_record`, `edit_record`, `delete_record`) VALUES
(12, 1, '', '', ''),
(12, 2, '1', '1', '1'),
(12, 3, '', '', ''),
(12, 4, '1', '1', '1'),
(12, 62, '', '', ''),
(12, 63, '1', '1', '1'),
(12, 65, '', '', ''),
(12, 66, '1', '1', '1'),
(12, 86, '1', '1', '1'),
(12, 67, '', '', ''),
(12, 64, '1', '1', '1'),
(12, 69, '1', '1', '1'),
(12, 71, '1', '1', '1'),
(12, 72, '', '', ''),
(12, 75, '1', '1', '1'),
(12, 89, '1', '1', '1'),
(12, 77, '', '', ''),
(12, 78, '1', '1', '1'),
(12, 79, '1', '1', '1'),
(12, 82, '', '', ''),
(12, 80, '1', '1', '1'),
(12, 81, '1', '1', '1'),
(12, 83, '1', '1', '1'),
(12, 84, '1', '1', '1'),
(12, 85, '1', '1', '1'),
(12, 87, '', '', ''),
(12, 88, '1', '1', '1'),
(10, 1, '', '', ''),
(10, 2, '1', '1', '1'),
(10, 3, '', '', ''),
(10, 4, '1', '1', '1'),
(10, 62, '', '', ''),
(10, 63, '1', '1', '1'),
(10, 65, '', '', ''),
(10, 66, '1', '1', '1'),
(10, 86, '1', '1', '1'),
(10, 67, '', '', ''),
(10, 64, '1', '1', '1'),
(10, 69, '1', '1', '1'),
(10, 71, '1', '1', '1'),
(10, 72, '', '', ''),
(10, 75, '1', '1', '1'),
(10, 89, '1', '1', '1'),
(10, 77, '', '', ''),
(10, 78, '1', '1', '1'),
(10, 79, '1', '1', '1'),
(10, 82, '', '', ''),
(10, 80, '1', '1', '1'),
(10, 81, '1', '1', '1'),
(10, 83, '1', '1', '1'),
(10, 84, '1', '1', '1'),
(10, 85, '1', '1', '1'),
(10, 87, '', '', ''),
(10, 88, '1', '1', '1'),
(-1, 1, '', '', ''),
(-1, 2, '1', '1', '1'),
(-1, 3, '', '', ''),
(-1, 4, '1', '1', '1'),
(-1, 51, '1', '1', '1'),
(-1, 62, '', '', ''),
(-1, 63, '1', '1', '1'),
(-1, 72, '', '', ''),
(-1, 75, '1', '1', '1'),
(-1, 89, '1', '1', '1'),
(-1, 87, '', '', ''),
(-1, 88, '1', '1', '1'),
(9, 1, '', '', ''),
(9, 2, '', '', ''),
(9, 3, '', '', ''),
(9, 4, '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `languageName` varchar(250) NOT NULL DEFAULT '',
  `languageCode` varchar(250) NOT NULL DEFAULT '',
  `languageFlag` varchar(250) NOT NULL DEFAULT '',
  `isDefault` enum('0','1') NOT NULL DEFAULT '0',
  `isDeleted` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `addDate` date NOT NULL DEFAULT '0000-00-00',
  `addedBy` tinyint(2) NOT NULL DEFAULT '0',
  `modDate` date NOT NULL DEFAULT '0000-00-00',
  `modBy` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `languageName`, `languageCode`, `languageFlag`, `isDefault`, `isDeleted`, `status`, `addDate`, `addedBy`, `modDate`, `modBy`) VALUES
(1, 'English', 'en', '20100114061413126344965326422.jpeg', '0', '0', '1', '2010-01-13', 0, '2011-04-26', 1),
(2, 'Arabic', 'ar', '20100114061424126344966414254.jpeg', '0', '1', '0', '2010-01-14', 0, '2011-04-26', 1),
(3, 'Hindi', 'HN', '20100114074826126345530620651.jpeg', '0', '1', '0', '2010-01-14', 0, '2011-04-26', 1),
(9, 'Bangoli', 'ban', '20100417062710127148563013919.jpg', '0', '1', '1', '2010-04-17', 1, '2011-04-26', 1),
(10, 'French', 'fr', '201006030115381275545738370977009.png', '1', '0', '1', '2010-06-03', 1, '2011-04-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logdetail`
--

CREATE TABLE IF NOT EXISTS `logdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sesDetId` int(5) NOT NULL DEFAULT '0',
  `moduleId` int(5) NOT NULL DEFAULT '0',
  `pageQuery` longtext NOT NULL,
  `pageEvent` varchar(100) NOT NULL DEFAULT '',
  `logDescription` enum('0','1') NOT NULL DEFAULT '0',
  `moduleUrl` longtext NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `logdetail`
--

INSERT INTO `logdetail` (`id`, `sesDetId`, `moduleId`, `pageQuery`, `pageEvent`, `logDescription`, `moduleUrl`, `dateTime`) VALUES
(1, 251, 0, 'UPDATE users  SET `email` = ''vishal@gmail.com'', `modby` = ''1'' WHERE id=''38''', 'UPDATE', '1', 'localhost/reservation/admin/editUser.php?uid=Mzg=&page=1', '2013-07-31 11:35:07'),
(2, 246, 0, 'update system_config set systemVal = ''Hours Reservation System'' where systemName = ''SITE_NAME''', 'UPDATE', '1', 'localhost/reservation/admin/systemConfig.php', '2013-07-31 11:46:01'),
(3, 246, 0, 'update system_config set systemVal = ''pragam.kumar@sparxtechnologies.com'' where systemName = ''ADMIN_EMAIL''', 'UPDATE', '1', 'localhost/reservation/admin/systemConfig.php', '2013-07-31 11:46:01'),
(4, 246, 0, 'update system_config set systemVal = ''099902351363'' where systemName = ''PHONE_NO''', 'UPDATE', '1', 'localhost/reservation/admin/systemConfig.php', '2013-07-31 11:46:01'),
(5, 246, 0, 'update system_config set systemVal = ''Hours Reservation System'' where systemName = ''SITE_NAME''', 'UPDATE', '1', 'localhost/reservation/admin/systemConfig.php', '2013-07-31 11:46:03'),
(6, 246, 0, 'update system_config set systemVal = ''pragam.kumar@sparxtechnologies.com'' where systemName = ''ADMIN_EMAIL''', 'UPDATE', '1', 'localhost/reservation/admin/systemConfig.php', '2013-07-31 11:46:03'),
(7, 246, 0, 'update system_config set systemVal = ''099902351363'' where systemName = ''PHONE_NO''', 'UPDATE', '1', 'localhost/reservation/admin/systemConfig.php', '2013-07-31 11:46:03'),
(8, 246, 0, 'update menu set status = ''0'' where menuId = ''51''', 'UPDATE', '1', 'localhost/reservation/admin/pass.php?type=changestatus&id=51&action=menu', '2013-07-31 12:35:10'),
(9, 246, 0, 'update menu set status = ''1'' where menuId = ''51''', 'UPDATE', '1', 'localhost/reservation/admin/pass.php?type=changestatus&id=51&action=menu', '2013-07-31 12:35:11'),
(10, 246, 0, 'update menu set status = ''0'' where menuId = ''51''', 'UPDATE', '1', 'localhost/reservation/admin/pass.php?type=changestatus&id=51&action=menu', '2013-07-31 12:35:12'),
(11, 246, 0, 'update menu set status = ''1'' where menuId = ''51''', 'UPDATE', '1', 'localhost/reservation/admin/pass.php?type=changestatus&id=51&action=menu', '2013-07-31 12:35:13'),
(12, 246, 0, 'update menu set status = ''1'' where menuId = ''61''', 'UPDATE', '1', 'localhost/reservation/admin/pass.php?type=changestatus&id=61&action=menu', '2013-07-31 12:35:19'),
(13, 246, 0, 'update menu set status = ''0'' where menuId = ''61''', 'UPDATE', '1', 'localhost/reservation/admin/pass.php?type=changestatus&id=61&action=menu', '2013-07-31 12:35:20'),
(14, 252, 0, 'update menu set status = ''1'' where menuId = ''61''', 'UPDATE', '1', 'localhost/BeeBook/admin/pass.php?type=changestatus&id=61&action=menu', '2013-07-31 15:29:22'),
(15, 252, 1, 'update menu set status = ''1'' where menuId = ''61''', 'UPDATE', '1', 'localhost/BeeBook/admin/pass.php?type=changestatus&id=61&action=menu', '2013-07-31 16:42:28'),
(16, 252, 1, 'update menu set status = ''0'' where menuId = ''61''', 'UPDATE', '1', 'localhost/BeeBook/admin/pass.php?type=changestatus&id=61&action=menu', '2013-07-31 16:42:38'),
(17, 252, 1, 'update menu set status = ''1'' where menuId = ''51''', 'UPDATE', '1', 'localhost/BeeBook/admin/pass.php?type=changestatus&id=51&action=menu', '2013-07-31 16:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `mail_setting`
--

CREATE TABLE IF NOT EXISTS `mail_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailTypeId` int(11) NOT NULL DEFAULT '0',
  `langId` int(11) NOT NULL DEFAULT '0',
  `mailSubject` varchar(250) NOT NULL DEFAULT '',
  `mailContent` text NOT NULL,
  `emailid` varchar(250) NOT NULL DEFAULT '',
  `addDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addedBy` tinyint(2) NOT NULL DEFAULT '0',
  `modDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modBy` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `mail_setting`
--

INSERT INTO `mail_setting` (`id`, `mailTypeId`, `langId`, `mailSubject`, `mailContent`, `emailid`, `addDate`, `addedBy`, `modDate`, `modBy`) VALUES
(2, 2, 1, 'Reset Your password', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table height="100%" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td align="left" valign="top" style="padding: 20px 0pt;">\r\n            <table cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" align="center" width="650" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" src="http://sparxitsolutions.com/clients/swimcapz/images/logo.png" alt="var store.getFrontendName" style="margin-bottom: 10px;" /></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <div align="center"><strong>Reset Your Password</strong></div>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Dear [username],</h1>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px;">Please use the link below to reset your password.</p>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);">[link]</p>\r\n                        <p>&nbsp;</p>\r\n                        &nbsp;Pick a password that is easy to remember.</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: left;">\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you again, <strong>SwimCapz.</strong></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'info@swimcapz.com', '2010-01-16 00:00:00', 0, '2011-06-15 02:20:32', 1),
(6, 4, 1, 'Your Query Responce', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table height="100%" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td align="left" valign="top" style="padding: 20px 0pt;">\r\n            <table cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" align="center" width="650" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" src="http://sparxitsolutions.com/clients/swimcapz/images/logo.png" alt="var store.getFrontendName" style="margin-bottom: 10px;" /></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Dear [name],</h1>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px;">Thank You for Query.</p>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);">Original Message:[originalMessage]</p>\r\n                        <p>&nbsp;</p>\r\n                        <table cellspacing="0" cellpadding="0">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td align="left">Reply Message:</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <p>[We have received your query, we are reviewing it and will response by email within 48 hours]&nbsp;</p>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 8px;">&nbsp;</p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: left;">\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you again, <strong>SwimCapz.</strong></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'info@swimcapz.com', '2010-01-21 00:00:00', 0, '2011-06-15 02:09:04', 1),
(7, 5, 1, 'Activation Code', '<table width="500" cellspacing="0" cellpadding="0" border="0" style="border-bottom: 0px; border-left: 0px; border-top: 0px; border-right: 0px">\r\n    <tbody>\r\n        <tr>\r\n            <td align="left"><img src="http://www.sparxitsolutions.com/clients/swimcapz/images/logo.png" alt="" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td height="50">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n            <table width="500" cellspacing="0" cellpadding="0" border="0">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top" align="left" height="50" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">Welcome to SwimCapz</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top" align="left" height="25" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">Hello [username],</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top" align="left" height="40" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">To activate your account, just [click] to verify this email arrived safely.</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top" align="left" height="40"><span style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">If the link above is not working, then just please copy this address into any Internet Browser: </span></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="left" height="20" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">[link]</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td align="left" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">Note:</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top" align="left" nowrap="nowrap" height="40"><span style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">If you did not request this email, you do not have to do anything, as the account remains on hold until you verify<br />\r\n                        the email address. </span></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">If you have any problems logging into the site, please email us at: <a href="mailto:support@swimcapz.com" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">support@swimcapz.com</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88,88,88); font-size: 12px; font-weight: normal; text-decoration: none">Welcome from the&nbsp;<strong>SwimCapz Team</strong></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>&nbsp;</td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td height="30">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3">&nbsp;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'info@swimcapz.com', '2010-02-22 06:39:41', 1, '2011-11-01 00:29:16', 1),
(8, 1, 1, 'Thank you to register', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" align="center" style="padding: 20px 0pt;"><br />\r\n            <table width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" align="center" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>                    \r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Dear [username],</h1>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px;">Your e-mail [email] must be confirmed before using it to log in to our store.</p>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 8px;">Your registration is almost complete, just [click] to verify this email arrived safely.</p>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);">If the link above is not working, then just please copy this address into any Internet Browser: [link]</p>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);">If you have any questions about your account or any other matter, please feel free to contact us at <a href="mailto:info@ratemybarber.com''" style="color: rgb(30, 126, 200);">info@ratemybarber.com</a> .</p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: center;"><center>\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you again, RateMyBarber<strong>.</strong></p>\r\n                        </center></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'info@ratemybarber.com', '2010-02-22 06:40:45', 1, '2011-12-16 06:06:30', 1),
(11, 3, 1, 'Contact Us Mail', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center" height="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td valign="top" align="left" style="padding: 20px 0pt;">\r\n            <table width="650" cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" align="center" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" src="http://sparxitsolutions.com/clients/swimcapz/images/logo.png" alt="var store.getFrontendName" style="margin-bottom: 10px;" /></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top"><blockquote>                             <blockquote>                               <blockquote>                                 <blockquote>                                   <blockquote>\r\n                        <p>Name : [name]</p>\r\n                        <p>Email : [email]</p>\r\n                        <p>Phone : [phone]</p>\r\n                        <p>Message : [message]</p>\r\n                        </blockquote>                                 </blockquote>                               </blockquote>                             </blockquote>                           </blockquote>\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">&nbsp;</h1>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: left;">\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you again, <strong>SwimCapz.</strong></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'info@swimcapz.com', '2010-03-23 12:57:09', 1, '2011-11-01 00:28:02', 1),
(15, 9, 1, 'Order Confirmation', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 12px;">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top" style="padding: 20px 0pt;">\r\n            <table cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" width="650" style="border: 1px solid rgb(224, 224, 224);">\r\n                <!-- [ header starts here] -->\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" style="margin-bottom: 10px;" alt="sparxitsolution" src="http://www.sparxitsolutions.com/clients/swimcapz/images/logo.png" /></a></td>\r\n                    </tr>\r\n                    <!-- [ middle starts here] -->\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Hello, [username]</h1>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt;">Thank you for your order from Sparx IT Solutions Pvt. Ltd..                 Once your package ships we will send an email with a link to track your order.                 You can check the status of your order by <a style="color: rgb(30, 126, 200);" href="http://www.sparxitsolutions.com/clients/swimcapz/login.php">logging into your account</a>.                 If you have any questions about your order please contact us at <a style="color: rgb(30, 126, 200);" href="mailto:info@swimcapz.com">info@swimcapz.com</a> or call us at <span class="nobr">+91 120 4735100</span> Monday - Friday, 8am - 5pm PST.</p>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt;">Your order confirmation is below. Thank you again for your business.</p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>\r\n                        <h2 style="font-size: 18px; font-weight: normal; margin: 0pt;">Your Order #[orderid] <small>([orderdate])</small></h2>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>\r\n                        <table cellspacing="0" cellpadding="0" border="0" width="650">\r\n                            <thead>\r\n                                <tr>\r\n                                    <th bgcolor="#eaeaea" align="left" width="343" style="font-size: 13px; padding: 5px 9px 6px; line-height: 1em;">Billing Information:</th>\r\n                                    <th width="10">&nbsp;</th>\r\n                                    <th bgcolor="#eaeaea" align="left" width="325" style="font-size: 13px; padding: 5px 9px 6px; line-height: 1em;">Shipping Information:</th>\r\n                                </tr>\r\n                            </thead>\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td valign="top" style="font-size: 12px; width: 343px; padding: 7px 9px 9px; border-left: 1px solid rgb(234, 234, 234); border-bottom: 1px solid rgb(234, 234, 234); border-right: 1px solid rgb(234, 234, 234);">\r\n                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="line-height: 20px; font-size: 12px;">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[billName]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[billHouseNo]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[billStreet]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[billCityState]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[billCountryPin]</td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                    <td width="10">&nbsp;</td>\r\n                                    <td valign="top" style="font-size: 12px; width: 325px; padding: 7px 9px 9px; border-left: 1px solid rgb(234, 234, 234); border-bottom: 1px solid rgb(234, 234, 234); border-right: 1px solid rgb(234, 234, 234);">\r\n                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="line-height: 20px; font-size: 12px;">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[shipName]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[shipHouseNo]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[shipStreet]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[shipCityState]</td>\r\n                                            </tr>\r\n                                            <tr>\r\n                                                <td align="left" valign="top">[shipCountryPin]</td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <br />\r\n                        <table cellspacing="0" cellpadding="0" border="0" width="650">\r\n                            <thead>\r\n                                <tr>\r\n                                    <th bgcolor="#eaeaea" align="left" width="343" style="font-size: 13px; padding: 5px 9px 6px; line-height: 1em;">User E-mail :</th>\r\n                                    <th width="10">&nbsp;</th>\r\n                                    <th bgcolor="#eaeaea" align="left" width="325" style="font-size: 13px; padding: 5px 9px 6px; line-height: 1em;">Contact Number :</th>\r\n                                </tr>\r\n                            </thead>\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td align="center" valign="middle" style="font-size: 12px; width: 343px; padding: 7px 9px 9px; border-left: 1px solid rgb(234, 234, 234); border-bottom: 1px solid rgb(234, 234, 234); border-right: 1px solid rgb(234, 234, 234);">[userEmail]</td>\r\n                                    <td width="10">&nbsp;</td>\r\n                                    <td align="center" valign="middle" style="font-size: 12px; width: 325px; padding: 7px 9px 9px; border-left: 1px solid rgb(234, 234, 234); border-bottom: 1px solid rgb(234, 234, 234); border-right: 1px solid rgb(234, 234, 234);">[ContactNo]</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td height="8" colspan="2">&nbsp;</td>\r\n                                </tr>\r\n                            </tbody>\r\n                            <thead>\r\n                                <tr>\r\n                                    <th bgcolor="#eaeaea" align="left" width="343" style="font-size: 13px; padding: 5px 9px 6px; line-height: 1em;">Payment Method:</th>\r\n                                    <th width="10">&nbsp;</th>\r\n                                    <th bgcolor="#eaeaea" align="left" width="325" style="font-size: 13px; padding: 5px 9px 6px; line-height: 1em;">Shipping Cost:</th>\r\n                                </tr>\r\n                            </thead>\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td align="center" valign="middle" style="font-size: 12px; width: 343px; padding: 7px 9px 9px; border-left: 1px solid rgb(234, 234, 234); border-bottom: 1px solid rgb(234, 234, 234); border-right: 1px solid rgb(234, 234, 234);">[paymentType]</td>\r\n                                    <td width="10">&nbsp;</td>\r\n                                    <td align="center" valign="middle" style="font-size: 12px; width: 325px; padding: 7px 9px 9px; border-left: 1px solid rgb(234, 234, 234); border-bottom: 1px solid rgb(234, 234, 234); border-right: 1px solid rgb(234, 234, 234);">[shippingCost]</td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        <br />\r\n                        <table cellspacing="0" cellpadding="0" border="0" width="650" style="font-size: 12px;">\r\n                            <tbody>\r\n                                <tr>\r\n                                    <td bgcolor="#eaeaea" style="padding: 5px 9px;">\r\n                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 12px;">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td align="left" width="218">\r\n                                                <div align="center"><strong>Item</strong></div>\r\n                                                </td>\r\n                                                <td align="left" width="126">\r\n                                                <div align="center"><strong>Size</strong></div>\r\n                                                </td>\r\n                                                <td align="left" width="93">\r\n                                                <div align="center"><strong>Unit Cost </strong></div>\r\n                                                </td>\r\n                                                <td align="left" width="93">\r\n                                                <div align="center"><strong>Quantity</strong></div>\r\n                                                </td>\r\n                                                <td align="center">\r\n                                                <div align="center"><strong>Amount</strong></div>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td style="padding: 5px 9px; border-right: 1px solid rgb(234, 234, 234); border-left: 1px solid rgb(234, 234, 234); border-width: medium 1px 1px; border-style: none solid dotted; border-color: -moz-use-text-color rgb(234, 234, 234) rgb(234, 234, 234);">[items]</td>\r\n                                </tr>\r\n                                <tr>\r\n                                    <td align="left" valign="top" style="padding: 5px 9px; border-right: 1px solid rgb(234, 234, 234); border-width: medium 1px 1px; border-style: none solid solid; border-color: -moz-use-text-color rgb(234, 234, 234) rgb(234, 234, 234);">\r\n                                    <table cellspacing="0" cellpadding="0" border="0" width="100%" style="font-size: 12px;">\r\n                                        <tbody>\r\n                                            <tr>\r\n                                                <td align="left" valign="top" style="width: 319px;">&nbsp;</td>\r\n                                                <td align="left" valign="top" style="line-height: 30px; width: 316px;">\r\n                                                <table cellspacing="11" cellpadding="0" border="0" width="100%" style="font-size: 12px;">\r\n                                                    <tbody>\r\n                                                        <tr>\r\n                                                            <td align="right" valign="top" style="width: 163px;"><strong>Subtotal</strong></td>\r\n                                                            <td align="right" valign="top" style="width: 149px;">[Subtotal]</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td align="right" valign="top" style="width: 163px;"><strong> Shipping Cost </strong></td>\r\n                                                            <td align="right" valign="top" style="width: 149px;">[shippingCost]</td>\r\n                                                        </tr>\r\n                                                        <tr>\r\n                                                            <td align="right" valign="top" style="width: 163px;"><strong>Grand Total</strong></td>\r\n                                                            <td align="right" valign="top" style="width: 149px;"><strong>[grandTotal]</strong></td>\r\n                                                        </tr>\r\n                                                    </tbody>\r\n                                                </table>\r\n                                                </td>\r\n                                            </tr>\r\n                                        </tbody>\r\n                                    </table>\r\n                                    </td>\r\n                                </tr>\r\n                            </tbody>\r\n                        </table>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: center;"><center>\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you, <strong>SwimCapz.</strong></p>\r\n                        </center></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>', 'order@swimcapz.com', '2010-05-07 00:00:00', 0, '2011-06-15 08:15:19', 1),
(16, 6, 1, 'Thank you to register', '<table width="500" cellspacing="0" cellpadding="0" border="0" style="border: 0px none;">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td height="50">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td>\r\n            <table width="500" cellspacing="0" cellpadding="0" border="0" style="">\r\n                <tbody>\r\n                    <tr>\r\n                        <td height="25" valign="top" align="left" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">Hello [username],</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40" valign="top" align="left" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">Your registration is almost completed, just [click] to verify this email arrived safely.</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40" valign="top" align="left"><span style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">If the link above is not working, then just please copy this address into any Internet Browser: </span></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="20" align="left" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">[link]</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td nowrap="nowrap" height="40" valign="top" align="left"><span style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">If you did not request this email, you do not have to do anything, as the account remains on hold until you verify<br />\r\n                        the email address. </span></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40" valign="top" align="left" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">Email Id : [email]</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="40" valign="top" align="left" style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">Password : [password]</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">If you have any problems logging into the site, please email us at: <a style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;" href="mailto:support@swimcapz.com">support@swimcapz.com</a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style="text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;">Welcome from the <leo_highlight leohighlights_underline="true" leohighlights_url_bottom="http%3A//shortcuts.thebrowserhighlighter.com/leonardo/plugin/highlights/3_1/tbh_highlightsBottom.jsp?keywords%3Dteam%26domain%3D192.168.1.234" leohighlights_url_top="http%3A//shortcuts.thebrowserhighlighter.com/leonardo/plugin/highlights/3_1/tbh_highlightsTop.jsp?keywords%3Dteam%26domain%3D192.168.1.234" leohighlights_keywords="team" onmouseout="leoHighlightsHandleMouseOut(''leoHighlights_Underline_0'')" onmouseover="leoHighlightsHandleMouseOver(''leoHighlights_Underline_0'')" onclick="leoHighlightsHandleClick(''leoHighlights_Underline_0'')" id="leoHighlights_Underline_0" style="border-bottom: 2px solid rgb(255, 255, 150); background-color: transparent; background-image: none; background-repeat: repeat; background-attachment: scroll; background-position: 0% 50%; -moz-background-size: auto auto; cursor: pointer; display: inline; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">team</leo_highlight> at SwimCapz</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height="25">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>&nbsp;</td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td height="30">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td colspan="3">&nbsp;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'info@swimcapz.com', '2010-07-23 07:03:31', 1, '2010-08-03 07:55:36', 1),
(17, 10, 1, 'Contact Us Reply', '<p>&nbsp;Hello [name]</p>\r\n<p>Thank you for contacting Us.</p>\r\n<p>&nbsp;We will get back to you by email within 48 hours.</p>\r\n<p>Thanks,</p>\r\n<p>SwimCapz Team.</p>', 'info@swimcapz.com', '2010-08-09 03:51:58', 1, '2010-08-25 08:42:55', 1),
(18, 11, 1, 'Thank You for subscribing Newsletter.', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table height="100%" cellspacing="0" cellpadding="0" border="0" width="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top" style="padding: 20px 0pt;">\r\n            <table cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" width="650" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" src="http://www.sparxitsolutions.com/clients/swimcapz/images/logo.png" alt="var store.getFrontendName" style="margin-bottom: 10px;" /></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Thank you for subscribing to our newsletter.</h1>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);">To begin receiving the newsletter, you must first confirm your subscription by clicking on the following link:<br />\r\n                        <span style="text-decoration: underline;">[link]</span></p>\r\n                        <p>&nbsp;</p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: center;"><center>\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you again, <span style="font-weight: bold;">SwimCapz.</span></p>\r\n                        </center></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'akhil.kakkar@sparxtechnologies.com', '2010-08-09 06:52:38', 1, '2011-06-15 03:14:26', 1),
(19, 12, 1, 'You are successfully subscribed for newsletter.', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table height="100%" cellspacing="0" cellpadding="0" border="0" width="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td align="center" valign="top" style="padding: 20px 0pt;"><br />\r\n            <table cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" align="center" width="650" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" style="margin-bottom: 10px;" alt="var store.getFrontendName" src="http://sparxitsolutions.com/clients/swimcapz/images/logo.png" /></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <div align="center"><strong>Newsletter Subscription Confirmation</strong></div>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Dear User,</h1>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px;">You have successfully subscribed for NewsLetter.</p>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);"><span style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px;">To Unsubscribe Use following link: </span> [link]</p>\r\n                        <p style="border: 1px solid rgb(224, 224, 224); font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px; padding: 13px 18px; background: none repeat scroll 0% 0% rgb(249, 249, 249);">If you have any questions about your account or any other matter, please feel free to contact us at <a style="color: rgb(30, 126, 200);" href="mailto:info@sparxitsolutions.com''">info@swimcapz.com</a> .</p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: center;"><center>\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you, SwimCapz<strong>.</strong></p>\r\n                        </center></td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'akhil.kakkar@sparxtechnologies.com', '2010-08-09 06:53:24', 1, '2011-06-15 03:11:27', 1),
(20, 13, 1, 'Reset Password Confirmation Mali', '<table width=\\"650\\" cellspacing=\\"0\\" cellpadding=\\"0\\" border=\\"0\\" style=\\"\\">\r\n    <tbody>\r\n        <tr>\r\n            <td valign=\\"top\\" colspan=\\"3\\"><img alt=\\"\\" src=\\"http://www.swimcapz.com/images/logo.png\\" /></td>\r\n        </tr>\r\n        <tr>\r\n            <td height=\\"10\\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td align=\\"center\\">\r\n            <table width=\\"100%\\" cellspacing=\\"0\\" cellpadding=\\"0\\" border=\\"0\\" style=\\"\\">\r\n                <tbody>\r\n                    <tr>\r\n                        <td height=\\"50\\" valign=\\"top\\" align=\\"left\\" style=\\"text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;\\">Reset  Password Confirm</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height=\\"40\\" valign=\\"top\\" align=\\"left\\" style=\\"text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;\\">Hello [username],</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height=\\"40\\" valign=\\"top\\" align=\\"left\\" style=\\"text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;\\">Your Password has been changed sussessfully.</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td height=\\"40\\" valign=\\"top\\" align=\\"left\\" style=\\"text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;\\">Your New Password is : [Password]</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style=\\"text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;\\">&nbsp;</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td style=\\"text-align: left; font-family: Arial,Helvetica,sans-serif; color: rgb(88, 88, 88); font-size: 12px; font-weight: normal; text-decoration: none;\\">&nbsp;The team at SwimCapz</td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td>&nbsp;</td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 'info@swimcapz.com', '2010-08-09 23:07:09', 1, '0000-00-00 00:00:00', 0),
(21, 14, 1, 'Account Activation Confirmation', '<div style="background: none repeat scroll 0% 0% rgb(246, 246, 246); font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px; margin: 0pt; padding: 0pt;">\r\n<table height="100%" cellspacing="0" cellpadding="0" border="0" align="center" width="100%">\r\n    <tbody>\r\n        <tr>\r\n            <td align="left" valign="top" style="padding: 20px 0pt;">\r\n            <table cellspacing="0" cellpadding="10" border="0" bgcolor="#ffffff" align="center" width="650" style="border: 1px solid rgb(224, 224, 224);">\r\n                <tbody>\r\n                    <tr>\r\n                        <td valign="top"><a href="index.html"><img border="0" style="margin-bottom: 10px;" alt="var store.getFrontendName" src="http://sparxitsolutions.com/clients/swimcapz/images/logo.png" /></a></td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td valign="top">\r\n                        <h1 style="font-size: 22px; font-weight: normal; line-height: 22px; margin: 0pt 0pt 11px;">Dear [username],</h1>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px;">Welcome to SwimCapz. Your Account has been activated sussessfully. To log in when visiting our site just click <a href="http://sparxitsolutions.com/clients/swimcapz/login.php" style="color: rgb(30, 126, 200);">Login</a>&nbsp; at the top of every page, and then enter your e-mail address and password.</p>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 8px;">When you log in to your account, you will be able to do the following:</p>\r\n                        <ul style="font-size: 12px; line-height: 16px; margin: 0pt 0pt 16px; padding: 0pt;">\r\n                            <li style="list-style: none inside none; padding: 0pt 0pt 0pt 10px;">&ndash; Proceed through checkout faster when making a purchase</li>\r\n                            <li style="list-style: none inside none; padding: 0pt 0pt 0pt 10px;">&ndash; Check the status of orders</li>\r\n                            <li style="list-style: none inside none; padding: 0pt 0pt 0pt 10px;">&ndash; View past orders</li>\r\n                            <li style="list-style: none inside none; padding: 0pt 0pt 0pt 10px;">&ndash; Make changes to your account information</li>\r\n                            <li style="list-style: none inside none; padding: 0pt 0pt 0pt 10px;">&ndash; Change your password</li>\r\n                            <li style="list-style: none inside none; padding: 0pt 0pt 0pt 10px;">&ndash; Store alternative addresses (for shipping to multiple family members and friends!)</li>\r\n                        </ul>\r\n                        <p style="font-size: 12px; line-height: 16px; margin: 0pt;">If you have any questions about your account or any other matter, please feel free to contact us at <a href="mailto:info@sparxitsolutions.com" style="color: rgb(30, 126, 200);">info@swimcapz.com</a></p>\r\n                        </td>\r\n                    </tr>\r\n                    <tr>\r\n                        <td bgcolor="#eaeaea" align="center" style="background: none repeat scroll 0% 0% rgb(234, 234, 234); text-align: left;">\r\n                        <p style="font-size: 12px; margin: 0pt;">Thank you again,<span style="font-weight: bold;"> SwimCapz</span><strong>.</strong></p>\r\n                        </td>\r\n                    </tr>\r\n                </tbody>\r\n            </table>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n</div>\r\n<p>&nbsp;</p>', 'info@swimcapz.com', '2010-08-09 23:30:32', 1, '2011-06-15 01:54:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail_type`
--

CREATE TABLE IF NOT EXISTS `mail_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mailType` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mail_type`
--

INSERT INTO `mail_type` (`id`, `mailType`) VALUES
(1, 'New User Account Activation'),
(2, 'Forgot Password Reset Link'),
(3, 'Contact Us Mail To Admin'),
(4, 'Contact Us Reply To User'),
(5, 'Resend Activation Code'),
(10, 'Contact Us Confirmation');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menuId` int(5) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(100) NOT NULL DEFAULT '',
  `menuUrl` varchar(100) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '0',
  `parentId` int(5) NOT NULL DEFAULT '0',
  `menu_type` enum('0','1') NOT NULL DEFAULT '0',
  `isDeleted` enum('0','1') NOT NULL,
  `sequence` int(11) NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuId`, `menuName`, `menuUrl`, `status`, `parentId`, `menu_type`, `isDeleted`, `sequence`) VALUES
(1, 'Welcome', 'adminArea.php', 1, 0, '1', '0', 1),
(2, 'Website ManageMent', '#', 1, 0, '0', '0', 2),
(3, 'System Configuration', 'systemConfig.php', 1, 2, '1', '0', 0),
(4, 'Administrator', 'administrator.php', 1, 2, '0', '0', 0),
(26, 'Manage Zones', 'manageZone.php', 0, 24, '0', '0', 0),
(28, 'Manage State', 'manageState.php', 0, 24, '0', '0', 0),
(33, 'Manage County', 'managecounty.php', 0, 24, '0', '0', 0),
(51, 'Manage Sub Menu', 'manageMenu.php', 1, 2, '0', '1', 0),
(61, 'Manage Main Menu', 'manageMainMenu.php', 1, 2, '0', '1', 0),
(62, 'User', '#', 1, 0, '1', '0', 2),
(63, 'userDetail', 'manageUser.php', 1, 62, '0', '0', 0),
(72, 'Tool', '#', 1, 0, '1', '0', 6),
(75, 'Manage State', 'manageState.php', 1, 72, '0', '0', 0),
(87, 'Contact', '#', 1, 0, '1', '0', 9),
(88, 'Manage Contact', 'manageContactUs.php', 1, 87, '0', '0', 0),
(89, 'Manage Mail', 'manageMailType.php', 1, 72, '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) unsigned NOT NULL,
  `page_no` int(11) unsigned NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `page_no` (`page_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sessiondetail`
--

CREATE TABLE IF NOT EXISTS `sessiondetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(50) NOT NULL DEFAULT '',
  `adminId` int(5) NOT NULL DEFAULT '0',
  `ipAddress` varchar(30) NOT NULL DEFAULT '',
  `signInDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `signOutDateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `signDate` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=340 ;

--
-- Dumping data for table `sessiondetail`
--

INSERT INTO `sessiondetail` (`id`, `sessionId`, `adminId`, `ipAddress`, `signInDateTime`, `signOutDateTime`, `signDate`) VALUES
(1, '8v1iviiigosiu2d3hob6trq5i1', 1, '192.168.1.58', '2011-09-23 08:32:02', '2014-05-14 00:00:00', '2011-09-23'),
(2, '8v1iviiigosiu2d3hob6trq5i1', 1, '192.168.1.58', '2011-09-23 08:50:16', '0000-00-00 00:00:00', '2011-09-23'),
(3, '8v1iviiigosiu2d3hob6trq5i1', 1, '192.168.1.58', '2011-09-23 09:07:41', '0000-00-00 00:00:00', '2011-09-23'),
(4, '8v1iviiigosiu2d3hob6trq5i1', 1, '192.168.1.58', '2011-09-23 09:08:13', '0000-00-00 00:00:00', '2011-09-23'),
(5, '8v1iviiigosiu2d3hob6trq5i1', 1, '192.168.1.58', '2011-09-23 09:13:45', '0000-00-00 00:00:00', '2011-09-23'),
(6, '9t82nj6rvfjdsomsgo98nhb5c2', 1, '192.168.1.58', '2011-09-23 09:15:13', '0000-00-00 00:00:00', '2011-09-23'),
(7, 'i19s6d26jvvgtulfvcu72i9tt3', 1, '192.168.1.58', '2011-09-26 01:29:23', '2011-09-26 04:02:08', '2011-09-26'),
(8, 'i19s6d26jvvgtulfvcu72i9tt3', 1, '192.168.1.58', '2011-09-26 01:56:59', '2011-09-26 04:02:08', '2011-09-26'),
(9, 'i19s6d26jvvgtulfvcu72i9tt3', 1, '192.168.1.58', '2011-09-26 04:02:18', '0000-00-00 00:00:00', '2011-09-26'),
(10, 'hbq9m6mpsmsvsnri45qmh8hdg7', 1, '192.168.1.58', '2011-09-26 23:08:45', '0000-00-00 00:00:00', '2011-09-26'),
(11, 'p1e1gg3pd9q1sk8vtkig2tqjs6', 1, '192.168.1.58', '2011-09-26 23:25:33', '0000-00-00 00:00:00', '2011-09-26'),
(12, 's0uid0ightblkenjjjon8hi7s3', 1, '192.168.1.58', '2011-09-26 23:42:50', '0000-00-00 00:00:00', '2011-09-26'),
(13, 'r8rq0bv2v1elk0v54kbv6muhd2', 1, '192.168.1.58', '2011-09-27 00:02:19', '0000-00-00 00:00:00', '2011-09-27'),
(14, '4gbef21n2it6qp5dk9chl1ei01', 1, '192.168.1.58', '2011-09-27 00:23:28', '0000-00-00 00:00:00', '2011-09-27'),
(15, 'v8gfh19pvk7ibq34h5ch2qcde6', 1, '192.168.1.58', '2011-09-27 00:40:15', '0000-00-00 00:00:00', '2011-09-27'),
(16, 'rg0t5r6gsnauoulaehguk5n3d5', 1, '192.168.1.58', '2011-09-27 00:57:14', '0000-00-00 00:00:00', '2011-09-27'),
(17, 'i54qglr2i9lpv7eb914qhc7020', 1, '192.168.1.58', '2011-09-27 01:16:13', '0000-00-00 00:00:00', '2011-09-27'),
(18, '74scndkrqsg9sbbi2h9v36n0d3', 1, '192.168.1.58', '2011-09-27 01:32:59', '0000-00-00 00:00:00', '2011-09-27'),
(19, 'cvspcnev7qr42qj24iouqqr8n0', 1, '192.168.1.58', '2011-09-27 01:50:01', '0000-00-00 00:00:00', '2011-09-27'),
(20, 'd229vol56qq5k8nr970mt2b0p6', 1, '192.168.1.58', '2011-09-27 02:06:41', '0000-00-00 00:00:00', '2011-09-27'),
(21, 'c9th74rb1atnmb3vej9cbgn5k3', 1, '192.168.1.42', '2011-09-27 02:10:47', '0000-00-00 00:00:00', '2011-09-27'),
(22, '2lemp9ahe0d02c32ll1bqbgit1', 1, '192.168.1.58', '2011-09-27 02:26:00', '0000-00-00 00:00:00', '2011-09-27'),
(23, 'd0pcuq12vhi1o11jqfjsoh7oi3', 1, '192.168.1.42', '2011-09-27 02:35:56', '0000-00-00 00:00:00', '2011-09-27'),
(24, 'pe0a3ijkfhq5602fqs43863s77', 1, '192.168.1.58', '2011-09-27 02:45:23', '0000-00-00 00:00:00', '2011-09-27'),
(25, 'p88379i7d63e3hhvoo9767c0i4', 1, '192.168.1.58', '2011-09-27 03:33:08', '0000-00-00 00:00:00', '2011-09-27'),
(26, '86s76hoaneeh4lbh674ff0u114', 1, '192.168.1.42', '2011-09-27 03:35:47', '0000-00-00 00:00:00', '2011-09-27'),
(27, '40km233hsrbcah281l6u2bcck2', 1, '192.168.1.58', '2011-09-27 03:50:21', '0000-00-00 00:00:00', '2011-09-27'),
(28, '3gosbprre9f3ek9rdd8khvi663', 1, '192.168.1.58', '2011-09-27 04:07:42', '0000-00-00 00:00:00', '2011-09-27'),
(29, 'lqobifknp6egfjv45vk8pd38d0', 1, '192.168.1.58', '2011-09-27 04:24:33', '0000-00-00 00:00:00', '2011-09-27'),
(30, '5u2oqiqr4i5i8vfjjo2342rga0', 1, '192.168.1.58', '2011-09-27 04:42:26', '0000-00-00 00:00:00', '2011-09-27'),
(31, 'mqfoe3kodc9c73d21c6ii6do40', 1, '192.168.1.58', '2011-09-27 04:59:48', '0000-00-00 00:00:00', '2011-09-27'),
(32, 'gtqh43ioat5sconn5o5hmpfnk5', 1, '192.168.1.58', '2011-09-27 05:16:54', '0000-00-00 00:00:00', '2011-09-27'),
(33, 'ffkoc462uppc3prg6n4nerm064', 1, '192.168.1.58', '2011-09-27 05:33:37', '0000-00-00 00:00:00', '2011-09-27'),
(34, 'r5uk7c67oeuipa7d83s1hfmn41', 1, '192.168.1.58', '2011-09-27 05:50:33', '0000-00-00 00:00:00', '2011-09-27'),
(35, 'udbln1tij7c4d2lc8skbjrad26', 1, '192.168.1.58', '2011-09-27 06:16:00', '0000-00-00 00:00:00', '2011-09-27'),
(36, '5pjm32l0tt78594e8a9prj6rp3', 1, '192.168.1.58', '2011-09-27 06:35:26', '0000-00-00 00:00:00', '2011-09-27'),
(37, '29pu85hadh07j3fcjupil53230', 1, '192.168.1.58', '2011-09-27 06:52:48', '0000-00-00 00:00:00', '2011-09-27'),
(38, 'suvm1k5a0tr7gvb61m95s3cf63', 1, '192.168.1.58', '2011-09-27 07:09:30', '0000-00-00 00:00:00', '2011-09-27'),
(39, 'nfucot2ov6t99r7f08162ds5e2', 1, '192.168.1.58', '2011-09-27 07:26:12', '2011-09-27 07:29:08', '2011-09-27'),
(40, 'nfucot2ov6t99r7f08162ds5e2', 1, '192.168.1.58', '2011-09-27 07:29:39', '0000-00-00 00:00:00', '2011-09-27'),
(41, 'b8pqneticc01odt0llubla3rh0', 1, '192.168.1.58', '2011-09-27 07:43:00', '0000-00-00 00:00:00', '2011-09-27'),
(42, 'qtpaglmuqhqag4qifdit4ed513', 1, '192.168.1.58', '2011-09-27 07:59:43', '0000-00-00 00:00:00', '2011-09-27'),
(43, '1mv0qnb8j51kjluhhieaivmev1', 1, '192.168.1.58', '2011-09-27 08:17:58', '0000-00-00 00:00:00', '2011-09-27'),
(44, 'cjcqeuf1cevmtam510mtvfc4l2', 1, '192.168.1.58', '2011-09-27 08:36:46', '0000-00-00 00:00:00', '2011-09-27'),
(45, 'ka5udiua7bdkjfjbm9vve0sql7', 1, '192.168.1.58', '2011-09-27 08:53:46', '0000-00-00 00:00:00', '2011-09-27'),
(46, 'o9a8691kf9snnt63odluq652g2', 1, '192.168.1.58', '2011-09-27 09:10:45', '0000-00-00 00:00:00', '2011-09-27'),
(47, 'ma034e3qsgkefrppq45ga27i22', 1, '192.168.1.58', '2011-09-27 09:27:34', '0000-00-00 00:00:00', '2011-09-27'),
(48, '4h6er1cldsj587l8b52vcnssl4', 1, '192.168.1.58', '2011-09-27 09:45:29', '0000-00-00 00:00:00', '2011-09-27'),
(49, 'nau1gd6sku4gmh6car0kb4dn60', 1, '192.168.1.58', '2011-09-27 10:22:01', '0000-00-00 00:00:00', '2011-09-27'),
(50, 'nau1gd6sku4gmh6car0kb4dn60', 1, '192.168.1.58', '2011-09-27 10:22:48', '0000-00-00 00:00:00', '2011-09-27'),
(51, 'nm05ui1ube76gjfkvbrpdrn080', 1, '192.168.1.58', '2011-09-27 10:39:02', '0000-00-00 00:00:00', '2011-09-27'),
(52, 'mdr77526aacsvmd0td5nk07hu2', 1, '192.168.1.58', '2011-09-27 23:09:15', '0000-00-00 00:00:00', '2011-09-27'),
(53, 'hkcj3a9afov2omdc07vpfqn5j2', 1, '192.168.1.58', '2011-09-27 23:25:56', '0000-00-00 00:00:00', '2011-09-27'),
(54, 'ti8qvpdg297e1m0gcvm29d26r3', 1, '192.168.1.58', '2011-09-27 23:59:43', '0000-00-00 00:00:00', '2011-09-27'),
(55, '0gd5dkfke7p3mlu2eivbl93ei1', 1, '192.168.1.58', '2011-09-28 00:16:51', '0000-00-00 00:00:00', '2011-09-28'),
(56, 'kjvumh68lehu9od4qo5jhd7mu3', 1, '192.168.1.58', '2011-09-28 00:42:25', '0000-00-00 00:00:00', '2011-09-28'),
(57, 'rj6ikt06lnecignsqefrvjg0l2', 1, '192.168.1.58', '2011-09-28 02:48:44', '0000-00-00 00:00:00', '2011-09-28'),
(58, 'qkkd72e5fb65id8ae2cs78lbq0', 1, '192.168.1.58', '2011-09-28 03:34:33', '0000-00-00 00:00:00', '2011-09-28'),
(59, 'v1b2tgeqmnfm89sda8kiqpsuu5', 1, '192.168.1.58', '2011-09-28 03:51:28', '0000-00-00 00:00:00', '2011-09-28'),
(60, '1373v9a0iv0cqdp5imb4o55p73', 1, '192.168.1.58', '2011-09-28 04:08:43', '0000-00-00 00:00:00', '2011-09-28'),
(61, '6ohkqhvvp55ktl99o656ct1ko4', 1, '192.168.1.58', '2011-09-28 04:26:21', '0000-00-00 00:00:00', '2011-09-28'),
(62, '2st8ba29hjuvn700pqqj1i0c71', 1, '192.168.1.58', '2011-09-28 04:43:05', '0000-00-00 00:00:00', '2011-09-28'),
(63, 'g5kovgi9q78ltccin7dl3gil30', 1, '192.168.1.58', '2011-09-28 05:00:13', '0000-00-00 00:00:00', '2011-09-28'),
(64, 'k476h4sngvct1ur1rdofa3a4t0', 1, '192.168.1.58', '2011-09-28 05:18:20', '0000-00-00 00:00:00', '2011-09-28'),
(65, '1fk8cg94h09koi43krokfuoen7', 1, '192.168.1.58', '2011-09-28 05:35:14', '0000-00-00 00:00:00', '2011-09-28'),
(66, 'a7m4d64481j69ivp4hoid2h3e5', 1, '192.168.1.58', '2011-09-28 05:52:28', '0000-00-00 00:00:00', '2011-09-28'),
(67, 'vna8n2a1njqri4paj4duns7c03', 1, '192.168.1.58', '2011-09-28 06:15:07', '0000-00-00 00:00:00', '2011-09-28'),
(68, 'jf5l94o260eetjg562cep3vgj7', 1, '192.168.1.58', '2011-09-28 06:33:01', '0000-00-00 00:00:00', '2011-09-28'),
(69, 'c0e2sqao907ld68bsfso58ltf5', 1, '192.168.1.58', '2011-09-28 06:59:29', '0000-00-00 00:00:00', '2011-09-28'),
(70, 'icn274rcpofm0i0kjme0n67ha3', 1, '192.168.1.58', '2011-09-28 07:22:43', '0000-00-00 00:00:00', '2011-09-28'),
(71, 'k1e0ddc3j4npofmah432bap8q4', 1, '192.168.1.58', '2011-09-28 08:08:38', '0000-00-00 00:00:00', '2011-09-28'),
(72, 'c0eld8qqlppfkl5sbcejg6m5c0', 1, '192.168.1.58', '2011-09-28 08:28:55', '0000-00-00 00:00:00', '2011-09-28'),
(73, 'a4u47d9if78d5m3f2nm223j150', 1, '192.168.1.58', '2011-09-28 23:26:57', '0000-00-00 00:00:00', '2011-09-28'),
(74, 'm6bj15ijpcre0vtimmsje7snn1', 1, '192.168.1.58', '2011-09-28 23:50:37', '0000-00-00 00:00:00', '2011-09-28'),
(75, 'vhf3cuqkl1chttpqft4fa0q916', 1, '192.168.1.58', '2011-09-29 00:24:10', '0000-00-00 00:00:00', '2011-09-29'),
(76, 'bsd056029ljb6bns5h8svpcli5', 1, '192.168.1.58', '2011-09-29 00:45:28', '0000-00-00 00:00:00', '2011-09-29'),
(77, 'u4vgndkf6jcav16iq4iu01blg6', 1, '192.168.1.58', '2011-09-29 01:03:39', '0000-00-00 00:00:00', '2011-09-29'),
(78, 'cgbrrlfg554jjrj3mfhkfo44o2', 1, '192.168.1.58', '2011-09-29 01:20:26', '0000-00-00 00:00:00', '2011-09-29'),
(79, '3p9pkjatrgnul0avk7j3iqvti1', 1, '192.168.1.58', '2011-09-29 01:39:33', '0000-00-00 00:00:00', '2011-09-29'),
(80, '90c7qabfjasaabnd1178mctu74', 1, '192.168.1.58', '2011-09-29 01:56:54', '0000-00-00 00:00:00', '2011-09-29'),
(81, '4tvbkjf5qrhbu8c0qm1levvnp4', 1, '192.168.1.58', '2011-09-29 02:14:59', '0000-00-00 00:00:00', '2011-09-29'),
(82, 'orpv6vdum5c51n2092b2j15av0', 1, '192.168.1.58', '2011-09-29 03:37:33', '0000-00-00 00:00:00', '2011-09-29'),
(83, '1hqe56ute4k8p2k3e4u9q1r4l5', 1, '192.168.1.58', '2011-09-29 23:20:14', '0000-00-00 00:00:00', '2011-09-29'),
(84, 'p8mf2qvsshcls9a8i9k7e0pqt6', 1, '192.168.1.83', '2011-09-30 09:03:58', '0000-00-00 00:00:00', '2011-09-30'),
(85, 'nv2537g4nsse67rbftd2s39un5', 1, '192.168.1.58', '2011-10-01 04:40:28', '0000-00-00 00:00:00', '2011-10-01'),
(86, 'nv2537g4nsse67rbftd2s39un5', 1, '192.168.1.58', '2011-10-01 05:34:00', '0000-00-00 00:00:00', '2011-10-01'),
(87, 'nv2537g4nsse67rbftd2s39un5', 1, '192.168.1.58', '2011-10-01 05:57:08', '0000-00-00 00:00:00', '2011-10-01'),
(88, '0rphfkuov74fs4oaoacl2rs2p0', 1, '192.168.1.79', '2011-10-02 23:37:21', '0000-00-00 00:00:00', '2011-10-02'),
(89, 'dtlvrk9ut1dd2gt7bp0mf2bno4', 1, '192.168.1.58', '2011-10-03 00:07:48', '0000-00-00 00:00:00', '2011-10-03'),
(90, '0pmj0madoivk5tpokrim1u7e91', 1, '192.168.1.58', '2011-10-03 01:22:16', '0000-00-00 00:00:00', '2011-10-03'),
(91, '0pmj0madoivk5tpokrim1u7e91', 1, '192.168.1.58', '2011-10-03 02:58:18', '0000-00-00 00:00:00', '2011-10-03'),
(92, '0pmj0madoivk5tpokrim1u7e91', 1, '192.168.1.58', '2011-10-03 05:14:55', '0000-00-00 00:00:00', '2011-10-03'),
(93, 'v870eq92lkhm7qtbgh8pd8d730', 1, '192.168.1.83', '2011-10-03 05:50:58', '0000-00-00 00:00:00', '2011-10-03'),
(94, '0pmj0madoivk5tpokrim1u7e91', 1, '192.168.1.58', '2011-10-03 07:44:53', '0000-00-00 00:00:00', '2011-10-03'),
(95, '9b1sbkesp1b9dfhvf2esm43jm7', 1, '192.168.1.92', '2011-10-03 08:01:00', '0000-00-00 00:00:00', '2011-10-03'),
(96, 'qmhcb5t0eqle4icvjvj9i2s4q0', 1, '192.168.1.58', '2011-10-03 23:16:57', '2011-10-04 02:07:24', '2011-10-03'),
(97, 'sto3truj8ih6mgq6fiuj190v76', 1, '192.168.1.92', '2011-10-04 00:20:34', '2011-10-04 02:38:20', '2011-10-04'),
(98, 'qmhcb5t0eqle4icvjvj9i2s4q0', 1, '192.168.1.58', '2011-10-04 00:45:31', '2011-10-04 02:07:24', '2011-10-04'),
(99, 'qmhcb5t0eqle4icvjvj9i2s4q0', 1, '192.168.1.58', '2011-10-04 01:05:13', '2011-10-04 02:07:24', '2011-10-04'),
(100, 'qmhcb5t0eqle4icvjvj9i2s4q0', 2, '192.168.1.58', '2011-10-04 02:07:32', '2011-10-04 02:10:16', '2011-10-04'),
(101, 'qmhcb5t0eqle4icvjvj9i2s4q0', 1, '192.168.1.58', '2011-10-04 02:10:19', '0000-00-00 00:00:00', '2011-10-04'),
(102, 'k59fe9dbkbrnlmnp0qla9pnd23', 1, '192.168.1.58', '2011-10-04 02:28:27', '0000-00-00 00:00:00', '2011-10-04'),
(103, 'sto3truj8ih6mgq6fiuj190v76', 1, '192.168.1.92', '2011-10-04 02:39:02', '0000-00-00 00:00:00', '2011-10-04'),
(104, 'gcf97teaiqdj5lsbmqo80kcia6', 1, '192.168.1.58', '2011-10-04 03:59:17', '0000-00-00 00:00:00', '2011-10-04'),
(105, 'gcf97teaiqdj5lsbmqo80kcia6', 1, '192.168.1.58', '2011-10-04 03:59:42', '0000-00-00 00:00:00', '2011-10-04'),
(106, 'gcf97teaiqdj5lsbmqo80kcia6', 1, '192.168.1.58', '2011-10-04 04:52:39', '0000-00-00 00:00:00', '2011-10-04'),
(107, 'vifabm6cv7ehn4e54eastu24n0', 1, '192.168.1.58', '2011-10-04 07:00:09', '0000-00-00 00:00:00', '2011-10-04'),
(108, 'd7m1mn5sm7b1fh5aosuokfmua4', 1, '192.168.1.58', '2011-10-04 09:15:41', '2011-10-05 04:05:54', '2011-10-04'),
(109, 'mjbthn69135e96tl0jvtm9t1k4', 1, '192.168.1.58', '2011-10-04 23:14:30', '0000-00-00 00:00:00', '2011-10-04'),
(110, 'd7m1mn5sm7b1fh5aosuokfmua4', 1, '192.168.1.116', '2011-10-05 00:29:04', '2011-10-05 04:05:54', '2011-10-05'),
(111, 'd7m1mn5sm7b1fh5aosuokfmua4', 1, '192.168.1.116', '2011-10-05 01:26:50', '2011-10-05 04:05:54', '2011-10-05'),
(112, 'd7m1mn5sm7b1fh5aosuokfmua4', 1, '192.168.1.116', '2011-10-05 02:19:29', '2011-10-05 04:05:54', '2011-10-05'),
(113, 'd7m1mn5sm7b1fh5aosuokfmua4', 1, '192.168.1.116', '2011-10-05 04:05:57', '0000-00-00 00:00:00', '2011-10-05'),
(114, 'd7m1mn5sm7b1fh5aosuokfmua4', 1, '192.168.1.116', '2011-10-05 05:22:16', '0000-00-00 00:00:00', '2011-10-05'),
(115, 'qkeleneogdflhc4kp4jrhmvj92', 1, '192.168.1.116', '2011-10-06 23:13:22', '0000-00-00 00:00:00', '2011-10-06'),
(116, 'unirgkidps66ualjd3km60oil6', 1, '192.168.1.116', '2011-10-07 04:44:07', '0000-00-00 00:00:00', '2011-10-07'),
(117, 'f6d37nfmsmf0v8rkfmp7qdg5o5', 1, '192.168.1.116', '2011-10-07 09:05:42', '0000-00-00 00:00:00', '2011-10-07'),
(118, 'v2tpkvgog6icrevl5iq237kb42', 1, '192.168.1.116', '2011-10-09 23:17:53', '0000-00-00 00:00:00', '2011-10-09'),
(119, 'i7nknrkeietgoisc0g3fao9ck4', 1, '192.168.1.116', '2011-10-10 02:53:11', '0000-00-00 00:00:00', '2011-10-10'),
(120, '04jo4cnso00b2uo4a3kli45e12', 1, '192.168.1.116', '2011-10-11 01:38:25', '0000-00-00 00:00:00', '2011-10-11'),
(121, '04jo4cnso00b2uo4a3kli45e12', 1, '192.168.1.116', '2011-10-11 08:10:26', '0000-00-00 00:00:00', '2011-10-11'),
(122, 'lq6cou4i1g1j3mjiubbh5nfqk3', 1, '192.168.1.116', '2011-10-14 08:34:56', '0000-00-00 00:00:00', '2011-10-14'),
(123, 'u0721jqane7o8vti88f7ga8i02', 1, '192.168.1.111', '2011-10-15 02:36:29', '0000-00-00 00:00:00', '2011-10-15'),
(124, '7cvkjnnu1hbmdmc13sh6livlm3', 1, '192.168.1.71', '2011-10-18 23:44:22', '2011-10-18 23:44:30', '2011-10-18'),
(125, 'kd6l9dk2reg7gcnak0petsj0q7', 1, '192.168.1.116', '2011-10-24 00:36:30', '0000-00-00 00:00:00', '2011-10-24'),
(126, 'pn14uebbe2og9no0h7plu0k157', 1, '192.168.1.92', '2011-10-27 23:05:56', '0000-00-00 00:00:00', '2011-10-27'),
(127, 'ktg20p7to8hivm7pgefm0i1027', 1, '192.168.1.116', '2011-10-28 03:32:42', '0000-00-00 00:00:00', '2011-10-28'),
(128, 'etnmtmardmlvqmo8nkp4c0jcs1', 1, '192.168.1.116', '2011-10-29 00:48:36', '0000-00-00 00:00:00', '2011-10-29'),
(129, 'etnmtmardmlvqmo8nkp4c0jcs1', 1, '192.168.1.116', '2011-10-29 00:48:36', '0000-00-00 00:00:00', '2011-10-29'),
(130, '9agm0kkhqg18tjmll9b3q5f243', 1, '192.168.1.112', '2011-10-29 02:33:43', '0000-00-00 00:00:00', '2011-10-29'),
(131, 'etnmtmardmlvqmo8nkp4c0jcs1', 1, '192.168.1.116', '2011-10-29 02:39:24', '0000-00-00 00:00:00', '2011-10-29'),
(132, 'etnmtmardmlvqmo8nkp4c0jcs1', 1, '192.168.1.116', '2011-10-29 02:44:55', '0000-00-00 00:00:00', '2011-10-29'),
(133, 'etnmtmardmlvqmo8nkp4c0jcs1', 1, '192.168.1.116', '2011-10-29 03:30:38', '0000-00-00 00:00:00', '2011-10-29'),
(134, '6bvs732psjpfc2ursqgc5kurk0', 1, '192.168.1.112', '2011-10-30 23:32:49', '0000-00-00 00:00:00', '2011-10-30'),
(135, 'mqasoa1sl3927pttmjnig8dk44', 1, '192.168.1.116', '2011-10-31 03:31:17', '0000-00-00 00:00:00', '2011-10-31'),
(136, 'mqasoa1sl3927pttmjnig8dk44', 1, '192.168.1.116', '2011-10-31 04:44:55', '0000-00-00 00:00:00', '2011-10-31'),
(137, 'ci449qborqrhksrlsk9n8bq4q0', 1, '192.168.1.116', '2011-10-31 23:34:03', '2011-11-01 06:52:51', '2011-10-31'),
(138, 'ci449qborqrhksrlsk9n8bq4q0', 1, '192.168.1.116', '2011-10-31 23:48:01', '2011-11-01 06:52:51', '2011-10-31'),
(139, 'ci449qborqrhksrlsk9n8bq4q0', 1, '192.168.1.116', '2011-11-01 06:50:00', '2011-11-01 06:52:51', '2011-11-01'),
(140, 'ci449qborqrhksrlsk9n8bq4q0', 2, '192.168.1.116', '2011-11-01 06:50:32', '0000-00-00 00:00:00', '2011-11-01'),
(141, 'ci449qborqrhksrlsk9n8bq4q0', 1, '192.168.1.116', '2011-11-01 06:53:01', '0000-00-00 00:00:00', '2011-11-01'),
(142, 'ci449qborqrhksrlsk9n8bq4q0', 1, '192.168.1.116', '2011-11-01 07:44:56', '0000-00-00 00:00:00', '2011-11-01'),
(143, 'oh43vdhhk6ftj8p174r35mmf67', 1, '192.168.1.116', '2011-11-01 23:00:30', '0000-00-00 00:00:00', '2011-11-01'),
(144, 'n3oq1q7djucsmq068t2ttjh5l0', 2, '192.168.1.116', '2011-11-02 03:52:46', '2011-11-02 03:56:27', '2011-11-02'),
(145, 'n3oq1q7djucsmq068t2ttjh5l0', 1, '192.168.1.116', '2011-11-02 03:54:53', '2011-11-02 03:55:59', '2011-11-02'),
(146, 'n3oq1q7djucsmq068t2ttjh5l0', 2, '192.168.1.116', '2011-11-02 03:56:07', '2011-11-02 03:56:27', '2011-11-02'),
(147, 'n3oq1q7djucsmq068t2ttjh5l0', 1, '192.168.1.116', '2011-11-02 03:56:30', '0000-00-00 00:00:00', '2011-11-02'),
(148, 'cljohkjk2du9c62rufk20sr3o0', 1, '192.168.1.116', '2011-11-03 02:41:34', '0000-00-00 00:00:00', '2011-11-03'),
(149, 'cljohkjk2du9c62rufk20sr3o0', 1, '192.168.1.116', '2011-11-03 03:52:08', '0000-00-00 00:00:00', '2011-11-03'),
(150, 'rl0v1k03qhlmu0iqqqeuj29pt4', 1, '192.168.1.116', '2011-11-03 22:57:05', '0000-00-00 00:00:00', '2011-11-03'),
(151, 'rl0v1k03qhlmu0iqqqeuj29pt4', 1, '192.168.1.116', '2011-11-04 00:36:18', '0000-00-00 00:00:00', '2011-11-04'),
(152, 'rl0v1k03qhlmu0iqqqeuj29pt4', 1, '192.168.1.116', '2011-11-04 07:57:59', '0000-00-00 00:00:00', '2011-11-04'),
(153, 'tkrv0dm9pb5ai3vv0cv1ive4a6', 1, '192.168.1.116', '2011-11-07 22:20:37', '2011-11-07 23:54:01', '2011-11-07'),
(154, 'tkrv0dm9pb5ai3vv0cv1ive4a6', 1, '192.168.1.116', '2011-11-07 23:53:52', '2011-11-07 23:54:01', '2011-11-07'),
(155, 'mlacuk7oisgn9laei6t25n6571', 1, '192.168.1.116', '2011-11-14 00:34:07', '2011-11-14 03:31:07', '2011-11-14'),
(156, 'bappbqhsuqueoitsb79pfqsom3', 1, '192.168.1.116', '2011-11-23 22:38:40', '0000-00-00 00:00:00', '2011-11-23'),
(157, 'p0t9tmjlfn27qgb2s0rifkmfc4', 1, '192.168.1.116', '2011-12-05 06:28:04', '0000-00-00 00:00:00', '2011-12-05'),
(158, 'deokiq81hekthlf3a7q3v1om54', 1, '192.168.1.114', '2011-12-05 06:43:00', '0000-00-00 00:00:00', '2011-12-05'),
(159, 'c2uq5778d0ub4oq7fnedi8geu1', 1, '192.168.1.114', '2011-12-05 22:23:09', '0000-00-00 00:00:00', '2011-12-05'),
(160, 'qa8fvg71mfou4vq7elopt2jer2', 1, '192.168.1.116', '2011-12-06 05:43:55', '0000-00-00 00:00:00', '2011-12-06'),
(161, '4r18i2b3s98qsaokgd0qe3d631', 1, '192.168.1.116', '2011-12-06 23:36:36', '0000-00-00 00:00:00', '2011-12-06'),
(162, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-11 23:39:58', '2011-12-17 06:32:23', '2011-12-11'),
(163, 'pbfb2b6f5kan2n4icbdone1hk2', 1, '192.168.1.116', '2011-12-12 00:36:18', '0000-00-00 00:00:00', '2011-12-12'),
(164, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-12 01:12:21', '2011-12-17 06:32:23', '2011-12-12'),
(165, 'm7rv48i9numts75o8r6qtkeku1', 1, '192.168.1.71', '2011-12-12 05:28:07', '0000-00-00 00:00:00', '2011-12-12'),
(166, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-12 06:23:01', '2011-12-17 06:32:23', '2011-12-12'),
(167, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-13 00:31:19', '2011-12-17 06:32:23', '2011-12-13'),
(168, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-16 03:46:03', '2011-12-17 06:32:23', '2011-12-16'),
(169, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-16 06:03:55', '2011-12-17 06:32:23', '2011-12-16'),
(170, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-16 22:40:28', '2011-12-17 06:32:23', '2011-12-16'),
(171, 'aeihk2rt79l68le5od4atjk132', 3, '192.168.1.117', '2011-12-16 23:29:41', '2011-12-16 23:34:34', '2011-12-16'),
(172, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-16 23:35:09', '2011-12-17 06:32:23', '2011-12-16'),
(173, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-16 23:42:33', '2011-12-17 06:32:23', '2011-12-16'),
(174, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-17 06:05:38', '2011-12-17 06:32:23', '2011-12-17'),
(175, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-17 06:32:27', '0000-00-00 00:00:00', '2011-12-17'),
(176, 'aeihk2rt79l68le5od4atjk132', 1, '192.168.1.117', '2011-12-18 22:24:43', '0000-00-00 00:00:00', '2011-12-18'),
(177, 'fliibhs1vpq1dud93cc52lmtp4', 1, '192.168.1.116', '2011-12-21 06:09:59', '0000-00-00 00:00:00', '2011-12-21'),
(178, 'ravddjn6hhqq0hven236jfnod5', 1, '192.168.1.117', '2011-12-21 23:17:26', '0000-00-00 00:00:00', '2011-12-21'),
(179, 'ravddjn6hhqq0hven236jfnod5', 1, '192.168.1.117', '2011-12-22 01:06:21', '0000-00-00 00:00:00', '2011-12-22'),
(180, 'ravddjn6hhqq0hven236jfnod5', 1, '192.168.1.117', '2011-12-22 22:38:12', '0000-00-00 00:00:00', '2011-12-22'),
(181, 'mtmeejl3pssulig8f4tuiimo60', 1, '192.168.1.111', '2011-12-22 22:38:33', '0000-00-00 00:00:00', '2011-12-22'),
(182, '8nhq4kshc863figavvorc70du2', 1, '192.168.1.111', '2011-12-29 23:42:51', '0000-00-00 00:00:00', '2011-12-29'),
(183, 'lrnjni81t3ib5f8db0nv9uaki1', 1, '192.168.1.117', '2012-01-03 23:25:33', '0000-00-00 00:00:00', '2012-01-03'),
(184, 'lrnjni81t3ib5f8db0nv9uaki1', 1, '192.168.1.117', '2012-01-04 03:09:36', '0000-00-00 00:00:00', '2012-01-04'),
(185, 'mrdlac5o7g43h6o0vk276lqv92', 1, '192.168.1.111', '2012-01-04 03:10:03', '2012-01-04 03:24:48', '2012-01-04'),
(186, 'mrdlac5o7g43h6o0vk276lqv92', 3, '192.168.1.111', '2012-01-04 03:23:36', '2012-01-04 03:24:39', '2012-01-04'),
(187, 'mrdlac5o7g43h6o0vk276lqv92', 1, '192.168.1.111', '2012-01-04 03:23:52', '2012-01-04 03:24:48', '2012-01-04'),
(188, 'mrdlac5o7g43h6o0vk276lqv92', 3, '192.168.1.111', '2012-01-04 03:24:20', '2012-01-04 03:24:39', '2012-01-04'),
(189, 'mrdlac5o7g43h6o0vk276lqv92', 1, '192.168.1.111', '2012-01-04 03:24:43', '2012-01-04 03:24:48', '2012-01-04'),
(190, 'mrdlac5o7g43h6o0vk276lqv92', 1, '192.168.1.111', '2012-01-04 03:24:55', '0000-00-00 00:00:00', '2012-01-04'),
(191, 'lrnjni81t3ib5f8db0nv9uaki1', 1, '192.168.1.117', '2012-01-04 05:21:46', '0000-00-00 00:00:00', '2012-01-04'),
(192, '32l31c1nr487gmmtgag6t5f8m6', 1, '192.168.1.111', '2012-01-04 06:23:36', '0000-00-00 00:00:00', '2012-01-04'),
(193, 'i7o8t4mlmnqjrj56euru22bgv6', 1, '192.168.1.111', '2012-01-04 22:32:38', '2012-01-05 03:25:37', '2012-01-04'),
(194, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-04 23:42:34', '2012-01-05 03:29:06', '2012-01-04'),
(195, 'os38ua8ftf1eiqrqh04nr5a5i0', 1, '192.168.1.116', '2012-01-05 00:19:32', '0000-00-00 00:00:00', '2012-01-05'),
(196, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-05 01:16:02', '2012-01-05 03:29:06', '2012-01-05'),
(197, 'i7o8t4mlmnqjrj56euru22bgv6', 1, '192.168.1.111', '2012-01-05 03:23:39', '2012-01-05 03:25:37', '2012-01-05'),
(198, 'i7o8t4mlmnqjrj56euru22bgv6', 1, '192.168.1.111', '2012-01-05 03:25:04', '2012-01-05 03:25:37', '2012-01-05'),
(199, 'i7o8t4mlmnqjrj56euru22bgv6', 1, '192.168.1.111', '2012-01-05 03:25:43', '0000-00-00 00:00:00', '2012-01-05'),
(200, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-05 03:28:42', '2012-01-05 03:29:06', '2012-01-05'),
(201, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-05 03:29:09', '0000-00-00 00:00:00', '2012-01-05'),
(202, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-05 05:02:39', '0000-00-00 00:00:00', '2012-01-05'),
(203, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-05 05:17:59', '0000-00-00 00:00:00', '2012-01-05'),
(204, 'j65i02bl9ndkq2kgq8jrn0sv15', 1, '192.168.1.111', '2012-01-05 06:58:58', '0000-00-00 00:00:00', '2012-01-05'),
(205, 'j65i02bl9ndkq2kgq8jrn0sv15', 1, '192.168.1.111', '2012-01-05 07:00:20', '0000-00-00 00:00:00', '2012-01-05'),
(206, 'kb0qrk0v08h4frmbve94ln1fm2', 1, '192.168.1.117', '2012-01-05 07:17:23', '0000-00-00 00:00:00', '2012-01-05'),
(207, 'mlbg0gv3h2krkfqcdkjju0avo5', 1, '192.168.1.111', '2012-01-05 22:16:26', '0000-00-00 00:00:00', '2012-01-05'),
(208, 'qau020ssgeit1vlaug73d60o84', 1, '192.168.1.117', '2012-01-05 22:21:14', '0000-00-00 00:00:00', '2012-01-05'),
(209, 'qau020ssgeit1vlaug73d60o84', 1, '192.168.1.117', '2012-01-05 22:31:46', '0000-00-00 00:00:00', '2012-01-05'),
(210, 'qau020ssgeit1vlaug73d60o84', 1, '192.168.1.117', '2012-01-05 23:39:32', '0000-00-00 00:00:00', '2012-01-05'),
(211, 'l3t536jq1jgp4tmkt7ashldpa2', 1, '192.168.1.111', '2012-01-05 23:41:25', '2012-01-06 05:25:45', '2012-01-05'),
(212, 'hjcp1dcr4qh222j6jh9qse41u3', 1, '192.168.1.117', '2012-01-06 02:56:33', '0000-00-00 00:00:00', '2012-01-06'),
(213, 'mlbg0gv3h2krkfqcdkjju0avo5', 1, '192.168.1.111', '2012-01-06 02:58:54', '0000-00-00 00:00:00', '2012-01-06'),
(214, 'l3t536jq1jgp4tmkt7ashldpa2', 1, '192.168.1.111', '2012-01-06 03:22:28', '2012-01-06 05:25:45', '2012-01-06'),
(215, 'l3t536jq1jgp4tmkt7ashldpa2', 1, '192.168.1.111', '2012-01-06 05:25:48', '0000-00-00 00:00:00', '2012-01-06'),
(216, 'cp19vfhf100fpjgnkkvvp171i1', 1, '192.168.1.117', '2012-01-06 22:16:44', '0000-00-00 00:00:00', '2012-01-06'),
(217, 'g47k1m8bvf2cumf0kco3c3q866', 1, '192.168.1.116', '2012-01-07 00:31:36', '0000-00-00 00:00:00', '2012-01-07'),
(218, 'g47k1m8bvf2cumf0kco3c3q866', 1, '192.168.1.116', '2012-01-07 00:49:01', '0000-00-00 00:00:00', '2012-01-07'),
(219, 'cp19vfhf100fpjgnkkvvp171i1', 1, '192.168.1.117', '2012-01-07 00:49:23', '0000-00-00 00:00:00', '2012-01-07'),
(220, '9kcaljb0ac1fkcr6an4c1koal0', 1, '192.168.1.111', '2012-01-07 01:06:05', '0000-00-00 00:00:00', '2012-01-07'),
(221, 'ai7t5gsqntnlk86mnovr908fo0', 1, '192.168.1.71', '2012-01-07 01:20:51', '0000-00-00 00:00:00', '2012-01-07'),
(222, 'cp19vfhf100fpjgnkkvvp171i1', 1, '192.168.1.117', '2012-01-07 01:56:00', '0000-00-00 00:00:00', '2012-01-07'),
(223, 'cp19vfhf100fpjgnkkvvp171i1', 1, '192.168.1.117', '2012-01-07 02:42:32', '0000-00-00 00:00:00', '2012-01-07'),
(224, 'cp19vfhf100fpjgnkkvvp171i1', 1, '192.168.1.117', '2012-01-07 06:01:26', '0000-00-00 00:00:00', '2012-01-07'),
(225, 's5j52enobrptbtdupt3mcke7a7', 1, '192.168.1.111', '2012-01-07 06:33:33', '0000-00-00 00:00:00', '2012-01-07'),
(226, 's5j52enobrptbtdupt3mcke7a7', 1, '192.168.1.111', '2012-01-07 07:03:48', '0000-00-00 00:00:00', '2012-01-07'),
(227, 'fdknlfe74v29dfc4gftok6il47', 1, '192.168.1.111', '2012-01-08 22:13:05', '0000-00-00 00:00:00', '2012-01-08'),
(228, 'sir2fmea564oa3um8087l21iq7', 1, '192.168.1.117', '2012-01-09 01:53:49', '0000-00-00 00:00:00', '2012-01-09'),
(229, 'sir2fmea564oa3um8087l21iq7', 1, '192.168.1.117', '2012-01-09 04:05:23', '0000-00-00 00:00:00', '2012-01-09'),
(230, 'sir2fmea564oa3um8087l21iq7', 1, '192.168.1.117', '2012-01-09 05:10:46', '0000-00-00 00:00:00', '2012-01-09'),
(231, 'r3tsqoi3jesvp5j2c47im6bie0', 1, '192.168.1.111', '2012-01-09 06:56:29', '0000-00-00 00:00:00', '2012-01-09'),
(232, 'r3tsqoi3jesvp5j2c47im6bie0', 1, '192.168.1.111', '2012-01-09 07:08:47', '0000-00-00 00:00:00', '2012-01-09'),
(233, 'r3tsqoi3jesvp5j2c47im6bie0', 1, '192.168.1.111', '2012-01-09 07:21:46', '0000-00-00 00:00:00', '2012-01-09'),
(234, 'qrs8mf6olc9klv8oktog8f5p93', 1, '192.168.1.111', '2012-01-10 04:59:51', '0000-00-00 00:00:00', '2012-01-10'),
(235, 'jrlb5brp48u6tqg3h59ic3k593', 1, '192.168.1.117', '2012-01-10 05:16:45', '0000-00-00 00:00:00', '2012-01-10'),
(236, '7gilt3o1285kfr34m8fnsc22r7', 1, '192.168.1.111', '2012-01-10 23:12:06', '2012-01-10 23:14:02', '2012-01-10'),
(237, '7gilt3o1285kfr34m8fnsc22r7', 1, '192.168.1.111', '2012-01-10 23:38:16', '0000-00-00 00:00:00', '2012-01-10'),
(238, 'ante2ubbeiugfajq85ufdg0h22', 1, '192.168.1.117', '2012-01-10 23:54:40', '0000-00-00 00:00:00', '2012-01-10'),
(239, 'hojjd1o740ffgbds1io3ud1si4', 1, '192.168.1.111', '2012-01-11 01:39:02', '2012-01-11 03:04:30', '2012-01-11'),
(240, 'hojjd1o740ffgbds1io3ud1si4', 1, '192.168.1.111', '2012-01-11 03:04:33', '0000-00-00 00:00:00', '2012-01-11'),
(241, 'n2n08877rn62bsb16pe1imtnk7', 1, '192.168.1.71', '2012-01-11 06:55:11', '0000-00-00 00:00:00', '2012-01-11'),
(242, '7gilt3o1285kfr34m8fnsc22r7', 1, '192.168.1.111', '2012-01-11 07:59:25', '0000-00-00 00:00:00', '2012-01-11'),
(243, '5so6b6tln6aqrjus029df94qg3', 1, '192.168.1.111', '2012-01-11 23:36:14', '0000-00-00 00:00:00', '2012-01-11'),
(244, 'pek1n1vlrr4fhb6thhvipvlgp2', 1, '192.168.1.117', '2012-01-11 23:41:40', '0000-00-00 00:00:00', '2012-01-11'),
(245, 'eccc8302ddb321921188c15df28848f0', 1, '127.0.0.1', '2013-07-10 10:47:05', '0000-00-00 00:00:00', '2013-07-10'),
(246, 'eccc8302ddb321921188c15df28848f0', 1, '127.0.0.1', '2013-07-10 13:17:34', '0000-00-00 00:00:00', '2013-07-10'),
(247, 's4rgncv3pddng1cvcj28dmt4t4', 1, '127.0.0.1', '2013-07-16 13:29:04', '2013-07-16 13:34:25', '2013-07-16'),
(248, 's4rgncv3pddng1cvcj28dmt4t4', 1, '127.0.0.1', '2013-07-16 13:34:34', '0000-00-00 00:00:00', '2013-07-16'),
(249, 's4rgncv3pddng1cvcj28dmt4t4', 1, '127.0.0.1', '2013-07-16 14:48:20', '0000-00-00 00:00:00', '2013-07-16'),
(250, 's4rgncv3pddng1cvcj28dmt4t4', 1, '127.0.0.1', '2013-07-16 16:03:59', '0000-00-00 00:00:00', '2013-07-16'),
(251, 'rgctg1f07kjclsu4h6ahamger4', 1, '127.0.0.1', '2013-07-31 10:38:17', '2013-07-31 18:09:17', '2013-07-31'),
(252, 'rgctg1f07kjclsu4h6ahamger4', 1, '127.0.0.1', '2013-07-31 15:20:18', '2013-07-31 18:09:17', '2013-07-31'),
(253, 'rgctg1f07kjclsu4h6ahamger4', 1, '127.0.0.1', '2013-07-31 18:08:38', '2013-07-31 18:09:17', '2013-07-31'),
(254, 'rgctg1f07kjclsu4h6ahamger4', 7, '127.0.0.1', '2013-07-31 18:09:22', '2013-07-31 18:10:41', '2013-07-31'),
(255, 'rgctg1f07kjclsu4h6ahamger4', 1, '127.0.0.1', '2013-07-31 18:10:51', '0000-00-00 00:00:00', '2013-07-31'),
(256, '2hn5d6ilm9ba8ejo7e51pnnt77', 1, '127.0.0.1', '2014-04-10 06:50:49', '2014-04-10 06:52:25', '2014-04-10'),
(257, '2hn5d6ilm9ba8ejo7e51pnnt77', 1, '127.0.0.1', '2014-04-10 06:53:21', '0000-00-00 00:00:00', '2014-04-10'),
(258, 'd3k39d3gto2rhhj1dn5rstnm87', 1, '127.0.0.1', '2014-04-10 08:13:52', '0000-00-00 00:00:00', '2014-04-10'),
(259, 'e0i2njk73tjoesb5h39kqf3h72', 1, '127.0.0.1', '2014-04-10 16:43:45', '0000-00-00 00:00:00', '2014-04-10'),
(260, '389bibrg96fji9rkc6fnig2jp5', 1, '::1', '2014-04-11 13:29:09', '0000-00-00 00:00:00', '2014-04-11'),
(261, 'k4ong28dh7l232cjn8pc6cvft6', 1, '::1', '2014-04-14 04:43:49', '2014-04-14 10:12:46', '2014-04-14'),
(262, 'k4ong28dh7l232cjn8pc6cvft6', 1, '::1', '2014-04-14 11:03:57', '0000-00-00 00:00:00', '2014-04-14'),
(263, 'dfip676fi1fhq91h7alho529q6', 1, '::1', '2014-04-15 13:59:33', '0000-00-00 00:00:00', '2014-04-15'),
(264, 'a99scfb8tg1j13kr5v2hpfa6j1', 1, '::1', '2014-04-15 14:26:34', '0000-00-00 00:00:00', '2014-04-15'),
(265, 'i77fjmm4i7v1g8170tkrh4cq46', 1, '::1', '2014-04-21 15:56:39', '0000-00-00 00:00:00', '2014-04-21'),
(266, 'rna6ma7f4a5ov021um6q6h07e2', 1, '::1', '2014-04-22 10:37:45', '2014-04-22 10:47:39', '2014-04-22'),
(267, 'rna6ma7f4a5ov021um6q6h07e2', 1, '::1', '2014-04-22 10:47:47', '0000-00-00 00:00:00', '2014-04-22'),
(268, 'lbuo4rjko7dc4h4lu27c501hg7', 1, '::1', '2014-04-23 08:44:31', '2014-04-23 08:46:20', '2014-04-23'),
(269, 'lbuo4rjko7dc4h4lu27c501hg7', 1, '::1', '2014-04-23 08:50:06', '0000-00-00 00:00:00', '2014-04-23'),
(270, 'c2flj5sdd48p04mao57hpu51c5', 1, '::1', '2014-04-24 05:50:45', '2014-04-24 09:28:39', '2014-04-24'),
(271, 'c2flj5sdd48p04mao57hpu51c5', 1, '::1', '2014-04-24 09:28:46', '0000-00-00 00:00:00', '2014-04-24'),
(272, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-04-24 09:29:12', '2014-05-02 10:05:54', '2014-04-24'),
(273, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 09:10:06', '2014-05-02 10:05:54', '2014-05-01'),
(274, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 09:11:06', '2014-05-02 10:05:54', '2014-05-01'),
(275, 'd3jdihrtikn1e0qpdunmd6u370', 1, '::1', '2014-05-01 09:41:27', '2014-05-01 09:42:04', '2014-05-01'),
(276, 'd3jdihrtikn1e0qpdunmd6u370', 1, '::1', '2014-05-01 09:45:17', '0000-00-00 00:00:00', '2014-05-01'),
(277, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 09:46:31', '2014-05-02 10:05:54', '2014-05-01'),
(278, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 11:23:57', '2014-05-02 10:05:54', '2014-05-01'),
(279, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 11:24:44', '2014-05-02 10:05:54', '2014-05-01'),
(280, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 11:56:31', '2014-05-02 10:05:54', '2014-05-01'),
(281, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 12:07:37', '2014-05-02 10:05:54', '2014-05-01'),
(282, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 12:08:16', '2014-05-02 10:05:54', '2014-05-01'),
(283, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 12:08:31', '2014-05-02 10:05:54', '2014-05-01'),
(284, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 17:46:39', '2014-05-02 10:05:54', '2014-05-01'),
(285, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-01 17:46:52', '2014-05-02 10:05:54', '2014-05-01'),
(286, 'kimkfl63kl7pjgeecmfpo5vet4', 1, '::1', '2014-05-02 10:28:46', '0000-00-00 00:00:00', '2014-05-02'),
(287, 'hdrvm8tr9jdkonhk0k2v0e43q4', 1, '::1', '2014-05-02 17:54:57', '0000-00-00 00:00:00', '2014-05-02'),
(288, 'pfqlvodd33d8jkm1jvaa55e8b6', 1, '::1', '2014-05-05 10:30:26', '2014-05-06 12:39:29', '2014-05-05'),
(289, 'pfqlvodd33d8jkm1jvaa55e8b6', 1, '::1', '2014-05-05 12:15:54', '2014-05-06 12:39:29', '2014-05-05'),
(290, 'blr4r52tmv4tdb7aui1f2i4vi4', 1, '::1', '2014-05-05 14:14:52', '2014-05-08 20:19:53', '2014-05-05'),
(291, 'blr4r52tmv4tdb7aui1f2i4vi4', 2, '::1', '2014-05-05 14:38:44', '2014-05-05 14:38:53', '2014-05-05'),
(292, 'blr4r52tmv4tdb7aui1f2i4vi4', 1, '::1', '2014-05-05 15:53:30', '2014-05-08 20:19:53', '2014-05-05'),
(293, 'pfqlvodd33d8jkm1jvaa55e8b6', 2, '::1', '2014-05-05 17:25:25', '2014-05-05 17:50:20', '2014-05-05'),
(294, 'pfqlvodd33d8jkm1jvaa55e8b6', 1, '::1', '2014-05-05 17:38:23', '2014-05-06 12:39:29', '2014-05-05'),
(295, 'pfqlvodd33d8jkm1jvaa55e8b6', 2, '::1', '2014-05-05 17:38:39', '2014-05-05 17:50:20', '2014-05-05'),
(296, 'pfqlvodd33d8jkm1jvaa55e8b6', 1, '::1', '2014-05-05 17:50:27', '2014-05-06 12:39:29', '2014-05-05'),
(297, 'pfqlvodd33d8jkm1jvaa55e8b6', 1, '::1', '2014-05-06 12:39:35', '0000-00-00 00:00:00', '2014-05-06'),
(298, '0ds1gtntpjasd5iqm4mki8iti3', 1, '::1', '2014-05-07 15:51:22', '2014-05-09 10:11:41', '2014-05-07'),
(299, '0ds1gtntpjasd5iqm4mki8iti3', 1, '::1', '2014-05-07 17:03:57', '2014-05-09 10:11:41', '2014-05-07'),
(300, '0ds1gtntpjasd5iqm4mki8iti3', 1, '::1', '2014-05-07 17:22:23', '2014-05-09 10:11:41', '2014-05-07'),
(301, '0ds1gtntpjasd5iqm4mki8iti3', 2, '::1', '2014-05-08 11:16:35', '2014-05-09 10:37:55', '2014-05-08'),
(302, 'pobk56kekoomq7r4u3a8ufus54', 1, '::1', '2014-05-08 11:26:48', '0000-00-00 00:00:00', '2014-05-08'),
(303, 'pobk56kekoomq7r4u3a8ufus54', 1, '::1', '2014-05-08 11:26:49', '0000-00-00 00:00:00', '2014-05-08'),
(304, '0ds1gtntpjasd5iqm4mki8iti3', 1, '::1', '2014-05-08 11:27:27', '2014-05-09 10:11:41', '2014-05-08'),
(305, 'blr4r52tmv4tdb7aui1f2i4vi4', 1, '::1', '2014-05-08 11:58:57', '2014-05-08 20:19:53', '2014-05-08'),
(306, 'blr4r52tmv4tdb7aui1f2i4vi4', 1, '::1', '2014-05-08 14:16:25', '2014-05-08 20:19:53', '2014-05-08'),
(307, '0ds1gtntpjasd5iqm4mki8iti3', 1, '127.0.0.1', '2014-05-08 20:20:58', '2014-05-09 10:11:41', '2014-05-08'),
(308, 'blr4r52tmv4tdb7aui1f2i4vi4', 1, '::1', '2014-05-08 20:37:56', '0000-00-00 00:00:00', '2014-05-08'),
(309, '0ds1gtntpjasd5iqm4mki8iti3', 2, '127.0.0.1', '2014-05-09 10:11:48', '2014-05-09 10:37:55', '2014-05-09'),
(310, '0ds1gtntpjasd5iqm4mki8iti3', 1, '127.0.0.1', '2014-05-09 10:37:59', '0000-00-00 00:00:00', '2014-05-09'),
(311, '13ac2rcejb4mba7lul4evmol31', 1, '::1', '2014-05-12 09:58:49', '2014-05-12 11:56:07', '2014-05-12'),
(312, '13ac2rcejb4mba7lul4evmol31', 1, '::1', '2014-05-12 11:47:11', '2014-05-12 11:56:07', '2014-05-12'),
(313, '13ac2rcejb4mba7lul4evmol31', 2, '::1', '2014-05-12 11:47:28', '2014-05-12 14:40:46', '2014-05-12'),
(314, '13ac2rcejb4mba7lul4evmol31', 1, '::1', '2014-05-12 11:55:59', '2014-05-12 11:56:07', '2014-05-12'),
(315, '13ac2rcejb4mba7lul4evmol31', 2, '::1', '2014-05-12 11:56:17', '2014-05-12 14:40:46', '2014-05-12'),
(316, '13ac2rcejb4mba7lul4evmol31', 1, '::1', '2014-05-12 14:40:51', '0000-00-00 00:00:00', '2014-05-12'),
(317, 'rohd4b0a2055ko6a9a5l1bbq81', 1, '::1', '2014-05-12 20:31:04', '0000-00-00 00:00:00', '2014-05-12'),
(318, 'tkn6r41tb22p4qtolgc1vjq7f1', 1, '::1', '2014-05-14 21:42:39', '0000-00-00 00:00:00', '2014-05-14'),
(319, '13ac2rcejb4mba7lul4evmol31', 1, '::1', '2014-05-16 11:06:34', '0000-00-00 00:00:00', '2014-05-16'),
(320, 'tkn6r41tb22p4qtolgc1vjq7f1', 1, '::1', '2014-05-16 11:25:41', '0000-00-00 00:00:00', '2014-05-16'),
(321, '588qmkk0ovdckstdpoq6ml0tv1', 1, '127.0.0.1', '2014-05-16 17:43:02', '2014-05-16 17:54:11', '2014-05-16'),
(322, '588qmkk0ovdckstdpoq6ml0tv1', 1, '127.0.0.1', '2014-05-16 17:54:15', '0000-00-00 00:00:00', '2014-05-16'),
(323, '8dv68i115j3ff55ihr2m4b69t2', 1, '::1', '2014-05-19 17:46:13', '0000-00-00 00:00:00', '2014-05-19'),
(324, '7a92fstapfgfli3dhgjg085cv3', 1, '::1', '2014-05-19 18:05:30', '0000-00-00 00:00:00', '2014-05-19'),
(325, 'rv8cciboo6hkp5ao92o4ks9m45', 1, '::1', '2014-05-19 18:59:31', '0000-00-00 00:00:00', '2014-05-19'),
(326, 'p8e5oub0d7l393q1k99la5n8i2', 1, '::1', '2014-05-20 11:43:00', '0000-00-00 00:00:00', '2014-05-20'),
(327, 'kh6mso48fm2ppvp5oj9d2r8mq6', 1, '::1', '2014-05-20 11:43:58', '0000-00-00 00:00:00', '2014-05-20'),
(328, 'kqli5oaqfmnaunv4r4fhvni713', 1, '::1', '2014-05-20 17:40:22', '0000-00-00 00:00:00', '2014-05-20'),
(329, 'jo260k8qkj0bedadtbjpvr5ur3', 1, '::1', '2014-05-20 17:40:50', '0000-00-00 00:00:00', '2014-05-20'),
(330, 'g77a42bimfeg63v180esbmtbp1', 1, '::1', '2014-05-23 18:17:01', '0000-00-00 00:00:00', '2014-05-23'),
(331, 'jo260k8qkj0bedadtbjpvr5ur3', 1, '::1', '2014-05-26 10:39:04', '0000-00-00 00:00:00', '2014-05-26'),
(332, 'v7u9lumooubs2go1o7b5oip0u1', 1, '::1', '2014-05-26 15:35:59', '0000-00-00 00:00:00', '2014-05-26'),
(333, 'ujj1bju8u23cpt9ai6i8ca1h75', 1, '::1', '2014-12-08 12:37:11', '2014-12-08 12:39:24', '2014-12-08'),
(334, 'ujj1bju8u23cpt9ai6i8ca1h75', 1, '::1', '2014-12-08 12:39:37', '0000-00-00 00:00:00', '2014-12-08'),
(335, 'a76emj142sa7549cmpn2tqdv21', 1, '::1', '2014-12-08 15:25:46', '2014-12-09 08:41:20', '2014-12-08'),
(336, 'a76emj142sa7549cmpn2tqdv21', 1, '::1', '2014-12-09 04:24:23', '2014-12-09 08:41:20', '2014-12-09'),
(337, 'a76emj142sa7549cmpn2tqdv21', 1, '::1', '2014-12-09 08:41:31', '0000-00-00 00:00:00', '2014-12-09'),
(338, 'k4k1do9l3nkme15tcf5jtab2c7', 1, '::1', '2014-12-11 05:32:26', '0000-00-00 00:00:00', '2014-12-11'),
(339, 'k9q3138vt5skn6vtidpiq418v1', 1, '::1', '2014-12-11 13:24:27', '0000-00-00 00:00:00', '2014-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE IF NOT EXISTS `system_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `systemName` varchar(250) NOT NULL,
  `systemVal` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`id`, `systemName`, `systemVal`) VALUES
(1, 'SITE_NAME', 'Hours Reservation System'),
(2, 'ADMIN_EMAIL', 'pragam.kumar@sparxtechnologies.com'),
(3, 'PHONE_NO', '099902351363'),
(4, 'SITE_URL', 'http://www.sparxitsolutions.com/clients/studentride');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `usertype` enum('1','2') NOT NULL COMMENT '1=barber 2=user',
  `image` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `postCode` varchar(255) NOT NULL,
  `countryId` int(11) NOT NULL,
  `stateId` bigint(20) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `pricerange` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `teambarbers` varchar(255) NOT NULL,
  `signature` text NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `isDeleted` enum('0','1') NOT NULL,
  `hash` varchar(255) NOT NULL,
  `registerDate` datetime NOT NULL,
  `registerIP` varchar(255) NOT NULL,
  `modDate` datetime NOT NULL,
  `modBy` int(11) NOT NULL,
  `activationCode` varchar(255) NOT NULL,
  `fpwdcode` varchar(255) NOT NULL,
  `social_media` varchar(255) NOT NULL,
  `social_media_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `userPassword`, `usertype`, `image`, `dob`, `phone`, `gender`, `postCode`, `countryId`, `stateId`, `specialization`, `pricerange`, `experience`, `teambarbers`, `signature`, `status`, `isDeleted`, `hash`, `registerDate`, `registerIP`, `modDate`, `modBy`, `activationCode`, `fpwdcode`, `social_media`, `social_media_id`) VALUES
(6, 'Tester', 'kumar', 'Ramesh Kum', 'ramesh@gmail.com', 'ae11976937537e4c1206237dea035331:d4', '1', '', '0000-00-00', '', 'M', '111122', 1, 0, '', '', '', '', '', '1', '0', '4060f3c403a090973b72c60ee4dc8a12', '2011-09-27 03:34:19', '192.168.1.58', '2011-12-17 01:36:17', 0, '', '', '', ''),
(9, 'test', 'test', 'saurav', 'test@abc.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '1', '', '0000-00-00', '', 'M', '123456', 1, 0, '', '', '', '', '', '1', '0', 'eda3eabc32997734d3f844ecd5a4d2db', '2011-10-01 12:58:50', '192.168.1.58', '2012-01-04 04:04:17', 1, '9abc2e2250ccce48bd557fb95a11d472:d4', '', '', ''),
(10, 'test', 'test', 'Ramesh Kumar', 'test22@abc.com', 'ae11976937537e4c1206237dea035331:d4', '1', '', '0000-00-00', '', 'M', '123456', 1, 0, '', '', '', '', '', '0', '0', '853ae90f0351324bd73ea615e6487517', '2011-10-01 01:00:00', '192.168.1.58', '2011-12-17 01:36:18', 10, 'DEFG5HIJ5L45MNOP352Q', '', '', ''),
(11, 'test', 'test', 'ramesh', 'test223@abc.com', 'ae11976937537e4c1206237dea035331:d4', '1', '', '0000-00-00', '', 'M', '123456', 1, 0, '', '', '', '', '', '0', '0', '853ae90f0351324bd73ea615e6487517', '2011-10-01 01:00:57', '192.168.1.58', '2011-12-17 01:36:18', 11, '25b69e24873c2adc9ff7527b4a068ff0:d4', '5MNOP352QRSTU5VW5Y5Z', '', ''),
(13, 'John', 'Smith', 'tester', 'test@test1234.com', 'ae11976937537e4c1206237dea035331:d4', '1', '', '0000-00-00', '', 'M', '12345644', 1, 0, '', '', '', '', '', '1', '0', 'e23c6e3869ffbd829ad1768e59112174', '2011-10-01 02:29:32', '192.168.1.58', '2011-12-17 01:29:47', 1, '7d0b4ddae8686ceac1e03f902d2a0e44:d4', 'x54yzABCDEFG5HIJ5L45', '', ''),
(16, 'Tester', 'kumar', 'Rajan', 'test@example.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '1', '', '0000-00-00', '', 'M', '123456', 1, 0, '', '', '', '', '', '1', '0', '853ae90f0351324bd73ea615e6487517', '2011-10-03 04:13:50', '192.168.1.58', '2011-12-17 01:29:47', 1, '', '', '', ''),
(17, 'test', 'test', 'tester', 'test1@example.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '1', '', '0000-00-00', '', 'M', '121212', 1, 0, '', '', '', '', '', '1', '0', '0c92cf6c7e8874cb32c8e4b9bd8815d4', '2011-11-02 11:41:01', '192.168.1.116', '2011-12-17 01:29:47', 1, '4c5bed6fe41a6fc4c7942eed73991828:d4', '', '', ''),
(28, 'akash', 'sourav', 'akashsourav', 'akash@akash.com', 'fbf0346cca445150728f8b935eba2261:d4', '1', '', '1988-08-18', '9015097655', 'M', '123457', 1, 2, 'nothing', '$5-$12', '3 years', 'jhon,rocky', 'i m the best.', '1', '0', '853ae90f0351324bd73ea615e6487517', '2011-12-12 11:40:02', '192.168.1.117', '2012-01-04 12:45:13', 28, '', '', '', ''),
(32, 'akash', 'sourav', 'User51049', 'akash123@akash.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '1', '', '1988-08-18', '', 'M', '110032', 1, 2, '', '', '', '', '', '1', '0', '403019984be3221da25d407645e89b87', '2011-12-14 02:48:53', '192.168.1.117', '2011-12-17 01:29:47', 1, '', '', '', ''),
(35, 'akash', 'sourav', 'User22307', 'akash1@akash.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '2', '', '1988-08-18', '9874563214', 'M', '115522', 1, 2, '', '', '', '', 'hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello', '1', '0', '853ae90f0351324bd73ea615e6487517', '2012-01-03 11:20:44', '192.168.1.117', '2012-01-05 05:28:50', 35, '09b291f3bf6c127ca56837cf536dba97:d4', '', '', ''),
(36, 'sen', 'kumari', 'sen', 'vikas@gmail.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '1', '', '2012-12-08', '9958704095', 'F', '96', 1, 0, 'social network', '12', '5', '12', 'sen', '1', '0', '5d2e65e520093e296bf9e2e4d886b921', '2012-01-04 03:27:55', '192.168.1.111', '2012-01-11 11:51:49', 1, '', '', '', ''),
(38, 'vishal', 'kumar', 'vishal', 'vishal@gmail.com', '9f5e50d369f302c14743ea09f8cc83b6:d4', '1', '', '0000-00-00', '', 'M', '110096', 1, 0, '', '', '', '', '', '1', '0', 'a3f32342f9396f78c2b14140bbcebe19', '2012-01-08 10:17:44', '192.168.1.111', '2012-01-11 11:52:03', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userType` varchar(151) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `userType`, `description`, `status`) VALUES
(1, 'H.R', 'H.R as user type in front section', '1'),
(2, 'Psychologist', 'Psychologist of user type  in front section', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
