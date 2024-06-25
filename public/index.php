<?php
// Incluir el enrutador
require_once 'router.php';

// Incluir los controladores

// Todo el contenido por todas las plataforma o por plataforma.
require_once '../controllers/TodoController.php';
require_once '../controllers/netflix/TodoNetflixController.php';
require_once '../controllers/hbo/TodoHboController.php';
require_once '../controllers/prime/TodoPrimeController.php';
require_once '../controllers/disney/TodoDisneyController.php';
// Todas las series para todas las plataformas y plataformas
require_once '../controllers/SeriesController.php';
require_once '../controllers/netflix/SeriesNetflixController.php';
require_once '../controllers/hbo/SeriesHboController.php';
require_once '../controllers/prime/SeriesPrimeController.php';
require_once '../controllers/disney/SeriesDisneyController.php';

// Todas las series para todas las plataformas y plataformas
require_once '../controllers/PeliculasController.php';
require_once '../controllers/netflix/PeliculasNetflixController.php';
require_once '../controllers/hbo/PeliculasHboController.php';
require_once '../controllers/prime/PeliculasPrimeController.php';
require_once '../controllers/disney/PeliculasDisneyController.php';


// Instanciar el enrutador
$router = new Router();

// Definir las rutas

// Todo el contenido por todas las plataforma o por plataforma.
$router->get('/', function () {
    $todoController = new TodoController();
    $todoController->listar();
});

$router->get('/todoNetflix', function () {
    $todoController = new TodoNetflixController();
    $todoController->listar();
});

$router->get('/todoHBO', function () {
    $todoController = new TodoHBOController();
    $todoController->listar();
});

$router->get('/todoPrime', function () {
    $todoController = new TodoPrimeController();
    $todoController->listar();
});

$router->get('/todoDisney', function () {
    $todoController = new TodoDisneyController();
    $todoController->listar();
});

// Buscador dinamic por todas las plataformas y por platafor
$router->get('/buscar', function () { // Ruta para la búsqueda
    $busquedaController = new TodoController();
    $busquedaController->buscarPorTItulo();
});

$router->get('/buscarNetflix', function () { // Ruta para la búsqueda
    $busquedaController = new TodoNetflixController();
    $busquedaController->buscarPorTItulo();
});

$router->get('/buscarHbo', function () { // Ruta para la búsqueda
    $busquedaController = new TodoHboController();
    $busquedaController->buscarPorTItulo();
});

$router->get('/buscarPrime', function () { // Ruta para la búsqueda
    $busquedaController = new TodoPrimeController();
    $busquedaController->buscarPorTItulo();
});

$router->get('/buscarDisney', function () { // Ruta para la búsqueda
    $busquedaController = new TodoDisneyController();
    $busquedaController->buscarPorTItulo();
});


// todas las series de todas las plataforma y series por plataforma
$router->get('/series', function () {
    $todoController = new SeriesController();
    $todoController->listar();
});

$router->get('/seriesNetflix', function () {
    $todoController = new SeriesNetflixController();
    $todoController->listar();
});

$router->get('/seriesHbo', function () {
    $todoController = new SeriesHboController();
    $todoController->listar();
});

$router->get('/seriesPrime', function () {
    $todoController = new SeriesPrimeController();
    $todoController->listar();
});

$router->get('/seriesDisney', function () {
    $todoController = new SeriesDisneyController();
    $todoController->listar();
});


// Buscador de series de todas las plataformas y por plataforma
$router->get('/buscarSeries', function () { 
    $busquedaSeriesController = new SeriesController();
    $busquedaSeriesController->buscarPorSerieTItulo();
});

$router->get('/buscarSeriesNetflix', function () { 
    $busquedaSeriesController = new SeriesNetflixController();
    $busquedaSeriesController->buscarPorSerieTItulo();
});

$router->get('/buscarSeriesHbo', function () { 
    $busquedaSeriesController = new SeriesHboController();
    $busquedaSeriesController->buscarPorSerieTItulo();
});

$router->get('/buscarSeriesPrime', function () { 
    $busquedaSeriesController = new SeriesPrimeController();
    $busquedaSeriesController->buscarPorSerieTItulo();
});

