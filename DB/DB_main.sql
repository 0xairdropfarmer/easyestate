-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2017 at 06:56 PM
-- Server version: 5.5.54
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dev_easyestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `body`, `image`, `create_date`, `is_delete`) VALUES
(1, 'test', 'test', NULL, '2017-03-19 07:35:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `create_date`, `update_date`, `is_delete`) VALUES
(1, 'Casas', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'Oficinas', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers_request`
--

CREATE TABLE `customers_request` (
  `id` int(11) NOT NULL,
  `property_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` mediumtext NOT NULL,
  `datetime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_request`
--

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `is_delete`) VALUES
(2, 'Balcony', 1),
(3, 'Dishwasher', 1),
(4, 'Calentador', 1),
(5, 'Cable', 0),
(6, 'Alberca', 0),
(7, 'Estacionamiento', 0),
(8, 'Internet', 0),
(10, 'Grill', 1),
(11, 'More', 1),
(12, 'Inctercard ', 1),
(13, 'Aire acondicionado', 0),
(14, 'Balcón', 0),
(15, 'Terraza', 0),
(16, 'amiante', 0),
(17, 'garage', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2017-03-08 21:51:07', '2017-03-08 21:51:07'),
(2, 1, 'en', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2017-03-08 21:51:07', '2017-03-08 21:51:07'),
(3, 0, 'en', 'frontend', 'GoogleMapLanguage', 'en', '2017-03-08 21:51:07', '2017-03-19 12:18:46'),
(4, 0, 'en', 'frontend', 'Home', 'Home', '2017-03-08 21:51:07', '2017-03-19 12:18:46'),
(5, 0, 'en', 'frontend', 'MapHome', 'Map Home', '2017-03-08 21:51:07', '2017-03-19 12:18:46'),
(6, 0, 'en', 'frontend', 'About', 'About Us', '2017-03-08 21:51:07', '2017-03-19 12:18:46'),
(7, 0, 'en', 'frontend', 'Contact', 'Contact', '2017-03-08 21:51:07', '2017-03-19 12:18:46'),
(8, 0, 'en', 'frontend', 'Calculator', 'Calculator', '2017-03-08 21:51:07', '2017-03-19 12:18:46'),
(9, 0, 'en', 'frontend', 'Listing', 'Listings', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(10, 0, 'en', 'frontend', 'Login', 'Login', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(11, 0, 'en', 'frontend', 'Register', 'Register', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(12, 0, 'en', 'frontend', 'Realesates', 'Real Estates', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(13, 0, 'en', 'frontend', 'Beds', 'Beds', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(14, 0, 'en', 'frontend', 'Bath', 'Bath', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(15, 0, 'en', 'frontend', 'Place', 'Place', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(16, 0, 'en', 'frontend', 'Address', 'Address', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(17, 0, 'en', 'frontend', 'Area', 'Area', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(18, 0, 'en', 'frontend', 'Sale', 'For Sale', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(19, 0, 'en', 'frontend', 'Rent', 'For Rent', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(20, 0, 'en', 'frontend', 'Agents', 'Agents', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(21, 0, 'en', 'frontend', 'FeaturedAgents', 'Featured Agents', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(22, 0, 'en', 'frontend', 'Featured', 'Featured', '2017-03-08 21:51:08', '2017-03-19 12:18:46'),
(23, 0, 'en', 'frontend', 'Featured Properties', 'Featured Properties', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(24, 0, 'en', 'frontend', 'Properties', 'Properties', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(25, 0, 'en', 'frontend', 'Search', 'Search', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(26, 0, 'en', 'frontend', 'search_title', 'Properties for Rent/Sale', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(27, 0, 'en', 'frontend', 'All', 'All', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(28, 0, 'en', 'frontend', 'PriceFrom', 'Price From', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(29, 0, 'en', 'frontend', 'PriceTo', 'Price To', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(30, 0, 'en', 'frontend', 'Keywords', 'Keyowrds', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(31, 0, 'en', 'frontend', 'Zip', 'Zip', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(32, 0, 'en', 'frontend', 'Results', 'Results', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(33, 0, 'en', 'frontend', 'Result', 'Results', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(34, 0, 'en', 'frontend', 'MessageSend', 'Send Message', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(35, 0, 'en', 'frontend', 'FillFormtoContact', 'Fill form to contact with us.', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(36, 0, 'en', 'frontend', 'Description', 'Description', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(37, 0, 'en', 'frontend', 'RelatedProperties', 'Related Properties', '2017-03-08 21:51:09', '2017-03-19 12:18:46'),
(38, 0, 'en', 'frontend', 'FeaturedProperties', 'Featured Properties', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(39, 0, 'en', 'frontend', 'Features', 'Features', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(40, 0, 'en', 'frontend', 'Listings', 'Listings', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(41, 0, 'en', 'frontend', 'Name', 'Name', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(42, 0, 'en', 'frontend', 'Email', 'Email', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(43, 0, 'en', 'frontend', 'Phone', 'Phone', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(44, 0, 'en', 'frontend', 'Message', 'Message', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(45, 0, 'en', 'frontend', 'Copyright', 'Copyright', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(46, 0, 'en', 'frontend', 'Gallery', 'Gallery', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(47, 0, 'en', 'frontend', 'ContactDetails', 'Contact Details', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(48, 0, 'en', 'frontend', 'ContactThankYou', 'Thank you for Contacting With Us. We Will contact back you soon', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(49, 0, 'en', 'frontend', 'Language', 'Language', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(50, 0, 'en', 'frontend', 'Pages', 'Pages', '2017-03-08 21:51:10', '2017-03-19 12:18:46'),
(51, 0, 'en', 'frontend', 'Category', 'Category', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(52, 0, 'en', 'frontend', 'Type', 'Type', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(53, 0, 'en', 'frontend', 'Any', 'Any', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(54, 0, 'en', 'frontend', 'Stay_Informed', 'Stay Informed', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(55, 0, 'en', 'frontend', 'SIGN_UP_NEWSLETTER', 'SIGN UP FOR OUR NEWSLETTER', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(56, 0, 'en', 'frontend', 'Thank_You', 'Thank you', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(57, 0, 'en', 'frontend', 'ForSale', 'En venta', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(58, 0, 'en', 'frontend', 'ForRent', 'En renta', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(59, 0, 'en', 'frontend', 'Map', 'Map', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(60, 0, 'en', 'frontend', 'Price', 'Price', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(61, 0, 'en', 'frontend', 'City', 'City', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(62, 0, 'en', 'frontend', 'State', 'State', '2017-03-08 21:51:11', '2017-03-19 12:18:46'),
(63, 0, 'en', 'frontend', 'Location', 'Location', '2017-03-08 21:51:12', '2017-03-19 12:18:46'),
(64, 0, 'en', 'frontend', 'OrderBy', 'Order By', '2017-03-08 21:51:12', '2017-03-19 12:18:46'),
(65, 0, 'en', 'frontend', 'Links', 'Useful Links', '2017-03-08 21:51:12', '2017-03-19 12:18:46'),
(66, 1, 'en', 'pagination', 'previous', '&laquo; Previous', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(67, 1, 'en', 'pagination', 'next', 'Next &raquo;', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(68, 1, 'en', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(69, 1, 'en', 'passwords', 'reset', 'Your password has been reset!', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(70, 1, 'en', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(71, 1, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(72, 1, 'en', 'passwords', 'user', 'We can''t find a user with that e-mail address.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(73, 1, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(74, 1, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(75, 1, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(76, 1, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(77, 1, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2017-03-08 21:51:12', '2017-03-08 21:51:12'),
(78, 1, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(79, 1, 'en', 'validation', 'array', 'The :attribute must be an array.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(80, 1, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(81, 1, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(82, 1, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(83, 1, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(84, 1, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(85, 1, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(86, 1, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(87, 1, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(88, 1, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(89, 1, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(90, 1, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(91, 1, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(92, 1, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(93, 1, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(94, 1, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(95, 1, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(96, 1, 'en', 'validation', 'file', 'The :attribute must be a file.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(97, 1, 'en', 'validation', 'filled', 'The :attribute field is required.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(98, 1, 'en', 'validation', 'image', 'The :attribute must be an image.', '2017-03-08 21:51:13', '2017-03-08 21:51:13'),
(99, 1, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(100, 1, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(101, 1, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(102, 1, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(103, 1, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(104, 1, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(105, 1, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(106, 1, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(107, 1, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(108, 1, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(109, 1, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(110, 1, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(111, 1, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(112, 1, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2017-03-08 21:51:14', '2017-03-08 21:51:14'),
(113, 1, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(114, 1, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(115, 1, 'en', 'validation', 'present', 'The :attribute field must be present.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(116, 1, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(117, 1, 'en', 'validation', 'required', 'The :attribute field is required.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(118, 1, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(119, 1, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(120, 1, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(121, 1, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(122, 1, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(123, 1, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(124, 1, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(125, 1, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(126, 1, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(127, 1, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(128, 1, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(129, 1, 'en', 'validation', 'string', 'The :attribute must be a string.', '2017-03-08 21:51:15', '2017-03-08 21:51:15'),
(130, 1, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2017-03-08 21:51:16', '2017-03-08 21:51:16'),
(131, 1, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2017-03-08 21:51:16', '2017-03-08 21:51:16'),
(132, 1, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2017-03-08 21:51:16', '2017-03-08 21:51:16'),
(133, 1, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2017-03-08 21:51:16', '2017-03-08 21:51:16'),
(134, 1, 'es', 'auth', 'failed', 'These credentials do not match our records.', '2017-03-08 21:51:16', '2017-03-08 21:51:16'),
(135, 1, 'es', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2017-03-08 21:51:16', '2017-03-08 21:51:16'),
(136, 0, 'es', 'frontend', 'GoogleMapLanguage', 'es', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(137, 0, 'es', 'frontend', 'Home', 'CasaH', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(138, 0, 'es', 'frontend', 'MapHome', 'Mapa Inicio', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(139, 0, 'es', 'frontend', 'About', 'Acerca de', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(140, 0, 'es', 'frontend', 'Contact', 'Contacto', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(141, 0, 'es', 'frontend', 'Calculator', 'Calculadora', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(142, 0, 'es', 'frontend', 'Listing', 'Listado', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(143, 0, 'es', 'frontend', 'Listings', 'Listados', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(144, 0, 'es', 'frontend', 'Login', 'de sesión', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(145, 0, 'es', 'frontend', 'Register', 'de registro', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(146, 0, 'es', 'frontend', 'Realesates', 'Bienes Raices', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(147, 0, 'es', 'frontend', 'Beds', 'Dormitorios', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(148, 0, 'es', 'frontend', 'Bath', 'Bañera', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(149, 0, 'es', 'frontend', 'Place', 'Lugar', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(150, 0, 'es', 'frontend', 'Address', 'Dirección', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(151, 0, 'es', 'frontend', 'Area', 'Zona', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(152, 0, 'es', 'frontend', 'Sale', 'En venta', '2017-03-08 21:51:16', '2017-03-19 12:18:46'),
(153, 0, 'es', 'frontend', 'Rent', 'En renta', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(154, 0, 'es', 'frontend', 'Agents', 'Agentes', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(155, 0, 'es', 'frontend', 'FeaturedAgents', 'Agentes Destacados', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(156, 0, 'es', 'frontend', 'Featured', 'Representado', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(157, 0, 'es', 'frontend', 'FeaturedProperties', 'Representado Propiedades', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(158, 0, 'es', 'frontend', 'Properties', 'Propiedades', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(159, 0, 'es', 'frontend', 'Search', 'Buscar', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(160, 0, 'es', 'frontend', 'search_title', 'Propiedades en venta/renta', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(161, 0, 'es', 'frontend', 'All', 'Todas', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(162, 0, 'es', 'frontend', 'PriceFrom', 'Precio de', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(163, 0, 'es', 'frontend', 'PriceTo', 'Para precio', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(164, 0, 'es', 'frontend', 'Keywords', 'Palabras clave', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(165, 0, 'es', 'frontend', 'Zip', 'Cremallera', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(166, 0, 'es', 'frontend', 'Results', 'Resultados', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(167, 0, 'es', 'frontend', 'Result', 'Resultados', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(168, 0, 'es', 'frontend', 'MessageSend', 'Enviar Mensaje', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(169, 0, 'es', 'frontend', 'FillFormtoContact', 'Rellenar formulario para contactar con nosotros .', '2017-03-08 21:51:17', '2017-03-19 12:18:46'),
(170, 0, 'es', 'frontend', 'Description', 'Descripción', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(171, 0, 'es', 'frontend', 'RelatedProperties', 'Propiedades relacionadas', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(172, 0, 'es', 'frontend', 'Features', 'Caracteristicas', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(173, 0, 'es', 'frontend', 'Name', 'Nombre', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(174, 0, 'es', 'frontend', 'Email', 'Email', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(175, 0, 'es', 'frontend', 'Phone', 'Teléfono', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(176, 0, 'es', 'frontend', 'Message', 'Mensaje', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(177, 0, 'es', 'frontend', 'Copyright', 'Copyright', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(178, 0, 'es', 'frontend', 'Gallery', 'Galería', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(179, 0, 'es', 'frontend', 'Pages', 'Categoría', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(180, 0, 'es', 'frontend', 'ContactDetails', 'Detalles de contacto', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(181, 0, 'es', 'frontend', 'ContactThankYou', 'Gracias por ponerse en contacto con nosotros. Nos pondremos en contacto con usted pronto regreso', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(182, 0, 'es', 'frontend', 'Language', 'Idioma', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(183, 0, 'es', 'frontend', 'Category', 'Category', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(184, 0, 'es', 'frontend', 'Type', 'Tipo', '2017-03-08 21:51:18', '2017-03-19 12:18:46'),
(185, 0, 'es', 'frontend', 'Any', 'Alguna', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(186, 0, 'es', 'frontend', 'Stay_Informed', 'Mantente informado', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(187, 0, 'es', 'frontend', 'SIGN_UP_NEWSLETTER', 'INSCRIBIRSE PARA NUESTRA NEWSLETTER', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(188, 0, 'es', 'frontend', 'Thank_You', 'Gracias', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(189, 0, 'es', 'frontend', 'ForSale', 'En venta', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(190, 0, 'es', 'frontend', 'ForRent', 'En renta', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(191, 0, 'es', 'frontend', 'Map', 'Map', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(192, 0, 'es', 'frontend', 'Price', 'Precio', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(193, 0, 'es', 'frontend', 'City', 'City', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(194, 0, 'es', 'frontend', 'State', 'State', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(195, 0, 'es', 'frontend', 'Location', 'Location', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(196, 0, 'es', 'frontend', 'OrderBy', 'Order By', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(197, 0, 'es', 'frontend', 'Links', 'Useful Links', '2017-03-08 21:51:19', '2017-03-19 12:18:46'),
(198, 1, 'es', 'pagination', 'previous', '&laquo; Previous', '2017-03-08 21:51:19', '2017-03-08 21:51:19'),
(199, 1, 'es', 'pagination', 'next', 'Next &raquo;', '2017-03-08 21:51:19', '2017-03-08 21:51:19'),
(200, 1, 'es', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2017-03-08 21:51:19', '2017-03-08 21:51:19'),
(201, 1, 'es', 'passwords', 'reset', 'Your password has been reset!', '2017-03-08 21:51:19', '2017-03-08 21:51:19'),
(202, 1, 'es', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2017-03-08 21:51:19', '2017-03-08 21:51:19'),
(203, 1, 'es', 'passwords', 'token', 'This password reset token is invalid.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(204, 1, 'es', 'passwords', 'user', 'We can''t find a user with that e-mail address.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(205, 1, 'es', 'validation', 'accepted', 'The :attribute must be accepted.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(206, 1, 'es', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(207, 1, 'es', 'validation', 'after', 'The :attribute must be a date after :date.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(208, 1, 'es', 'validation', 'alpha', 'The :attribute may only contain letters.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(209, 1, 'es', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(210, 1, 'es', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(211, 1, 'es', 'validation', 'array', 'The :attribute must be an array.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(212, 1, 'es', 'validation', 'before', 'The :attribute must be a date before :date.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(213, 1, 'es', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(214, 1, 'es', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(215, 1, 'es', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(216, 1, 'es', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(217, 1, 'es', 'validation', 'boolean', 'The :attribute field must be true or false.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(218, 1, 'es', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(219, 1, 'es', 'validation', 'date', 'The :attribute is not a valid date.', '2017-03-08 21:51:20', '2017-03-08 21:51:20'),
(220, 1, 'es', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(221, 1, 'es', 'validation', 'different', 'The :attribute and :other must be different.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(222, 1, 'es', 'validation', 'digits', 'The :attribute must be :digits digits.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(223, 1, 'es', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(224, 1, 'es', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(225, 1, 'es', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(226, 1, 'es', 'validation', 'email', 'The :attribute must be a valid email address.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(227, 1, 'es', 'validation', 'exists', 'The selected :attribute is invalid.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(228, 1, 'es', 'validation', 'file', 'The :attribute must be a file.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(229, 1, 'es', 'validation', 'filled', 'The :attribute field is required.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(230, 1, 'es', 'validation', 'image', 'The :attribute must be an image.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(231, 1, 'es', 'validation', 'in', 'The selected :attribute is invalid.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(232, 1, 'es', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(233, 1, 'es', 'validation', 'integer', 'The :attribute must be an integer.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(234, 1, 'es', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(235, 1, 'es', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(236, 1, 'es', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(237, 1, 'es', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(238, 1, 'es', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(239, 1, 'es', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2017-03-08 21:51:21', '2017-03-08 21:51:21'),
(240, 1, 'es', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(241, 1, 'es', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(242, 1, 'es', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(243, 1, 'es', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(244, 1, 'es', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(245, 1, 'es', 'validation', 'not_in', 'The selected :attribute is invalid.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(246, 1, 'es', 'validation', 'numeric', 'The :attribute must be a number.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(247, 1, 'es', 'validation', 'present', 'The :attribute field must be present.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(248, 1, 'es', 'validation', 'regex', 'The :attribute format is invalid.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(249, 1, 'es', 'validation', 'required', 'The :attribute field is required.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(250, 1, 'es', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(251, 1, 'es', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(252, 1, 'es', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(253, 1, 'es', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(254, 1, 'es', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(255, 1, 'es', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(256, 1, 'es', 'validation', 'same', 'The :attribute and :other must match.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(257, 1, 'es', 'validation', 'size.numeric', 'The :attribute must be :size.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(258, 1, 'es', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(259, 1, 'es', 'validation', 'size.string', 'The :attribute must be :size characters.', '2017-03-08 21:51:22', '2017-03-08 21:51:22'),
(260, 1, 'es', 'validation', 'size.array', 'The :attribute must contain :size items.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(261, 1, 'es', 'validation', 'string', 'The :attribute must be a string.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(262, 1, 'es', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(263, 1, 'es', 'validation', 'unique', 'The :attribute has already been taken.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(264, 1, 'es', 'validation', 'url', 'The :attribute format is invalid.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(265, 1, 'es', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(266, 1, 'fr', 'auth', 'failed', 'These credentials do not match our records.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(267, 1, 'fr', 'auth', 'throttle', 'Too many login attempts. Please try again in :seconds seconds.', '2017-03-08 21:51:23', '2017-03-08 21:51:23'),
(268, 0, 'fr', 'frontend', 'GoogleMapLanguage', 'fr', '2017-03-08 21:51:23', '2017-03-19 12:18:46'),
(269, 0, 'fr', 'frontend', 'Home', 'Accueil', '2017-03-08 21:51:23', '2017-03-19 12:18:46'),
(270, 0, 'fr', 'frontend', 'MapHome', 'Map Accueil', '2017-03-08 21:51:23', '2017-03-19 12:18:46'),
(271, 0, 'fr', 'frontend', 'Accueil Plan', 'Mapa Inicio', '2017-03-08 21:51:23', '2017-03-19 12:18:46'),
(272, 0, 'fr', 'frontend', 'About', 'Sur', '2017-03-08 21:51:23', '2017-03-19 12:18:46'),
(273, 0, 'fr', 'frontend', 'Contact', 'Contact', '2017-03-08 21:51:23', '2017-03-19 12:18:46'),
(274, 0, 'fr', 'frontend', 'Calculator', 'Calculatrice', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(275, 0, 'fr', 'frontend', 'Listing', 'Inscription', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(276, 0, 'fr', 'frontend', 'Listings', 'Listes', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(277, 0, 'fr', 'frontend', 'Login', 'Connexion', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(278, 0, 'fr', 'frontend', 'Register', 'Inscription', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(279, 0, 'fr', 'frontend', 'Realesates', 'Immobilier esates', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(280, 0, 'fr', 'frontend', 'Beds', 'Des lits', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(281, 0, 'fr', 'frontend', 'Bath', 'Bain', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(282, 0, 'fr', 'frontend', 'Place', 'Endroit', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(283, 0, 'fr', 'frontend', 'Address', 'Adresse', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(284, 0, 'fr', 'frontend', 'Area', 'Région', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(285, 0, 'fr', 'frontend', 'Sale', 'À vendre', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(286, 0, 'fr', 'frontend', 'Rent', 'A louer', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(287, 0, 'fr', 'frontend', 'Agents', 'Agents', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(288, 0, 'fr', 'frontend', 'FeaturedAgents', 'Agents en vedette', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(289, 0, 'fr', 'frontend', 'Featured', 'En vedette', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(290, 0, 'fr', 'frontend', 'FeaturedProperties', 'Propriétés en vedette', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(291, 0, 'fr', 'frontend', 'Properties', 'Propriétés', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(292, 0, 'fr', 'frontend', 'Search', 'Chercher', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(293, 0, 'fr', 'frontend', 'search_title', 'Recherche par Vente / Location', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(294, 0, 'fr', 'frontend', 'All', 'Tout', '2017-03-08 21:51:24', '2017-03-19 12:18:46'),
(295, 0, 'fr', 'frontend', 'PriceFrom', 'Prix ​​à partir', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(296, 0, 'fr', 'frontend', 'PriceTo', 'Prix ​​Pour', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(297, 0, 'fr', 'frontend', 'Keywords', 'Mots clés', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(298, 0, 'fr', 'frontend', 'Zip', 'Code postal', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(299, 0, 'fr', 'frontend', 'Results', 'Résultats', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(300, 0, 'fr', 'frontend', 'Result', 'Résultats', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(301, 0, 'fr', 'frontend', 'MessageSend', 'Envoyer le Message', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(302, 0, 'fr', 'frontend', 'FillFormtoContact', 'Formulaire pour Contacter avec nous Remplissez.', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(303, 0, 'fr', 'frontend', 'Description', 'La Description', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(304, 0, 'fr', 'frontend', 'RelatedProperties', 'Propriétés Connexes', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(305, 0, 'fr', 'frontend', 'Features', 'Caractéristiques', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(306, 0, 'fr', 'frontend', 'Name', 'Prénom', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(307, 0, 'fr', 'frontend', 'Email', 'Email', '2017-03-08 21:51:25', '2017-03-19 12:18:46'),
(308, 0, 'fr', 'frontend', 'Phone', 'Téléphone', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(309, 0, 'fr', 'frontend', 'Message', 'Message', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(310, 0, 'fr', 'frontend', 'Copyright', 'Droits d''auteur', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(311, 0, 'fr', 'frontend', 'Gallery', 'Galerie', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(312, 0, 'fr', 'frontend', 'ContactDetails', 'Détails du contact', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(313, 0, 'fr', 'frontend', 'ContactThankYou', 'Nous vous remercions de contacter avec nous . Nous prendrons contact avec retour bientôt', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(314, 0, 'fr', 'frontend', 'Language', 'La langue', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(315, 0, 'fr', 'frontend', 'Pages', 'Pages', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(316, 0, 'fr', 'frontend', 'Category', 'Catégorie', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(317, 0, 'fr', 'frontend', 'Type', 'Type', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(318, 0, 'fr', 'frontend', 'Any', 'Tout', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(319, 0, 'fr', 'frontend', 'Stay_Informed', 'Rester informé', '2017-03-08 21:51:26', '2017-03-19 12:18:46'),
(320, 0, 'fr', 'frontend', 'SIGN_UP_NEWSLETTER', 'INSCRIVEZ-VOUS À NOTRE NEWSLETTER', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(321, 0, 'fr', 'frontend', 'Thank_You', 'Je vous remercie', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(322, 0, 'fr', 'frontend', 'ForSale', 'En venta', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(323, 0, 'fr', 'frontend', 'ForRent', 'En renta', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(324, 0, 'fr', 'frontend', 'Map', 'Carte', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(325, 0, 'fr', 'frontend', 'Price', 'Prix', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(326, 0, 'fr', 'frontend', 'City', 'Ville', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(327, 0, 'fr', 'frontend', 'State', 'Etat', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(328, 0, 'fr', 'frontend', 'Location', 'Emplacement', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(329, 0, 'fr', 'frontend', 'OrderBy', 'Commandé par', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(330, 0, 'fr', 'frontend', 'Links', 'Useful Links', '2017-03-08 21:51:27', '2017-03-19 12:18:46'),
(331, 1, 'fr', 'pagination', 'previous', '&laquo; Previous', '2017-03-08 21:51:27', '2017-03-08 21:51:27'),
(332, 1, 'fr', 'pagination', 'next', 'Next &raquo;', '2017-03-08 21:51:27', '2017-03-08 21:51:27'),
(333, 1, 'fr', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(334, 1, 'fr', 'passwords', 'reset', 'Your password has been reset!', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(335, 1, 'fr', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(336, 1, 'fr', 'passwords', 'token', 'This password reset token is invalid.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(337, 1, 'fr', 'passwords', 'user', 'We can''t find a user with that e-mail address.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(338, 1, 'fr', 'validation', 'accepted', 'The :attribute must be accepted.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(339, 1, 'fr', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(340, 1, 'fr', 'validation', 'after', 'The :attribute must be a date after :date.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(341, 1, 'fr', 'validation', 'alpha', 'The :attribute may only contain letters.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(342, 1, 'fr', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, and dashes.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(343, 1, 'fr', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(344, 1, 'fr', 'validation', 'array', 'The :attribute must be an array.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(345, 1, 'fr', 'validation', 'before', 'The :attribute must be a date before :date.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(346, 1, 'fr', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2017-03-08 21:51:28', '2017-03-08 21:51:28'),
(347, 1, 'fr', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(348, 1, 'fr', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(349, 1, 'fr', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(350, 1, 'fr', 'validation', 'boolean', 'The :attribute field must be true or false.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(351, 1, 'fr', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(352, 1, 'fr', 'validation', 'date', 'The :attribute is not a valid date.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(353, 1, 'fr', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(354, 1, 'fr', 'validation', 'different', 'The :attribute and :other must be different.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(355, 1, 'fr', 'validation', 'digits', 'The :attribute must be :digits digits.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(356, 1, 'fr', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(357, 1, 'fr', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2017-03-08 21:51:29', '2017-03-08 21:51:29'),
(358, 1, 'fr', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(359, 1, 'fr', 'validation', 'email', 'The :attribute must be a valid email address.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(360, 1, 'fr', 'validation', 'exists', 'The selected :attribute is invalid.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(361, 1, 'fr', 'validation', 'file', 'The :attribute must be a file.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(362, 1, 'fr', 'validation', 'filled', 'The :attribute field is required.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(363, 1, 'fr', 'validation', 'image', 'The :attribute must be an image.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(364, 1, 'fr', 'validation', 'in', 'The selected :attribute is invalid.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(365, 1, 'fr', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(366, 1, 'fr', 'validation', 'integer', 'The :attribute must be an integer.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(367, 1, 'fr', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(368, 1, 'fr', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(369, 1, 'fr', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(370, 1, 'fr', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(371, 1, 'fr', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(372, 1, 'fr', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(373, 1, 'fr', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(374, 1, 'fr', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(375, 1, 'fr', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2017-03-08 21:51:30', '2017-03-08 21:51:30'),
(376, 1, 'fr', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(377, 1, 'fr', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(378, 1, 'fr', 'validation', 'not_in', 'The selected :attribute is invalid.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(379, 1, 'fr', 'validation', 'numeric', 'The :attribute must be a number.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(380, 1, 'fr', 'validation', 'present', 'The :attribute field must be present.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(381, 1, 'fr', 'validation', 'regex', 'The :attribute format is invalid.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(382, 1, 'fr', 'validation', 'required', 'The :attribute field is required.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(383, 1, 'fr', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(384, 1, 'fr', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(385, 1, 'fr', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(386, 1, 'fr', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2017-03-08 21:51:31', '2017-03-08 21:51:31'),
(387, 1, 'fr', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(388, 1, 'fr', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(389, 1, 'fr', 'validation', 'same', 'The :attribute and :other must match.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(390, 1, 'fr', 'validation', 'size.numeric', 'The :attribute must be :size.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(391, 1, 'fr', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(392, 1, 'fr', 'validation', 'size.string', 'The :attribute must be :size characters.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(393, 1, 'fr', 'validation', 'size.array', 'The :attribute must contain :size items.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(394, 1, 'fr', 'validation', 'string', 'The :attribute must be a string.', '2017-03-08 21:51:32', '2017-03-08 21:51:32'),
(395, 1, 'fr', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2017-03-08 21:51:33', '2017-03-08 21:51:33'),
(396, 1, 'fr', 'validation', 'unique', 'The :attribute has already been taken.', '2017-03-08 21:51:33', '2017-03-08 21:51:33'),
(397, 1, 'fr', 'validation', 'url', 'The :attribute format is invalid.', '2017-03-08 21:51:33', '2017-03-08 21:51:33'),
(398, 1, 'fr', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2017-03-08 21:51:33', '2017-03-08 21:51:33'),
(399, 0, 'en', 'frontend', 'Test', 'new', '2017-03-08 22:53:17', '2017-03-19 12:18:46'),
(400, 0, 'en', 'frontend', 'Services', 'Services', '2017-03-19 12:17:01', '2017-03-19 12:18:46'),
(401, 0, 'en', 'frontend', 'Blog', 'Blog', '2017-03-19 12:17:02', '2017-03-19 12:18:46'),
(402, 0, 'en', 'frontend', 'Faq', 'FAQ', '2017-03-19 12:17:02', '2017-03-19 12:18:46'),
(403, 0, 'en', 'frontend', 'Submit_Property', 'Submit Property', '2017-03-19 12:17:02', '2017-03-19 12:18:46'),
(404, 0, 'es', 'frontend', 'Faq', 'FAQ', '2017-03-19 12:17:23', '2017-03-19 12:18:46'),
(405, 0, 'fr', 'frontend', 'Faq', 'FAQ', '2017-03-19 12:17:27', '2017-03-19 12:18:46'),
(406, 0, 'es', 'frontend', 'Services', 'Services', '2017-03-19 12:17:42', '2017-03-19 12:18:46'),
(407, 0, 'fr', 'frontend', 'Services', 'Services', '2017-03-19 12:17:46', '2017-03-19 12:18:46'),
(408, 0, 'es', 'frontend', 'Submit_Property', 'Submit Property', '2017-03-19 12:18:05', '2017-03-19 12:18:46'),
(409, 0, 'fr', 'frontend', 'Submit_Property', 'Submit Property', '2017-03-19 12:18:09', '2017-03-19 12:18:46'),
(410, 0, 'es', 'frontend', 'Blog', 'Blog', '2017-03-19 12:18:26', '2017-03-19 12:18:46'),
(411, 0, 'fr', 'frontend', 'Blog', 'Blog', '2017-03-19 12:18:31', '2017-03-19 12:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `order_by` int(11) NOT NULL,
  `translate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `parent_id`, `link`, `title`, `active`, `order_by`, `translate`) VALUES
(1, 0, 'home', 'Home', 1, 1, 'Home'),
(2, 0, 'map-home', 'Map Home', 1, 2, 'MapHome'),
(3, 0, 'about-us', 'About Us', 1, 3, 'About'),
(4, 3, 'gallery', 'Gallery', 1, 1, 'Gallery'),
(5, 0, 'contact-us', 'Contact', 1, 6, 'Contact'),
(6, 3, 'services', 'Services', 1, 3, 'Services'),
(7, 3, 'listing?type=RENT', 'Rent', 1, 5, 'Rent'),
(8, 3, 'listing?type=SALE', 'Sale', 1, 4, 'Sale'),
(9, 3, 'faq', 'FAQ', 1, 2, 'Faq'),
(10, 0, 'blog', 'Blog', 1, 4, 'Blog'),
(12, 0, 'all-agent', 'Agents', 1, 5, 'Agents'),
(13, 0, 'admin', 'Submit Property', 1, 7, 'Submit_Property'),
(14, 3, 'loan-calculator', 'Calculator', 1, 6, 'Calculator');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'arfan67@gmail.com'),
(2, 'arfan67@gmail.com'),
(3, 'aa@aa.com'),
(4, 'test@test.com');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `image`, `body`, `parent_id`, `is_delete`) VALUES
(2, 'Services', 'services', '574724_page.jpg', '                        \r\nPellentesque pellentesque eget tempor tellus. Fusce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus. Fusce lacinia tempor malesuada.\r\n\r\n                            <h2>H2 Heading</h2>\r\n                            <p>Pellentesque pellentesque usce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus.  tellus eget tempor. Fusce lacinia tempor malesuada.</p>\r\n\r\n                            <h3>H3 Heading</h3>\r\n                            <p>Pellentesque tempor tellus eget pellentesque. usce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus.  Fusce lacinia tempor malesuada.</p>\r\n\r\n                            <h4>H4 Heading</h4>\r\n                            <p>Pellentesque pellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus. </p>\r\n\r\n                            <h5>H5 Heading</h5>\r\n                            <p>Pellentesque pellentesque tempor llentesque pellentesque tempor tellus eget libero llentesque pellentesque tempor tellus eget libero tellus ementellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor tellus ellenellentesque tempor tellus eget fermentum. usce lacllentesque eget tempor tellus ellenum.</p>\r\n\r\n                            <h6>H6 Heading</h6>\r\n                            <p>Pellentesque pellentesque tempor tellus eget libero</p>\r\n', 0, 0),
(3, 'About Us', 'about-us', '48321_page.jpg', '<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. </p>\r\n\r\n<h2> Heading 1</h2>\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. </p>\r\n<h2> Heading 2</h2>\r\n\r\n<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat. </p>', 0, 0),
(4, 'FAQ', 'faq', '', 'Pellentesque pellentesque eget tempor tellus. Fusce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus. Fusce lacinia tempor malesuada.\r\n<div class="row">\r\n                            <div class="col-md-12">\r\n                             \r\n                                <div class="accordion-trigger">Questions 1</div>     \r\n                                <div class="accordion-container">       \r\n                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\r\n                                </div>\r\n\r\n                                <div class="accordion-trigger"> Questions 2</div>     \r\n                                <div class="accordion-container">       \r\n                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\r\n                                </div>\r\n\r\n                                <div class="accordion-trigger">Questions 3</div>     \r\n                                <div class="accordion-container">       \r\n                                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>\r\n                                </div>\r\n                            </div>\r\n\r\n                        </div>\r\n', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arfan67@gmail.com', 'b720a04cdcc905192d4d9ce8b6966f363f6af87c5340c90faa1f8d97c127179b', '2016-09-16 22:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `type` enum('SALE','RENT') NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` mediumtext,
  `image_name` varchar(255) DEFAULT NULL,
  `image_ext` varchar(10) NOT NULL,
  `meta_keywords` varchar(500) DEFAULT NULL,
  `meta_desc` mediumtext,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip` varchar(10) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `price` int(10) NOT NULL,
  `beds` int(2) DEFAULT NULL,
  `bath` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `features` varchar(255) NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `size` int(11) NOT NULL,
  `related` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `category_id`, `agent_id`, `type`, `title`, `slug`, `body`, `image_name`, `image_ext`, `meta_keywords`, `meta_desc`, `status`, `created_at`, `updated_at`, `address`, `city`, `state`, `zip`, `country`, `latitude`, `longitude`, `price`, `beds`, `bath`, `year`, `features`, `is_delete`, `featured`, `size`, `related`) VALUES
