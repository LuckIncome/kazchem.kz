<?php 
echo $this->Form->create('Review', array('type' => 'file'));
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
            <a href="/admin/reviews" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
      			<div class="form-group">
              <label for="inputName">Наименование компании</label>
              <input type="text" id="inputName" class="form-control"  required="required" name="data[Review][company]"  >
            </div>
      			<div class="form-group">
      				<label for="inputName">ФИО</label>
      				<input type="text" id="inputName" class="form-control"  required="required" name="data[Review][name]"  >
      			</div>
      			<div class="form-group">
      				<label for="question">Отзыв</label>
      				<textarea id="question" class="form-control" name="data[Review][body]" ></textarea>
      			</div>
            <div class="form-group">
              <label for="inputName">Youtube ID</label>
              <input type="text" id="inputName" class="form-control"  required="required" name="data[Review][youtube]"  >
            </div>
            <div class="form-group ">
                <label for="reviewimg">Картинка  </label>
                <?php if(!empty($data['Review']['img'])): ?>
        					<div class="model_info_img">
        						<div class="model_item_container">
        							<div class="model_item">
        									<img src="/img/reviews/thumbs/<?=$data['Review']['img']?>">
        							</div>
        						</div>
        					</div>
        				<?php endif ?>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="reviewimg" name="data[Review][img]" />
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
	echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
	?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'question' );
</script>