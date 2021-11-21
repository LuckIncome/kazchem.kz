<section class="page">
	<div class="container">
		<ul class="breadcrumbs breadcrumbs_center">
			<li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
			<li><a><?=__('Контакты')?></a></li>
		</ul>
		<div class="title" style="display: none;"><?=__('Контакты')?></div>

		<div class="contact-part">
			<div class="contact-part__left">
				<div class="cont-left">
					<span class="cont-left__heading">Контактные данные</span>
					<ul class="cont-ul">
						<li>
							<div class="cont-row cont-row--adress">офис в г. Нур-Султан, проспект Мәнгілік Ел, 52А. Бизнес-центр «Noble»</div>
						</li>
						<li>
							<div class="cont-row cont-row--phone">+7 (701) 006-36-33</div>
						</li>
						<li>
							<div class="cont-row cont-row--mail">office@kazchem.kz</div>
						</li>
					</ul>
					<ul class="cont-ul">
						<li>
							<div class="cont-row cont-row--adress">офис в г. Алматы, проспект Аль-Фараби, 77/1, Административное помещение ЖК «Esentai Apartments», офис 10h</div>
						</li>
						<li>
							<div class="cont-row cont-row--phone">+7 (701) 006-36-33</div>
						</li>
						<li>
							<div class="cont-row cont-row--mail">almatykazchem@info.kz</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="contact-part__right">
				<div class="cont-area">
					<span class="cont-area__heading">Оставьте заявку!</span>
					<form class="contact_form" action="/pages/contactsend" method="POST">
						<div class="input_block">
							<div class="input_name"><?=__('ФИО')?></div>
							<input placeholder="Введите ФИО" class="form_input" type="text" name="data[Contact][name]" required="">
						</div>
						<div class="input_block">
							<div class="input_name"><?=__('Контактный телефон')?></div>
							<input placeholder="+7(__)__ __ __" class="form_input" type="tel" name="data[Contact][phone]" required="">
						</div>
						<div class="input_block">
							<div class="input_name"><?=__('Электронная почта')?></div>
							<input placeholder="Введите почту" class="form_input" type="email" name="data[Contact][email]" required="">
						</div>
						<div class="input_block">
							<div class="input_name"><?=__('Текст сообщения')?></div>
							<textarea placeholder="Введите текст" class="form_input" rows="1" cols="5" name="data[Contact][message]"></textarea>
						</div>
						<button class="form_btn orange_btn" type="submit"><?=__('Отправить')?></button>
					</form>
				</div>	
			</div>
			<!-- <div class="contact_bottom">
				<div class="contact_bottom_item">Алматы, Микрорайон Калкаман-2, 171</div>
				<div class="contact_bottom_item">г. Нур-Султан, пр-т. Мангилик Ел 52, БЦ "Noble"</div>
			</div> -->
		</div>
		<div class="cont-tab">
			<ul class="city-ul">
				<li class="active">
					<a href="#nursultan">Нур-Султан</a>
				</li>
				<li>
					<a href="#almaty">Алматы</a>
				</li>
			</ul>
			<div class="ctab-area">
				<div class="cont-map active" id="nursultan">
					<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2c3d5e72650cfe582e93019f23e82a32e3800e03a09567ce12707b5c856f97e6&amp;source=constructor" width="1143" height="552" frameborder="0"></iframe>
				</div>
				<div class="cont-map" id="almaty">
					<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A03f14457bf2809e2d4031e82d7ab490ebfa90c5cbde28e17968d145b36528f64&amp;source=constructor" width="500" height="400" frameborder="0"></iframe>
				</div>
			</div>		
		</div>	
	</div>
	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
	<div class="leaf leaf_4"></div>
</section>