$router->get('/buscarSeriesDisney', function () { 
    $busquedaSeriesController = new SeriesDisneyController();
    $busquedaSeriesController->buscarPorSerieTItulo();
});

// Seleccion de series por el genero
$router->get('/series-generos', function () { 
    $busquedaSeriesController = new SeriesController();
    $busquedaSeriesController->listar();
});

$router->get('/SeriesNetflix-Generos', function () { 
    $busquedaSeriesController = new SeriesNetflixController();
    $busquedaSeriesController->listar();
});

$router->get('/SeriesHbo-Generos', function () { 
    $busquedaSeriesController = new SeriesHboController();
    $busquedaSeriesController->listar();
});

$router->get('/SeriesPrime-Generos', function () { 
    $busquedaSeriesController = new SeriesPrimeController();
    $busquedaSeriesController->listar();
});

$router->get('/SeriesDisney-Generos', function () { 
    $busquedaSeriesController = new SeriesDisneyController();
    $busquedaSeriesController->listar();
});

// todas las peliculas en todas las plataformas y por plataformas
$router->get('/peliculas', function () {
    $todoController = new PeliculasController();
    $todoController->listar();
});

$router->get('/peliculasNetflix', function () {
    $todoController = new PeliculasNetflixController();
    $todoController->listar();
});

$router->get('/peliculasHbo', function () {
    $todoController = new PeliculasHboController();
    $todoController->listar();
});

$router->get('/peliculasPrime', function () {
    $todoController = new PeliculasPrimeController();
    $todoController->listar();
});

$router->get('/peliculasDisney', function () {
    $todoController = new PeliculasDisneyController();
    $todoController->listar();
});

// Buscar peliculas por titulo en todas las plataformas y por plataforma
$router->get('/buscarPeliculas', function () { 
    $busquedaPeliculasController = new PeliculasController();
    $busquedaPeliculasController->buscarPorPeliculasTItulo();
});

$router->get('/buscarPeliculasNetflix', function () { 
    $busquedaPeliculasController = new PeliculasNetflixController();
    $busquedaPeliculasController->buscarPorPeliculasTItulo();
});

$router->get('/buscarPeliculasHbo', function () { 
    $busquedaPeliculasController = new PeliculasHboController();
    $busquedaPeliculasController->buscarPorPeliculasTItulo();
});

$router->get('/buscarPeliculasPrime', function () { 
    $busquedaPeliculasController = new PeliculasPrimeController();
    $busquedaPeliculasController->buscarPorPeliculasTItulo();
});

$router->get('/buscarPeliculasDisney', function () { 
    $busquedaPeliculasController = new PeliculasDisneyController();
    $busquedaPeliculasController->buscarPorPeliculasTItulo();
});

// Buscar peliculas por genero en todas las plataformas y por plataforma
$router->get('/peliculas-genero', function () { 
    $busquedaPeliculasController = new PeliculasController();
    $busquedaPeliculasController->listar();
});

$router->get('/peliculasNetflix-genero', function () { 
    $busquedaPeliculasController = new PeliculasNetflixController();
    $busquedaPeliculasController->listar();
});

$router->get('/peliculasHbo-genero', function () { 
    $busquedaPeliculasController = new PeliculasHboController();
    $busquedaPeliculasController->listar();
});

$router->get('/peliculasPrime-genero', function () { 
    $busquedaPeliculasController = new PeliculasPrimeController();
    $busquedaPeliculasController->listar();
});

$router->get('/peliculasDisnsey-genero', function () { 
    $busquedaPeliculasController = new PeliculasDisneyController();
    $busquedaPeliculasController->listar();
});



// $router->get('/buscarPorPlataforma', function () {
//     // Obtener la plataforma del parámetro GET
//     $plataforma = isset($_GET['plataforma']) ? $_GET['plataforma'] : '';
    
//     // Llamar a la función buscarPorPlataforma del controlador TodoController
//     $todoController = new TodoController();
//     $todoController->buscarPorPlataforma($plataforma);
// });

// Ejecutar el enrutador
$router->run();
?>
