<?php
class producte{
    public $seccio;
    public $nom;
    public $codi;
    public $imatge;
    public $preu;

    public function __construct(){

        $this->seccio = $s;
        $this->nom = $n;
        $this->codi = $c;
        $this->imatge = $i;
        $this->preu = $p;
    }
}
$producte = new producte();
function __toString(){
    return $s.','$n.','$c.','$i.','$p.',';
}
?>