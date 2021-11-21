<!-- <div class="content-up">
	<a class="btn btn--add" href="/admin/news/add">Добавить материал</a>
</div> -->
<table class="table">
	<thead class="thead">
		<tr>
			<th>ID</th><th>Город</th><th>ФИО</th><th>Телефон</th><th>E-mail</th><th>Сообщение</th><th>Сообщение</th><!-- <th>Редактировать</th> --><th>Удаление</th>
		</tr>
	</thead>
	<?php foreach ($data as $item) : ?>
		<tr>
		<td><?= $item['Send']['id']; ?></td>
		<td><?=$item['Send']['city']?></td>
		<td><?=$item['Send']['fio']?></td>
		<td><?=$item['Send']['phone']?></td>
		<td><?=$item['Send']['body']?></td>
		<!-- <td>
			<a href="/admin/news/edit/<?=$item['Send']['id']?>"> редактировать</a>
		 </td> -->
		 <td>
	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Send']['id']), array('confirm' => 'Подтвердите удаление')); ?>
				
		</td>
		</tr>
	<?php endforeach; ?>
</table>