
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'lblDateSplashTime', 'backend', 'Label / Date / Time', 'script', '2015-05-21 13:57:39');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Date / Time', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Date / Time', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Date / Time', 'script');

COMMIT;