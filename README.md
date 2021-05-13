# Test Project
This is a partially completed project, it is written in an unorthodox style with odd naming convention.

It is designed to test your ability to work on preexisting PHP code and be able to extend and solve problems without frameworks or external helpers.

## Naming convention:
* All classes start with CLASS_ filenames and "C" for the Class name
* All variables follow the Hungarian notation:
    * Arrays start with $arr
    * Booleans start with $b
    * Objects start with $o
    * Integers start with $int
    * Strings start with $str

## Marks will be awarded for:
* Keeping the current convention
* No errors or warnings in running
* Input sanitisation
* Running successfully inside the dockerfile given
* Limited amount of external libraries used (you can use jquery that is provided)


# Requirements:
* Make the project run in Docker using the docker-compose.yml provided
* Complete the "//TODO" items in the following files
  * src/models/CLASS_Todos.php
  * src/controllers/CLASS_TodosPage.php
  * src/html/js/todos/todo.js
  * src/views/CLASS_TodosView.php (Add functionality to create a todo item)
* Correct any errors in the current code if you find any
* Bonus: Make sure the user is logged in before accessing the /todo/ page


## Questions will be asked in the interview:
* How can we make the login section more secure
* How you wrote the code 
* Walk through of the code
* How could we do this better

## To run
To start the application run the following in the root directory:
```shell script
docker-compose up
```
Then navigate to `http://localhost:8000` in your browser
