# academyChallenges
## Request

Challenge 11 - PHP
For this challenge:
1. Create a variable $name and set its value to be a person's name. Next, check
if the variable value is equal to ‘Kathrin’, if it is, your script should print “Hello
Kathrin”. If not, the script should print “Nice name”. Next, create a new
variable $rating with an integer value of your choice. If the value of $rating is
between 1 and 10, the script should print “Thank you for rating”, if not, the
script should print: 'Invalid rating, only numbers between 1 and 10.'
2. Extend the previous code with a few new things. Use the native php
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
some other sign or character.
3. Create an associative array. Add key/value pairs where key should be a
name of a voter. For value you should combine two parameters: The first
value should be boolean if voter has already voted (true/false) and the second
one should be rating value (integer). Concat these two values with “,”.
Full Stack Academy - Challenge 11 - PHP
Add 10 elements to the array. For each voter from the array you should print:
“Good morning/afternoon/evening voterName”
“You already voted with a $rating. / Thanks for voting with a $rating. / Invalid
rating, only numbers between 1 and 10.”

## Comment from a mentor
Super done. The check in the second request should be if ($rating &gt;= 1 &amp;&amp; $rating &lt;= 10) {because the request is &quot; If the value of $rating is between 1 and 10...&quot;. } In your case if I enter -10 it will go into the if, but it shouldn't. I have no other comments