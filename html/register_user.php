<?php
	header("Content-Type: text/html;charset=UTF-8");

	$host = 'localhost';
	$user = 'root';
	$pw = '1234qwer';
	$dbName = 'knumember';
	$mysqli = new mysqli($host, $user, $pw, $dbName);

	if (mysqli_connect_error()) {
	  exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$data_stream = "'".$_GET['id']."','".$_GET['password']."','".$_GET['name']."','".$_GET['email']."','".$_GET['wallet_addr']."'";
	$query = "insert into member(`id`, `password`, `name`, `email`, `wallet_addr`) values (".$data_stream.")";

	$result = mysqli_query($conn, $query);
     
    	if($result)
      		echo "1";
    	else
      		echo "-1";
     
	mysqli_close($conn);
?>
