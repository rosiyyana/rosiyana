<?php
$DB_HOST = "localhost";
$DB_DATABASE = "ajax";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_PORT = "3306";

$db1 = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);

if ($db1->connect_error) {
  die("Connection Failed:" .$db1->connect_error);

}
 ?>
