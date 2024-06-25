<?php
// Incluir el modelo
require_once '../models/ContenidoModel.php';

class TodoController {
    public function listar() {
        // Obtener el valor del parámetro 'genero' de la solicitud GET
        $genero = isset($_GET['genero']) ? $_GET['genero'] : null;
    
        // Obtener todos los contenidos si no se proporciona un género o si se selecciona "todo"
        if (!$genero || $genero === "todo") {
            // Obtener todos los contenidos
            $contenidoModel = new ContenidoModel();
            $contenidos = $contenidoModel->obtenerTodos();
        } else {
            // Obtener contenidos filtrados por género
            $contenidoModel = new ContenidoModel();
            $contenidos = $contenidoModel->obtenerPorGenero($genero);
        }
    
        // Renderizar la vista con los contenidos obtenidos
        require_once '../views/todo.php';
    }

    public function buscarPorTitulo() {
        // Obtener el término de búsqueda del parámetro GET
        $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
        
        // Realizar la búsqueda por título en el modelo
        $contenidoModel = new ContenidoModel();
        $resultados = $contenidoModel->buscarPorTitulo($titulo);
        
        // Devolver los resultados como JSON
        echo json_encode($resultados);
    }

    public function buscarPorPlataforma($plataforma) {
        // Realizar la búsqueda por plataforma en el modelo
        $contenidoModel = new ContenidoModel();
        $resultados = $contenidoModel->buscarPorPlataforma($plataforma);
        
        // Devolver los resultados como JSON
        echo json_encode($resultados);
    }
    
}
?>