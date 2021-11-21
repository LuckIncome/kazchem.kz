<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>KazChem.kz</title>
		<meta name="description" content=""/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="img/favicon.png" />
		<link rel="stylesheet" href="/css/style.css" />
		<link rel="stylesheet" href="/css/slick.css" />
		<link rel="stylesheet" href="/css/jquery.fancybox.css" />
	</head>
	<body>		  
		<header>
			<div class="header_top">
				<div class="container">
					<a class="logo" href="/"></a>
					<ul class="menu">
						<li class="sub_menu_link">
							<a class="menu_link" href="javascript:;">О компании</a>
							<div class="sub_menu">
								<div class="sub_menu_list">
									<a class="sub_link" href="about.html">О компании</a>
									<a class="sub_link" href="partners.html">Наши партнеры</a>
									<a class="sub_link" href="comments.html">Отзывы</a>
									<a class="sub_link" href="vakancy.html">Вакансии</a>
									<a class="sub_link" href="contacts.html">Контакты</a>
								</div>
							</div>
						</li>
						<li><a class="menu_link" href="catalog.html">Наша продукция</a></li>
						<li class="sub_menu_link">
							<a class="menu_link" href="javascript:;">Услуги</a>
							<div class="sub_menu">
								<div class="sub_menu_list">
									<a class="sub_link" href="javascript:;">Агроконсалтинг</a>
									<a class="sub_link" href="javascript:;">Доставка</a>
									<a class="sub_link" href="subsiding.html">Субсидирование</a>
								</div>
							</div>
						</li>
						<li><a class="menu_link" href="news.html">Новости</a></li>
						<!-- <li><a class="menu_link" href="javascript:;">Полезное</a></li> -->
					</ul>
					<div class="head_right">
						<a class="head_tel head_right_item" href="tel:+77010063633">+7 (701) 006 36 33</a>
						<div class="head_login_block">
							<a class="cabinet_link head_right_item" href="javascript:;">Мой кабинет</a>
							<div class="head_login">
				            	<div class="head_login_top">
				            		<div class="head_login_item active">Вход</div>
				            		<a class="head_login_item" href="registration.html">Регистрация</a>
				            	</div>
				            	<form class="login_body" action="" method="">
									<div class="input_block">
										<div class="input_name">Логин / Электронная почта</div>
										<input class="form_input" type="text" name="">
									</div>
									<div class="input_block pass_input_block">
										<div class="input_name">Пароль</div>
										<input class="form_input pass_input" type="password" name="">
										<div class="input_err pass_err"></div>
										<div class="pass_eye"></div>
									</div>
									<button class="form_btn orange_btn login_btn" type="submit">Войти</button>
									<a class="forget_pass" href="javascript:;">Восстановить пароль</a>
								</form>
				            </div>
						</div>
						<div class="lang_block head_right_item">
							<div class="lang_choice">
								<div class="lang_icon rus"></div>
								<span class="lang_choice_name">ru</span>
							</div>
							<div class="other_lang">
								<a class="lang active" href="javascript:;">ru</a>
								<a class="lang" href="javascript:;">kz</a>
								<a class="lang" href="javascript:;">en</a>
							</div>
						</div>
						<a class="basket_btn" href="basket.html">
							<div class="basket_num">0</div>
						</a>
						<div class="mob_menu">
		               <span class="menu_btn">
		                  <span class="menu_btn_span menu1"></span>
		                  <span class="menu_btn_span menu2"></span>
		                  <span class="menu_btn_span menu3"></span>
		               </span>
		            </div>
		            <div class="under_nav"></div>
					</div>
				</div>
			</div>
		</header>

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
							<select class="form_select">
								<option value="0" selected disabled>Выберите регион из списка</option>
								<option value="">Акмолинская область</option>
								<option value="">Актюбинская область</option>
								<option value="">Атырауская область</option>
								<option value="">Восточно-Казахстанская область</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Площадь посева, <span>га</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
					</div>
					<div class="agro_calc_title">
						<span>Культура</span>
					</div>
					<div class="agro_calc_list">
						<div class="input_block">
							<div class="input_name">Засеваемая</div>
							<select class="form_select">
								<option value="0" selected disabled>Выберите культуру из списка</option>
								<option value="">Пшеница</option>
								<option value="">Рис</option>
								<option value="">Овес</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Предыдущая</div>
							<select class="form_select">
								<option value="0" selected disabled>Выберите культуру из списка</option>
								<option value="">Пшеница</option>
								<option value="">Рис</option>
								<option value="">Овес</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Планируемый урожай, тонн с <span>га</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
					</div>

					<div class="agro_calc_title">
						<span>Почва</span>
					</div>
					<div class="agro_calc_list">
						<div class="input_block">
							<div class="input_name">Плотность почвы, <span>г/см<sup>3</sup></span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
						<div class="input_block">
							<div class="input_name">Механический состав почвы</div>
							<select class="form_select">
								<option value="0" selected disabled>Выберите из списка</option>
								<option value="">Состав 1</option>
								<option value="">Состав 2</option>
								<option value="">Состав 3</option>
							</select>
						</div>
						<div class="input_block hide_input_block"></div>
						<div class="input_block">
							<div class="input_name">Толщина пахотного слоя, <span>см</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
						<div class="input_block">
							<div class="input_name">Содержание гумуса, <span>%</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
						<div class="input_block">
							<div class="input_name">Степень засоренности сорняками</div>
							<select class="form_select">
								<option value="0" selected disabled>Выберите из списка</option>
								<option value="">Засоренность 1</option>
								<option value="">Засоренность 2</option>
								<option value="">Засоренность 3</option>
							</select>
						</div>
						<div class="input_block">
							<div class="input_name">Кислотность почвы, <span>рН</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
					</div>

					<div class="agro_calc_title">
						<span>Химический состав</span>
					</div>
					<div class="agro_calc_list">
						<div class="input_block">
							<div class="input_name">Содержание Р, <span>мг/кг</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
						<div class="input_block">
							<div class="input_name">Содержание К, <span>мг/кг</span></div>
							<input class="form_input" type="number" name="" placeholder="Введите значение" required>
						</div>
					</div>

					<a class="orange_btn more_btn" href="javascript:;">Рассчитать</a>
				</div>
			</div>
		</section>


		<footer>
			<div class="container">
				<a class="logo" href="/"></a>
				<div class="foot_right">
					<a class="left_icon tel" href="tel:+77010063633">+7 (701) 006-36-33</a>
					<div class="left_icon loc">г. Нур-Султан, пр-т. Мангилик Ел 52, БЦ "Noble"</div>
					<div class="created">Разработка сайта <a href="https://astanacreative.kz/" target="_blank">Astanacreative</a></div>
					<ul class="soc_list">
						<li>
							<a class="soc_link instagram" href="javascript:;" target="_blank"></a>
						</li>
						<li>
							<a class="soc_link facebook" href="javascript:;" target="_blank"></a>
						</li>
					</ul>
				</div>
			</div>
		</footer>

		<script src="/js/jquery-3.0.0.min.js"></script>
		<script src="/js/slick.min.js"></script>	
		<script src="/js/jquery.maskedinput.min.js"></script>	
		<script src="/js/waypoint.js"></script>	
		<script src="/js/script.js"></script>	
		<script src="/js/jquery.fancybox.min.js"></script>	
	</body>
</html>