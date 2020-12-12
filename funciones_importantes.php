<?php
    include('classes/classUsuari.php');
    include('classes/classProducte.php');
    include('classes/classComanda.php');

    function llegirFitxer($fitxer){
        if(file_exists($fitxer)){
            $fp = fopen($fitxer, 'r');
            $linea = Array();
            while(!feof($fp)){
                $campos = explode('|', trim(fgets($fp)));
                if($campos[0] != null) array_push($linea, $campos);
            }
            fclose($fp);

            return $linea;
        }else{
            return null;
        }
    }

    function escriureDades($fitxer, $objArray){
        $fp = fopen($fitxer, 'w');
        foreach($objArray as $linea){
            fwrite($fp, $linea.PHP_EOL);
        }
        fclose($fp);
    }

    function generarObj($type){
        $objArray = Array();
        switch($type){
            case 'usuari': 
                $usuari = llegirFitxer('dades/usuari.txt');
                if($usuari != null){
                    foreach($usuari as $obj){
                        array_push($objArray, new Usuari($obj[0], $obj[1], $obj[2], $obj[3], $obj[4], $obj[5], $obj[6], $obj[7], $obj[8]));
                    } 
                }
                break;
            case 'producte':
                $producte = llegirFitxer('dades/producte.txt');
                if($producte != null){
                    foreach($producte as $obj){
                        array_push($objArray, new Producte($obj[0], $obj[1], $obj[2], $obj[3], $obj[4]));
                    }
                }
                break;
            case 'comanda':
                $comanda = llegirFitxer('dades/comandes.txt');
                if($comanda != null){
                    foreach($comanda as $obj){
                        array_push($objArray, new Comanda($obj[0], $obj[1], $obj[2], $obj[3], $obj[4]));
                    }
                }
                break;
        }

        return $objArray;
    }

    function usuari_exists($objArray, $nomUsuari){
        foreach($objArray as $obj){
            if($obj->uniqueUsername($nomUsuari)) return true;
        }
    }
?>