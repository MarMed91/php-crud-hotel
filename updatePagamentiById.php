<?php

if ($_POST["id"] && $_POST["price"]) {

$id = $_POST["id"];
$price = $_POST["price"];

$servername = "localhost"; // dati
$username = "root";
$password = "bool";
$dbname = "Prova1";

$conn = new mysqli ($servername, $username, $password, $dbname); //apertura connesione con database/server

if ($conn ->connect_errno ) { //validazione connessione

  echo $conn->connect_error;
  return;
}

//buona connessione se bypassiamo parte prima;

$sql = "
          UPDATE pagamenti
          SET price = $price
          WHERE id = $id
";

$conn->query($sql); //lanciamo query e passiamo variabile sql;
$conn->close(); //chiudo connessione;
}

 ?>
