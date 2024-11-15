// Asegúrate de que `@vimeo/player` esté cargado si no está incluido en el HTML
var player;
var courseId = {{ $courses->id }}; // Asigna el ID del curso desde Blade
var maxAllowedTime = 0; // Almacena el progreso guardado

// Inicializa el reproductor de Vimeo
document.addEventListener("DOMContentLoaded", function() {
    player = new Vimeo.Player('video'); // Crea el reproductor con el id correcto

    // Evento para controlar el progreso del video
    player.on('timeupdate', function(data) {
        console.log(`Reproduciendo en el segundo de prueba: ${Math.floor(data.seconds)}s`);

        // Guarda el progreso si se ha avanzado más allá del progreso guardado
        if (data.seconds > maxAllowedTime) {
            saveProgress(data.seconds);
            maxAllowedTime = data.seconds; // Actualiza el progreso máximo permitido
        }
    });

    // Evento cuando el video llega al final
    player.on('ended', function() {
        console.log('El video ha terminado. Recargando la página en 1 segundo...');
        setTimeout(() => {
            location.reload(); // Recarga la página después de 1 segundo
        }, 1000);
    });
});

function saveProgress(progress) {
    axios.post("{{ route('enrollment.progress') }}", {
        course_id: courseId, // Incluye el ID del curso en el cuerpo de la solicitud
        progress: progress
    }, {
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Incluye el token CSRF para proteger la solicitud
        }
    })
    .then(response => {
        console.log("Progreso guardado:", response.data);
    })
    .catch(error => {
        console.error("Error al guardar el progreso:", error);
    });
}
