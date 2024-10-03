SELECT Persona.ci, Persona.nombre, Persona.paterno,
       SUM(CASE WHEN LEFT(Catastro.codigo, 1) = '1' THEN 1 ELSE 0 END) AS total_bajo,
       SUM(CASE WHEN LEFT(Catastro.codigo, 1) = '2' THEN 1 ELSE 0 END) AS total_medio,
       SUM(CASE WHEN LEFT(Catastro.codigo, 1) = '3' THEN 1 ELSE 0 END) AS total_alto
FROM Persona
JOIN Catastro ON Persona.ci = Catastro.ci
GROUP BY Persona.ci, Persona.nombre, Persona.paterno
ORDER BY Persona.ci;