(1, 1, 1, 'SALE', '42-15 Crescent Street #8C', '', 'Introducing Luna LIC - Your Boutique Luxury RetreatAt Luna LIC, the chic, new Long Island City boutique rental development, enjoy open floor plans and sprawling city views. With just 124 residences, Luna LIC provides every guest with an intimate oasis tucked away in a concierge building. Luna LICs dynamic selection of studio, one, and two-bedroom apartments, and stunning rooftop duplex penthouses', '7837651.jpg', '', NULL, NULL, 1, '2017-01-02 00:00:00', '2017-03-14 18:30:41', '69-28 53rd Ave, Flushing, NY 11378, USA', 'Queens', 'New York', '11378', NULL, '40.73088356343787', '-73.89463798508291', 2000, 3, 4, 2001, '2,3,4', 0, 1, 0, '1');
--
-- Table structure for table `property_payments`
--

CREATE TABLE `property_payments` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `amount` double(10,2) NOT NULL,
  `stripe_transaction_id` varchar(155) NOT NULL,
  `paypal_trasection_id` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property_payments`
--

INSERT INTO `property_payments` (`id`, `agent_id`, `property_id`, `amount`, `stripe_transaction_id`, `paypal_trasection_id`, `datetime`) VALUES
(1, 2, 2, 1000.00, 'ch_18wmOhC2h8SL2wAwYsAPllY7', '', '2016-10-05 04:20:29'),
(2, 2, 2, 10.00, '', 'cometnice2-buyer@gmail.com', '2016-10-05 04:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `phone_no` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `address` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `state` varchar(100) CHARACTER SET latin1 NOT NULL,
  `zip` varchar(10) CHARACTER SET latin1 NOT NULL,
  `latitude` varchar(30) CHARACTER SET latin1 NOT NULL,
  `longitude` varchar(30) CHARACTER SET latin1 NOT NULL,
  `currency` varchar(20) CHARACTER SET latin1 NOT NULL,
  `country` varchar(55) CHARACTER SET latin1 DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `google` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `skype` varchar(55) DEFAULT NULL,
  `captcha` tinyint(1) NOT NULL DEFAULT '0',
  `captcha_secret` varchar(150) DEFAULT NULL,
  `captcha_public` varchar(150) DEFAULT NULL,
  `attempts` tinyint(1) NOT NULL,
  `featured_price` double(10,2) NOT NULL,
  `stripe_mode` enum('test','live') NOT NULL,
  `stripe_secret` varchar(150) DEFAULT NULL,
  `stripe_publish` varchar(150) DEFAULT NULL,
  `paypal_mode` enum('test','live') NOT NULL,
  `paypal_email` varchar(255) DEFAULT NULL,
  `registration` tinyint(1) NOT NULL DEFAULT '0',
  `theme_color` varchar(30) NOT NULL DEFAULT 'red',
  `theme_layout` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `email`, `phone_no`, `skype`, `address`, `city`, `state`, `zip`, `latitude`, `longitude`, `currency`, `country`, `facebook`, `twitter`, `google`, `linkedin`, `youtube`, `logo`, `captcha`, `captcha_secret`, `captcha_public`, `attempts`, `featured_price`, `stripe_mode`, `stripe_secret`, `stripe_publish`, `paypal_mode`, `paypal_email`, `registration`, `theme_color`, `theme_layout`) VALUES
(1, 'Easy Estate', 'arfan67@gmail.com', '03005095213', 'cent040','6160 Crescent Ave, St. Louis, MO 63139, USA', 'Queens', 'New York', '11419', '38.628433409412885', '-90.28966213408205', '$', 'Pakistan', 'https://www.facebook.com/cent040', 'https://www.twitter.com/cent040', 'cent040', 'us', 'fdsfsd', 'logo.png', 1, '6LfeqCkTAAAAAFi3XAAeos3qsXi4BSgTipj4cgtl', '6LfeqCkTAAAAAGMoJQLdmkjNBtCJcBQVi7SjFpRj', 0, 10.00, 'test', '', '', 'test', 'webguy040-buyer@gmail.com', 0, 'sea', 'layout-semiboxed');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(2, '42-15 Crescent Street ', 1, '210114.jpg', '2017-01-24 09:58:22', '0000-00-00 00:00:00'),
(3, '355 a Clinton Street ', 1, '405242.jpg', '2017-01-24 09:58:37', '0000-00-00 00:00:00'),
(4, 'FLOORPLANS 15 Willow Street', 1, '613443.jpg', '2017-01-24 09:58:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supporting_images`
--

