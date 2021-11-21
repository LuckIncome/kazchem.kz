<section class="page">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="/<?=$lang?>">Главная</a></li>
			<li><a>Наша продукция</a></li>
		</ul>
		<div class="catalog_top">
			<a class="download_catalog" href="/img/KazChem_catalog.pdf" download><?=__('Скачать каталог')?></a>
			<div class="catalog_link_list">
				<a class="catalog_link" href="/<?=$lang?>products/compare">
					<div class="catalog_link_icon compare_icon">
						<div class="compare_num">0</div>
					</div>
					<span><?=__('Сравнить')?></span>
				</a>
			</div>
		</div>
		<div class="catalog">
			<div class="catalog_content">
				<div class="filter_block">
					<div class="catalog_filter_name">Фильтр</div>
					<form method="GET" id="filtr" class="catalog_filter" action="/products/index2">
						<div class="filter_list_block">
							<!-- <ul class="filter_list">															
								<label for="novelty" class="filter_check  <?=(isset($_GET['novelty']) && $_GET['novelty'] == 1) ? "active" : ""?>">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="novelty" value="1" id="novelty" <?=(isset($_GET['novelty']) && $_GET['novelty'] == 1) ? "checked" : ""?>>
									<span class="filter_check_name">Новинки</span>
								</label>
								<label for="share" class="filter_check <?=(isset($_GET['share']) && $_GET['share'] == 1) ? "active" : ""?>">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="share" value="1" id="share" <?=(isset($_GET['share']) && $_GET['share'] == 1) ? "checked" : ""?>>
									<span class="filter_check_name">Акции</span>
								</label>
							</ul> -->
							<div class="filter_name">Сортировать:</div>
							<select class="filter_sel" id="novelty_sel" name="sort">
								<option value="novelty" <?=(isset($_GET['sort']) && $_GET['sort'] == 'novelty') ? "selected" : ""?> >Новинки</option>
								<option value="share" <?=(isset($_GET['sort']) && $_GET['sort'] == 'share') ? "selected" : ""?> >Акции</option>
							</select>
						</div>

						<div class="filter_list_block">
							<div class="filter_name">Вид:</div>
							<!-- <ul class="filter_list">
								<?php foreach($types as $key => $item): ?>
									<label  for="<?=$item['Type']['id']?>" class="filter_check <?=(isset($_GET['type']) && in_array($item['Type']['id'], $_GET['type'])) ? 'active' : ''?>">
										<span class="filter_check_img"></span>
										<input type="checkbox" name="type[]" value="<?=$item['Type']['id']?>" id="<?=$item['Type']['id']?>" <?=(isset($_GET['type']) && in_array($item['Type']['id'], $_GET['type'])) ? 'checked' : ''?>>
										<span class="filter_check_name"><?=$item['Type']['title_'.$l]?></span>
									</label>
								<?php endforeach ?>
							</ul> -->

							<select class="filter_sel" name="type[]">
								<?php foreach($types as $key => $item): ?>
									<option value="<?=$item['Type']['id']?>" name="type[]" <?=(isset($_GET['type']) && in_array($item['Type']['id'], $_GET['type'])) ? 'selected' : ''?>>
										<?=$item['Type']['title_'.$l]?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="filter_list_block">
							<div class="filter_name">Форма:</div>
							<!-- <ul class="filter_list">
							<?php foreach($shapes as $key => $item): ?>
								<LABEL  for="shape_<?=$key?>" class="filter_check <?=(isset($_GET['shape']) && in_array($item['Shape']['id'], $_GET['shape'])) ? 'active' : ''?> ">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="shape[]" value="<?=$item['Shape']['id']?>" id="shape_<?=$key?>" <?=(isset($_GET['shape']) && in_array($item['Shape']['id'], $_GET['shape'])) ? 'checked' : ''?> >
									<span class="filter_check_name"><?=$item['Shape']['title_'.$l]?></span>
								</LABEL>
							<?php endforeach ?>
							</ul> -->
							<select class="filter_sel">
								<?php foreach($shapes as $key => $item): ?>
									<option  value="<?=$item['Shape']['id']?>" name="shape[]" <?=(isset($_GET['shape']) && in_array($item['Shape']['id'], $_GET['shape'])) ? 'selected' : ''?>>
										<?=$item['Shape']['title_'.$l]?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="filter_list_block">
							<div class="filter_name">Период внесения:</div>
							<!-- <ul class="filter_list">
								<?php foreach($periods as $key => $item): ?>
								<LABEL  for="period_<?=$key?>" class="filter_check <?=(isset($_GET['period']) && in_array($item['Period']['id'], $_GET['period'])) ? 'active' : ''?> ">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="period[]" value="<?=$item['Period']['id']?>" id="period_<?=$key?>" <?=(isset($_GET['period']) && in_array($item['Period']['id'], $_GET['period'])) ? 'checked' : ''?> >
									<span class="filter_check_name"><?=$item['Period']['title_'.$l]?></span>
								</LABEL>
							<?php endforeach ?>
							</ul> -->
							<select class="filter_sel">
								<?php foreach($periods as $key => $item): ?>
									<option  value="<?=$item['Period']['id']?>" name="period[]" <?=(isset($_GET['period']) && in_array($item['Period']['id'], $_GET['period'])) ? 'selected' : ''?>>
										<?=$item['Period']['title_'.$l]?>
									</option>
								<?php endforeach ?>
							</select>
						</div>
						<!-- 	<div class="filter_list_block">
							<div class="filter_name">Культуры:</div>
							<ul class="filter_list">
								<?php foreach($crops as $key => $item): ?>
								<LABEL  for="crop_<?=$key?>" class="filter_check <?=(isset($_GET['crop']) && in_array($item['Crop']['id'], $_GET['crop'])) ? 'active' : ''?> ">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="crop[]" value="<?=$item['Crop']['id']?>" id="crop_<?=$key?>" <?=(isset($_GET['crop']) && in_array($item['Crop']['id'], $_GET['crop'])) ? 'checked' : ''?> >
									<span class="filter_check_name"><?=$item['Crop']['title_'.$l]?></span>
								</LABEL>
							<?php endforeach ?>
							</ul>
						</div> -->
						<!-- <div class="filter_list_block">
							<div class="filter_name">Призводители:</div>
							<ul class="filter_list">
							<?php foreach($manufacturers as $key => $item): ?>
								<LABEL  for="mf_<?=$key?>" class="filter_check <?=(isset($_GET['manufacturer']) && in_array($item['Manufacturer']['id'], $_GET['manufacturer'])) ? 'active' : ''?> ">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="manufacturer[]" value="<?=$item['Manufacturer']['id']?>" id="mf_<?=$key?>" <?=(isset($_GET['manufacturer']) && in_array($item['Manufacturer']['id'], $_GET['manufacturer'])) ? 'checked' : ''?> >
									<span class="filter_check_name"><?=$item['Manufacturer']['title_'.$l]?></span>
								</LABEL>
							<?php endforeach ?>
							</ul>
						</div> -->
						<button class="btn btn--filtr" type="submit" >Отправить</button>
					</form>
				</div>

				<div class="prod_grid">
					<?php foreach($products as $item): ?>
						<div class="prod_item">

							<?php if($item['Product']['share']): ?>
								<div class="prod_share prod_share_yellow"><?=__('Акция')?></div>
							<?php elseif ($item['Product']['discount']): ?>
								<div class="prod_share prod_share_orange"><?=__('Скидка')?></div>
							<?php elseif ($item['Product']['novelty']): ?>
								<div class="prod_share prod_share_orange"><?=__('Новинка')?></div>
							<?php endif ?> 							
							<div class="prod_item__top">
								<?php if($item['Product']['subsid']): ?>
									<a href="/services/subsiding" class="prod_item__sub">Субсидируется</a>
								<?php endif ?>	
								<?php if($item['Product']['in_stock']): ?>
									<div class="prod_stock"><?=__('В наличии')?></div>
								<?php endif ?>
							</div>	
							<div class="prod_img">
								<img src="/img/products/thumbs/<?=$item['Product']['img']?>">
							</div>
							<div class="prod_info">
								<div class="compare_info">
								<div class="prod_info_row">Для всех</div>
								<div class="prod_info_row">Весна, Осень</div>
								<div class="prod_info_row">Вразброс; При посеве (клубней);</div>
								<div class="prod_info_row">Для всех типов почв</div>
								</div>
								<div class="compare_json">
									<textarea><?=json_encode($item, JSON_UNESCAPED_UNICODE)?></textarea>
								</div>
								<a class="prod_name" href="/<?=$lang?>product/<?=$item['Product']['alias']?>"><?=$item['Product']['title_'.$l]?></a>
								<div class="prod_text text_item">
									<?=$item['Product']['description_'.$l]?>
								</div>
								<div class="prod_buttons">
									<a class="more_btn orange_btn add_card_catalog" data-fancybox data-src="#zakas-pop" href="javascript:;" data-id="<?=$item['Product']['id']?>">В корзину</a>
									<a class="prod_compare" data-id="<?=$item['Product']['id']?>" href="javascript:;" data-crop="<?=$this->Common->get_params($item['Crop'])?>" data-period="<?=$this->Common->get_params($item['Period'])?>">Сравнить</a>
								</div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
				<div class="pagi pagimation">
			    	<div class="pages" style="display:none;">
			    		<div class="page-count"> <strong><?=__('Страница')?>:</strong></div>
						<?php 
						echo $this->Paginator->counter(array(
						    'separator' => ' из ',
						    ));
						 ?>
					</div>		
					<div class="pag-bot">
						<div class="pag-bot__arrow"><?php echo $this->Paginator->first('<<'); ?></div>
						<ul class="pagination">
						<?php echo $this->Paginator->numbers(
						    array(
						        'separator' => '',
						        'tag' => 'li',
						        'modulus' => 4
						        )
						); ?>
				    	</ul>
						<div class="pag-bot__arrow"><?php echo $this->Paginator->last('>>'); ?></div>
					</div>	
				</div>
			</div>

			<div class="catalog_sidebar">
				<div class="akcia-slider">
					<?php foreach($share as $item): ?>
					<div>
						<a href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>" class="akcia" >
							<img src="/img/shares/<?=$item['Share']['img2']?>">
							<!-- <div class="main_prod_circle"></div>
							<div class="main_prod_text">
								<div class="main_prod_type"><?=__('Акция')?></div>
								<div class="small_title"><?=$share['Share']['title']?></div>
								<div class="text_item">
									<p><?=$share['Share']['description']?></p>
								</div>
								<a class="more_btn orange_btn" ><?=__('Подробнее')?></a>
							</div> -->
						</a>
					</div>
					<?php endforeach ?>
				</div>

				
				<!-- <form method="GET" id="filtr" class="catalog_filter" >
					<div class="filter_list_block">
						<div class="filtr-left">
							<ul class="filter_list">															
								<label for="novelty" class="filter_check  <?=(isset($_GET['novelty']) && $_GET['novelty'] == 1) ? "active" : ""?>">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="novelty" value="1" id="novelty" <?=(isset($_GET['novelty']) && $_GET['novelty'] == 1) ? "checked" : ""?>>
									<span class="filter_check_name">Новинки</span>
								</label>
								<label for="share" class="filter_check <?=(isset($_GET['share']) && $_GET['share'] == 1) ? "active" : ""?>">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="share" value="1" id="share" <?=(isset($_GET['share']) && $_GET['share'] == 1) ? "checked" : ""?>>
									<span class="filter_check_name">Акции</span>
								</label>
							</ul>
						</div>
						<div class="filter_name">Вид:</div>
						<ul class="filter_list">
							<?php foreach($types as $key => $item): ?>
								<label  for="<?=$item['Type']['id']?>" class="filter_check <?=(isset($_GET['type']) && in_array($item['Type']['id'], $_GET['type'])) ? 'active' : ''?>">
									<span class="filter_check_img"></span>
									<input type="checkbox" name="type[]" value="<?=$item['Type']['id']?>" id="<?=$item['Type']['id']?>" <?=(isset($_GET['type']) && in_array($item['Type']['id'], $_GET['type'])) ? 'checked' : ''?>>
									<span class="filter_check_name"><?=$item['Type']['title_'.$l]?></span>
								</label>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="filter_list_block">
						<div class="filter_name">Форма:</div>
						<ul class="filter_list">
						<?php foreach($shapes as $key => $item): ?>
							<LABEL  for="shape_<?=$key?>" class="filter_check <?=(isset($_GET['shape']) && in_array($item['Shape']['id'], $_GET['shape'])) ? 'active' : ''?> ">
								<span class="filter_check_img"></span>
								<input type="checkbox" name="shape[]" value="<?=$item['Shape']['id']?>" id="shape_<?=$key?>" <?=(isset($_GET['shape']) && in_array($item['Shape']['id'], $_GET['shape'])) ? 'checked' : ''?> >
								<span class="filter_check_name"><?=$item['Shape']['title_'.$l]?></span>
							</LABEL>
						<?php endforeach ?>
						</ul>
					</div>
					<div class="filter_list_block">
						<div class="filter_name">Период внесения:</div>
						<ul class="filter_list">
							<?php foreach($periods as $key => $item): ?>
							<LABEL  for="period_<?=$key?>" class="filter_check <?=(isset($_GET['period']) && in_array($item['Period']['id'], $_GET['period'])) ? 'active' : ''?> ">
								<span class="filter_check_img"></span>
								<input type="checkbox" name="period[]" value="<?=$item['Period']['id']?>" id="period_<?=$key?>" <?=(isset($_GET['period']) && in_array($item['Period']['id'], $_GET['period'])) ? 'checked' : ''?> >
								<span class="filter_check_name"><?=$item['Period']['title_'.$l]?></span>
							</LABEL>
						<?php endforeach ?>
						</ul>
					</div> -->
				<!-- 	<div class="filter_list_block">
						<div class="filter_name">Культуры:</div>
						<ul class="filter_list">
							<?php foreach($crops as $key => $item): ?>
							<LABEL  for="crop_<?=$key?>" class="filter_check <?=(isset($_GET['crop']) && in_array($item['Crop']['id'], $_GET['crop'])) ? 'active' : ''?> ">
								<span class="filter_check_img"></span>
								<input type="checkbox" name="crop[]" value="<?=$item['Crop']['id']?>" id="crop_<?=$key?>" <?=(isset($_GET['crop']) && in_array($item['Crop']['id'], $_GET['crop'])) ? 'checked' : ''?> >
								<span class="filter_check_name"><?=$item['Crop']['title_'.$l]?></span>
							</LABEL>
						<?php endforeach ?>
						</ul>
					</div> -->
					<!-- <div class="filter_list_block">
						<div class="filter_name">Призводители:</div>
						<ul class="filter_list">
						<?php foreach($manufacturers as $key => $item): ?>
							<LABEL  for="mf_<?=$key?>" class="filter_check <?=(isset($_GET['manufacturer']) && in_array($item['Manufacturer']['id'], $_GET['manufacturer'])) ? 'active' : ''?> ">
								<span class="filter_check_img"></span>
								<input type="checkbox" name="manufacturer[]" value="<?=$item['Manufacturer']['id']?>" id="mf_<?=$key?>" <?=(isset($_GET['manufacturer']) && in_array($item['Manufacturer']['id'], $_GET['manufacturer'])) ? 'checked' : ''?> >
								<span class="filter_check_name"><?=$item['Manufacturer']['title_'.$l]?></span>
							</LABEL>
						<?php endforeach ?>
						</ul>
					</div> -->
					<!-- <button class="btn btn--filtr" type="submit" style="display: none;">Отправить</button>
				</form>	 -->			
				<a href="/pages/agrocalc" class="delivery">
					<div class="delivery_name" >
						<div class="delivery_icon"></div>
						<div>Рассчет нормы внесения</div>
					</div>
				</a>
				<a href="/pages/how_to_buy" class="delivery delivery_buy">
					<div class="buy_name">
						<div class="delivery_icon"></div>
						<div>Как купить?</div>
					</div>
				</a>
				<a href="/services/transportation" class="delivery delivery_calc">
					<div class="delivery_name">
						<div class="delivery_icon"></div>
						<div>Рассчет стоимости перевозки</div>
					</div>
				</a>
				<div class="quiz">
					<form method="POST" action="/questionnaires/send" class="quiz_form">
						<span class="quiz__heading">Опросник</span>	
						<div class="input_block">
							<div class="input_name">Использовали ли вы ранее КАС?</div>
							<select class="form_select" name="data[Questionnaire][q1]">
								<option value="0" selected="" disabled="">Выберите из списка</option>
								<option value="Да">Да</option>
								<option value="Нет">Нет</option>
								<option value="Другое">Другое</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Имеется ли у вас техника для внесения КАС?</div>
							<select class="form_select" name="data[Questionnaire][q2]">
								<option value="0" selected="" disabled="">Выберите из списка</option>
								<option value="Да">Да</option>
								<option value="Нет">Нет</option>
								<option value="Другое">Другое</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Общая удобряемая площадь, га?</div>
							<input class="form_input" placeholder="Введите площадь" name="data[Questionnaire][q3]" type="text">
						</div>
						<div class="input_block">
							<div class="input_name">Что для вас важнее при выборе КАС?</div>
							<select class="form_select" name="data[Questionnaire][q4]">
								<option value="0" selected="" disabled="">Выберите из списка</option>
								<option value="Цена">Цена</option>
								<option value="Доставка">Доставка</option>
								<option value="Упаковка">Упаковка</option>
								<option value="Качество">Качество</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Чье производство КАС?</div>
							<select class="form_select" name="data[Questionnaire][q5]">
								<option value="0" selected="" disabled="">Выберите из списка</option>
								<option value="Россия">Россия</option>
								<option value="Казахстан">Казахстан</option>
								<option value="Другое">Другое</option>								
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Желаете ли вы попробовать КАС с Серой?</div>
							<select class="form_select" name="data[Questionnaire][q6]">
								<option value="0" selected="" disabled="">Выберите из списка</option>
								<option value="Да">Да</option>
								<option value="Нет">Нет</option>
								<option value="Другое">Другое</option>								
							</select>
						</div>
						<button class="orange_btn quiz_btn" type="submit">Отправить</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
	<div class="leaf leaf_4"></div>
