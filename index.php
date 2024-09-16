<?php

// Part 1 //
// Function 1 : Converts decimal number to a binary number.

function decToBin($decimalNum) {

    $binaryNum = ' ';

    while ($decimalNum > 0) {
        $remainder = $decimalNum % 2;    

        $binaryNum = $remainder . $binaryNum;

        $decimalNum = (int)($decimalNum / 2);
    }

    return $binaryNum;

}

// ↓ Enter Decimal Number Here ↓ Vnesi Decimalen Broj Tuka ↓
$decimalNum = 874;
$binaryNum = decToBin($decimalNum);

echo "<b>Function 1 :</b> Converts decimal number to a binary number. <br>";
echo "Decimal Number: $decimalNum";
echo "<br>";
echo "Binary Number: $binaryNum";

echo "<br>";
echo "<br>";

// Function 2 : Converts decimal number to Roman number ( max : 3999 ).


function decToRom($decimalNum) {
    $roman_numerals = [ 'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1 ];
    $numberInRoman = ' ';
    
    if ($decimalNum <= 39999) {
        while ($decimalNum > 0) {
            foreach ($roman_numerals as $roman => $number) {
                if ($decimalNum >= $number) {
                    $decimalNum -= $number;
                    $numberInRoman .= $roman;
                    break;
                }
            }
        }
        return $numberInRoman;
    } else {
        return "<span style='color: red; font-weight: 600;'> Invalid Decimal Number (SHOULD NOT EXCEED 39999!) </span>";
    } 
}


// ↓ Enter Decimal Number Here ↓ Vnesi Decimalen Broj Tuka ↓
$decimalNum = 874;
$numberInRoman = decToRom($decimalNum);

echo "<b>Function 2 :</b> Converts decimal number to Roman number ( max : 3999 ). <br>";
echo "Decimal Number: $decimalNum";
echo "<br>";
echo "Roman Number: $numberInRoman";

echo "<br>";
echo "<br>";

// Part 2 //
// Function 3 : Converts binary number to a decimal number.

function binToDec($binaryNum) { 
    if (!preg_match('/^[01]+$/', $binaryNum)) {
        return "Invalid binary number";
    }

    $decimalNum = 0;
    $reversedBinNum = strrev($binaryNum);
    $binNumLength = strlen($binaryNum);

    for ($i = 0; $i < $binNumLength; $i++) {
        $decimalNum += $reversedBinNum[$i] << $i;
    }

    return $decimalNum;
}

// ↓ Enter Binaray Number Here ↓ Vnesi Binaren Broj Tuka ↓
$binaryNum = "1101101010";
$decimalNum = binToDec($binaryNum);

echo "<b>Function 3 :</b> Converts binary number to a decimal number. <br>";
echo "Binary Number: $binaryNum";
echo "<br>";
echo "Decimal Number: $decimalNum";

echo "<br>";
echo "<br>";

// Function 4 : Converts roman number to a decimal number.

function romToDec($romanNum) {
    $roman_numerals = [ 'M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1 ];
    // $romanNum = strtoupper($romanNum);
    $decimalNum = 0;

    foreach ($roman_numerals as $key => $value) {
        while (strpos($romanNum, $key) === 0) {
            $decimalNum += $value;
            $romanNum = substr($romanNum, strlen($key));
        }
    }
    return $decimalNum;
}

// ↓ Enter Roman Number Here ↓ Vnesi Rimski Broj Tuka ↓
$romanNumber = "DCCCLXXIV";
$decimalNum = romToDec($romanNumber);

echo "<b>Function 4 :</b> Converts roman number to a decimal number. <br>";
echo "Roman Number: $romanNumber";
echo "<br>";
echo "Decimal Number: $decimalNum";

echo "<br>";
echo "<br>";

// Part 3 //
// Function 5 : Create a function that will check if a given number is roman, decimal or binary.

function numCheck($num) {

    $numberIs = '';

    if (preg_match('/^[01]+$/', $num)) {
        echo "The number $num is binary <br>";
        $numberIs = 'Binary';
    } elseif (preg_match('/^[MCDLXIV]+$/', $num)) {
        echo "The number $num is roman <br>";
        $numberIs = 'Roman';
    } elseif ($num[1] == 0 && ($num[0] == '+' || $num[0] == '-')) {
        return "Error";
    } else {
        echo "The number $num is decimal <br>";
        $numberIs = 'Decimal';
    }



    switch ($numberIs) {
        case 'Binary':
            echo "The number $num from binary to Decimal is: " . binToDec($num) . "<br>";
            echo "The number $num from decimal to Roman is: " . decToRom(binToDec($num));
            break;
        case 'Roman':
            echo "The number $num from roman to Decimal is: " . romToDec($num) . "<br>";
            echo "The number $num from roman to Binary is: " . decToBin(romToDec($num));
            break;
        case 'Decimal':
            echo "The number $num from decimal to Binary is: " . decToBin($num) . "<br>";
            echo "The number $num from decimal to Roman is: " . decToRom($num);
            break;
        default: 
        echo "Invalid Number";
    }



}
echo "<b>Function 5 :</b> Create a function that will check if a given number is roman, decimal or binary. <br>";
echo numCheck('874');

echo "<br>";
echo "<br>";

echo "<b>Function 6 :</b> Create an array with 10 numbers of all types (decade, binary, roman). <br>";
$randomNumbers = array('238', '12456', '7890', '3402', '17653', '289', '40237', '5678', '15000', '943');

foreach ($randomNumbers as $num) {
    echo numCheck($num) . "<br> <br>";
}


?>