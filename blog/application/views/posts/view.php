<h2 style="color:#80298f;"><?php echo $post['title'];?></h2>

<div class="post-body">
<?php echo $post['body'];?>
</div>

<?php if($this->session->userdata('logged_in')):?>
<a class = "btn btn-default pull-left" href="<?php echo base_url();?>posts/edit/<?php echo $post['slug'];?>">Edit</a>
<?php echo form_open('/posts/delete/'.$post['id']);?>
	<input type="submit" value="Delete" class="btn btn-danger">
</form>
<?endif;?>
<hr>
<h3>comentários</h3>
<?php if($comments):?>
	<?php foreach($comments as $comment):?>
		<div class="well">
			<h5><?php echo $comment['body']?>[ by <strong><?php echo $comment['name'];?></strong>]</h5>
		</div>
	<?php endforeach;?>
<?php else:?>
	<p>sem comentários<p>
<?php endif;?>
<hr>
<h3>adicionar comentários</h3>
<?php echo validation_errors();?>
<?php echo form_open('comments/create/'.$post['id']);?>
	<div class = "form-group">
		<label>Nome</label>
		<input type = "text" name = "name" class="form-control">
	</div>
	<div class = "form-group">
		<label>E-mail</label>
		<input type = "text" name = "email" class="form-control">
	</div>
	<div class = "form-group">
		<label>Mensagem</label>
		<textarea name = "body" class="form-control"></textarea>
	</div>
	<input type = "hidden" name="slug" value="<?php echo $post['slug'];?>">
	<button class = "btn btn-primary"type="submit">postar</button>
</form>

<form>
	<div class = "form-group">
		<label>Nome</label>
		<input type = "text" name = "name" class="form-control">
	</div>
	<div class = "form-group">
		<label>E-mail</label>
		<input type = "text" name = "email" class="form-control">
	</div>
	<button class = "btn btn-primary"type="submit">postar</button>
</form>