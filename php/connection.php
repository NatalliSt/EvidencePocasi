<?php

    $host="127.0.0.1"; // IP adresa databázového serveru, na kterém běží MySQL server
    $port=3306; // Číslo portu, na kterém naslouchá MySQL server pro připojení - standardní port pro MySQL je 3306.
    $socket=""; // Volitelný parametr (pokud se nepoužívá, ponechává se prázdné pole)
    $user="root"; // Uživatelské jméno pro přihlášení k databázi
    $password="Pavel261*"; // Heslo pro přihlášení k databázi
    $dbname="evPoc"; // Název databáze, ke které se chcete připojit

    // připojení k databázi
    $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
?>