<?php
    //include('classProducte.php');
    //include('classUsuari.php');

    class Comanda{
        private $id;
        private $numComanda;
        private $idUsuari;
        private $codiProducte;
        public $data;

    public function __construct($id, $numComanda, $idUsuari, $codiProducte, $data){
        $this->id = $id.$idUsuari.strval($numComanda);
        $this->numComanda = $numComanda;
        $this->idUsuari = $idUsuari->getId();
        $this->codiProducte = $codiProducte->getCodi();
        $this->data = $data;
    }

    public function __toString(){
        return $this->id.'|'.$this->numComanda.'|'.$this->idUsuari.'|'.$this->codiProducte.'|'.$this->data;
    }
}
?>