<section class="page">
    <div class="container">
        <div class="cabinet_title title">Личный кабинет</div>
        <div class="cabinet">
            <?php echo $this->element('cabinet_sidebar') ?>
            <div class="cabinet_right">
                <div class="cab-part">
                    <div class="cab-top">
                        <span class="cab-top__heading">Архив</span>
                        <a class="more_btn orange_btn" data-fancybox data-src="#add-zakas" href="javascript:;">Добавить заказ</a>
                    </div>
					<div class="vagon-search">
						<form action="" class="vagon-search_input">
							<input type="text" name="number" id="" value="<?=$number ?>">
							<button class="vagon-search_btn">Поиск</button>
						</form>
					</div>
                    <ul class="gruz-ul">
                        <?php foreach($data as $item): ?>
                            <?php $vagon =  $this->Common->get_vagon($item['Vagon']['vagon']); ?>
                        <li>
                            <div class="gruz-item">
                                <div class="gruz-item__top">
                                    <div class="gruz-item__heading">Номер вагона: №<?=$item['Vagon']['vagon']?></div>
                                    <div class="gruz-item__heading">Состояние: <span>
<?php
    if($vagon['ARRIVED'] == 'n'){
        echo 'В пути';
    }elseif($vagon['ARRIVED'] == 'y'){
        echo 'Доставлен';
    }else{
        echo 'Обновляется';
    }
?>

    </span></div>
                                </div>
                                <div class="gruz-item__info">
                                    <div style="border-right:40px solid #fff;">
                                        <table class="gruz-table">
<tr>
    <th>Станция назначения</th>
    <th>Дата отправки</th>
    <th>Станция последней операции</th>
    <th>Дата последней операции</th>
    <th>Операция</th>
    <th>Расстояние до станции назначения,км</th>
    <th>Груз</th>
    <th>Суток на территории текущей страны</th>
    <th>Номер поезда</th>
    <th>Номер накладной</th>
    <th>Вес груза</th>
    <th>Состояние</th>
</tr>
<tr>
    <td><?=($vagon['TO_NAME']) ? $vagon['TO_NAME'] : 'Обновляется'?></td>
    <td><?=($vagon['SEND_DATE_TIME']) ? $vagon['SEND_DATE_TIME'] : 'Обновляется'?></td>
    <td><?=($vagon['CURRENT_POSITION']) ? $vagon['CURRENT_POSITION'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['CURRENT_POSITION_DATE']) && $vagon['CURRENT_POSITION_DATE']) ? $vagon['CURRENT_POSITION_DATE'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['OPERATION']) && $vagon['OPERATION']) ? $vagon['OPERATION'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['DISTANCE_END']) && $vagon['DISTANCE_END']) ? $vagon['DISTANCE_END'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['STATE']) && $vagon['STATE']) ? $vagon['STATE'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['DAYS_END']) && $vagon['DAYS_END']) ? $vagon['DAYS_END'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['TRAIN_NUMBER']) && $vagon['TRAIN_NUMBER']) ? $vagon['TRAIN_NUMBER'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['NOMER_NAKLADNOI']) && $vagon['NOMER_NAKLADNOI']) ? $vagon['NOMER_NAKLADNOI'] : 'Обновляется'?></td>
    <td><?=(isset($vagon['WEIGHT']) && $vagon['WEIGHT']) ? $vagon['WEIGHT'] : 'Обновляется'?></td>
    <td><?php
    if($vagon['ARRIVED'] == 'n'){
        echo 'В пути';
    }elseif($vagon['ARRIVED'] == 'y'){
        echo 'Доставлен';
    }else{
        echo 'Обновляется';
    }
    ?></td>
</tr>
                                        </table>
                                        <div class="gruz-update"><span>Время обновления на сервере:</span> <?=(isset($vagon['UPDATE_TIME']) && $vagon['UPDATE_TIME']) ? $vagon['UPDATE_TIME'] : 'Обновляется'?></div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php unset($vagon); ?>
                        <?php endforeach ?>
                    </ul>

                </div>
				<?php if($data): ?>
					<div class="pagimation">
						<?php if($paginator['start']): ?>
							<a href="<?=$paginator['link']?>1" class="p_start pag_btn "> << </a>
						<?php endif ?>

						<?php if($paginator['prev']): ?>
							<a href="<?=$paginator['link']?><?=$paginator['prev']?>" class="p_prev pag_btn"> < </a>
						<?php endif ?>
						<span class="p_pages"><?=__('Страница')?> <?=$paginator['current_page']?> <?=__('из')?> <?=$paginator['count_pages']?></span>
						<?php if($paginator['next']): ?>
							<a href="<?=$paginator['link']?><?=$paginator['next']?>" class="p_next pag_btn"> > </a>
						<?php endif ?>

						<?php if($paginator['end']): ?>
							<a href="<?=$paginator['link']?><?=$paginator['count_pages']?>" class="p_end pag_btn "> >> </a>
						<?php endif ?>
					</div>
				<?php endif ?>
            </div>
        </div>
    </div>
</section>

<div style="display: none;" id="add-zakas">
    <div class="add-zakas">
        <span class="add-zakas__heading">Добавление груза</span>
        <form action="/<?=$lang?>vagons/add" method="POST">
            <input placeholder="Введите номер вагона" type="text" name="data[Vagon][vagon]">
            <input class="form_input" type="hidden" name="data[Vagon][user_id]" value="<?=$user_data['id']?>">
            <button type="submit">Отправить</button>
        </form>
    </div>
</div>
