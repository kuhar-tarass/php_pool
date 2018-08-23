SELECT `last_name`, `first_name`
from `user_card`
WHERE  `last_name` like "%-%" OR `first_name` like "%-%"
ORDER by `last_name`, `first_name`;
