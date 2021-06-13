-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 09:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jutarnji`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Ana', 'Anic', 'AnaA', '$2y$10$Ig03ncDbdIDv6lx5NQ6bOuooaP8b3pk76xCXD0PRNCmEuacuf3YmS', 0),
(2, 'admin', 'admin', 'admin', '$2y$10$ZR.bzXOED3XV5kAgeN.8BeheULitvoSiiT3P2PoeLmv5nKGk5yx5i', 1),
(3, 'Nikola', 'Ivic', 'NIvic', '$2y$10$xeMkvvGNF0rLpKj38PRO6OxdomFM2u8LOJnIdBmQ1Fn6Xi2TFAAP6', 0),
(4, 'Iva', 'Ilic', 'iIlic', '$2y$10$N1fnLfmVUZgsuQxwC8Eq3uD0pfbswV9C5CjSw0MriV9JQ3wPt8Pu2', 0),
(5, 'Niko', 'Anavic', 'NAnavic', '$2y$10$VKJ6VW5/otxknjP7HvGq3.XtDKux4Yns/UAaKSOu20ZZYAcqKETAO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '01.06.2021.', 'Bill Maher Tears Into Restrictive New Anti-Abortion Laws', 'Bill Maher Tears Into Restrictive New Anti-Abortion Laws. See more below.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida dolor nec ante\r\n                ullamcorper blandit. Praesent congue pretium lorem, vitae gravida augue condimentum in. Proin facilisis\r\n                ultrices mauris at tristique. Nulla a viverra justo, vel aliquet arcu. Proin tristique ex augue, eget\r\n                accumsan magna malesuada non. Duis ac ornare purus. Donec interdum libero enim, quis tristique justo\r\n                vehicula eget. Duis at quam non justo vehicula interdum ut a mauris. Nullam ut tellus blandit, congue\r\n                diam sit amet, ornare enim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur\r\n                ridiculus mus. Sed consectetur, nisi vitae commodo placerat, felis enim consequat lorem, interdum\r\n                tincidunt orci nisl id purus. Mauris imperdiet massa at fermentum fringilla. Praesent fringilla, lectus\r\n                at porttitor mollis, enim est euismod erat, nec accumsan leo urna eget erat.', 'bill_maher.jpg', 'u.s.', 0),
(2, '01.06.2021.', 'Bill Maher', 'Kratki sad.', 'Praesent ultricies purus sit amet feugiat auctor. Sed iaculis turpis nec neque eleifend sollicitudin. Quisque sagittis ultrices nunc, a tempor tellus tempus et. Curabitur tristique viverra purus, feugiat laoreet quam sollicitudin quis. Fusce efficitur mollis ante, id fringilla sapien hendrerit sit amet. Vestibulum quam lorem, tempus rhoncus dignissim sit amet, cursus sed nisl. Praesent convallis tincidunt dui eu congue. Aliquam dictum aliquet lectus, quis cursus erat. Nullam in fringilla ante, a vestibulum est. Duis ac augue mollis, tincidunt neque non, ultrices nisi. Donec ac laoreet elit. Proin mattis pharetra dolor et rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a sem non urna semper sollicitudin eu feugiat odio. Morbi finibus tortor non purus sodales sodales. Vivamus id sapien placerat, maximus enim eget, ultricies nisl.', 'bill_maher.jpg', 'u.s.', 0),
(3, '01.06.2021.', 'John McAfee Is Running for President', 'John McAfee Is Running for President. See more below.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam gravida dolor nec ante\r\n                ullamcorper blandit. Praesent congue pretium lorem, vitae gravida augue condimentum in. Proin facilisis\r\n                ultrices mauris at tristique. Nulla a viverra justo, vel aliquet arcu. Proin tristique ex augue, eget\r\n                accumsan magna malesuada non. Duis ac ornare purus. Donec interdum libero enim, quis tristique justo\r\n                vehicula eget. Duis at quam non justo vehicula interdum ut a mauris. Nullam ut tellus blandit, congue\r\n                diam sit amet, ornare enim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur\r\n                ridiculus mus. Sed consectetur, nisi vitae commodo placerat, felis enim consequat lorem, interdum\r\n                tincidunt orci nisl id purus. Mauris imperdiet massa at fermentum fringilla. Praesent fringilla, lectus\r\n                at porttitor mollis, enim est euismod erat, nec accumsan leo urna eget erat.', 'john_mcafee.jpg', 'u.s.', 0),
(4, '01.06.2021.', 'Eurovision 2019:Israelis and Palestinians Fight to Be Heard', 'Eurovision 2019:Israelis and Palestinians Fight to Be Heard. See more below.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget cursus ligula. Vestibulum ut ex facilisis, feugiat lectus non, varius ex. Quisque pellentesque est id laoreet consequat. Integer suscipit arcu ac faucibus malesuada. Aliquam pharetra viverra ipsum, at sollicitudin eros bibendum et. Phasellus venenatis neque tempus nisi posuere fermentum. Fusce dapibus ipsum vitae interdum laoreet. Aliquam luctus ex nec purus fringilla maximus.', 'eurovision.jpg', 'world', 0),
(5, '01.06.2021.', 'Mike Lindell Suffers Awkward Moment Onstage as Jets Fail to Appe', 'Mike Lindell Suffers Awkward Moment Onstage as Jets Fail to Appear After Anthem at Frank Rally. See more below', 'Lindell, a conspiracy theorist and an ally of former President Donald Trump, held a MAGA Frank Free Speech rally at the River\'s Edge Apple River concert venue in New Richmond, Wisconsin, on Saturday. The conservative businessman has been a key promoter of Trump\'s baseless claims that the 2020 election was \"stolen\" by President Joe Biden and the Democrats. These groundless allegations have been thoroughly litigated and wholly debunked.\r\n\r\nThe free outdoor event\'s gates opened at 9 a.m. as attendees slowly trickled in. A livestream of the event was broadcast on Lindell\'s new online platform Frank. Just after 11 a.m., the national anthem was played with an expected flyover of jets to come at the end. However, the planes did not immediately materialize and Lindell stood awkwardly onstage for several minutes, looking at the sky as he searched for the aircraft in the sky.\r\n\r\nLindell initially told the crowd that they had a \"surprise\" coming, as he looked upward. After the planes failed to arrive, he remained onstage and said: \"A surprise in the sky here in about a minute?30 seconds.\"', 'clanak.jpg', 'u.s.', 0),
(6, '01.06.2021.', 'Could U.S. Defeat Irans Navy?', 'Could U.S. Defeat Irans Navy? See more below.', 'Nulla consequat rutrum faucibus. In ac quam ut urna luctus bibendum. Praesent consectetur purus vel quam posuere condimentum. Phasellus aliquam diam vitae enim sollicitudin, ut accumsan diam vulputate. Phasellus justo purus, consequat quis cursus ac, pellentesque quis lectus. Praesent hendrerit mollis feugiat.', 'mor.jpg', 'world', 0),
(7, '01.06.2021.', 'Probna', 'Promijenjeni kratki sadržaj sa izmjenom u administraciji.', 'Mijenjamo i sadržaj vijesti', 'clanak.jpg', 'u.s.', 1),
(13, '03.06.2021.', 'Nije ništa pisalo', 'Promjena preko administracije', 'Malo da promijenim sve da vidim da li radi.', 'clanak.jpg', 'world', 0),
(14, '08.06.2021.', 'Bill Maher Tears Into New Laws', 'Bill Maher news.', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.', 'bill_maher.jpg', 'u.s.', 1),
(15, '08.06.2021.', 'John McAfee ', 'aaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'john_mcafee.jpg', 'u.s.', 0),
(16, '12.06.2021.', 'Eurovision 2019:Scandal', 'Eurovision 2019:Israelis and Palestinians Fight to Be Heard. See more below.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi consectetur purus ut mauris venenatis semper. Ut iaculis eget ante vitae suscipit. Phasellus nec feugiat mauris. Vestibulum in nibh ante. Suspendisse varius, ligula vitae rhoncus sodales, lectus nunc placerat diam, non tincidunt mi odio ac neque. Vivamus a faucibus arcu, eget facilisis lectus. Morbi lobortis nisi quis congue ultrices. Maecenas gravida eros vitae tincidunt rutrum. Etiam orci est, pulvinar eget ante quis, pellentesque faucibus tortor. Nam in dolor vitae velit commodo malesuada sed vitae lacus.', 'eurovision.jpg', 'world', 0),
(17, '13.06.2021.', 'Probna', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'clanak.jpg', 'world', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
