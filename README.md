# Blockchain-school-acount-book

**Problem:** Financial managment of student council isn't clear.

**Goal:** Creating finance tracking system by using blockchain which purpose is track how the student council manages students' money.
The system should provide an easy way to check all transactions and be secure.


**1. Blockchain**


Each block will consist of information about a single transaction, these are: 
  -name of person who spent some money
  -index of transaction
  -date of transaction
  -cost of transaction
  -balance
  -place of transaction
  -type of transaction
  -next block
  -hash of previous block
  
**2. Server**


 Server should store all scans of receipts. Might posses its own version of blockchain.
 
**3.Student council web application**


When a transaction is done a member of student council is supposed to upload a scan of the receipt to the server. Then the web app is supposed to add a new block to blockchain and send it to all students. Someone (a miner, probably every student) needs to verify all previous blocks of the new blockchain. If they are correct then a new blockchain is accepted and everyone will download it to his app.
 
 
**4.Each student application**


Stores a blockchain, verifies new ones and downloads them. If there is a difference between new blockchain and a stored one the app should display alert to the user and allow him to contact student council.


