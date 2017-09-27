<?php
	date_default_timezone_set('America/Sao_Paulo');
	include('include/connection.php');
	function pegar_ip_usuario(){
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
		{
		  $ip=$_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
		{
		  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
		  $ip=$_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	function adicionar_cadastro($nome,$email,$link,$ip_usuario,$data,$hora){
		$adicionar_lead = "INSERT INTO leads (nome,email,data,hora,ip) VALUES('".$nome."','".$email."','".$data."','".$hora."','".$ip_usuario."')";
		$query = mysqli_query($link,$adicionar_lead);
		if ($query) {
			//echo "New record created successfully";
		} 
		else {
			//echo "Error: " . $adicionar_lead . "<br>" . mysqli_error($link);
		}		
	}
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if($_POST['submit'] == "inscricao"){
			if(!$_POST['form_nome']){
				$signUpErrosArray['form_nome']='Por favor, insira o seu nome!';
				$signUpErros.= '<br />Por favor, insira o seu nome!';
			}
			if(!$_POST['form_email']){
				$signUpErrosArray['empty_email']='Por favor, insira um email!';
				$signUpErros.= '<br />Por favor, insira um email!';
			}
			else if(!filter_var($_POST['form_email'],FILTER_VALIDATE_EMAIL)){
				$signUpErrosArray['valid_email']='Por favor, insira um email válido!';
				$signUpErros.= '<br />Por favor, insira um email válido!';
			}
			echo $signUpErros;
			if($signUpErros){
				$nome = $_POST['form_nome'];
				$email = $_POST['form_email'];
			}
			else{
				$nome = mysqli_real_escape_string($link,$_POST['form_nome']);
				$email = mysqli_real_escape_string($link,$_POST['form_email']);
				$ip_usuario = pegar_ip_usuario();
				$today = getdate();
				$data = $today['mday']."/".$today['mon']."/".$today['year'];
				$hora = $today['hours'].":".$today['minutes'].":".$today['seconds'];
				
				adicionar_cadastro($nome,$email,$link,$ip_usuario,$data,$hora);
				mysqli_close($conn);
				header("Location:http://www.seguronahora.com.br/agradecimento.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Landing Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/jquery/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	<style>
		form {
		border-style: solid;
		border-color: #46c0bc;
		}
		.top{
			margin-top:0px;
		}
		.form-group{
			
			padding-right: 10px;
			
			padding-left: 10px;
		}
		.jumbotron{
			background-image: url("imagem-desktop.jpeg")
		}
	</style>
</head>
<body>
<div style="background-color:#46c0bc;" "class="page-header" >
  <h1 class = "top" style="text-align:center;">ESPM</h1>
</div>
<div class="jumbotron" style="background:transparent !important;">
	<h1 style="color:#80298f;text-align:center;">evolua </br>com o mundo</h1>      
	<p style="color:#80298f;text-align:center;">MBA em Design e Comunicação Digital</p>
	<div class="text-center">
	<a href="agradecimento.php" style="background-color:#46c0bc;color:white" class="btn btn-default btn-lg" role="button">Quero Evoluir <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-6" style="color:#80298f;">
			<h1>a evolução</h1>
			fasdfasdfasdf<br/>afdfasdfsadfsadf</br>fafddafdf</br>fadfsdfdsfs
			<h1>objetivo</h1>
			fasdfasdfasdf<br/>afdfasdfsadfsadf</br>fafddafdf
			<h1>valor</h1>
			R$660</br>
			10x R$66
		</div>
		<div class="col-sm-1" ></div>
		<div class="col-sm-5">
			<form method = "post" id="form_cadastro">
				<div class = "menu" style="background-color:#46c0bc;text-align:center;">
					<h1 style="color:white;margin-top:0px;">Quero evoluir</h1>
					<spam style="color:white;">
					Preencha o formulário</br>
					e inicia sua inscrição
					</spam>
				</div>
				<div class="form-group">
				<label for="form_nome">Nome:</label>
				<input type="nome" class="form-control" id="nome" name = "form_nome" <?php if($nome){echo "value=".$nome;}?>>
				</div>

				
				<div class="form-group">
				<label for="form_email">E-mail:</label>
				<input type="email" class="form-control" id="email" name = "form_email" <?php if($email){echo "value=".$email;}?>>
				</div>
				
				
				<button style="background-color:#46c0bc;color:white;" class="btn btn-default" role="button" type="submit" name = "submit" value="inscricao">Inscrever-se <span class="glyphicon glyphicon-chevron-right"></button>
				
			</form>
		</div>
	</div>     
</div>
</body>
</html>