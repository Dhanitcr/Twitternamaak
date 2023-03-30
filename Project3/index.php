<!DOCTYPE html>

<html lang="nl">

<head>

    <meta charset="utf-8">

    <title>Chirpify</title>
    <link rel="stylesheet" href="style.css">
</head>

<body id="wittekst">
<ul>
    <li style="float:right"><a class="active" href="Inloggens.html">Inloggen</a></li>
    <li style="float:right"><a class="active" href="Accountmaken.html">Account aanmaken</a></li>
</ul>

<div class="Tweets">
    <form method="post" action="index.php">
        <label for="tweet"></label>
        <input type="text" id="tweet" name="tweet" placeholder="Plaats iets...">
        <input type="submit" value="Verzenden">
    </form>
</div>



</body>

</html>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if(isset($_POST["content"])){
    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=twitter", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
    $x = $conn->prepare("INSERT INTO tweets (content, username)
                    VALUES('{$_POST["content"]}', '{$_POST["username"]}')");

    $x->execute();
}