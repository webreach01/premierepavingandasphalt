
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'front_file_not_found', 'frontend', 'Label / File not found', 'script', '2015-01-28 15:08:12');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'File not found', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'File not found', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'File not found', 'script');

INSERT INTO `fields` VALUES (NULL, 'front_err_ARRAY_url', 'arrays', 'front_err_ARRAY_url', 'script', '2015-01-29 15:52:08');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Link or url is not allowed in form fields.', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Link or url is not allowed in form fields.', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Link or url is not allowed in form fields.', 'script');

INSERT INTO `fields` VALUES (NULL, 'front_err_ARRAY_word', 'arrays', 'front_err_ARRAY_word', 'script', '2015-01-29 15:52:42');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Message blocked due to banned words used.', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Message blocked due to banned words used.', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Message blocked due to banned words used.', 'script');

COMMIT;