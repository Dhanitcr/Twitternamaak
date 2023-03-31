<!DOCTYPE html>

<html lang="nl">

<head>

    <meta charset="utf-8">

    <title>Chirpify | Tweets maken</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="wittekst">
<ul>
    <li style="float:right"><a class="active" href="Inloggens.html">Inloggen</a></li>
    <li style="float:right"><a class="active" href="Accountmaken.html">Account aanmaken</a></li>
</ul>

<div class="Tweets">
    <form method="POST">
        <input type="text" name="username" placeholder="Gebruikersnaam.." autofocus>
        <input type="text" name="content" placeholder="Verstuur een tweet..">
        <br>

        <input type="submit">
</div>


</body>

</html>


<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (isset($_POST["content"])) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=twitter", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


$tweet_maken = $conn->prepare("INSERT INTO tweets (content, username) VALUES (:content, :username)");
$tweet_maken->bindParam(":content", $_POST['content']);
$tweet_maken->bindParam(":username", $_POST['username']);
$tweet_maken->execute();


