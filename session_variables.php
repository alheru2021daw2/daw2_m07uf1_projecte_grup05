<?php
    include('funciones_importantes.php');
    $usuaris = generarObj('usuari');
    $productes = generarObj('producte');
    $comandes = generarObj('comanda');
    session_start();
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
        $objIndex = cercaUsuariId($usuaris, $id);
        $nombre = $usuaris[$objIndex]->getNomComplet();
        $admin = $usuaris[$objIndex]->getAdmin();
        $message = 'Bienvenido/a '.$nombre;
    }else{
        session_destroy();
    }
?>