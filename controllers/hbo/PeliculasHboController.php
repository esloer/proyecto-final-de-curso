<?php
    require_once '../models/ContenidoHboModel.php';

    class PeliculasHboController {
        public function listar() {
            $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
            $contenidoModel = new ContenidoHboModel();
            
            // Obtener solo las películas si no se proporciona un género o si se selecciona "todo"
            if (!$genero || $genero === "todo") {
                $contenidos = $contenidoModel->obtenerPeliculas();
            } else {
                // Obtener solo las películas filtradas por género
                $contenidos = $contenidoModel->obtenerPeliculasPorGenero($genero);
            }
            
            require_once '../views/hbo/peliculas-hbo.php';
        }

        public function buscarPorPeliculasTItulo() {
            // Obtener el término de búsqueda del parámetro GET
            $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
            
            // Realizar la búsqueda por título en el modelo
            $contenidoModel = new ContenidoHboModel();
            $resultados = $contenidoModel->buscarPorPeliculasTItulo($titulo);
            
            // Devolver los resultados como JSON
            echo json_encode($resultados);
        }
    }
    
?>