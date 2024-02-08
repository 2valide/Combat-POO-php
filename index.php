<link rel="stylesheet" href="style.css">


<?php
require_once('Personnage.class.php');
require_once('Magicien.class.php');
require_once('RoiSorcier.class.php');
require_once('Combat.class.php');


$magicienBlanc = new Magicien("Gandalf", 150, 20);
$roiSorcier = new RoiSorcier("Le Roi Sorcier", 200, 25);

$combat = new Combat();

$combat->demarrerCombat($magicienBlanc, $roiSorcier);


?>
