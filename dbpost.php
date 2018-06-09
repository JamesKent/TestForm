<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "game";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_errno()) {
die("Connection: " .mysqli_connect_error() ." (" . mysqli_connect_errno() . ")");
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$games = $_POST['games'];

$fullname = mysqli_real_escape_string($connection, $fullname);
$email = mysqli_real_escape_string($connection, $email);
$games = mysqli_real_escape_string($connection, $games);

$query  = "INSERT INTO user (fullname, email, games) 
            VALUES ('".$_POST["fullname"]."','".$_POST["email"]."','".$_POST["games"].",')";

        $result = mysqli_query($connection, $query);
        if ($result) {
        header('Location: success.html');
        } else {
            die("Query Failed. " . mysqli_error($connection)); 
        }

mysqli_close($connection);
?>