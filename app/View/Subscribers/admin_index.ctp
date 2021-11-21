<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Подпискчики</h1>
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
      <h3 class="card-title">Подпискчики</h3>
      <!-- <div class="card-tools">
        <a href="/admin/news/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div> -->
		
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      ID
                  </th>
                  <th style="width: 20%">
                      Имя
                  </th>
                   <th style="width: 20%">
                      E-mail
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
							<?=$item['Subscriber']['id']?>
						</td>
					<td>
						<a>
						<?=$item['Subscriber']['name']?>
						</a>
						<br/>
						<small>
							Дата создание  <?php echo $this->Time->format($item['Subscriber']['created'], '%d.%m.%Y', 'invalid'); ?>   
						</small>
					</td>
					<td>
						<?=$item['Subscriber']['email']?>
					</td>
					<td class="project-state">
						
						<span class="badge badge-<?=($item['Subscriber']['active']) ? 'success' : 'warning'?>"><?=($item['Subscriber']['active']) ? 'Активный' : 'Не активный'?></span>
					</td>
					<td class="project-actions text-right">
			
		
						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Subscriber']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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