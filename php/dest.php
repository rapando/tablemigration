<?php 
/*
* This code connects to a database (we assume it is different from the first db)
* it reads data from a single row from the js file then saves the data in the new table
* it then replies with either a success or error message to the ajax code in js
*/
$connection = mysqli_connect('localhost', 'db_username', 'db_password', 'db_name');


$title = mysqli_escape_string($connection, $_POST['title']);
$slug = $_POST['slug'];
$tags= $_POST['tags'];


$query = "INSERT INTO posts (id, title, slug, tags) VALUES (NULL, '$title', '$slug', '$tags')";
if(mysqli_query($connection, $query))
	echo "<li class='text-success'>$title saved successfully</li>";
else
	echo "<li class='text-danger'>$title not saved</li>";