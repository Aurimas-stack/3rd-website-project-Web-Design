# 3rd-website-project-Web-Design (in progress)

This project is still in progress, but this is the difference so far:
1) Instead of CSS, I'm using SCSS (SASS) in order to create CSS content which would be easier to change and to write. To compile SCSS into CSS I'm using VS extension. I'm trying to use variables and mixins, also used loop for displaying colors on related elements.
2) PHP : All of the forms used are done with prepared statements (PDO). Created a sign up, log in and log out working forms. User can log in using forms to view 'forum threads' and to make a new 'threads', respond to existing threads. Certain profile (for example: "admin") can see delete icons to delete threads - threads are deleted after clicking on trashcan icon through ajax call (also responses related to that thread are also deleted from DB). Attempting and failing to log in to the account disables log in button and sets 30 second timer after which page is reloaded and user can try again to log in. User can visit 'profile settings' page where there's some information displayed about the user, he can upload his profile picture (on default - icon is displayed) - after that the image can be deleted from profile, these changes are made in thread responses too(either icon or profile image is displayed).
4) Javascript/jQuery - ajax call to delete items from different tables in DB. Used pagination plugin to create pagination. Plenty of jQuery animations for page sections. Display word count for some textareas and inputs on forms, so the "user" would know how many words he can type. Added function which detects element (in this case - disabled btn.) and sets timer after which ajax call is made.
