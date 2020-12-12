<?php
    //include('classComanda.php');
    //include('classUsuari.php');

    class Producte{
        public $seccio;
        public $nom;
        private $codi;
        public $imatge;
        public $preu;

        public function __construct($s,$n,$c,$i,$p){
            $this->seccio = $s;
            $this->nom = $n;
            $this->codi = $c;
            $this->imatge = $i;
            $this->preu = $p;
        }

        /*function getCodi(){
            return $this->codi;
        }*/

        public function __toString(){
            return $this->seccio.'|'.$this->nom.'|'.$this->codi.'|'.$this->imatge.'|'.$this->preu;
        }
    }

?>