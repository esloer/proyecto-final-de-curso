// Seleccionar todas las tarjetas y todos los elementos .trailer
const portadas = document.querySelectorAll('#portada');
const trailers = document.querySelectorAll('.trailer');

// Agregar eventos para mostrar/ocultar el trailer al hacer hover
portadas.forEach((card, index) => {
    const trailer = trailers[index];
    card.addEventListener('mouseenter', () => {
        trailer.classList.add('visible');
    });
    card.addEventListener('mouseleave', () => {
        trailer.classList.remove('visible');
    });
});

trailers.forEach((card, index) => {
    const trailer = trailers[index];
    card.addEventListener('mouseenter', () => {
        trailer.classList.add('visible');
    });
    card.addEventListener('mouseleave', () => {
        trailer.classList.remove('visible');
    });
});

// Para mostrar el trailer

function openVideo(link) {
    const videoContainer = document.getElementById("video-container");
    const videoPlayer = document.getElementById("video-player");
    videoPlayer.src = link;
    videoContainer.style.display = "block";
  }

  // Función para cerrar el video
  function closeVideo() {
    const videoContainer = document.getElementById("video-container");
    const videoPlayer = document.getElementById("video-player");
    videoPlayer.src = "";
    videoContainer.style.display = "none";
  }

// fondo dinamico
document.addEventListener("DOMContentLoaded", function() {
    // Array de imágenes de fondo
    let backgrounds = [
      "url('../assets/img/netflix/series/ginny/ginny.jpg')",
      "url('../assets/img/netflix/series/witcher/witcher.jpg')",
      "url('../assets/img/netflix/series/bridgerton/briT1.jpg')",
      "url('../assets/img/netflix/series/machos/machos.jpg')",
      "url('../assets/img/netflix/series/cien/cien.jpg')",
      "url('../assets/img/hbo/series/warrior/warrior.jpg')",
      "url('../assets/img/hbo/series/silicon/silicon.jpg')",
      "url('../assets/img/hbo/series/pequeñas/pequeñas.jpg')",
      "url('../assets/img/hbo/series/monedas/monedas.jpg')",
      "url('../assets/img/prime/series/verano/verano.jpg')",
      "url('../assets/img/prime/series/ellos/ellos.jpg')",
      "url('../assets/img/prime/series/upload/upload.jpg')",
    ];
  
    let randomIndex = Math.floor(Math.random() * backgrounds.length);
    let selectedBackground = backgrounds[randomIndex];
  
    // Seteamos la misma imagen de fondo para ambos lados
    let backgroundImages = selectedBackground + ", " + selectedBackground;
  
    document.body.style.backgroundImage = backgroundImages;
  });