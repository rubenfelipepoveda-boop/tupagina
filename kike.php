<?php

include "Conexionbd.php";

//condicional para el registro
if (isset($_POST['Registrarse'])) {
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$correo = mysqli_real_escape_string($conn, $_POST['email']);
$contraseña = mysqli_real_escape_string($conn, $_POST['password']);

$consulta = "INSERT INTO usuario (nombre, email, password) VALUES ('$nombre', '$correo', '$contraseña')";
$result = $conn->query($consulta);

//condicional de insercion con la base de datos
if ($result) {
 echo "se realizo correctamente el registro";
} else {
    echo"no se realizo correctamente el registro";
}
}
//logica de inicio de sesion
if (isset($_POST['iniciar'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $process = $conn->prepare("SELECT email FROM usuario WHERE email = ? AND password = ?");
    $process->bind_param("ss", $email, $password);
    $process->execute();
    $result_consul = $process->get_result();

    if ($result_consul->num_rows == 1) {
        // Login correcto
        echo "<script>window.location.href='a.html';</script>";
        exit();
    } else {
        echo "Email o contraseña incorrectos";
    }
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKE</title>
    <style>
        /* Fondo con un GIF */
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: url('https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExOXc5ZW5lbnNlcm9weHFwMTcydzlwZmZldmN0dW1ydzk2YjJlbXd0ZiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/hcmROgfF2ax0c/giphy-downsized-large.gif') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        /* Contenedor central */
        .container {
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        p {
            font-size: 1.5em;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }

        /* Botones */
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            font-size: 1.2em;
            color: white;
            text-decoration: none;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        /* Formulario */
        .form-container {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            display: inline-block;
            text-align: left;
            margin-top: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: rgba(255, 255, 255, 1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenidos a Nike</h1>
        <p>Descubre nuestro mundo del deporte</p>

        <!-- Botones -->
        <a href="#mision" class="button">Misión</a>
        <a href="#vision" class="button">Visión</a>
        <a href="#eslogan" class="button">Eslogan</a>
        <a href="#valores" class="button">Valores</a>
        <a href="#registro" class="button">Registrarse</a>
        <a href="#login" class="button">Iniciar Sesión</a>
    </div>
     <a href="#catalogo" class="button">Catálogo de productos</a>
     </section>


    <!-- Secciones -->
    <section id="mision" class="container">
        <h1>Misión</h1>
        <p>Nuestra misión es llevar inspiración e innovación a todos los atletas del mundo.</p>
    </section>

    <section id="vision" class="container">
        <h1>Visión</h1>
        <p>Hacer todo lo posible para ampliar el potencial humano.</p>
    </section>

    <section id="eslogan" class="container">
        <h1>Eslogan</h1>
        <p>"Just do it (Solo hazlo)."</p>
    </section>

    <section id="valores" class="container">
        <h1>Valores</h1>
        <p>Integridad, Innovación, Trabajo en equipo, Responsabilidad y Pasión.</p>
    </section>

    <!-- Formulario de Registro -->
    <section id="registro" class="container">
        <h1>Registrarse</h1>
        <div class="form-container">
            <form action="kike.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" name="Registrarse">Registrarse</button>
            </form>
        </div>
    </section>

    <!-- Formulario de Inicio de Sesión -->
    <section id="login" class="container">
        <h1>Iniciar Sesión</h1>
        <div class="form-container">
            <form method="POST">
                <label for="email-login">Correo electrónico:</label>
                <input type="email" id="email-login" name="email" required>
                
                <label for="password-login">Contraseña:</label>
                <input type="password" id="password-login" name="password" required>
                
                <button type="submit" name="iniciar">Iniciar Sesión</button>
            </form>
        </div>
    </section>

    <section id="catalogo" class="container">
     <h1>Catálogo de Productos</h1>
    <p>¡Pronto podrás explorar nuestra amplia gama de productos!</p>
     </section>


</body>
</html>