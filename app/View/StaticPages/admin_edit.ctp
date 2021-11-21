<?php 
echo $this->Form->create('StaticPage', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Редактирование</h1>
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
            <a href="/admin/static_pages" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[StaticPage][title]" value="<?=$data['StaticPage']['title']?>" >
    			</div>
    			<div class="form-group">
    				<label for="editor2">Текст</label>
    				<textarea id="editor2" class="form-control"  name="data[StaticPage][body]" ><?=$data['StaticPage']['body']?></textarea>
    			</div>
          
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(!empty($data['StaticPage']['img'])): ?>
      					<div class="model_info_img">
      						<div class="model_item_container">
      							<div class="model_item">
      									<img src="/img/static_pages/thumbs/<?=$data['StaticPage']['img']?>">
      							</div>
      						</div>
      					</div>
      				<?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[StaticPage][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
          <div class="form-group">
				<label for="inputName">Ключевые слова</label>
				<input type="text" id="inputName" class="form-control" name="data[StaticPage][keywords]" value="<?=$data['StaticPage']['keywords']?>" >
			</div>
			<div class="form-group">
				<label for="inputName">Мета описание</label>
				<input type="text" id="inputName" class="form-control" name="data[StaticPage][description]" value="<?=$data['StaticPage']['description']?>" >
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
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor2' );
</script>