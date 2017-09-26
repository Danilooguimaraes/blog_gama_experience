<html>
	<head>
		<title>segurodahora</title>
		<script src="http://cdn.ckeditor.com/4.7.3/full/ckeditor.js"></script>
		<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
		<link rel="stylesheet" href = "<?php echo base_url();?>assets/css/style.css">
		
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
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class = "navbar-header">
					<a class="navbar-brand" href="<?php echo base_url();?>posts">segurodahora</a>
				</div>
				<div id="navbar">
					<ul class="nav navbar-nav">
						
					</ul>
					<ul class = "nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url();?>posts">home</a></li>
						<li><a href="<?php echo base_url();?>posts">blog</a></li>
						<li><a href="<?php echo base_url();?>about">contato</a></li>
						<?php if($this->session->userdata('logged_in')):?>
						<li><a href="<?php echo base_url();?>posts/create">Create Post</a></li>
						<li><a href="<?php echo base_url();?>users/logout">Log Out</a></li>
						<li><a href="<?php echo base_url();?>users/register">Register</a></li>
						<li><a href="<?php echo base_url();?>users/login">Log In</a></li>
						<?endif;?>
						
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<?php if($this->session->flashdata('user_registered')):?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
			<?php endif;?>
			
			<?php if($this->session->flashdata('post_created')):?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>';?>
			<?php endif;?>
			
			<?php if($this->session->flashdata('post_updated')):?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>';?>
			<?php endif;?>
			
			<?php if($this->session->flashdata('post_deleted')):?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>';?>
			<?php endif;?>
			
			<?php if($this->session->flashdata('login_failed')):?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>';?>
			<?php endif;?>
			
			<?php if($this->session->flashdata('user_loggedin')):?>
				<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>';?>
			<?php endif;?>
			
			<?php if($this->session->flashdata('user_loggedout')):?>
				<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('user_loggedout').'</p>';?>
			<?php endif;?>
		</div>
		<div class = "container">