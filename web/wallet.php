<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: ./intro.html');
}
$user_id = $_SESSION['username'];
//echo $_SESSION['username'];
debug_to_console($_SESSION['username']);

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
?>


<!doctype html>
<html>

<head>
    <meta charset="utf-8"/>
    <script type="text/javascript" src="createQR/src/jquery.min.js"></script>
    <script type="text/javascript" src="createQR/src/qrcode.js"></script>
    <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
    <script type="text/javascript" src="./web3/bower_components/web3/dist/web3.min.js"></script>
    <title>WALLET :: KNU COIN</title>

    <!-- css styles -->
    <link rel="stylesheet" type="text/css" href="css/intro.css">
    <link rel="stylesheet" href="css/button.css">
    
    <style>
        .contents{
            padding-top:100px;
            background:#e9e9e9;
            width:100%;
            text-align:center;
            padding-bottom:50px;
        }
        input{
            margin-bottom:10px;
        }
        button{
            width:130px;
            height:50px;
            -webkit-border-radius: 13;
            -moz-border-radius: 13;
            border-radius: 13px;
            font-family: Arial;
            color: #ffffff;
            font-size: 20px;
            background: #3b8f77;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        }
        button:hover{
            background: #51b497;
            text-decoration: none;
        }
        input{
            background-image: linear-gradient(top, rgba(0, 0, 0, 0.02) 0%, rgba(255, 255, 255, 0.02) 50%);
            border: 0px solid rgba(0, 0, 0, 0.16);
            height: 45px;
            padding: 5px 10px 5px 10px;
            font-size: 15px;
            width: 60%;
            border-radius: 10px;
            background:#ffd562;
        }
      
       
        
    </style>

</head>

<body>
<!-- upside banner -->
    <div class="main_title">
        <div class="logout">
            <?=$_SESSION['username']?>님
            <a class="button" href="login/logout.php">logout</a>
            <a class="button b2" href="main.php">home</a>
        </div>
        <div class="title">
            <a id="logo" href="wallet.php">
                <img src="images/wallet/wallet_title.png" alt="WALLET">
            </a>
        </div>
    </div>
    <!-- qrcode and balance -->
    <div class="contents">
        <button onclick="makeCode()">Generate</button>
        <input id="address" type="text" placeholder="버튼을 누르면 여기에 지갑주소가 표시됩니다"/><br>
        <br>
        <button onclick="showBalances()">Balance</button>
        <input id="balance" type="text" placeholder="버튼을 누르면 여기에 잔고가 표시됩니다"/><br>
    

        <br><br>
        <div id="qrcode" style="margin-left:40vw">
        </div>
    </div>

        <script type="text/javascript">
              var Web3 = require('web3');
            web3 = new Web3(new Web3.providers.HttpProvider("http://54.145.119.133:8545"));
            // web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
              // web3 = new Web3(new Web3.providers.HttpProvider('https://ropsten.infura.io/IA462256D6J1K3ZSGFUMXCCSZRAQXEE5ZZ'));
            var KNU = web3.eth.contract([
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "address"
            }
        ],
        "name": "walletname",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "totalSupply",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "symbol",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "owner",
        "outputs": [
            {
                "name": "",
                "type": "address"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "name",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "address"
            }
        ],
        "name": "id",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            }
        ],
        "name": "getwalletname",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            }
        ],
        "name": "getID",
        "outputs": [
            {
                "name": "",
                "type": "string"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            }
        ],
        "name": "getBalance",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "address"
            }
        ],
        "name": "free",
        "outputs": [
            {
                "name": "",
                "type": "int8"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "decimals",
        "outputs": [
            {
                "name": "",
                "type": "uint8"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "address"
            }
        ],
        "name": "blacklist",
        "outputs": [
            {
                "name": "",
                "type": "int8"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "address"
            }
        ],
        "name": "balanceOf",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "type": "function",
        "stateMutability": "view"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            }
        ],
        "name": "Freecoin",
        "outputs": [],
        "payable": false,
        "type": "function",
        "stateMutability": "nonpayable"
    },
    {
        "anonymous": false,
        "inputs": [
            {
                "indexed": true,
                "name": "from",
                "type": "address"
            },
            {
                "indexed": true,
                "name": "to",
                "type": "address"
            },
            {
                "indexed": false,
                "name": "value",
                "type": "uint256"
            }
        ],
        "name": "Transfer",
        "type": "event"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            }
        ],
        "name": "blacklisting",
        "outputs": [],
        "payable": false,
        "type": "function",
        "stateMutability": "nonpayable"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            }
        ],
        "name": "deleteFromBlacklist",
        "outputs": [],
        "payable": false,
        "type": "function",
        "stateMutability": "nonpayable"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            },
            {
                "name": "_id",
                "type": "string"
            }
        ],
        "name": "setID",
        "outputs": [],
        "payable": false,
        "type": "function",
        "stateMutability": "nonpayable"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_add",
                "type": "address"
            },
            {
                "name": "_name",
                "type": "string"
            }
        ],
        "name": "setwalletname",
        "outputs": [],
        "payable": false,
        "type": "function",
        "stateMutability": "nonpayable"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "_from",
                "type": "address"
            },
            {
                "name": "_to",
                "type": "address"
            },
            {
                "name": "_value",
                "type": "uint256"
            }
        ],
        "name": "transfer",
        "outputs": [],
        "payable": false,
        "type": "function",
        "stateMutability": "nonpayable"
    },
    {
        "inputs": [
            {
                "name": "_supply",
                "type": "uint256"
            },
            {
                "name": "_name",
                "type": "string"
            },
            {
                "name": "_symbol",
                "type": "string"
            },
            {
                "name": "_decimals",
                "type": "uint8"
            }
        ],
        "type": "constructor",
        "payable": true,
        "stateMutability": "payable"
    }
]);

