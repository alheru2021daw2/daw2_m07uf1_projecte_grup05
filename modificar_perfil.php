<?php
    include('session_variables.php');
    if(isset($_SESSION['user_id'])){
        if(isset($_POST['full-registro']) && $_POST['nomUsuari'] != null){
            if(strlen($_POST['contrasenya']) < 8){
                $errmessage = '<h3 style="color: red;">La contraseña debe tener almenos 8 carácteres</h3>';
                unset($_POST['full-registro']);
            }else{
                if(usuari_exists($usuaris, $_POST['nomUsuari']) && $usuaris[$objIndex]->getNomUsuari() != $_POST['nomUsuari']){
                    $errmessage = '<h3 style="color: red;">El nombre de usuario ya existe.</h3>';
                    unset($_POST['full-registro']);
                }else{
                    $usuaris[$objIndex]->setUsuari(
                        $_POST['nomUsuari'],
                        $_POST['contrasenya'],
                        $_POST['nomReal'],
                        $_POST['adreca'],
                        $_POST['correu'],
                        $_POST['telefon'],
                        $_POST['visa']
                    );
    
                    escriureDades('dades/usuari.txt', $usuaris);
                    unset($_POST['nomUsuari']);
                    unset($_POST['contrasenya']);
                    unset($_POST['nomReal']);
                    unset($_POST['adreca']);
                    unset($_POST['correu']);
                    unset($_POST['telefon']);
                    unset($_POST['full-registro']);
                    header('location: perfil.php');
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
    <title>Modificar perfil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'menu.php';?>
    <main>
        <h1>Modificar datos</h1>
        <hr>
        <form action="modificar_perfil.php" method="POST">
            <?php if(isset($errmessage)) echo $message;?>
            <fieldset>
                <legend>Usuari</legend>
                Nombre de usuario: <input type="text" name="nomUsuari" value="<?php echo $usuaris[$objIndex]->getNomUsuari();?>" required/><br><br>
                Contraseña: <input type="password" name="contrasenya" value="<?php echo $usuaris[$objIndex]->getContrasenya();?>" required/><br><br>
            </fieldset>
            <fieldset>
                <legend>Personal</legend>
                Nombre: <input type="text" name="nomReal" value="<?php echo $usuaris[$objIndex]->getNomComplet();?>" required/><br><br>
                Dirección: <input type="text" name="adreca" value="<?php echo $usuaris[$objIndex]->getAdreca();?>" required/><br><br>
                Email: <input type="email" name="correu" value="<?php echo $usuaris[$objIndex]->correu;?>" required/><br><br>
                Teléfono: <input type="tel" name="telefon" value="<?php echo $usuaris[$objIndex]->telefon;?>" required/><br><br>
                Visa: <input type="text" name="visa" maxlength="16" value="<?php echo $usuaris[$objIndex]->getVisa();?>" required/><br><br>
            </fieldset>
            <hr>
            <input type="submit" name="full-registro" value="Guardar"/>
            <input type="reset" value="Restablecer"/>
        </form>
    </main>
</body>
</html>