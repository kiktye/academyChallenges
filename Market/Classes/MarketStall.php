<?php

namespace Market\MarketStall;

require_once('Product.php');
use Market\Product\Product as Product;

class MarketStall
{
    public array $products;
    
    public function __construct(array $products) {
        foreach ($products as $product) {
            $this->products[$product->getName()] = $product;
        }
    }

    public function addProductToMarket($product) {
        $this->products[$product->getName()] = $product;
    }

    public function getItem($itemName, $amount) {
        if (array_key_exists($itemName, $this->products)) {
            $item = $this->products[$itemName];
            return ['amount' => $amount, 'item' => $item];
        } else {
            return false;
        }
    }
}

?>