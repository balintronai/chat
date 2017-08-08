<?php session_start();
if($_POST){
  if ($_POST['name'] != "") {
    $_SESSION['name'] = htmlspecialchars($_POST['name']);
  }
}
if(! $_SESSION['name'] or $_SESSION['name'] == "") header('Location: index.php');
 ?>
<html>
<head>
<script>
function myFunction(e){

  //document.getElementById("this").innerHTML = document.getElementById("in").value;
  if (e.keyCode == 13) {
  var str = document.getElementById("in").value;
  if(str != "" && str != " "){
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("this").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "helper.php?q=" + str, true);
        xmlhttp.send();
    document.getElementById("in").value = "";
    scrolldown();}
}
}
var old = " ";
function timeout() {

    setTimeout(function () {
    var xmlhttp = new XMLHttpRequest();
    var name = "this";
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              var newt = xmlhttp.responseText;
              if(old != newt){
                document.getElementById(name).innerHTML = newt;
                old = newt;
                scrolldown();
               }
            }
        };
        xmlhttp.open("GET", "helper.php", true);
        xmlhttp.send();
        timeout();
    }, 100);
}

function scrolldown(){
  var timeout = setTimeout(function () {
  var elem = document.getElementById('text');
  if(elem.scrollTop < elem.scrollHeight){
    elem.scrollTop = elem.scrollHeight;

    clearTimeout(timeout);
    }
      else{
    scrolldown();
    }
    },80);
}

function start(){
  timeout();
}

</script>
 <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<style>
body{
  background-color:#333;
    font-family: 'Roboto Condensed';
    color:white;
    margin:0px;
    padding:0px;
}
a{
  text-decoration:none;
}
.text{
  margin-top:0;
  padding-top:1%;
  background-color:#ffffff;
  text-align:center;
  width:80%;
    margin:auto;

}
h1{
  padding-top:1%;
  font-size:30px;
  color:#000;
}
.in{
  position:relative;
  width:80%;
  height:8%;
  border-style:none;
  text-align:left;
  padding-left:20px;
  background-color:#E6E6E6;
}
.in2{
  border-style:none;
  width:70%;
  height:30px;

}
#table{
  text-align:center;
  height:80%;
}
td{
  width:25%;
  vertical-align:center;
}
td:last-child{
  border:none;
}
.link{
  color:white;
}
.link:hover{
  cursor:pointer;
}
#joinchat{
  text-align:center;
}
#logout{
  position:absolute;
  top:18px;
  right:40px;
}
.sub{
  border-style:none;
  background-color:#B29ABF;

}
.giant{
  margin-top:20px;
  font-size:50px;
  text-align:center;
  color:white;
 letter-spacing: 8px;
}i{
  color:black;
}
.bottom{
  text-align:center;
  width:100%;
  background-color:#FFDE00;
    height:5%;
    margin:0px;
    padding-top:1%;
    vartical-align:center;
}
#in1:hover{
  border-style:solid;
  border-width:1px;
  border-color:#FFDE00;
}
</style>
</head>
<body onLoad="start();
"><p class="giant"><b>SPR<font color="#FFDE00;">O</font>NX</b></p>
<a href="http://spronx.co.uk" class="link" id="logout">Logout</a>
<table id="table" align="center" width="100%" height="200px">
<tr>
<?php
  $user = $_SESSION['name'];

$conn = new mysqli($host, $name, $pass, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
print "<td>";
if(($_GET and isset($_GET['new'])) or isset($_SESSION['one'])){
  if(! isset($_SESSION['id'])) {
    $_SESSION['id'] = rand(111111,999999);
    $sql = "CREATE TABLE a".$_SESSION['id']." (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    text VARCHAR(255) NOT NULL
    )";
    $conn->query($sql);
  }
  echo "<b>chat id: " . $_SESSION['id'] . "</b>";
  $_SESSION['one'] = true;
  print '<div class="text" id="text" style="clear: both; overflow-x:hidden; height:400px;">';
  echo "<i>Logged in as " . $_SESSION['name'] . "</i>";
  print '<p id="this"></p>
  </div>
  <input class="in" type="text" name="asd" id="in" onKeyPress="myFunction(event)"/>';
}
  elseif(isset($_POST['joinchat']) and $_POST['joinchat'] != ""){
    $_SESSION['id'] = $_POST['joinchat'];
    $_SESSION['one'] = true;
    echo "<b>chat id: " . $_SESSION['id'] . "</b>";
      print '<div class="text" id="text" style="clear: both; overflow-x:hidden; height:400px;">';
  echo "<i>Logged in as " . $_SESSION['name'] . "</i>";
  print '<p id="this"></p>
  </div>
  <input class="in" type="text" name="asd" id="in" onKeyPress="myFunction(event)"/>';
  }
      else{
        print '<a class="link" id="newchat" href="?new" >New chat</a><br><br><br>
        <form id="form" method="POST">
<input required class="in2" id="joinchat" type="text" name="joinchat" placeholder="Chat id" /><br>
 <input type="submit" value="asd" /></form>';
       // <a class="link" href="" onclick="form.submit();">Join to chat</a>
      }

print "</td>";
      ?>
</tr>

</table>
<div class="bottom"><i><font color="black" size="3px" >Spronx by Balint Ronai, 2016</font></i></div>
</body>
</html>
