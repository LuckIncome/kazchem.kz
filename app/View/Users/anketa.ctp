<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<?php echo $this->element('cabinet_sidebar') ?>
			<div class="cabinet_content profile_content">
				
				<div class="profile_anketa cab_content_body">
					<div class="small_title">Моя анкета</div>
					<div class="profile_anketa_body">
						<div class="anketa_top_text">Заполните анкету и получите книгу в подарок!</div>
					</div>
					<form class="anketa_form disabled" action="/users/anketa" method="POST">
						<div class="agro_calc_title">
							<span>Расположение моего хозяйства</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Область</div>
								<select class="form_select" name="data[UserFields][Регион]">
									<option value="0" selected=""  disabled="">Выберите область</option>
									<option value="Акмолинская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Акмолинская область') ? 'selected' : '' ?> >Акмолинская область</option>
									<option value="Актюбинская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Актюбинская область') ? 'selected' : '' ?>>Актюбинская область</option>
									<option value="Алматинская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Алматинская область') ? 'selected' : '' ?> >Алматинская область</option>
									<option value="Атырауская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Атырауская область') ? 'selected' : '' ?> >Атырауская область</option>
									<option value="Восточно-Казахстанская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Восточно-Казахстанская область') ? 'selected' : '' ?> >Восточно-Казахстанская область</option>
									<option value="Жамбылская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Жамбылская область') ? 'selected' : '' ?> >Жамбылская область</option>
									<option value="Западно-Казахстанская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Западно-Казахстанская область') ? 'selected' : '' ?> >Западно-Казахстанская область</option>
									<option value="Карагандинская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Карагандинская область') ? 'selected' : '' ?> >Карагандинская область</option>
									<option value="Костанайская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Костанайская область') ? 'selected' : '' ?> >Костанайская область</option>
									<option value="Кызылординская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Кызылординская область') ? 'selected' : '' ?> >Кызылординская область</option>
									<option value="Мангистауская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Мангистауская область') ? 'selected' : '' ?> >Мангистауская область</option>
									<option value="Павлодарская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Павлодарская область') ? 'selected' : '' ?> >Павлодарская область</option>
									<option value="Северо-Казахстанская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Северо-Казахстанская область') ? 'selected' : '' ?> >Северо-Казахстанская область</option>
									<option value="Южно-Казахстанская область" <?=($this->Common->get_anketa($user_id,'Регион') == 'Туркестанская область') ? 'selected' : '' ?> >Туркестанская область</option>
								</select>
							</div>
							<div class="input_block">
								<div class="input_name">Город</div>
								<input placeholder="Напишите город" class="form_input" name="data[UserFields][Город]" value="<?php echo $this->Common->get_anketa($user_id,'Город');?>">
							</div>
							<div class="input_block">
								<div class="input_name">Точный адрес</div>
								<input placeholder="Введите точный адрес" class="form_input" name="data[UserFields][Адрес]" value="<?php echo $this->Common->get_anketa($user_id,'Адрес');?>">
							</div>							
						</div>
						<div class="agro_calc_title">
							<span>Моя ближайшая ж/д станция</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Ж/д станция</div>
								<input placeholder="Введите ж/д станцию" class="form_input" name="data[UserFields][Станция]" value="<?php echo $this->Common->get_anketa($user_id,'Станция');?>" >
							</div>
						</div>
						<div class="agro_calc_title">
							<span>Площадь</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Общая посевная площадь, га</div>
								<input placeholder="Введите площадь" class="form_input" name="data[UserFields][Общая_площадь]" value="<?php echo $this->Common->get_anketa($user_id,'Общая_площадь');?>" name="data[UserFields][Общая_площадь]">
							</div>
							<div class="input_block">
								<div class="input_name">Площадь засеваемая, га</div>
								<input placeholder="Введите площадь" class="form_input" name="data[UserFields][Площадь_засеваемая]"  value="<?php echo $this->Common->get_anketa($user_id,'Площадь_засеваемая');?>" >
							</div>
							<div class="input_block">
								<div class="input_name">Площадь паровая, га</div>
								<input placeholder="Введите площадь" class="form_input" name="data[UserFields][Площадь_паровая]" name="data[UserFields][Площадь_паровая]" value="<?php echo $this->Common->get_anketa($user_id,'Площадь_паровая');?>"> 
							</div>
							<div class="input_block">
								<div class="input_name">Площадь удобряемая, га</div>
								<input placeholder="Введите площадь" class="form_input" name="data[UserFields][Площадь_удобряемая]" value="<?php echo $this->Common->get_anketa($user_id,'Площадь_удобряемая');?>">
							</div>
						</div>
						<div class="agro_calc_title">
							<span>Культура</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Засеваемая</div>
								<!-- <select class="form_select" id="kultura" name="data[UserFields][Засеваемая]">
									<option value="0" selected="" disabled="">Выберите культуру</option>
									<option value="Озимая пшеница" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимая пшеница') ? 'selected' : '' ?> >Озимая пшеница</option>
									<option value="Яровая пшеница" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Яровая пшеница') ? 'selected' : '' ?> >Яровая пшеница</option>
									<option value="Озимая рожь" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимая рожь') ? 'selected' : '' ?> >Озимая рожь</option>
									<option value="Ячмень" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Ячмень') ? 'selected' : '' ?> >Ячмень</option>
									<option value="Овес" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Овес') ? 'selected' : '' ?> >Овес</option>
									<option value="Рис" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Рис') ? 'selected' : '' ?> >Рис</option>
									<option value="Кукуруза" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Кукуруза') ? 'selected' : '' ?>>Кукуруза</option>
									<option value="Просо" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Просо') ? 'selected' : '' ?>>Просо</option>
									<option value="Гречиха" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Гречиха') ? 'selected' : '' ?>>Гречиха</option>
									<option value="Горох" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Горох') ? 'selected' : '' ?>>Горох</option>
									<option value="Вика" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Вика') ? 'selected' : '' ?>> Вика</option>
									<option value="Люпин" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Люпин') ? 'selected' : '' ?>>Люпин</option>
									<option value="Соя" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Соя') ? 'selected' : '' ?>>Соя</option>
									<option value="Подсолнечник" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Подсолнечник') ? 'selected' : '' ?>>Подсолнечник</option>
									<option value="Озимый рапс" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимый рапс') ? 'selected' : '' ?>>Озимый рапс</option>
									<option value="Горчица белая" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Горчица белая') ? 'selected' : '' ?>>Горчица белая</option>
									<option value="Клещевина"  <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Клещевина') ? 'selected' : '' ?>>Клещевина</option>
									<option value="Лен-долгунец"  <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Лен-долгунец') ? 'selected' : '' ?>>Лен-долгунец</option>
									<option value="Хлопчатник" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Хлопчатник') ? 'selected' : '' ?>>Хлопчатник</option>
									<option value="Лен-долгунец (волокно)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Лен-долгунец (волокно)') ? 'selected' : '' ?>>Лен-долгунец (волокно)</option>
									<option value="Конопля" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Конопля') ? 'selected' : '' ?>>Конопля</option>
									<option value="Свекла сахарная (корнеплоды)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Свекла сахарная (корнеплоды)') ? 'selected' : '' ?>> Свекла сахарная (корнеплоды)</option>
									<option value="Картофель" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Картофель') ? 'selected' : '' ?>>Картофель</option>
									<option value="Свекла кормовая"  <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Свекла кормовая') ? 'selected' : '' ?>>Свекла кормовая</option>
									<option value="Турнепс" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Турнепс') ? 'selected' : '' ?>>Турнепс</option>
									<option value="Морковь кормовая" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Морковь кормовая') ? 'selected' : '' ?>>Морковь кормовая</option>
									<option value="Брюква" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Брюква') ? 'selected' : '' ?>>Брюква</option>
									<option value="Морковь столовая" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Морковь столовая') ? 'selected' : '' ?>>Морковь столовая</option>
									<option value="Капуста белокочанная" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Капуста белокочанная') ? 'selected' : '' ?>>Капуста белокочанная</option>
									<option value="Помидоры (плоды)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Помидоры (плоды)') ? 'selected' : '' ?>>Помидоры (плоды)</option>
									<option value="Огурцы" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Огурцы') ? 'selected' : '' ?>>Огурцы</option>
									<option value="Лук" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Лук') ? 'selected' : '' ?>>Лук</option>
									<option value="Плодовые и ягодные культуры (плоды, ягоды)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Плодовые и ягодные культуры (плоды, ягоды)') ? 'selected' : '' ?>>Плодовые и ягодные культуры (плоды, ягоды)</option>
									<option value="Виноград (ягоды)"  <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Виноград (ягоды)') ? 'selected' : '' ?>>Виноград (ягоды)</option>
									<option value="Чай (лист сухое вещество)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Чай (лист сухое вещество)') ? 'selected' : '' ?>>Чай (лист сухое вещество)</option>
									<option value="Кукуруза на силос (надземная масса)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Кукуруза на силос (надземная масса)') ? 'selected' : '' ?>>Кукуруза на силос (надземная масса)</option>
									<option value="Клевер (сено)" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Клевер (сено)') ? 'selected' : '' ?>>Клевер (сено)</option>
									<option value="Люцерна" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Люцерна') ? 'selected' : '' ?>>Люцерна</option>
									<option value="Тимофеевка" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Тимофеевка') ? 'selected' : '' ?>>Тимофеевка</option>
									<option value="Вика" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Вика') ? 'selected' : '' ?>>Вика</option>
									<option value="Естественные сенокосы" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Естественные сенокосы') ? 'selected' : '' ?>>Естественные сенокосы</option>
									<option value="Озимый ячмень" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимый ячмень') ? 'selected' : '' ?>>Озимый ячмень</option>
									<option value="Яровой рапс" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Яровой рапс') ? 'selected' : '' ?>>Яровой рапс</option>
									<option value="Яровая рожь" <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Яровая рожь') ? 'selected' : '' ?>>Яровая рожь</option>
								</select> -->
								<input class="form_input crop_input next_crop" type="text" name="data[UserFields][Засеваемая]" data-fancybox data-src="#next_crop" value="<?=($this->Common->get_anketa($user_id,'Засеваемая')) ?>" data-value="<?=($this->Common->get_anketa($user_id,'Засеваемая')) ?>">
							</div>
							<div class="input_block">
								<div class="input_name">Предыдущая</div>
								<!-- <select class="form_select" name="data[UserFields][Предыдущая]">
									<option value="0" selected="" disabled="">Выберите культуру</option>
									<option value="Озимая пшеница" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Озимая пшеница') ? 'selected' : '' ?> >Озимая пшеница</option>
									<option value="Яровая пшеница" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Яровая пшеница') ? 'selected' : '' ?> >Яровая пшеница</option>
									<option value="Озимая рожь" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Озимая рожь') ? 'selected' : '' ?> >Озимая рожь</option>
									<option value="Ячмень" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Ячмень') ? 'selected' : '' ?> >Ячмень</option>
									<option value="Овес" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Овес') ? 'selected' : '' ?> >Овес</option>
									<option value="Рис" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Рис') ? 'selected' : '' ?> >Рис</option>
									<option value="Кукуруза" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Кукуруза') ? 'selected' : '' ?>>Кукуруза</option>
									<option value="Просо" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Просо') ? 'selected' : '' ?>>Просо</option>
									<option value="Гречиха" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Гречиха') ? 'selected' : '' ?>>Гречиха</option>
									<option value="Горох" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Горох') ? 'selected' : '' ?>>Горох</option>
									<option value="Вика" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Вика') ? 'selected' : '' ?>> Вика</option>
									<option value="Люпин" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Люпин') ? 'selected' : '' ?>>Люпин</option>
									<option value="Соя" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Соя') ? 'selected' : '' ?>>Соя</option>
									<option value="Подсолнечник" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Подсолнечник') ? 'selected' : '' ?>>Подсолнечник</option>
									<option value="Озимый рапс" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Озимый рапс') ? 'selected' : '' ?>>Озимый рапс</option>
									<option value="Горчица белая" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Горчица белая') ? 'selected' : '' ?>>Горчица белая</option>
									<option value="Клещевина"  <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Клещевина') ? 'selected' : '' ?>>Клещевина</option>
									<option value="Лен-долгунец"  <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Лен-долгунец') ? 'selected' : '' ?>>Лен-долгунец</option>
									<option value="Хлопчатник" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Хлопчатник') ? 'selected' : '' ?>>Хлопчатник</option>
									<option value="Лен-долгунец (волокно)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Лен-долгунец (волокно)') ? 'selected' : '' ?>>Лен-долгунец (волокно)</option>
									<option value="Конопля" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Конопля') ? 'selected' : '' ?>>Конопля</option>
									<option value="Свекла сахарная (корнеплоды)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Свекла сахарная (корнеплоды)') ? 'selected' : '' ?>> Свекла сахарная (корнеплоды)</option>
									<option value="Картофель" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Картофель') ? 'selected' : '' ?>>Картофель</option>
									<option value="Свекла кормовая"  <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Свекла кормовая') ? 'selected' : '' ?>>Свекла кормовая</option>
									<option value="Турнепс" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Турнепс') ? 'selected' : '' ?>>Турнепс</option>
									<option value="Морковь кормовая" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Морковь кормовая') ? 'selected' : '' ?>>Морковь кормовая</option>
									<option value="Брюква" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Брюква') ? 'selected' : '' ?>>Брюква</option>
									<option value="Морковь столовая" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Морковь столовая') ? 'selected' : '' ?>>Морковь столовая</option>
									<option value="Капуста белокочанная" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Капуста белокочанная') ? 'selected' : '' ?>>Капуста белокочанная</option>
									<option value="Помидоры (плоды)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Помидоры (плоды)') ? 'selected' : '' ?>>Помидоры (плоды)</option>
									<option value="Огурцы" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Огурцы') ? 'selected' : '' ?>>Огурцы</option>
									<option value="Лук" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Лук') ? 'selected' : '' ?>>Лук</option>
									<option value="Плодовые и ягодные культуры (плоды, ягоды)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Плодовые и ягодные культуры (плоды, ягоды)') ? 'selected' : '' ?>>Плодовые и ягодные культуры (плоды, ягоды)</option>
									<option value="Виноград (ягоды)"  <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Виноград (ягоды)') ? 'selected' : '' ?>>Виноград (ягоды)</option>
									<option value="Чай (лист сухое вещество)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Чай (лист сухое вещество)') ? 'selected' : '' ?>>Чай (лист сухое вещество)</option>
									<option value="Кукуруза на силос (надземная масса)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Кукуруза на силос (надземная масса)') ? 'selected' : '' ?>>Кукуруза на силос (надземная масса)</option>
									<option value="Клевер (сено)" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Клевер (сено)') ? 'selected' : '' ?>>Клевер (сено)</option>
									<option value="Люцерна" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Люцерна') ? 'selected' : '' ?>>Люцерна</option>
									<option value="Тимофеевка" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Тимофеевка') ? 'selected' : '' ?>>Тимофеевка</option>
									<option value="Вика" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Вика') ? 'selected' : '' ?>>Вика</option>
									<option value="Естественные сенокосы" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Естественные сенокосы') ? 'selected' : '' ?>>Естественные сенокосы</option>
									<option value="Озимый ячмень" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Озимый ячмень') ? 'selected' : '' ?>>Озимый ячмень</option>
									<option value="Яровой рапс" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Яровой рапс') ? 'selected' : '' ?>>Яровой рапс</option>
									<option value="Яровая рожь" <?=($this->Common->get_anketa($user_id,'Предыдущая') == 'Яровая рожь') ? 'selected' : '' ?>>Яровая рожь</option>
								</select> -->
								<input class="form_input crop_input prev_crop" type="text" name="data[UserFields][Предыдущая]" data-fancybox data-src="#prev_crop" value="<?=($this->Common->get_anketa($user_id,'Предыдущая')) ?>" data-value="<?=($this->Common->get_anketa($user_id,'Предыдущая')) ?>">
							</div>
						</div>
						<div class="agro_calc_title">
							<span>Урожайность</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Средняя урожайность до использования удоберний, ц/га</div>
								<input placeholder="Введите урожайность" name="data[UserFields][Средняя_урожайность_до_использования_удоберний]" value="<?php echo $this->Common->get_anketa($user_id,'Средняя_урожайность_до_использования_удоберний');?>" class="form_input">
							</div>
							<div class="input_block">
								<div class="input_name">Средняя урожайность после использования удоберний, ц/га</div>
								<input name="data[UserFields][Средняя_урожайность_после_использования_удоберний]"  placeholder="Введите урожайность" class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'Средняя_урожайность_после_использования_удоберний');?>">
							</div>
						</div>
						<div class="agro_calc_title">
							<span>Удобрения</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Используемые удобрения</div>
								<select class="form_select" name="data[UserFields][Используемые_удобрения]">
									<option value="КАС 30-32%"  <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'КАС 30-32%') ? 'selected' : '' ?> >КАС 30-32%</option>
									<option value="Сульфат аммония 21:24"  <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Сульфат аммония 21:24') ? 'selected' : '' ?>>Сульфат аммония 21:24</option>
									<option value="Карбамид N 46,2" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Карбамид N 46,2') ? 'selected' : '' ?>>Карбамид N 46,2</option>
									<option value="Аммиачная селитра N 34,4" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Аммиачная селитра N 34,4') ? 'selected' : '' ?>>Аммиачная селитра N 34,4</option>
									<option value="Аммофос NP 10:46" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Аммофос NP 10:46') ? 'selected' : '' ?>>Аммофос NP 10:46</option>
									<option value="Аммофос NP 12:52" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Аммофос NP 12:52') ? 'selected' : '' ?>>Аммофос NP 12:52</option>
									<option value="Диаммонийфосфат NP 18:46" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Диаммонийфосфат NP 18:46') ? 'selected' : '' ?>>Диаммонийфосфат NP 18:46</option>
									<option value="Диамммофоска NPK(S) 10:26:26(2)" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Диамммофоска NPK(S) 10:26:26(2)') ? 'selected' : '' ?>>Диамммофоска NPK(S) 10:26:26(2)</option>
									<option value="NPK(S) 15:15:15(10)" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'NPK(S) 15:15:15(10)') ? 'selected' : '' ?>>NPK(S) 15:15:15(10)</option>
									<option value="Калий хлористый 60" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Калий хлористый 60') ? 'selected' : '' ?>>Калий хлористый 60</option>
									<option value="ЖКУ 11:37" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'ЖКУ 11:37') ? 'selected' : '' ?>>ЖКУ 11:37</option>
									<option value="Сульфоаммофос NP(S) 20:20(14)" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Сульфоаммофос NP(S) 20:20(14)') ? 'selected' : '' ?>>Сульфоаммофос NP(S) 20:20(14)</option>
									<option value="Сульфоаммофос NP(S) 16:20:12" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Сульфоаммофос NP(S) 16:20:12') ? 'selected' : '' ?>>Сульфоаммофос NP(S) 16:20:12</option>
									<option value="Аммофос NP 10:33" <?=($this->Common->get_anketa($user_id,'Используемые_удобрения') == 'Аммофос NP 10:33') ? 'selected' : '' ?>>Аммофос NP 10:33</option>
								</select>
							</div>
							<div class="input_block">
								<div class="input_name">Нормы внесения, кг/га в ф.в.</div>
								<input placeholder="Введите норму внесения" name="data[UserFields][Нормы_внесения]" class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'Нормы_внесения');?>">
							</div>
						</div>
						<div class="agro_calc_title">
							<span>Почва</span>
						</div>
						<div class="anketa-row">
							<div class="input_block">
								<div class="input_name">Плотность почвы, г/см3</div>
								<select class="form_select" name="data[UserFields][Плотность_почвы]">
									<option value="0" selected="" disabled="" >Выберите из списка</option>
									<option value="Песок рыхлый, сухой" <?=($this->Common->get_anketa($user_id,'Плотность_почвы') == 'Песок рыхлый, сухой') ? 'selected' : '' ?> >Песок рыхлый, сухой</option>
									<option value="Песок влажный, супесь, суглинок разрыхленный" <?=($this->Common->get_anketa($user_id,'Плотность_почвы') == 'Песок влажный, супесь, суглинок разрыхленный') ? 'selected' : '' ?>>Песок влажный, супесь, суглинок разрыхленный</option>
									<option value="Суглинок, средний и мелкий гравий, легкая глина" <?=($this->Common->get_anketa($user_id,'Плотность_почвы') == 'Суглинок, средний и мелкий гравий, легкая глина') ? 'selected' : '' ?>>Суглинок, средний и мелкий гравий, легкая глина</option>
									<option value="Глина, плотный суглинок" <?=($this->Common->get_anketa($user_id,'Плотность_почвы') == 'Глина, плотный суглинок') ? 'selected' : '' ?>>Глина, плотный суглинок</option>
									<option value="Тяжелая глина, сланцы, суглинок с щебнем, гравием, легкий скальный грунт" <?=($this->Common->get_anketa($user_id,'Плотность_почвы') == 'Тяжелая глина, сланцы, суглинок с щебнем, гравием, легкий скальный грунт') ? 'selected' : '' ?>>Тяжелая глина, сланцы, суглинок с щебнем, гравием, легкий скальный грунт</option>
								</select>
							</div>
							<div class="input_block">
								<div class="input_name">N-азот, гр/кг</div>
								<input placeholder="Введиту N-азот" name="data[UserFields][N_азот]"  class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'N_азот');?>" >
							</div>
							<div class="input_block">
								<div class="input_name">P- фосфор, гр/кг</div>
								<input placeholder="Введиту Р- фосфор" name="data[UserFields][P_фосфор]" class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'P_фосфор');?>">
							</div>
							<div class="input_block">
								<div class="input_name">K-калий, гр/кг</div>
								<input placeholder="Введиту K-калий" name="data[UserFields][K_калий]" class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'K_калий');?>">
							</div>
							<div class="input_block">
								<div class="input_name">Толщина пахотного слоя, см</div>
								<input placeholder="Введиту Толщину пахотного слоя" name="data[UserFields][Толщина_пахотного_слоя]" class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'Толщина_пахотного_слоя');?>">
							</div>
							<div class="input_block">
								<div class="input_name">Кислотность почвы, pH</div>
								<input placeholder="Введиту Кислотность почвы"  name="data[UserFields][Кислотность_почвы]" class="form_input" value="<?php echo $this->Common->get_anketa($user_id,'Кислотность_почвы');?>">
							</div>
							<div class="input_block">
								<div class="input_name">Содержание гумуса, %</div>
								<select class="form_select" name="data[UserFields][Содержание_гумуса]">
									<option value="0" selected="" disabled="">Выберите из списка</option>
									<option value="Очень низкое 0 - 0.2" <?=($this->Common->get_anketa($user_id,'Содержание_гумуса') == 'Очень низкое 0 - 0.2') ? 'selected' : '' ?>>Очень низкое 0 - 0.2</option>
									<option value="Низкое 2.1 - 4.0" <?=($this->Common->get_anketa($user_id,'Содержание_гумуса') == 'Низкое 2.1 - 4.0') ? 'selected' : '' ?>>Низкое 2.1 - 4.0</option>
									<option value="Среднее 4.1 - 6.0" <?=($this->Common->get_anketa($user_id,'Содержание_гумуса') == 'Среднее 4.1 - 6.0') ? 'selected' : '' ?>>Среднее 4.1 - 6.0</option>
									<option value="Повышенное 6.1 - 8.0" <?=($this->Common->get_anketa($user_id,'Содержание_гумуса') == 'Повышенное 6.1 - 8.0') ? 'selected' : '' ?>>Повышенное 6.1 - 8.0</option>
									<option value="Высокое 8.1 - 10" <?=($this->Common->get_anketa($user_id,'Содержание_гумуса') == 'Высокое 8.1 - 10') ? 'selected' : '' ?>>Высокое 8.1 - 10</option>
									<option value="Очень высокое > 10" <?=($this->Common->get_anketa($user_id,'Содержание_гумуса') == 'Очень высокое > 10') ? 'selected' : '' ?>>Очень высокое &gt; 10</option>
								</select>
							</div>
							<div class="input_block">
								<div class="input_name">Степень засоренности сорняками</div>
								<select class="form_select" name="data[UserFields][Степень_засоренности_сорняками]">
									<option value="0" selected="" disabled="">Выберите из списка</option>
									<option value="1 балл (слабо)" <?=($this->Common->get_anketa($user_id,'Степень_засоренности_сорняками') == '1 балл (слабо)') ? 'selected' : '' ?>>1 балл (слабо)</option>
									<option value="2 балла (средне)"  <?=($this->Common->get_anketa($user_id,'Степень_засоренности_сорняками') == '2 баллабалла (средне)') ? 'selected' : '' ?>>2 балла (средне)</option>
									<option value="3 балла (сильно)" <?=($this->Common->get_anketa($user_id,'Степень_засоренности_сорняками') == '3 балла (сильно)') ? 'selected' : '' ?>>3 балла (сильно)</option>
									<option value="4 балла (очень сильно)" <?=($this->Common->get_anketa($user_id,'Степень_засоренности_сорняками') == '4 балла (очень сильно)') ? 'selected' : '' ?>>4 балла (очень сильно)</option>
								</select>	
							</div>
						</div>	
						<div class="anketa-row anketa-row-buttons">
							<button class="yellow_btn form_btn anketa_btn" type="submit">Получить книгу</button>
							<a class="orange_btn more_btn anketa_edit" href="javascript:;">Редактировать</a>
							<button class="orange_btn more_btn anketa_save hide" type="submit">Сохранить изменения</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="popup crop_pop" id="next_crop">
	<div class="form_title">Засеваемая культура</div>
	<div class="crop_list">
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Озимая пшеница')) ? 'active' : '' ?>">
			<span>Озимая пшеница</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Яровая пшеница') ? 'active' : '' ?>">
			<span>Яровая пшеница</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимая рожь') ? 'active' : '' ?>">
			<span>Озимая рожь</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Ячмень')) ? 'active' : '' ?>">
			<span>Ячмень</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Овес')) ? 'active' : '' ?>">
			<span>Овес</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Рис')) ? 'active' : '' ?>">
			<span>Рис</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Кукуруза')) ? 'active' : '' ?>">
			<span>Кукуруза</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Просо')) ? 'active' : '' ?>">
			<span>Просо</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Гречиха')) ? 'active' : '' ?>">
			<span>Гречиха</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Горох')) ? 'active' : '' ?>">
			<span>Горох</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Вика')) ? 'active' : '' ?>">
			<span>Вика</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Люпин')) ? 'active' : '' ?>">
			<span>Люпин</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Соя')) ? 'active' : '' ?>">
			<span>Соя</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Подсолнечник')) ? 'active' : '' ?>">
			<span>Подсолнечник</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Озимый рапс')) ? 'active' : '' ?>">
			<span>Озимый рапс</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Горчица белая')) ? 'active' : '' ?>">
			<span>Горчица белая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Клещевина')) ? 'active' : '' ?>">
			<span>Клещевина</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Лeн-долгунец')) ? 'active' : '' ?>">
			<span>Лен-долгунец</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Хлопчатник')) ? 'active' : '' ?>">
			<span>Хлопчатник</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Лен-долгунец (волокно)')) ? 'active' : '' ?>">
			<span>Лен-долгунец (волокно)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Конопля')) ? 'active' : '' ?>">
			<span>Конопля</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Свекла сахарная (корнеплоды)')) ? 'active' : '' ?>">
			<span>Свекла сахарная (корнеплоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Картофель')) ? 'active' : '' ?>">
			<span>Картофель</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Свекла кормовая')) ? 'active' : '' ?>">
			<span>Свекла кормовая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Турнепс')) ? 'active' : '' ?>">
			<span>Турнепс</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Морковь кормовая')) ? 'active' : '' ?>">
			<span>Морковь кормовая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Брюква')) ? 'active' : '' ?>">
			<span>Брюква</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Морковь столовая')) ? 'active' : '' ?>">
			<span>Морковь столовая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Капуста белокочанная')) ? 'active' : '' ?>">
			<span>Капуста белокочанная</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Помидоры (плоды)')) ? 'active' : '' ?>">
			<span>Помидоры (плоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Огурцы')) ? 'active' : '' ?>">
			<span>Огурцы</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Лук')) ? 'active' : '' ?>">
			<span>Лук</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Плодовые и ягодные культуры (плоды, ягоды)')) ? 'active' : '' ?>">
			<span>Плодовые и ягодные культуры (плоды, ягоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Виноград (ягоды)')) ? 'active' : '' ?>">
			<span>Виноград (ягоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Чай (лист сухое вещество)')) ? 'active' : '' ?>">
			<span>Чай (лист сухое вещество)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Кукуруза на силос (надземная масса)')) ? 'active' : '' ?>">
			<span>Кукуруза на силос (надземная масса)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Клевер (сено)')) ? 'active' : '' ?>">
			<span>Клевер (сено)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Люцерна')) ? 'active' : '' ?>">
			<span>Люцерна</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Тимофеевка')) ? 'active' : '' ?>">
			<span>Тимофеевка</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Вика')) ? 'active' : '' ?>">
			<span>Вика</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Естественные сенокосы')) ? 'active' : '' ?>">
			<span>Естественные сенокосы</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Озимый ячмень')) ? 'active' : '' ?>">
			<span>Озимый ячмень</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Яровой рапс')) ? 'active' : '' ?>">
			<span>Яровой рапс</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Засеваемая'), 'Яровая рожь')) ? 'active' : '' ?>">
			<span>Яровая рожь</span>
		</label>
	</div>
	<a class="more_btn orange_btn crop_btn" href="javascript:;">Принять</a>
</div>

<div class="popup crop_pop" id="prev_crop">
	<div class="form_title">Предыдущая культура</div>
	<div class="crop_list">
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Озимая пшеница')) ? 'active' : '' ?>">
			<span>Озимая пшеница</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Яровая пшеница')) ? 'active' : '' ?>">
			<span>Яровая пшеница</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Озимая рожь')) ? 'active' : '' ?>">
			<span>Озимая рожь</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Ячмень')) ? 'active' : '' ?>">
			<span>Ячмень</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Овес')) ? 'active' : '' ?>">
			<span>Овес</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Рис')) ? 'active' : '' ?>">
			<span>Рис</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Кукуруза')) ? 'active' : '' ?>">
			<span>Кукуруза</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Просо')) ? 'active' : '' ?>">
			<span>Просо</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Гречиха')) ? 'active' : '' ?>">
			<span>Гречиха</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Горох')) ? 'active' : '' ?>">
			<span>Горох</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Вика')) ? 'active' : '' ?>">
			<span>Вика</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Люпин')) ? 'active' : '' ?>">
			<span>Люпин</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Соя')) ? 'active' : '' ?>">
			<span>Соя</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Подсолнечник')) ? 'active' : '' ?>">
			<span>Подсолнечник</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Озимый рапс')) ? 'active' : '' ?>">
			<span>Озимый рапс</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Горчица белая')) ? 'active' : '' ?>">
			<span>Горчица белая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Клещевина')) ? 'active' : '' ?>">
			<span>Клещевина</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Лeн-долгунец')) ? 'active' : '' ?>">
			<span>Лeн-долгунец</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Хлопчатник')) ? 'active' : '' ?>">
			<span>Хлопчатник</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Лен-долгунец (волокно)')) ? 'active' : '' ?>">
			<span>Лен-долгунец (волокно)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Конопля')) ? 'active' : '' ?>">
			<span>Конопля</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Свекла сахарная (корнеплоды)')) ? 'active' : '' ?>">
			<span>Свекла сахарная (корнеплоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Картофель')) ? 'active' : '' ?>">
			<span>Картофель</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Свекла кормовая')) ? 'active' : '' ?>">
			<span>Свекла кормовая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Турнепс')) ? 'active' : '' ?>">
			<span>Турнепс</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Морковь кормовая')) ? 'active' : '' ?>">
			<span>Морковь кормовая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Брюква')) ? 'active' : '' ?>">
			<span>Брюква</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Морковь столовая')) ? 'active' : '' ?>">
			<span>Морковь столовая</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Капуста белокочанная')) ? 'active' : '' ?>">
			<span>Капуста белокочанная</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Помидоры (плоды)')) ? 'active' : '' ?>">
			<span>Помидоры (плоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Огурцы')) ? 'active' : '' ?>">
			<span>Огурцы</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Лук')) ? 'active' : '' ?>">
			<span>Лук</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Плодовые и ягодные культуры (плоды, ягоды)')) ? 'active' : '' ?>">
			<span>Плодовые и ягодные культуры (плоды, ягоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Виноград (ягоды)')) ? 'active' : '' ?>">
			<span>Виноград (ягоды)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Чай (лист сухое вещество)')) ? 'active' : '' ?>">
			<span>Чай (лист сухое вещество)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Кукуруза на силос (надземная масса)')) ? 'active' : '' ?>">
			<span>Кукуруза на силос (надземная масса)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Клевер (сено)')) ? 'active' : '' ?>">
			<span>Клевер (сено)</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Люцерна')) ? 'active' : '' ?>">
			<span>Люцерна</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Тимофеевка')) ? 'active' : '' ?>">
			<span>Тимофеевка</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Вика')) ? 'active' : '' ?>">
			<span>Вика</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Естественные сенокосы')) ? 'active' : '' ?>">
			<span>Естественные сенокосы</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Озимый ячмень')) ? 'active' : '' ?>">
			<span>Озимый ячмень</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Яровой рапс')) ? 'active' : '' ?>">
			<span>Яровой рапс</span>
		</label>
		<label class="crop_item <?=(stristr($this->Common->get_anketa($user_id,'Предыдущая'), 'Яровая рожь')) ? 'active' : '' ?>">
			<span>Яровая рожь</span>
		</label>
	</div>
	<a class="more_btn orange_btn crop_btn" href="javascript:;">Принять</a>
</div>