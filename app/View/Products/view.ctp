<section class="page">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><a href="/<?=$lang?>products">Наша продукция</a></li>
			<li><a><?=$data['Product']['title_'.$l]?></a></li>
		</ul>
		<div class="prod_inner">
			<div class="prod_inner_content">
				<div class="prod_inner_main">
					<div class="prod_inner_slider">
						<div>
							<div class="prod_inner_img">
								<img src="/img/products/<?=$data['Product']['img']?>" alt="">
							</div>
						</div>
					</div>
					<div class="prod_inner_text">
						<div class="small_title"><?=$data['Product']['title_'.$l]?></div>
						<div class="text_item">
							<?=$data['Product']['body_'.$l]?>
						</div>
						<?php if($data['Product']['novelty']): ?>
							<p class="prod_share prod_share_orange"><?=__('Новинка')?></p>
						<?php endif ?>
						<?php if($data['Product']['share']): ?>
							<p class="prod_share prod_share_orange"><?=__('Акция')?></p>
						<?php endif ?>
						<?php if($data['Product']['discount']): ?>
							<p class="prod_share prod_share_orange"><?=__('Скидка')?></p>
						<?php endif ?>

						<a class="more_btn orange_btn add_card" href="javascript:;" data-fancybox data-src="#zakas-pop" data-id="<?=$data['Product']['id']?>">Добавить в корзину</a>
					</div>
					<div class="prod_item__top">
						<a href="/services/subsiding" class="prod_item__sub">Субсидируется</a>							
						<?php if($data['Product']['in_stock']): ?>
							<p class="prod_stock"><?=__('В наличии')?></p>
						<?php endif ?>
					</div>	
				</div>
				<div class="prod_tab">
					<div class="prod_tab_item active">Преимущества</div>
					<div class="prod_tab_item">Применение</div>
					<div class="prod_tab_item">Состав</div>
					<div class="prod_tab_item">Производитель</div> 
				</div>
				<div class="prod_content_block">
					<div class="prod_content active">
						<?php foreach($advantages as $item): ?>
							<div class="prod_info_row"><?=$item['Advantage']['title_'.$l]?></div>
						<?php endforeach ?>
					</div>
					<div class="prod_content">
						<?php foreach($employments as $item): ?>
						<div class="prod_info_row">
							<div class="prod_info_name"><?=$item['Employment']['title_'.$l]?></div>
							<div class="prod_info_name"><?=$item['Employment']['body_'.$l]?></div>
						</div>
					<?php endforeach ?>
					</div>
					<div class="prod_content">
						<?php foreach($compositions as $item): ?>
						<div class="prod_info_row">
							<div class="prod_info_name"><?=$item['Composition']['title_'.$l]?></div>
							<div class="prod_info_name"><?=$item['Composition']['body_'.$l]?></div>
						</div>
						<?php endforeach ?>
					</div>
					<div class="prod_content">
						<div class="partner-area">
							<img src="/img/manufacturers/<?=$manufacturer['Manufacturer']['img']?>">
							<?=$manufacturer['Manufacturer']['description_'.$l]?>
						</div>	
					</div>	
				</div>
			</div>
			<div class="prod_inner_right">
				<span class="aside-title">Похожие товары</span>
				<?php foreach($other_products as $item): ?>
				<div class="prod_item prod_item--view">
					<?php if($item['Product']['novelty']): ?>
					<div class="prod_share prod_share_yellow">Новинка</div>
					<?php endif ?>
					<div class="prod_item__top">
						<a href="/services/subsiding" class="prod_item__sub">Субсидируется</a>	
						<?php if($item['Product']['in_stock']): ?>
						<div class="prod_stock">В наличии</div>
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
						<div class="prod_text text_item"><?=$item['Product']['description_'.$l]?></div>
						<div class="prod_buttons">
							<a class="more_btn orange_btn add_card_catalog" href="javascript:;" data-fancybox data-src="#zakas-pop" data-id="<?=$item['Product']['id']?>">В корзину</a>
							<a class="prod_compare" data-id="<?=$item['Product']['id']?>" href="javascript:;" data-crop="<?=$this->Common->get_params($item['Crop'])?>" data-period="<?=$this->Common->get_params($item['Period'])?>">Сравнить</a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
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

<div class="popup compare_popup" id="compare_max">
	<div class="small_title">Уважаемый Клиент!<br> Вы можете сравнивать только 2 товара между собой</div>
	<div class="popup_buttons">
		<a class="more_btn orange_btn" href="/<?=$lang?>products/compare">Перейти в Сравнение</a>
		<a class="more_btn white_btn compare_max_close" href="javascript:;">Закрыть</a>
	</div>
</div>