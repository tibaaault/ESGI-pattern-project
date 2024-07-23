<?php
require_once 'Factory.php';
require_once 'Observer.php';
require_once 'Box.php';
require_once 'BoxManager.php';

try {
    // Creer une Box et ajout d'un observateur
    $boxLille = new Box('Lille');
    $boxLesquin = new Box('Lesquin');
    $logger = new BoxUpdate();

    $boxLille->addObserver($logger);
    $boxLesquin->addObserver($logger);

    try {

        $boxLille->addEnginToBox(EnginFactory::createEngin('Pelleteuse')); // Nombre d'engin 1, pas de notif sur tous les types
        $boxLille->addEnginToBox(EnginFactory::createEngin('Tractopelle')); // Nombre d'engin 2, pas de notif sur tous les types
        $boxLille->addEnginToBox(EnginFactory::createEngin('Nacelle')); // Nombre d'engin 3, pas de notif sur tous les types
        $boxLille->addEnginToBox(EnginFactory::createEngin('Bulldozer')); // Nombre d'engin 4, pas de notif sur tous les types
        //l'ajout de l'observer ce fera à ce moment là 
        $boxLille->addEnginToBox(EnginFactory::createEngin('Bulldozer')); // Nombre d'engin 5, ajout de l'observer, tous les types: non
        $boxLille->addEnginToBox(EnginFactory::createEngin('Nacelle')); // Nombre d'engin 6, tous les types: non
        //la box contiendra tous les types d'engins à partir de ce 7ème engin
        $boxLille->addEnginToBox(EnginFactory::createEngin('Pelleteuse')); // Nombre d'engin 7, tous les types: oui
        $boxLille->addEnginToBox(EnginFactory::createEngin('Nacelle')); // Nombre d'engin 8, tous les types: oui
        $boxLille->addEnginToBox(EnginFactory::createEngin('Nacelle')); // Exception: La box est pleine

    } catch (Exception $e) {
        echo 'Erreur dans la box Lille: ' . $e->getMessage() . "\n";
    }

    try {
        $boxLesquin->addEnginToBox(EnginFactory::createEngin('Pelleteuse')); // Nombre d'engin 1, pas de notif sur tous les types
        $boxLesquin->addEnginToBox(EnginFactory::createEngin('Tractopelle')); // Nombre d'engin 2, pas de notif sur tous les types
        $boxLesquin->addEnginToBox(EnginFactory::createEngin('Nacelle')); // Nombre d'engin 3, pas de notif sur tous les types
        $boxLesquin->addEnginToBox(EnginFactory::createEngin('Bulldozer')); // Nombre d'engin 4, pas de notif sur tous les types
        $boxLesquin->addEnginToBox(EnginFactory::createEngin('Rouleau compresseur')); // Nombre d'engin 5, ajout de l'observer, tous les types: oui

    } catch (Exception $e) {
        echo 'Erreur dans la box Lille: ' . $e->getMessage() . "\n";
    }

    $boxManager = new BoxManager();
    $boxManager->addBox($boxLille);
    $boxManager->addBox($boxLesquin);


    foreach ($boxManager->getBoxes() as $box) {
        echo "La box " . $box->getName() . " contient tous les types d'engins : " . ($box->boxHasAllTypes() ? "Oui" : "Non") . "\n";
    }
} catch (Exception $e) {
    echo 'Erreur: ' . $e->getMessage();
}
