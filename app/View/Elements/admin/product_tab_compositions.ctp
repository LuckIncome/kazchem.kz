<div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
  <div class="form-group">
    <?php if(!empty($compositions)): ?>
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
            <?php foreach($compositions as $item): ?>
              <tr>
                <form action="/admin/compositions/edit/<?=$item['Composition']['id']?>" method="POST">
                <td>
                  <?=$item['Composition']['id']?>
                </td>
                <td><textarea name="data[Composition][title_ru]"><?= $item['Composition']['title_ru']; ?></textarea>
                  <textarea name="data[Composition][body_ru]"><?= $item['Composition']['body_ru']; ?></textarea>

                </td>
              
                <td><textarea name="data[Composition][title_kz]"><?= $item['Composition']['title_kz']; ?></textarea>
                    <textarea name="data[Composition][body_kz]"><?= $item['Composition']['body_kz']; ?></textarea>
                </td>
                <td><textarea name="data[Composition][title_en]"><?= $item['Composition']['title_en']; ?></textarea>
                   <textarea name="data[Composition][body_en]"><?= $item['Composition']['body_en']; ?></textarea>
                </td>
                <td><button type="submit" class="btn btn-success ">Изменить</button></td>
               </form>
               <td><?php echo $this->Form->postLink('Удалить', array('controller'=>'compositions','action' => 'admin_delete', $item['Composition']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    <?php else: ?>
      <div class="emty_data">
        К сожалению в данном разделе еще не добавлена информация...
      </div> 
    <?php endif ?>
      <div class="form-group">
        <form method="POST" action="/admin/compositions/add">
          <label for="composition_ru">Текст ru</label>
          <input id="composition_ru" class="form-control" name="data[Composition][title_ru]">
          <input id="" class="form-control" name="data[Composition][body_ru]">
          <label for="composition_kz">Текст kz</label>
          <input id="composition_kz" class="form-control" name="data[Composition][title_kz]">
          <input id="" class="form-control" name="data[Composition][body_kz]">
          <label for="composition_en">Текст en</label>
          <input id="composition_en" class="form-control" name="data[Composition][title_en]">
          <input id="" class="form-control" name="data[Composition][body_en]">
          <input type="hidden" name="data[Composition][product_id]" value="<?=$id?>"> 
          <!-- <div class="col-12"> -->
            <button class="btn btn-success float-right" type="submit">Добавить</button>
          <!-- </div>  -->
        </form>
      </div>
  </div>
</div>