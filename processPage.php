<html>
<body>
<?php
session_start();
$_SESSION['user'] = $_POST['user'];

$loginusername = $_POST['user'];
$loginpassword = $_POST['pass'];

//conn to db
	$servername = "localhost";
	$usrname = "muchen";
	$password = "0zXLUTjMC2wUz88P";
	$dbname = "hack";

	$conn = new mysqli($servername, $usrname, $password, $dbname);
	if ($conn->connect_error){
 	 die("Connection failed: ". $conn->connect_error);
	}


	$query = "SELECT * FROM login WHERE username='$loginusername' ";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

	if ($loginpassword == $row[3] && !empty($_POST["user"])){
		echo "<div style='opacity: 1;'>Logging you in...</div>";
		header("refresh:1; url=home.php");
	}
	else{
		echo "<div style='opacity: 1;'>Failed to log in, please try again.</div>";
    header("refresh:1; url=index.php");
	}

?>
<!--<a href = "../home.php">
		<button class="button">go to home page</button>
</a>-->
</body>
</html>
