document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('bus');
    input.addEventListener('input', function() {
        const searchTerm = input.value.trim();
        if (searchTerm.length >= 3) {
            // Realizar búsqueda
            buscarContenido(searchTerm);
        } else {
            // Si el término de búsqueda es corto, mostrar todo el contenido
            mostrarTodoElContenido();
        }
    });

    function buscarContenido(term) {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/buscarDisney?titulo=${term}`, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const responseData = JSON.parse(xhr.responseText);
                    actualizarContenido(responseData);
                } else {
                    console.error('Error en la solicitud AJAX');
                }
            }
        };
        xhr.send();
    }

    function mostrarTodoElContenido() {
        // Realizar solicitud AJAX al servidor para obtener todo el contenido
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/buscarDisney?titulo=', true); // Sin término de búsqueda
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    const responseData = JSON.parse(xhr.responseText);
                    actualizarContenido(responseData);
                } else {
                    console.error('Error en la solicitud AJAX');
                    
                }
            }
        };
        xhr.send();
    }

    function actualizarContenido(resultados) {
        const contenedorContenidos = document.getElementById('card-grid');
        contenedorContenidos.innerHTML = '';
        resultados.forEach(function(resultado) {
            contenedorContenidos.innerHTML +=
            `
            <div class="card">
            <img class='portada' src="${resultado.imagen}" alt="portada">
            <p class="trailer" data-trailer="${resultado.trailer}">Ver tráiler <br> <i class="fa-solid fa-play"></i></p>
            <div class="logo-${resultado.nombre}">
                <h5>${resultado.titulo}</h5>
                <a href="${resultado.link}" target="_blank"><img src="${resultado.logo}" alt="logo netflix"></a>
            </div>
            </div>
            `;
        });

        // Reasignar eventos a los nuevos elementos .trailer y .portada
        const trailers = document.querySelectorAll('.trailer');
        const portadas = document.querySelectorAll('.portada');
        
        trailers.forEach((trailer, index) => {
            trailer.addEventListener('click', function() {
                const link = this.getAttribute('data-trailer');
                openVideo(link);
            });
            
            const toggleVisible = () => {
                trailer.classList.toggle('visible');
            };
            
            portadas[index].addEventListener('mouseenter', toggleVisible);
            portadas[index].addEventListener('mouseleave', toggleVisible);
            trailer.addEventListener('mouseenter', toggleVisible);
            trailer.addEventListener('mouseleave', toggleVisible);
        });
    }
    
});

