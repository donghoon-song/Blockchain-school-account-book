<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: ./intro.html');
}

?>

<!doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <title>KNUCOIN</title>
        <link rel="stylesheet" href="css/button.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div class="main_title">
            <div class="logout">
                <?=$_SESSION['username']?>님
                <a class="button b1" href="login/logout.php">logout</a>
            </div>
            <div class="title">
                <a id="logo" href="main.html">
                    <img src="images/main/main_title.png" alt="KNUCOIN">
                </a>
            </div>
        </div>
        <div class="main_menu">
            <div class="menu">
                <ul>
                    <li class="wallet">
                        <a href="wallet.php">
                            <img src="images/main/wallet.png" alt="PRODUCE WALLET">
                        </a>
                    </li>
                    <li class="transaction">
                        <a href="transaction.php">
                            <img src="images/main/transaction.png"  alt="TRANSACTION">
                        </a>
                    </li>
                    <li class="records">
                        <a href="records.php">
                            <img src="images/main/records.png" alt="RECORDS">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>