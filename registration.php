<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
  </head>

  <body id = "registration">

    <?php
    $fnameErr = $lnameErr = $usernameErr = $pswordErr = $cpwordErr = $emailErr = $pnumErr = $timeFrameErr = $budgetErr = "";
    $fname = $lname = $username = $psword = $cpword = $email = $pnum = $timeFrame = $budget = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if (empty($_POST["fname"])) {
        $fnameErr = "required";
      } else {
        $fname = $_POST["fname"];
      }

      if (empty($_POST["lname"])) {
        $lnameErr = "required";
      } else {
        $lname = $_POST["lname"];
      }

      if (empty($_POST["username"])) {
        $usernameErr = "required";
      } else {
        $username = $_POST["username"];
      }

      if (empty($_POST["psword"])) {
        $pswordErr = "required";
      } else {
        $psword = $_POST["psword"];
      }

      if (empty($_POST["cpword"])) {
        $cpwordErr = "required";
      } else {
        $cpword = $_POST["cpword"];
      }

      if (empty($_POST["email"])) {
        $emailErr = "required";
      } else {
        $email = $_POST["email"];
      }

      if (empty($_POST["pnum"])) {
        $pnumErr = "required";
      } else {
        $pnum = $_POST["pnum"];
      }

      if (empty($_POST["timeFrame"])) {
        $timeFrameErr = "required";
      } else {
        $timeFrame = $_POST["timeFrame"];
      }

      if (empty($_POST["budget"])) {
        $budgetErr = "required";
      } else {
        $budget = $_POST["budget"];
      }

    }


    $servername = "localhost";
    $usrname = "muchen";
    $password = "0zXLUTjMC2wUz88P";
    $dbname = "hack";

    $conn = new mysqli($servername, $usrname, $password, $dbname);
    if ($conn->connect_error){
      die("Connection failed: ". $conn->connect_error);
    }

    //$query = "SELECT * FROM login WHERE username='$user' ";
    $result = mysqli_query($conn, $query);
    //$row = mysqli_fetch_array($result);

    if ($psword == $cpword){
      $sql = "INSERT INTO login (firstName, lastName, username, password, email, phoneNum, timeFrame, budget)
      VALUES ('$fname', '$lname', '$username', '$psword', '$email', '$pnum', '$timeFrame', '$budget')";
        if(!mysqli_query($conn, $sql)){
          echo ("Error description: " . mysqli_error($conn));
        }
        else{
          header("refresh:0; url=home.php");
        }
    }
    else{
      echo "passwords don't match.";
    }

     ?>


    <h2 id = "regHeader">Please fill in the following information</h2>
    <form id="regform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "POST">
      <p><span class="error" style="font-size: 20px; margin-top = 0px; margin-bottom = 0px">* required field</span></p>
      <div id="reg">
        <div class="reg-label">
          <label class = "label" for="fname">First Name:</label>
          <input type="text" id="fname" name="fname" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : ''; ?>" >
          <span class="error">* <?php echo $fnameErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="lname">Last Name:</label>
          <input type="text" id="lname" name="lname" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : ''; ?>" >
          <span class="error">* <?php echo $lnameErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="username">Username:</label>
          <input type="text" id="username" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>" >
          <span class="error">* <?php echo $usernameErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="psword">Password:</label>
          <input type="password" id="psword" name="psword" value="<?php echo isset($_POST['psword']) ? $_POST['psword'] : ''; ?>" >
          <span class="error">* <?php echo $pswordErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="cpword">Confirm Password:</label>
          <input type="password" id="cpword" name="cpword" value="<?php echo isset($_POST['cpword']) ? $_POST['cpword'] : ''; ?>" >
          <span class="error">* <?php echo $cpwordErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="email">Email:</label>
          <input type="text" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" >
          <span class="error">* <?php echo $emailErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="pnum">Phone Number:</label>
          <input type="text" id="pnum" name="pnum" value="<?php echo isset($_POST['pnum']) ? $_POST['pnum'] : ''; ?>" >
          <span class="error">* <?php echo $pnumErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="tframe">Time Frame:</label>
          <select id="timeFrame" name="timeFrame">
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
          </select>
          <span class="error">* <?php echo $timeFrameErr;?></span>
          <br><br>
        </div>

        <div class="reg-label">
          <label class = "label" for="budget">Budget:</label>
          <input type="number" id="budget" name="budget" value="<?php echo isset($_POST['budget']) ? $_POST['budget'] : ''; ?>" >
          <span class="error">* <?php echo $budgetErr;?></span>
          <br><br>
        </div>

        <input class = "regButton" type="submit" name="submit" value="Register">
      </div>
    </form>
  </body>
</html>
