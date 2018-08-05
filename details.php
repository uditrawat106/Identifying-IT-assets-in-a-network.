<html>
    <head>
        <title>ONGC IP address portal</title>
    </head>
    <body>
    	<style>
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
			.ongc-logo
			{
				display: block;
				margin-left: auto;
				margin-right: auto;	
				width: 800px;	
			}
			.title-txt
			{
				color:#a5302e;
				font-family: Britannic Bold;
				font-size: 42px;
				text-align: center;
			}
			.info-txt
			{
				color:#fecc00;
				font-family: Britannic Bold;
				font-size: 18px;
				padding-left: 300px;
			}
			.creator-txt
			{
				color:#a5302e;
				font-family: Britannic Bold;
				font-size: 12px;
				text-align: center;
			}
			.back-txt
			{
				color:#a5302e;
				font-family: Britannic Bold;
				font-size: 18px;
				text-align: center;
			}
		</style>

		<div class="yellow-bg title-txt">
			<img class="ongc-logo" src="final.png">
			<div>
	          </br><a href="result.php" class="back-txt">Click here to go back</a><br/>
	      	  <a href="home.php" class="back-txt">Search for a new range</a><br/></br>
	        </div>
	        <?php
	        	session_start();

				$con=mysqli_connect("localhost", "root", "","ongc") or die (mysql_error()); //Connect to server
    			mysqli_select_db($con,"ongc") or die ("Cannot connect to database"); //Connect to database
    				
				//set_time_limit(0);
				if (isset($_GET['ip']))
				{
					$ip= $_GET['ip'];
				}

				$query = mysqli_query($con,"Select * from info");  //query the info table
				while($row = mysqli_fetch_array($query)) //display all rows fron query
				{
				    $table_ip = $row['ip'];  //the first username row is passed on to $table_users, and so on
				    if($ip == $table_ip) //checks if there are any matching fields
				    {
				      $manu=$row['manufacturer'];
				      $host=$row['hostname'];
				      $opsys=$row['os'];
				      $pro=$row['processor'];
				      $rammem=$row['ram'];
				      $video=$row['videocard'];
				      $local=$row['localdd'];
				      $mounted=$row['mountedfile'];
				      $user=$row['availuser'];
				      $printerinfo=$row['printer'];
				      $ssno=$row['ssn'];
				      $status=$row['updown'];
				      echo 'Showing information for the IP address :'.$ip.'</br>';
				    }
				}
			?>
			<div class="red-bg info-txt" style="text-align:left">
				<p style="color:#a5302e">------------------------------------------</p>
				<?php
					echo "<u>Manufacturer  :</u>  ". "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$manu.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Hostname  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$host.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>OS and version details  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$opsys.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Processor details  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pro.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>RAM capacity  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$rammem.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Video card details  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$video.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Local file systems / disk drives  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$local.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Mounted network file systems  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$mounted.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Available users  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$user.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Attached devices  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$printerinfo.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>System serial number  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$ssno.'</br>';
					echo '________________________________________________________________________________________________________</br>';
					echo "<span style=\"color:#a5302e\">-</span></br>";
					echo '<u>Up/Down status  :</u>  '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$status.'</br>';
				?>
				<p style="color:#a5302e">------------------------------------------</p>
			</div>
			<p class="creator-txt">-Coded and Created by Udit Rawat as a part of ONGC Summer Internship 2018-</p>
		</div>
	</body>
</html>



