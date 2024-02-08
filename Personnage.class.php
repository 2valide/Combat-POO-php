<?php

class Personnage {
    private $nom;
    private $vie = 100;
    private $force;
    private $experience = 0;
    private $degats;
    public $tour = 'joueur1';

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getVie() {
        return $this->vie;
    }

    public function getForce() {
        return $this->force;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function getDegats() {
        return $this->degats;
    }

    public function getTour() {
        return $this->tour;
    }

    // Setters
    protected function setNom($nom) {
        $this->nom = $nom;
    }

    protected function setVie($vie) {
        $this->vie = $vie;
    }

    protected function setForce($force) {
        $this->force = $force;
    }

    protected function setExperience($experience) {
        $this->experience = $experience;
    }

    protected function setDegats($degats) {
        $this->degats = $degats;
    }

    public function setTour($tour) {
        $this->tour = $tour;
    }

    public function __construct($nom, $vie, $force, $experience = 0, $degats = 0) {
        $this->setNom($nom);
        $this->setVie($vie);
        $this->setForce($force);
        $this->setExperience($experience);
        $this->setDegats($degats);
    }

    // Méthodes de frappe
    protected function frappe($cible, $forceFrappe) {
        echo "{$this->nom} lance une attaque de type Magie sur {$cible->getNom()} avec une force de frappe de {$forceFrappe} points. <br>";
        $cible->recoitDegat($this, $forceFrappe);
    }

    // Méthodes de Esquive
    public function esquive() {
        echo "{$this->nom} tente d'esquiver. <br>";
    }

    // Méthodes de dégâts
    public function recoitDegat($adversaire, $forceFrappe) {
        echo "{$this->nom} reçoit {$forceFrappe} points de dégâts de la part de {$adversaire->getNom()}. <br>";
        $this->vie -= $forceFrappe;

        if ($this->vie <= 0) {
            echo "{$this->nom} a été vaincu!<br>";
        }
    }


    public function augmenteExperience() {
        $this->experience += 1;
    }

    public function attaquer($cible, $forceFrappe) {
        $this->frappe($cible, $forceFrappe);
    }

    
}



?>
