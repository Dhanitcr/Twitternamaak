<!DOCTYPE html>

<html lang="nl">

<head>

    <meta charset="utf-8">

    <title>Zomertijd</title>

</head>

<body>

<?php

//Tijdzone instellen

date_default_timezone_set("Europe/Amsterdam");

//Controleer zomertijd

if(date("I") == 1) {

    echo "Het is zomertijd";

} else {

    echo "Het is wintertijd";

}

?>

</body>

</html>