1. Download knucoin.pem file

2. Change directory on the terminal into a directory that knucoin.pem is contained

3. Connect to AWS server
  ssh -i knucoin.pem ubuntu@ec2-54-147-166-74.compute-1.amazonaws.com

4. On AWS server, run the geth
  geth --datadir ./data --rpc --rpccorsdomain="*" --rpcaddr "172.31.80.5" --rpcapi "db, web3, eth, personal" --nat "any" --networkid 1994 console



public DNS : ec2-54-147-166-74.compute-1.amazonaws.com
public ip : http://54.147.166.74/
private ip : 172.31.80.5
