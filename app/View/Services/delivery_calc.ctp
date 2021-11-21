<section class="page">
	<div class="container">
		<div class="cabinet_title title" style="padding-bottom:0;text-align:center;border-bottom:none;margin-bottom:40px">Рассчет стоимости доставки</div>		
		<div class="table-area">
			<ul class="shaq-ul">
				<li class="active"><a href="#shaq1">Шаг 1</a></li>	
				<li><a href="#shaq2">Шаг 2</a></li>	
			</ul>				
			<div class="tabs">
				<div class="tabs__item active" id="shaq1">								
					<div class="delivery_content basket_inner_form" style="margin-top:0">															
						<div class="basket_form_body">							
							<div class="delivery_list" id="delivery_list_id">
								<div class="select-line" data-id="1">
									<div class="select-row">
										<span class="select-row__heading">Выберите продукцию</span>
										<select class="select-row_sel select-row_prod">
											<?php foreach($products as $item): ?>
												<option><?=$item['Product']['title_'.$l]?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="select-row">
										<span class="select-row__heading">Количество</span>
										<input class="select-row_input select-row_amount" type="number" name="" value="1">
									</div>
									<div class="select-row">
										<span class="select-row__heading">Вес</span>
										<select class="select-row_sel select-row_size">
											<option selected value="tonn">Тонн</option>
											<option value="kilo">Кг</option>
										</select>
									</div>
									<div class="select-row">
										<span class="select-row__heading">Тип</span>
										<select class="select-row_sel select-row_type">										
											<option selected value="mesh">Мешки</option>
											<!-- <option value="box">Коробка</option> -->
										</select>
									</div>
									<div class="del_select_line" onclick="del_line();"></div>
								</div>	
							</div>
							<a class="delivery_add more_btn orange_btn" style="border:2px solid #FF7A00;margin-right:15px" href="javascript:;">Добавить продуцию</a>
						</div>
						<div class="delivery-top">
							
							<div class="delivery-top__item">
								Выбрано: <span id="del-kolvo">10</span> товаров
							</div>
							<div class="delivery-top__item">
								Общий вес: <span id="del-ves">1</span> тонна <span class="del-kilo hide"><span id="del-ves-kilo"></span> килограмм</span>
							</div>
							<div class="delivery-top__item">
								Фассовка: Биг бэгги
							</div>
						</div>
					</div>
				</div>	
				<div class="tabs__item" id="shaq2">
					<div class="basket_inner_form basket_form_body" style="margin-top:0">
						<div class="delivery-row">
							<div class="input_block">
								<div class="input_name">Место отгрузки</div>
								<select class="form_select" id="basket_address">
									<option value="0" selected="" disabled="">Выберите станцию</option>
									<option value="stanciya_1">Костанай</option>
									<option value="stanciya_2">Петропавлск</option>
									<option value="stanciya_3">Кокшетау</option>
									<option value="stanciya_3">Павлодар</option>
									<option value="stanciya_3">Усть-Каменогорск</option>
									<option value="stanciya_3">Алматы</option>
									<option value="stanciya_3">Шымкент</option>
								</select>
							</div>
							<div class="input_block">
								<div class="input_name">Область доставки</div>								
								<select class="form_select">
									<option value="0" selected disabled>Выберите регион из</option>
									<option value="">Акмолинская область</option>
									<option value="">Актюбинская область</option>
									<option value="">Алматинская область</option>
									<option value="">Атырауская область</option>
									<option value="">Восточно-Казахстанская область</option>
									<option value="">Жамбылская область</option>
									<option value="">Западно-Казахстанская область</option>
									<option value="">Карагандинская область</option>
									<option value="">Костанайская область</option>
									<option value="">Кызылординская область</option>
									<option value="">Мангистауская область</option>
									<option value="">Павлодарская область</option>
									<option value="">Северо-Казахстанская область</option>
									<option value="">Южно-Казахстанская область</option>
								</select>
							</div>
							<div class="input_block">
								<div class="input_name">Расстояние</div>
								<select class="form_select" id="way_distance">
									<option value="0" selected="" disabled="">Выберите из списка</option>
									<option value="100">0 - 100 км</option>
									<option value="200">100 км - 200 км</option>
									<option value="300">200 км - 300 км</option>
									<option value="more">300 км и более</option>
								</select>
							</div>
						</div>	
						<a class="form_btn yellow_btn delivery_calc_btn" href="javascript:;">Рассчитать</a>
						<div class="delivery_total">Стоимость доставки: <span>1 500 000</span> тенге</div>
					</div>	
				</div>
			</div>	
		</div>
		<div id="delivery_template" style="display: none;">
			<div class="select-line" data-id="2">
				<div class="select-row">
					<span class="select-row__heading">Выберите продукцию</span>
					<select class="select-row_sel select-row_prod">
						<?php foreach($products as $item): ?>
							<option><?=$item['Product']['title_'.$l]?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="select-row">
					<span class="select-row__heading">Количество</span>
					<input class="select-row_input select-row_amount" type="number" name="" value="1">
				</div>
				<div class="select-row">
					<span class="select-row__heading">Вес</span>
					<select class="select-row_sel select-row_size">
						<option selected value="tonn">Тонн</option>
						<option value="kilo">Кг</option>
					</select>
				</div>
				<div class="select-row">
					<span class="select-row__heading">Тип</span>
					<select class="select-row_sel select-row_type">						
						<option selected value="mesh">Мешки</option>
						<!-- <option value="box">Коробка</option> -->
					</select>
				</div>
				<div class="del_select_line" onclick="del_line();"></div>
			</div>
		</div>		
	</div>
