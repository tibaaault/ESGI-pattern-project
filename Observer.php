<?php
interface Observer
{
    public function update(Box $box);
}


interface Subject
{
    public function addObserver(Observer $observer);
    public function notifyObservers();
}

class BoxLogger implements Observer
{
    public function update(Box $box)
    {
        echo "La box de " . $box->getName() . " a été mise à jour. Le nombre d'engins dans la box est désormais : " . count($box->getEngins()) . "\n";
    }
}

class BoxAlert implements Observer
{
    public function update(Box $box)
    {
        if (count($box->getEngins()) >= 5) {
            $enginsTypes = implode(', ', $box->getEnginInBox());
            if (!$box->boxHasAllTypes()) {
                echo "Alerte: La box de " . $box->getName() . " ne contient pas tous les types d'engins requis.\n";
                echo "Engins présents: " . $enginsTypes . "\n\n";
            } else {
                echo "Info: La box de " . $box->getName() . " contient tous les types d'engins requis.\n";
                echo "Engins présents: " . $enginsTypes . "\n\n";
            }
        }
    }
}