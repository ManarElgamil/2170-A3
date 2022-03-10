<!--- The following README.md sample file was adapted from https://gist.github.com/PurpleBooth/109311bb0361f32d87a2#file-readme-template-md by Raghav Sampangi for academic use ---> 
<!--- You may delete any comments in this sample README.md file. Update information in this readme file with information from your work, and if there are sections that are marked "[OPTIONAL]" that you do not need in a specific section, simply delete them. Retain the other sections. --->
# Assignment 3: CSCI 2170, Winter 2022

Date Created: 05 MAR 2022
Last Modification Date: 09 MAR 2022
Gitlab URL: hhttps://git.cs.dal.ca/courses/2022-winter/csci-2170/a3/elgamil.git

## Author(s)

- Full Name: Manar Elgamil
- Email: mn707104@dal.ca

## Description

This project is similiar to implementing twitter, however this site is called Chatterbox. A user is first asked to sign in, once signed in the user sees the "feed", which are posts by other users in the database. The user is allowed to like or report posts. The user has a profile page that has an image and shows the user's information. They are allowed to update all these information except the password field. Moreover there are 2 types of users, regular users and adminstrators. Regular users don't have access to the dashboard while adminstrators have access to it. The adminstrators can go to the dashboard by clicking on the navigation link. Once there the adminstrator is given the option to delete or clear a reported post. They are also given the option to suspend users.

Lastly I want to say that all the functionalities implemented in this project are perfectly functional, thank you!

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Are there any dependencies? Are there things to keep in mind when testing this code?

No there shouldn't be any dependencies in the code.

```
Give examples
```

## Running the tests [OPTIONAL]

Explain how to run any specific tests for this website
Explain what these tests test and why

```
Make sure to run the test once using an adminstrator's credentials (email and password) and another time using a regular user's credentials. This is important because you get to see how the different functionalities are implemented. 
(I also want my marker's to know that once any of the functionalities are clicked, you do not see an automatic change, because I did not use ajax. Moreover, you will need to refresh the page or check the database to see the functionalities implemented).


Give examples
```
1- (adminstrator's credentials) email:rey@jediacademy.org   password:balance
1- (regular user's credentials) email:leia@jediacademy.org   password:balance

## Citations/Attributions
1. Include citations in this format:
Author/Website URL, Content used from the source, Year published (if available), and Date accessed.

//include the logo, picture, bootstrap one more for all the things we have used, using the delete form from the lecture examples, code for db and santize functions



1. Bootstrap used in implementing the header, footer, form in login.php and the form in profile.php, as well as jumbotron in dashboard.php
Authors: Bootstrap developers, 
URL: https://getbootstrap.com/docs/5.1/getting-started/download/, 
Date accessed: 7 Mar 2022 

2. I used the bootstrap logo instead of finding a new logo for chatterbox
Authors: Bootstrap developers, 
URL: https://getbootstrap.com/docs/5.1/getting-started/download/, 
Date accessed: 9 Mar 2022 

Citations for Youtube videos:

3. Zybook, used in helping me write SQL statments. 
Authors: Frank McCown / Associate Professor of Computer Science / Harding University,
URL: https://learn.zybooks.com/zybook/DALCSCI2170SampangiWinter2022, 
Date accessed: 8 Mar 2022  

4. Code taken from lecture (The santize data method, the database method, and the some of the form processing)
Authors: Raghav Sampangi
URL: https://dal.brightspace.com/d2l/le/content/201526/viewContent/2902721/View 
Date accessed: 8 Mar 2022 

5. Our team's TA Mahmoud Monjur helped me in understanding some of the bootstrap functionalities

6. Dummy user image taken from pixabay.com
Author: WandererCreative
URL: https://pixabay.com/vectors/blank-profile-picture-mystery-man-973460/
Date accessed: 20 Feb 2022

7. Reused code in login form from group lab 4
Author: Manar Elgamil
Date accessed: 26 Feb 2022