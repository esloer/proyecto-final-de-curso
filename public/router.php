<?php
// router.php

class Router {
    // Array para almacenar las rutas y sus correspondientes controladores
    private $routes = [];

    // Método para definir una ruta GET
    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    // Método para definir una ruta POST
    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    // Método para ejecutar el enrutador
    public function run() {
    // Obtener el método de la solicitud
    $method = $_SERVER['REQUEST_METHOD'];
    // Obtener la ruta solicitada
    $requestedPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Buscar la ruta en las definiciones
    foreach ($this->routes[$method] as $route => $callback) {
        // Convertir la ruta definida en una expresión regular
        $pattern = preg_replace('/\/{(.*?)}/', '/([^\/]+)', $route);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = '/^' . $pattern . '$/';

        // Si la ruta coincide, ejecutar el controlador correspondiente
        if (preg_match($pattern, $requestedPath, $matches)) {
            // Eliminar el primer elemento de $matches, que contiene toda la URL
            array_shift($matches);
            // Llamar al callback y pasar los parámetros coincidentes
            call_user_func_array($callback, $matches);
            return;
        }
    }

    // Si no se encuentra la ruta, mostrar un error 404
    echo "Error 404 - Página no encontrada";
}

}
?>