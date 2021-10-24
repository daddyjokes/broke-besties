<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
  </head>

  <body id="index">
    <!--Login page-->
    <!--Webapp name-->
    <div id="header">
      <h1>Broke Besties!</h1>
    </div>

    <!--Login box: subsets - username and password input boxes-->
    <div id="index-subsets">
      <div id="login">
        <h3>Are you already a Broke Bestie? Login here!</h3>
        <!--form for the login information-->
        <form action="processPage.php" method="POST">
          <label for="user">Username:</label>
          <input type="text" id="user" name="user"><br><br>
          <label for="pass">Password:</label>
          <input type="password" id="pass" name="pass"><br><br>
          <input id="loginbutton" type="submit" value="Login" name="login">
        </form>
      </div>
      <div id="register">
        <!--registration link-->
        <h3>Don't have an account? Register and get started!</h3>
        <form action = "registration.php">
          <input id= "register-button" type="submit" value="Register!"/>
        </form>
      </div>
    </div>
  </body>
</html>
