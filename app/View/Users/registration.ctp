<section class="page login_section">
	<div class="container">
		<div class="reg_main">
			<div class="reg_advan">
				<div class="small_title">Ваш личный кабинет</div>
				<div class="reg_advan_list">
					<div class="reg_advan_item">
						<div class="reg_advan_img">
							<img src="/img/icons/reg/tracking.svg" alt="">
						</div>
						<div class="reg_advan_name">Отслеживание грузов</div>
						<!-- <div class="text_item">
							<p>Мы работаем с лучшими технологиями, которые позволяют удаленно отслеживать движение грузов.</p>
						</div> -->
					</div>
					<div class="reg_advan_item">
						<div class="reg_advan_img">
							<img src="/img/icons/reg/status.svg" alt="">
						</div>
						<div class="reg_advan_name">Статус заказов</div>
						<!-- <div class="text_item">
							<p>Мы работаем с лучшими технологиями, которые позволяют удаленно отслеживать движение грузов.</p>
						</div> -->
					</div>
					<div class="reg_advan_item">
						<div class="reg_advan_img">
							<img src="/img/icons/reg/box.svg" alt="">
						</div>
						<div class="reg_advan_name">История заказов</div>
						<!-- <div class="text_item">
							<p>Мы работаем с лучшими технологиями, которые позволяют удаленно отслеживать движение грузов.</p>
						</div> -->
					</div>
					<div class="reg_advan_item">
						<div class="reg_advan_img">
							<img src="/img/icons/reg/news.svg" alt="">
						</div>
						<div class="reg_advan_name">Подписка на рассылку новостей</div>
						<!-- <div class="text_item">
							<p>Мы работаем с лучшими технологиями, которые позволяют удаленно отслеживать движение грузов.</p>
						</div> -->
					</div>
					<div class="reg_advan_item">
						<div class="reg_advan_img">
							<img src="/img/icons/reg/consultant.svg" alt="">
						</div>
						<div class="reg_advan_name">Личный консультант</div>
					</div>
					<div class="reg_advan_item">
						<div class="reg_advan_img">
							<img src="/img/reg_advan_6.svg" alt="">
						</div>
						<div class="reg_advan_name">Пользование медиатекой, скачивание файлов, рекомендаций</div>
					</div>
				</div>
			</div>
			<div class="login_block reg_block">
				<div class="login_head">Регистрация</div>
				<form class="login_body" action="/users/registration" id="UserRegistrationForm" method="POST" accept-charset="utf-8">
					<div class="input_block">
						<div class="input_name">ФИО</div>
						<input class="form_input" type="text" name="data[User][fio]">
					</div>
					<div class="input_block">
						<div class="input_name">Название компании</div>
						<input class="form_input" type="text" name="data[User][company]">
					</div>
					<div class="input_block">
						<div class="input_name">Контактный телефон</div>
						<input class="form_input" type="tel" name="data[User][username]">
					</div>
					<div class="input_block">
						<div class="input_name">Электронная почта</div>
						<input class="form_input" type="email" name="data[User][email]">
					</div>
					<div class="input_block">
						<div class="input_name">Выберите область</div>
						<select class="form_select" id="reg_region" name="data[User][area_id]" required>
							<option value="0" selected="" disabled="">Выберите область</option>
							<?php foreach($areas as $item): ?>
							<option value="<?=$item['Area']['id']?>"><?=$item['Area']['title_'.$l]?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="input_block pass_input_block">
						<div class="input_name">Придумайте пароль</div>
						<input class="form_input pass_input pass_input__pass" type="password" name="data[User][password]">
						<div class="input_err pass_err"></div>
						<div class="pass_eye"></div>
					</div>
					<div class="input_block pass_input_block">
						<div class="input_name">Повторите пароль</div>
						<input class="form_input pass_input pass_input__repeat" type="password" name="data[User][password_repeat]">
						<div class="input_err pass_err"></div>
						<div class="pass_eye"></div>
					</div>
					<div class="input_block">
						<label class="accept_name" for="accept">
							<input class="accept_input" id="accept" type="checkbox">
							<span>Согласие на сбор и обработку персональных данных</span>
						</label>
						<div class="input_err accept_err">Подтвердите согласие на обработку данных</div>
					</div>
					<button class="form_btn orange_btn login_btn reg_btn" type="submit">Зарегистрироваться</button>
				</form>
			</div>
		</div>
	</div>
</section>


