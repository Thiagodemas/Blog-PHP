<?php

require_once 'config.php';

$login = mysqli_real_escape_string($conetion, $_POST['login']);
$pass = mysqli_real_escape_string($conetion, $_POST['pass']);

$query = "INSERT INTO user(user, password) VALUES('$login', '$pass')";
$result = mysqli_query($conetion, $query);
header("location:../addNews.php");
