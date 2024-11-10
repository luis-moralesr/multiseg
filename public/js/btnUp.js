
    // Espera a que la página se cargue completamente
    window.addEventListener('load', function() {
        const scrollButton = document.querySelector('.scroll-button');

        // Mostrar el botón solo cuando se haya hecho scroll hacia abajo
        window.addEventListener('scroll', function() {
            if (window.scrollY > 200) { // Mostrar botón después de 200px
                scrollButton.style.display = 'block';
            } else {
                scrollButton.style.display = 'none';
            }
        });

        // Agregar el evento de clic para subir al inicio de la página
        scrollButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });

