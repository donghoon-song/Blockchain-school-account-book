<?php
    header("Content-Type: text/html;charset=UTF-8");
    $conn = mysqli_connect("127.0.0.1","root","1234qwer","knumember");
    $id = $_GET['id'];
	
//	echo $id;	

    $query_idchk="select count(*) from member where id ='$id'";
    $idresult=mysqli_query($conn, $query_idchk);
    $row=mysqli_fetch_array($idresult);
//	print_r(mysqli_fetch_array($idresult);
//	printf("%s",$row[0]);
	echo $row[0];

    mysqli_close($conn);
?>

