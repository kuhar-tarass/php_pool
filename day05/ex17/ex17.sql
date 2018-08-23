SELECT COUNT(`id_sub`) as `nb_susc`, FLOOR(avg(`price`)) as 'av_susc', SUM(`duration_sub`)% 42 as 'ft'
FROM `subscription`

