<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "nombre_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta SQL para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// Verificar si se encontró un usuario con las credenciales proporcionadas
if ($result->num_rows > 0) {
    // Iniciar sesión y redirigir a la página de inicio
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    header("Location: inicio.php");
} else {
    // Si las credenciales son incorrectas, mostrar un mensaje de error
    echo "Correo electrónico o contraseña incorrectos";
}

$conn->close();
?>
