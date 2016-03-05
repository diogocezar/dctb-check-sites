<?php
	/**
	* Sites to check
	*/
	$sites = array(
		'http://www.google.com',
		'http://www.yahoo.com',
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
	$hour_send_report = 16;

	/**
	* From email
	*/
	$from_email = "";

	/**
	* From name
	*/
	$from_name = "Your Server Name";

	/**
	* Emails to send report
	*/
	$emails_report = array(
		'email1@gmail.com',
		'email2@gmail.com'
	);

	/**
	* Mail Type Key to send an Email
	*/
	$mail_type = "sendgrid";

	/**
	* Mandrill Key to send an Email
	*/
	$mandrill_key = "";

	/**
	* SendGrid Key to send an Email
	*/
	$sendgrid_key = "";

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
	$debug = false;
?>