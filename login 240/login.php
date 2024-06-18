<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Conectar a la base de datos
    $servername = "localhost"; // Cambia esto si tu servidor de base de datos no está en localhost
    $username = "root"; // Tu nombre de usuario de MySQL
    $password = ""; // Tu contraseña de MySQL
    $dbname = "login_db"; // El nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si se intenta acceder a este script sin enviar el formulario, redirigir al formulario de inicio de sesión
    header("Location: login.html");
    exit();
}
?>
