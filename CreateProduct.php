<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "MaryJane";

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "
    INSERT INTO products_table(product_name, product_description, arrival_date)
    VALUES ('". $_POST["product_name"] ."', '". $_POST["product_description"] ."', '". $_POST["product_arrival_date"] ."')
  ";

  if ($conn->query($sql) === TRUE) {
    $product["id"] = $conn->insert_id;
    $product["name"] = $_POST["product_name"];
    $product["description"] = $_POST["product_description"];
    $product["arrival_date"] = $_POST["product_arrival_date"];
    $status = true;
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $status = false;
  }

  echo json_encode([
    "data" => $product,
    "status" => $status
  ]);

  $conn->close();
