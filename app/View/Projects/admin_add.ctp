
<?php 
echo $this->Form->create('Project', array('type' => 'file'));
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Добавление </h1>
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
	        	<?php if(!empty($data['Project']['img'])): ?>
					<div class="model_info_img">
						<div class="model_item_container">
							<div class="model_item">
									<img src="/img/projects/thumbs/<?=$data['Project']['img']?>">
							</div>
						</div>
					</div>
				<?php endif ?>
			</div>
			<div class="form-group">
				<label for="inputName">Название</label>
				<input type="text" id="inputName" class="form-control" name="data[Project][title]"  >
			</div>
			<div class="form-group">
				<label for="inputStatus">Ссылка</label>
				<input type="text" id="inputStatus" class="form-control" name="data[Project][status]" >
			</div>
			<div class="form-group">
				<label for="inputDescription">Краткое описание</label>
				<textarea id="inputDescription" class="form-control" name="data[Project][short_desc]" value=""></textarea>
			</div>
			
  			<div class="form-group">
          <label for="exampleInputFile">Изоброжение</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile" name="data[Project][img]">
              <label class="custom-file-label" for="exampleInputFile" ></label>
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
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor2' );
</script>