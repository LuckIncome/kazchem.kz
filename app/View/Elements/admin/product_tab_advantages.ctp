<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
  <div class="form-group">
  <?php if(!empty($advantages)): ?>
    <table class="table table-striped projects">
      <thead>
          <tr>
              <th style="width: 1%">
                  ID
              </th>
              <th style="width: 20%">
                  Название ru
              </th>
              <th style="width: 20%" >
                  Название kz
              </th>
              <th style="width: 20%" >
                  Название en
              </th>
              <th style="width: 20%" >
                  Редактирование
              </th>
              <th style="width: 20%" >
                  Удаление
              </th>
          </tr>
      </thead>
      <tbody>
          <?php foreach($advantages as $item): ?>
            <tr>
              <form action="/admin/advantages/edit/<?=$item['Advantage']['id']?>" method="POST">
              <td>
                <?=$item['Advantage']['id']?>
              </td>
              <td><textarea name="data[Advantage][title_ru]"><?= $item['Advantage']['title_ru']; ?></textarea>

              </td>
            
              <td><textarea name="data[Advantage][title_kz]"><?= $item['Advantage']['title_kz']; ?></textarea>
              </td>
              <td><textarea name="data[Advantage][title_en]"><?= $item['Advantage']['title_en']; ?></textarea>
              </td>
              <td><button type="submit" class="btn btn-success ">Изменить</button></td>
             </form>
             <td><?php echo $this->Form->postLink('Удалить', array('controller'=>'advantages','action' => 'admin_delete', $item['Advantage']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php else: ?>
      <div class="emty_data">
        К сожалению в данном разделе еще не добавлена информация...
      </div> 
    <?php endif ?>
        <form method="POST" action="/admin/advantages/add">
          <label for="advantage_ru">Текст ru</label>
          <textarea id="advantage_ru" class="form-control" name="data[Advantage][title_ru]"></textarea>
          <label for="advantage_kz">Текст kz</label>
          <textarea id="advantage_kz" class="form-control" name="data[Advantage][title_kz]"></textarea>
          <label for="advantage_en">Текст en</label>
          <textarea id="advantage_en" class="form-control" name="data[Advantage][title_en]"></textarea>
          <input type="hidden" name="data[Advantage][product_id]" value="<?=$id?>"> 
          <div class="col-12">
            <button class="btn btn-success float-right" type="submit">Добавить</button>
          </div> 
          </form>
  </div>
</div>