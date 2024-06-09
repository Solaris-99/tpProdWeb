
INSERT INTO category (name) VALUES('Acción'); -- 1 
INSERT INTO category (name) VALUES('Aventura'); -- 2
INSERT INTO category (name) VALUES('Drama'); -- 3
INSERT INTO category (name) VALUES('Fantasía'); -- 4
INSERT INTO category (name) VALUES('Sci-Fi'); -- 5
INSERT INTO category (name) VALUES('Comedia'); -- 6
INSERT INTO category (name) VALUES('Biográfico'); -- 7
INSERT INTO category (name) VALUES('Documental'); -- 8
INSERT INTO category (name) VALUES('Horror'); -- 9
INSERT INTO category (name) VALUES('Crimen'); -- 10
INSERT INTO category (name) VALUES('Thriller'); -- 11



INSERT INTO movie(title, price, `release`, duration, poster, rating, `description`) VALUES
    ('Avatar',10, '2009-12-18', '162 min', 'https://image.tmdb.org/t/p/original/jRXYjXNq0Cs2TcJjLkki24MLp7u.jpg', 7.9, 'Una épica aventura de ciencia ficción donde los humanos colonizan Pandora, un planeta habitado por una raza alienígena llamada los Na\'vi.'),
    ('I Am Legend',5, '2007-12-14', '101 min', 'https://picfiles.alphacoders.com/349/thumb-1920-349906.jpg', 7.2, 'Un científico lucha por sobrevivir en un mundo post-apocalíptico poblado por criaturas mutantes, mientras busca una cura para la plaga que destruyó a la humanidad.'),
    ('300',5, '2007-03-09', '117 min', 'https://www.themoviedb.org/t/p/original/1Gu1IzSzlqvFuoVEfHqzQxRPOGi.jpg', 7.7, 'La historia heroica de los 300 espartanos que lucharon contra el vasto ejército persa en la batalla de las Termópilas.'),
    ('The Avengers',10, '2012-05-04', '143 min', 'https://www.themoviedb.org/t/p/original/pdhOE0NAZaPzjsgTvatRP1xFhG3.jpg', 8.1, 'Un grupo de superhéroes se une para detener a un villano extraterrestre que amenaza con destruir la Tierra.'),
    ('The Wolf of Wall Street',15, '2013-12-25', '180 min', 'https://jonwatchesmovies.wordpress.com/wp-content/uploads/2013/12/the-wolf-of-wall-street.jpg', 8.2, 'La vida extravagante y corrupta de un corredor de bolsa de Nueva York que asciende al poder y a la riqueza a través del fraude y el engaño.'),
    ('Interstellar',15, '2014-11-07', '169 min', 'https://s3.amazonaws.com/nightjarprod/content/uploads/sites/130/2021/08/19085635/gEU2QniE6E77NI6lCU6MxlNBvIx-scaled.jpg', 8.6, 'Un equipo de astronautas viaja a través de un agujero de gusano en busca de un nuevo hogar para la humanidad mientras la Tierra se enfrenta a la extinción.'),
    ('Doctor Strange',20, '2016-11-04', NULL, 'https://image.tmdb.org/t/p/original/mcn70dvUJigvXygc5DByUCJZBua.jpg', 2.0, 'Un neurocirujano descubre el mundo de la magia y las dimensiones alternativas después de sufrir un accidente que destroza su carrera.'),
    ('Rogue One: A Star Wars Story',25, '2016-12-16', NULL, 'https://image.tmdb.org/t/p/original/ixCLh6nKAB7r0dAsKF8hdNabD2V.jpg', 8.0, 'Un grupo de rebeldes emprende una misión para robar los planos de la Estrella de la Muerte, la superarma del Imperio Galáctico.'),
    ('Assassin\'s Creed',20, '2016-12-21', NULL, 'https://www.themoviedb.org/t/p/original/kcVsrUyHfgcEb0M7HEt3XZI3tVd.jpg', 9.0, 'Un hombre descubre que es descendiente de una antigua sociedad de asesinos y utiliza sus habilidades para enfrentarse a una poderosa organización en el presente.');

INSERT INTO category_movie (id_movie, id_category) VALUES
    (1, 1), -- Avatar: Acción
    (1, 2), -- Avatar: Aventura
    (1, 4), -- Avatar: Fantasía
    (2, 3), -- I Am Legend: Drama
    (2, 5), -- I Am Legend: Sci-Fi
    (2, 9), -- I Am Legend: Horror
    (3, 1), -- 300: Acción
    (3, 3), -- 300: Drama
    (3, 4), -- 300: Fantasía
    (4, 1), -- The Avengers: Acción
    (4, 5), -- The Avengers: Sci-Fi
    (4, 11), -- The Avengers: Thriller 
    (5, 7), -- The Wolf of Wall Street: Biográfico
    (5, 6), -- The Wolf of Wall Street: Comedia
    (5, 10), -- The Wolf of Wall Street: Crimen 
    (6, 2), -- Interstellar: Aventura
    (6, 3), -- Interstellar: Drama
    (6, 5), -- Interstellar: Sci-Fi
    (7, 1), -- Doctor Strange: Acción
    (7, 2), -- Doctor Strange: Aventura
    (7, 4), -- Doctor Strange: Fantasía
    (8, 1), -- Rogue One: A Star Wars Story: Acción
    (8, 2), -- Rogue One: Aventura
    (8, 5), -- Rogue One: Sci-Fi
    (9, 1), -- Assassin's Creed: Acción
    (9, 2), -- Assassin's Creed: Aventura
    (9, 4); -- Assassin's Creed: Fantasía


