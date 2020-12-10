<?php
    class usuari implements Client{
        public $id =uniqid();

        public function __construct($id){
            $this->identificador = $id;
        }
    }
$usuari = new usuari;
function __toString(){
    return $id;
}
?>