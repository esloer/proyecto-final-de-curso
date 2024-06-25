<?php
// models/ProductoModel.php

require_once '../config/database.php';

class ContenidoHboModel {
    
    // Coger todo el contenido de las series
    public function obtenerTodos() {
        global $pdo;
        $statement = $pdo->query("SELECT *
        FROM series s
        JOIN plataformas ps ON s.plataforma = ps.id
        WHERE ps.id =3
        UNION ALL
        SELECT *
        FROM peliculas p
        JOIN plataformas pp ON p.plataforma = pp.id
        WHERE pp.id =3");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtener solo las series
    public function obtenerseries() {
        global $pdo;
        $statement = $pdo->query("SELECT *
        FROM series s
        JOIN plataformas ps ON s.plataforma = ps.id
        WHERE ps.id =3");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // Obtener solo las peliculas
    public function obtenerpeliculas() {
        global $pdo;
        $statement = $pdo->query("SELECT *
        FROM peliculas p
        JOIN plataformas pp ON p.plataforma = pp.id
        WHERE pp.id =3");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


    // Obtener contenidos filtrados por género
    public function obtenerPorGenero($genero) {
        global $pdo;
        // Consulta SQL para obtener contenidos por género en series
        $statement = $pdo->prepare("SELECT s.*, ps.*
        FROM series s
        JOIN plataformas ps ON s.plataforma = ps.id
        JOIN generos gs ON s.genero = gs.id
        WHERE gs.Nombre = ?
        AND ps.id =3");
        $statement->execute([$genero]);
        $series = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        // Consulta SQL para obtener contenidos por género en películas
        $statement = $pdo->prepare("SELECT p.*, pp.*
        FROM peliculas p
        JOIN plataformas pp ON p.plataforma = pp.id
        JOIN generos gp ON p.genero = gp.id
        WHERE gp.Nombre = ?
        AND pp.id =3");
        $statement->execute([$genero]);
        $peliculas = $statement->fetchAll(PDO::FETCH_ASSOC);
    
        // Combinar los resultados de series y películas
        $resultados = array_merge($series, $peliculas);
    
        return $resultados;
    }

     // Obtener series filtradas por género
     public function obtenerseriesPorGenero($genero) {
        global $pdo;
        $statement = $pdo->prepare("SELECT s.*, ps.*
        FROM series s
        JOIN plataformas ps ON s.plataforma = ps.id
        JOIN generos gs ON s.genero = gs.id
        WHERE gs.Nombre = ?
        AND ps.id =3");
        $statement->execute([$genero]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener películas filtradas por género
    public function obtenerpeliculasPorGenero($genero) {
        global $pdo;
        $statement = $pdo->prepare("SELECT p.*, pp.*
        FROM peliculas p
        JOIN plataformas pp ON p.plataforma = pp.id
        JOIN generos gp ON p.genero = gp.id
        WHERE gp.Nombre = ?
        AND pp.id =3");
        $statement->execute([$genero]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorTitulo($titulo) {
        global $pdo;
        $statement = $pdo->prepare("SELECT *
                                    FROM (SELECT *, 'serie' AS tipo FROM series) AS s
                                    JOIN plataformas ps ON s.plataforma = ps.id
                                    WHERE s.titulo LIKE :titulo
                                    AND ps.id =3
                                    UNION ALL
                                    SELECT *
                                    FROM (SELECT *, 'pelicula' AS tipo FROM peliculas) AS p
                                    JOIN plataformas pp ON p.plataforma = pp.id
                                    WHERE p.titulo LIKE :titulo
                                    AND pp.id =3");
        $statement->execute(['titulo' => "%$titulo%"]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorSerieTItulo($titulo) {
        global $pdo;
        $statement = $pdo->prepare("SELECT *
                                    FROM (SELECT *, 'serie' AS tipo FROM series) AS s
                                    JOIN plataformas ps ON s.plataforma = ps.id
                                    WHERE s.titulo LIKE :titulo
                                    AND ps.id =3");
        $statement->execute(['titulo' => "%$titulo%"]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarPorpeliculasTItulo($titulo) {
        global $pdo;
        $statement = $pdo->prepare("SELECT *
                                    FROM (SELECT *, 'pelicula' AS tipo FROM peliculas) AS p
                                    JOIN plataformas pp ON p.plataforma = pp.id
                                    WHERE p.titulo LIKE :titulo
                                    AND pp.id = 3");
        $statement->execute(['titulo' => "%$titulo%"]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorPlataforma($plataforma) {
        global $pdo;
        $statement = $pdo->prepare("SELECT * FROM Contenido WHERE plataforma = :plataforma");
        $statement->execute(['plataforma' => $plataforma]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
