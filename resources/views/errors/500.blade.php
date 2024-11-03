<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 500</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container text-center mt-5">
        <h1>500 - Error Interno del Servidor</h1>
        <p>Lo sentimos, algo salió mal en nuestro servidor.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Volver al inicio</a>
    </div>
</body>
</html>
