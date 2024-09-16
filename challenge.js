console.log(`1. Condition to check if a given number is event.`);
let TheNumberIamWriting = 33;

if (TheNumberIamWriting % 2 == 0) {
  console.log(`The number ${TheNumberIamWriting} is even`);
} else {
  console.log(`The number ${TheNumberIamWriting} is not even`);
}

console.log(
  `2. Check which numbers from 10 to 100 are even and divisible by 3.`
);

for (i = 10; i <= 100; i++) {
  if (i % 2 == 0 && i % 3 == 0) {
    console.log(i);
  }
}

console.log(
  `3. From the given 3 numbers , find the smallest and largest, and check are they prime.`
);

function isPrime(num) {
  if (num <= 1) {
    return false;
  }

  if (num <= 3) {
    return true;
  }

  if (num % 2 == 0 || num % 3 == 0) {
    return false;
  }

  for (let i = 5; i * i <= num; i += 6) {
    if (num % i === 0 || num % (i + 2) === 0) {
      return false;
    }
  }

  return true;
}

function findMinOrMax(num1, num2, num3) {
  let smallest = num1;
  let largest = num1;

  if (num2 < smallest) smallest = num2;
  if (num2 > largest) largest = num2;
  if (num3 < smallest) smallest = num3;
  if (num3 > largest) largest = num3;

  console.log(`Smallest - ${smallest}, Largest - ${largest}`);

  if (isPrime(smallest)) {
    console.log(`The smallest number ${smallest} is prime.`);
  } else {
    console.log(`The smallest number ${smallest} is not prime.`);
  }

  if (isPrime(largest)) {
    console.log(`The largest number ${largest} is prime.`);
  } else {
    console.log(`The largest number ${largest} is not prime.`);
  }
}

let number = 31;
let number2 = 12;
let number3 = 29;

findMinOrMax(number, number2, number3);
