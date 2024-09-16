<?php

require_once('Classes/Sofa.php');
require_once('Classes/Chair.php');
require_once('Classes/Bench.php');


$sofa = new Sofa(200, 100, 50);

$sofa->SetIsForSeating(false);
$sofa->SetIsForSleeping(true);

$sofa->print();
$sofa->sneakPeek();
$sofa->fullInfo();

echo '<br>';
$chair = new Chair (100, 150, 50);

$chair->print();
$chair->sneakPeek();
$chair->fullInfo();

echo '<br>';
$bench = new Bench(250, 75, 120);

$bench->print();
$bench->sneakPeek();
$bench->fullInfo();

?>