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

*IMPORTANT*

If you want to run this correctly, please include a cron job that hourly invokes the script like:

```
# m h dom mon dow user command
0 0,2,4,6,8,10,12,14,16,18,20,22 * * *	root	cd /var/www/dctb-check-sites/ && php index.php
```

##Other##

* We use temp files in _logs/*_ to store site status and log them.