
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Партнеры</h1>
      </div>
      <div class="col-sm-6">
        
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Партнеры</h3>
      <div class="card-tools">
        <a href="/admin/partners/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div>
		
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      ID
                  </th>
                  <th style="width: 20%">
                      Название
                  </th>
                  <th style="width: 30%">
                      Картинка
                  </th>
                  <th style="width: 8%" class="text-center">
                      Статус
                  </th>
              </tr>
          </thead>
          <tbody>

			<?php if(!empty($data)): ?>
			
			 	<?php foreach($data as $item): ?>
					<tr>
						<td>
							<?=$item['Partner']['id']?>
						</td>
					<td>
						<a>
						  <?php  foreach($item['titleTranslation'] as $title): ?>
                <?= $title['locale'] .': '. $title['content']; ?><br>
              <?php endforeach; ?>
						</a>
						<br/>
						<small>
							Дата создание  <?php echo $this->Time->format($item['Partner']['created'], '%d.%m.%Y', 'invalid'); ?>   
						</small>
					</td>
					<td>
						<?php if(!empty($item['Partner']['img'])): ?>
							<img alt="<?=$item['Partner']['title']?>" class="img-thumbnail mb-2" style="max-width: 200px" src="/img/partners/<?=$item['Partner']['img']?>">
						<?php else: ?>
							<img alt="<?=$item['Partner']['title']?>" class="img-thumbnail mb-2"  style="max-width: 200px"  src="/img/admin_img/default.svg">
						<?php endif ?>
					</td>
					<td class="project-state">
						<span class="badge badge-success">Добавлен</span>
					</td>
					<td class="project-actions text-right">
						<a class="btn btn-info btn-sm" href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=ru">
              <i class="fas fa-pencil-alt">
              </i>
              Рус
            </a>
            <a class="btn btn-info btn-sm" href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=kz">
              <i class="fas fa-pencil-alt">
              </i>
              Кз
            </a>
            <a class="btn btn-info btn-sm" href="/admin/partners/edit/<?=$item['Partner']['id']?>?lang=en">
              <i class="fas fa-pencil-alt">
              </i>
              En
            </a>
						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Partner']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
					</td>
					</tr>
				<?php endforeach ?>
	
			<?php else: ?>
				<p>К сожалению в данном разделе еще не добавлена информация...</p>
			<?php endif ?>
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>