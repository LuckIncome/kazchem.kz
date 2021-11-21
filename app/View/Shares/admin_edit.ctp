<?php 
echo $this->Form->create('Share', array('type' => 'file'));
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
            <a href="/admin/shares" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[Share][title]" value="<?=$data['Share']['title']?>" >
    			</div>
    			<div class="form-group">
    				<label for="editor2">Текст</label>
    				<textarea id="editor2" class="form-control"  name="data[Share][body]" ><?=$data['Share']['body']?></textarea>
    			</div>
          <!-- <div class="form-group">
              <label>Ссылка :</label>
              <input type="text" id="inputName" class="form-control" name="data[Share][link]"  value="<?=$data['Share']['link']?>">
          </div> -->
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(isset($data['Share']['img']) && !empty($data['Share']['img'])): ?>
      					<div class="model_info_img">
      						<div class="model_item_container">
      							<div class="model_item">
      									<img src="/img/shares/thumbs/<?=$data['Share']['img']?>">
      							</div>
      						</div>
      					</div>
      				<?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Share][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
          <div class="form-group ">
              <label for="reviewimg2">Превью  </label>
              <?php if(isset($data['Share']['img2']) && !empty($data['Share']['img2'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                    <div class="model_item">
                        <img src="/img/shares/thumbs/<?=$data['Share']['img2']?>">
                    </div>
                  </div>
                </div>
              <?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg2" name="data[Share][img2]" />
                      <label class="custom-file-label" for="reviewimg2"></label>
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
    <div class="col-md-12">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">SEO</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="seoKeywords">Ключевые слова</label>
                    <input type="text" id="seoKeywords" class="form-control" name="data[Share][keywords]" value="<?=$data['Share']['keywords']?>" />
                </div>
                <div class="form-group">
                    <label for="seoDescription">Описание</label>
                    <textarea id="seoDescription" class="form-control" name="data[Share][description]"><?=$data['Share']['description']?></textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
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