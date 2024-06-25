<?php
    require_once '../models/ContenidoDisneyModel.php';

    class SeriesDisneyController {
        public function listar() {
            $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
            $contenidoModel = new ContenidoDisneyModel();
            
            // Obtener solo las series si no se proporciona un género o si se selecciona "todo"
            if (!$genero || $genero === "todo") {
                $contenidos = $contenidoModel->obtenerSeries();
            } else {
                // Obtener solo las series filtradas por género
                $contenidos = $contenidoModel->obtenerSeriesPorGenero($genero);
            }
            
            require_once '../views/disney/series-disney.php';
        }

        public function buscarPorSerieTItulo() {
            // Obtener el término de búsqueda del parámetro GET
            $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
            
            // Realizar la búsqueda por título en el modelo
            $contenidoModel = new ContenidoDisneyModel();
            $resultados = $contenidoModel->buscarPorSerieTItulo($titulo);
            
            // Devolver los resultados como JSON
            echo json_encode($resultados);
        }
    }
    
?>