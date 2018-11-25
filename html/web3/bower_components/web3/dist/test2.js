<head>
<script type="text/javascript" src="web3.min.js"></script>	
</head>
var KNU = web3.eth.contract([
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
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [
		{
			"name": "_owner",
			"type": "address"
		}
		],
		"name": "balanceOf",
		"outputs": [
		{
			"name": "balance",
			"type": "uint256"
		}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
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
		"outputs": [
		{
			"name": "",
			"type": "bool"
		}
		],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
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
	}
	]);

	var KNUInstance = KNU.at("0x277f6180469812ded3cf067e55cfbbfb80e71076");

	var accounts = web3.eth.getAccounts;

//페이지 로딩시
window.addEventListener('load', function() {

	var Web3 = require('web3');
	var web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	showAccounts();
});

function showAccounts(){
	web3.eth.getAccounts(function(e,r){
		document.getElementById('accounts').innerHTML = r;
	})
}

function showBalances(){
	var wallet1 = accounts[0];
	var wallet2 = accouts[1];

	var coin1 = KNUInstance.balanceOf(wallet1);
	var coin2 = KNUInstance.balanceOf(wallet2);

	var list = coin1 + '<br>'+ coin2 + '<br>';

	document.getElementById('balances').innerHTML=list;
}

function sendTransaction(){
	KNUInstance.transfer.sendTransaction(from_account, to_account, 20000,  {from:accounts[0], gas:1000000});
}

