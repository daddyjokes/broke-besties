<!DOCTYPE html>
<html>
  <head>
    <title>Manual Entry</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
  </head>

  <body>
    <!--filling in the info-->
    <div id="main">
      <form action="manualUploadProcess.php" method="POST">
        <div class="manual-data">
          <label for="amntspent">Amount Spent:</label>
          <input type="number" id="amntspent" name="amntspent" style ="margin-top:80px;"><br><br>
        </div>

        <div class="manual-data">
          <label for="spentwhere">Spent Where:</label>
          <input type="text" id="spentwhere" name="spentwhere"><br><br>
        </div>

        <div class="manual-data">
          <label for="tag" style="font-size: 40px">Tag: </label>
          <select id="reqtag" name="reqtag">
            <option value="grocery">Grocery</option>
            <option value="clothing">Clothing</option>
            <option value="entertainment">Entertainment</option>
            <option value="education">Education</option>
            <option value="travel">Travel</option>
            <option value="food">Food</option>
            <option value="business expense">Business Expense</option>
          </select>
        </div>
        <input id = "regButton" type="submit" name="submit" value="Submit" >
      </form>
    </div>
  </body>



</html>
