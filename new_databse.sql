/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.30-MariaDB : Database - db_wp_ci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_wp_ci` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_wp_ci`;

/*Table structure for table `tb_admin` */

DROP TABLE IF EXISTS `tb_admin`;

CREATE TABLE `tb_admin` (
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_admin` */

insert  into `tb_admin`(`username`,`password`) values 
('admin','admin');

/*Table structure for table `tb_alternatif` */

DROP TABLE IF EXISTS `tb_alternatif`;

CREATE TABLE `tb_alternatif` (
  `kode_alternatif` varchar(35) NOT NULL,
  `nama_alternatif` varchar(55) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`kode_alternatif`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_alternatif` */

insert  into `tb_alternatif`(`kode_alternatif`,`nama_alternatif`,`keterangan`) values 
('A01','Alternatif 1',''),
('A02','Alternatif 2',NULL),
('A03','Alternatif 3',NULL),
('A04','Alternatif 4',NULL),
('A05','Alternatif 5',NULL),
('A12','sknsdkfn',NULL);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `kode_kriteria` varchar(35) NOT NULL,
  `nama_kriteria` varchar(55) DEFAULT NULL,
  `atribut` varchar(55) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`kode_kriteria`,`nama_kriteria`,`atribut`,`bobot`) values 
('C01','Kriteria 1','Cost',5),
('C02','Kriteria 2','Benefit',4),
('C03','Kriteria 3','Benefit',3),
('C04','Kriteria 4','Benefit',2),
('C05','Kriteria 5','Benefit',1);

/*Table structure for table `tb_rel_alternatif` */

DROP TABLE IF EXISTS `tb_rel_alternatif`;

CREATE TABLE `tb_rel_alternatif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alternatif` varchar(35) DEFAULT NULL,
  `kode_kriteria` varchar(35) DEFAULT NULL,
  `nilai` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `tb_rel_alternatif` */

insert  into `tb_rel_alternatif`(`id`,`kode_alternatif`,`kode_kriteria`,`nilai`) values 
(1,'A01','C01',5),
(2,'A01','C02',5),
(3,'A01','C03',5),
(4,'A01','C04',5),
(5,'A01','C05',5),
(8,'A02','C01',4),
(9,'A02','C02',1),
(10,'A02','C03',1),
(11,'A02','C04',3),
(12,'A02','C05',1),
(15,'A03','C01',2),
(16,'A03','C02',1),
(17,'A03','C03',1),
(18,'A03','C04',1),
(19,'A03','C05',1),
(22,'A04','C01',4),
(23,'A04','C02',1),
(24,'A04','C03',1),
(25,'A04','C04',5),
(26,'A04','C05',1),
(29,'A05','C01',2),
(30,'A05','C02',1),
(31,'A05','C03',1),
(32,'A05','C04',2),
(33,'A05','C05',1);

/*Table structure for table `tb_tpa` */

DROP TABLE IF EXISTS `tb_tpa`;

CREATE TABLE `tb_tpa` (
  `id_tpa` varchar(45) NOT NULL,
  `nama_tpa` varchar(45) DEFAULT NULL,
  `alamat` text,
  `keterangan` text,
  PRIMARY KEY (`id_tpa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_tpa` */

insert  into `tb_tpa`(`id_tpa`,`nama_tpa`,`alamat`,`keterangan`) values 
('A12','sknsdkfn','skdnfkn','skdf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
