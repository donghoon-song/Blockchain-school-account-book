<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" charset="utf-8"/>
    <meta http-equiv="P3P" content='policyref="http://w.about.com/w3c/p3p.xml"'>
    <script type="text/javascript" src="createQR/src/jquery.min.js"></script>
    <script type="text/javascript" src="createQR/src/qrcode.js"></script>
    <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
    <script type="text/javascript" src="./web3/bower_components/web3/dist/web3.min.js"></script>
    
    <title>WALLET :: KNU COIN</title>
    <style>

    .contents
    {
        float:left;
        width:100%;
        margin:0 auto;
        padding-top : 50px;
        text-align:center;
    }
</style>
</head>
<body>
    <div class="contents" margin-left:500px>
        <!-- <iFrame Name=mains width=1200px height=1000px Scrolling=no
            MarginWidth=0 MarginHeight=0 FrameBorder=0></iFrame> -->
            <input id="address" type="text"  style="width:50%" /><br />
            <!--
            <button onClick="createWallet()">Create Wallet</button><br/>
            <br>
            -->
            <button onclick="makeCode()">Generate</button><br>
            <br>
            <button onclick="downloadTxt('KNUCoinWallet.txt')">Download text version</button>
            <br>

            <div id="qrcode" style="width:200px; height:200px; margin-top:30px; margin-left:500px"></div>

            <script type="text/javascript">
                var Web3 = require("web3");
                web3 = new Web3(new Web3.providers.HttpProvider("http://54.145.119.133:8545"));
                //web3.var={timeout:20000, headers:[{name:"Access-Control-Allow-Origin", value:"*"}]};
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width : 200,
                    height : 200
                });

                function makeCode () {
                    var request = new XMLHttpRequest();
                    //var member_id = '<?= $user_id ?>';
                    alert(member_id);
                    var params = "?id=" + $_SESSION['username'];
                    alert($_SESSION['username']);
                    alert(params);
                    request.open("GET","load_wallet.php"+ params,true);
                    request.onreadystatechange = function(){
                        var wallet_addr = request.responseText;
                        document.getElementById("address").value=wallet_addr;
                    }
                    
                    if (!elText.value) {
                        alert("Input a text");
                        elText.focus();
                        return;
                    }
                    qrcode.makeCode("http://ec2-54-145-119-133.compute-1.amazonaws.com/transaction.html?address="+elText.value);
                }
                function createWallet(){
                    
                    
                    /*
                    var input = prompt("Please enter your password");
                    if (input==null || input==""){
                        password="invalid password"
                    }
                    else{
                        password=input;
                    }
                    */
                    
                    // web3.eth.personal.newAccount(password).then(console.log);
                    //var newAccount = web3.personal.newAccount(password);
                    //var length = web3.eth.accounts.length-1;
                    //console.log(web3.eth.accounts);
                    //document.getElementById("address").value=web3.eth.accounts[length];
                }

                function downloadTxt(filename) {
                    var text = document.getElementById("address").value;
                    var element = document.createElement('a');
                    element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
                    element.setAttribute('download', filename);
                    element.style.display = 'none';
                    document.body.appendChild(element);
                    element.click();
                    document.body.removeChild(element);
                  }

                  function prepHref(linkElement) {
                      var myDiv = document.getElementById('fullsized_image_holder');
                      var myImage = myDiv.children[0];
                      linkElement.href = myImage.src;
                  }


            </script>

        </div>

    </body>
    </html>

<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: ./intro.html');
}
$user_id = $_SESSION['username'];
echo $_SESSION['username'];
debug_to_console($_SESSION['username']);

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

?>
