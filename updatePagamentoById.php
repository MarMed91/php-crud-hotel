<?php

if (isset($_POST["id"] && $_POST["price"])) {

$id = $_POST["id"];
$price = $_POST["price"];

$servername = "localhost";
$username = "root";
$lastname = "bool";
$dbname = "Prova1";

$conn = new msqli ($servername, $username, $lastname, $dbname);

if ($conn -> $connect_errno ) {

  echo $conn ->connect_error;
  return;
}

$sql = "
        UPDATE pagamenti
        SET price = $price
        WHERE  id = $id
 ";
$result = $conn->query($sql);
$conn->close();

echo json_encode($res);
}

 ?>
