SELECT `name`
FROM `distrib`
WHERE ((`id_distrib` IN (2, 62, 63, 64, 65, 66, 67, 68, 69, 71, 88, 89, 90))
	OR (`name` LIKE "%yy%") 
	OR (`name` LIKE "%YY%"))
LIMIT 2, 5;