<?php
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "MaryJane";

  $conn = new mysqli($servername, $username, $password);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "CREATE DATABASE ". $db;
  
  if ($conn->query($sql) === TRUE) {
    echo "Database ". $db ." created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }

  $conn->close();