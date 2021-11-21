<?php 
echo $this->Form->create('Manufacturer', array('type' => 'file'));
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
            <a href="/admin/manufacturers" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Название RU</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[Manufacturer][title_ru]"  value="<?=(isset($data['Manufacturer']['title_ru'])) ? $data['Manufacturer']['title_ru'] : ''?>">
          </div>
          <div class="form-group">
            <label for="inputName">Название KZ</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[Manufacturer][title_kz]"  value="<?=(isset($data['Manufacturer']['title_kz'])) ? $data['Manufacturer']['title_kz'] : ''?>">
          </div>
          <div class="form-group">
            <label for="inputName">Название EN</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[Manufacturer][title_en]"  value="<?=(isset($data['Manufacturer']['title_en'])) ? $data['Manufacturer']['title_en'] : ''?>">
          </div>
          <div class="form-group">
            <label for="editor_ru">Текст RU</label>
            <textarea id="editor_ru" class="form-control"  name="data[Manufacturer][description_ru]" ><?=(isset($data['Manufacturer']['description_ru'])) ? $data['Manufacturer']['description_ru'] : ''?></textarea>
          </div>
          <div class="form-group">
            <label for="editor_kz">Текст KZ</label>
            <textarea id="editor_kz" class="form-control"  name="data[Manufacturer][description_kz]" ><?=(isset($data['Manufacturer']['description_kz'])) ? $data['Manufacturer']['description_kz'] : ''?></textarea>
          </div>
          <div class="form-group">
            <label for="editor_en">Текст EN</label>
            <textarea id="editor_en" class="form-control"  name="data[Manufacturer][description_en]" ><?=(isset($data['Manufacturer']['description_en'])) ? $data['Manufacturer']['description_en'] : ''?></textarea>
          </div>
          <div class="form-group ">
            <label for="reviewimg">Картинка</label>
            <?php if(!empty($data['Partner']['img'])): ?>
                <div class="model_info_img">
                  <div class="model_item_container">
                    <div class="model_item">
                        <img src="/img/manufacturers/thumbs/<?=$data['Manufacturer']['img']?>">
                    </div>
                  </div>
                </div>
              <?php endif ?>
            <div class="input-group">
              <div class="custom-file">
                  <input type="file" class="custom-file-input" id="reviewimg" name="data[Manufacturer][img]" value="" />
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
</section>
<script type="text/javascript">
   CKEDITOR.replace( 'editor_ru' );
   CKEDITOR.replace( 'editor_kz' );
   CKEDITOR.replace( 'editor_en' );
</script>