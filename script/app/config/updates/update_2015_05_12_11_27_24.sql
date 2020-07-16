
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'lblLastSubmission', 'backend', 'Label / Last submission', 'script', '2015-05-12 15:58:20');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Last submission', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Last submission', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Last submission', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblJavascript', 'backend', 'Label / Javascript', 'script', '2015-05-12 16:18:26');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Javascript', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Javascript', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Javascript', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblFormSourceCode', 'backend', 'Label / Form source code', 'script', '2015-05-12 16:18:55');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Form source code', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Form source code', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Form source code', 'script');

COMMIT;