<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('Location: ./intro.html');
}
$user_id = $_SESSION['username'];
//debug_to_console($_SESSION['username']);

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
        <meta charset="utf-8">
        <script type="text/javascript" src="createQR/src/jquery.min.js"></script>
        <script src="https://cdn.rawgit.com/ethereum/web3.js/develop/dist/web3.js"></script>
        <script type="text/javascript" src="./web3/bower_components/web3/dist/web3.min.js"></script>
        <title>TRANSACTION :: KNU COIN</title>
        <link rel="stylesheet" type="text/css" href="css/component_n.css">
        <link rel="stylesheet" href="css/button.css">
        <style>
        .contents
        {
            padding-top:100px;
            background:#e9e9e9;
            width:100%;
            padding-bottom:50px;
            text-align:left;
        }
        
        .input input
        {
            background-image: linear-gradient(top, rgba(0, 0, 0, 0.02) 0%, rgba(255, 255, 255, 0.02) 50%);
            border: 0px solid rgba(0, 0, 0, 0.16);
            height: 45px;
            padding: 5px 10px 5px 10px;
            margin-bottom:10px;
            font-size: 15px;
            width: 520px;
            border-radius: 10px;
            background:#ffd562;
        }
        .buttons{
            margin-left:90px;
        }
        .buttons input
        {
            margin-right: 10px;
            width:170px;
            height:50px;
            -webkit-border-radius: 13;
            -moz-border-radius: 13;
            border-radius: 13px;
            font-family: Arial;
            color: #ffffff;
            font-size: 15px;
            background: #3b8f77;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
        }
        .buttons input:hover{
            background: #51b497;
            text-decoration: none;
        }
        .box{
            margin-left:90px;
        }
    </style>
    </head>
    <body onload="fillAdrress();makeCode();">

        <div class="main_title">
            <div class="logout">
                <?=$_SESSION['username']?>님
                <a class="button" href="login/logout.php">logout</a>
                <a class="button b2" href="main.php">home</a>
            </div>
            <div class="title">
                <a href="transaction.html">
                    <img src="images/transaction/trans_title.png" alt="TRANSACTION">
                </a>
            </div>
        </div>
        <div class="contents">
            <div class="input">
                <form class="box">

                    SENDER'S ADDRESS<br>
                    <input type="text" id="senderid"><br><br>

                    RECEIVER'S ADDRESS<br>
                    <input type="text" id="receiverid"><br><br>

                    PASSWORD<br>
                    <input type="text" id="pws"><br><br>

                    AMOUNT OF COINS<br>
                    <input type="number" id="amount" maxlength='5'><br>

                    YOUR BALANCE<br>
                    <input type="number" id="balance"><br>
                </form>
            </div>
            <br><br>
            <div class="buttons">
                <form action="a.html">
                    <input type="button" name="sending_button" value="SEND COINS" onclick="sendTransaction()">
                    <input type="button" name="balances_button" value="SHOW BALANCES" onclick="showBalances()">
                    <input type="button" name="Freecoin_button" value="FREE COINS" onclick="Freecoins()">
                </form>
            </div>
        </div>
        <div class="wall">
        <img src="images/transaction/wallpaper.png" style='width: 100%; object-fit: contain'/>
        </div>
    </body>


        <script>
        function fillAdrress() {
          var url_string = window.location.href;
          var url = new URL(url_string);
          document.getElementById("receiverid").value = url.searchParams.get("address");
        }
        </script>
        <script>
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
                                document.getElementById("senderid").value=wallet_addr;  
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
        </script>

    <script>
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

/*Setting default account*/

web3.eth.defaultAccount = web3.eth.accounts[0];
console.log(web3.eth.defaultAccount);
var from_account = document.getElementById("senderid").value;


function Freecoins(){
    // var from_account = ("$userid").value();
    from_account = document.getElementById("senderid").value;
    web3.personal.unlockAccount(web3.eth.accounts[0], "abc", 1000);
    KNUInstance.Freecoin(from_account);
     var balance1 = KNUInstance.balanceOf(from_account).toNumber();
        console.log(balance1);
        document.getElementById("balance").value=balance1;
    }

function showBalances(){
  // var wallet1 = web3.eth.accounts[0];
  from_account = document.getElementById("senderid").value;

  var wallet1 = from_account;
  var coin1 = KNUInstance.balanceOf(wallet1).toNumber();
  document.getElementById("balance").value=coin1;
  console.log(coin1);
}

function sendTransaction(){
    from_account = document.getElementById("senderid").value;
    web3.personal.unlockAccount(web3.eth.accounts[0], "abc", 1000);
    var to_account = document.getElementById("receiverid").value;
    var amount = document.getElementById("amount").value;

 KNUInstance.transfer(from_account, to_account, amount);
     var balance1 = KNUInstance.balanceOf(from_account).toNumber();
        console.log(balance1);
        var balance2 = KNUInstance.balanceOf(to_account).toNumber();
        console.log(balance2);
 // KNUInstance.setValue.sendTransaction("2018-07-06", 1000000, 5500000, "Daiso", "withdraw", {from : web3.eth.accounts[0], gas:11000000});

//     // KNUInstance.setValue.sendTransaction("2018-07-07", 50000000, 60500000, "Harry", "Deposit", {from : web3.eth.accounts[0], gas:11000000});
}

</script>

</html>