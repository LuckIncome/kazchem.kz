<section class="page">
<form id="korzForm5" method="POST" action="/baskets/send">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="/<?=$lang?>">Главная</a></li>
			<li><a>Корзина</a></li>
		</ul>		
		<div class="prod_inner basket_inner">
			<div class="prod_inner_content">
				<div class="catalog_title basket_title">
					<!-- <div class="title title_left">Корзина</div> -->
					<div class="catalog_link_list">
						<a class="catalog_link" href="/products">
							<div class="catalog_link_icon shop_icon">
							</div>
							<span>Добавить товар</span>
						</a>
						<a class="catalog_link" href="products/compare">
							<div class="catalog_link_icon compare_icon">
								<div class="compare_num">0</div>
							</div>
							<span>Сравнить</span>
						</a>
						<a class="catalog_link" href="javascript:(print());">
							<div class="catalog_link_icon print_icon"></div>
							<span>Печать</span>
						</a>
					</div>
				</div>
				<div class="basket basket--main"></div>
				<textarea class="korz-textarea" name="data[Basket][senddata]"></textarea>
				<textarea class="korz-json" name="data[Basket][json]"></textarea>
				<div class="basket-akcia">
					<div class="small_title"><?=__('Акции')?></div>
					<ul class="backi-list">
						<?php foreach($shares as $item): ?>
							<li> 
								<div class="akcia-basket">
									<a href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>" class="akcia-basket__img">
										<img src="/img/shares/<?=$item['Share']['img']?>">
									</a>
									<div class="akcia-basket__content">
										<a href="/<?=$lang?>shares/view/<?=$item['Share']['id']?>" class="akcia-basket__heading"><?=$item['Share']['title']?></a>
										<div class="akcia-basket__text">
											<?= $this->Text->truncate(strip_tags($item['Share']['body']), 100, array('ellipsis' => '...', 'exact' => true)) ?>
										</div>
									</div>	
								</div>	
							</li>
						<?php endforeach ?>
					</ul>
				</div>					
			</div>
			<div class="prod_inner_right">
				<div class="basket_form_block">
					<div class="basket_rtitle">Оформление заказа</div>
					<div class="basket_form" action="" method="">
						<div class="basket_form_head">
							<span>Итого:</span>
							<span>
								<span class="basket_form_count">3</span> 
								товара
							</span>
						</div>
						<input class="form_input" type="text" name="data[Basket][name]" required placeholder="Мое имя" value="<?=$user_data['fio']?>">
						<input class="form_input" type="tel" name="data[Basket][phone]" required placeholder="Номер телефона" value="<?=$user_data['phone']?>">
						<input class="form_input" type="email" name="data[Basket][email]" required placeholder="Адрес электронной почты" value="<?=$user_data['email']?>">
						<select class="form_select" id="basket_region_sel" name="data[Basket][area]">
							<option value="0" selected="" disabled="">Выберите регион из</option>
							<?php foreach($areas as $item): ?>
<option value="<?=$item['Area']['id']?>" <?=($user_data['area_id'] == $item['Area']['id']) ? 'selected' : ''?>><?=$item['Area']['title_'.$l]?></option>
<?php endforeach ?>
							<!-- <?=$item['Area']['title_'.$l]?> -->
						</select>
						<input class="form_input" type="text" name="data[Basket][address]" required placeholder="Адрес доставки">
						<input type="hidden" name="data[Basket][user_id]" value="<?=$user_id?>">
						<input type="hidden" id="product_count" name="data[Basket][product_count]" value="3">
						<input type="hidden" id="basket_region" name="data[Basket][reqion]" >
						<textarea class="form_input form_array"></textarea>
						<div class="basket_form_foot">	
							<button class="form_btn orange_btn" type="submit">Получить ценовое предложение</button>
						</div>
					</div>
				</div>
				<div class="basket-del">
					<div class="delivery">
						<a class="delivery_name" href="/pages/agrocalc">
							<div class="delivery_icon"></div>
							<div>Рассчет нормы внесения</div>
						</a>
						<!-- <a class="delivery_btn" href="javascript:;">Рассчитать норму внесения</a> -->
					</div>
					<div class="delivery delivery_buy">
						<a class="buy_name" href="/pages/how_to_buy">
							<div class="delivery_icon"></div>
							<div>Как купить?</div>
						</a>
					</div>
					<div class="delivery delivery_calc">
						<a class="delivery_name" href="/services/transportation">
							<div class="delivery_icon"></div>
							<div>Рассчет стоимости перевозки</div>
						</a>
					</div>
				</div>	
			</div>
		</div>
	</div>

	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
	</form>
</section>