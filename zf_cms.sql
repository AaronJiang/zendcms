-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 04:47 PM
-- Server version: 5.1.62
-- PHP Version: 5.3.10-1ubuntu2ppa6~lucid

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `zf_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `description` text,
  `priority` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `author`, `email`, `date`, `url`, `description`, `priority`, `status`) VALUES
(3, 'aaron', 'aaron.jiang@jijesoft.com', 1384185600, 'http://google.com', 'Return error 404', 'high', 'in_progress'),
(2, 'aaron', 'jianglong14@gmail.com', 594316800, 'http://google.com', 'cannot add url', 'low', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `content_nodes`
--

CREATE TABLE IF NOT EXISTS `content_nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `node` varchar(50) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `content_nodes`
--

INSERT INTO `content_nodes` (`id`, `page_id`, `node`, `content`) VALUES
(24, 6, 'content', 'While a README isn\\''t a required part of a GitHub repository, it is a very good idea to have one. READMEs are a great place to describe your project or add some documentation such as how to install or use your project. You might want to include contact information - if your project becomes popular people will want to help you out.'),
(23, 6, 'description', 'Every time you make a commit with Git, it is stored in a repository (a.k.a. \\"repo\\"). To put your project up on GitHub, you\\''ll need to have a GitHub repository for it to live in.'),
(22, 6, 'image', '/images/upload/create-a-repo-316155b9bd3e6db0741572ce08f0c8f2.gif'),
(21, 6, 'headline', 'Create A Repo'),
(17, 5, 'headline', 'Set Up Git'),
(18, 5, 'image', '/images/upload/set-up-git-27bd5975b24e994bc994ec1cf5c82ff9.gif'),
(19, 5, 'description', 'At the heart of GitHub is an open source version control system (VCS) called Git*.  Git is responsible for everything GitHub related that happens locally on your computer.'),
(20, 5, 'content', 'A line that begins with the dollar sign ($) indicates a line of Bash script you need to type. To enter it, type the text that follows the $, hitting the return key at the end of each line. You can hover your mouse over each line for an explanation of what the script is doing.\r\nOutput\r\n\r\n# This is output text.\r\n\r\nA line that does not begin with a $ is output text that is intended to give you information or tell you what to do next. We\\\\\\\\\\\\\\''ve colored output text green in these bootcamp tutorials.\r\nUser Specific Input\r\n\r\necho \\\\\\\\\\\\\\''username\\\\\\\\\\\\\\''\r\n# Outputs the text in the quotation marks.\r\n\r\nAreas of yellow text represent your own personal info, repos, etc. If it is part of an input ($) line, you should replace it with your own info when you type it. If it is part of output text, it is just for your reference. It will automatically show your own info in Terminal.\r\n\r\n    Good to know: There will be times when you type code, hit return, and all you are given is another prompt. Some actions that you execute in Terminal don\\\\\\\\\\\\\\''t have any output. Don\\\\\\\\\\\\\\''t worry, if there is ever a problem with your code, Terminal will let you know.\r\n\r\n    Good to know: For security reasons, Terminal will not display what you type when entering passwords. Just type your password and hit the return key.'),
(25, 7, 'headline', 'Fork A Repo'),
(26, 7, 'image', '/images/upload/fork-a-repo-ed05481242920a4e14293ba1acb95462.gif'),
(27, 7, 'description', 'At some point you may find yourself wanting to contribute to someone else\\''s project, or would like to use someone\\''s project as the starting point for your own. Spoon-Knife project.'),
(29, 8, 'headline', 'Be Social'),
(28, 7, 'content', 'You\\''ve successfully forked a repository, but get a load of these other cool things you can do:\r\nPush commits\r\n\r\nOnce you\\''ve made some commits to a forked repository and want to push it to your forked project, you do it the same way you would with a regular repository:\r\nMore about commits\r\n\r\ngit push origin master\r\n# Pushes commits to your remote repository stored on GitHub\r\n\r\nPull in upstream changes\r\n\r\nIf the original repository you forked your project from gets updated, you can add those updates to your fork by running the following code:'),
(30, 8, 'image', '/images/upload/be-social-d28435fe03535dfa84b8b83894a4f468.gif'),
(31, 8, 'description', 'One of the great features on GitHub is the ability to see what other people are working on and who they are connecting with. When you follow someone, you will get notifications on your dashboard about their GitHub activity.'),
(32, 8, 'content', 'At some point you may want to stay up-to-date with a specific project. We\\''ve made this easy to do.\r\nWatch a project\r\n\r\nOur friend the Octocat has a project called Hello World that we\\''d like to watch.\r\n\r\nOnce you are on the project page, you will notice there is a \\"watch\\" button at the top of the page. Click on it.');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `access_level` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `access_level`) VALUES
(2, 'admin_menu', NULL),
(1, 'main_menu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `label` varchar(250) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `label`, `page_id`, `link`, `position`) VALUES
(1, 2, 'Manage Content', 0, '/page', 1),
(2, 2, 'Manage Menus', 0, '/menu', 2),
(3, 1, 'Home', 0, '/', 1),
(4, 2, 'Rebuild Search Index', 0, '/search/build', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `namespace` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `namespace`, `name`, `date_created`) VALUES
(7, 0, 'page', 'Fork A Repo', 1368601109),
(6, 0, 'page', 'Create A Repo', 1368600926),
(5, 0, 'page', 'Set Up Git', 1368600803),
(8, 0, 'page', 'Be Social', 1368601486);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'Aaron', '202cb962ac59075b964b07152d234b70', 'Long', 'Jiang', 'User'),
(2, 'Steve', '202cb962ac59075b964b07152d234b70', 'Steve', 'Jobs', 'Administrator');
