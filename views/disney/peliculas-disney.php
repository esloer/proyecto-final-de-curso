<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Peliculas Disney plus</title>
    <link rel="icon" href="../assets/img/interno/pestaña.jpg" type="image/x-icon">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/disney/peliculas-disney.js"></script>
    <script src="/assets/js/app.js" defer></script>
    <script src="https://kit.fontawesome.com/2d40b95e3a.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="links-tipos">
            <div class="solo-link">
                <div class="seriesPeliculas">
                    <a class="aSeriesPeliculas" href="/">Series y peliculas</a>
                    <a href="/series">Series</a>
                    <a href="/peliculas">Peliculas</a>
                </div>
            </div>
            <div class="bus-sel">
                <input id="bus-peliculas" class="bus" type="text"
                    placeholder="Busca una película en Disney plus" />
                <form method="GET" action="/peliculasDisnsey-genero">
                    <select name="genero" class="genero" id="genero" onchange="this.form.submit()">
                        <option value="">Selecciona un genero</option>
                        <option value="todo">Todos lo generos</option>
                        <option value="romantica">Romántica</option>
                        <option value="suspense">Suspense</option>
                        <option value="comedia">Comedia</option>
                        <option value="fantasia">Fantasia</option>
                        <option value="accion">Acción</option>
                        <option value="ciencia-ficcion">Ciencia-ficción</option>
                        <option value="animacion">Animación</option>
                        <option value="terror">Terror</option>
                    </select>
                </form>
            </div>
        </div>
            <div class="link-logos">
                <a href="/peliculasNetflix"><img src="../assets/img/netflix/logos/netflix-link.jpg" alt="netflix" /></a>
                <a href="/peliculasHbo"><img src="../assets/img/hbo/logos/hbo-link.jpg" alt="hbo" /></a>
                <a href="/peliculasPrime"><img src="../assets/img/prime/logos/prime-link.jpg" alt="prime" /></a>
                <a href="/peliculasDisney"><img src="../assets/img/disney/logos/disney.jpg" alt="disney" /></a>
            </div>
    </header>
    <main>
        <?php if ($genero && $genero !== 'todo'): ?>
        <h1>Películas de tipo <?php echo ucfirst($genero); ?> en Disney plus</h1>
        <?php else: ?>
        <h1>Películas disponibles en Disney plus</h1>
        <?php endif; ?>
        <?php if (count($contenidos) > 0): ?>
            <section id="card-grid" class="card-grid">
            <?php foreach ($contenidos as $contenido): ?>
            <div class="card">
                <img id='portada' src="<?php echo $contenido['imagen']; ?>"alt="portada">
                <p class="trailer" onclick="openVideo('<?php echo $contenido['trailer'];?>')">Ver tráiler <br> <i class="fa-solid fa-play"></i></p>
                <div class="logo-<?php echo $contenido['nombre']; ?>">
                    <h5><?php echo $contenido['titulo']; ?></h5>
                    <a href="<?php echo $contenido['link']?>" target="_blank"><img src="<?php echo $contenido['logo']?>" alt="logo netflix"></a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>No hay videos disponibles.</p>
            <?php endif; ?>
        </section>
        <!-- elemento para rellenar el section para que se vea toda la pantalla del mismo color -->
        <div class="relleno"></div>
        <!-- Contenedor del video -->
        <div id="video-container">
            <p class="close-btn" onclick="closeVideo()">Cerrar</p>
            <iframe id="video-player" width="560" height="315" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
    </main>
    <footer></footer>
</body>
</html>