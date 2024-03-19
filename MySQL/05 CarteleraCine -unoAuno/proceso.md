# Proceso Creción web Cartelera







## SQL
---
```



-- Creación de la tabla "peliculas"
CREATE TABLE cartelera.peliculas(
    id INT NOT NULL AUTO_INCREMENT PRimary KEY,
    titulo VARCHAR(255) NOT NULL,
    cartel VARCHAR(255) NOT NULL,
    sinopsis TEXT NOT NULL,
    duracion INT NULL,
    calificacion INT NULL,
    trailer VARCHAR(255) NOT NULL,
    estreno DATE NOT NULL,
    fin DATE NULL,
    genero_id INT NOT NULL
);

-- Creación de la tabla "generos"
CREATE TABLE cartelera.generos(
    id_genero INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_genero VARCHAR(32) NOT NULL,
    descripcion_genero TEXT NOT NULL,
    foto_genero VARCHAR(255) NOT NULL
);

-- Establecimiento de la relación uno a uno
ALTER TABLE cartelera.peliculas
ADD CONSTRAINT fk_pelicula_genero
FOREIGN KEY (genero_id)
REFERENCES cartelera.generos(id_genero);

-- Opcionalmente, agregar un índice a la columna `genero_id`
CREATE INDEX idx_pelicula_genero ON cartelera.peliculas(genero_id);




----

INSERT INTO `generos` (`id_genero`, `nombre_genero`, `descripcion_genero`, `foto_genero`) VALUES (NULL, 'Humor', 'risas y eso', 'humor.jpg'), (NULL, 'Drama', 'Drama y llorar y eso...', 'drama.jpg');
----



INSERT INTO `peliculas` (`id`, `titulo`, `cartel`, `sinopsis`, `duracion`, `calificacion`, `trailer`, `estreno`, `fin`, `genero_id`)
VALUES
(NULL, 'Anatomía de una Caída', '6105.jpg', 'Unos que caen', '107', '12', 'youtube.com', '2024-01-10', '2024-02-29', '1'),
(NULL, 'Agrylle',               '6183.jpg', 'Super agente secreto', '75', '16', 'youtube.com/argaile', '2024-01-18', '2024-02-23', '1'),
(NULL, 'Ferrari',               '6333.jpg', 'Unos que caen', '107', '12', 'youtube.com', '2024-01-10', '2024-02-29', '1'),
(NULL, 'Cazafantasmas',         '6399.jpg', 'Unos que caen', '107', '12', 'youtube.com', '2024-01-10', '2024-02-29', '1'),
(NULL, 'Secretos de un Escándalo', '6390.jpg', 'Unos que caen', '107', '12', 'youtube.com', '2024-01-10', '2024-02-29', '1');



INSERT INTO `generos`(`nombre_genero`, `descripcion_genero`, `foto_genero`)
VALUES ('thriller','Descubren algo','thriller.jpg'), ('romántico','Quierense mucho','romantico.jpg');


-


```



## Consultas SQL desde PHP

```
SELECT
  peliculas.id,
  peliculas.titulo,
  peliculas.cartel,
  peliculas.sinopsis,
  peliculas.duracion,
  peliculas.calificacion,
  peliculas.trailer,
  peliculas.estreno,
  peliculas.fin,
  generos.nombre_genero
FROM cartelera.peliculas
INNER JOIN cartelera.generos
ON peliculas.genero_id = generos.id_genero;
```
