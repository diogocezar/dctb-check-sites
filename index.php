<?php 
	include('./config/config.php');
	include('./api/vendor/autoload.php');
	include('./api/CheckSites.php');

	set_time_limit(0);

	$cs = new CheckSites();

	$file_logs_online      = "./logs/logs_online.txt";
	$file_logs_offline     = "./logs/logs_offline.txt";
	$file_logs_online_tmp  = "./logs/logs_online.tmp";
	$file_logs_offline_tmp = "./logs/logs_offline.tmp";

	$log_online  = "";
	$log_offline = "";

	if($debug) echo "<pre>";

	foreach ($sites as $key => $value) {
		if($cs->isDomainAvailible($value)){
			if($debug) echo "(". date("d-m-Y H:i:s") . ")" . "[ONLINE] " . $value . "\n";
			$log_online .= "[" . date("d-m-Y H:i:s") . "]" . " {ONLINE} " . " " . $value . "\n";
		}
		else{
			if($debug) echo "(". date("d-m-Y H:i:s") . ")" . "[OFFLINE] " . $value . "\n";
			$log_offline .= "[" . date("d-m-Y H:i:s") . "]" . " {OFFLINE} " . " " . $value . "\n";
		}
		sleep(1);
	}

	$file_online  = fopen($file_logs_online, "a+");
	$file_offline = fopen($file_logs_offline, "a+");

	if(!empty($log_online))
		fwrite($file_online, $log_online . "-------------------------------------------------------------------------------------------\n"); 
	if(!empty($log_offline))
		fwrite($file_offline, $log_offline . "-------------------------------------------------------------------------------------------\n"); 

	fclose($file_online);
	fclose($file_offline);

	$file_online_tmp = fopen($file_logs_online_tmp, "a+");
	$file_offline_tmp = fopen($file_logs_offline_tmp, "a+");

	if(!empty($log_online))
		fwrite($file_online_tmp, $log_online . "-------------------------------------------------------------------------------------------\n"); 
	if(!empty($log_offline))
		fwrite($file_offline_tmp, $log_offline . "-------------------------------------------------------------------------------------------\n"); 
	
	fclose($file_online_tmp);
	fclose($file_offline_tmp);

	if(date("H") == $hour_send_report){
		$cs->sendReport($file_logs_online_tmp, $file_logs_offline_tmp, $emails_report);
	}

	if($debug) echo "</pre>";
?>