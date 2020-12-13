<?php
    include('session_variables.php');
    if(isset($_SESSION['user_id'])){
        if(!$admin){
            header('location: index.php');
        }
    }else{
        header('location: index.php');
    }
    
    if(isset($_POST['full-pForm'])){
        array_push($productes, new Producte(
            uniqid(),
            $_POST['prodNom'],
            $_POST['prodSeccio'],
            str_replace('.', ',', strval($_POST['prodPreu'])),
            $_POST['prodImatge']
        ));
        escriureDades('dades/producte.txt', $productes);
        unset($_POST);
        header('location: g_productes.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de productos</title>
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
                    <th>ID de Usuario</th>
                    <th>Nombre de usuario</th>
                    <th>Nombre completo</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(sizeof($usuaris) > 0){
                        foreach($usuaris as $usuari){
                            echo '<tr>';
                            echo '<td>'.$usuari->getId().'</td>';
                            echo '<td>'.$usuari->nomUsuari.'</td>';
                            echo '<td>'.$usuari->getNomComplet().'</td>';
                            echo '<td>'.$usuari->correu.'</td>';
                            echo '<td>'.$usuari->telefon.'</td>';
                            if($usuari->getAdmin()){
                                echo '<td>Admin</td>';
                            }else{
                                echo '<td>Cliente</td>';
                            }
                            if($_SESSION['user_id'] != $usuari->getId()){
                                echo '<td>';
                                if($usuari->getAdmin()){
                                    echo '<a href="action.php?action=set_admin&userId='.$usuari->getId().'">Revocar privilegios</a><br>';
                                }else{
                                    echo '<a href="action.php?action=set_admin&userId='.$usuari->getId().'">Conceder privilegios</a><br>';
                                }
                                echo '<a href="action.php?action=remove_usuari&userId='.$usuari->getId().'">Eliminar</a>';
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php
            if(isset($errmessage)) echo '<p style="color: red;">'.$errmessage.'</p>';
        ?>
        <p><a href="registro.php">Registrar nuevo usuario</a></p>
    </main>
</body>
</html>