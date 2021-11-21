<h1>Редактирование услуги</h1>
<?php if(!empty($data['Service']['img'])): ?>
<div class="model_info_img">
	<div class="model_item_container">
		<div class="model_item">
				<img src="/img/services/thumbs/<?=$data['Service']['img']?>">
		</div>
	</div>
</div>
<?php endif ?>
<div class="model_info">
<?php 
echo $this->Form->create('Service', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
echo $this->Form->input('price', array('label' => 'Цена','required'));
echo $this->Form->input('short_desc', array('label' => 'Краткое описание'));
echo $this->Form->input('body', array('label' => 'Текст', 'id' => 'editor'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова', 'placeholder' => 'Ключевые слова '));
echo $this->Form->input('description', array('label' => 'Описание', 'placeholder' => 'Описание '));
echo $this->Form->input('date', array('label' => 'Дата:', 'type' => 'date'));
?>
</div>
<?
echo $this->Form->end('Редактировать');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>