<?php
    header("Content-Type: text/html;charset=UTF-8");

    $conn = mysqli_connect("127.0.0.1","root","1234qwer","knumember");   
    $data_stream = "'".$_GET['id']."','".$_GET['password']."','".$_GET['name']."','".$_GET['email']."','".$_GET['wallet_addr']."'";
    
    $query = "insert into member(`id`, `password`, `name`, `email`, `wallet_addr`) values (".$data_stream.")";
    $result = mysqli_query($conn, $query);
     
    if($result)
      echo "1";
    else
      echo "-1";
    
    mysqli_close($conn);
?>
