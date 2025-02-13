<?php
// Configuración de la base de datos
$servidor = "localhost"; // O la IP de tu servidor MySQL
$usuario = "root"; // Usuario de MySQL
$password = "123456789"; // Contraseña de MySQL
$bd = "emiconsath"; // Nombre de la base de datos

// Conectar a MySQL
$conn = new mysqli($servidor, $usuario, $password, $bd);

// Verificar conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $nombre = $conn->real_escape_string($_POST["UserName"]);
    $correo = $conn->real_escape_string($_POST["UserEmail"]);
    $asunto = $conn->real_escape_string($_POST["subject"]);
    $mensaje = $conn->real_escape_string($_POST["message"]);

    // Insertar en la base de datos
    $sql = "INSERT INTO mensajes (nombre, correo, asunto, mensaje) VALUES ('$nombre', '$correo', '$asunto', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>
