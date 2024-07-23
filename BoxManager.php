<?php
class BoxManager {
    private $boxes = [];

    public function addBox($box) {
        $this->boxes[] = $box;
    }

    public function getBoxes() {
        return $this->boxes;
    }
}