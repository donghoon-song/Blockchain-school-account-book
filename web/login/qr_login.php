<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> <!--utf-8설정-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Login Page</title>
<style>
    html {
		height: 100%;
	}
	
	body {
	    width:100%;
	    height:100%;
	    margin: 0;
  		padding-top: 80px;
  		padding-bottom: 40px;
  		font-family: "Nanum Gothic", arial, helvetica, sans-serif;
  		background-repeat: no-repeat;
  		background:linear-gradient(to bottom right, #0098FF, #6BA8D1);
	}
	
    .card {
        margin: 0 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
	
	.form-signin .form-control {
  		position: relative;
  		height: auto;
  		-webkit-box-sizing: border-box;
     	-moz-box-sizing: border-box;
        	 box-sizing: border-box;
  		padding: 10px;
  		font-size: 16px;
	}
</style>
</head>
<body cellpadding="0" cellspacing="0" marginleft="0" margintop="0" width="100%" height="100%" align="center">

	<div class="card align-middle" style="width:20rem; border-radius:20px;">
		<div class="card-title" style="margin-top:30px;">
			<h2 class="card-title text-center" style="color:#113366;">로그인</h2>
		</div>
		<div class="card-body">
            <form class="form-signin">
              <h5 class="form-signin-heading">로그인 정보를 입력하세요</h5>
              <input type="text" id="id" class="form-control" name="username" placeholder="Your ID" required autofocus><BR>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="password" class="form-control" name="password" placeholder="Password" required><br>

              <button id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="button" onClick="addr_keep()">로 그 인</button>
            </form>
      
		</div>
	</div>

	<div class="modal">
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
  </body>
<script>
         function addr_keep() {
        var request = new XMLHttpRequest();
          var url_string = window.location.href;
          var url = new URL(url_string);
          var addr = url.searchParams.get("address");
          var params="?id=" + document.getElementById("id").value + "&password=" + document.getElementById("password").value + "&address=" + addr;
          //alert(params);  
          request.open("GET","qr_next.php"+params,true);
            request.onreadystatechange = function () {
      if (request.readyState == 4) 
      { //서버로부터 응답상태
          if (request.status == 200 || request.status == 0) 
          {//200 : 웹 서버의 응답처리상태
            //var here = request.responseText;
            location.href="http://54.145.119.133/transaction.php?address="+addr;
          }
      }
      else{

      }
          //var form = document.getElementById("form1");
        //form.setAttribute(:ac)
          //location.href="http://54.145.119.133/transaction.php?address="+addr;
          //return true;
    }
        request.send(null);
          }
</script>
</html>