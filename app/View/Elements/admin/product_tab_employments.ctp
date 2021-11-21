<div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
    <?php if(!empty($employments)): ?>
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
            <?php foreach($employments as $item): ?>
              <tr>
                <form action="/admin/employments/edit/<?=$item['Employment']['id']?>" method="POST">
                <td>
                  <?=$item['Employment']['id']?>
                </td>
                <td><textarea name="data[Employment][title_ru]"><?= $item['Employment']['title_ru']; ?></textarea>
                  <textarea name="data[Employment][body_ru]"><?= $item['Employment']['body_ru']; ?></textarea>

                </td>
              
                <td><textarea name="data[Employment][title_kz]"><?= $item['Employment']['title_kz']; ?></textarea>
                    <textarea name="data[Employment][body_kz]"><?= $item['Employment']['body_kz']; ?></textarea>
                </td>
                <td><textarea name="data[Employment][title_en]"><?= $item['Employment']['title_en']; ?></textarea>
                   <textarea name="data[Employment][body_en]"><?= $item['Employment']['body_en']; ?></textarea>
                </td>
                <td><button type="submit" class="btn btn-success ">Изменить</button></td>
               </form>
               <td><?php echo $this->Form->postLink('Удалить', array('controller'=>'employments','action' => 'admin_delete', $item['Employment']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?></td>
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
          <form method="POST" action="/admin/employments/add">
              <label for="employment_ru">Текст ru</label>
              <input id="employment_ru" class="form-control" name="data[Employment][title_ru]">
              <input id="" class="form-control" name="data[Employment][body_ru]">
              <label for="employment_kz">Текст kz</label>
              <input id="employment_kz" class="form-control" name="data[Employment][title_kz]">
              <input id="" class="form-control" name="data[Employment][body_kz]">
              <label for="employment_en">Текст en</label>
              <input id="employment_en" class="form-control" name="data[Employment][title_en]">
              <input id="" class="form-control" name="data[Employment][body_en]">
              <input type="hidden" name="data[Employment][product_id]" value="<?=$id?>"> 
              <div class="col-12">
                <button class="btn btn-success float-right" type="submit">Добавить</button>
              </div> 
          </form>
      </div>
</div>