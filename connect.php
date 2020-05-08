<?php

	$pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=customer','root','');
	$pdo2 = new PDO('mysql:host=127.0.0.1;port=3306;dbname=employee','root','');
	$customer=mysqli_connect('127.0.0.1','root','','customer');
	$employee=mysqli_connect('127.0.0.1','root','','employee');

?>