<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Производители </h1>
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
      <h3 class="card-title">Продукты</h3>
      <div class="card-tools">
        <a href="/admin/manufacturers/add?lang=ru" class="btn  btn-success">Добавить новый материал</a>
      </div>
		
    </div>
    <div class="card-body p-0">
    <?php if(!empty($data)): ?>
      <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    ID
                </th>
                <th style="width: 20%">
                    Название
                </th>
              
                <th style="width: 8%" class="text-center">
                    Статус
                </th>
            </tr>
        </thead>
        <tbody>
         	<?php foreach($data as $item): ?>
        		<tr>
        			<td>
        				<?=$item['Manufacturer']['id']?>
        			</td>
        			<td>
        				
                  ru: <?=$item['Manufacturer']['title_ru']?><br>
                  kz: <?=$item['Manufacturer']['title_kz']?><br>
        				  en: <?=$item['Manufacturer']['title_en']?>
        				
        				<br/>
        				<small>
        					Дата создание  <?php echo $this->Time->format($item['Manufacturer']['created'], '%d.%m.%Y', 'invalid'); ?>   
        				</small>
        			</td>
        		
        			<td class="project-state">
        				<span class="badge badge-success">Добавлен</span>
        			</td>
        			<td class="project-actions text-right">
        				<a class="btn btn-info btn-sm" href="/admin/manufacturers/edit/<?=$item['Manufacturer']['id']?>?lang=ru">
        					<i class="fas fa-pencil-alt">
        					</i>
        					Редактировать
        				</a>
                
        				<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Manufacturer']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
        			</td>
        		</tr>
        	<?php endforeach ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="emty_data">
        К сожалению в данном разделе еще не добавлена информация...
      </div> 
    <?php endif ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>