SELECT COUNT(*) as 'movies'
FROM `member_history`
WHERE DATE(`date`) BETWEEN DATE('2006-10-30') AND DATE('2007-04-27') OR (MONTH(`date`) = '12' AND DAY(`date`) = '24');