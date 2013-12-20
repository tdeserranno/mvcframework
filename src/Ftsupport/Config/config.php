<?php

/** Application config file
 *  Contains defined constants needed for DB access
 *  (could be rewritten to class format)
 */

define('DB_HOST', 'localhost');
define('DB_NAME', 'fueltechnic');
define('DB_USER', 'Thomas');
define('DB_PASS', 'e6627');

$dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
define('DB_DSN', $dsn);