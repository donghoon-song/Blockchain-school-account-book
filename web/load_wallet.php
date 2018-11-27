<?php
    session_start();
    header("Content-Type: text/html;charset=UTF-8");
    $conn = mysqli_connect("127.0.0.1","root","1234qwer","knumember");
    $id = $_GET['id'];
    $query_idchk="SELECT * FROM member WHERE id ='$id'";
    $result=mysqli_query($conn, $query_idchk);
    $row=mysqli_fetch_array($result);
    echo $row['wallet_addr'];
    //printf("%s\n",$row[0]);
    //debug_to_console($row['wallet_addr']);
    
    //$address .= $row[0];
    //$newstring = implode(", ", preg_split("/[\0-9]+/", $address));
   // echo $newstring;

    mysqli_close($conn);


    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);
    
        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
?>