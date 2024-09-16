<?php

class Furniture 
{
    private int $width;

    private int $length;
    
    private int $height;

    private $is_for_seating;
    
    private $is_for_sleeping;

    public function __construct(int $width, int $length, int $height) {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function SetIsForSeating($is_for_seating) {
        $this->is_for_seating = $is_for_seating;
    }

    public function getIsForSeating() {
        return $this->is_for_seating;
    }

    public function setIsForSleeping($is_for_sleeping) {
        $this->is_for_sleeping = $is_for_sleeping;
    }

    public function getIsForSleeping() {
        return $this->is_for_sleeping;
    }

    public function area() {
        return $this->width * $this->length;
    }

    public function volume() {
        return $this->area() * $this->height;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getLength() {
        return $this->length;
    }

    public function getHeight() {
        return $this->height;
    }

    public function isForSleeping() {
        return $this->is_for_sleeping ? "sleeping" : "sitting-only";
    }
}

// ● Instantiate an object from the class Furniture and call all the methods.

echo 'Instantiating an object from the class Furniture: <br>';

$furniture = new Furniture(4, 5, 3);

$furniture->SetIsForSeating(true);
$furniture->SetIsForSleeping(false);

echo "Area: " . $furniture->area() . ' ';
echo "Volume: " . $furniture->volume() . '<br>';
echo "Is for seating: " . ($furniture->getIsForSeating() ? "Yes" : "No") . '<br>';
echo "Is for sleeping: " . ($furniture->getIsForSleeping() ? "Yes" : "No"). '<br><hr>';

?>