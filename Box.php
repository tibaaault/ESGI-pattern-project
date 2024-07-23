<?php


class Box
{
    private $name;
    private $engins = [];
    private $capacite = 8;

    private $observers = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function addEnginToBox(Engin $engin)
    {
        if (count($this->engins) < $this->capacite) {
            $this->engins[] = $engin;
            if (count($this->engins) == 5) {
                $alert = new BoxAlert();
                echo "Observateur 'BoxAlert' ajouté lors de l'ajout du 5ème engin.\n";
                $this->addObserver($alert);
            }
            $this->notifyObservers();
        } else {
            throw new Exception("La box de " . $this->name . " est pleine");
        }
    }

    public function getEngins()
    {
        return $this->engins;
    }

    public function boxHasAllTypes()
    {
        $types = array_map(function ($engin) {
            return $engin->getType();
        }, $this->engins);

        $required = ['Pelleteuse', 'Tractopelle', 'Nacelle', 'Bulldozer', 'Rouleau compresseur'];
        foreach ($required as $type) {
            if (!in_array($type, $types)) {
                return false;
            }
        }
        return true;
    }

    public function addObserver(Observer $observer)
    {
        //ajouter un observer à la liste des observateurs
        $this->observers[] = $observer;
    }

    public function notifyObservers()
    {
        //permet aux observateurs de réagir aux changements
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function getEnginInBox() {
        $types = array_map(function($engin) {
            return $engin->getType();
        }, $this->engins);

        return array_unique($types);
    }
}
