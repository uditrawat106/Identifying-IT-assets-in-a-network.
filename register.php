<html>
    <head>
        <title>ONGC IP address portal</title>
    </head>
    <body>
        <style>
          .welcome-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 28px;
            text-align: center;
          }
          .info-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 18px;
          }
          .creator-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 12px;
            text-align: center;
          }
          .ongc-logo
          {
            display: block;
            margin-left: auto;
            margin-right: auto; 
            width: 1000px;  
          }
          .to-txt
          {
            color:#fecc00;
            font-family: Britannic Bold;
            font-size: 20px;
          }
          .form-setting
          {
            display: block;
            margin-left: auto;
            margin-right: auto; 
          }
          .yellow-bg
          {
            background-color: #fecc00;
            border-style: solid;
            border-color: #a5302e;
            border-width: 5px;
            
          }
          .red-bg
          {
            background-color: #a5302e;

          }
        </style>
        <div class="yellow-bg">
          <h1 class="welcome-txt">________________________________________________Registration Page________________________________________________</h1>
          <img class="ongc-logo" src="final.png" alt="ONGC Logo">
          <div style="padding-left:720px">
            <br/><br/><a href="index.php" style="color: #a5302e" class="info-txt">Click here to go back</a><br/><br/>
          </div>          
            <div class="red-bg to-txt" style="padding-left:660px">
              <form action="register.php" method="POST">
                 Enter Username: <input style="color:#fecc00" type="text" name="username" required="required" /> <br/>
                 Enter password : <input style="color:#fecc00" type="password" name="password" required="required" /> <br/>          
                 <input style=" text-align:center padding-left:200px" type="submit" value="Register"/>
              </form>
            </div>
            <p class="creator-txt">-Coded and Created by Udit Rawat as a part of ONGC Summer Internship 2018-</p>
        </div>
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = ($_POST['username']);
  $password = ($_POST['password']);

  $bool = true;

  $con=mysqli_connect("localhost", "root", "") or die(mysql_error()); //connect to server
  mysqli_select_db($con,"ongc") or die("Cannot connect to database"); //connect to database
  $query = mysqli_query($con,"Select * from users");  //query the users table
  while($row = mysqli_fetch_array($query)) //display all rows fron query
  {
    $table_users = $row['username'];  //the first username row is passed on to $table_users, and so on
    if($username == $table_users) //checks if there are any matching fields
    {
      $bool = false;  //sets bool to false
      Print '<script>alert("Username has been taken!");</script>';//prompts the user
      Print '<script>window.location.assign("register.php");</script>'; //redirects to register.php
    }
  }
  if($bool) //checks if bool id true
  {
    mysqli_query($con,"INSERT INTO users (username, password) VALUES ('$username','$password')"); //inserts the value to table users
    Print '<script>alert("Successfully registered!");</script>';//prompts the user
    Print '<script>window.location.assign("login.php");</script>'; //redirects to register.php
  }
}
?>