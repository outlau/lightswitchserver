<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
				
		<script src="/1index/login1.js"></script>
		
		<style>
			body {
				font-family: 'Lato', sans-serif;
				font-weight: 500;
			}	
			#formlogin {
				top: 50px;	
			}
		</style>
	</head>
	<body>
		<div class="container-fluid">
		<h1 style="font-weight: 100; text-align: center;">LOG IN BRO</h1>
			<div id="formlogin" class="col-md-offset-4 col-md-4 col-xs-offset-0 col-xs-12">	
				<form method="post" action="index.php" autocomplete="off">
					<div class ="input-group">
						<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
						<!-- always set username to admin for extra administrative permissions -->						
						<input name="un" type="text" class="form-control un" placeholder="Username" aria-describedby="basic-addon1" >
					</div>
					<div class ="input-group" style="margin-bottom: 8px;">
						<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-asterisk"></span></span>
						<!-- hmm hvordan kom jeg ind paa din pc???? hmm -->				
						<input name="pw" type="password" class="form-control pw" placeholder="Password" aria-describedby="basic-addon1" >
					</div>
					<button type="submit" name="signin" class="btn btn-primary signin">Sign in</button>	
				</form>
				<br>
				<div class="alert alert-success" style="display: none;"><span class="glyphicon glyphicon-ok-circle"></span> User successfully registered!</div>			
				<div class="alert alert-danger" style="display: none;">Incorrect login credentials</div>
			</div>
		</div>
	</body>
 </html>