<?php

// Localhost Credentials 
define("DB_HOST", "localhost");
define("DB_NAME", "polaris");
define("DB_USER", "root");
define("DB_PASS", "");

// Server Credentials 
/*
	define("DB_HOST", "127.0.0.1");
	define("DB_NAME", "login");
	define("DB_USER", "root");
	define("DB_PASS", "mysql");
*/


define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".127.0.0.1");
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");

define("EMAIL_USE_SMTP", false);
define("EMAIL_SMTP_HOST", "yourhost");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "yourusername");
define("EMAIL_SMTP_PASSWORD", "yourpassword");
define("EMAIL_SMTP_PORT", 465);
define("EMAIL_SMTP_ENCRYPTION", "ssl");

define("EMAIL_PASSWORDRESET_URL", "http://127.0.0.1/php-login-advanced/password_reset.php");
define("EMAIL_PASSWORDRESET_FROM", "no-reply@example.com");
define("EMAIL_PASSWORDRESET_FROM_NAME", "My Project");
define("EMAIL_PASSWORDRESET_SUBJECT", "Password reset for PROJECT XY");
define("EMAIL_PASSWORDRESET_CONTENT", "Please click on this link to reset your password:");

define("EMAIL_VERIFICATION_URL", "http://127.0.0.1/php-login-advanced/register.php");
define("EMAIL_VERIFICATION_FROM", "no-reply@example.com");
define("EMAIL_VERIFICATION_FROM_NAME", "My Project");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for PROJECT XY");
define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");


define("HASH_COST_FACTOR", "10");
