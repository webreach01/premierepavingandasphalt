
START TRANSACTION;

ALTER TABLE `formfields` MODIFY COLUMN `columns` int(10) DEFAULT '100';
ALTER TABLE `formfields` MODIFY COLUMN `rows` int(10) DEFAULT '150';

INSERT INTO `fields` VALUES (NULL, 'lblWidthPercentage', 'backend', 'Label / Width (%)', 'script', '2015-07-20 16:05:25');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Width (%)', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Width (%)', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Width (%)', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblHeightPixel', 'backend', 'Label / Height (px)', 'script', '2015-07-20 16:06:02');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Height (px)', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Height (px)', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Height (px)', 'script');

COMMIT;