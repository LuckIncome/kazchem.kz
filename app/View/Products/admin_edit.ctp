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
<?php 
echo $this->Form->create('Product', array('type' => 'file'));
?>
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
            <input type="text" id="inputName" class="form-control"  required="required" name="data[Product][title_<?=$l?>]"  value="<?=(!empty($data['Product']['title_'.$l])) ? $data['Product']['title_'.$l] : '' ?>">

          </div>
          <div class="form-group">
            <label for="editor2">Текст</label>
            <textarea id="editor2" class="form-control"  name="data[Product][body_<?=$l?>]" ><?=(!empty($data['Product']['body_'.$l])) ? $data['Product']['body_'.$l] : '' ?></textarea>
          </div>
          <?php if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'): ?>
            <div class="form-group ">
              <label for="reviewimg">Картинка  </label>
              <?php if(!empty($data['Partner']['img'])): ?>
                  <div class="model_info_img">
                    <div class="model_item_container">
                      <div class="model_item">
                          <img src="/img/products/thumbs/<?=$data['Product']['img']?>">
                      </div>
                    </div>
                  </div>
                <?php endif ?>
              <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="reviewimg" name="data[Product][img]" value="" />
                    <label class="custom-file-label" for="reviewimg"></label>
                </div>
              </div>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[Product][in_stock]" value="1" <?=($data['Product']['in_stock']) ? 'checked' : '' ?>> В наличии
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[Product][novelty]" value="1" <?=($data['Product']['novelty']) ? 'checked' : '' ?>> Новинка
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[Product][share]" value="1" <?=($data['Product']['share']) ? 'checked' : '' ?>> Акция
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[Product][discount]" value="1" <?=($data['Product']['discount']) ? 'checked' : '' ?>> Скидки
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="data[Product][subsid]" value="1" <?=($data['Product']['subsid']) ? 'checked' : '' ?>> Субсидируется
              </label>
            </div>
            <div class="form-group">
              <label for="selectRegion">Производитель:</label>
              <select name="data[Product][manufacturer_id]" id="selectRegion" class="form-control custom-select">
                <?php foreach ($manufacturers as $item): ?>
                  <option value="<?=$item['Manufacturer']['id']?>"  <?=($data['Product']['manufacturer_id']  == $item['Manufacturer']['id'] ) ? 'selected' : '' ?>><?=$item['Manufacturer']['title_ru']?></option>
                <?php endforeach ?>
              </select> 
            </div>
            <div class="form-group">
              <label for="selectRegion">Вид:</label>
              <?php foreach($types as $item): ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="type[]" value="<?=$item['Type']['id']?>"  
                      <?php foreach ($data['Type'] as $t ):?>
                          <?=($t['id'] == $item['Type']['id'] ) ? 'checked' : '' ?> 
                      <?php endforeach ?>
                     > <?=$item['Type']['title_ru']?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>

            <div class="form-group">
              <label for="selectRegion">Форма:</label>
              <?php foreach($shapes as $item): ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="shape[]" value="<?=$item['Shape']['id']?>"  
                      <?php foreach ($data['Shape'] as $sh ):?>
                          <?=($sh['id'] == $item['Shape']['id']) ? 'checked' : '' ?> 
                      <?php endforeach ?>
                     > <?=$item['Shape']['title_ru']?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>

            <div class="form-group">
              <label for="selectRegion">Период:</label>
              <?php foreach($periods as $item): ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="period[]" value="<?=$item['Period']['id']?>"  
                      <?php foreach ($data['Period'] as $p):?>
                          <?=($p['id'] == $item['Period']['id'] ) ? 'checked' : '' ?> 
                      <?php endforeach ?>
                     > <?=$item['Period']['title_ru']?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>

            <div class="form-group">
              <label for="selectRegion">Культура:</label>
              <?php foreach($crops as $item): ?>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="crop[]" value="<?=$item['Crop']['id']?>"  
                      <?php foreach ($data['Crop'] as $c):?>
                          <?=($c['id'] == $item['Crop']['id'] ) ? 'checked' : '' ?> 
                      <?php endforeach ?>
                     > <?=$item['Crop']['title_ru']?>
                  </label>
                </div>
              <?php endforeach ?>
            </div>
           
          <?php endif ?>
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
                    <input type="text" id="seoKeywords" class="form-control" name="data[Product][keywords_<?=$l?>]" value="<?=(!empty($data['Product']['keywords_'.$l])) ? $data['Product']['keywords_'.$l] : '' ?>" />
                </div>
                <div class="form-group">
                    <label for="seoDescription">Описание</label>
                    <textarea id="seoDescription" class="form-control" name="data[Product][description_<?=$l?>]"><?=(!empty($data['Product']['description_'.$l])) ? $data['Product']['description_'.$l] : '' ?></textarea>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
        <!-- /.card -->
    </div>
    <div class="col-12">
     <!--  <a href="#" class="btn btn-secondary">Cancel</a> -->
    <?php
      echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
    ?>
    </div>
  </div>
  </form>
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
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-images-tab" data-toggle="pill" href="#custom-tabs-one-images" role="tab" aria-controls="custom-tabs-one-images" aria-selected="false">Изображения</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-one-tabContent">
            <?php echo $this->element('admin/product_tab_advantages') ?>
            <?php echo $this->element('admin/product_tab_employments') ?>
            <?php echo $this->element('admin/product_tab_compositions') ?>
            <?php echo $this->element('admin/product_tab_photos') ?>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
   CKEDITOR.replace( 'editor2' );
</script>