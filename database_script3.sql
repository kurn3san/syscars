--
-- Database: `loginsystem`
--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `idCars` int(11) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `colour` varchar(10) NOT NULL,
  `kacTane` int(3) NOT NULL,
  `description` varchar(40) DEFAULT NULL,
  `carImg1` varchar(500) DEFAULT 'default.png',
  `carImg2` varchar(500) DEFAULT 'default.png',
  `carImg3` varchar(500) DEFAULT 'default.png',
  `carImg4` varchar(500) DEFAULT 'default.png'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`idCars`);

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `idCars` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Database: `loginsystem`
--
-- Table structure for table `users`
-- bunlari degistirmem gerekiyorrrr

CREATE TABLE `users` (
  `idCars` int(11) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `colour` varchar(10) NOT NULL,
  `kacTane` int(3) NOT NULL,
  `description` varchar(40) DEFAULT NULL,
  `carImg1` varchar(500) DEFAULT 'default.png',
  `carImg2` varchar(500) DEFAULT 'default.png',
  `carImg3` varchar(500) DEFAULT 'default.png',
  `carImg4` varchar(500) DEFAULT 'default.png'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idCars`);

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `users`
  MODIFY `idCars` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