</section>

<div style="display: none;" id="zakas-pop">
	<div class="zakas-pop">
		<span class="zakas-pop__heading">
			Вы добавили новый товар в корзину.
		</span>
		<div class="zakas-pop__bot">
			<a class="zakas-pop__korzina" href="/baskets">В корзину</a>
			<a class="zakas-pop__prod" href="javascript:;">Продолжить покупки</a>
		</div>
		<div class="basket">
			<div class="basket_row" style="padding: 18px 30px 23px 10px;">
				<a class="basket_img" href="https://kazchem7.106.kz/product/ammofos-np-10-33"><img src="/img/products/b0931afe1efc941f7d959eae16d7d0da.png" alt=""></a>
				<div style="width:60%;" class="basket_text">
					<a class="basket_name" href="https://kazchem7.106.kz/product/ammofos-np-10-33">Аммофос NP 10:33</a>
					<div class="text_item text_item--korz">
						<p>Гранулированное удобрение для обеспечения сельскохозяйственных растений легко доступным фосфором и в небольшом количестве азотом.<p>
					</div>
				</div>
			</div>
			<div class="basket_row" style="padding: 18px 30px 23px 10px;">
				<a class="basket_img" href="https://kazchem7.106.kz/product/ammofos-np-10-33"><img src="/img/products/b0931afe1efc941f7d959eae16d7d0da.png" alt=""></a>
				<div style="width:60%;" class="basket_text">
					<a class="basket_name" href="https://kazchem7.106.kz/product/ammofos-np-10-33">Аммофос NP 10:33</a>
					<div class="text_item text_item--korz">
						<p>Гранулированное удобрение для обеспечения сельскохозяйственных растений легко доступным фосфором и в небольшом количестве азотом.<p>
					</div>
				</div>
			</div>
		</div>		
	</div>	
