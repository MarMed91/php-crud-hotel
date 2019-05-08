<?php

  $servername = "localhost";
  $username = "root";
  $lastname = "bool";
  $dbname = "Prova1";

  $conn = new mysqli ($servername, $username, $lastname, $dbname);

  if ($conn->$connect_errno) {

    echo $conn ->connect_error;
    return;
  }

  $sql = "
            SELECT  id, price
            FROM pagamenti
            WHERE status LIKE 'pending'
            GROUP BY price DESC
  ";

  $result = $conn->query($sql);
  $res = [];

  if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
        $res[]= $row;
      }
   }
    else {

      echo "0 results";
    }
    $conn->close();

    echo json_encode($res);

 ?>
