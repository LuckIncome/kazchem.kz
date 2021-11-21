<div class="tab-pane fade" id="custom-tabs-one-images" role="tabpanel" aria-labelledby="custom-tabs-one-images-tab">
  <div class="form-group">
      <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    ID
                </th>
                <th style="width: 20%">
                    Изображение
                </th>
                <th style="width: 20%" >
                    Удаление
                </th>
            </tr>
        </thead>
        <tbody>
          <?php foreach($photos as $item): ?>
            <tr>
              
              <td>
                <?=$item['Photo']['id']?>
              </td>
              <td><img width="100px" src="/img/photos/thumbs/<?=$item['Photo']['img']; ?>"></td>
            
             <td><?php echo $this->Form->postLink('Удалить', array('controller'=>'photos','action' => 'admin_delete', $item['Photo']['id']), array('confirm' => 'Подтвердите удаление','value'=>'465','class' => 'btn btn-danger btn-sm')); ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
    </table>
    <?php 
      echo $this->Form->create('Photo', array('type' => 'file','url' =>'/admin/products/insert_photo'));
      echo $this->Form->input('img.', array('label' => 'Изображение:', 'type' => 'file', 'multiple'=>'multiple'));
      echo $this->Form->input('product_id', array('type' => 'hidden', 'value' => $id));
      echo $this->Form->end('Создать');
    ?>
  </div>
</div>