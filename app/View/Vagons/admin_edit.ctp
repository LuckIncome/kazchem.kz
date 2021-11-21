<?php 
$categories = array(1 => 'Интервью', 2 => 'Турнир');
?>
<div class="content-up">
	<span class="content-up__heading">Редактирование материала</span>
</div>
<div class="add-part">
<?php
echo $this->Form->create('News', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));

if(isset($this->request->query['lang']) && $this->request->query['lang'] == 'ru'){
	?>
	<div class="input select">
	<label for="NewsCategoryId">Категория:</label>
		<select required name="data[News][category_id]" id="NewsCategoryId">
			<option value="">Выберите категорию</option>
			<?php foreach($categories as $key => $value): ?>
				<option value="<?=$key?>" <?= ($data['News']['category_id'] == $key)? 'selected' : '' ?>><?=$value?></option>
			<?php endforeach ?>
		</select>
	</div>
	<?php
	echo $this->Form->input('date', array('label' => 'Дата:'));
	echo $this->Form->input('img', array('label' => 'Картинка:', 'type' => 'file'));
}
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('meta_title', array('label' => 'Мета заголовок:'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Мета описание:'));
?>
<div class="edit_bot">
	<div class="bot_r">
	<?
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
	?>
	</div>
</div>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>