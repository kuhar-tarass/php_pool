SELECT `last_name`, `first_name`, DATE(`birthdate`)
FROM `user_card`
WHERE YEAR(`birthdate`) = '1989'
ORDER by `last_name`