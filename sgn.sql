-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2021 at 01:26 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sgn`
--

-- --------------------------------------------------------

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_aluno` varchar(50) NOT NULL,
  `nome_responsavel` varchar(50) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `turma` varchar(20) NOT NULL,
  `sala` varchar(20) NOT NULL,
  `turno` varchar(20) NOT NULL,
  `classe` varchar(10) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `codigo_aluno` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aluno`
--

INSERT INTO `aluno` (`id`, `nome_aluno`, `nome_responsavel`, `sexo`, `turma`, `sala`, `turno`, `classe`, `curso`, `codigo_aluno`, `email`, `descricao`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Jackson Samuel', 'samuel', 'masculino', 'A', 'sala03', 'Manha', '11ª', 'informática', 'c24e8517', 'jacksonsamu42@gmail.com', 'lorem input', 'avatar5.png', '2021-03-07', '2021-03-07 15:12:35'),
(2, 'Bruno Jose', 'Bruna', 'masculino', 'A', 'Sala03', 'Manha', '11ª', 'informática', 'b9e2fb29', 'bruno@gmail.com', 'description', 'api.png', '2021-03-13', '2021-03-13 13:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `boletim`
--

DROP TABLE IF EXISTS `boletim`;
CREATE TABLE IF NOT EXISTS `boletim` (
  `id_boletim` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `disciplina` varchar(20) DEFAULT NULL,
  `data` date NOT NULL,
  `trimestre` varchar(50) DEFAULT NULL,
  `media` float(5,2) DEFAULT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_boletim`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boletim`
--

INSERT INTO `boletim` (`id_boletim`, `nota1`, `nota2`, `nota3`, `disciplina`, `data`, `trimestre`, `media`, `id_aluno`) VALUES
(1, 12, 10, 17, 'ogi', '2021-03-11', 'I-trimestre', 13.00, 1),
(2, 12, 10, 15, 'tlp', '2021-03-17', 'I-trimestre', 12.33, 1),
(3, 15, 10, 5, 'seac', '2021-03-11', 'I-trimestre', 10.00, 1),
(4, 17, 8, 6, 'electronica', '2021-03-10', 'I-trimestre', 10.33, 1),
(5, 12, 7, 8, 'matematica', '2021-03-10', 'I-trimestre', 9.00, 1),
(6, 12, 10, 3, 'quimica', '2021-03-11', 'I-trimestre', 8.33, 1),
(7, 5, 9, 10, 'lingua_portuguesa', '2021-03-05', 'I-trimestre', 8.00, 1),
(8, 13, 18, 16, 'ed_fisica', '2021-03-12', 'I-trimestre', 15.67, 1),
(9, 12, 10, 3, 'ogi', '2021-03-03', 'I-trimestre', 8.33, 2),
(10, 18, 18, 16, 'tlp', '2021-03-16', 'I-trimestre', 17.33, 2),
(11, 12, 10, 18, 'ogi', '2021-03-18', 'II-trimestre', 13.33, 1),
(12, 12, 10, 16, 'tlp', '2021-03-03', 'II-trimestre', 12.67, 1),
(13, 18, 9, 12, 'seac', '2021-03-17', 'II-trimestre', 13.00, 1),
(14, 8, 7, 10, 'electronica', '2021-03-05', 'II-trimestre', 8.33, 1),
(15, 12, 9, 8, 'matematica', '2021-03-16', 'II-trimestre', 9.67, 1),
(16, 12, 10, 8, 'quimica', '2021-03-12', 'II-trimestre', 10.00, 1),
(17, 9, 10, 8, 'lingua_portuguesa', '2021-03-04', 'II-trimestre', 9.00, 1),
(18, 12, 10, 8, 'ed_fisica', '2021-03-05', 'II-trimestre', 10.00, 1),
(19, 10, 8, 10, 'ogi', '2021-03-10', 'III-trimestre', 9.33, 1),
(20, 12, 10, 8, 'tlp', '2021-03-10', 'III-trimestre', 10.00, 1),
(22, 10, 12, 8, 'seac', '2021-03-23', 'III-trimestre', 10.00, 1),
(23, 12, 8, 19, 'electronica', '2021-03-04', 'III-trimestre', 13.00, 1),
(24, 12, 10, 14, 'matematica', '2021-03-11', 'III-trimestre', 12.00, 1),
(25, 19, 12, 10, 'quimica', '2021-03-25', 'III-trimestre', 13.67, 1),
(26, 16, 10, 15, 'lingua_portuguesa', '2021-03-24', 'III-trimestre', 13.67, 1),
(27, 12, 19, 17, 'ed_fisica', '2021-03-18', 'III-trimestre', 16.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `boletim_preserv`
--

DROP TABLE IF EXISTS `boletim_preserv`;
CREATE TABLE IF NOT EXISTS `boletim_preserv` (
  `id_boletim` int(11) NOT NULL AUTO_INCREMENT,
  `nota1` float NOT NULL,
  `nota2` float NOT NULL,
  `nota3` float NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `trimestre` varchar(50) NOT NULL,
  `media` float NOT NULL,
  `id_aluno` int(11) NOT NULL,
  PRIMARY KEY (`id_boletim`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boletim_preserv`
