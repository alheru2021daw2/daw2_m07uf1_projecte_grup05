<?php
    include('funciones_importantes.php');
    $usuaris = generarObj('usuari');
    session_start();
    if(!isset($_SESSION['user_id'])){
        if(isset($_POST['loginHandler'])){
            if(isset($_POST['logNomUsuari']) && isset($_POST['logContrasenya'])){
                $uIndex = cercaUsuari($usuaris, $_POST['logNomUsuari']);
                if($uIndex !== null){
                    $contrasenya = $usuaris[$uIndex]->getContrasenya();
                    if($contrasenya == $_POST['logContrasenya']){
                        session_start();
                        $_SESSION['user_id'] = $usuaris[$uIndex]->getId();
                        unset($usuaris);
                        unset($contrasenya);
                        unset($_POST['loginHandler']);
                        unset($_POST['logNomUsuari']);
                        unset($_POST['logContrasenya']);
                        header('location: index.php');
                    }else{
                        $message = 'Contraseña incorrecta';
                        unset($contrasenya);
                        unset($_POST['loginHandler']);
                        unset($_POST['logNomUsuari']);
                        unset($_POST['logContrasenya']);
                    }
                }else{
                    $message = 'Usuario no existe';
                    unset($_POST['loginHandler']);
                    unset($_POST['logNomUsuari']);
                    unset($_POST['logContrasenya']);
                }
            }
        }
    }else{
        header('location: index.php');
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'menu.php';?>
    <main>
        <h1>Inicio de sesión</h1>
        <?php if(isset($message)) echo '<h3 style="color: red;">'.$message.'</h3>';?>
        <form action="login.php" method="post">
            Nombre de usuario: <input type="text" name="logNomUsuari"/><br><br>
            Contraseña: <input type="password" name="logContrasenya"/>
            <hr>
            <input type="submit" value="Iniciar sesión" name="loginHandler"/>
        </form>
        <p>Si no tienes una cuenta, <a href="registro.php">registrate</a>.</p>
    </main>
</body>
</html>