<?php

require "database.php";
$database=new Database();
$conn=$database->connect();

echo "database connected successfully";

?>