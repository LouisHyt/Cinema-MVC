-- a
SELECT mo.id_movie, mo.title, mo.release_date, DATE_FORMAT(SEC_TO_TIME(mo.duration * 60), '%H:%i') AS duration, CONCAT(pe.first_name, ' ',pe.last_name) AS director
FROM movie mo
INNER JOIN director di ON mo.id_director = di.id_director
INNER JOIN person pe ON di.id_director = pe.id_person
WHERE mo.id_movie = 1

-- b
SELECT mo.id_movie, mo.title, DATE_FORMAT(SEC_TO_TIME(mo.duration * 60), '%H:%i') AS duration
FROM movie mo
WHERE mo.duration > 135
ORDER BY mo.duration DESC

-- c
SELECT mo.id_movie, mo.title, mo.release_date, mo.synopsis
FROM movie mo
INNER JOIN director di ON mo.id_director = di.id_director
WHERE di.id_director = 1 

-- d
SELECT ca.label, COUNT(mo.id_movie) AS total
FROM movie mo
INNER JOIN belongs be ON mo.id_movie = be.id_movie
INNER JOIN category ca ON be.id_category = ca.id_category
GROUP BY ca.label

-- e
SELECT CONCAT(pe.first_name, " ", pe.last_name) AS director, COUNT(mo.id_movie) AS total
FROM movie mo
INNER JOIN director di ON mo.id_director = di.id_director
INNER JOIN person pe ON di.id_person = pe.id_person
GROUP BY pe.id_person

-- f
SELECT CONCAT(pe.first_name, " ", pe.last_name) AS fullname, pe.genre 
FROM person pe
INNER JOIN actor ac ON pe.id_person = ac.id_person
INNER JOIN play pl ON ac.id_actor = pl.id_actor
WHERE pl.id_movie = 1

-- g
SELECT mo.title, mo.release_date, ro.role_name
FROM movie mo
INNER JOIN play pl ON pl.id_movie = mo.id_movie
INNER JOIN casting_role ro ON pl.id_role = ro.id_role 
WHERE pl.id_actor = 1
ORDER BY mo.release_date DESC

--h