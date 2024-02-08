<?php

require_once('Magicien.class.php');
require_once('RoiSorcier.class.php');
require_once('./Personnage.class.php');

class Combat {
    private $tour = 1;

    public function demarrerCombat(Magicien $magicien, RoiSorcier $roiSorcier) {
        echo "Le combat démarre entre {$magicien->getNom()} et {$roiSorcier->getNom()}!<br>";

        // Boucle de combat
        while ($magicien->getVie() > 0 && $roiSorcier->getVie() > 0) {
            // Tour du Magicien
            $this->tourDeCombat($magicien, $roiSorcier);
            $this->afficherTour();

            // Vérifier si le RoiSorcier est vaincu après le tour du Magicien
            if ($roiSorcier->getVie() <= 0) {
                echo "{$magicien->getNom()} remporte le combat!<br>";
                break;
            }

            // Tour du RoiSorcier
            $this->tourDeCombat($roiSorcier, $magicien);
            $this->afficherTour();

            // Vérifier si le Magicien est vaincu après le tour du RoiSorcier
            if ($magicien->getVie() <= 0) {
                echo "{$roiSorcier->getNom()} remporte la victoire!<br>";
                break;
            }

            $this->tour++;
        }
    }

    // private function tourDeCombat($attaquant, $defenseur) {
    //     echo "<br> Tour {$this->tour}: {$attaquant->getNom()} attaque {$defenseur->getNom()}!<br>";

    //     // Possibilité d'esquiver
    //     if (rand(0, 1)) {
    //         echo "{$defenseur->getNom()} esquive l'attaque!<br>";
    //     } else {
    //         // Effectuer une attaque en fonction du type de personnage
    //         if ($attaquant instanceof Magicien) {
    //             $typeAttaque = $attaquant->lanceUnSort($defenseur);
    //         } elseif ($attaquant instanceof RoiSorcier) {
    //             $typeAttaque = $attaquant->attaque($defenseur);
    //         }

    //         // Vérifier si le défenseur est vaincu après l'attaque
    //         if ($defenseur->getVie() <= 0) {
    //             echo "{$defenseur->getNom()} est vaincu!<br>";
    //         } else {
    //             echo "{$defenseur->getNom()} riposte!<br>";
    //             $defenseur->frappe($attaquant, 10); // Exemple de riposte, à adapter selon vos règles
    //         }

    //         // Afficher le type d'attaque
    //         echo "{$attaquant->getNom()} utilise l'attaque de type {$typeAttaque}.<br>";
    //     }
    // }

    private function afficherTour() {
        echo "==============================================================================" . "<br>";
        echo "Fin du Tour {$this->tour}<br>";
        echo "==============================================================================" . "<br>";
    }

    private function tourDeCombat($attaquant, $defenseur) {
        echo "<br> Tour {$this->tour}: {$attaquant->getNom()} attaque {$defenseur->getNom()}!<br>";
    
        // Possibilité d'esquiver
        if (rand(0, 1)) {
            echo "{$defenseur->getNom()} esquive l'attaque!<br>";
        } else {
            // Effectuer une attaque en fonction du type de personnage
            if ($attaquant instanceof Magicien) {
                $typeAttaque = $attaquant->lanceUnSort($defenseur);
            } elseif ($attaquant instanceof RoiSorcier) {
                $typeAttaque = $attaquant->attaque($defenseur);
            }
    
            // Vérifier si le défenseur est vaincu après l'attaque
            if ($defenseur->getVie() <= 0) {
                echo "{$defenseur->getNom()} est vaincu!<br>";
            } else {
                echo "================================================================" . "<br>";
                echo "{$defenseur->getNom()} riposte!<br>";
                echo "================================================================" . "<br>";
                $defenseur->attaquer($attaquant, 10);
            }
    
            // Afficher le type d'attaque
            echo "{$attaquant->getNom()} utilise l'attaque de type {$typeAttaque}.<br>";
        }
    }
    
}

?>
