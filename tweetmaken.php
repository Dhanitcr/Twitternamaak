<form method="POST">
    Wat<input type="text" name="content">
    <br>
    Naam<input type="text" name="username">
    <input type="submit">
</form>

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
    //"INSERT INTO tweets (content, username)
    //VALUES('coole eerste tweet', 'marcel')"
    $x = $conn->prepare("INSERT INTO tweets (content, username)
                    VALUES('{$_POST["content"]}', '{$_POST["username"]}')");

    $x->execute();
}