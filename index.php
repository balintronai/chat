<?php session_start();


$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_SESSION['id'])) {
  $sql = "drop table a".$_SESSION['id'];
  $conn->query($sql);
}

try{
  session_destroy();
}
catch(Exception $e){

}
   ?>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
<style>
  body {
  font-family: 'Roboto Condensed';
  letter-spacing: 8px;
  margin: 0px;
  padding: 0px;
}
  #main {
  margin-left: 0px;
  text-align: center;
}
  #upper {
  width: 100%;
  height: 80%;
  background-color: #333;
}
#lower {
  width: 100%;
  height: 80%;
  background-color: #FFDE00;
  text-align: left;
}

  #submit {
  width: 20%;
  height: 8%;
  border-style: none;
  font-size: 20px;
  fill: transparent;
}

  .shape {
  fill: transparent;
  stroke-dasharray: 0 1000;
  stroke-dashoffset: -430;
  stroke-width: 3px;
  stroke: #FFDE00;
}
  h1 {
  color: #FFDE00;
  text-align: center;
  font-size: 40px;
}
.giant {
  margin-top: 0px;
  padding-top: 4%;
  text-align: center;
  color: white;
}
    #text {
  border-style: none;
  letter-spacing: 3px;
  text-align: center;
}
  .text {
  color: #fff;
  letter-spacing: 8px;
  line-height: 190%;
  position: relative;
  background: transparent;
  border-style: none;
  font-family: 'Roboto Condensed';
  cursor: pointer;
}
  .lower {
  color: black;
  margin-top: 0px;
  letter-spacing: 2px;
}
ul {
  letter-spacing: 2px;
}
  @media screen and (min-device-width: 300px) and (max-device-width: 420px) and (min-device-height: 560px) and (max-device-height: 740px){
.giant {
  font-size: 1000%;
}
    #main {
  margin-top: 12%;
}
#text {
  width: 80%;
  height: 11%;
  font-size: 60px;
  margin-top:18%;
  padding:0px;
}
  .text {
  font-size: 100px;
  margin-top:0;
}
  .lower {
  padding-top: 15%;
  font-size: 120px;
}
 ul {
    padding-top:10%;
  text-align:center;
  padding-right:40px;
  padding-left:40px;
    margin:auto;
}
 li {
  font-size: 50px;
    list-decoration:none;
    list-style:none;
    padding-bottom:10%;
}
}

  @media screen and (min-device-width: 800px) {
    #main {
  margin-top: 9%;
}
    ul {
  padding-left: 30%
}li {
  font-size: 30px;
}
  .lower {
  padding-top: 4%;
  font-size: 60px;
}
  .text {
  font-size: 30px;
  top: -99%;
}
  #text {
  width: 50%;
  height: 9%;
  border-style: none;
  letter-spacing: 3px;
  text-align: center;
  font-size: 23px;
}
#text:focus {
  border-style: solid;
  border-color: #FFDE00;
}
.giant {
  font-size: 50px;
}
.svg-wrapper {
  height: 60px;
  margin: 40 auto;
  position: relative;
  width: 320px;
  cursor: pointer;
}
 @keyframes draw {
 0% {
 stroke-dasharray: 0 1000;
 stroke-dashoffset:-430;
 stroke-width: 3px;
}
 50% {
 stroke-width: 8px;
}
 100% {
 stroke-dasharray: 800;
 stroke-dashoffset: 0;
 stroke-width: 3px;
}
}
.svg-wrapper:hover .shape {
  -webkit-animation: 0.4s draw linear forwards;
  animation: 0.4s draw linear forwards;
}
  }
</style>
</head>
<body>
<div id="upper">
  <p class="giant"><b>SPR<font color="#FFDE00;">O</font>NX</b></p>
  <div id="main"><br>
    <br>
    <br>
    <form id="myform" method="POST" action="chat.php">
      <input id="text" required placeholder="Nickname" type="text" name="name" />
      <br>
      <div class="svg-wrapper"> <svg height="60" width="320">
        <rect class="shape" height="60" width="320" />
        </svg>
        <div class="text">
          <input class="text" type="submit" value="LOGIN" />
        </div>
      </div>
    </form>
  </div>
</div>
<div id="lower">
  <h1 class="lower">What is Spronx?</h1>
  <br>
  <br>
  <br>
  <br>
  <ul>
    <li>Free, simple interface for group chats</li>
    <li>No registration needed</li>
    <li>Log out and the conversation will be deleted</li>
  </ul>
</div>
</body>
</html>
