-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 27, 2024 at 02:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `addproperty`
--

CREATE TABLE `addproperty` (
  `pname` varchar(255) NOT NULL,
  `ptype` enum('Rent','Sell','Both') NOT NULL,
  `pprice` int(100) NOT NULL,
  `pimage` varchar(225) NOT NULL,
  `plocation` varchar(100) NOT NULL,
  `pdescription` text NOT NULL,
  `pemail` varchar(225) NOT NULL,
  `pid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addproperty`
--

INSERT INTO `addproperty` (`pname`, `ptype`, `pprice`, `pimage`, `plocation`, `pdescription`, `pemail`, `pid`) VALUES
('PHP Land', 'Rent', 90000, 'Property-Image\\home-2.png', 'Pune', 'Cascading ~s Style Sheets is a style sheet language used for specifying~s the presentation and styling of a document written~s in a markup language such as HTML or XML. CSS is a cornerstone technology of the World Wide Web, alongside HTML~s and JavaScript.', 'ram@gmail.com', 1),
('Java Land ', 'Rent', 89000, 'Property-Image\\home-1.png', 'North America ', 'HyperText Markup Language or HTML is s the standard markup language for documents designed to be displayed in a web browser. It defines the content and structure of web content. It is often assisted s by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', 'ram@gmail.com', 2),
('HTML Land', 'Sell', 80000, 'Property-Image\\land2.jfif', 'Mumbai', 'The cloud computing reference model provides a conceptual framework for understanding the various components and layers involved in delivering cloud services. While different organizations and standards bodies may have slightly different interpretations, a commonly referenced model is', 'deepakchouha0702@gmail.com', 3),
('Flat House', 'Rent', 40000, 'Property-Image/land3.jfif', 'Pune', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia', 'deepakchouhadc0702@gmail.com', 21),
('Coding House', 'Rent', 500000, 'Property-Image/download (1).jfif', 'Indore MP', 'Property is any item that a person or a business has legal title over. Property can be tangible items, such as houses, cars, or appliances, or it can refer to intangible items that carry the promise of future worth, such as stock and bond', 'codingkart2@gmail.com', 35);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `firstname` varchar(50) DEFAULT 'First Name',
  `lastname` varchar(50) NOT NULL DEFAULT 'Last Name',
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`firstname`, `lastname`, `email`, `password`, `phone`, `address`, `image`) VALUES
('Coding ', 'Kart India Pvt. Ltd', 'codingkart2@gmail.com', '$2y$10$VfswslamSMr0LEDGcVZj8eU0bHOvMh8bhVCBqHdb1raNWlveBaXsy', '8963200000', 'Vijay Nagar Indore Madhya Pradesh', 'user-image/download.jfif'),
('Deepak ', 'Chouhan', 'deepak@gmail.com', '$2y$10$M.MK7UbdkjM7cu7h/WcBfeBA.GaYnnVTO9GHYOspwkc3k8RKvQVKu', '7000056000', 'Yashoda Nagar Indore MP', 'user-image/IMG_7774 - Copy.JPG'),
('Deepak ', 'Chouhan', 'deepakchouha0702@gmail.com', '123456', '9752029573', '84/2 Yashoda Nagar near Gouri Nagar behind electronic complex', 'IMG_7770 - Copy.JPG'),
('Kunal', 'Gurjar', 'kunalgurjar@gmail.com', '$2y$10$DzLIOc02C29OnYZ2jArbd..oASTErjw10eeEgFV85YTR4Z/uymRsG', '8965723896', 'Gouri Nagar', 'Uploaded-Image/20220201_224332.jpg'),
('Milton', 'Bottle', 'milton@gmail.com', '$2y$10$77yI/GYwsfCO8zYHuHGHNueqc7BpIsTdGgps9HTTQu4JpELlPXvk2', '9302662894', 'Yashodha Nagar near Gouri Nagar ', 'user-image/FILE137.JPG'),
('Pranky ', 'Choupda', 'prank@gmail.com', '$2y$10$3Mn2GX2e7YkO7jYTJyqKiOUmxG.CMPW1NZZmI9nwww2KO0UogzCYW', '9531569871', 'New York USA', 'user-image/20220201_224332.jpg'),
('Rajkumar Singh', 'Chouhan', 'rajkumar@gmail.com', '$2y$10$VoefbaQpgFJ18nE6WmrKjOvTK8Wp1bm/6qCYLqG22DpiDeeUWWyNi', '9638537965', 'Gouri Nagar Indore', 'user-image/dc logo.webp');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `sclass` int(10) NOT NULL,
  `sphone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `saddress`, `sclass`, `sphone`) VALUES
(1, 'Deepak Chouhan', '84 Yashoda Nagar Indore', 1, '9752083578'),
(2, 'Kunal', '123 Gouri Nagar Indore', 2, '7955648241'),
(3, 'Piyush', 'Veena Nagar', 1, '9869929586'),
(4, 'Bake', '865 Gouri Nagar Indore', 1, '7963648241'),
(5, 'Kiara Advani  ', '87/2 Andheri Mumbai', 3, '9865745988'),
(7, 'Anushka Sharma ', '563 Thane Mumbai India ', 3, '7885566754');

-- --------------------------------------------------------

--
-- Table structure for table `studentclass`
--

CREATE TABLE `studentclass` (
  `cid` int(11) NOT NULL,
  `cname` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentclass`
--

INSERT INTO `studentclass` (`cid`, `cname`) VALUES
(1, 'B.Tech'),
(2, 'BCA'),
(3, 'B.Com'),
(4, 'BBA'),
(5, 'ME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addproperty`
--
ALTER TABLE `addproperty`
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `sphone` (`sphone`);

--
-- Indexes for table `studentclass`
--
ALTER TABLE `studentclass`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addproperty`
--
ALTER TABLE `addproperty`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentclass`
--
ALTER TABLE `studentclass`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
