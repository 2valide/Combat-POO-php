<?php

require_once('Personnage.class.php');

class RoiSorcier extends Personnage {
    const FORCE_FRAPPE_1 = 5;
    const FORCE_FRAPPE_2 = 20;

    public function __construct($nom, $vie, $force, $experience = 0, $degats = 0) {
        parent::__construct($nom, $vie, $force, $experience, $degats);
    }

    public function frappeAvecSonEpee(Personnage $adversaire) {
        $forceFrappe = self::FORCE_FRAPPE_1;
        echo "{$this->getNom()} attaque {$adversaire->getNom()} avec son épée, infligeant {$forceFrappe} de dégâts. <br>";
        $adversaire->recoitDegat($this, $forceFrappe);
    }

    public function attaqueAvecSonNazgul(Personnage $adversaire) {
        $forceFrappe = self::FORCE_FRAPPE_2;
        echo "{$this->getNom()} attaque {$adversaire->getNom()} avec son Nazgûl, infligeant {$forceFrappe} de dégâts.<br>";
        $adversaire->recoitDegat($this, $forceFrappe);
    }

    public function attaque(Personnage $adversaire) {
        $randomAttack = rand(1, 2);

        switch ($randomAttack) {
            case 1:
                $this->frappeAvecSonEpee($adversaire);
                break;
            case 2:
                $this->attaqueAvecSonNazgul($adversaire);
                break;
        }
    }
}

?>