--

INSERT INTO `boletim_preserv` (`id_boletim`, `nota1`, `nota2`, `nota3`, `disciplina`, `data`, `trimestre`, `media`, `id_aluno`) VALUES
(1, 12, 10, 17, 'ogi', '2021-03-11', 'I-trimestre', 13, 1),
(2, 12, 10, 15, 'tlp', '2021-03-17', 'I-trimestre', 12.33, 1),
(3, 15, 10, 5, 'seac', '2021-03-11', 'I-trimestre', 10, 1),
(4, 17, 8, 6, 'electronica', '2021-03-10', 'I-trimestre', 10.33, 1),
(5, 12, 7, 8, 'matematica', '2021-03-10', 'I-trimestre', 9, 1),
(6, 12, 10, 3, 'quimica', '2021-03-11', 'I-trimestre', 8.33, 1),
(7, 5, 9, 10, 'lingua_portuguesa', '2021-03-05', 'I-trimestre', 8, 1),
(8, 13, 18, 16, 'ed_fisica', '2021-03-12', 'I-trimestre', 15.67, 1),
(9, 12, 10, 3, 'ogi', '2021-03-03', 'I-trimestre', 8.33, 2),
(10, 18, 18, 16, 'tlp', '2021-03-16', 'I-trimestre', 17.33, 2),
(11, 12, 10, 18, 'ogi', '2021-03-18', 'II-trimestre', 13.33, 1),
(12, 12, 10, 16, 'tlp', '2021-03-03', 'II-trimestre', 12.67, 1),
(13, 18, 9, 12, 'seac', '2021-03-17', 'II-trimestre', 13, 1),
(14, 8, 7, 10, 'electronica', '2021-03-05', 'II-trimestre', 8.33, 1),
(15, 12, 9, 8, 'matematica', '2021-03-16', 'II-trimestre', 9.67, 1),
(16, 12, 10, 8, 'quimica', '2021-03-12', 'II-trimestre', 10, 1),
(17, 9, 10, 8, 'lingua_portuguesa', '2021-03-04', 'II-trimestre', 9, 1),
(18, 12, 10, 8, 'ed_fisica', '2021-03-05', 'II-trimestre', 10, 1),
(19, 10, 8, 10, 'ogi', '2021-03-10', 'III-trimestre', 9.33, 1),
(20, 12, 10, 8, 'tlp', '2021-03-10', 'III-trimestre', 10, 1),
(21, 18, 11, 10, 'seac', '2021-03-11', 'I-trimestre', 13, 1),
(22, 10, 12, 8, 'seac', '2021-03-23', 'III-trimestre', 10, 1),
(23, 12, 8, 19, 'electronica', '2021-03-04', 'III-trimestre', 13, 1),
(24, 12, 10, 14, 'matematica', '2021-03-11', 'III-trimestre', 12, 1),
(25, 19, 12, 10, 'quimica', '2021-03-25', 'III-trimestre', 13.67, 1),
(26, 16, 10, 15, 'lingua_portuguesa', '2021-03-24', 'III-trimestre', 13.67, 1),
(27, 12, 19, 17, 'ed_fisica', '2021-03-18', 'III-trimestre', 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `classe`, `created_at`, `updated_at`) VALUES
(3, '12ª', '2021-03-04 14:04:20', NULL),
(4, '11ª', '2021-03-07 15:37:54', NULL),
(5, '10ª', '2021-03-07 15:40:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE IF NOT EXISTS `disciplina` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome_disciplina` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome_disciplina`, `created_at`, `updated_at`) VALUES
(2, 'TLP', '2020-11-02 22:40:13', '2020-11-02 22:40:31'),
(3, 'Matematica', '2021-02-14 15:41:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_professor` varchar(100) NOT NULL,
  `turma` varchar(45) NOT NULL,
  `sala` varchar(20) NOT NULL,
  `classe` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `disciplina` varchar(50) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `turno` varchar(100) NOT NULL,
  `formacao` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professores`
--

INSERT INTO `professores` (`id`, `nome_professor`, `turma`, `sala`, `classe`, `foto`, `descricao`, `disciplina`, `curso`, `turno`, `formacao`, `email`, `sexo`, `created_at`, `updated_at`) VALUES
(1, 'Jackson Samuel', 'A', 'Sala03', '12ª', 'avatar5.png', 'Professor de tlp', 'TLP', 'informática', 'Manha', 'Engenharia', 'prof@prof.com', 'masculino', '2021-03-06 19:54:24', '2021-03-06 21:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `salas`
--

DROP TABLE IF EXISTS `salas`;
CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sala` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salas`
--

INSERT INTO `salas` (`id`, `nome_sala`, `created_at`, `updated_at`) VALUES
(1, 'Sala03', '2021-02-16 19:46:05', '2021-02-16 19:48:42'),
(3, 'Sala04', '2021-03-07 15:27:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_disciplina`
--

DROP TABLE IF EXISTS `tipo_disciplina`;
CREATE TABLE IF NOT EXISTS `tipo_disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(23) NOT NULL,
  `classe` varchar(20) NOT NULL,
  `curso` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_disciplina`
--

INSERT INTO `tipo_disciplina` (`id`, `nome`, `classe`, `curso`) VALUES
(1, 'matematica', '10ª', 'informatica'),
(2, 'fisica', '10ª', 'infiormatica'),
(5, 'lingua_portuguesa', '10ª', 'informatica'),
(6, 'inglesh', '10ª', 'infiormatica'),
(9, 'ed_fisica', '10ª', 'informatica'),
(11, 'fai', '10ª', 'informatica'),
(12, 'tlp', '10ª', 'infiormatica'),
(13, 'seac', '10ª', 'informatica'),
(14, 'eletronica', '10ª', 'infiormatica'),
(15, 'empreendedorismo', '10ª', 'informatica'),
(16, 'quimica', '10ª', 'infiormatica'),
(17, 'tic', '10ª', 'informatica'),
(18, 'ogi', '11ª', 'informatica'),
(19, 'empreendedorismo ', '11ª', 'infiormatica'),
(21, 'tlp', '11ª', 'informatica'),
(22, 'seac', '11ª', 'informatica'),
(23, 'electronica', '11ª', 'informatica'),
(24, 'matematica', '11ª', 'informatica'),
(25, 'fisica', '11ª', 'infiormatica'),
(26, 'quimica', '11ª', 'informatica'),
(27, 'fai', '11ª', 'infiormatica'),
(28, 'lingua_portuguesa', '11ª', 'informatica'),
(29, 'ed_fisica', '11ª', 'informatica'),
(30, 'trei', '12ª', 'informatica'),
(31, 'ogi', '12ª', 'informatica'),
(32, 'tlp', '12', 'informatica'),
(33, 'projeto', '12', 'informatica'),
(34, 'matematica', '12', 'informatica'),
(35, 'fisica', '12', 'informatica'),
(36, 'empreendedorismo', '12', 'informatica'),
(37, 'matematica', '12', 'informatica'),
(38, 'tl', '12', 'infiormatica'),
(39, 'seac', '12', 'informatica'),
(40, 'fisica', '12', 'informatica'),
(41, 'empreendedorismo ', '12', 'informatica'),
(42, 'projeto', '12', 'informatica'),
(43, 'matematica', '12', 'informatica'),
(44, 'tl', '12', 'infiormatica'),
(45, 'seac', '12', 'informatica'),
(46, 'fisica', '12', 'informatica'),
(47, 'empreendedorismo ', '12', 'informatica'),
(48, 'projeto', '12', 'informatica'),
(49, 'matematica', '10ª', 'eletronica');

-- --------------------------------------------------------

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome_turma` varchar(10) CHARACTER SET latin1 NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `turma`
--

INSERT INTO `turma` (`id`, `nome_turma`, `created_at`, `updated_at`) VALUES
(3, 'A', '2020-11-02 20:53:29', '2020-11-02 22:00:06'),
(5, 'B', '2020-11-03 23:00:53', '2021-02-16 19:36:04'),
(6, 'C', '2021-02-16 20:24:05', NULL),
(7, 'D', '2021-03-07 15:34:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
CREATE TABLE IF NOT EXISTS `turno` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome_turno` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turno`
--

INSERT INTO `turno` (`id`, `nome_turno`, `created_at`, `updated_at`) VALUES
(7, 'Noite', '2021-03-07 15:30:43', NULL),
(6, 'Manha', '2021-03-04 14:03:57', NULL),
(3, 'Tarde', '2020-10-31 19:32:58', '2021-02-17 10:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status_email` varchar(80) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `status_email`, `email`, `pass`, `foto`, `usertype`) VALUES
(1, 'Admin', NULL, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'avatar4.png', 'Admin'),
(3, 'Jackson Samuel', 'prof@prof.com', 'prof@prof.com', 'd450c5dbcc10db0749277efc32f15f9f', 'avatar5.png', 'DiretorTurma');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
