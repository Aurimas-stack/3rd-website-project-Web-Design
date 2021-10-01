# 3rd-website-project-Web-Design (in progress)

This project is still in progress, but this is the difference so far:
1) Instead of CSS, I'm using SCSS (SASS) in order to create CSS content which would be easier to change and to write. To compile SCSS into CSS I'm using VS extension.
2) PHP - all the forms used are done with prepared statements (PDO). Created a sign up, log in and log out working forms. User can log in using forms to view 'forum threads' and to make a new threads (rudimentary at the moment), respond to existing threads. Certain profile (for example: "admin") can see delete icons to delete threads - threads are deleted after clicking on trashcan through ajax call (also responses related to that thread are also deleted from DB).
3) Javascript/jQuery - ajax call to delete items from different tables in DB. Used pagination library to create pagination. Plenty of jQuery animations for page sections. Display word count for some textareas and inputs on forms, so the "user" would know how many word's he can type.
