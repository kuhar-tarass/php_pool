SELECT `title`, `summary` 
FROM `film`
WHERE LOWER(`summary`) LIKE "%vincent%"
ORDER by `id_film`;