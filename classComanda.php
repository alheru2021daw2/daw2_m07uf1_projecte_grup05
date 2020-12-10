<?php
    class Comanda extends Usuari{

        public $data;
        public $identificador;
        public $numCom;
        
    }

    public function __construct(){
        $this->data = $d;
        $this->identificador = $id;
        $this->numCom = $nc;
    }
$comanda = new comanda;
function __toString(){
    return $d.','$;
 }

?>