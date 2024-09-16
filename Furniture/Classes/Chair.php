<?php

require_once('Furniture.php');
require_once(__DIR__ . '/../Printable.php');


class Chair extends Furniture implements Printable 
{
    public function __construct(int $width, int $length, int $height) {
        parent::__construct($width, $length, $height);
    }

    public function print() {
        echo "<h5 style=\"margin: 0;\">Printed:</h5>" . "<span style=\"color:red;\"> Chair, " . $this->isForSleeping() . ", " . $this->area() . "cm2" . '</span><br>';

    }

    public function sneakPeek() {
        echo "<h5 style=\"margin: 0;\">Sneakpeek:</h5>" . "<span style=\"color:red;\"> Chair" . '</span><br>';

    }

    public function fullInfo() {
        echo "<h5 style=\"margin: 0;\">Full Info:</h5>" . "<span style=\"color:red;\"> Chair, " . $this->isForSleeping() . ", " . $this->area() . "cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm." . '</span><br>';

    }
}

?>