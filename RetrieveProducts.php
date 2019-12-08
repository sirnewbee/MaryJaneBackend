<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "MaryJane";
  $ret_data = [];
  $status = true;

  $conn = new mysqli($servername, $username, $password, $db);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM products_table WHERE status = 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $product['id'] = $row["id"];
      $product['name'] = $row["product_name"];
      $product['description'] = $row["product_description"];
      $product['arrival_date'] = $row["arrival_date"];

      array_push($ret_data, $product);
    }
  } else {
      $status = false;
  }

  echo json_encode([
    "data" => $ret_data,
    "status" => $status
  ]);