<?php
  session_start();
  $loginusername = $_SESSION['user'];

  $amntspent = $_POST["amntspent"];
  $spentwhere = $_POST["spentwhere"];
  $tag = $_POST["reqtag"];
  $dateAdded = date("Y-m-d");

//conn to db
  $servername = "localhost";
  $usrname = "muchen";
  $password = "0zXLUTjMC2wUz88P";
  $dbname = "hack";

  $conn = new mysqli($servername, $usrname, $password, $dbname);
  if ($conn->connect_error){
   die("Connection failed: ". $conn->connect_error);
  }

  /*$query1 = "SELECT * FROM login WHERE username='$loginusername' ";
  $result1 = mysqli_query($conn, $query);
  $row1 = mysqli_fetch_array($result);
  */

  //if ($loginpassword == $row[3] && $loginusername != null){
    $sql = "INSERT INTO inputs (username, amountSpent, spentWhere, tag, dateAdded)
    VALUES ('$loginusername', '$amntspent', '$spentwhere', '$tag', '$dateAdded')";
      if(!mysqli_query($conn, $sql)){
        echo ("Error description: " . mysqli_error($conn));
      }
      else{
        header("refresh:0; url=home.php");
      }
  //}


 ?>
