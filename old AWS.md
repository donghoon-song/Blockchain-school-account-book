AWS usage



public DNS : ec2-54-147-166-74.compute-1.amazonaws.com

public ip : http://54.147.166.74/

private ip : 172.31.80.5


=================================================================================================

1. Download knucoin.pem file

2. Change directory on the terminal into a directory that knucoin.pem is contained

3. Connect to AWS server
  ssh -i knucoin.pem ubuntu@ec2-54-147-166-74.compute-1.amazonaws.com

4. On AWS server, run the geth
  geth --datadir ./data --rpc --rpccorsdomain="*" --rpcaddr "172.31.80.5" --rpcapi "db, web3, eth, personal" --nat "any" --networkid 1994 console

=================================================================================================

1. knucoin.pem 파일을 다운받는다.
2. 터미널에서 디렉토리를 knucoin.pem 파일이 있는 디렉토리로 변경한다
3. 터미널에서 ssh를 이용해서 AWS에 접속한다. 
  ssh -i knucoin.pem ubuntu@ec2-54-147-166-74.compute-1.amazonaws.com
4. AWS 서버에서 geth를 실행한다.
  geth --datadir ./data --rpc --rpccorsdomain="*" --rpcaddr "172.31.80.5" --rpcapi "db, web3, eth, personal" --nat "any" --networkid 1994 console


