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
                    <th>Código de producto</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Imágen</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(sizeof($productes) > 0){
                        foreach($productes as $producte){
                            echo '<tr>';
                            echo '<td>'.$producte->getCodi().'</td>';
                            echo '<td>'.$producte->nom.'</td>';
                            echo '<td>'.$producte->seccio.'</td>';
                            echo '<td>'.$producte->preu.'€</td>';
                            echo '<td>';
                            echo '<div class="image-holder">';
                            echo '<img src="'.$producte->imatge.'"/>';
                            echo '</div>';
                            echo '</td>';
                            echo '<td>';
                            echo '<a href="action.php?action=remove_producte&prodCodi='.$producte->getCodi().'">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
        <?php
            if(sizeof($productes) < 1){
                echo '<h1 style="text-align: center;">No hay productos registrados</h1>';
            }
            if(isset($errmessage)) echo '<p style="color: red;">'.$errmessage.'</p>';
        ?>
        <form action="g_productes.php" method="POST">
            <table>
                <thead>
                    <tr>
                        <th>Nombre de producto</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Imagen</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="prodNom" required/></td>
                        <td>
                            <select name="prodSeccio" id="">
                                <option value="Informática">Informática</option>
                                <option value="Moda">Moda</option>
                                <option value="Libros">Libros</option>
                                <option value="Electrodomésticos">Electrodomésticos</option>
                            </select>
                        </td>
                        <td><input type="number" min="0" name="prodPreu" step="any" required/></td>
                        <td><input type="text" name="prodImatge" required/></td>
                        <td><input type="submit" name="full-pForm" value="Añadir"/></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </main>
</body>
</html>