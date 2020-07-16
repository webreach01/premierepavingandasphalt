
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'front_form_not_found', 'frontend', 'Label / Form not found', 'script', '2015-05-19 11:20:25');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Form not found', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Form not found', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Form not found', 'script');

INSERT INTO `fields` VALUES (NULL, 'gridEmptyTitle', 'backend', 'Grid / No records selected', 'script', '2015-05-19 11:54:21');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'No records selected', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'No records selected', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'No records selected', 'script');

INSERT INTO `fields` VALUES (NULL, 'gridEmptyBody', 'backend', 'Grid / No records selected', 'script', '2015-05-19 11:55:06');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'You need to select at least a single record.', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'You need to select at least a single record.', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'You need to select at least a single record.', 'script');

SET @id := (SELECT `id` FROM `fields` WHERE `key` = "infoHTMLInstallBody");
UPDATE `multi_lang` SET `content` = 'If you are experienced with HTML and want to customize your form, you can use this integration method. Just copy the code and paste it on your web page. You can change the layout, colors, fonts, borders, etc. Do not change the form fields - "Count" and "Names". Please, bear in mind that, if you decide to edit your form using the "Form fields" tab, you will need to copy the new generated HTML installation code and paste it on your web page again.' WHERE `foreign_id` = @id AND `model` = "pjField" AND `field` = "title";

COMMIT;