<?php 
echo $this->Form->create('User', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Редактирование пользователя</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Данные</h3>

          <div class="card-tools">
            <a href="/admin/users" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Логин</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[User][username]" value="<?=$data['User']['username']?>" >
    			</div>
    			<div class="form-group">
		            <label for="fio">ФИО</label>
		            <input type="text" id="fio" class="form-control" name="data[User][fio]" value="<?=$data['User']['fio']?>" >
		          </div>
		          <div class="form-group">
		            <label for="email">E-mail</label>
		            <input type="text" id="email" class="form-control" name="data[User][email]" value="<?=$data['User']['email']?>" >
		          </div>
		          <div class="form-group">
		            <label for="company">Компания</label>
		            <input type="text" id="company" class="form-control" name="data[User][company]" value="<?=$data['User']['company']?>" >
		          </div>
		          <div class="form-group">
		            <label for="phone">Телефон</label>
		            <input type="text" id="phone" class="form-control" name="data[User][phone]" value="<?=$data['User']['phone']?>" >
		          </div>
          
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(!empty($data['User']['img'])): ?>
      					<div class="model_info_img">
      						<div class="model_item_container">
      							<div class="model_item">
      									<img src="/img/users/thumbs/<?=$data['User']['img']?>">
      							</div>
      						</div>
      					</div>
      				<?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[User][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
          
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
   
  </div>
  <div class="row">
    <div class="col-12">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
     <?
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
  </form>

</section>
<!-- <script type="text/javascript">
	 //CKEDITOR.replace( 'editor2' );
</script> -->

<a href="/admin/users/pswedit/<?=$id?>">Изменить пароль</a>
