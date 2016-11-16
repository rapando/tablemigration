<?php

/*
* This code reads data from an existing table and prints out the table as a single json object with each row as an array element
*/

$connection = mysqli_connect('localhost', 'db_username', 'db_password', 'db_name');

$query = "SELECT title, slug, tags FROM poems ORDER BY id ASC";

$data = mysqli_query($connection, $query);
$output = array();
while($row = mysqli_fetch_assoc($data)) {
	$output[] = $row;
}
echo  json_encode($output);

