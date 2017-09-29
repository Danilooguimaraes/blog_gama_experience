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
			//echo $signUpErros;
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
				$to = $email;
				$subject = "Seguro Da Hora: Confirmação de Inscrição";
				$body = "Pronto! Agora é só esperar.\n \nEm breve traremos novidades sobre seguros para você! \n \nPara dúvidas, entre em contato: contato@segurodahora.com.br";
				mail($to, $subject, $body);
				mysqli_close($conn);
				header("Location:http://www.segurodahora.com.br/agradecimento.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
	<title>segurodahora</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<style>
	body {
    background-image: url("desktop.jpg");
	background-size: cover;
	
}
	</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-106998574-1', 'auto');
  ga('send', 'pageview');

</script>
  </head>
  <body>
	<div class="well well-lg navbar-dark bg-primary" style="color:#24408e">
		<img style="width:200px;" src="http://segurodahora-com-br.stackstaging.com/logo-segurodahora-02.svg">
	</div>
	<div  style='color:white;text-align: center;font-size:106pt;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: bold;'>
		<div style="line-height:140px;">o seguro não</div>
		<div style="line-height:120px;">precisa ser difícil.</div>
	</div>
	<p></p>
	<div class="container" style='color:white;text-align: center;font-size:35pt;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 400;'>
		<div>saiba tudo sobre os melhores e mais modernos</div>
		<div style="line-height:20px;">seguros que o mercado tem a oferecer!</div>
	</div>
	<div class="container" style="color:white;text-align: center;margin-top:30px;">
		<form method = "post" id="form_cadastro">
		<div class="row">
			<div class="col-sm-4 "></div>
			<div class="col-sm-4 "></div>
			<div class="col-sm-4 "></div>
		</div>
		<div class="row">
			<div class="col-sm-4 "></div>
			<div class="offset-sm-4 col-sm-4"><input type="text" class="form-control" id="nome" name = "form_nome" placeholder="Nome Completo" style="border-radius: 0;opacity: 0.8;"></div>
			<div class="col-sm-4 "></div>
		</div>
		<div class="row">
			<div class="col-sm-4 "></div>
			<div class="col-sm-4 "></div>
			<div class="col-sm-4 "></div>
		</div>
		<p></p>
		<div class="row">
			<div class="col-sm-4 "></div>
			<div class="offset-sm-4 col-sm-4"><input type="text" class="form-control" id="email" name = "form_email" placeholder="Email" style="border-radius: 0;opacity: 0.8;"></div>
			<div class="col-sm-4 "></div>
		</div>
		<p></p>
		<div class="row">
			<div class="col-sm-4 "></div>
			<div class="offset-sm-4 col-sm-4"><button  class="btn btn-success btn-block" style="background-color:#60b78c;border-radius: 0;"role="button" type="submit" name = "submit" value="inscricao"><span style="font-size:35pt;">quero agora!<span></button></div>
			<div class="col-sm-4 "></div>
		</div>
		</form>
	</div>
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>