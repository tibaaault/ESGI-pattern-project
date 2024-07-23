<?php
abstract class Machine {
    abstract public function getType();
}

class Pelleteuse extends Machine {
    public function getType() {
        return 'Pelleteuse';
    }
}

class Tractopelle extends Machine {
    public function getType() {
        return 'Tractopelle';
    }
}

class Nacelle extends Machine {
    public function getType() {
        return 'Nacelle';
    }
}

class Bulldozer extends Machine {
    public function getType() {
        return 'Bulldozer';
    }
}

class RouleauCompresseur extends Machine {
    public function getType() {
        return 'Rouleau compresseur';
    }
}

class MachineFactory {
    public static function createMachine($type) {
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
                throw new Exception("Type d'Machine inconnu");
        }
    }
}