var KNUInstance = KNU.at("0xe18b6bdc73a11d104d356184434ff014656c220b");
                //var Web3 = require("web3");
                //web3 = new Web3(new Web3.providers.HttpProvider("http://54.145.119.133:8545"));
                //web3.var={timeout:20000, headers:[{name:"Access-Control-Allow-Origin", value:"*"}]};
                web3.eth.defaultAccount = web3.eth.accounts[0];
                console.log(web3.eth.defaultAccount);
                var from_account = document.getElementById("address").value;

                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    width : 200,
                    height : 200
                });

                function makeCode () {
                    var request = new XMLHttpRequest();
                    var member_id = '<?= $user_id ?>';
                    //alert(member_id);
                    var params = "?id=" + member_id;
                    var wallet_addr;
                    //alert(params);
                    //alert($_SESSION['username']);
                    //alert(params);
                    request.open("GET","load_wallet.php"+ params,true);
                    request.onreadystatechange = function(){
                        if (request.readyState == 4) 
                        { //서버로부터 응답상태
                            if (request.status == 200 || request.status == 0) 
                            {//200 : 웹 서버의 응답처리상태
                             wallet_addr = request.responseText;
                                //alert(wallet_addr);
                                document.getElementById("address").value=wallet_addr;
                                qrcode.makeCode("http://54.145.119.133/login/qr_login.php?address="+wallet_addr);
                                
                            }
                            else{
                                //alert("status != 200");
                            }
                        }
                        else{
                            //alert("readyState != 4");
                        }
                    }
                    request.send(null);
                    /*
                    if (!elText.value) {
                        alert("Input a text");
                        elText.focus();
                        return;
                    }
                    */
                    
                }
                function createWallet(){

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

               function showBalances(){
  // var wallet1 = web3.eth.accounts[0];
  from_account = document.getElementById("address").value;

  var wallet1 = from_account;
  var coin1 = KNUInstance.balanceOf(wallet1).toNumber();
  document.getElementById("balance").value=coin1;
  console.log(coin1);
};


          </script>


           <div class="wallpaper">
    <img src="images/wallet/wallet_wallpaper.png" style='width: 100%; object-fit: contain'/>
    <img src="images/wallet/wallet_wallpaper2.png" style='width: 100%; object-fit: contain'/>
    </div>
      </body>

      </html>

