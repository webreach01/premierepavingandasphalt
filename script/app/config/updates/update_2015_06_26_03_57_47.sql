
START TRANSACTION;

ALTER TABLE `forms` ADD COLUMN `button_background_color` varchar(10) DEFAULT 'FFFFFF' AFTER `field_background_color`;
ALTER TABLE `forms` ADD COLUMN `button_hover_background_color` varchar(10) DEFAULT 'e6e6e6' AFTER `button_background_color`;
ALTER TABLE `forms` ADD COLUMN `button_border_color` varchar(10) DEFAULT 'CCCCCC' AFTER `button_background_color`;
ALTER TABLE `forms` ADD COLUMN `button_hover_border_color` varchar(10) DEFAULT 'adadad' AFTER `button_border_color`;

INSERT INTO `fields` VALUES (NULL, 'lblButtonBackgroundColor', 'backend', 'Label / Button background color', 'script', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Button background color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Button background color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Button background color', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblButtonBorderColor', 'backend', 'Label / Button border color', 'script', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Button border color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Button border color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Button border color', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblButtonHoverBackgroundColor', 'backend', 'Label / Button hover background color', 'script', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Button hover background color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Button hover background color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Button hover background color', 'script');

INSERT INTO `fields` VALUES (NULL, 'lblButtonHoverBorderColor', 'backend', 'Label / Button hover border color', 'script', NULL);

SET @id := (SELECT LAST_INSERT_ID());

INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '1', 'title', 'Button hover border color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '2', 'title', 'Button hover border color', 'script');
INSERT INTO `multi_lang` VALUES (NULL, @id, 'pjField', '3', 'title', 'Button hover border color', 'script');

COMMIT;