<?php
class producte{
    public $seccio;
    public $nom;
    public $codi=uniqid();
    public $imatge;
    public $preu;

    public function __construct($s,$n,$c,$i,$p){

        $this->seccio = $s;
        $this->nom = $n;
        $this->imatge = $i;
        $this->preu = $p;
    }
}
$producte = new producte();
function __toString(){
    return $seccio.','.$nom.','.$codi.','.$imatge.','.$preu.',';
}
?>