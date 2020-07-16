
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'front_err_ARRAY_redirect', 'arrays', 'front_err_ARRAY_redirect', 'script', '2015-03-20 16:07:38');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'You will be redirected in few seconds...', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'You will be redirected in few seconds...', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'You will be redirected in few seconds...', 'script');

COMMIT;