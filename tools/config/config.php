<?php

// Localhost Credentials 

define("DB_HOST", "localhost");
define("DB_NAME", "polaris");
define("DB_USER", "root");
define("DB_PASS", "");

// Server Credentials 
/*
define("DB_HOST", "localhost");
define("DB_NAME", "polaris");
define("DB_USER", "polaris");
define("DB_PASS", "polaris123!");
*/
define("COOKIE_RUNTIME", 1209600);
define("COOKIE_DOMAIN", ".letmeknow.cupidic.com");
define("COOKIE_SECRET_KEY", "1gp@TMPS{+$78sfpMJFe-92s");

define("EMAIL_USE_SMTP", false);
define("EMAIL_SMTP_HOST", "localhost");
define("EMAIL_SMTP_AUTH", true);
define("EMAIL_SMTP_USERNAME", "yourusername");
define("EMAIL_SMTP_PASSWORD", "yourpassword");
define("EMAIL_SMTP_PORT", 465);
define("EMAIL_SMTP_ENCRYPTION", "ssl");

define("EMAIL_PASSWORDRESET_URL", "http://letmeknow.cupidic.com/password_reset.php");
define("EMAIL_PASSWORDRESET_FROM", "letmeknow2479@gmail.com");
define("EMAIL_PASSWORDRESET_FROM_NAME", "Let Me Know");
define("EMAIL_PASSWORDRESET_SUBJECT", "Password reset for Let Me Know");
define("EMAIL_PASSWORDRESET_CONTENT", "Please click on this link to reset your password:");

define("EMAIL_VERIFICATION_URL", "http://letmeknow.cupidic.com/register.php");
define("EMAIL_VERIFICATION_FROM", "letmeknow2479@gmail.com");
define("EMAIL_VERIFICATION_FROM_NAME", "Let Me Know");
define("EMAIL_VERIFICATION_SUBJECT", "Account activation for Let Me Know");
define("EMAIL_VERIFICATION_CONTENT", "Please click on this link to activate your account:");

define("HASH_COST_FACTOR", "10");