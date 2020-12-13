<?php
    //include('classProducte.php');
    //include('classUsuari.php');

    class Comanda{
        private $id;
        public $numComanda;
        public $usuari;
        public $codiProducte;
        public $data;

    public function __construct($id, $numComanda, $usuari, $codiProducte, $data){
        $this->id = $id;
        $this->numComanda = $numComanda;
        $this->usuari = $usuari;
        $this->codiProducte = $codiProducte;
        $this->data = $data;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function __toString(){
        return $this->id.'|'.$this->numComanda.'|'.$this->usuari.'|'.$this->codiProducte.'|'.$this->data;
    }
}
?>