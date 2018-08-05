<html>
    <head>
        <title>ONGC IP address portal</title>
    </head>
   <?php
   session_start(); //starts the session
   if($_SESSION['user']){ // checks if the user is logged in  
   }
   else{
      header("location: index.php"); // redirects if user is not logged in
   }
   $user = $_SESSION['user']; //assigns user value
   ?>
    <body>
      <style>
          .welcome-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 32px;
            text-align: center;
          }
          .welcome-txt2
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 24px;
            text-align: center;
          }
          .info-txt
          {
            color:#a5302e;
            font-family: Britannic Bold;
            font-size: 18px;
          }
          .to-txt
          {
            color:#fecc00;
            font-family: Britannic Bold;
            font-size: 20px;
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
        <h2 class="welcome-txt2">Hello <?php Print "$user"?>!</h2> <!--Display's user name-->
        <h1 class="welcome-txt">______________________________Welcome to the IP address portal______________________________</h1>
        <img class="ongc-logo" src="final.png" alt="ONGC Logo">
        <p style="color:#fecc00">------------------------------------------</p>
        <div style="padding-left:680px">
          <a href="logout.php" class="info-txt">Click here to go logout</a><br/><br/>
        </div>
        <div class="info-txt" style="padding-left:20px">
          <p>This application will enable you to:</p>
          <ul>
            <li>View the IT assets in the company within the Ip address range that you will provide.</li>
            <li>View the OS details and up/down details of the said machines.</li>
            <li>Get detailed information about each asset.</li>
          </ul>
          <p>Provide the range of IP addressed below:</p>
        </div>
        <div class="red-bg to-txt" style="padding-left:660px">
          <form action="result.php" style="whitespace:nowrap overflow-x:auto" method="GET">
            <p style="color:#a5302e">------------------------------------------</p>
            <input type="text" required placeholder="192.168.43.x-y" style="display:inline-block" name="iprange">
            <button type="submit" class="btn btn-block btn-primary" style="display:inline-block">Submit</button>
            <p style="color:#a5302e">------------------------------------------</p>
          </form>
        </div>
          <p class="creator-txt">-Coded and Created by Udit Rawat as a part of ONGC Summer Internship 2018-</p>
      </div>   
          
    </body>
</html>  
