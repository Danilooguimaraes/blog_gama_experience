<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    
}
</script>
<style>
input[type=text], select {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 0;
    box-sizing: border-box;
	opacity: 0.8;
}
input[type=submit] {
    width: 90%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 0;
    cursor: pointer;
	font-size:25px;
	background-color:#60b78c;
}
.texto-imagem{
	position:relative;
}
.texto{
	position:absolute;
}
.texto1{
	font-size:43pt;
}
.texto2{
	font-size:18pt;
	
}

/* For width 400px and larger: */
@media only screen and (min-width: 700px) {
	.linha1{
		line-height:140px;
	}
	.linha2{
		line-height:120px;
	}
	.linha3{
		
	}
	.linha4{
		line-height:20px;
	}
	.texto1{
	font-size:106pt;
}
.texto2{
	font-size:35pt;
}
	.texto-imagem{
	position:static;
}
.texto{
	position:static;
}
    body { 
        background-image: url('desktop.jpg'); 
		background-size: cover;
		background-repeat: no-repeat;
    }
	img{
		display:none;
	}
	input[type=text], select {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 0;
    box-sizing: border-box;
	opacity: 0.8;
}
input[type=submit] {
    width: 40%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 0;
    cursor: pointer;
	font-size:25px;
	background-color:#60b78c;
}
}
body {margin:0;text-align: center;}
/* Add a black background color to the top navigation */
.topnav {
    background-color: #24408e;
	background-image: url('http://segurodahora-com-br.stackstaging.com/logo-segurodahora-02.svg'); 
	background-repeat: no-repeat;
    overflow: hidden;
	
}

/* Style the links inside the navigation bar */
.topnav a {
    float: right;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
    display: none;
}
/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: right;
  }
}
</style>
</head>
<body>

<div class="topnav" id="myTopnav">
  
  <a >-</a>
</div>
<section>
<div class="texto-imagem">
	<div class="texto">
	<div  class="texto1" style='color:white;text-align: center;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: bold;'>
		<div class="linha1">o seguro não</div>
		<div class="linha2">precisa ser difícil.</div>
	</div>
	<p class="espaco-textos" style="line-height:120px;"></p>
	<div class="texto2" class="container" style='color:white;text-align: center;font-size:20pt;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 400;'>
		<div class="linha3">saiba tudo sobre os melhores e mais modernos</div>
		<div class="linha4">seguros que o mercado tem a oferecer!</div>
	</div>
	</div>
	<img src="mobile.jpg" style="background-repeat: no-repeat;width: 700px;"  >
	<p></p>
	<p></p>
</div>
</section>
<form action="/action_page.php">
	<input type="text" name="firstname" value="Nome Completo: ">
	<br>
	<input type="text" name="lastname" value="E-mail: ">
	<br>
	<input type="submit" value="quero agora!">
</form> 

</body>
</html>
