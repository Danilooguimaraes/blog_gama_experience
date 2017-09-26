<h2><?php echo $title;?></h2>

<?php echo validation_errors();?>


<?php echo form_open_multipart('posts/create');?>
  <div class="form-group">
    <label >Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea  id="editor1" class="form-control" name="body" placeholder="Password"></textarea>
  </div>
  <div class="form-group">
	<label>Salvar Imagem</label>
	<input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>