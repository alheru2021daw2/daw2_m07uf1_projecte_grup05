<?php
    include('session_variables.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once 'menu.php';
    ?>
    <main>
        <?php if(isset($message)) echo '<h1>'.$message.'</h1>';?>
        <h1>Artículos</h1>
        <hr>
        <div class="articulos">
            <?php
                $categoria = Array();
                $equals = false;
                foreach($productes as $producte){
                    foreach($categoria as $valor){
                        $equals = false;
                        if($producte->seccio == $valor){ 
                            $equals = true;
                            break;
                        }
                    }
                    if(!$equals){
                        array_push($categoria, $producte->seccio);
                    }
                }
                foreach($categoria as $valor){
                    echo '<section>';
                    echo '<h2>'.$valor.'</h2>';
                    echo '<hr class="linea2">';
                    foreach($productes as $producte){
                        if($producte->seccio == $valor){
                            echo '<article>';
                            echo '<div class="image-holder">';
                            echo '<img src="'.$producte->imatge.'"/>';
                            echo '</div>';
                            echo '<h3>'.$producte->preu.'</h3>';
                            echo '<p>'.$producte->nom.'</p>';
                            echo '<p><a href="comprar.php?prodCodi='.$producte->getCodi().'">Comprar</a></p>';
                            echo '</article>';
                        }
                    }
                    echo '</section>';
                }
                if(sizeof($productes) < 1){
                    echo '<h1 style="text-align: center;">No hay productos disponibles</h1>';
                }
            ?>
        </div>
    </main>
</body>
</html>