<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<?php echo $this->element('cabinet_sidebar') ?>
			<div class="cabinet_content profile_content">
				<div class="profile_main">
					<div class="cab_content_head">Мои персональные данные</div>
					<div class="cab_content_body">
						<div class="profile">
							<div class="prodile_img">
								<?php if($data['User']['img']): ?>
										<img src="/img/users/<?=$data['User']['img']?>" alt="">
									<?php else: ?>
										<img src="/img/profile_img.png" alt="">
									<?php endif ?>
							</div>
							<div class="profile_info">
								<div class="profile_info_row">
									<div class="input_name">ФИО</div>
									<div class="profile_info_text"><?=$data['User']['fio']?></div>
								</div>
								<div class="profile_info_row">
									<div class="input_name">Название компании</div>
									<div class="profile_info_text"><?=$data['User']['company']?></div>
								</div>
								<div class="profile_info_row">
									<div class="input_name">Контактный телефон</div>
									<div class="profile_info_text"><?=$data['User']['phone']?></div>
								</div>
								<div class="profile_info_row">
									<div class="input_name">Электронная почта</div>
									<div class="profile_info_text"><?=$data['User']['email']?></div>
								</div>
								
								<?php if(isset($data['Area']) && !empty($data['Area'])): ?>
								<div class="profile_info_row">
									<div class="input_name">Регион:</div>
									<div class="profile_info_text"><?=$data['Area']['title_'.$l]?></div>
								</div>
								<?php endif ?>
								<a class="orange_btn more_btn" href="/users/edit">Редактировать профиль</a>
							</div>
						</div>
					</div>
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
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Кукуруза') ? 'active' : '' ?>">
			<span>Кукуруза</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Просо') ? 'active' : '' ?>">
			<span>Просо</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Гречиха') ? 'active' : '' ?>">
			<span>Гречиха</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Горох') ? 'active' : '' ?>">
			<span>Горох</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Вика') ? 'active' : '' ?>">
			<span>Вика</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Люпин') ? 'active' : '' ?>">
			<span>Люпин</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Соя') ? 'active' : '' ?>">
			<span>Соя</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Подсолнечник') ? 'active' : '' ?>">
			<span>Подсолнечник</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимый рапс') ? 'active' : '' ?>">
			<span>Озимый рапс</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Горчица белая') ? 'active' : '' ?>">
			<span>Горчица белая</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Клещевина') ? 'active' : '' ?>">
			<span>Клещевина</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Лен-долгунец') ? 'active' : '' ?>">
			<span>Лен-долгунец</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Хлопчатник') ? 'active' : '' ?>">
			<span>Хлопчатник</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Лен-долгунец (волокно)') ? 'active' : '' ?>">
			<span>Лен-долгунец (волокно)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Конопля') ? 'active' : '' ?>">
			<span>Конопля</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Свекла сахарная (корнеплоды)') ? 'active' : '' ?>">
			<span>Свекла сахарная (корнеплоды)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Картофель') ? 'active' : '' ?>">
			<span>Картофель</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Свекла кормовая') ? 'active' : '' ?>">
			<span>Свекла кормовая</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Турнепс') ? 'active' : '' ?>">
			<span>Турнепс</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Морковь кормовая') ? 'active' : '' ?>">
			<span>Морковь кормовая</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Брюква') ? 'active' : '' ?>">
			<span>Брюква</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Морковь столовая') ? 'active' : '' ?>">
			<span>Морковь столовая</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Капуста белокочанная') ? 'active' : '' ?>">
			<span>Капуста белокочанная</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Помидоры (плоды)') ? 'active' : '' ?>">
			<span>Помидоры (плоды)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Огурцы') ? 'active' : '' ?>">
			<span>Огурцы</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Лук') ? 'active' : '' ?>">
			<span>Лук</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Плодовые и ягодные культуры (плоды, ягоды)') ? 'active' : '' ?>">
			<span>Плодовые и ягодные культуры (плоды, ягоды)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Виноград (ягоды)') ? 'active' : '' ?>">
			<span>Виноград (ягоды)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Чай (лист сухое вещество)') ? 'active' : '' ?>">
			<span>Чай (лист сухое вещество)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Кукуруза на силос (надземная масса)') ? 'active' : '' ?>">
			<span>Кукуруза на силос (надземная масса)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Клевер (сено)') ? 'active' : '' ?>">
			<span>Клевер (сено)</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Люцерна') ? 'active' : '' ?>">
			<span>Люцерна</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Тимофеевка') ? 'active' : '' ?>">
			<span>Тимофеевка</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Вика') ? 'active' : '' ?>">
			<span>Вика</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Естественные сенокосы') ? 'active' : '' ?>">
			<span>Естественные сенокосы</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Озимый ячмень') ? 'active' : '' ?>">
			<span>Озимый ячмень</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Яровой рапс') ? 'active' : '' ?>">
			<span>Яровой рапс</span>
		</label>
		<label class="crop_item <?=($this->Common->get_anketa($user_id,'Засеваемая') == 'Яровая рожь') ? 'active' : '' ?>">
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