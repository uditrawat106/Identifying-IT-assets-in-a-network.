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
      <h1 class="welcome-txt">________________________________________________Login Page________________________________________________</h1>
      <img class="ongc-logo" src="final.png" alt="ONGC Logo">
      <div style="padding-left:720px">
        <br/><br/><a href="index.php" style="color: #a5302e" class="info-txt">Click here to go back</a><br/><br/>
      </div>
      <form action="checklogin.php" method="POST">
        <div class="red-bg to-txt" style="padding-left:660px">
           Enter Username: <input style="color:#fecc00" type="text" name="username" required="required" /> <br/>
           Enter password : <input style="color:#fecc00" type="password" name="password" required="required" /> <br/>
        </div>
        <div class="red-bg to-txt" style="padding-left:770px">            
           <input style=" text-align:center padding-left:200px" type="submit" value="Login"/>
        </div>
      </form>
      <p class="creator-txt">-Coded and Created by Udit Rawat as a part of ONGC Summer Internship 2018-</p>
    </div>
  </body>
</html>


