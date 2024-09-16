<?php

require_once('Furniture.php');
require_once(__DIR__ . '/../Printable.php');


class Sofa extends Furniture implements Printable
{
    private int $seats;

    private int $armrests;
    
    private int $length_opened;

    public function __construct(int $width, int $length, int $height) {
        parent::__construct($width, $length, $height);
    }

    public function setSeats(int $seats) {
        $this->seats = $seats;
    }

    public function getSeats() {
        return $this->seats;
    }

    public function setArmrests(int $armrests) {
        $this->armrests = $armrests;
    }

    public function getArmrests() {
        return $this->armrests;
    }

    public function setLengthOpened(int $length_opened) {
        $this->length_opened = $length_opened;
    }

    public function getLengthOpened() {
        return $this->length_opened;
    }

    public function area_opened() {
        if ($this->getIsForSleeping()) {
            return $this->getWidth() * $this->getLengthOpened();
        } else {
            return "This sofa is for sitting only, it has {$this->getArmrests()} armrests and {$this->getSeats()} seats.";
        }
    }

    public function print() {
        echo "<h5 style=\"margin: 0;\">Printed:</h5>" . "<span style=\"color:blue;\"> Sofa, " . $this->isForSleeping() . ", " . $this->area() . "cm2" . '</span><br>';
    }

    public function sneakPeek() {
        echo "<h5 style=\"margin: 0;\">Sneakpeek:</h5>" . "<span style=\"color:blue;\"> Sofa" . '</span><br>';
    }

    public function fullInfo() {
        echo "<h5 style=\"margin: 0;\">Full Info:</h5>" . "<span style=\"color:blue;\"> Sofa, " . $this->isForSleeping() . ", " . $this->area() . "cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm." . '</span><br>';
    }
 }

echo 'Instantiating an object from the class Sofa: *Sitting only* <br>';

$sofa = new Sofa(6, 4, 2);

$sofa->setSeats(3);
$sofa->setArmrests(2);

$sofa->setIsForSeating(true);
$sofa->setIsForSleeping(false);

echo "Area: " . $sofa->area() . '<br>';
echo "Volume: " . $sofa->volume() . '<br>';
echo $sofa->area_opened() . '<br><br>';

echo 'Instantiating an object from the class Sofa: *Sleeping = true* <br>';

$sofa2 = new Sofa(8, 6, 4);

$sofa2->setSeats(4);
$sofa2->setArmrests(2);

$sofa2->setIsForSleeping(true);
$sofa2->setLengthOpened(6);

echo "Area: " . $sofa2->area() . '<br>';
echo "Volume: " . $sofa2->volume() . '<br>';
echo "Area opened: " . $sofa2->area_opened() . '<br><hr>';

?>