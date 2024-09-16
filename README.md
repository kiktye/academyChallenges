# academyChallenges
## Request

Challenge 18 - JavaScript
- Create an array of objects, where each object describes a book and has
properties for the title (a string), author (a string), maxPages(int) and
onPage(int) . maxPages is the number of pages the book has. onPage is a
number that represents the page that we are on.
- Iterate through the array of books. For each book, make a list with the book
title and book author like so: "The Hobbit by J.R.R. Tolkien".
- Now use an if/else statement to change the output depending on whether
you read it yet or not (check if maxPages is equal to onPage). If you read it, list
it in format 'You already read "The Hobbit" by J.R.R. Tolkien in green text', and
if not, 'You still need to read "The Lord of the Rings" by J.R.R. Tolkien. in red
text.'
- Make a table and populate it with info about the books. Next to every book
there should be a progress bar. Calculate the percentage of how far away you
are in the book and show it through the progress bar.
- Under the table, make a form to add a new object (or add the values to the
object through multiple prompts). After clicking submit, the object should be
automatically added to the table together with the progress bar.


## Comment from a mentor
Your code is structured and well organized. You have done a great job creating a list of objects and displaying them. Your table with progress bar is coded correctly. Your code for adding a book is correct. Notes: You don't have validators on the inputs, I can put an empty row and you don't do any checks. You have no checks even if I enter a page larger than the number of pages in the book.