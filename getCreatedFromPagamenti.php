<?php

if ($_POST["id"]) {

$id = $_POST["id"];

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
          SELECT created_at
          FROM pagamenti
          WHERE id = $id

";

$result = $conn->query($sql); //lanciamo query e passiamo variabile sql;
);
$res = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { //cicli su variabili della tabella e iesima riga ce la mette nella row;
      $res[] = $row;
    }
 }
  else {

    echo "0 results";
  }
  $conn->close(); //chiudo connessione;
}
 echo json_encode($res);
 ?>
