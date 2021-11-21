<!-- <a href="/admin/requests/add">Добавить фото</a> -->
<!-- <br> -->
<table>
<th>ID</th><th>Тип</th><th>Город</th><th>ФИО</th><th>Телефон</th><th>E-mail</th><th>Пол</th><th>Возраст</th><th>Образование</th><th>Резюме</th><th>Действия</th>
<?php foreach ($data as $item) : ?>
	<tr>
	<td><?=$item['Request']['id']?></td>
	<td><?=($item['Request']['type'] == 'candidate') ? 'Вакансия': 'Заявка арендадателя'; ?></td>
	<td><?=$item['Request']['city']?></td>
	<td><?=$item['Request']['fio']?></td>
	<td><?=$item['Request']['phone']?></td>
	<td><?=$item['Request']['email']?></td>
	<td><?=$item['Request']['sex']?></td>
	<td><?=$item['Request']['age']?></td>
	<td><?=$item['Request']['education']?></td>
	<td>
	<?php if(isset($item['Request']['resume']) && !empty($item['Request']['resume'])): ?>
		<a download href="/files/resumes/<?=$item['Request']['resume']?>">Скачать</a>
	<?php else: ?>
		
	<?php endif ?>
	</td>
	
	<td>
	
<div class="news_del">	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Request']['id']), array('confirm' => 'Подтвердите удаление')); ?>
			</div> 
	</td>
	</tr>
<?php endforeach; ?>
</table>
