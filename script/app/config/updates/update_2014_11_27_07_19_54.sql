
START TRANSACTION;

SET @id := (SELECT `id` FROM `fields` WHERE `key` = "label_data_blocked");

UPDATE `multi_lang` SET `content` = 'Message blocked due to banned words used.' WHERE `foreign_id` = @id AND `model` = "pjField" AND `field` = "title";

COMMIT;