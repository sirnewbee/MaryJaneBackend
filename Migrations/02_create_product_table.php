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
    CREATE TABLE products_table(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      product_name TEXT,
      product_description TEXT,
      arrival_date DATE,
      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
      status BOOLEAN DEFAULT true NOT NULL
    )
  ";

  if ($conn->query($sql) === TRUE) {
    echo "Table products_table created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  $conn->close();