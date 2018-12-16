<?php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  
  if ($conn->connect_error) die("Fatal Error");

  $query = "SELECT * FROM articles";
  $result = $conn->query($query);
  if (!result) die("Fatal Error");

  $rows = $result->num_rows;

  for ($j = 0; $j < $rows; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_ASSOC);

    echo 'Date: ' . htmlspecialchars($row['date']) . '<br>';
    echo 'Title: ' . htmlspecialchars($row['title']) . '<br>';
    echo 'Text: ' . htmlspecialchars($row['text']) . '<br>';

    $words = $row['words'];
  }
  
  $words = substr($words, 1);
  $words = substr($words, 0, -1); 
  $arr = explode(", ", $words);
  
  echo 'Words <br>';

  for ($i = 0; $i < count($arr); ++$i)
  {  
	  echo $arr[$i] . '<br>';
  }

  $result->close();
  $conn->close();
?>
