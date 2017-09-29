<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	include('include/connection.php');
	$id = $_SESSION['id'];
	
	if(isset($id)){
		header("Location:relatorio.php");
	}
	else{
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if($_POST['submit'] == "inscricao"){
				$password = md5(mysqli_real_escape_string($link,$_POST['form_password']));
				$email = mysqli_real_escape_string($link,$_POST['form_email']);
				$lognInQuery = "SELECT * FROM users WHERE email='".$email."' AND password = '".$password."' LIMIT 1";
				$logInQueryResult = mysqli_query($link,$lognInQuery);
				//print_r ($logInQueryResult);
				$logInRow = mysqli_fetch_array($logInQueryResult);
				//echo $logInRow;
				if($logInRow){
					$_SESSION['id'] = $logInRow['id'];
					//echo "ID depois de login: ".$_SESSION['id'];
					//if($_GET[md5("projeto")])
					//{
						//header("Location: projeto.php?".md5("projeto")."=".$_GET[md5("projeto")]);
					//}
					//else
					//{
						header("Location: relatorio.php");
					//}
				}
			}

		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seguro da Hora</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style>
		@media only screen and (min-width: 700px) {
			.page-header{
				font-size:76pt;				
			}
			.lead{
				font-size:26pt;		
			}
		}
	</style>
</head>
<body>
	
	<section class="container">
		<div class="formulario" ">
			<?php echo $body;?>
			<form method = "post" id="form_cadastro">
				<div class="form-group">
					<input class="form-control" type="email" placeholder="email:" id="email"  name = "form_email" required>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" placeholder="senha:" id="password" name = "form_password" required>
				</div>

				<button class="btn btn-primary btn-block" style="background-color:#60b78c;font-size:18pt;border-radius: 0;" type="submit" name = "submit" value="inscricao">quero agora!</button>

			</form>
		</div>
	</section>
</body>
</html>