<?php

namespace Market\Product;

class Product 
{
    protected string $name;
    protected float $price;
    protected bool $sellingByKg;

    public function __construct(string $name, float $price, bool $sellingByKg) {
        $this->name = $name;
        $this->price = $price;
        $this->sellingByKg = $sellingByKg;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSellingType() {
        return $this->sellingByKg ? 'Sold by kilograms' : 'Sold by a gunny sack';
    }
    

}

?>