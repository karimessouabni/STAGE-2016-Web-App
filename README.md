# Project management software : A Web Application developed in Angular 2  #


##The interfaces##

###Home Page:###

The first part developed of this application represent the Home page. And it contains 3 forms.
  - The connection form: where the user sign-in with his email and password to
authenticate and get access to the main page.
  - The Reset password form: to easily reset user password when forgotten or lost.
  - The inscription form: where a new user can create an account by filling out all the
information required.




###Main Page:###

Once a user is logged-in, he gets access to the main page. This page involves 2 Menus; one on the top and a side navigation bar on the right, allowing organizing and designing navigation structure.

Using those menus, users will have access to the different parts of this Applications. While
the part which concerns my work is “suivie” appearing on the side navigation bar when
opened.

This section gives the user an overview of all the projects by organizing and presenting all the
data within a dynamic table. It features several mechanisms and those below go into the most important :
- Table page navigation: to navigate between the pages in the tab
- Table sort: to sort the project listing by a particular criterion
- Accustom the table presentation: by hiding or adding information and by displaying
them in a linear form
- Search bar: to make it easy for users to get whatever type of content they want
- Retrieving projects information from the database using a server side pagination: this
 means that the user can choose the number of projects to show per page. Thus, table page navigation is modified dynamically to be adapted with the previous choice
- 3 buttons: to add edit and remove projects





###Adding a new Project to the Database:###
A form splitted on multiples pages appears on a new window. Thus, the user could add a new
project, filling out several information like project name, price and localization.

###Editing an existing Project on the Database:###
An interface (Figure 4) showing all the project information allowing the user to edit any project listed on the table. In addition to that, he can easily add, modify or remove a bunch of new information related to the project mentioned before, like visits, partners and files.

###Animations and transitions between pages###
Because animations and transitions make a better interactivity between the different interfaces
and the user. Css and jQuery were used to achieve and make a rich user experience. E.g.:

- Fade-in and fade-out field: To show notifications or error messages while the user is
filling out with an incorrect syntax the different fields of the earlier cited forms;

- Form Vibration: Triggered when the user submits a forms with an invalid email or a
wrong password.


##MVC architecture##

The development of this web application was based on an Architectural pattern called MVC. MVC describes a way to better structure the application’s code. It helps with a clear division between responsibilities and a better maintainability, code-reuse, and testing.
This web application is divided into a set of these three main components, each one in charge of different tasks (Figure 5). Let's see a detailed explanation of each one:

###The Model:###

A PHP class with multiples functions using SQL queries to retrieve information from the database (for each model there is a table on the database). The model is in charge of giving the controller a data representation of whatever the user requested. The model directly manages the data and the rules of this application. It contains the most important part of this application’s logic, the logic that applies to the problems we’ve been dealing with.

###The Model:###
A PHP class with multiples functions using SQL queries to retrieve information from the database (for each model there is a table on the database). The model is in charge of giving the controller a data representation of whatever the user requested. The model directly manages the data and the rules of this application. It contains the most important part of this application’s logic, the logic that applies to the problems we’ve been dealing with.

###The Controller:###
A PHP file that manages the logic of the code that makes decisions. This is somehow the intermediary between the model and the view. Its main function is to call and coordinate the necessary resources/objects needed to perform the user action (received as HTTP GET or POST requests when the user clicks on some elements on the view). Usually the controller will call the appropriate Model for the task and then selects the proper view to render the request’s result.
In this project the web and the mobile application share the same Controller. Which makes it
linked to two views in the same time and deciding between both of them. It also determines if
a visitor has the right to view the page or not by managing access rights.

###The View:###
Present data to the user in any supported format and layout, e.g.:a map, a form, or a table. It contains essentially HTML code. its main role is about:

- Displaying data coming from the application’s model;
- Learning about changes in model data through the application’s controller;
- Communicating user-initiated changes—for example, text entered in a text field—
through controller to the application’s model.



###Managing access rights:###
This was made on the different controllers of this application, using PHP Sessions. It’s a way to hold information about one single user, to be used across the different application pages.
How it works:
Once the user is correctly connected on the application, a new session is started, then PHP
generates a unique number that will be used on the different application pages. This number
will identify the connected user.
Then when the user chooses to disconnect from the application or closes the browser, the previous session will be destroyed. Thus, the controllers will redirect all the url to the homepage, until having a new connected user.

###Forms verification and validation:###

![]({{site.baseurl}}//Capture%20d%E2%80%99e%CC%81cran%202016-08-22%20a%CC%80%2021.40.53.png)
Each form in this web application implements a technology called “jQuery validating
form”. A JavaScript file using Ajax is what we have used to control the data stream going towards
the controller from the view. This file represents an abstract piece between the controller and the view and it’s divided into two parts:

1. The verification part: this is where forms fields that requires verification are validated.
And whether a field contains an error, a message is displayed on the view to alert the user.
2. The submit part: Once the verification is successfully done, the submit section takes in charge sending data to the controller. Then, returns a success or a failure message to the view.



###Object-oriented programming using PHP Data Objects:###

Composed of multiples PHP Classes, the development was achieved based on the concept of
"objects". With the aim for extensibility and code reuse.
We have also used PDO which is a PHP extension that allows a database programming with an object-oriented style. It greatly facilitates the migration from one Database Management System to another, or even simultaneous or alternating use of multiple Database Management System with the same PHP code. It also makes the code more secure and cleaner. PDO also has multiple consistent methods of error handling, which have end up saving us loads of time while tracking down issues.


