# academyChallenges
## Request

Challenge - PHP PDO
The goal of this challenge is to create a dynamic website builder. Every visitor
that comes to the web application should be able to fill a couple of
predefined fields after which his company’s web site will be generated. All
generated websites will have the same structure, only the basic styling and
content that the visitor chooses by himself are dynamic.
The challenge should have 3 pages and should use a mysql database as data
storage (do not use files). You can reference the design from the design
folder, feel free to use images of your own choice.
When a user clicks on the “Start” button on the home page (see page1.png),
he is taken to the second page (see page2.png) where he needs to fill out the
following fields:
● Url link for the cover image
● A title for the page
● A subtitle for the page
● A short description of the company
● Telephone number
● Location
● Choose from a dropdown between services and products
● Three urls with three descriptions for the three products/services
● Description which will be displayed next to the contact form
● Links for linkedin, facebook, twitter and instagram social profiles
Everything entered into this form has to be stored in a database. For the
structure of the database, feel free to design it yourself, just try not to have
columns which will be nullable. Also try to combine OOP with PDO when
connecting to the database.
After submitting the form and storing the data, the user is redirected to the
third page (see page3.png), where all the information that has been stored in
the database, is retrieved and rendered as illustrated on the design for page 3.
You pass the information for which record to show via a GET attribute
(example: company.php?id=1, company.php?id=2, company.php?id=3 and so
on).
Full Stack Academy - Challenge 16 - PHP - PDO
Notes:
● Depending on whether the user selects services or products, that
property should be printed in the navbar, the section title, and the title
of the card. See page3.png
● Make the navbar items highlighted on hover.
● When the user clicks a particular item in the navbar, the page should
scroll to the appropriate section.
● The contact form does not have to work (it doesn’t need to actually
send emails), just make the design.


## Comment from a mentor
The solution is fine