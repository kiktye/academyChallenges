# academyChallenges
## Request

Challenge 20 - JQuery
For this week you have to create a budget calculator app.
You already have all the files needed for this app. The HTML & CSS are done,
just open the folder ‘js’ and write your code in the ‘app.js’ script. The app
should work as shown in the video. Briefly, the app will contain 2 forms - one
for the budget & one for the expenses.
When you submit the budget form, it should update the Budget field & the
Balance field at the same time.
If you try to enter an empty value in the input, it should output a message
saying: Value cannot be empty or negative. This message should disappear
when you focus the input again.
The first input of the expenses form, should be the Expense title & the second
one should be the Expense value. When you submit the expenses form, it
should update the Expenses field & the Balance field (depending on what the
expense value is - it should be subtracted from the Balance value) at the
same time.
When you submit the expenses form, it should also create a table (on the first
submission) below the Budget fields. The first row of the table should be the
headings of the columns (the first one: Expense title, the second one:
Expense value, and the third one empty.) In each row below the first one,
there should be your submitted expenses.
Full Stack Academy - Challenge 19 - JQuery
When you submit an expense (and there already is one), it should only create
a row, containing the expenses title and value, and also in the 3rd row, there
should be an edit button & a delete button.
Clicking on the delete button, it should update the Expenses field & the
Balance field at the same time, and also delete the row from the table (like
shown in the video).
Clicking on the edit button, it should fill the input values with the values of
the expense (the expense title & the expense value), delete the row where the
expense was, and also update the Expenses field & the Balance field at the
same time. If you submit the expenses form again (containing new values of
the same expense) - it should create a row again with the new values and
update the Expenses field & the Balance field again. (for those who want to
go further, do not delete the row - instead only fill the input values with the
expense values, and on submit just update the row with the newly submitted
values, which will also update the Expenses field & the Balance field.)
When you update the Budget, and you already have expenses, this will
update all the fields on the top right.
Note:
** Use as many classes from the css as you can, for the buttons and
everything else.
** The button icons are font-awesome.
** The full design should be as shown in the video, creating a table is
necessary, otherwise these 2, you will not have all the points even though the
logic is working.




## Comment from a mentor
Your code is clean, nicely organized and I have no specific remarks about it. All the requirements of your task have been fulfilled: Adding a budget Adding costs deleting and modifying costs The entire calculation is correct