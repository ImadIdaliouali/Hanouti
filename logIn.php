<?php
session_start();
require "users.php";
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
}
foreach ($users as $u) {
    if (isset($username) && $u["username"] == $username && isset($password) && $u["password"] == $password) {
        $_SESSION["username"] = $_POST["username"];
        header("location:index.php");
    }
}
if (array_key_exists("username", $_SESSION))
    header("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <form action="./logIn.php" method="post">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Sign In">
    </form>
</body>

</html>