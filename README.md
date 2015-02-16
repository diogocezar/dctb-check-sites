#Check Sites#

Check Sites is a script to check hourly if each site in a list is online.

##What is Check Sites?##

With _Check Sites_ you can recive by email every day in an especific hour, a report that contais the last 24 hours sites status checks.

##Technologies##

The system was developed based at:

* PHP 5.x

##Usage##

To use Check Sites, just fill the file _config/config.php_

We use mandrill API to send the e-mail.

##Other##

* We use temp files in _logs/*_ to store site status and log them.