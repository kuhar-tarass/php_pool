UPDATE `film`
SET `summary` = "---";
SELECT * FROM `film` LEFT JOIN `distrib` ON `distrib`.`id_distrib` = `film`.`id_distrib` LEFT JOIN `genre` ON `genre`.`id_genre` = `film`.`id_genre` WHERE (`film`.`id_genre` > 3 AND `film`.`id_genre` < 9);