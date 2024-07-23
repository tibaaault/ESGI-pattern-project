<?php


class Box
{
    private $name; //nom de la box 
    private $machine = [];
    private $capacite = 8; //place max

    private $observers = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addMachineToBox(Machine $machine)
    {
        if (count($this->machine) < $this->capacite) {
            $this->machine[] = $machine;
            if (count($this->machine) == 5) {
                $alert = new BoxAlert();
                echo "Observateur 'BoxAlert' ajouté lors de l'ajout du 5ème engin.\n";
                $this->addObserver($alert);
            }
            $this->notifyObservers();
        } else {
            throw new Exception("Erreur, la box de " . $this->name . " est pleine\n\n");
        }
    }

    public function getMachine()
    {
        return $this->machine;
    }

    public function boxHasAllTypes()
    {
        $types = array_map(function ($machine) {
            return $machine->getType();
        }, $this->machine);

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
        $this->observers[] = $observer;
    }

    public function notifyObservers()
    {
        //permet aux observateurs de réagir aux changements
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    // Retourne les engins présent dans la box 
    public function getMachineInBox()
    {
        $types = array_map(function ($machine) {
            return $machine->getType();
        }, $this->machine);

        return $types;
    }
}
