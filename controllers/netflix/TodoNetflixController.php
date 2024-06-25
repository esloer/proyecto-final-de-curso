<?php
// Incluir el modelo
require_once '../models/ContenidoNetflixModel.php';

class TodoNetflixController {
    public function listar() {
        // Obtener el valor del parámetro 'genero' de la solicitud GET
        $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
    
        // Obtener todos los contenidos si no se proporciona un género o si se selecciona "todo"
        if (!$genero || $genero === "todo") {
            // Obtener todos los contenidos
            $ContenidoNetflixModel = new ContenidoNetflixModel();
            $contenidos = $ContenidoNetflixModel->obtenerTodos();
        } else {
            // Obtener contenidos filtrados por género
            $ContenidoNetflixModel = new ContenidoNetflixModel();
            $contenidos = $ContenidoNetflixModel->obtenerPorGenero($genero);
        }
    
        // Renderizar la vista con los contenidos obtenidos
        require_once '../views/netflix/todo-netflix.php';
    }

    public function buscarPorTitulo() {
        // Obtener el término de búsqueda del parámetro GET
        $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
        
        // Realizar la búsqueda por título en el modelo
        $ContenidoNetflixModel = new ContenidoNetflixModel();
        $resultados = $ContenidoNetflixModel->buscarPorTitulo($titulo);
        
        // Devolver los resultados como JSON
        echo json_encode($resultados);
    }

    public function buscarPorPlataforma($plataforma) {
        // Realizar la búsqueda por plataforma en el modelo
        $ContenidoNetflixModel = new ContenidoNetflixModel();
        $resultados = $ContenidoNetflixModel->buscarPorPlataforma($plataforma);
        
        // Devolver los resultados como JSON
        echo json_encode($resultados);
    }
    
}
?>