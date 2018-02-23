<?php
define('host', 'localhost');
define('username', 'amin');
define('password', 'coegsekali1');
define('db_name', 'app_surat');

$konek = NEW mysqli(host, username, password, db_name) or die(mysqli_error());

?>