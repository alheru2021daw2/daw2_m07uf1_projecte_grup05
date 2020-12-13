<?php
    include('session_variables.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Perfil</title>
</head>
<body>
    <?php require_once 'menu.php';?>
    <main>
        <h1>Perfil</h1>
        <hr>
        <h2>Datos de sesión</h2>
        <hr class="linea2">
        <p>Nombre de usuario: <?php echo $usuaris[$objIndex]->getNomUsuari();?></p>
        <p>Contraseña: ****</p>
        <h2>Datos personales</h2>
        <hr class="linea2">
        <p>Nombre completo: <?php echo $usuaris[$objIndex]->getNomComplet();?></p>
        <p>Dirección: <?php echo $usuaris[$objIndex]->getAdreca();?></p>
        <h2>Contacto</h2>
        <hr class="linea2">
        <p>E-mail: <?php echo $usuaris[$objIndex]->correu;?></p>
        <p>Telefon: <?php echo $usuaris[$objIndex]->telefon;?></p>
        <h2>Pago y facturación</h2>
        <hr class="linea2">
        <p>Visa: <?php echo $usuaris[$objIndex]->getVisa();?></p>
        <p><a href="modificar_perfil.php">Modificar datos</a></p>
    </main>
</body>
</html>