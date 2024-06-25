<?php
// controllers/ProductosController.php

require_once '../models/ContenidoModel.php';

class FiltrarGeneroController {
    public function filtrarPorGenero() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['genero'])) {
            $genero = $_GET['genero'];

            // Instanciamos el modelo de productos
            $productoModel = new ContenidoModel();

            // Obtenemos los productos por el género seleccionado
            $productos = $productoModel->obtenerPorGenero($genero);

            // Cargamos la vista para mostrar los productos filtrados
            require_once '../views/productos/listar.php';
        } else {
            // Manejo de errores si no se proporciona un género o si la solicitud no es GET
            header('Location: /'); // Redirigir a la página principal en este caso
            exit();
        }
    }
}

?>
