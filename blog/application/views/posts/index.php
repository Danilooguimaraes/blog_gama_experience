<div>
<header>
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
	<img src="http://segurodahora-com-br.stackstaging.com/mobile.jpg" style="background-repeat: no-repeat;width: 700px;"  >
	<p></p>
	<p></p>
</div>
</header>

<?php echo form_open('leads/create');?>
	<input type="text" name="firstname" value="Nome Completo: ">
	<br>
	<input type="text" name="lastname" value="E-mail: ">
	<br>
	<input type="submit" value="quero agora!">
</form> 
<div class="content" style="text-align: left;">
	<div class="inner" style="margin:20px;">
		<h2 style='font-size:18pt;color:#24408e;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: bold;'>dicas,notícias e promoções</h2>
		<p style='font-size:14pt;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 400;'>últimos posts com dicas de seguros, informações sobre<br>seguradoras, melhores opções de pagamento e muito mais!</p>
	</div>
</div>
<div class="posts" style="text-align: center;">
	<div class="l-wrap">
		<div class="three-col-grid">
			<?php $index=0;?>
			<?php foreach($posts as $post):?>
			<?php $index++;
			if($index==4) break;?>
			<div class="grid-item">
				<div class="titulo-post" style='color:#00CED1;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: bold;'><h3><?php echo $post['title'];?></h3></div>
				<div class="resumo-post" style='"Helvetica Neue", Helvetica, Arial, sans-serif;font-weight: 400;width:80%;'><?php echo word_limiter($post['body'],30);?></div>
				<a style="color:#60b78c;text-align: left;" href = "<?php echo site_url('/posts/'. $post['slug'])?>">ver mais</a>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>
<div class="botao-mais">
<input type="submit" value="ver todos os posts!">
</div>

<div class="footer">

</div>
