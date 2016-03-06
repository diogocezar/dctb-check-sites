<?php
	/**
	* Sites to check
	*/
	$sites = array(
		'http://www.google.com',
		'http://www.yahoo.com'
	);

	/**
	* Report title
	*/

	$title_report = "Daily Report of Sites Status";

	/**
	* Label sites online
	*/

	$label_online = "Sites that have been online";

	/**
	* Label sites offline
	*/

	$label_offline = "Sites that have been offline";

	/**
	* Hour to send report
	*/

	$hour_send_report = 2;

	/**
	* From email
	*/
	$from_email = "email@server";

	/**
	* From name
	*/
	$from_name = "Server";

	/**
	* Emails to send report
	*/

	$emails_report = array('email@server.com' => 'Name');

	/**
	* Email type
	*/

	$mail_type = "sendgrid";

	/**
	* SendGrid Key to send an Email
	*/

	$sendgrid_key = "";

	/**
	* Mandrill Key to send an Email
	*/

	$mandrill_key = "";

	/**
	* Sent successfully
	*/

	$sent_successfully = "Email has been sent successfully.";

	/**
	* Error to send
	*/

	$send_error = "Sorry, the email can not be sent.";

	/**
	* Debug
	*/

	$debug = true;
?>
