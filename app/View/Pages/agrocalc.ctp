<section class="page">
	<div class="container">
		<div class="title">Агрокалькулятор</div>
		<div class="title_text text_item">
			<p>Агрокалькулятор – уникальный инструмент, основная цель которого – дать возможность агроному, фермеру (или менеджеру сельскохозяйственного растениеводческого проекта) рассчитать предварительные значения ряда показателей экономической эффективности вложений.</p>
		</div>

		<div class="agro_calc">
			<div class="agro_calc_title">
				<span>Параметры поля</span>
			</div>
			<div class="agro_calc_list">
				<div class="input_block">
					<div class="input_name">Регион</div>
					<select class="form_select" id="reg_sel" name="area">
						<option value="0" selected disabled>Выберите регион из списка</option>
						<option value="Акмолинская">Акмолинская область</option>
						<option value="Актюбинская">Актюбинская область</option>
						<option value="Алматинская">Алматинская область</option>
						<option value="Атырауская">Атырауская область</option>
						<option value="Восточно-Казахстанская">Восточно-Казахстанская область</option>
						<option value="Жамбылская">Жамбылская область</option>
						<option value="Западно-Казахстанская">Западно-Казахстанская область</option>
						<option value="Карагандинская">Карагандинская область</option>
						<option value="Костанайская">Костанайская область</option>
						<option value="Кызылординская">Кызылординская область</option>
						<option value="Мангистауская">Мангистауская область</option>
						<option value="Павлодарская">Павлодарская область</option>
						<option value="Северо-Казахстанская">Северо-Казахстанская область</option>
						<option value="Туркестанская">Туркестанская область</option>
					</select>
				</div>
				<div class="input_block">
					<div class="input_name">Площадь посева, <span>га</span></div>
					<input class="form_input" type="number" name="ploshad_poseva" placeholder="Введите значение" required>
				</div>
			</div>
			<div class="agro_calc_title">
				<span>Культура</span>
			</div>
			<div class="agro_calc_list">
				<div class="input_block">
					<div class="input_name">Засеваемая</div>
					<select class="form_select" id="kultura" name="kultura_zasevaemaia">
						<option value="0" selected disabled>Выберите культуру из списка</option>
						<option value="1" data-azot="30" data-phosphor="13" data-kalii="25" data-sera="3">Озимая пшеница</option>
						<option value="2" data-azot="35" data-phosphor="12" data-kalii="25" data-sera="3">Яровая пшеница</option>
						<option value="3" data-azot="25" data-phosphor="12" data-kalii="26" data-sera="1.4">Озимая рожь</option>
						<option value="4" data-azot="25" data-phosphor="11" data-kalii="22" data-sera="1.2">Яровой ячмень</option>
						<option value="5" data-azot="33" data-phosphor="14" data-kalii="29" data-sera="1.2">Овес</option>
						<option value="6" data-azot="21" data-phosphor="8" data-kalii="26" data-sera="1.2">Рис</option>
						<option value="7" data-azot="34" data-phosphor="12" data-kalii="37" data-sera="1.1">Кукуруза</option>
						<option value="8" data-azot="33" data-phosphor="10" data-kalii="34" data-sera="1.1">Просо</option>
						<option value="9" data-azot="30" data-phosphor="15" data-kalii="40" data-sera="4">Гречиха</option>
						<option value="10" data-azot="66" data-phosphor="16" data-kalii="20" data-sera="2.1">Горох</option>
						<option value="11" data-azot="65" data-phosphor="14" data-kalii="16" data-sera="1.8">Вика</option>
						<option value="12" data-azot="68" data-phosphor="19" data-kalii="47" data-sera="1.5">Люпин</option>
						<option value="13" data-azot="71" data-phosphor="16" data-kalii="18" data-sera="3.5">Соя</option>
						<option value="14" data-azot="60" data-phosphor="26" data-kalii="186" data-sera="1.7">Подсолнечник</option>
						<option value="15" data-azot="49" data-phosphor="23" data-kalii="30" data-sera="3">Озимый рапс</option>
						<option value="16" data-azot="57" data-phosphor="20" data-kalii="23" data-sera="0.5">Горчица белая</option>
						<option value="17" data-azot="72" data-phosphor="17" data-kalii="57" data-sera="1">Клещевина</option>
						<option value="18" data-azot="106" data-phosphor="53" data-kalii="93" data-sera="5">Лен-долгунец</option>
						<option value="19" data-azot="45" data-phosphor="15" data-kalii="50" data-sera="5">Хлопчатник</option>
						<option value="20" data-azot="80" data-phosphor="40" data-kalii="70" data-sera="5">Лен-долгунец (волокно)</option>
						<option value="21" data-azot="200" data-phosphor="62" data-kalii="100" data-sera="17">Конопля</option>
						<option value="22" data-azot="5.9" data-phosphor="1.8" data-kalii="7.5" data-sera="1.5">Свекла сахарная (корнеплоды)</option>
						<option value="23" data-azot="6.2" data-phosphor="2.2" data-kalii="9.5" data-sera="2.2">Картофель</option>
						<option value="24" data-azot="4.9" data-phosphor="1.5" data-kalii="6.7" data-sera="1">Свекла кормовая</option>
						<option value="25" data-azot="4.8" data-phosphor="1.7" data-kalii="5.7" data-sera="0.5">Турнепс</option>
						<option value="26" data-azot="5.2" data-phosphor="1.9" data-kalii="6" data-sera="0.5">Морковь кормовая</option>
						<option value="27" data-azot="5.5" data-phosphor="3.1" data-kalii="7.7" data-sera="0.3">Брюква</option>
						<option value="28" data-azot="3.2" data-phosphor="1.6" data-kalii="5" data-sera="0.2">Морковь столовая</option>
						<option value="29" data-azot="3.3" data-phosphor="1.3" data-kalii="4.4" data-sera="0.5">Капуста белокочанная</option>
						<option value="30" data-azot="2.6" data-phosphor="0.4" data-kalii="3.6" data-sera="1">Помидоры (плоды)</option>
						<option value="31" data-azot="1.7" data-phosphor="1.4" data-kalii="2.6" data-sera="0.2">Огурцы</option>
						<option value="32" data-azot="3" data-phosphor="1.2" data-kalii="4" data-sera="0.2">Лук</option>
						<option value="33" data-azot="5" data-phosphor="3" data-kalii="3" data-sera="1.2">Плодовые и ягодные культуры (плоды, ягоды)</option>
						<option value="34" data-azot="1.7" data-phosphor="1.4" data-kalii="5" data-sera="0.2">Виноград (ягоды)</option>
						<option value="35" data-azot="50" data-phosphor="7" data-kalii="23" data-sera="0.5">Чай (лист сухое вещество)</option>
						<option value="36" data-azot="2.5" data-phosphor="1.5" data-kalii="5" data-sera="1">Кукуруза на силос (надземная масса)</option>
						<option value="37" data-azot="19.7" data-phosphor="5.6" data-kalii="15" data-sera="0.2">Клевер (сено)</option>
						<option value="38" data-azot="26" data-phosphor="6.5" data-kalii="15" data-sera="2.6">Люцерна</option>
						<option value="39" data-azot="15.5" data-phosphor="7" data-kalii="24" data-sera="0.5">Тимофеевка</option>
						<option value="40" data-azot="22.7" data-phosphor="6.2" data-kalii="10" data-sera="0.2">Вика</option>
						<option value="41" data-azot="17" data-phosphor="7" data-kalii="18" data-sera="0.5">Естественные сенокосы</option>

						<option value="42" data-azot="35" data-phosphor="13" data-kalii="25" data-sera="1.7">Озимый ячмень</option>
						<option value="43" data-azot="43" data-phosphor="21" data-kalii="27" data-sera="3">Яровой рапс</option>
						<option value="44" data-azot="22" data-phosphor="11" data-kalii="24" data-sera="1.7">Яровая рожь</option>
					</select>
				</div>
				<div class="input_block">
					<div class="input_name">Предыдущая</div>
					<select class="form_select" name="kultura_pred">
						<option value="0" selected disabled>Выберите культуру из списка</option>
						<option value="0" selected disabled>Выберите культуру из списка</option>
						<option value="1" data-azot="30" data-phosphor="13" data-kalii="25" data-sera="3">Озимая пшеница</option>
						<option value="2" data-azot="35" data-phosphor="12" data-kalii="25" data-sera="3">Яровая пшеница</option>
						<option value="3" data-azot="25" data-phosphor="12" data-kalii="26" data-sera="1.4">Озимая рожь</option>
						<option value="4" data-azot="25" data-phosphor="11" data-kalii="22" data-sera="1.2">Яровой ячмень</option>
						<option value="5" data-azot="33" data-phosphor="14" data-kalii="29" data-sera="1.2">Овес</option>
						<option value="6" data-azot="21" data-phosphor="8" data-kalii="26" data-sera="1.2">Рис</option>
						<option value="7" data-azot="34" data-phosphor="12" data-kalii="37" data-sera="1.1">Кукуруза</option>
						<option value="8" data-azot="33" data-phosphor="10" data-kalii="34" data-sera="1.1">Просо</option>
						<option value="9" data-azot="30" data-phosphor="15" data-kalii="40" data-sera="4">Гречиха</option>
						<option value="10" data-azot="66" data-phosphor="16" data-kalii="20" data-sera="2.1">Горох</option>
						<option value="11" data-azot="65" data-phosphor="14" data-kalii="16" data-sera="1.8">Вика</option>
						<option value="12" data-azot="68" data-phosphor="19" data-kalii="47" data-sera="1.5">Люпин</option>
						<option value="13" data-azot="71" data-phosphor="16" data-kalii="18" data-sera="3.5">Соя</option>
						<option value="14" data-azot="60" data-phosphor="26" data-kalii="186" data-sera="1.7">Подсолнечник</option>
						<option value="15" data-azot="49" data-phosphor="23" data-kalii="30" data-sera="3">Озимый рапс</option>
						<option value="16" data-azot="57" data-phosphor="20" data-kalii="23" data-sera="0.5">Горчица белая</option>
						<option value="17" data-azot="72" data-phosphor="17" data-kalii="57" data-sera="1">Клещевина</option>
						<option value="18" data-azot="106" data-phosphor="53" data-kalii="93" data-sera="5">Лен-долгунец</option>
						<option value="19" data-azot="45" data-phosphor="15" data-kalii="50" data-sera="5">Хлопчатник</option>
						<option value="20" data-azot="80" data-phosphor="40" data-kalii="70" data-sera="5">Лен-долгунец (волокно)</option>
						<option value="21" data-azot="200" data-phosphor="62" data-kalii="100" data-sera="17">Конопля</option>
						<option value="22" data-azot="5.9" data-phosphor="1.8" data-kalii="7.5" data-sera="1.5">Свекла сахарная (корнеплоды)</option>
						<option value="23" data-azot="6.2" data-phosphor="2.2" data-kalii="9.5" data-sera="2.2">Картофель</option>
						<option value="24" data-azot="4.9" data-phosphor="1.5" data-kalii="6.7" data-sera="1">Свекла кормовая</option>
						<option value="25" data-azot="4.8" data-phosphor="1.7" data-kalii="5.7" data-sera="0.5">Турнепс</option>
						<option value="26" data-azot="5.2" data-phosphor="1.9" data-kalii="6" data-sera="0.5">Морковь кормовая</option>
						<option value="27" data-azot="5.5" data-phosphor="3.1" data-kalii="7.7" data-sera="0.3">Брюква</option>
						<option value="28" data-azot="3.2" data-phosphor="1.6" data-kalii="5" data-sera="0.2">Морковь столовая</option>
						<option value="29" data-azot="3.3" data-phosphor="1.3" data-kalii="4.4" data-sera="0.5">Капуста белокочанная</option>
						<option value="30" data-azot="2.6" data-phosphor="0.4" data-kalii="3.6" data-sera="1">Помидоры (плоды)</option>
						<option value="31" data-azot="1.7" data-phosphor="1.4" data-kalii="2.6" data-sera="0.2">Огурцы</option>
						<option value="32" data-azot="3" data-phosphor="1.2" data-kalii="4" data-sera="0.2">Лук</option>
						<option value="33" data-azot="5" data-phosphor="3" data-kalii="3" data-sera="1.2">Плодовые и ягодные культуры (плоды, ягоды)</option>
						<option value="34" data-azot="1.7" data-phosphor="1.4" data-kalii="5" data-sera="0.2">Виноград (ягоды)</option>
						<option value="35" data-azot="50" data-phosphor="7" data-kalii="23" data-sera="0.5">Чай (лист сухое вещество)</option>
						<option value="36" data-azot="2.5" data-phosphor="1.5" data-kalii="5" data-sera="1">Кукуруза на силос (надземная масса)</option>
						<option value="37" data-azot="19.7" data-phosphor="5.6" data-kalii="15" data-sera="0.2">Клевер (сено)</option>
						<option value="38" data-azot="26" data-phosphor="6.5" data-kalii="15" data-sera="2.6">Люцерна</option>
						<option value="39" data-azot="15.5" data-phosphor="7" data-kalii="24" data-sera="0.5">Тимофеевка</option>
						<option value="40" data-azot="22.7" data-phosphor="6.2" data-kalii="10" data-sera="0.2">Вика</option>
						<option value="41" data-azot="17" data-phosphor="7" data-kalii="18" data-sera="0.5">Естественные сенокосы</option>

						<option value="42" data-azot="35" data-phosphor="13" data-kalii="25" data-sera="1.7">Озимый ячмень</option>
						<option value="43" data-azot="43" data-phosphor="21" data-kalii="27" data-sera="3">Яровой рапс</option>
						<option value="44" data-azot="22" data-phosphor="11" data-kalii="24" data-sera="1.7">Яровая рожь</option>
					</select>
				</div>
				<div class="input_block">
					<div class="input_name">Планируемый урожай, тонн с <span>га</span></div>
					<input class="form_input" id="urozhai" type="number" name="plan_urozhai" placeholder="Введите значение" required>
				</div>
			</div>

			<div class="agro_calc_title">
				<span>Почва</span>
			</div>
			<div class="agro_calc_list">
				<div class="input_block">
					<div class="input_name">Тип почвы</div>
					<!-- <input class="form_input" type="number" name="" placeholder="Введите значение" required> -->
					<select class="form_select" name="tip_pochvi">
						<option value="0" selected disabled>Выберите из списка</option>
						<option value="1.1">Песок рыхлый, сухой</option>
						<option value="1.2">Песок влажный, супесь, суглинок разрыхленный</option>
						<option value="2">Суглинок, средний и мелкий гравий, легкая глина</option>
						<option value="3">Глина, плотный суглинок</option>
						<option value="4">Тяжелая глина, сланцы, суглинок с щебнем, гравием, легкий скальный грунт</option>
						<option value="5">Черноземы</option>
						<option value="6">Темно-каштановые</option>
						<option value="7">Каштановые</option>
						<option value="8">Светло-каштановые</option>
						<option value="9">Серо-бурые</option>
						<option value="10">Бурые</option>
						<option value="11">Пустынные</option>
						<option value="12">Сероземы</option>
						<option value="13">Другое</option>
					</select>
				</div>
				<!-- <div class="input_block">
					<div class="input_name">Механический состав почвы</div>
					<select class="form_select">
						<option value="0" selected disabled>Выберите из списка</option>
						<option value="30">Глинистые (частиц размером >0,001мм – 30%)</option>
						<option value="20">Суглинистые (частиц размером >0,001мм – от 10 до</option>
						<option value="10">Супесчаные (частиц размером >0,001мм – от 3 до 10%)</option>
						<option value="3">Песчаные (частиц размером >0,001мм – менее 3%)</option>
					</select>
				</div> -->
				<!-- <div class="input_block hide_input_block"></div> -->
				<div class="input_block">
					<div class="input_name">Толщина пахотного слоя, <span>см</span></div>
					<input class="form_input" type="number" name="tolshina" placeholder="Введите значение от 1 до 40" required>
				</div>
				<div class="input_block">
					<div class="input_name">Содержание гумуса, <span>%</span></div>
					<!-- <input class="form_input" type="number" name="" placeholder="Введите значение" required> -->
					<select class="form_select" name="gumus">
						<option value="0" selected disabled>Выберите из списка</option>
						<option value="0.2">Очень низкое 0 - 0.2</option>
						<option value="4">Низкое 2.1 - 4.0</option>
						<option value="6">Среднее 4.1 - 6.0</option>
						<option value="8">Повышенное 6.1 - 8.0</option>
						<option value="10">Высокое 8.1 - 10</option>
						<option value="more_10">Очень высокое > 10</option>
						<option value="other">Другое</option>
					</select>
				</div>
				<div class="input_block">
					<div class="input_name">Степень засоренности сорняками</div>
					<select class="form_select" name="sorniaki">
						<option value="0" selected disabled>Выберите из списка</option>
						<option value="1">1 балл (слабо)</option>
						<option value="2">2 балла (средне)</option>
						<option value="3">3 балла (сильно)</option>
						<option value="4">4 балла (очень сильно)</option>
						<option value="other">Другое</option>
					</select>
				</div>
				<div class="input_block">
					<div class="input_name">Кислотность почвы, <span>рН</span></div>
					<!-- <input class="form_input" type="number" name="" placeholder="Введите значение" required> -->
					<select class="form_select" name="kislotnost">
						<option value="0" selected disabled>Выберите из списка</option>
						<option value="4">сильнокислые рН 4 и менее</option>
						<option value="5">среднекислые рН 4 - 5</option>
						<option value="6">слабокислые рН 5 - 6</option>
						<option value="7">нейтральные рН 6.5 - 7</option>
						<option value="8">слабощелочные рН 7 - 8</option>
						<option value="8.5">среднещелочные рН 8 - 8.5</option>
						<option value="more_8.5">сильнощелочные рН 8.5 и более</option>
						<option value="other">Другое</option>
					</select>
				</div>
			</div>
			<a class="orange_btn more_btn agro_calc_btn" href="javascript:;">Рассчитать</a>
		</div>

		<div class="agro_table">
		</div>
	</div>
</section>

<div style="display: none;" id="zayavka">
	<div class="popup-form">
		<span class="popup-form__heading">
			Оставить заявку
		</span>		
		<form method="POST" action="/requests/agrocalc">
			<div class="popup-row">
				<label>ФИО:</label>
	            <input placeholder="Введите ФИО" type="text" name="data[Request][name]" required="">
	        </div>
	        <div class="popup-row">
	        	<label>Номер телефона:</label>
	            <input placeholder="+7(___)__ __ __" type="tel" name="data[Request][phone]" required="">
	        </div>
	        <div class="popup-row">
	        	<label>Почта:</label>
	            <input placeholder="Почта" type="text" name="data[Request][email]" required="">
	        </div>
	        <textarea id="calc_area" style="display: none;" name="data[Request][data]"></textarea>
	        <div class="popup-row">
	        	<label>Ваш вопрос:</label>
	            <!-- <input placeholder="Введите свой вопрос" type="text" name="" required=""> -->
	            <textarea placeholder="Введите свой вопрос" rows="5" required="" name="data[Request][question]"></textarea>
	        </div>
	        <input type="hidden" name="data[Request][page]" value="Доставка">
	        <button class="popup-sbt" type="submit">Отправить</button>
	    </form>    
	</div>	
</div>