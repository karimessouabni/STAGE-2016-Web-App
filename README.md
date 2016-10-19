# Project management software : A Web Application developed in Angular 2  #


##The interfaces##

###Home Page:###
The first part developed of this application represent the Home page. And it contains 3 forms.
  - The connection form: where the user sign-in with his email and password to
authenticate and get access to the main page.
  - The Reset password form: to easily reset user password when forgotten or lost.
  - The inscription form: where a new user can create an account by filling out all the
information required.




Main Page:
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
