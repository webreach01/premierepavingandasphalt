
START TRANSACTION;

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_heading', 'arrays', 'field_titles_ARRAY_heading', 'script', '2015-06-26 10:23:46');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Heading', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Heading', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Heading', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_textbox', 'arrays', 'field_titles_ARRAY_textbox', 'script', '2015-06-26 10:24:17');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Text Box', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Text Box', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Text Box', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_email', 'arrays', 'field_titles_ARRAY_email', 'script', '2015-06-26 10:24:40');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Email', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Email', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Email', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_textarea', 'arrays', 'field_titles_ARRAY_textarea', 'script', '2015-06-26 10:25:02');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Text Area', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Text Area', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Text Area', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_dropdown', 'arrays', 'field_titles_ARRAY_dropdown', 'script', '2015-06-26 10:25:25');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Drop Down', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Drop Down', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Drop Down', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_radio', 'arrays', 'field_titles_ARRAY_radio', 'script', '2015-06-26 10:25:48');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Radio Button', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Radio Button', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Radio Button', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_checkbox', 'arrays', 'field_titles_ARRAY_checkbox', 'script', '2015-06-26 10:26:13');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Check Box', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Check Box', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Check Box', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_fileupload', 'arrays', 'field_titles_ARRAY_fileupload', 'script', '2015-06-26 10:26:40');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'File Upload', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'File Upload', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'File Upload', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_datepicker', 'arrays', 'field_titles_ARRAY_datepicker', 'script', '2015-06-26 10:27:04');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Date Picker', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Date Picker', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Date Picker', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_captcha', 'arrays', 'field_titles_ARRAY_captcha', 'script', '2015-06-26 10:27:28');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Captcha', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Captcha', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Captcha', 'script');

INSERT INTO `fields` VALUES (NULL, 'field_titles_ARRAY_button', 'arrays', 'field_titles_ARRAY_button', 'script', '2015-06-26 10:27:52');

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Submit Button', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Submit Button', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Submit Button', 'script');

COMMIT;