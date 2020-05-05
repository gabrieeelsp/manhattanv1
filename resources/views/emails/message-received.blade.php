<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mensaje Recibido</title>
</head>
<body>
    <p>Recibiste un mensaje de : {{ $msg['name'] }} - {{ $msg['email'] }}</p>

    <p><strong>Contenido: </strong> : {{ $msg['message'] }}</p>
</body>
</html>