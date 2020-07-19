<?php
session_start();

SESSiON_unset();
SESSiON_destroy();

header("location: login.php");
exit;


?>