<?php
set_time_limit(0);
if (isset($_GET['iprange'])){
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
for($i;$i<=$loopend;)
{
	$ip = $ippart1.'.'.$ippart2.'.'.$ippart3.'.'.$i;
	echo $ip.'</br>';
	$query = 'ping -n 1'.' '.$ip;
	echo $query.'</br>';
	
$pingoutput = shell_exec($query);
$matchtext = "Pinging with 32 bytes of data:
Reply from : bytes=32 time< TTL=
Ping statistics for :
Packets: Sent = 1, Received = 1, Lost = 0 (0% loss),
Approximate round trip times in milli-seconds:
Minimum = 0ms, Maximum = 0ms, Average = 0ms";
similar_text($pingoutput, $matchtext, $percentage);
if ($percentage >=85){
	echo 'Host is up , IP address :'.$ip.'</br>';


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
$usernameshell = shell_exec($usernamequery);
$osqueryshell=shell_exec($osquery);
$drivequeryshell=shell_exec($drivequery);
$logicaldiskshell=shell_exec($logicaldisk);
$printershell = shell_exec($printer);
$printjobshell= shell_exec($printjob);
$cpushell=shell_exec($cpu);
$serialnumbershell=shell_exec($serialno);


echo '<pre>'.$manufacturerqueryshell.'</pre>';
echo '<pre>'.$usernameshell.'</pre>';
echo '<pre>'.$osqueryshell.'</pre>';
echo '<pre>'.$drivequeryshell.'</pre>';
echo '<pre>'.$logicaldiskshell.'</pre>';
echo '<pre>'.$printershell.'</pre>';
echo '<pre>'.$printjobshell.'</pre>';
echo '<pre>'.$cpushell.'</pre>';
echo '<pre>'.$serialnumbershell.'</pre>';










}

else if($percentage<85){
	echo 'Host is down..</br>';
}
	$i=$i+1;

}








?>