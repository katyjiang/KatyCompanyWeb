<?php


define('PATH_LIB', __DIR__ . DIRECTORY_SEPARATOR);

// DATABASE SETTINGS
// Amazon Web Service connection

define('DB_HOST', $_SERVER['RDS_HOSTNAME']);
define('DB_NAME', $_SERVER['RDS_DB_NAME']);
define('DB_USER', $_SERVER['RDS_USERNAME']);
define('DB_PASSWORD', $_SERVER['RDS_PASSWORD']);
define('SERVER_PORT', $_SERVER['RDS_PORT']);
define('PUBLIC_IMAGE_FOLDER', 'https://www.katyjiang.com/images/');
define('WEB_ROOT', 'https://www.katyjiang.com/');

/*

// Localhost connection

define('DB_HOST', 'localhost');
define('DB_NAME', 'katyco');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('SERVER_PORT', 8889);
define('PUBLIC_IMAGE_FOLDER', 'https://localhost:443/images/');
define('WEB_ROOT', 'https://localhost:443/');


*/



?>