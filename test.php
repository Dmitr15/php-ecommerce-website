<?php
session_start();
    if (empty($_SESSION)) {
       header('location: /Lr3Site/signup.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/safari-pinned-tab.svg" type="image/x-icon">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<div class="container">
    Username: <?=$_SESSION['login']?>
</div>

</html>