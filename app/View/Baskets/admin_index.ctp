<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Заказы</h1>
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
      <h3 class="card-title">Заказы</h3>
      
		
    </div>
    <div class="card-body p-0">
      <table class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      ID
                  </th>
                  <th style="width: 15%">
                      Телефон
                  </th>
                  <th style="width: 15%">
                      Имя
                  </th>
                  <th style="width: 15%">
                      E-mail
                  </th>
                  <th style="width: 15%">
                      Адрес
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
							<?=$item['Basket']['id']?>
						</td>
					<td>
						<a>
						<?=$item['Basket']['phone']?>
						</a>
						<br/>
						<small>
							Дата создание  <?php echo $this->Time->format($item['Basket']['created'], '%d.%m.%Y', 'invalid'); ?>   
						</small>
					</td>
					<td>
              <?=$item['Basket']['name']?>
            </td>
            <td>
              <?=$item['Basket']['email']?>
            </td>
            <td>
              <?=$item['Basket']['address']?>
            </td>
					<td class="project-state">
						<span class=" "><?=$item['Basket']['status']?></span>
					</td>
					<td class="project-actions text-right">
						<a class="btn btn-info btn-sm" href="/admin/baskets/view/<?=$item['Basket']['id']?>">
							<i class="fas">
							</i>
							Подробнее
						</a>
						<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Basket']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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