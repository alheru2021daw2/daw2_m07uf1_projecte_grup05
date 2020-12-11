<?php
    include('classComanda.php');
    include('classProducte.php');

    class Usuari{
        private $id;
        public $nomUsuari;
        private $contrasenya;
        private $nomComplet;
        private $adreca;
        public $correu;
        public $telefon;
        public $visa;

        public function __construct($nomUsuari, $contrasenya, $nomComplet, $adreca, $correu, $telefon, $visa){
            $this->id = uniqid();
            $this->nomUsuari = $nomUsuari;
            $this->contrasenya = $contrasenya;
            $this->nomComplet = $nomComplet;
            $this->adreca = $adreca;
            $this->correu = $correu;
            $this->telefon = $telefon;
            $this->visa = $visa;
        }

        public function getId(){
            return $this->id;
        }

        public function getContrasenya(){
            return $this->contrasenya;
        }

        public function getNomComplet(){
            return $this->nomComplet;
        }

        public function getAdreca(){
            return $this->adreca;
        }

        public function setnomUsuari($nomUsuari){
            $this->$nomUsuari = $nomUsuari;
        }

        public function setContrasenya($contrasenya){
            $this->contrasenya = $contrasenya;
        }

        public function setNomComplet($nomComplet){
            $this->nomComplet = $nomComplet;
        }

        public function __toString(){
            $string = $this->nomComplet.','.$this->adreca.','.$this->correu.','.$this->telefon.','.$this->visa;
            return $this->id.','.$this->nomUsuari.','.$this->contrasenya.','.$string;
        }

    }

?>