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
    <title>RECORDS :: KNU COIN</title>
    <link rel="stylesheet" type="text/css" href="css/intro.css">
    <link rel="stylesheet" type="text/css" href="css/component.css">
    <link rel="stylesheet" href="css/button.css">
</head>

<body>
    <div class="main_title">
        <div class="logout">
            <?=$_SESSION['username']?>님
            <a class="button" href="login/logout.php">logout</a>
            <a class="button b2" href="main.php">home</a>
        </div>
        <div class="title">
            <a href="records.html">
                <img src="images/records/records_title.png" alt="KNU RECORDS">
            </a>
        </div>
        <div class="rec_menu">
            <ul>
                <li id="search record">
                    <a target=mains href="search.html">
                        <img src="images/records/search_records.png" alt="SEARCH RECORD">
                    </a>
                </li>
                <li id="receipt">
                    <a target=mains href="receipt.html">
                        <img src="images/records/receipt.png" alt="RECEIPT">
                    </a>
                </li>
                <li id="satisfaction">
                    <a target=mains href="https://docs.google.com/forms/d/e/1FAIpQLSfi8VS4jTAxob5e6E7smKMHBOOuXXZ_3_XWPP6GUTjpL9dYzQ/viewform?usp=sf_link">
                        <img src="images/records/satisfaction.png" alt="SATISFACTION">
                    </a>
                </li>
                <li id="QNA">
                    <a target=mains href="qna.html">
                        <img src="images/records/qna.png" alt="Q&A">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="contents">
        <iFrame Name=mains width="100%" height=1000px Scrolling=no src="qna.html"
         MarginWidth=0 MarginHeight=0 FrameBorder=0></iFrame>
    </div>
</body>

</html>