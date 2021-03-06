<?php
    //include('classComanda.php');
    //include('classProducte.php');

    class Usuari{
        private $id;
        public $nomUsuari;
        private $contrasenya;
        private $nomComplet;
        private $adreca;
        public $correu;
        public $telefon;
        private $visa;
        private $admin;

        public function __construct($id, $nomUsuari, $contrasenya, $nomComplet, $adreca, $correu, $telefon, $visa, $admin){
            $this->id = $id;
            $this->nomUsuari = $nomUsuari;
            $this->contrasenya = $contrasenya;
            $this->nomComplet = $nomComplet;
            $this->adreca = $adreca;
            $this->correu = $correu;
            $this->telefon = $telefon;
            $this->visa = $visa;
            $this->admin = $admin;
        }

        public function getAdmin(){
            if($this->admin == 'si'){
                return true;
            }else if($this->admin == 'no'){
                return false;
            }
        }

        public function getId(){
            return $this->id;
        }

        public function getContrasenya(){
            return $this->contrasenya;
        }

        public function getNomUsuari(){
            return $this->nomUsuari;
        }

        public function getNomComplet(){
            return $this->nomComplet;
        }

        public function getAdreca(){
            return $this->adreca;
        }

        public function getVisa(){
            return $this->visa;
        }

        public function setUsuari($nomUsuari, $contrasenya, $nomComplet, $adreca, $correu, $telefon, $visa){
            $this->nomUsuari = $nomUsuari;
            $this->contrasenya = $contrasenya;
            $this->nomComplet = $nomComplet;
            $this->adreca = $adreca;
            $this->correu = $correu;
            $this->telefon = $telefon;
            $this->visa = $visa;
        }

        public function setAdmin($admin){
            if($admin == true){
                $this->admin = 'si';
            }else if($admin == false){
                $this->admin = 'no';
            }
        }

        public function uniqueUsername($nomUsuari){
            if($this->nomUsuari == $nomUsuari){
                return true;
            }else{
                return false;
            }
        }

        public function __toString(){
            $string = $this->nomComplet.'|'.$this->adreca.'|'.$this->correu.'|'.$this->telefon.'|'.$this->visa;
            return $this->id.'|'.$this->nomUsuari.'|'.$this->contrasenya.'|'.$string.'|'.$this->admin;
        }

    }

?>