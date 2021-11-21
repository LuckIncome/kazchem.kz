<?php 
echo $this->Form->create('About', array('type' => 'file'));
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
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
        </div>
        <div class="card-body">
        	
			<div class="form-group">
                <?php if(!empty($data['About']['img'])): ?>
                <div class="model_info_img">
                    <div class="model_item_container">
                        <div class="model_item">
                            <img src="/img/abouts/<?=$data['About']['img']?>" />
                        </div>
                    </div>
                </div>
                <?php endif ?>
            </div>
			<div class="form-group">
				<label for="title">Заголовок</label>
				 <input type="text" id="title" class="form-control" name="data[About][title]"  />
				
			</div>
		
          
			<div class="form-group">
				<label for="body">Текст</label>
				<textarea id="body" class="form-control" name="data[About][body]" ></textarea>
			</div>
			<div class="form-group">
                <label for="img">Картинка    </label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="img" name="data[About][img]" />
                        <label class="custom-file-label" for="img"></label>
                    </div>
                </div>
            </div>
           
           	<hr />
	
            <div class="row">
                <div class="col-12">
                    <div class="info-box bg-light">
                        <div class="info-box-content">
                            <div class="info-box-header">
                                Нижний блок
                            </div>
                            <div class="form-group">
                                <label for="block_title">Заголовок  </label>
                                <input type="text" id="block_title" class="form-control" name="data[About][block_title]"  />
                            </div>
                           <div class="form-group">
                                <label for="block_text">Текст</label>
                                <textarea id="block_text" class="form-control" name="data[About][block_text]" ></textarea>
                            </div>
                            <div class="form-group">
                                <?php if(!empty($data['About']['block_img'])): ?>
                                <div class="model_info_img">
                                    <div class="model_item_container">
                                        <div class="model_item">
                                            <img src="/img/abouts/<?=$data['About']['block_img']?>" />
                                        </div>
                                    </div>
                                </div>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="block_img">Картинка  </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="block_img" name="data[About][block_img]" />
                                        <label class="custom-file-label" for="block_img"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
               
            </div>
            <hr />
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
                    <label for="seoTitle">CEO заголовок</label>
                    <input type="text" id="seoTitle" class="form-control" name="data[About][seo_title]" />
                </div>
                <div class="form-group">
                    <label for="seoKeywords">Ключевые слова</label>
                    <input type="text" id="seoKeywords" class="form-control" name="data[About][seo_keywords]" />
                </div>
                <div class="form-group">
                    <label for="seoDescription">Описание</label>
                    <textarea id="seoDescription" class="form-control" name="data[About][seo_description]"></textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
        <!-- /.card -->
    </div>
    <div class="col-12">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
     <?
	echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>

<script type="text/javascript">
    CKEDITOR.replace("body");
    CKEDITOR.replace("block_text");
</script>