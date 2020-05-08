<?php
session_start();
unset($_SESSION['username2']);
header("Location:login_employee.php");
session_destroy();



?>