<div class="title admin_t">
		<h2>Отправка письма</h2>
	</div>
<?php 

echo $this->Form->create('Subscriber', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название'));
// echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->textarea('body', array('label' => 'Контент', 'id' => 'editor'));
// echo $this->Form->input('keywords', array('label' => 'Ключевые слова', 'placeholder' => 'Ключевые слова '));
// echo $this->Form->input('description', array('label' => 'Описание', 'placeholder' => 'Описание '));
echo $this->Form->end('Отправить');
?>
<script type="text/javascript">
	 CKEDITOR.replace( 'editor' );
</script>
</div>