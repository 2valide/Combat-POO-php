<?php

require_once('Magicien.class.php');
require_once('RoiSorcier.class.php');
require_once('./Personnage.class.php');

class Combat {
    public function demarrerCombat(Magicien $magicien, RoiSorcier $roiSorcier) {
        echo "Le combat démarre entre {$magicien->getNom()} et {$roiSorcier->getNom()}!<br>";

        // Boucle de combat
        while ($magicien->getVie() > 0 && $roiSorcier->getVie() > 0) {
            // Tour du Magicien
            $this->tourDeCombat($magicien, $roiSorcier);

            // Vérifier si le RoiSorcier est vaincu après le tour du Magicien
            if ($roiSorcier->getVie() <= 0) {
                echo "{$magicien->getNom()} remporte la victoire!<br>";
                break;
            }

            // Tour du RoiSorcier
            $this->tourDeCombat($roiSorcier, $magicien);

            // Vérifier si le Magicien est vaincu après le tour du RoiSorcier
            if ($magicien->getVie() <= 0) {
                echo "{$roiSorcier->getNom()} remporte la victoire!<br>";
                break;
            }
        }
    }

    private function tourDeCombat($attaquant, $defenseur) {
        echo "<br> {$attaquant->getNom()} attaque {$defenseur->getNom()}!<br>";
        $forceFrappe = $attaquant->getForce() + $attaquant->getExperience();
        $defenseur->recoitDegat($attaquant, $forceFrappe);
        $attaquant->augmenteExperience();
        $this->afficherPointsDeVie($defenseur);
        $this->changerTour($attaquant, $defenseur);
    }

    private function afficherPointsDeVie($personnage) {
        echo "{$personnage->getNom()} a maintenant {$personnage->getVie()} points de vie.<br>";
    }

    private function changerTour($attaquant, $defenseur) {
        $attaquant->setTour($defenseur->getNom());
        $defenseur->setTour($attaquant->getNom());
    }


}

?>
