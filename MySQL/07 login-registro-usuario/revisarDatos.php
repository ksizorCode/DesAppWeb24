<?php require '_functions.php';?>
<?php include '_header.php';?>

<h1>Llegué aquí</h1>

<?php
$sql='SELECT usuario, pass FROM usuarios WHERE usuario ="manu";';
$result=consultaSQL($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     echo "usuario: " . $row["usuario"];
     echo "<br>";
     echo "pass: " . $row["pass"];
    }
  } else {
    echo "0 results";
  }



?>