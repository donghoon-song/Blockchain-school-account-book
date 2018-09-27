
	(function()
	 {
	 if(typeof web3 !== 'undefined'){
	 web3 = new Web3(web3.currentProvider);
	 }
	 else{
	 web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	 var contract = web3.eth.contract([{"constant":true,"inputs":[{"name":"_key","type":"uint256"}],"name":"getValue","outputs":[{"name":"","type":"uint256"},{"name":"","type":"string"},{"name":"","type":"uint256"},{"name":"","type":"uint256"},{"name":"","type":"string"},{"name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_Date","type":"string"},{"name":"_Cost","type":"uint256"},{"name":"_sumCost","type":"uint256"},{"name":"_Place","type":"string"},{"name":"_what","type":"string"}],"name":"setValue","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"name":"","type":"uint256"}],"name":"TradeList","outputs":[{"name":"Trade_Num","type":"uint256"},{"name":"Trade_Date","type":"string"},{"name":"Trade_Cost","type":"uint256"},{"name":"Sum_Cost","type":"uint256"},{"name":"Trade_Place","type":"string"},{"name":"Type","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"}]).at("0xe99732bc7c138690b1d1b4c264ad312dee05980cc786132ca5e626d30c4d994a");

	// var name = "Harry";
//	var salary = contract.get(name);
var balance = web3.eth.getBalance("0xe99732bc7c138690b1d1b4c264ad312dee05980cc786132ca5e626d30c4d994a");
console.log(balance);


//	console.log(name, salary.toString(10));
	 }})();

