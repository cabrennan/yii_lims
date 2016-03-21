-- MySQL dump 10.13  Distrib 5.6.22, for Linux (x86_64)
--
-- Host: localhost    Database: sample_db
-- ------------------------------------------------------
-- Server version	5.6.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `app_type`
--

DROP TABLE IF EXISTS `app_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_type` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ba_main`
--

DROP TABLE IF EXISTS `ba_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_main` (
  `ba_id` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `ver_created` varchar(255) DEFAULT NULL,
  `ver_modified` varchar(255) DEFAULT NULL,
  `assay_name` varchar(255) DEFAULT NULL,
  `assay_title` varchar(255) DEFAULT NULL,
  `assay_version` varchar(24) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `run_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ba_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ba_sample`
--

DROP TABLE IF EXISTS `ba_sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_sample` (
  `ba_id` varchar(255) NOT NULL,
  `sample_id` varchar(255) DEFAULT NULL,
  `peak_size` int(11) DEFAULT NULL,
  `peak_conc` float DEFAULT NULL,
  `molarity` float DEFAULT NULL,
  `observations` varchar(255) DEFAULT NULL,
  `area` float DEFAULT NULL,
  `am_time` float DEFAULT NULL,
  `peak_height` float DEFAULT NULL,
  `peak_width` float DEFAULT NULL,
  `percentage_total` float DEFAULT NULL,
  `time_corrected` float DEFAULT NULL,
  `entry_mode` float DEFAULT NULL,
  `peak_status` float DEFAULT NULL,
  `ba_sample_peak_id` varchar(255) NOT NULL,
  PRIMARY KEY (`ba_sample_peak_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ba_sample_qc`
--

DROP TABLE IF EXISTS `ba_sample_qc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ba_sample_qc` (
  `ba_sample_peak_id` varchar(255) NOT NULL,
  `qc_status` varchar(255) DEFAULT NULL,
  `comments` text,
  `owner` varchar(255) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `pos_count` varchar(255) NOT NULL DEFAULT '',
  `qc_status_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cluster_main`
--

DROP TABLE IF EXISTS `cluster_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cluster_main` (
  `cluster_id` varchar(255) NOT NULL,
  `entry_date` datetime NOT NULL,
  `owner` varchar(24) NOT NULL,
  `comments` text,
  `cluster_name` varchar(255) DEFAULT NULL,
  `machine_id` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`cluster_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cluster_sample_map`
--

DROP TABLE IF EXISTS `cluster_sample_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cluster_sample_map` (
  `solexa_sample_id` varchar(64) NOT NULL,
  `cluster_id` varchar(255) DEFAULT NULL,
  `lane_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `buffer` float DEFAULT NULL,
  `nmdna` float DEFAULT NULL,
  `avail_status` varchar(255) DEFAULT NULL,
  `ba_sample_peak_id` varchar(255) DEFAULT NULL,
  `consumables` varchar(255) DEFAULT NULL,
  `lot_number` varchar(255) DEFAULT NULL,
  `item_number` varchar(255) DEFAULT NULL,
  `junk` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5231 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `exp_design`
--

DROP TABLE IF EXISTS `exp_design`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exp_design` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lookup`
--

DROP TABLE IF EXISTS `lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lookup` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sample_status`
--

DROP TABLE IF EXISTS `sample_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sample_status` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sample_type`
--

DROP TABLE IF EXISTS `sample_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sample_type` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `solexa_sample`
--

DROP TABLE IF EXISTS `solexa_sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solexa_sample` (
  `solexa_sample_id` varchar(255) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `sample_source_type` varchar(255) DEFAULT NULL,
  `sample_source_id` varchar(255) DEFAULT NULL,
  `sample_type` int(11) DEFAULT NULL,
  `sample_desc` text,
  `app_type` int(11) DEFAULT NULL,
  `sub_date` datetime DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `nd_conc` float DEFAULT NULL,
  `comments` text,
  `sample_name` varchar(255) DEFAULT NULL,
  `exp_design` int(11) DEFAULT NULL,
  `tissue_type` int(11) DEFAULT NULL,
  `tech_type` int(11) DEFAULT NULL,
  `sample_status` int(11) DEFAULT NULL,
  `rin_number` float DEFAULT NULL,
  `dummy` float DEFAULT NULL,
  `ported` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `new_src_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`solexa_sample_id`),
  KEY `app_type` (`app_type`),
  KEY `exp_design` (`exp_design`),
  KEY `tissue_type` (`tissue_type`),
  KEY `tech_type` (`tech_type`),
  KEY `sample_status` (`sample_status`),
  KEY `new_src_type` (`new_src_type`),
  KEY `sample_type` (`sample_type`),
  CONSTRAINT `solexa_sample_ibfk_1` FOREIGN KEY (`app_type`) REFERENCES `app_type` (`lookup_id`),
  CONSTRAINT `solexa_sample_ibfk_2` FOREIGN KEY (`exp_design`) REFERENCES `exp_design` (`lookup_id`),
  CONSTRAINT `solexa_sample_ibfk_3` FOREIGN KEY (`tissue_type`) REFERENCES `tissue_type` (`lookup_id`),
  CONSTRAINT `solexa_sample_ibfk_4` FOREIGN KEY (`tech_type`) REFERENCES `tech_type` (`lookup_id`),
  CONSTRAINT `solexa_sample_ibfk_5` FOREIGN KEY (`sample_status`) REFERENCES `sample_status` (`lookup_id`),
  CONSTRAINT `solexa_sample_ibfk_6` FOREIGN KEY (`new_src_type`) REFERENCES `source_type` (`lookup_id`),
  CONSTRAINT `solexa_sample_ibfk_7` FOREIGN KEY (`sample_type`) REFERENCES `sample_type` (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `source_id_lookup`
--

DROP TABLE IF EXISTS `source_id_lookup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source_id_lookup` (
  `disease` varchar(255) NOT NULL,
  `sample_source` varchar(255) NOT NULL,
  `species` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `atcc` varchar(255) NOT NULL,
  `sample_type` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=877 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `source_type`
--

DROP TABLE IF EXISTS `source_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source_type` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tech_type`
--

DROP TABLE IF EXISTS `tech_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tech_type` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tissue_samples`
--

DROP TABLE IF EXISTS `tissue_samples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tissue_samples` (
  `mctp_id` varchar(255) NOT NULL,
  `path_case_id` varchar(255) DEFAULT NULL,
  `publish_id` varchar(255) DEFAULT NULL,
  `tissue_form` varchar(255) DEFAULT NULL,
  `sub_date` datetime DEFAULT NULL,
  `tisue_type` varchar(255) DEFAULT NULL,
  `volume` varchar(255) DEFAULT NULL,
  `project` varchar(255) DEFAULT NULL,
  `owner` varchar(128) DEFAULT NULL,
  `comments` text,
  `sample_status` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `alignment_id` varchar(255) DEFAULT NULL,
  `ge_barcode` varchar(255) DEFAULT NULL,
  `cgh_barcode` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mctp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tissue_type`
--

DROP TABLE IF EXISTS `tissue_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tissue_type` (
  `lookup_type` varchar(255) DEFAULT NULL,
  `lookup_value` varchar(255) DEFAULT NULL,
  `lookup_id` int(11) NOT NULL,
  `library_type_id` int(11) NOT NULL,
  PRIMARY KEY (`lookup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'sample_db'
--

--
-- Dumping routines for database 'sample_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-06 15:47:55
