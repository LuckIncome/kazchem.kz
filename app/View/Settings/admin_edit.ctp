<h1>Главная страница и Контакты </h1>

<div class="model_info">
<?php 
echo $this->Form->create('Setting', array('type' => 'file'));
// echo $this->Form->input('img', array('label' => '', 'type' => 'file'));

echo $this->Form->input('title', array('label' => 'Заголовок', 'class' => ''));
echo $this->Form->input('body', array('label' => 'О нас верхний текст ', 'class' => ''));
echo $this->Form->input('description', array('label' => 'О нас нижний текст', 'id' => 'editor'));

echo $this->Form->input('pre_title', array('label' => 'Преимущества заголовок', 'class' => ''));
echo $this->Form->input('pre_text', array('label' => 'Преимущества текст', 'class' => ''));
echo $this->Form->input('pre2_title', array('label' => 'Преимущества 2 заголовок', 'class' => ''));
echo $this->Form->input('pre2_text', array('label' => 'Преимущества 2 текст', 'class' => ''));
echo $this->Form->input('pre3_title', array('label' => 'Преимущества 3 заголовок', 'class' => ''));
echo $this->Form->input('pre3_text', array('label' => 'Преимущества 3 текст', 'class' => ''));

echo $this->Form->input('service_text', array('label' => 'Текст услуги', 'id' => 'editor'));

echo $this->Form->input('address', array('label' => 'Адрес', 'class' => ''));
echo $this->Form->input('phone', array('label' => 'Телефон', 'class' => ''));
echo $this->Form->input('phone2', array('label' => 'Телефон на шапке', 'class' => ''));
echo $this->Form->input('email', array('label' => 'Почта', 'class' => ''));
echo $this->Form->input('map_code', array('label' => 'Код карты', 'class' => ''));
echo $this->Form->input('instagram', array('label' => 'Instagram', 'class' => ''));
echo $this->Form->input('fb', array('label' => 'FB', 'class' => ''));
echo $this->Form->input('vk', array('label' => 'Youtube', 'class' => ''));
// echo $this->Form->input('google', array('label' => 'Google Plus', 'class' => ''));
// echo $this->Form->input('twitter', array('label' => 'Twitter', 'class' => ''));
// echo $this->Form->input('main_gold_text', array('label' => 'Текст золото', 'class' => ''));
// echo $this->Form->input('main_auto_title', array('label' => 'Заголовок авто', 'class' => ''));
// echo $this->Form->input('main_auto_text', array('label' => 'Текст авто', 'class' => ''));
// echo $this->Form->input('main_realty_title', array('label' => 'Заголовок недвижимость', 'class' => ''));
// echo $this->Form->input('main_realty_text', array('label' => 'Текст недвижимость', 'class' => ''));
echo $this->Form->input('seo-main-title', array('label' => 'мета загловок', 'class' => ''));

echo $this->Form->input('seo-main-keywords', array('label' => 'мета ключевые слова', 'class' => ''));
echo $this->Form->input('seo-main-description', array('label' => 'мета описание', 'class' => ''));





// echo $this->Form->input('date', array('label' => 'Дата:',));
// echo $this->Form->input('keywords', array('label' => 'Ключевые слова(для поисковиков):', 'class' => ''));
// echo $this->Form->input('description', array('label' => 'Описание(для поисковиков):', 'class' => ''));
?>

