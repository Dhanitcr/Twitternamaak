<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chirpify | Tweets</title>
    <link rel="stylesheet" href="style.css">
</head>


<div class="banner">
    <div class="navbar">
        <a href="index.html"><img src="img_3.png" id="logo" alt="logo" ></a>
        <ul>
            <li><a href="Inloggens.html">Aanmelden</a></li>
            <li><a href="Accountmaken.html">Account aanmaken</a></li>
        </ul>
</div>
</body>
</html>
<?php


    $servername = "localhost";
    $username = "root";
    $password = "root";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=twitter", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $x = $conn->prepare("SELECT * FROM tweets");

    $x->execute();
    $data = $x->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $tweet){
        echo"<p class='berichten'>" . $tweet["username"] . "</p>" . "<p class='berichten'>" . $tweet["content"] . "</p>" . "<br>";
    }