<?php
    include('session_variables.php');
    if($admin) header('location: g_comandes.php');
    
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
                        <th>Nº de pedido</th>
                        <th>Nombre del producto</th>
                        <th>Importe</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(sizeof($comandes) > 0){
                            foreach($comandes as $comanda){
                                if($comanda->usuari == $_SESSION['user_id']){
                                    echo '<tr>';
                                    echo '<td>'.$comanda->numComanda.'</td>';
                                    echo '<td>'.$productes[cercaProducteId($productes, $comanda->codiProducte)]->nom.'</td>';
                                    echo '<td>'.$productes[cercaProducteId($productes, $comanda->codiProducte)]->preu.'€</td>';
                                    echo '<td><a href="action.php?action=cancel_comanda&comandaId='.$comanda->getId().'">Cancelar pedido</a></td>';
                                    echo '</tr>';
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
    </main>
</body>
</html>