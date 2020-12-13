<?php
    include('session_variables.php');
    if(isset($_GET['action'])){
        if($admin){
            switch($_GET['action']){
                case 'remove_producte': 
                    if(isset($_GET['prodCodi'])){
                        if(cercaProducteId($productes, $_GET['prodCodi']) !== null){
                            $prodObjIndex = cercaProducteId($productes, $_GET['prodCodi']);
                            unset($productes[$prodObjIndex]);
                            escriureDades('dades/producte.txt', $productes);
                        }else{
                            header('location: g_productes.php');
                        }
                    }
                    header('location: g_productes.php');
                    break;
                case 'remove_usuari': 
                    if(isset($_GET['userId'])){
                        if(cercaUsuariId($usuaris, $_GET['userId']) !== null){
                            $userObjIndex = cercaUsuariId($usuaris, $_GET['userId']);
                            unset($usuaris[$userObjIndex]);
                            escriureDades('dades/usuari.txt', $usuaris);
                        }else{
                            header('location: g_usuaris.php');
                        }
                    }
                    header('location: g_usuaris.php');
                    break;
                case 'set_admin': 
                    if(isset($_GET['userId'])){
                        if(cercaUsuariId($usuaris, $_GET['userId']) !== null){
                            $userObjIndex = cercaUsuariId($usuaris, $_GET['userId']);
                            if($usuaris[$userObjIndex]->getAdmin()){
                                $usuaris[$userObjIndex]->setAdmin(false);
                            }else{
                                $usuaris[$userObjIndex]->setAdmin(true);
                            }
                            escriureDades('dades/usuari.txt', $usuaris);
                        }else{
                            header('location: g_usuaris.php');
                        }
                    }
                    header('location: g_usuaris.php');
                    break;
            }
        }else if(isset($_SESSION['user_id'])){
            if($_GET['action'] == 'cancel_comanda'){
                if(cercaComandaId($comandes, $_GET['comandaId']) !== null){
                    $comIndex = cercaComandaId($comandes, $_GET['comandaId']);
                    unset($comandes[$comIndex]);
                    escriureDades('dades/comanda.txt', $comandes);
                    header('location: p_comandes.php');
                }else{
                    header('location: p_comandes.php');
                }
            }else{
                header('location: p_comandes.php');
            }
        }else{
            header('location: index.php');
        }
    }else{
        header('location: index.php');
    }
?>