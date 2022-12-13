<?php
$servername = "localhost:3306";
$username = "new_era_indus";
$password = "01{rhpI[!]gw";
$db="new_db_era";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
 
 echo "Connected successfully";
}

//Truncate Database

$sql = "SELECT * FROM new_db_era.TABLES WHERE TABLE_SCHEMA LIKE '".$db."'";
  $result = $conn->query($sql);
  $tables = $result->fetch_all(MYSQLI_ASSOC);

  echo "<br/>"."<br/>";

   foreach($tables as $table)
  {
      $sql = "TRUNCATE TABLE `".$table['TABLE_NAME']."`";
      $result = $conn->query($sql);
      
      echo "truncate table".$table['TABLE_NAME']."<br/>";
  }


?>