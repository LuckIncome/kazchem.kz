

<?php 
echo $this->Form->create('Product', array('type' => 'file'));
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
            <a href="/admin/products" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="inputName">Название</label>
            <input type="text" id="inputName" class="form-control"  required="required" name="data[Product][title_<?=$l?>]"  >
          </div>
          <div class="form-group">
            <label for="editor2">Текст</label>
            <textarea id="editor2" class="form-control"  name="data[Product][body_<?=$l?>]" ></textarea>
          </div>
          <div class="form-group ">
            <label for="reviewimg">Картинка  </label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="reviewimg" name="data[Product][img]" />
                    <label class="custom-file-label" for="reviewimg"></label>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="selectRegion">Производитель:</label>
            <select name="data[Product][manufacturer_id]"  id="selectRegion" class="form-control custom-select">
              <?php foreach ($manufacturers as $item): ?>
                <option value="<?=$item['Manufacturer']['id']?>"><?=$item['Manufacturer']['title']?></option>
              <?php endforeach ?>
            </select> 
          </div>
          <div class="form-group">
            <label for="selectRegion">Вид:</label>
              <div class="checkbox">
              <?php foreach ($types as $item): ?>
                  <label>
                    <input type="checkbox" name="type[]" value="<?=$item['Type']['id']?>"> <?=$item['Type']['title_ru']?>
                  </label>
              <?php endforeach ?>
              </div>
          </div>
          <div class="form-group">
            <label for="selectRegion">Форма:</label>
              <div class="checkbox">
                <?php foreach ($shapes as $item): ?>
                    <label>
                    <input type="checkbox" name="shape[]" value="<?=$item['Shape']['id']?>"> <?=$item['Shape']['title_ru']?>
                  </label>
                <?php endforeach ?>
              </div>
          </div>
          <div class="form-group">
            <label for="selectRegion">Перод внесения:</label>
              <div class="checkbox">
                <?php foreach ($periods as $item): ?>
                    <label>
                      <input type="checkbox" name="period[]" value="<?=$item['Period']['id']?>"> <?=$item['Period']['title_ru']?>
                    </label>
                <?php endforeach ?>
              </div>
          </div>
          <div class="form-group">
            <label for="selectRegion">Культура:</label>
              <div class="checkbox">
                <?php foreach ($crops as $item): ?>
                    <label>
                      <input type="checkbox" name="crop[]" value="<?=$item['Crop']['id']?>"> <?=$item['Crop']['title_ru']?>
                    </label>
                <?php endforeach ?>
              </div>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="data[Product][special_offer]" value="1"> Спецпредложение
            </label>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-sm-12">
      <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Преимущества</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Применение</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Состав</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
              <div class="form-group">
                <label for="advantage">Текст</label>
                <textarea id="advantage" class="form-control" name="data[Product][advantage]"></textarea>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
              <div class="form-group">
                <label for="application">Текст</label>
                <textarea id="application" class="form-control" name="data[Product][application]"></textarea>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
              <div class="form-group">
                <label for="composition">Текст</label>
                <textarea id="composition" class="form-control" name="data[Product][composition]"></textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
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
                    <input type="text" id="seoKeywords" class="form-control" name="data[Product][keywords_<?=$l?>]" />
                </div>
                <div class="form-group">
                    <label for="seoDescription">Описание</label>
                    <textarea id="seoDescription" class="form-control" name="data[Product][description_<?=$l?>]"></textarea>
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
  echo $this->Form->button('Добавить', array('class' => 'btn btn-success float-right'));
  ?>
     
    </div>
  </div>
</section>
<script type="text/javascript">
   CKEDITOR.replace( 'editor2' );
</script>