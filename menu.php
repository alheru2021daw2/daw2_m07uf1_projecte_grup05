<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <?php
            if(isset($_SESSION['user_id'])){
                if($admin){
                    echo '<li><a href="g_usuaris.php">Gestión de usuarios</a></li>';
                    echo '<li><a href="g_productes.php">Gestión de productos</a></li>';
                    echo '<li><a href="g_comandes.php">Gestión de pedidos</a></li>';
                }else{
                    echo '<li><a href="p_comandes.php">Mis pedidos</a></li>';
                }
                echo '<li><a href="perfil.php">';
                echo $nombre;
                if($admin) echo ' (Admin)';
                echo '</a></li>';
                echo '<li><a href="logout.php">Cerrar sesión</a></li>';
            }else{
                echo '<li><a href="login.php">Iniciar sesión</a></li>';
                echo '<li><a href="registro.php">Registrarse</a></li>';
            }
        ?>
    </ul>
</nav>