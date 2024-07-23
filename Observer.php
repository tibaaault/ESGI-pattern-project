<?php
interface Observer
{
    public function update(Box $box);
}


class BoxUpdate implements Observer
{
    public function update(Box $box)
    {
        echo "La box de " . $box->getName() . " a été mise à jour. Le nombre d'engins dans la box est désormais : " . count($box->getMachine()) . "\n";
    }
}

class BoxAlert implements Observer
{
    public function update(Box $box)
    {
        // Si la box contient 5 engins, vérifier si elle contient tous les types d'engins
        if (count($box->getMachine()) >= 5) {
            $machinesTypes = implode(', ', $box->getMachineInBox());
            if (!$box->boxHasAllTypes()) {
                echo "Alerte: La box de " . $box->getName() . " ne contient pas tous les types d'engins requis.\n";
                echo "Engins présents: " . $machinesTypes . "\n\n";
            } else {
                echo "La box de " . $box->getName() . " contient tous les types d'engins requis.\n";
                echo "Engins présents: " . $machinesTypes . "\n\n";
            }
        }
    }
}
