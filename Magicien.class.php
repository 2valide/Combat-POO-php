<?php
require_once ('Personnage.class.php');

class Magicien extends Personnage {
    const FORCE_FRAPPE_1 = 10;
    const FORCE_FRAPPE_2 = 15;

    public function __construct($nom, $vie, $force, $experience = 0, $degats = 0) {
        parent::__construct($nom, $vie, $force, $experience, $degats);
    }

    public function lanceUnSort(Personnage $adversaire) {
        $this->attaque($adversaire, 'Sort');
    }

    public function lanceUnRayonDeLumiereSombre(Personnage $adversaire) {
        $this->attaque($adversaire, 'Rayon de Lumière Sombre');
    }

    public function attaque(Personnage $adversaire, $typeAttaque) {
        $randomAttack = rand(1, 2);

        switch ($randomAttack) {
            case 1:
                $this->frappe($adversaire, self::FORCE_FRAPPE_1, $typeAttaque);
                break;
            case 2:
                $this->frappe($adversaire, self::FORCE_FRAPPE_2, $typeAttaque);
                break;
        }
    }

    protected function frappe($cible, $forceFrappe) {
        echo "{$this->getNom()} lance une attaque de type Magie sur {$cible->getNom()} avec une force de frappe de {$forceFrappe}. <br>";
        $cible->recoitDegat($this, $forceFrappe);
    }

    public function augmenteExperience() {
        parent::augmenteExperience();
    }

    
    
}

?>
