<?php
    include('session_variables.php');
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    if(!$admin){
        if(isset($_GET['prodCodi'])){
            $fecha = date('Ymd');
            array_push($comandes, new Comanda(
                $fecha.$_SESSION['user_id'].strval(sizeof($comandes)),
                sizeof($comandes), 
                $_SESSION['user_id'], 
                $_GET['prodCodi'], 
                $fecha
            ));
            escriureDades('dades/comanda.txt', $comandes);
            header('location: p_comandes.php');
        }
    }
    header('location: index.php');
?>