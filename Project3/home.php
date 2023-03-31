<?php


    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=twitter", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $x = $conn->prepare("SELECT * FROM tweets");

    $x->execute();
    $data = $x->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $tweet){
        echo "<p>" . $tweet["username"] . "</p>";
        echo "<p>" . $tweet["content"] . "</p>";
        echo "<br>";
    }