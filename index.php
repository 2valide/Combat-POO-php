<link rel="stylesheet" href="style.css">


<?php
require_once('Personnage.class.php');
require_once('Magicien.class.php');
require_once('RoiSorcier.class.php');
require_once('Combat.class.php');

// Création des combattants
$magicienBlanc = new Magicien("Gandalf", 150, 20);
$roiSorcier = new RoiSorcier("Le Roi Sorcier", 200, 25);

// Création de l'objet Combat
$combat = new Combat();

// Démarrage du combat
$combat->demarrerCombat($magicienBlanc, $roiSorcier);
?>
