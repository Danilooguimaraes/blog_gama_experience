<?
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
			echo "Error: " . $adicionar_lead . "<br>" . mysqli_error($link);
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
				//mail($to, $subject, $body);
				mysqli_close($query);
				header("Location:https://goo.gl/9rwA4y");
			}
		}
		else if($_POST['submit'] == "inscricao2"){
			if(!$_POST['form_nome2']){
				$signUpErrosArray['form_nome2']='Por favor, insira o seu nome!';
				$signUpErros.= '<br />Por favor, insira o seu nome!';
			}
			if(!$_POST['form_email2']){
				$signUpErrosArray['empty_email2']='Por favor, insira um email!';
				$signUpErros.= '<br />Por favor, insira um email!';
			}
			else if(!filter_var($_POST['form_email2'],FILTER_VALIDATE_EMAIL)){
				$signUpErrosArray['valid_email2']='Por favor, insira um email válido!';
				$signUpErros.= '<br />Por favor, insira um email válido!';
			}
			//echo $signUpErros;
			if($signUpErros){
				$nome = $_POST['form_nome2'];
				$email = $_POST['form_email2'];
			}
			else{
				$nome = mysqli_real_escape_string($link,$_POST['form_nome2']);
				$email = mysqli_real_escape_string($link,$_POST['form_email2']);
				$ip_usuario = pegar_ip_usuario();
				$today = getdate();
				$data = $today['mday']."/".$today['mon']."/".$today['year'];
				$hora = $today['hours'].":".$today['minutes'].":".$today['seconds'];
				
				adicionar_cadastro($nome,$email,$link,$ip_usuario,$data,$hora);
				$to = $email;
				$subject = "Seguro Da Hora: Confirmação de Inscrição";
				$body2 = "Pronto! Agora é só esperar.\n \nEm breve traremos novidades sobre seguros para você! \n \nPara dúvidas, entre em contato: contato@segurodahora.com.br";
				//mail($to, $subject, $body);
				mysqli_close($query);
				header("Location:https://goo.gl/9rwA4y");
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

		<nav class="navbar navbar-default">
			<div class="container ">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">
						<img width="150px" alt="Brand" src="img/logo-segurodahora-02.svg">
					</a>
				</div>
				<div class="collapse navbar-collapse" id="collapse-navbar">
					<ul class="nav navbar-nav">
						<li><a class="links" href="index.php" >home</a></li>
						<li><a class="links" href="ebook.php" >download e-book</a></li>
					</ul>
				</div>
			</div>
		</nav>


				<section class="container ">	
					<div class="formulario" style="margin-top: 50px;">
						<h3 ><strong> faça o download do nosso e-book. é de graça!</strong><br>
						basta preencher o formulário abaixo:</h3>

						<div id="inner">
							<form method = "post" id="form_cadastro">
								<div class="form-group">
									<input class="form-control" type="text" placeholder="nome:" id="nome2"  name = "form_nome2" required>
								</div>

								<div class="form-group">
									<input type="email" class="form-control" placeholder="email:" id="email2" name = "form_email2" required>
								</div>

								<button class="btn btn-primary btn-block" style="background-color:#60b78c;font-size:18pt;border-radius: 0;" type="submit"  name = "submit" value="inscricao2">quero agora!</button>
							</form>
						</div>
					</div>	
				</section>
				<footer class="text-center">
					<img height: 20px; width="190" src="img/logo-segurodahora-02.svg">
					<div class="footer_links"  >


					</div>

					<ul class="social-networks">
						<li>
							<a href="https://www.facebook.com/SeguroDaHora/"><img width="50" src="img/face-botão.png"  ></a>
						</li>
						<li>
									<a href="https:www.twitter.com/seguronahoraof1"><img width="50" src="img/twitter-botao.png"  ></a>
								</li>
						<li>
							<a href="https://www.instagram.com/segurodahoraoficial/"><img width="50" src="img/insta-botão.png" ></a>
						</li>
					</ul>

				</footer>

		<!-- JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>

	</body>
	</html>