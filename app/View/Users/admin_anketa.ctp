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
                      Имя
                  </th>
                 
						<th>
							Область 
						</th>
						<th>
							Город 
						</th>
						<th>
							Точный адрес 
						</th>
						<th>
							Ж/д станция
						</th>
						<th>
							Общая посевная площадь, га
						</th>
						<th>
							Площадь засеваемая, га
						</th>
						<th>
							Площадь паровая, га
						</th>
						<th>
							Площадь удобряемая, га 
						</th>
						<th>
							Культура Засеваемая 
						</th>
						<th>
							Культура Предыдущая 
						</th>
						<th>
							Средняя урожайность до использования удоберний, ц/га 
						</th>
						<th>
							Средняя урожайность после использования удоберний, ц/га 
						</th>
						<th>
							Используемые удобрения 
						</th>
						<th>
							Нормы внесения, кг/га в ф.в. 
						</th>
						<th>
						</th>
						<th>
							N-азот, гр/кг 
						</th>
						<th>
							P- фосфор, гр/кг 
						</th>
						<th>
							K-калий, гр/кг 
						</th>
						<th>
							Толщина пахотного слоя, см 
						</th>
						<th>
							Кислотность почвы, pH 
						</th>
						<th>
							Содержание гумуса, % 
						</th>
						<th>
							Степень засоренности сорняками 
						</th>

						
						<th >
							Действие
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
							<?=$item['User']['id']?>
						</td>
						<td>
							<?=$item['User']['fio']?>
						</td>
						<td>
							<!-- Область --> <?php echo $this->Common->get_anketa($item['User']['id'],'Регион');?>
						</td>
						<td>
							<!-- Город --> <?php echo $this->Common->get_anketa($item['User']['id'],'Город');?>
						</td>
						<td>
							<!-- Точный адрес --> <?php echo $this->Common->get_anketa($item['User']['id'],'Адрес');?>
						</td>
						<td>
							<!-- Ж/д станция --> <?php echo $this->Common->get_anketa($item['User']['id'],'Станция');?>
						</td>
						<td>
							<!-- Общая посевная площадь, га --> <?php echo $this->Common->get_anketa($item['User']['id'],'Общая_площадь');?>
						</td>
						<td>
							<!-- Площадь засеваемая, га --> <?php echo $this->Common->get_anketa($item['User']['id'],'Площадь_засеваемая');?>
						</td>
						<td>
							<!-- Площадь паровая, га --> <?php echo $this->Common->get_anketa($item['User']['id'],'Площадь_паровая');?>
						</td>
						<td>
							<!-- Площадь удобряемая, га --> <?php echo $this->Common->get_anketa($item['User']['id'],'Площадь_удобряемая');?>
						</td>
						<td>
							<!-- Засеваемая --> <?php echo $this->Common->get_anketa($item['User']['id'],'Засеваемая');?>
						</td>
						<td>
							<!-- Предыдущая --> <?php echo $this->Common->get_anketa($item['User']['id'],'Предыдущая');?>
						</td>
						<td>
							<!-- Средняя урожайность до использования удоберний, ц/га  --><?php echo $this->Common->get_anketa($item['User']['id'],'Средняя_урожайность_до_использования_удоберний');?>
						</td>
						<td>
							<!-- Средняя урожайность после использования удоберний, ц/га  --><?php echo $this->Common->get_anketa($item['User']['id'],'Средняя_урожайность_после_использования_удоберний');?>
						</td>
						<td>
							<!-- Используемые удобрения  --><?php echo $this->Common->get_anketa($item['User']['id'],'Используемые_удобрения');?>
						</td>
						<td>
							<!-- Нормы внесения, кг/га в ф.в.  --><?php echo $this->Common->get_anketa($item['User']['id'],'Нормы_внесения');?>
						</td>
						<td>
							<!-- Плотность почвы, г/см3  --><?php echo $this->Common->get_anketa($item['User']['id'],'Плотность_почвы');?>
						</td>
						<td>
							<!-- N-азот, гр/кг  --><?php echo $this->Common->get_anketa($item['User']['id'],'N_азот');?>
						</td>
						<td>
							<!-- P- фосфор, гр/кг --> <?php echo $this->Common->get_anketa($item['User']['id'],'P_фосфор');?>
						</td>
						<td>
							<!-- K-калий, гр/кг --> <?php echo $this->Common->get_anketa($item['User']['id'],'K_калий');?>
						</td>
						<td>
							<!-- Толщина пахотного слоя, см --> <?php echo $this->Common->get_anketa($item['User']['id'],'Толщина_пахотного_слоя');?>
						</td>
						<td>
							<!-- Кислотность почвы, pH --> <?php echo $this->Common->get_anketa($item['User']['id'],'Кислотность_почвы');?>
						</td>
						<td>
							<!-- Содержание гумуса, % --> <?php echo $this->Common->get_anketa($item['User']['id'],'Содержание_гумуса');?>
						</td>
						<td>
							<!-- Степень засоренности сорняками --> <?php echo $this->Common->get_anketa($item['User']['id'],'Степень_засоренности_сорняками');?>
						</td>

						
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
      <?php if($data): ?>
	    <div class="pagination">
	        <!-- <?php if($paginator['start']): ?>
	            <a href="<?=$paginator['link']?>1" class="p_start pag_btn "> << </a>
	        <?php endif ?> -->

	        <?php if($paginator['prev']): ?>
	            <a href="<?=$paginator['link']?><?=$paginator['prev']?>" class="pag prev"><</a>
	        <?php endif ?>
	        <span class="pag_name">
	            <?=__('Страница')?> <?=$paginator['current_page']?> <?=__('из')?>
	            <?=$paginator['count_pages']?>
	         </span> 
	        <?php if($paginator['next']): ?>
	            <a href="<?=$paginator['link']?><?=$paginator['next']?>" class="pag next"> > </a>
	        <?php endif ?>

	     <!--    <?php if($paginator['end']): ?>
	            <a href="<?=$paginator['link']?><?=$paginator['count_pages']?>" class="p_end pag_btn "> >> </a>
	        <?php endif ?> -->
	    </div>
	<?php endif ?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>