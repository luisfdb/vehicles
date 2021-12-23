<?php
    session_start();
    if(!empty($_SESSION["name"])){
        header('Location: '.'home.php');
    }
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : false;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class = "main-container">
        <div class = "second-container">
            <form method = "post"  action = "validation.php">
                <p>Iniciar sesión</p>
                <input class = "entries" type = "text" placeholder = "Usuario" name = "user">
                <input class = "entries" type = "password" placeholder = "Contraseña" name = "pass">
                <input class = "btn" type = "submit" value = "Ingresar">
                <?php
                    if($error){
                        echo '<p>Usuario o contraseña incorrectos</p>';
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>