</div>

<div style="display: none;" id="compare-pop">
	<div class="zakas-pop">
		<span class="zakas-pop__heading">
			Вы добавили новый товар в сравнение.
		</span>
		<div class="zakas-pop__bot">
			<a class="zakas-pop__korzina" href="/<?=$lang?>products/compare">В сравнение</a>
			<a class="zakas-pop__prod close-compare-pop" href="javascript:;">Продолжить выбор</a>
		</div>
		<div class="compare_pop_content">
			<!-- <div class="basket_row" style="padding: 18px 30px 23px 10px;">
				<a class="basket_img" href="https://kazchem7.106.kz/product/ammofos-np-10-33"><img src="/img/products/b0931afe1efc941f7d959eae16d7d0da.png" alt=""></a>
				<div style="width:60%;" class="basket_text">
					<a class="basket_name" href="https://kazchem7.106.kz/product/ammofos-np-10-33">Аммофос NP 10:33</a>
					<div class="text_item text_item--korz">
						<p>Гранулированное удобрение для обеспечения сельскохозяйственных растений легко доступным фосфором и в небольшом количестве азотом.<p>
					</div>
				</div>
			</div>
			<div class="basket_row" style="padding: 18px 30px 23px 10px;">
				<a class="basket_img" href="https://kazchem7.106.kz/product/ammofos-np-10-33"><img src="/img/products/b0931afe1efc941f7d959eae16d7d0da.png" alt=""></a>
				<div style="width:60%;" class="basket_text">
					<a class="basket_name" href="https://kazchem7.106.kz/product/ammofos-np-10-33">Аммофос NP 10:33</a>
					<div class="text_item text_item--korz">
						<p>Гранулированное удобрение для обеспечения сельскохозяйственных растений легко доступным фосфором и в небольшом количестве азотом.<p>
					</div>
				</div>
			</div> -->
		</div>		
	</div>	
</div>

<div class="popup compare_popup" id="compare_max">
	<div class="small_title">Уважаемый Клиент!<br> Вы можете сравнивать только 2 товара между собой</div>
	<div class="popup_buttons">
		<a class="more_btn orange_btn" href="/<?=$lang?>products/compare">Перейти в Сравнение</a>
		<a class="more_btn white_btn compare_max_close" href="javascript:;">Закрыть</a>
	</div>
</div>