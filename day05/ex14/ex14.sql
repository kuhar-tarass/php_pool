SELECT  `floor_number` as `floor`, sum(`nb_seats`) as `seats`
FROM `cinema`
GROUP by `floor_number`
ORDER by `seats` DESC;
