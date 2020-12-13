<?php
    //include('classComanda.php');
    //include('classUsuari.php');

    class Producte{
        private $codi;
        public $nom;
        public $seccio;
        public $preu;
        public $imatge;

        public function __construct($c,$n,$s,$p,$i){
            $this->seccio = $s;
            $this->nom = $n;
            $this->codi = $c;
            $this->imatge = $i;
            $this->preu = $p;
        }

        function getCodi(){
            return $this->codi;
        }

        function setCodi($codi){
            $this->codi = $codi;
        }

        public function __toString(){
            return $this->codi.'|'.$this->nom.'|'.$this->seccio.'|'.$this->preu.'|'.$this->imatge;
        }
    }

?>