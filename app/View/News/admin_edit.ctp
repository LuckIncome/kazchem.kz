<?php 
echo $this->Form->create('News', array('type' => 'file'));
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
            <a href="/admin/news" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputName">Название</label>
    				<input type="text" id="inputName" class="form-control"  required="required" name="data[News][title]" value="<?=$data['News']['title']?>" >
    			</div>
    			<div class="form-group">
    				<label for="editor2">Текст</label>
    				<textarea id="editor2" class="form-control"  name="data[News][body]" ><?=$data['News']['body']?></textarea>
    			</div>
          <div class="form-group">
              <label>Дата :</label>
              <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" name="data[News][date]" value="<?=$data['News']['date']?>" data-target="#reservationdate"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
              </div>
          </div>
          <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(!empty($data['News']['img'])): ?>
      					<div class="model_info_img">
      						<div class="model_item_container">
      							<div class="model_item">
      									<img src="/img/news/thumbs/<?=$data['News']['img']?>">
      							</div>
      						</div>
      					</div>
      				<?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg" name="data[News][img]" />
                      <label class="custom-file-label" for="reviewimg"></label>
                  </div>
              </div>
          </div>
          <div class="form-group ">
              <label for="reviewimg2">Картинка 2</label>
              <?php if(!empty($data['News']['img2'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                    <div class="model_item">
                        <img src="/img/news/thumbs/<?=$data['News']['img2']?>">
                    </div>
                  </div>
                </div>
              <?php endif ?>
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="reviewimg2" name="data[News][img2]" />
                      <label class="custom-file-label" for="reviewimg2"></label>
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label for="keywords">Ключевые слова</label>
            <input type="text" id="keywords" class="form-control" name="data[News][keywords]" value="<?=$data['News']['keywords']?>" >
          </div>
          <div class="form-group">
            <label for="description">Мета описание</label>
            <input type="text" id="description" class="form-control" name="data[News][description]" value="<?=$data['News']['description']?>" >
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
  <!-- Images start -->

  <form action="/admin/images/add" id="Image/addForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
  <div style="display:none;">
    <input type="hidden" name="_method" value="POST">
  </div>
  <div class="input file required">
    <label for="Image">Изображение:</label>
    <!-- <input type="file" name="data[Image][img]" id="Image" required="required"> -->
    <div class="custom-file" style="margin-bottom: 20px;">
        <input type="file" class="custom-file-input" id="reviewimg3" name="data[Image][img]" />
        <label class="custom-file-label" for="reviewimg3"></label>
    </div>
  </div>
  <input type="hidden" name="data[Image][page_id]" value="<?=$id?>">
  <input type="hidden" name="data[Image][type]" value="news">
  <div class="submit"><input class="btn btn-success" type="submit" value="Добавить"></div>
</form>

  <table class="table">
    <thead class="thead">
        <tr>
          <th>ID</th><th>Изображение</th><th>Удалить</th>
        </tr>
    </thead>
    <?php foreach ($images as $item) : ?>
      <tr>
      <td><?= $item['Image']['id']; ?></td>
      <td><img src="/img/images/thumbs/<?=$item['Image']['img']?>" width="100"></td>

       <td>
    <div class="news_del">  <?php echo $this->Form->postLink('Удалить', array('controller' => 'images', 'action' => 'admin_delete', $item['Image']['id']), array('confirm' => 'Подтвердите удаление')); ?>
          </div> 
      </td>
      </tr>
    <?php endforeach; ?>
</table>

<!-- Images end -->

<style type="text/css">
  .news_del a{
    color: #ffffff;
    background-color: #dc3545;
    border-color: #dc3545;
    box-shadow: none;
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
  }
  .news_del a:hover{
    background-color: #c82333;
    border-color: #bd2130;
  }
</style>

</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor2' );
</script>