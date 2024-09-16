<?php

namespace Market\Cart;

require_once('Product.php');
use Market\Product\Product as Product;

class Cart
{

    private array $cartItems = [];

    public function addToCart($item) {
        return $this->cartItems[] = $item;
    }

    public function printReceipt() {
        if (!empty($this->cartItems)) {
            $totalPrice = 0;

            foreach ($this->cartItems as $item) {
                echo $item['item']->getName() . ' | ' . $item['item']->getSellingType() . ' | ' . 'total= ' . $item['item']->getPrice() * $item['amount'] . ' denari ' . '<br>';
                $totalPrice += $item['item']->getPrice() * $item['amount'];
            }
            echo "<hr> Final price amount: $totalPrice denari.";
        } else {
            echo "Your cart is empty";
            return;
        } 
    }

}

?>