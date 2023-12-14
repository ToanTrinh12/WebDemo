<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Webphim";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
for ($x = 1; $x <= 20; $x++) {
$api_url = "https://api.themoviedb.org/3/trending/all/day?api_key=26ba5e77849587dbd7df199727859189&page=$x";

$json_string = file_get_contents($api_url);

$data = json_decode($json_string, true);

$results_data = $data['results'];

foreach ($results_data as $dt) {
  if (array_key_exists('title', $dt)) {
    $movie_data = array_slice($dt, 0, 15, true);
    $create_table_sql = "CREATE TABLE IF NOT EXISTS movie (";
    foreach ($movie_data as $key => $value) {
        if ($key == 'genre_ids') {
            $create_table_sql .= $key . " NVARCHAR(300), ";
        } elseif ($key == 'adult' || $key == 'video') {
            $create_table_sql .= $key . " BOOLEAN, ";
        } elseif ($key == 'id' || $key == 'vote_count') {
            $create_table_sql .= $key . " INT, ";
        } elseif ($key == 'popularity' || $key == 'vote_average') {
            $create_table_sql .= $key . " FLOAT, ";
        } elseif ($key == 'first_air_date' || $key == 'release_date') {
            $create_table_sql .= $key . " DATE, ";
        } else {
            $create_table_sql .= $key . " NVARCHAR(300), ";
        }
    }
    $create_table_sql .= "PRIMARY KEY(id)";
    $create_table_sql = rtrim($create_table_sql, ", ") . ")";
    if ($conn->query($create_table_sql) === TRUE) {
      echo "Table created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    foreach ($results_data as $dt) {

      $id = $dt['id'];
    
      $sql_check = "SELECT id FROM movie WHERE id = $id";
    
      $result = $conn->query($sql_check);
    
      if ($result->num_rows > 0) {
        echo "ID already exists";
      } else {
        $columns = implode(", ", array_map(function($key) { 
          return $key;
        }, array_keys($dt)));
        $values = implode(", ", array_map(function($value) { 
            if (is_array($value)) {
                return "N'" . implode(", ", $value) . "'";
            } else {
                return "N'" . $value . "'";
            }
        }, array_values($dt)));
        $sql = "INSERT INTO movie ($columns) VALUES ($values)";
        
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }
  }elseif(array_key_exists('name', $dt)){
    $tv_data = array_slice($dt, 0, 16, true);
    $create_table_sql1 = "CREATE TABLE IF NOT EXISTS tv (";
    foreach ($tv_data as $key => $value) {
        if ($key == 'genre_ids') {
            $create_table_sql1 .= $key . " NVARCHAR(300), ";
        }elseif ($key == 'adult' || $key == 'video') {
            $create_table_sql1 .= $key . " BOOLEAN, ";
        } elseif ( $key == 'vote_count') {
            $create_table_sql1 .= $key . " INT, ";
        } elseif ($key == 'popularity' || $key == 'vote_average') {
            $create_table_sql1 .= $key . " FLOAT, ";
        } elseif ($key == 'first_air_date' || $key == 'release_date') {
            $create_table_sql1 .= $key . " DATE, ";
        } else {
            $create_table_sql1 .= $key . " NVARCHAR(300),";
        }
    }
    $create_table_sql1 .= "PRIMARY KEY(id)";
    $create_table_sql1 = rtrim($create_table_sql1, ", ") . ")";
    if ($conn->query($create_table_sql1) === TRUE) {
      echo "Table created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    foreach ($results_data as $dt) {
      $id = $dt['id'];
    
      $sql_check = "SELECT id FROM movie WHERE id = $id";
    
      $result = $conn->query($sql_check);
    if (is_array($tv_data)) {
      if ($result->num_rows == 0){
        $columns1 = implode(", ", array_map(function($key) { 
          return $key;
        }, array_keys($tv_data)));
        $values1 = implode(", ", array_map(function($value) { 
            if (is_array($value)) {
                return "N'" . implode(", ", $value) . "'";
            } else {
                return "N'" . $value . "'";
            }
        }, array_values($tv_data)));
        $sql1 = "INSERT INTO tv ($columns1) VALUES ($values1)";
      }
      }
    
    
    if ($conn->query($sql1) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql1 . "<br>" . $conn->error;
    }
  }
}
}
}

// Đóng kết nối
$conn->close();
?>