</section>
<div style="display: none;" id="zayavka">
	<div class="popup-form">
		<span class="popup-form__heading">
			Оставить заявку
		</span>		
		<form>
			<div class="popup-row">
				<label>ФИО:</label>
	            <input placeholder="Введите ФИО" type="text" name="" required="">
	        </div>
	        <div class="popup-row">
	        	<label>Номер телефона:</label>
	            <input placeholder="+7(___)__ __ __" type="text" name="" required="">
	        </div>
	        <div class="popup-row">
	        	<label>Почта:</label>
	            <input placeholder="Почта" type="text" name="" required="">
	        </div>
	        <button class="popup-sbt">Отправить</button>
	    </form>    
	</div>	
</div>
<style>
	.form-sec{
		display:flex;
		align-items:center;
	}
	.form-sec .orange_btn{
		margin-right:20px;
	}
	.select-row__heading{
		display:block;
		margin-bottom:5px;
	}
	.select-line{
		margin-bottom:25px;
		display:flex;
		justify-content: space-between;
	}
	.select-line .select-row:first-child{
		width: 32%;
	} 
	.del_select_line{
		width: 20px;
		height: 20px;
		margin-top: 40px;
		flex-shrink: 0;
		margin-left: 10px;
		cursor: pointer;
		background: url('../img/close_black.svg') center / contain no-repeat;
	}
	.select-row{
		width: 17%;
	}
	.select-row__heading{
		display:block;
		font-weight: 600;
		margin-bottom:10px;
	}
	.select-row_input,
	.select-row_sel{
		display: block;
		width: 100%;
		padding: 12px 20px;
		border-radius: 7px;
		border: 1px solid #ccc;
		outline: none;
		-webkit-appearance: none;
	}
	.select-row_sel{
		cursor: pointer;
		background: url('../img/select_arrow.svg') center right 15px / 11px no-repeat;
	}
	.select-row_input[type='number'] {
	  -moz-appearance: textfield;
	}
	.select-row_input::-webkit-outer-spin-button,
	.select-row_input::-webkit-inner-spin-button {
	  -webkit-appearance: none;
	  margin: 0;
	}
	.del-kilo.hide{
		display: none;
	}
</style>