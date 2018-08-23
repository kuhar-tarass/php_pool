SELECT UPPER(`last_name`) as 'NAME', `first_name`, `price`
FROM `user_card`, `member` , `subscription`
WHERE `user_card`.`id_user` = `member`.`id_user_card` and  `member`.`id_sub` = `subscription`.`id_sub` AND `subscription`.`price` > 42
ORDER by `last_name`, `first_name`