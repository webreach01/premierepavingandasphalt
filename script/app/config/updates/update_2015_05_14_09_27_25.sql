
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'lblPreview', 'backend', 'Label / Preview', 'script', '2015-05-14 10:59:29');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Preview', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Preview', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Preview', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblDateTime', 'backend', 'Label / Date time', 'script', '2015-05-14 12:57:47');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Date time', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Date time', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Date time', 'script');

COMMIT;