CREATE TABLE `supporting_images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `g_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `message`) VALUES
(1, 'Mike Town', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s'),
(3, 'John Doe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s'),
(4, 'Arfan Ali', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(155) NOT NULL,
  `facebook_id` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `AccessLevel` tinyint(1) NOT NULL DEFAULT '1',
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `google2fa_secret` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `facebook_id`, `password`, `phone`, `remember_token`, `updated_at`, `created_at`, `AccessLevel`, `facebook`, `twitter`, `google2fa_secret`, `status`, `is_delete`) VALUES
(1, 'Arfan edit', 'admin@admin.com', '', '$2y$10$jfUe8p9vdZ8UfVI1Rjf3ouvf/5LM9v2dz1usy/tAhwdHQR/jndVQq', '033005095213', 'zGAKritJJMNedYvNMBnJXopEXLnmeOAwbQZbXMUwWAwoAbGIIQO7TNzoOmVo', '2017-03-20 09:50:47', '2016-08-12 20:44:53', 0, 'http://facebook.com/cent040', 'http://twitter.com/cent040', '', 0, 0),
(2, 'Reo Mery ', 'agent@agent.com', '', '$2y$10$jfUe8p9vdZ8UfVI1Rjf3ouvf/5LM9v2dz1usy/tAhwdHQR/jndVQq', '03005095213', 'NmYwSJ2HUEdMGth6reu9OcmygQ4A8g4O6mk6lcqCvZb6fcLb77QuoMCCqVaX', '2017-03-16 11:50:25', '2016-08-13 01:56:50', 2, 'fabook.com', '', '', 0, 1);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_request`
--
ALTER TABLE `customers_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_payments`
--
ALTER TABLE `property_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supporting_images`
--
ALTER TABLE `supporting_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customers_request`
--
ALTER TABLE `customers_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `property_payments`
--
ALTER TABLE `property_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supporting_images`
--
ALTER TABLE `supporting_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
