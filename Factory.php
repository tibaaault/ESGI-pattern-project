<?php
abstract class Engin {
    abstract public function getType();
}

class Pelleteuse extends Engin {
    public function getType() {
        return 'Pelleteuse';
    }
}

class Tractopelle extends Engin {
    public function getType() {
        return 'Tractopelle';
    }
}

class Nacelle extends Engin {
    public function getType() {
        return 'Nacelle';
    }
}

class Bulldozer extends Engin {
    public function getType() {
        return 'Bulldozer';
    }
}

class RouleauCompresseur extends Engin {
    public function getType() {
        return 'Rouleau compresseur';
    }
}

class EnginFactory {
    public static function createEngin($type) {
        switch ($type) {
            case 'Pelleteuse':
                return new Pelleteuse();
            case 'Tractopelle':
                return new Tractopelle();
            case 'Nacelle':
                return new Nacelle();
            case 'Bulldozer':
                return new Bulldozer();
            case 'Rouleau compresseur':
                return new RouleauCompresseur();
            default:
                throw new Exception("Type d'engin inconnu");
        }
    }
}