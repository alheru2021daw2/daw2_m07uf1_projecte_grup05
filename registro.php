<?php
    include('session_variables.php');
    if(!isset($_SESSION['user_id']) || $admin){
        if(isset($_POST['full-registro']) && $_POST['nomUsuari'] != null){
            if(strlen($_POST['contrasenya']) < 8){
                $errmessage = '<h3 style="color: red;">La contraseña debe tener almenos 8 carácteres</h3>';
                unset($_POST['full-registro']);
            }else{
                if(usuari_exists($usuaris, $_POST['nomUsuari'])){
                    $errmessage = '<h3 style="color: red;">El nombre de usuario ya existe.</h3>';
                    unset($_POST['full-registro']);
                }else{
                    array_push($usuaris, new Usuari(
                        uniqid(),
                        $_POST['nomUsuari'],
                        $_POST['contrasenya'],
                        $_POST['nomReal'],
                        $_POST['adreca'],
                        $_POST['correu'],
                        $_POST['telefon'],
                        $_POST['visa'],
                        'no'
                    ));
    
                    escriureDades('dades/usuari.txt', $usuaris);
                    unset($_POST);
                    header('location: index.php');
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
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'menu.php';?>
    <main>
        <h1>Registro</h1>
        <hr>
        <form action="registro.php" method="POST">
            <?php if(isset($errmessage)) echo $errmessage;?>
            <fieldset>
                <legend>Usuari</legend>
                Nombre de usuario: <input type="text" name="nomUsuari" required/><br><br>
                Contraseña: <input type="password" name="contrasenya" required/><br><br>
            </fieldset>
            <fieldset>
                <legend>Personal</legend>
                Nombre: <input type="text" name="nomReal" required/><br><br>
                Dirección: <input type="text" name="adreca" required/><br><br>
                Email: <input type="email" name="correu" required/><br><br>
                Teléfono: <input type="tel" name="telefon" required/><br><br>
                Visa: <input type="text" name="visa" maxlength="16" required/><br><br>
            </fieldset>
            <hr>
            <input type="submit" name="full-registro" value="Registrarse"/>
            <input type="reset" value="Restablecer"/>
        </form>
        <p>Si ya tienes cuenta. <a href="login.php">Iniciar sesión</a>.</p>
    </main>
</body>
</html>