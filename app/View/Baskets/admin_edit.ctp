<div class="content-up">
	<span class="content-up__heading">Редактирование заказа</span>
</div>
<?php
	echo $this->Form->create('Basket', array('type' => 'file'));
	echo $this->Form->input('cost', array('label' => 'Сумма'));
	echo $this->Form->input('status', array('label' => 'Оплачен', 'type' => 'checkbox'));
	echo $this->Form->input('id');
	echo $this->Form->end('Редактировать');
?>