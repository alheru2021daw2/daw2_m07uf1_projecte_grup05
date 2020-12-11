<?php
    include('classes/classUsuari.php');
    include('classes/classProducte.php');
    include('classes/classComanda.php');

    function llegirFitxer($fitxer){
        $fp = fopen($fitxer, 'r');
        $linea = Array();
        while(!feof($fp)){
            if(fgets($fp) != null){
                array_push($linea, explode(',', trim(fgets($fp))));
            }else{
                break;
            }
        }
        fclose($fp);

        return $linea;
    }

    function escriureDades($fitxer, $objArray){
        $fp = fopen($fitxer, 'w');
        foreach($objArray as $linea){
            fwrite($fp, $linea.PHP_EOL);
        }
        fclose($fp);
    }

?>