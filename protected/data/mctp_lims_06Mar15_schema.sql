-- MySQL dump 10.13  Distrib 5.6.22, for Linux (x86_64)
--
-- Host: localhost    Database: mctp_lims
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
-- Table structure for table `AuthAssignment`
--

DROP TABLE IF EXISTS `AuthAssignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthAssignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itemname` (`itemname`),
  KEY `uniquename_fk` (`userid`),
  CONSTRAINT `AuthAssignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `AuthItem` (`name`),
  CONSTRAINT `AuthAssignment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`uniquename`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `AuthItem`
--

DROP TABLE IF EXISTS `AuthItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `AuthItemChild`
--

DROP TABLE IF EXISTS `AuthItemChild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AuthItemChild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `AuthItemChild_ibfk_1` (`parent`),
  KEY `AuthItemChild_ibfk_2` (`child`),
  CONSTRAINT `AuthItemChild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `AuthItem` (`name`),
  CONSTRAINT `AuthItemChild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `AuthItem` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `barcode`
--

DROP TABLE IF EXISTS `barcode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcode` (
  `barcode_id` tinyint(3) unsigned NOT NULL,
  `barcode` varchar(12) NOT NULL,
  PRIMARY KEY (`barcode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cancers`
--

DROP TABLE IF EXISTS `cancers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cancers` (
  `origin_site` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cancer_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cancer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=553 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `capture_kit`
--

DROP TABLE IF EXISTS `capture_kit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capture_kit` (
  `capture_kit_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`capture_kit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `case_study`
--

DROP TABLE IF EXISTS `case_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `case_study` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) NOT NULL,
  `study_id` int(11) NOT NULL,
  `case_study_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `case_id` (`case_id`,`study_id`),
  KEY `study_id` (`study_id`),
  CONSTRAINT `case_study_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`),
  CONSTRAINT `case_study_ibfk_2` FOREIGN KEY (`study_id`) REFERENCES `mctp_study` (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cases` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_add` varchar(8) NOT NULL,
  `user_mod` varchar(8) NOT NULL,
  `case_type` enum('Clinical','Research','Cell Line','Internal Control','Other') NOT NULL DEFAULT 'Other',
  `note` varchar(200) DEFAULT NULL,
  `yob` year(4) DEFAULT NULL COMMENT 'Year of Birth',
  `yod` year(4) DEFAULT NULL COMMENT 'Year of Death',
  `gender` enum('Male','Female','Unknown','Indeterminate','Male once Female','Female once Male','Male been both','Female been both','Hermaphrodite','Non Applicable') NOT NULL DEFAULT 'Unknown' COMMENT 'WHO gender designations',
  `ethnic_id` tinyint(3) unsigned NOT NULL DEFAULT '3',
  `race_id` tinyint(3) unsigned NOT NULL DEFAULT '7',
  `icd3_id` int(11) NOT NULL DEFAULT '10453',
  `cancer_id` int(11) NOT NULL DEFAULT '1',
  `ext_inst_id` tinyint(4) NOT NULL DEFAULT '1',
  `ext_case_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`case_id`),
  UNIQUE KEY `name` (`name`),
  KEY `ethnic_id` (`ethnic_id`),
  KEY `race_id` (`race_id`),
  KEY `icd3_id` (`icd3_id`),
  KEY `name_2` (`name`),
  KEY `cancer_fk_idx` (`cancer_id`),
  KEY `user_add` (`user_add`),
  KEY `user_mod` (`user_mod`),
  CONSTRAINT `cancer_fk_idx` FOREIGN KEY (`cancer_id`) REFERENCES `cancers` (`cancer_id`),
  CONSTRAINT `cases_ibfk_1` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnicity` (`ethnic_id`),
  CONSTRAINT `cases_ibfk_2` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`),
  CONSTRAINT `cases_ibfk_3` FOREIGN KEY (`icd3_id`) REFERENCES `icd_3` (`id`),
  CONSTRAINT `cases_ibfk_4` FOREIGN KEY (`user_add`) REFERENCES `user` (`uniquename`),
  CONSTRAINT `cases_ibfk_5` FOREIGN KEY (`user_mod`) REFERENCES `user` (`uniquename`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cell_line`
--

DROP TABLE IF EXISTS `cell_line`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cell_line` (
  `id` varchar(50) NOT NULL,
  `tissue` varchar(100) DEFAULT NULL,
  `cell_type` varchar(100) DEFAULT NULL,
  `morphology` varchar(100) DEFAULT NULL,
  `disease` varchar(100) DEFAULT NULL,
  `age` tinyint(3) unsigned DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `atcc_cat` varchar(12) DEFAULT NULL,
  `atcc_link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `deriv_isolate`
--

DROP TABLE IF EXISTS `deriv_isolate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deriv_isolate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deriv_id` int(11) NOT NULL,
  `isolate_id` int(11) NOT NULL,
  `user_add` varchar(8) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `isolate_id` (`isolate_id`),
  KEY `deriv_id` (`deriv_id`),
  CONSTRAINT `deriv_isolate_ibfk_1` FOREIGN KEY (`isolate_id`) REFERENCES `isolate` (`isolate_id`),
  CONSTRAINT `deriv_isolate_ibfk_2` FOREIGN KEY (`deriv_id`) REFERENCES `derivative` (`deriv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `derivative`
--

DROP TABLE IF EXISTS `derivative`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `derivative` (
  `deriv_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Pool','Cell Selection','Other-See Notes') NOT NULL DEFAULT 'Other-See Notes',
  `cell_select` enum('CD19+','CD19-','CD33+','CD33-','CD34+','CD34-','CD138+','CD138-','CD3+','CD3-','PMN+','PMN-','Pool','Other-See Notes') NOT NULL DEFAULT 'Pool',
  `cell_count` int(11) DEFAULT NULL,
  `deriv_use` enum('Clinical','Research','Test','Other','Unknown') NOT NULL DEFAULT 'Unknown',
  `note` varchar(200) DEFAULT NULL,
  `user_add` varchar(8) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_mod` varchar(8) NOT NULL,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Isolate Prep','Archive','Exhausted','Other-See Notes') NOT NULL DEFAULT 'Isolate Prep',
  PRIMARY KEY (`deriv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ethnicity`
--

DROP TABLE IF EXISTS `ethnicity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ethnicity` (
  `ethnic_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `omb` enum('T','F') NOT NULL COMMENT '1997 US OMB official designation',
  PRIMARY KEY (`ethnic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ext_inst`
--

DROP TABLE IF EXISTS `ext_inst`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ext_inst` (
  `ext_inst_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`ext_inst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `icd_3`
--

DROP TABLE IF EXISTS `icd_3`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `icd_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_recode` varchar(100) NOT NULL,
  `site_desc` varchar(100) NOT NULL,
  `hist` smallint(5) unsigned NOT NULL,
  `hist_desc` varchar(100) NOT NULL,
  `hist_behv` varchar(6) NOT NULL,
  `hist_behv_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10454 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Sample','Pedigree') NOT NULL DEFAULT 'Sample',
  `sample_id` int(11) DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL,
  `user_add` varchar(8) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`filename`),
  KEY `case_id` (`case_id`),
  KEY `sample_id` (`sample_id`),
  CONSTRAINT `image_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`),
  CONSTRAINT `image_ibfk_2` FOREIGN KEY (`sample_id`) REFERENCES `sample` (`sample_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instrument` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_rem` timestamp NULL DEFAULT NULL,
  `sn` varchar(25) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `note` varchar(200) DEFAULT NULL,
  `asset_tag` varchar(25) DEFAULT NULL,
  `clin_name` varchar(100) DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `isolate`
--

DROP TABLE IF EXISTS `isolate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `isolate` (
  `isolate_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `isolate_type` enum('DNA','RNA','Unknown') NOT NULL DEFAULT 'Unknown',
  `nano_conc` double unsigned DEFAULT NULL COMMENT 'ng/ul',
  `vol` double unsigned DEFAULT NULL COMMENT 'ul',
  `yield` double unsigned DEFAULT NULL COMMENT 'ul',
  `rin` double unsigned DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `user_nano` varchar(8) DEFAULT NULL,
  `date_nano` timestamp NULL DEFAULT NULL,
  `user_bio` varchar(8) DEFAULT NULL,
  `date_bio` timestamp NULL DEFAULT NULL,
  `user_add` varchar(8) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_mod` varchar(8) NOT NULL,
  `qual` enum('PASS','FAIL','FAIL - Yield','FAIL - RIN','QC Pending') NOT NULL DEFAULT 'QC Pending',
  `status` enum('Archived -80','Exhausted','Discarded','Legacy SDB','In Lib Prep','Deleted','Pending Nano','Other - See Notes') NOT NULL DEFAULT 'Pending Nano',
  `amt_consumed` float unsigned DEFAULT NULL COMMENT 'ug taken for lib prep',
  PRIMARY KEY (`isolate_id`),
  KEY `user_add` (`user_add`),
  KEY `user_mod` (`user_mod`),
  KEY `user_nano` (`user_nano`),
  KEY `user_bio` (`user_bio`),
  CONSTRAINT `isolate_ibfk_1` FOREIGN KEY (`user_add`) REFERENCES `user` (`uniquename`),
  CONSTRAINT `isolate_ibfk_2` FOREIGN KEY (`user_mod`) REFERENCES `user` (`uniquename`),
  CONSTRAINT `isolate_ibfk_3` FOREIGN KEY (`user_nano`) REFERENCES `user` (`uniquename`),
  CONSTRAINT `isolate_ibfk_4` FOREIGN KEY (`user_bio`) REFERENCES `user` (`uniquename`)
) ENGINE=InnoDB AUTO_INCREMENT=1856 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mctp_study`
--

DROP TABLE IF EXISTS `mctp_study`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mctp_study` (
  `study_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`study_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `race`
--

DROP TABLE IF EXISTS `race`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `race` (
  `race_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `omb` enum('T','F') NOT NULL COMMENT '1997 US OMB official designation',
  PRIMARY KEY (`race_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sample`
--

DROP TABLE IF EXISTS `sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sample` (
  `sample_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `case_id` int(11) NOT NULL DEFAULT '1',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_rec` timestamp NULL DEFAULT NULL COMMENT 'Date sample first arrives at MCTP',
  `date_out` timestamp NULL DEFAULT NULL COMMENT 'Date sample left mctp',
  `date_in` timestamp NULL DEFAULT NULL COMMENT 'Date sample returned to mctp',
  `ext_inst_id` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'external institution',
  `ext_label` varchar(50) DEFAULT NULL COMMENT 'external institution sample label',
  `user_add` varchar(8) NOT NULL,
  `user_mod` varchar(8) NOT NULL,
  `status` enum('Legacy SDB','Deleted','Archived','Exhausted','Derivative Prep','Other - See Notes') NOT NULL DEFAULT 'Derivative Prep',
  `sample_type` enum('Tumor','Primary Tumor','Metastatic Tumor','Normal','Xenograft','Cell Line Tumor','Cell Line Normal','Other','Unknown') NOT NULL DEFAULT 'Unknown',
  `sample_preserve` enum('FFPE','Frozen','Live Culture','Refrigeration','None','Slide','Unknown') NOT NULL DEFAULT 'Unknown',
  `tissue_mion` int(11) DEFAULT NULL COMMENT 'Tissue info from Dan M mctp',
  `tissue_loc_mion` int(11) DEFAULT NULL COMMENT 'Tissue location info from Dan M mctp',
  `exp_design_sdb` enum('Compound Treatment','Genetic Modification','Disease State','Control','Methylation','Cell Type','NULL') DEFAULT NULL,
  `tissue_sdb` varchar(75) DEFAULT NULL,
  `lib_id_sdb` varchar(100) DEFAULT NULL COMMENT 'Legacy lib id from Sample_db',
  `sample_use` enum('Clinical','Research','Test','Other','Unknown') NOT NULL DEFAULT 'Research',
  `note` varchar(500) DEFAULT NULL,
  `status_sdb` varchar(35) DEFAULT NULL,
  `antibody` varchar(50) DEFAULT NULL,
  `treatment` varchar(50) DEFAULT NULL,
  `knockdown` varchar(50) DEFAULT NULL,
  `gene_mod` varchar(25) DEFAULT NULL COMMENT 'Gene modification being studied - Research CHiP mostly',
  `technology` enum('CRISPR/Custom','CRISPR/Cas9','Stable Expression','shRNA','Other-See Notes') DEFAULT NULL COMMENT 'Research Samples',
  `vector` varchar(25) DEFAULT NULL COMMENT 'Research Samples',
  `marker` enum('EGF','YFP','RFP','Puromycin','Blasticidin','Hygromycin B','G418 (Neomycin)','Other-See Notes') DEFAULT NULL COMMENT 'Research samples',
  `core_diameter` varchar(12) DEFAULT NULL COMMENT 'cm',
  `path_tumor_content` float DEFAULT NULL,
  `material` enum('Tissue','Bone','Blood','Other','Unknown') NOT NULL DEFAULT 'Unknown',
  `site` varchar(50) DEFAULT NULL,
  `researcher` varchar(8) DEFAULT NULL,
  `box` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`sample_id`),
  KEY `case_id` (`case_id`),
  KEY `ext_inst_id` (`ext_inst_id`),
  KEY `tissue_sdb` (`tissue_sdb`),
  KEY `user_mod` (`user_mod`),
  KEY `user_add` (`user_add`),
  KEY `researcher` (`researcher`),
  CONSTRAINT `sample_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`case_id`),
  CONSTRAINT `sample_ibfk_2` FOREIGN KEY (`ext_inst_id`) REFERENCES `ext_inst` (`ext_inst_id`),
  CONSTRAINT `sample_ibfk_4` FOREIGN KEY (`user_mod`) REFERENCES `user` (`uniquename`),
  CONSTRAINT `sample_ibfk_5` FOREIGN KEY (`user_add`) REFERENCES `user` (`uniquename`),
  CONSTRAINT `sample_ibfk_6` FOREIGN KEY (`researcher`) REFERENCES `user` (`uniquename`)
) ENGINE=InnoDB AUTO_INCREMENT=1895 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sample_deriv`
--

DROP TABLE IF EXISTS `sample_deriv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sample_deriv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sample_id` int(11) NOT NULL,
  `deriv_id` int(11) NOT NULL,
  `user_add` varchar(8) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sample_id` (`sample_id`),
  KEY `deriv_id` (`deriv_id`),
  CONSTRAINT `sample_deriv_ibfk_1` FOREIGN KEY (`sample_id`) REFERENCES `sample` (`sample_id`),
  CONSTRAINT `sample_deriv_ibfk_2` FOREIGN KEY (`deriv_id`) REFERENCES `derivative` (`deriv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `uniquename` varchar(8) NOT NULL,
  `peerrs_expire` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_mod` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_rem` timestamp NULL DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(50) DEFAULT NULL COMMENT 'name displayed on sample owner and lib_tech pulldowns',
  `user_add` varchar(8) NOT NULL DEFAULT 'unknown',
  `user_mod` varchar(8) NOT NULL DEFAULT 'unknown',
  `status` enum('Active User','Inactive') NOT NULL DEFAULT 'Inactive',
  `peerrs` enum('Exists','Not On File') NOT NULL DEFAULT 'Not On File',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniquename` (`uniquename`),
  UNIQUE KEY `uniquename_2` (`uniquename`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `yii_web_sessions`
--

DROP TABLE IF EXISTS `yii_web_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `yii_web_sessions` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`),
  KEY `expire_idx` (`expire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'mctp_lims'
--

--
-- Dumping routines for database 'mctp_lims'
--
/*!50003 DROP PROCEDURE IF EXISTS `insert_derivative` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_derivative`(in user varchar(8), in dv_use varchar(8), cell_sel varchar(25),
                                    in typ varchar(20), in nt varchar(200),  OUT deriv_id int(10))
BEGIN
  IF LENGTH(nt)>1
     THEN INSERT INTO derivative(user_add, user_mod, type, cell_select, deriv_use, note) VALUES(user, user, typ, cell_sel, dv_use, nt);
  ELSE
    INSERT INTO derivative(user_add, user_mod, type, cell_select, deriv_use) VALUES(user, user, typ, cell_sel, dv_use);
  END IF;
  SET deriv_id = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_library` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_library`(in user varchar(8), in lib_use varchar(8), OUT lib_id int(10))
BEGIN
  DECLARE si_label varchar(16);
  INSERT INTO library(user_add, user_mod, lib_tech, lib_use) VALUES (user, user, user, lib_use);
  SET lib_id = LAST_INSERT_ID();
  SET si_label=CONCAT('SI_', CAST(lib_id AS CHAR));
  UPDATE library set label=si_label where library_id=lib_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_sample_deriv` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_sample_deriv`(user varchar(8), in sample int(10), in deriv int(10), OUT id int(10))
BEGIN
   INSERT INTO sample_deriv(user_add, sample_id, deriv_id) VALUES(user,sample,deriv);
   SET id = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insert_sample_image` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_sample_image`(in user varchar(8), in sample_id int(10), OUT id int(10))
BEGIN

  INSERT INTO image(user_add, sample_id, type) VALUES (user, sample_id, "Sample");
  SET id = LAST_INSERT_ID();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `lib_snp_close` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `lib_snp_close`(IN lib_id varchar(12))
BEGIN
   DECLARE min_id int;
   DECLARE counter int;  
   DECLARE this_md5sum varchar(32);
   

   select count(*) from snp_166 where library_id = 'SI_6989' and status = 'A' into counter;


   IF counter < 1 THEN
       select  CONCAT('Found no snp_166 entries for ',lib_id);  
   ELSEIF counter = 1 THEN

       

       select md5sum from snp_166 where library_id = lib_id and status = 'A' into this_md5sum; 
       

       CALL md5sum_snp_close(this_md5sum); 
   ELSE
      select CONCAT('Found ', counter, ' entries for ', lib_id);

    
   END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `lib_snp_close_raw` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `lib_snp_close_raw`(IN lib_id VARCHAR(12))
BEGIN

select
`snp_166_concordance`.`id` AS `id`,
`snp_1`.`case_id` AS `case_id`,
`snp_1`.`library_id` AS `library_id`,
`snp_1`.`flowcell_id` AS `flowcell_id`,
`snp_1`.`lane` AS `lane`,
`snp_1`.`md5sum` AS `md5sum`,
`snp_2`.`case_id` AS `case_id_2`,
`snp_2`.`library_id` AS `library_id_2`,
`snp_2`.`flowcell_id` AS `flowcell_id_2`,
`snp_2`.`lane` AS `lane_2`,
`snp_2`.`md5sum` AS `md5sum_2`,
`snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
`snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
`snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
`snp_166_concordance`.`status` AS `status`
from ((`snp_166_concordance`
join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))
where (snp_1.library_id = lib_id or snp_2.library_id = lib_id)
and `snp_1`.`case_id` <> `snp_2`.`case_id`
order by pct_concordant DESC
limit 50;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `md5sum_snp_close` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `md5sum_snp_close`(IN md5sum varchar(32))
BEGIN
   DECLARE min_id int;
   DECLARE partition_string varchar(50);

   select min(id) from snp_166_concordance where md5sum_1 = md5sum or md5sum_2=md5sum into min_id;
   IF min_id < 93529 THEN
      select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      from ((`snp_166_concordance` partition ( p0,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))
      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;
   ELSEIF min_id < 566581 THEN
      select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status` 
      from ((`snp_166_concordance` partition ( p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))
      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;
   ELSEIF min_id < 2283978 THEN
      select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p2,p3,p4,p5,p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;

   ELSEIF min_id < 4459592 THEN
      select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p3,p4,p5,p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;
   
   ELSEIF min_id < 5500000 THEN
      select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p4,p5,p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;

   ELSEIF min_id < 6500000 THEN
      select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p5,p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;

   ELSEIF min_id < 7500000 THEN
     select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p6,p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;


   ELSEIF min_id < 8500000 THEN
     select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p7,p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;


   ELSEIF min_id <  9500000 THEN
     select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p8,p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;

   ELSEIF min_id < 10500000 THEN

     select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p9,p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      
      order by pct_concordant DESC 
      limit 50;


   ELSEIF min_id < 11500000 THEN
     select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p10,p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;

   ELSE
     select
      `snp_166_concordance`.`id` AS `id`,
      `snp_1`.`case_id` AS `case_id`,
      `snp_1`.`library_id` AS `library_id`,
      `snp_1`.`flowcell_id` AS `flowcell_id`,
      `snp_1`.`lane` AS `lane`,
      `snp_1`.`md5sum` AS `md5sum`,
      `snp_2`.`case_id` AS `case_id_2`,
      `snp_2`.`library_id` AS `library_id_2`,
      `snp_2`.`flowcell_id` AS `flowcell_id_2`,
      `snp_2`.`lane` AS `lane_2`,
      `snp_2`.`md5sum` AS `md5sum_2`,
      `snp_166_concordance`.`concordant_pos_count` AS `concordant_pos_count`,
      `snp_166_concordance`.`total_pos_count` AS `total_pos_count`,
      `snp_166_concordance`.`pct_concordant` AS `pct_concordant`,
      `snp_166_concordance`.`status` AS `status`
      
      from ((`snp_166_concordance` partition ( p11) 
      join `snp_166` `snp_1` on((`snp_166_concordance`.`md5sum_1` = `snp_1`.`md5sum`)))
      join `snp_166` `snp_2` on((`snp_166_concordance`.`md5sum_2` = `snp_2`.`md5sum`)))

      where (snp_1.md5sum=md5sum or snp_2.md5sum=md5sum)
      and snp_1.case_id <> snp_2.case_id
      order by pct_concordant DESC 
      limit 50;

   END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-06 15:47:33
