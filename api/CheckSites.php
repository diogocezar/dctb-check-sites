<?php
	class CheckSites{
		public function isDomainAvailible($domain){
			if(!filter_var($domain, FILTER_VALIDATE_URL))
				return false;
			$curlInit = curl_init($domain);
			curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
			curl_setopt($curlInit,CURLOPT_HEADER,true);
			curl_setopt($curlInit,CURLOPT_NOBODY,true);
			curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
			$response = curl_exec($curlInit);
			curl_close($curlInit);
			if ($response) 
				return true;
			return false;
		}
		public function sendReport($file_online, $file_offline, $emails){
			global $title_report, $label_online, $label_offline, $from_email, $from_name, $from_email, $debug, $mandrill_key, $sendgrid_key, $sent_successfully, $send_error, $mail_type;
			$content = "";
			$file_online_read = fopen($file_online, "r");
			if(filesize($file_online) > 0)
				$content_online = nl2br(fread($file_online_read,filesize($file_online)));
			fclose($file_online_read);
			$file_offline_read = fopen($file_offline, "r");
			if(filesize($file_offline) > 0)
			$content_offline = nl2br(fread($file_offline_read,filesize($file_offline)));
			fclose($file_offline_read);
			$content .= "<html lang=\"pt-BR\"><head><meta charset=\"UTF-8\"></head><body>";
			$content .= "<h1>".$title_report."</h1>";
			if(!empty($content_online)){
				$content .= "<h2>".$label_online."</h2>";
				$content .= $content_online;
				$content .= "<br/><br/>";
			}
			if(!empty($content_offline)){
				$content .= "<h2>".$label_offline."</h2>";
				$content .= $content_offline;
				$content .= "<br/><br/>";
			}
			$content .= "</body></html>";
			file_put_contents($file_online, "");
			file_put_contents($file_offline, "");
			$subject = $title_report . ' - ' . date("d-m-Y H:i:s");
			switch($mail_type){
				case 'mandrill' : 
					try {
						$mandrill = new Mandrill($mandrill_key);
						$list_to_send = array();
						foreach ($emails as $key => $value) {
							$list_to_send[] = array('email' => $value, 'type' => 'to');
						}
						$message  = array(
									'html' 		 => $content,
									'subject' 	 => $subject,
									'from_email' => $from_email,
									'from_name'  => $from_name,
									'headers' 	 => array('Reply-To' => $from_email),
									'to' 		 => $list_to_send
									);

						$async 	= false;
						$result = $mandrill->messages->send($message, $async);
						if($result[0]['status'] == 'sent' && $debug){
							echo $sent_successfully;
						}
					}
					catch(Mandrill_Error $e) {
						if($debug){
							echo $send_error;
						}
					}
				break;
				case 'sendgrid' :
					$sendgrid = new SendGrid($sendgrid_key);
					$mail     = new SendGrid\Email();
					foreach ($emails as $email => $name) {
						$mail->addTo($email);
					}
					$mail->setFrom($from_email)
						 ->setSubject($subject)
						 ->setHtml($content);
					try {
						$sendgrid->send($mail);
						if($debug){
							echo $sent_successfully;
						}
					}
					catch(\SendGrid\Exception $e) {
						print($e);
						if($debug){
							echo $send_error;
						}
					}
				break;
			}
		}
	}
?>