
<h1>О нас</h1>
<div class="content-up">
	<a href="/admin/abouts/add" class="btn btn--add">Добавить картинку</a>
</div>
<?php //debug($data) ?>
<table>
	<tr>
			<th>Изображение</th>
		
			
			<th>Дествия</th>	
		</tr>

	<?php foreach($data as $item): ?>
		<tr>
 		<td><img src="/img/abouts/thumbs/<?=$item['About']['img']?>" width="100px"> </td>

			<td><a href="abouts/edit/<?=$item['About']['id']?>">Редактировать</a> 
		| <?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['About']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>
	</tr>
	<?php endforeach ?>
	</table>