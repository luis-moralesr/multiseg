var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
var courseId = {{ $courses->id }}; // Asigna el ID del curso desde Blade
var maxAllowedTime = 0; // Almacena el progreso guardado

// Obtiene el progreso del video al cargar la página
fetch(`{{ route('enrollment.getProgress', ['id' => $courses->id]) }}`)
    .then(response => response.json())
    .then(data => {
        maxAllowedTime = data.progress; // Establece el progreso máximo permitido
    })
    .catch(error => {
        console.error("Error al obtener el progreso:", error);
    });

function onYouTubeIframeAPIReady() {
    player = new YT.Player('video', {
        playerVars: {
            'rel': 0,
            'controls': 0,
            'showinfo': 0
        },
        events: {
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
        // Inicia el intervalo de verificación solo si el video está en reproducción
        checkProgressInterval = setInterval(() => {
            const currentTime = player.getCurrentTime();
            console.log(`Reproduciendo en el segundo: ${Math.floor(currentTime)}s`);
        }, 1000);

    } else if (event.data == YT.PlayerState.PAUSED) {
        clearInterval(checkProgressInterval);
        const currentTime = player.getCurrentTime();
        console.log(`El video está en pausa en el segundo: ${Math.floor(currentTime)}s`);

        // Solo guarda el progreso si se ha avanzado más allá del progreso guardado
        if (currentTime > maxAllowedTime) {
            saveProgress(currentTime);
            maxAllowedTime = currentTime; // Actualiza el progreso máximo permitido
        }
    } else if (event.data == YT.PlayerState.ENDED) {
        clearInterval(checkProgressInterval);
        console.log('El video ha terminado. Recargando la página en 1 segundo...');
        setTimeout(() => {
            location.reload(); // Recarga la página después de 1 segundo
        }, 1000);
    }
}

function saveProgress(progress) {
    fetch("{{ route('enrollment.progress') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}" // Incluye el token CSRF para proteger la solicitud
        },
        body: JSON.stringify({
            course_id: courseId, // Incluye el ID del curso en el cuerpo de la solicitud
            progress: progress
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log("Progreso guardado:", data);
    })
    .catch(error => {
        console.error("Error al guardar el progreso:", error);
    });
}
