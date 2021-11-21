


<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Отзывы клиентов</h1>
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
      <h3 class="card-title">Отзывы клиентов</h3>
      <div class="card-tools">
        <a href="/admin/reviews/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
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
                  <th style="width: 20%">
                      ФИО
                  </th>
                  <th style="width: 30%">
                      Картинка
                  </th>
                  <!-- <th style="width: 8%" class="text-center">
                      Статус
                  </th> -->
              </tr>
          </thead>
          <tbody>

			<?php if(!empty($data)): ?>
			
			 	<?php foreach($data as $item): ?>
					<tr>
						<td>
							<?=$item['Review']['id']?>
						</td>
            <td>
            <a>
              <?php  foreach($item['companyTranslation'] as $title): ?>
                <?= $title['locale'] .': '. $title['content']; ?><br>
              <?php endforeach; ?>
            </a>
            <br/>
            <small>
              Дата создание  <?php echo $this->Time->format($item['Review']['created'], '%d.%m.%Y', 'invalid'); ?>   
            </small>
          </td>
					<td>
						<a>
						  <?php  foreach($item['titleTranslation'] as $title): ?>
                <?= $title['locale'] .': '. $title['content']; ?><br>
              <?php endforeach; ?>
						</a>
					</td>
					<td>
						<?php if(!empty($item['Review']['img'])): ?>
							<img alt="<?=$item['Review']['name']?>" class="img-thumbnail mb-2" style="max-width: 200px" src="/img/reviews/<?=$item['Review']['img']?>">
						<?php else: ?>
							<img alt="<?=$item['Review']['name']?>" class="img-thumbnail mb-2"  style="max-width: 200px"  src="/img/admin_img/default.svg">
						<?php endif ?>
					</td>
					<!-- <td class="project-state">
						<span class="badge badge-success">Добавлен</span>
					</td> -->
					<td class="project-actions text-right">
						<a class="btn btn-info btn-sm" href="/admin/reviews/edit/<?=$item['Review']['id']?>?lang=ru">
              <i class="fas fa-pencil-alt">
              </i>
              Рус
            </a>
            <a class="btn btn-info btn-sm" href="/admin/reviews/edit/<?=$item['Review']['id']?>?lang=kz">
              <i class="fas fa-pencil-alt">
              </i>
              Кз
            </a>
            <a class="btn btn-info btn-sm" href="/admin/reviews/edit/<?=$item['Review']['id']?>?lang=en">
              <i class="fas fa-pencil-alt">
              </i>
              En
            </a>
						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Review']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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