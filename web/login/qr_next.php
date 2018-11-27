<?php
            session_start();
            header("Content-Type: text/html;charset=UTF-8");
            $conn = mysqli_connect("127.0.0.1","root","1234qwer","knumember");

            $myuserid=addslashes($_GET['id']);
            $mypassword=addslashes($_GET['password']); 
            $addr = $_GET['address'];
            echo $myuserid." ".$mypassword." ".$addr;
            $sql="SELECT wallet_addr FROM member WHERE id='$myuserid' and password='$mypassword'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_array($result);
            //$active=$row['active'];
            
            
            $count=mysqli_num_rows($result);
            // If result matched $myusername and $mypassword, table row must be 1 row
            if($count==1)  //count가 1이라는 것은 아이디와 패스워드가 일치하는 db가 하나 있음을 의미합니다. 
            {
            $_SESSION['username']=$myuserid;
            $_SESSION['my_addr']=$row[0];
            //debug_to_console("here");
            $link="http://54.145.119.133/transaction.php?address=".$addr;
            header("location: ".$link);
            }
            else 
            {
                $error="Your Login Name or Password is invalid";
            }

            function debug_to_console( $data ) {
                $output = $data;
                if ( is_array( $output ) )
                    $output = implode( ',', $output);
            
                echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
            }
?>