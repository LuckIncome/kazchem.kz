<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Опросник</h1>
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
      <h3 class="card-title">Опросник</h3>
      <div class="card-tools">
       <!--  <a href="/admin/Questionnaires/add?lang=ru" class="btn  btn-success">Добавить новый материал</a> -->
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
                      Использовали ли вы ранее КАС?
                  </th>
                 
            <th>
              Имеется ли у вас техника для внесения КАС? 
            </th>
            <th>
              Общая удобряемая площадь, га? 
            </th>
            <th>
              Что для вас важнее при выборе КАС?
            </th>
            <th>
             Чье производство КАС?
            </th>
              <th>
             Желаете ли вы попробовать КАС с Серой?
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
              <?=$item['Questionnaire']['id']?>
            </td>
            
            <td>
              <?=$item['Questionnaire']['q1']?>
            </td>
            <td>
               <?=$item['Questionnaire']['q2']?>
            </td>
            <td>
               <?=$item['Questionnaire']['q3']?>
            </td>
            <td>
              <?=$item['Questionnaire']['q4']?>
            </td>
            <td>
              <?=$item['Questionnaire']['q5']?>
            </td>
             <td>
               <?=$item['Questionnaire']['q6']?>
            </td>

            
            <td class="project-actions text-right">
             
             
      
              <?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Questionnaire']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?>
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