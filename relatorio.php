<?php
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	include('include/connection.php');
	$id = $_SESSION['id'];
	if(!isset($id)){
		header("Location:entrar.php");
	}
	else{
			$sql = "SELECT nome,email,data,hora,ip FROM leads WHERE id = 46";
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				/*echo $row["nome"]."<br>";
				echo $row["email"]."<br>";
				echo $row["data"]."<br>";
				echo $row["hora"]."<br>";
				list($dia,$mes,$ano) = explode("/", $row["data"]);
				list($hora,$minuto,$segundo) = explode(":", $row["hora"]);
				echo $dia."<br>";
				echo $mes."<br>";
				echo $ano."<br>";
				echo $hora."<br>";
				echo $minuto."<br>";
				echo $segundo."<br>";
				$d=mktime($hora, $minuto, $segundo, $mes, $dia, $ano);
				echo "Created date is " . date("Y-m-d G:i:s", $d)."<br>";
				
				echo $row["ip"];*/
			}
			}
	}
	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
	<header id="header" class="header">
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
        <div class="container">
          <nav id="menuzord-right" class="menuzord orange bg-lightest">
            <a class="menuzord-brand" href="index.php">
              <img src="img/logo-segurodahora-02.svg" alt="EuPatrocino">
            </a>
            <ul class="menuzord-menu menuzord-right onepage-nav">
              <li><a href="index.php">Início</a> </li>
			   <li class="btn-custom-menu ml-5"><a href="logout.php" class="link-custom-menu">Sair</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>Email</th>
		  <th>Qtd</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
			$sql = 'SELECT substr(email,locate("@",email)) as corp, count(distinct email) as total FROM `leads`  group by substr(email,locate("@",email)) order by count(distinct email) desc';
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			$index=0;
			while($row = mysqli_fetch_assoc($result)) {
				$index = $index + 1;
		?>
		<tr>
			
		  <td><?echo $row["corp"];?></th>
		  <td><?echo $row["total"];?></td>
		</tr>
			<?php }}?>
	  </tbody>
	</table>
	<hr>
	<table class="table table-striped">
	  <thead>
		<tr>
		  <th>#</th>
		  <th>Nome</th>
		  <th>E-mail</th>
		  <th>Data</th>
		  <th>Hora</th>
		  <th>Ip</th>
		</tr>
	  </thead>
	  <tbody>
	  <?php
			$sql = "SELECT nome,email,data,hora,ip FROM leads";
			$result = mysqli_query($link, $sql);
			
			if (mysqli_num_rows($result) > 0) {
			// output data of each row
			$index=0;
			while($row = mysqli_fetch_assoc($result)) {
				$index = $index + 1;
		?>
		<tr>
			
		  <td><?echo $index;?></th>
		  <td><?echo $row["nome"];?></td>
		  <td><?echo $row["email"];?></td>
		  <td><?echo $row["data"];?></td>
		   <td><?echo $row["hora"];?></td>
		    <td><?echo $row["ip"];?></td>	
		</tr>
			<?php }}?>
	  </tbody>
	</table>
  </body>
</html>