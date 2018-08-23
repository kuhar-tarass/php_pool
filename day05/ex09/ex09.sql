SELECT count(`id_film`) as `nb_short-films`
FROM `film`
WHERE `duration` <= '42';
