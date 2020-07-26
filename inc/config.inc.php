<?php

// Set all the database things!
define("DB_HOST", "localhost");  
define("DB_USER", "root");  
define("DB_PASS", "");  
define("DB_NAME", "photo_gallery");  
define("DB_PORT",   3308);  

// Set the error log things!
define('LOGFILE','log/error_log.txt');
ini_set("log_errors", TRUE);  
ini_set('error_log', LOGFILE); 
?>