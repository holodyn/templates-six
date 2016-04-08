DROP TRIGGER IF EXISTS `jos_uuidTest_beforeInsert`;
DELIMITER //
CREATE TRIGGER `jos_uuidTest_beforeInsert` BEFORE INSERT ON `jos_uuidTest`
FOR EACH ROW SET new.UUID = UUID()
//
DELIMITER ;

DROP TRIGGER IF EXISTS `jos_uuidTest_afterInsert`;
DELIMITER //
CREATE TRIGGER `jos_uuidTest_afterInsert` AFTER INSERT ON `jos_uuidTest`
FOR EACH ROW SET @last_uuid = new.UUID
//
DELIMITER ;