</div>
<?
echo $this->Form->end('Редактировать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
	 // CKEDITOR.replace( 'editor2' );
	 // CKEDITOR.replace( 'editor3' );
</script>
</div>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Редактирование проекта</h1>
      </div>
    </div>
  </div>
</section>
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
		        	<?php if(!empty($data['Setting']['img'])): ?>
						<div class="model_info_img">
							<div class="model_item_container">
								<div class="model_item">
										<img src="/img/settings/thumbs/<?=$data['Setting']['img']?>">
								</div>
							</div>
						</div>
					<?php endif ?>
				</div>
				<div class="form-group">
					<label for="inputName">Название</label>
					<input type="text" id="inputName" class="form-control" name="data[Setting][title]"  value="<?=$data['Setting']['title']?>">
				</div>
				<div class="form-group">
					<label for="inputStatus">Статус</label>
					<input type="text" id="inputStatus" class="form-control" name="data[Setting][status]"  value="<?=$data['Setting']['status']?>">
				</div>
				<div class="form-group">
					<label for="inputDescription">Краткое описание</label>
					<textarea id="inputDescription" class="form-control" name="data[Setting][short_desc]" value=""><?=$data['Setting']['short_desc']?></textarea>
				</div>
				<div class="form-group">
					<label for="selectRegion">Регион:</label>
					<select name="data[Setting][region_id]"  id="selectRegion" class="form-control custom-select">
						<option value="akmola">Акмолинская область</option>
						<option value="vko">Восточно-Казахстанская область</option>
						<option value="pavlodar">Павлодарская область</option>
						<option value="sko">Северо-Казахстанская область</option>
						<option value="nursultan">Нур-Султан</option>
						<option value="kostanai">Костанайская область</option>
						<option value="karaganda">Карагандинская область</option>
						<option value="almaty">Алматинская область</option>
						<option value="almaty_city">Алматы</option>
						<option value="zhambyl">Жамбылская область</option>
						<option value="uko">Туркестанская область</option>
						<option value="shymkent">Шымкент</option>
						<option value="kyzylorda">Кызылординская область</option>
						<option value="aktobe">Актюбинская область</option>
						<option value="zko">Западно-Казахстанская область</option>
						<option value="atiray">Атырауская область</option>
						<option value="mangistay">Мангистауская область</option>
					</select> 
				</div>
		        <div class="form-group">
					<label for="inputCkeditor">Текст</label>
					<textarea id="editor2" class="form-control" name="data[Setting][body]"><?=$data['Setting']['body']?></textarea>
				</div>
				<div class="form-group">
		            <label for="exampleInputFile">Изоброжение</label>
		            <div class="input-group">
		              <div class="custom-file">
		                <input type="file" class="custom-file-input" id="exampleInputFile" name="data[Setting][img]">
		                <label class="custom-file-label" for="exampleInputFile" ></label>
		              </div>
		            </div>
		        </div>
		        <div class="form-group">
		            <label>Дата :</label>
		            <div class="input-group date col-3" id="reservationdate" data-target-input="nearest">
		                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
		                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
		                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <!-- /.card-body -->
		  </div>
		  <!-- /.card -->
		</div>
		<div class="col-md-12">
		  <div class="card card-secondary">
		    <div class="card-header">
		      <h3 class="card-title">SEO</h3>

		      <div class="card-tools">
		        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		          <i class="fas fa-minus"></i></button>
		      </div>
		    </div>
		    <div class="card-body">
		      <div class="form-group">
		        <label for="seoKeywords">Ключевые слова</label>
		        <input type="text" id="seoKeywords" class="form-control"  name="data[Setting][keywords]" >
		      </div>
		      <div class="form-group">
		        <label for="seoDescription">Описание</label>
		        <textarea id="seoDescription" class="form-control" name="data[Setting][description]"></textarea>
		      </div>
		    
		    </div>
		    <!-- /.card-body -->
		  </div>
		  <!-- /.card -->
		  <!-- <div class="card card-info">
		    <div class="card-header">
		      <h3 class="card-title">Files</h3>

		      <div class="card-tools">
		        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		          <i class="fas fa-minus"></i></button>
		      </div>
		    </div>
		    <div class="card-body p-0">
		      <table class="table">
		        <thead>
		          <tr>
		            <th>File Name</th>
		            <th>File Size</th>
		            <th></th>
		          </tr>
		        </thead>
		        <tbody>

		          <tr>
		            <td>Functional-requirements.docx</td>
		            <td>49.8005 kb</td>
		            <td class="text-right py-0 align-middle">
		              <div class="btn-group btn-group-sm">
		                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
		                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
		              </div>
		            </td>
		          <tr>
		            <td>UAT.pdf</td>
		            <td>28.4883 kb</td>
		            <td class="text-right py-0 align-middle">
		              <div class="btn-group btn-group-sm">
		                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
		                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
		              </div>
		            </td>
		          <tr>
		            <td>Email-from-flatbal.mln</td>
		            <td>57.9003 kb</td>
		            <td class="text-right py-0 align-middle">
		              <div class="btn-group btn-group-sm">
		                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
		                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
		              </div>
		            </td>
		          <tr>
		            <td>Logo.png</td>
		            <td>50.5190 kb</td>
		            <td class="text-right py-0 align-middle">
		              <div class="btn-group btn-group-sm">
		                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
		                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
		              </div>
		            </td>
		          <tr>
		            <td>Contract-10_12_2014.docx</td>
		            <td>44.9715 kb</td>
		            <td class="text-right py-0 align-middle">
		              <div class="btn-group btn-group-sm">
		                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
		                <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
		              </div>
		            </td>

		        </tbody>
		      </table>
		    </div>
		   
		  </div> -->
		  <!-- /.card -->
		</div>
	</div>
	<div class="row">
	<div class="col-12">
		<?
			echo $this->Form->button('Редактировать', array('class' => 'btn btn-success float-right'));
		?>
	 
	</div>
	</div>
</section>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>