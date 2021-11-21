<h1>Список заказов</h1>
<?php if(!empty($data)): ?>
<table>
	<tr>
		<th>ID</th>
		<th>Телефон</th>
		<th>Email</th>
		<th>Имя</th>
		<th>Способ доставки</th>
		<th>Способ оплаты</th>
		<th>Сумма</th>
		<th>Статус</th>
		<th>Дата</th>
		<!-- <th>Подробнее</th>	 -->
		<th>Дествия</th>	
	</tr>
 	<?php foreach($data as $item): ?>
 	<tr>
 		<td><?=$item['Basket']['id']?></td>
 		<td><?=$item['Basket']['phone']?></td>
 		<td><?=$item['Basket']['email']?></td>
 		<td><?=$item['Basket']['name']?></td>
 		<td><?=$item['Basket']['delivery']?></td>
 		<td><?=($item['Basket']['oplata'] == 'online') ? 'Онлайн' : 'При получении'?></td>
 		<td><?=$item['Basket']['cost']?></td>
 		<td><?=($item['Basket']['status'] == 1) ? 'Оплачен' : 'Не оплачен'?></td>
 		<td>Создание: <?=$item['Basket']['created']?></br>
 		Изменение: <?=$item['Basket']['modified']?></td>
 <!-- <td><a href="/admin/baskets/view/<?=$item['Basket']['id']?>">Подробнее</a></td> -->
 		<td><a href="/admin/baskets/edit/<?=$item['Basket']['id']?>">Редактировать</a> | <a href="/admin/baskets/view/<?=$item['Basket']['id']?>">Подробнее</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Basket']['id']), array('confirm' => 'Подтвердите удаление')); ?> </td>

	<?php endforeach ?>
	</tr>
</table>
<div class="pagi">
	<div class="pages"><div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
	<?php 
	echo $this->Paginator->counter(array(
	    'separator' => ' из ',
	    
	    ));
	 ?>
	</div>		
	<div class="pag-bot">
		<div class="pag-bot__arrow"><?php echo $this->Paginator->first('<<'); ?></div>
		<ul class="pagination">
		<?php echo $this->Paginator->numbers(
		    array(
		        'separator' => '',
		        'tag' => 'li',
		        'modulus' => 4
		        )
		); ?>
    	</ul>
		<div class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></div>
	</div>	
</div>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>