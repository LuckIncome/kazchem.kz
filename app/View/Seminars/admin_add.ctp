<?php 
echo $this->Form->create('Seminar', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Добавление</h1>
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
           <a href="/admin/news" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    	        	<?php if(!empty($data['Seminar']['img'])): ?>
    					<div class="model_info_img">
    						<div class="model_item_container">
    							<div class="model_item">
    									<img src="/img/news/thumbs/<?=$data['Seminar']['img']?>">
    							</div>
    						</div>
    					</div>
    				<?php endif ?>
    			</div>
          <div class="form-group">
                <?php if(!empty($data['Seminar']['img2'])): ?>
              <div class="model_info_img">
                <div class="model_item_container">
                  <div class="model_item">
                      <img src="/img/news/thumbs/<?=$data['Seminar']['img2']?>">
                  </div>
                </div>
              </div>
            <?php endif ?>
          </div>
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control" required="required" name="data[Seminar][title]"  >
    			</div>
    			<div class="form-group">
    				<label for="editor2">Текст</label>
    				<textarea id="editor2" class="form-control"  name="data[Seminar][body]" ></textarea>
    			</div>
          <div class="form-group">
              <label>Дата :</label>
              <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" name="data[Seminar][date]" data-target="#reservationdate"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[Seminar][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
          <div class="form-group ">
              <label for="reviewimg2">Картинка на втором уровне</label>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg2" name="data[Seminar][img2]" />
                      <label class="custom-file-label" for="reviewimg2"></label>
                  </div>
              </div>
          </div>
          <div class="form-group">
				<label for="inputName">Ключевые слова</label>
				<input type="text" id="inputName" class="form-control" required="required" name="data[Seminar][keywords]">
			</div>
			<div class="form-group">
				<label for="inputName">Мета описание</label>
				<input type="text" id="inputName" class="form-control" required="required" name="data[Seminar][description]">
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
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor2' );
</script>