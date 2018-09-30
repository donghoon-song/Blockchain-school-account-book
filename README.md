# Blockchain-school-acount-book

**Problem:** Financial managment of student council isn't clear.

**Goal:** Creating finance tracking system by using blockchain which purpose is track how the student council manages students' money.
The system should provide an easy way to check all transactions and be secure.


**1. Blockchain**


Each block will consist of information about a single transaction, these are: <br>
  -name of person who spent some money<br>
  -index of transaction<br>
  -date of transaction<br>
  -cost of transaction<br>
  -balance<br>
  -place of transaction<br>
  -type of transaction<br>
  -next block<br>
  -hash of previous block<br><br>
  
**2. Web application**

There are two kinds of web applications.
- the application to make transactions
- the application to track transactions records and see

**2-1. Transaction process

An individual has own wallet. If he or she wants to make a transaction, the receiver will produce QR code and show it to the sender.
Then the sender will scan it and access to web application. From QR code, the sender will get the receiver's wallet address. So when the sender press the "send" button, there will be a transaction.

**2-2. Tracking transaction records

With our webpage with web3.js, we can track all the transaction records. And we will map some important addresses to their users' names(Student council members). So that we can track their records using their names.<br>

**3. Node Composition

**3.Student council web application**


When a transaction is done a member of student council is supposed to upload a scan of the receipt to the server. Then the web app is supposed to add a new block to blockchain and send it to all students. Someone (a miner, probably every student) needs to verify all previous blocks of the new blockchain. If they are correct then a new blockchain is accepted and everyone will download it to his app.<br><br>
 
 
**4.Each student application**


Stores a blockchain, verifies new ones and downloads them. If there is a difference between new blockchain and a stored one the app should display alert to the user and allow him to contact student council.<br><br>


