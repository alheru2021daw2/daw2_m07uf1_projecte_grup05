<?php
    include('classProducte.php');
    include('classUsuari.php');

    class Comanda{
        private $id;
        private $numComanda;
        private $idUsuari;
        private $codiProducte;

    public function __construct($id, $idUsuari, $codiProducte){
        $this->id = uniqid();
        $this->idUsuari = $idUsuari->getId();
        $this->codiProducte = $codiProducte->getCodi();
    }

    public function __toString(){
        return $this->id.','.$this->idUsuari.','.$this->codiProducte;
    }
}
?>