<?php

/*  1. Create a variable $name and set its value to be a person's name. Next, check
 if the variable value is equal to ‘Kathrin’, if it is, your script should print “Hello
 Kathrin”. If not, the script should print “Nice name”. Next, create a new
 variable $rating with an integer value of your choice. If the value of $rating is
 between 1 and 10, the script should print “Thank you for rating”, if not, the
 script should print: 'Invalid rating, only numbers between 1 and 10. */
 echo  "<br>" ;

$name = 'Kathrin';

if ($name == 'Kathrin') {
    echo "Hello Kathrin :) " . "<br>";
} else {
    echo "Nice name :)";
}

echo "<br>" . "<hr>" . "<br>" ;

$rating = 11;

if ($rating <= 10){
    echo "Thank you for rating:)" . "<br>";
} else {
    echo "Invalid rating, only numbers between 1 and 10" . "<br>"; 
}

echo "<br>" . "<hr>" . "<br>" ;


/* 2. Extend the previous code with a few new things. Use the native php
 function date() (https://www.php.net/manual/en/function.date.php) to get the
 current hour. If the time value is before 12pm print: “Good morning Kathrin”. If
 the value is after 12pm but before 7pm print: “Good afternoon Kathrin”. If the
 value is after 7pm print: “Good evening Kathrin”.

 Add another variable $rated with values true or false. You will need to extend
 the $rating condition check. Now if the $rating variable has value from 1 to 10,
 the script will need to do another check for the $rated variable. So, if the
 $rated variable is true, the script should print: “You already voted”. If $rated is
 false, the script will need to print “Thanks for voting”.
 Also, for the $rating variable you will need to check if the value is integer or
 some other sign or character */


/* 3. Create an associative array. Add key/value pairs where key should be a
 name of a voter. For value you should combine two parameters: The first
 value should be boolean if voter has already voted (true/false) and the second
 one should be rating value (integer). Concat these two values with “,”. 
 Add 10 elements to the array. For each voter from the array you should print:
 “Good morning/afternoon/evening voterName”
 “You already voted with a $rating. / Thanks for voting with a $rating. / Invalid
 rating, only numbers between 1 and 10. */

$date = date('H');

echo "Current hour is: " . $date . "<br>" . "<br>";

if ($date < 12) {
    echo "Good morning " . $name . "<br>";
} elseif ($date >= 12 && $date < 19) {
    echo "Good afternoon " . $name . "<br>";
} else {
    echo "Good evening " . $name . "<br>";
}

echo "<br>" . "<hr>" . "<br>" ;



$voters = [
    'Kiko' => ['rated' => 'false', 'rating' => 5],
    'Kathrin' => ['rated' => 'false', 'rating' => 6],
    'Gjorgina' => ['rated' => 'false', 'rating' => 7],
    'Aphrodite' => ['rated' => 'true', 'rating' => 2],
    'Riste' => ['rated' => 'true', 'rating' => 5],
    'Dusko' => ['rated' => 'false', 'rating' => 4],
    'Kristijan' => ['rated' => 'true', 'rating' => 12],
    'Natasha' => ['rated' => 'true', 'rating' => 6],
    'Milena' => ['rated' => 'false', 'rating' => 11],
    'Gjorgi' => ['rated' => 'true', 'rating' => 0] 
];


foreach ($voters as $voter => $voterDetails) {
    echo $voter . ' => ';

    $i = 1;
    foreach ($voterDetails as $key => $value) {
        if ($i % 2 != 0) {
            echo $value . " , ";
        } else {
            echo $value . " <br> ";
        }
        $i++;
    }


    if ($date < 12) {
        echo "Good morning," . $voter . "<br>";
    } elseif ($date >= 12 && $date < 19) {
        echo "Good afternoon, " . $voter . "<br>";
    } else {
        echo "Good evening, " . $voter . "<br>";
    }

    if ($voter == 'Kathrin') {
        echo "Hello Kathrin " . "<br>";
    } else {
        echo "Nice name :)" . "<br>";
    }

    if (is_int($voterDetails['rating'])) {
        if ($voterDetails['rating'] <= 10) {
            if ($voterDetails['rated'] == 'false') {
                echo 'Thank you for rating' . "<br>" . "<br>";
            } elseif ($voterDetails['rated'] == 'true') {
                echo "You already voted with $voterDetails[rating]" . "<br>" . "<br>";
            }
        } else {
            echo 'Invalid rating, only numbers between 1 and 10.' . "<br>" . "<br>";
        }
    } else {
        echo "Rating isn't an integer" . "<br>";
    }
} ;


echo  "<hr>" . "<br>" ;

?>