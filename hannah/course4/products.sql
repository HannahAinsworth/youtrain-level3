-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 08:12 AM
-- Server version: 5.1.73
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers_tbl`
--

CREATE TABLE IF NOT EXISTS `customers_tbl` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(32) NOT NULL,
  `customer_address` varchar(64) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers_tbl`
--

INSERT INTO `customers_tbl` (`customer_id`, `customer_name`, `customer_address`) VALUES
(1, 'Hannah', 'Westhoughton'),
(2, 'Shazaad', 'Ashton'),
(3, 'Will', 'Stirling');

-- --------------------------------------------------------

--
-- Table structure for table `orders_tbl`
--

CREATE TABLE IF NOT EXISTS `orders_tbl` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `orders_tbl`
--

INSERT INTO `orders_tbl` (`order_id`, `customer_id`, `product_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE IF NOT EXISTS `products_tbl` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(64) NOT NULL,
  `product_description` text NOT NULL,
  `product_cost` float NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`product_id`, `product_name`, `product_description`, `product_cost`) VALUES
(1, 'Product A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut malesuada ligula. Suspendisse et condimentum quam, vitae ultrices urna. Aenean porta euismod aliquet. Praesent ante sem, commodo nec lectus id, ultricies imperdiet lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel gravida lacus. In hac habitasse platea dictumst. Aenean porttitor neque at lorem scelerisque vestibulum. Nullam vel sagittis elit.\r\n\r\nDonec auctor blandit justo. Integer molestie rhoncus odio, non euismod arcu molestie vel. Morbi tempor varius iaculis. Donec sed molestie mauris, viverra viverra libero. Morbi eros felis, vehicula vel dolor in, lacinia auctor nunc. Mauris non efficitur justo. Integer malesuada ante et velit imperdiet, nec mattis ligula vulputate. Proin sed luctus mauris. Sed at molestie velit. Maecenas accumsan, arcu eu fringilla tincidunt, tortor lacus condimentum ligula, eget consectetur eros urna et orci. Duis mollis dignissim ligula, id ultricies erat. Pellentesque cursus et dolor vel volutpat. Curabitur sed tellus id metus sodales eleifend. Nunc eu ipsum urna. Morbi a leo non neque volutpat imperdiet aliquam sed est. Praesent arcu neque, consectetur ac euismod sed, laoreet sit amet arcu.', 100),
(2, 'Product B', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut malesuada ligula. Suspendisse et condimentum quam, vitae ultrices urna. Aenean porta euismod aliquet. Praesent ante sem, commodo nec lectus id, ultricies imperdiet lacus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vel gravida lacus. In hac habitasse platea dictumst. Aenean porttitor neque at lorem scelerisque vestibulum. Nullam vel sagittis elit.\r\n\r\nDonec auctor blandit justo. Integer molestie rhoncus odio, non euismod arcu molestie vel. Morbi tempor varius iaculis. Donec sed molestie mauris, viverra viverra libero. Morbi eros felis, vehicula vel dolor in, lacinia auctor nunc. Mauris non efficitur justo. Integer malesuada ante et velit imperdiet, nec mattis ligula vulputate. Proin sed luctus mauris. Sed at molestie velit. Maecenas accumsan, arcu eu fringilla tincidunt, tortor lacus condimentum ligula, eget consectetur eros urna et orci. Duis mollis dignissim ligula, id ultricies erat. Pellentesque cursus et dolor vel volutpat. Curabitur sed tellus id metus sodales eleifend. Nunc eu ipsum urna. Morbi a leo non neque volutpat imperdiet aliquam sed est. Praesent arcu neque, consectetur ac euismod sed, laoreet sit amet arcu.', 200.99);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
