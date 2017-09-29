<?php
  $link = mysqli_connect("shareddb1d.hosting.stackcp.net","seguranohoradb-3137d987","IurQc+eVgi38","seguranohoradb-3137d987");
  //server,username,password,database name(th90104_leisincentivoeupatrocino)
  //$link = mysqli_connect("localhost","th90104_startup","r&ME)l4}H3Nd","th90104_leisincentivoeupatrocino");
  // Check connection

  if (!$link) {
	//echo "Fallha na conexão: Desculpe o transtorno, estamos trabalhando para melhorar os nossos serviços.";  
    die("Fallha na conexão: Desculpe o transtorno, estamos trabalhando para melhorar os nossos serviços. ");
  }
?>