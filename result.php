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
			.results-txt
			{
				color:#a5302e;
				font-family: Britannic Bold;
				font-size: 24px;
				text-align: center;
			}
			.back-txt
			{
				color:#a5302e;
				font-family: Britannic Bold;
				font-size: 18px;
				text-align: center;
			}
			.link-txt
			{
				color:#fecc00;
				font-family: Britannic Bold;
				font-size: 18px;
				text-align: left;
				padding-left: 150px;
			}
			.creator-txt
			{
				color:#a5302e;
				font-family: Britannic Bold;
				font-size: 12px;
				text-align: center;
			}
			.size
			{
				font-size:26px;
				color:white;
				text-align: left;
			}
		</style>

		<div class="yellow-bg">
			<img class="ongc-logo" src="final.png">
			<div style="padding-left:700px">
	          </br><a href="home.php" class="back-txt">Click here to go back</a><br/><br/>
	        </div>
			<p class="results-txt" style="text-align: center">The following results were found for your query.</p>		
			
			<div class="red-bg link-txt">
				<p style="color:#a5302e">------------------------------------------</p>
				<?php
					session_start();
				    $bool = true;

					$con=mysqli_connect("localhost", "root", "","ongc") or die (mysql_error()); //Connect to server
    				mysqli_select_db($con,"ongc") or die ("Cannot connect to database"); //Connect to database
    				
					set_time_limit(0);
					if (isset($_GET['iprange']))
					{
						$iprange = $_GET['iprange'];
					}
					else $iprange = "192.168.43.220-225";

					$explodedarray =explode('-',$iprange) ;
					$loopend =  $explodedarray[1];

					$explodedarray2 = explode('.' , $explodedarray[0]);
					$ippart1 =  $explodedarray2[0];
					$ippart2 =  $explodedarray2[1];
					$ippart3 = $explodedarray2[2];
					$loopbegin = $explodedarray2[3];

					$i=$loopbegin;

					$delquery = "DELETE FROM info";
					if(mysqli_query($con , $delquery))
					{
						//echo 'All records cleared';
					}

					echo "<p class=\"size\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."IP Address"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Manufacturer Details"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."OS and Version Details</p>";
					echo '-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</br>';
					
					for($i;$i<=$loopend;)
					{
						$ip = $ippart1.'.'.$ippart2.'.'.$ippart3.'.'.$i;
						//echo $ip.'</br>';
						$query = 'ping -n 1'.' '.$ip;
						//echo $query.'</br>';
						
						$pingoutput = shell_exec($query);
						$matchtext = "Pinging with 32 bytes of data:
						Reply from : bytes=32 time< TTL=
						Ping statistics for :
						Packets: Sent = 1, Received = 1, Lost = 0 (0% loss),
						Approximate round trip times in milli-seconds:
						Minimum = 0ms, Maximum = 0ms, Average = 0ms";
						similar_text($pingoutput, $matchtext, $percentage);

						if ($percentage >=80)
						{
							//echo 'Host is up , IP address :'.$ip.'</br>';

							$manufacturerquery = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc computersystem get Manufacturer';
							$usernamequery = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc computersystem get username';
							$osquery = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc os get caption,version';
							$drivequery = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc memorychip get devicelocator , capacity';
							$logicaldisk = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc logicaldisk get name,filesystem';
							$printer = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc printer get name,deviceid';
							$printjob = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc printerjob get document,description';
							$cpu = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc cpu get Name, Caption, MaxClockSpeed';
							$serialno = 'wmic /node:'.$ip.'/USER:"'.$ip.'\ongc" /PASSWORD:ongc os get serialnumber';

							$manufacturerqueryshell = shell_exec($manufacturerquery);
							if(strlen($manufacturerqueryshell)==4){

							$manufacturerqueryshell = shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "dmidecode -s system-manufacturer"');


							}

							$usernameshell = shell_exec($usernamequery);
							if(strlen($usernameshell)==4){
							$usernameshell=shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "whoami"');

							}
							$osqueryshell=shell_exec($osquery);
							if(strlen($osqueryshell)==4){
							$osqueryshell=shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "lsb_release -a"');

							}
							$drivequeryshell=shell_exec($drivequery);
							if(strlen($drivequeryshell)==4){
							$drivequeryshell='<pre>'.shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "free"').'</pre>';

							}
							$logicaldiskshell=shell_exec($logicaldisk);


							$printershell = shell_exec($printer);
							$printjobshell= shell_exec($printjob);
							$cpushell=shell_exec($cpu);
							$vgaquery = '"lspci  -v -s  $(lspci | grep " VGA " | cut -d" " -f 1)"'."'";
							$vgashell='<pre>'.shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C '.$vgaquery).'</pre>';
							if(strlen($cpushell)==4){
							$cpushell='<pre>'.shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "dmidecode -s  processor-version"').'</pre>';

							}
							$serialnumbershell=shell_exec($serialno);
							if(strlen($serialnumbershell)==4){
							$serialnumbershell='<pre>'.shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "dmidecode -s system-serial-number"').'</pre>';

							}
							$mountedfilesystem = '<pre>'.shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "findmnt -lo source,target,fstype,label,options,used -t ext4"').'</pre>';
							$availusers =  '<pre>'.shell_exec('plink.exe root@'.$ip.' -pw ongc123 -C "getent passwd"').'</pre>';
							

					
							$insertquery = mysqli_query($con,"INSERT INTO info (`ip`, `manufacturer`,`hostname`, `os`, `processor`, `ram`,`videocard`, `localdd`, `mountedfile`,`availuser`, `printer`, `ssn`, `updown`, `uid`) VALUES('$ip' ,'$manufacturerqueryshell','$usernameshell','$osqueryshell','$cpushell','$drivequeryshell','$vgashell','$logicaldiskshell','$mountedfilesystem','$availusers','$printershell','$serialnumbershell','UP','')");
							
							$link='details.php';
							echo"<a href='$link?ip=$ip' style=\"color:white\">View details</a>";
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ip &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							echo "$manufacturerqueryshell &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
							echo $osqueryshell."</br>";
							echo '-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</br>';
					
						}
						else if($percentage<80)
						{
							$downinsertquery = mysqli_query($con,"INSERT INTO INFO(`ip`,`manufacturer`,`hostname`,`os`,`processor`,`ram`,`videocard`,`localdd`,`mountedfile`,`availuser`,`printer`,`ssn`,`updown`,`uid`) VALUES('$ip','Not available','Not available','Not available','Not available','Not available','Not available','Not available','Not available','Not available','Not available','Not available','DOWN','')");
							
							$link1='details.php';
							echo"<a href='$link1?ip=$ip' style=\"color:white\">View details</a>";
							echo "<span style=\"color:#d83936\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $ip"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;". "Not available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Not available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></br>";
							echo '-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</br>';
					
						}
						
						$i=$i+1;
					}//for loop ends					

				?>
				<p style="color:#a5302e">------------------------------------------</p>
			</div>

			<p class="creator-txt">-Coded and Created by Udit Rawat as a part of ONGC Summer Internship 2018-</p>
		</div>
	</body>
</html>



