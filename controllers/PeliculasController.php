<?php
    require_once '../models/ContenidoModel.php';

    class PeliculasController {
        public function listar() {
            $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
            $contenidoModel = new ContenidoModel();
            
            // Obtener solo las películas si no se proporciona un género o si se selecciona "todo"
            if (!$genero || $genero === "todo") {
                $contenidos = $contenidoModel->obtenerPeliculas();
            } else {
                // Obtener solo las películas filtradas por género
                $contenidos = $contenidoModel->obtenerPeliculasPorGenero($genero);
            }
            
            require_once '../views/peliculas.php';
        }

        public function buscarPorPeliculasTItulo() {
            // Obtener el término de búsqueda del parámetro GET
            $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
            
            // Realizar la búsqueda por título en el modelo
            $contenidoModel = new ContenidoModel();
            $resultados = $contenidoModel->buscarPorPeliculasTItulo($titulo);
            
            // Devolver los resultados como JSON
            echo json_encode($resultados);
        }
    }
    
?>