<?php
    include('session_variables.php');
    if(!$admin) header('location: g_comandes.php');
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'menu.php';?>
    <main>
        <h1>Gestión de productos</h1>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>ID del pedido</th>
                        <th>Nº de pedido</th>
                        <th>Nombre del producto</th>
                        <th>Nombre del comprador</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(sizeof($comandes) > 0){
                            foreach($comandes as $comanda){
                                echo '<tr>';
                                echo '<td>'.$comanda->getId().'</td>';
                                echo '<td>'.$comanda->numComanda.'</td>';
                                echo '<td>'.$productes[cercaProducteId($productes, $comanda->codiProducte)]->nom.'</td>';
                                echo '<td>'.$usuaris[cercaUsuariId($usuaris, $comanda->usuari)]->getNomComplet().'</td>';
                                echo '<td>'.$productes[cercaProducteId($productes, $comanda->codiProducte)]->preu.'€</td>';
                                echo '</tr>';
                            }
                        }
                    ?>
                </tbody>
            </table>
    </main>
</body>
</html>