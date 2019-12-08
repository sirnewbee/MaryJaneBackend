<?php
  $servername = "localhost";
  $username = "kawin";
  $password = "replay50";
  $db = "MaryJane";
  $status = true;

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "UPDATE products_table SET status = 0 WHERE id = ". $_POST['id'];

  if ($conn->query($sql)) {
    echo $status;
  } else {
    echo "Error updating record: " . mysqli_error($conn);
    $status = false;
    echo $status;
  }
  
  mysqli_close($conn);