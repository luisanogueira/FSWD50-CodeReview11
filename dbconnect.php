<?php
      class Database {
            public $servername = "localhost";
            public $username = "root"; 
            public $password = ""; 
            public $dbname = "cr11_luisa_travelmatic";

            public function connectDB() {
                  $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

                  if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                  }
                  return $conn;
                  }
            }
      
      ?>