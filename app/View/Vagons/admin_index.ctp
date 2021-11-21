<div class="content-up">
	<a class="btn btn--add" href="/admin/news/add?lang=en">Добавить материал eng</a>
	<a class="btn btn--add" href="/admin/news/add?lang=ru">Добавить материал rus</a>
	<a class="btn btn--add" href="/admin/news/add?lang=kz">Добавить материал kaz</a>
</div>
<table class="table">
	<thead class="thead">
		<tr>
			<th>ID</th><th>Название</th><th>Редактировать</th><th>Удаление</th>
		</tr>
	</thead>
	<?php foreach ($data as $item) : ?>
		<tr>
		<td><?= $item['News']['id']; ?></td>
		
		<td>
			<?php  foreach($item['titleTranslation'] as $title): ?>
				<?= $title['locale'] .': '. $title['content']; ?><br>
			<?php endforeach; ?>
		</td>
		<td>
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=en">eng</a> |
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=ru">rus</a> |
			<a href="/admin/news/edit/<?=$item['News']['id']?>?lang=kz">kaz</a>
		 </td>
		 <td>
	<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['News']['id']), array('confirm' => 'Подтвердите удаление')); ?>
				
		</td>
		</tr>
	<?php endforeach; ?>
</table>