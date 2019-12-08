<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "MaryJane";

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE products_table SET product_name = '". $_POST['product_name']. "', product_description = '". $_POST['product_description'] ."', arrival_date = '". $_POST['product_arrival_date'] ."' WHERE id = ". $_POST['id'];

  if ($conn->query($sql)) {
    $status = true;
  } else {
    $status = false;
  }

  echo $status;

  mysqli_close($conn);