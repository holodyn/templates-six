DROP TABLE IF EXISTS `jos_uuidTest`;
CREATE TABLE IF NOT EXISTS `jos_uuidTest` (
  `uuid` char(36) NOT NULL, 
  PRIMARY KEY (`uuid`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='My UUID Test Table';
