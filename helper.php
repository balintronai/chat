<?php session_start();



$user = htmlspecialchars($_SESSION['name']);
$table = "a".$_SESSION['id'];

$conn = new mysqli($host, $name, $pass, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if(isset($_REQUEST["q"]))
{
  $q = $_REQUEST["q"];

  $q = htmlspecialchars($q);

  $q = str_replace("'", "\'", $q);
  $q = str_replace('"', '\"', $q);

  $user = str_replace("'", "\'", $user);
  $user = str_replace('"', '\"', $user);

  $sql = "insert into $table (name, text) values ('$user', '$q')";
  $conn->query($sql);

}
  else {
  $sql1 = "SELECT * FROM $table";
    if($result = $conn->query($sql1)){

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row['name'] == $user) echo "<font size='1px' color='black'>".htmlspecialchars($row['name'])."</font></br><font color='grey'>" . htmlspecialchars($row['text']) . "</font></br></br>";
      else echo "<font size='1px' color='black'>".htmlspecialchars($row['name'])."</font></br><left><font color='black'>" . htmlspecialchars($row['text']) . "</font></left></br></br>";
  }
  }
    }else{
      print "<b><font color='black'>Someone left this chat!</font></b>";
    }
}
?>
