<?php
session_start();
unset($_SESSION['username']);
header("Location:login_customer.php");
session_destroy();



?>