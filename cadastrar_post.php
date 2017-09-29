<?php	
	date_default_timezone_set('America/Sao_Paulo');
	include('include/connection.php');
	
	if($_SERVER['REQUEST_METHOD']=='POST'){

		$titulo = mysqli_real_escape_string($link,$_POST['editor2']);
		$texto = mysqli_real_escape_string($link,$_POST['editor1']);
		$adicionar_post = "INSERT INTO posts (title,body) VALUES ('".$titulo."','".$texto."')";

		$query = mysqli_query($link,$adicionar_post);
		if ($query) {
			//echo "New record created successfully";
		} 
		else {
			echo "Error: " . $adicionar_post . "<br>" . mysqli_error($link);
		}	
		mysqli_close($link);
		//header("Location:http://www.segurodahora.com.br");
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
	<script src="http://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
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
        <a class="navbar-brand" href="index.html">Seguro da Hora</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.html">Sample Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('')">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Seguro da Hora</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

	<form method="post" id="form_cadastro">
		<div class="form-group">
			<label for="titulo">Título:</label>
			<textarea  class="form-control" id="editor2" name="editor2" placeholder="titulo"></textarea>
		</div>
		<div class="form-group">
			<label for="pwd">Texto:</label>
			<textarea  class="form-control" id="editor1" name="editor1" placeholder="titulo"></textarea>
		</div>
			<button type="submit" class="btn btn-default"name = "submit" value="inscricao">Submit</button>
	</form>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
	<script>
		CKEDITOR.replace('editor1');
		CKEDITOR.replace('editor2');
	</script>
  </body>

</html>
