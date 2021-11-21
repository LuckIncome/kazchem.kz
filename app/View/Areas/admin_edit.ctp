<?php 
echo $this->Form->create('Area');
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
            <a href="/admin/areas" type="button" class="btn btn-tool">
              <i class="fas fa-arrow-left"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
    			<div class="form-group">
    				<label for="inputNameRu">Название RU</label>
    				<input type="text" id="inputNameRu" class="form-control"  required="required" name="data[Area][title_ru]" value="<?=$data['Area']['title_ru']?>" >
    			</div>
    			<div class="form-group">
            <label for="inputNameKz">Название KZ</label>
            <input type="text" id="inputNameKz" class="form-control" name="data[Area][title_kz]" value="<?=$data['Area']['title_kz']?>" >
          </div>
          <div class="form-group">
            <label for="inputNameEn">Название EN</label>
            <input type="text" id="inputNameEn" class="form-control" name="data[Area][title_en]" value="<?=$data['Area']['title_en']?>" >
          </div>
          <div class="form-group">
            <label for="inputPriority">Приоритет</label>
            <input type="text" id="inputPriority" class="form-control" name="data[Area][priority]" value="<?=$data['Area']['priority']?>" >
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