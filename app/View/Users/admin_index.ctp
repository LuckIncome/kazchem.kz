<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Пользователи</h1>
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
      <h3 class="card-title">Пользователи</h3>
      <div class="card-tools">
       <!--  <a href="/admin/users/add?lang=ru" class="btn  btn-success">Добавить новый материал</a> -->
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
                      Логин
                  </th>
                  <th style="width: 20%">
                      Имя
                  </th>
                  <th style="width: 20%">
                      Почта
                  </th>
                  
                  <!-- <th style="width: 8%" class="text-center">
                      Статус
                  </th> -->
              </tr>
          </thead>
          <tbody>

			<?php if(!empty($data)): ?>
			 <?php $i=0; ?>
			 	<?php foreach($data as $item): ?>
        <?php $i++; ?>
					<tr>
						<td>
							<?=$i?>
						</td>
					<td>
						<a>
						<?=$item['User']['username']?>
						</a>
						<br/>
						<small>
							Дата создание  <?php echo $this->Time->format($item['User']['created'], '%d.%m.%Y', 'invalid'); ?>   
						</small>
					</td>
						<td>
							<?=$item['User']['fio']?>
						</td>
						<td>
							<?=$item['User']['email']?>
						</td>
					<!-- <td class="project-state">
						<span class="badge badge-success">Добавлен</span>
					</td> -->
					<td class="project-actions text-right">
						<a class="btn btn-info btn-sm" href="/admin/users/edit/<?=$item['User']['id']?>">
							<i class="fas fa-pencil-alt">
							</i>
							Редактировать
						</a>
           
		
						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['User']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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