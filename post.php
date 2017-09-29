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
				//header("Location:http://www.segurodahora.com.br/agradecimento.php");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Seguro da Hora</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">
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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">Seguro da Hora</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Artigos</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
	<?php 
		$id = $_GET["id"];
		$sql = "SELECT id, title,body FROM posts WHERE id = ".$id;
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
	?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?echo utf8_encode($row["title"]);?></h1>
			  <hr>
			  <span class="subheading">saiba tudo sobre os melhores e mais modernos<br>seguros que o mercado tem a oferecer!</span>
			  <?php echo $body;?>
			  <form method = "post" id="form_cadastro">
				<div class="form-group">
				<input type="text" class="form-control" id="nome"  name = "form_nome"  placeholder="Nome Completo" required>
				</div>
				<div class="form-group">
				<input type="text" class="form-control" id="email" name = "form_email" placeholder="E-mail" required>
				</div>
				<button type="submit" class="btn btn-primary" name = "submit" value="inscricao">Inscreva-se</button>
				</form>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
		<?php echo utf8_encode($row["body"]);}}?>
          </div>
        </div>
      </div>
    </article>
	<div class="container">
		<div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
			<form method = "post" id="form_cadastro">
			<div class="form-group">
			<label for="nome">Nome Completo</label>
			<input type="text" class="form-control" id="nome"  name = "form_nome"  placeholder="Nome Completo" required>
			</div>
			<div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="email" name = "form_email" placeholder="E-mail" required>
			</div>
			<button type="submit" class="btn btn-primary" name = "submit" value="inscricao">Inscreva-se</button>
			</form>
			</div></div>
	</div>
    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center"> 
              <li class="list-inline-item">
                <a href="https://www.facebook.com/SeguroDaHora/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.instagram.com/segurodahoraoficial/">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
