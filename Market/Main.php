<?php

require_once('./Classes/Product.php');
require_once('./Classes/MarketStall.php');
require_once('./Classes/Cart.php');

use Market\Product\Product as Product;
use Market\MarketStall\MarketStall as MarketStall;
use Market\Cart\Cart as Cart;

// Create objects from the class Product, each representing a different type of product:
// new Product('Orange', 35, true);
// new Product('Potato', 240, false);
// new Product('Nuts', 850, true);
// new Product('Kiwi', 670, false);
// new Product('Pepper', 330, true);
// new Product('Raspberry', 555, false)

$product1 = new Product('Orange', 35, true);
$product2 = new Product('Potato', 240, false);
$product3 = new Product('Nuts', 850, true);
$product4 = new Product('Kiwi', 670, false);
$product5 = new Product('Pepper', 330, true);
$product6 = new Product('Raspberry', 555, false);

$marketStall1 = new MarketStall([$product1, $product2, $product3]); 
$marketStall2 = new MarketStall([$product4, $product5, $product6]);

$cart = new Cart();
$cart->addToCart($marketStall1->getItem('Orange', 6));
$cart->addToCart($marketStall1->getItem('Potato', 10));
$cart->addToCart($marketStall2->getItem('Kiwi', 3));
$cart->addToCart($marketStall2->getItem('Pepper', 8));

$cart->printReceipt();

?>
