<section class="page">
	<div class="container">
		<div class="about">
			<div class="about_link_list">
				<a class="about_link active" href="javascript:;">О компании</a>
				<a class="about_link" href="/partners">Наши партнеры</a>
				<a class="about_link" href="/reviews">Отзывы</a>
				<a class="about_link" href="/vacancies">Вакансии</a>
				<a class="about_link" href="/contacts">Контакты</a>
			</div>
			<div class="about_text">
				<div class="about_text_top">
					<p>«KAZCHEM» – это международная торгово-производственная компания, созданная для обеспечения фермеров Казахстана высококачественными минеральными удобрениями.</p>
				</div>
				<div class="about_text_bottom text_item">
					<p>Качество заявленной продукции позволяет обеспечить сельхозтоваропроизводителям долгосрочное и наиболее эффективное питание для всех выращиваемых культур орошаемого и богарного земледелия. </p>
					<p>«KAZCHEM» аккредитована в информационной системе «QOLDAU.KZ», которая позволяет фермерам по всему Казахстану, покупать удобрения и возместить часть затрат за счет государственных средств по программе субсидирования минеральных удобрений.</p>
				</div>
			</div>
			<div class="about_img">
				<img src="/img/about_img.png" alt="">
			</div>
		</div>
	</div>
</section>
<section class="gray">
	<div class="container">		
		<div class="title" style="margin-bottom:35px;">Наша деятельность</div>
		<div class="activity">
			<div class="activ_item">
				<div class="active_img">
					<img src="/img/fertilizer_company.jpg" alt="">
				</div>
				<div class="activity_text">
					<div class="activ_name">Производство удобрений</div>
					<div class="text_item">
						<p>В ассортименте компании представлены основные виды азотных, фосфорных и калийных удобрений ведущих заводов России, такие как: «ФосАгро», «УралХим», «ЕвроХим» и «КуйбышевАзот».</p>
						<a class="text-item__btn" href="/products">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="activ_item">
				<div class="active_img">
					<img src="/img/company_delivery.jpg" alt="">
				</div>
				<div class="activity_text">
					<div class="activ_name">Поставка импортных удобрений</div>
					<div class="text_item">
						<p>Продукция компании представлена на складах во всех крупных агропромышленных регионах Казахстана. Для удобства покупателей отгрузки товаров осуществляются круглый год. Кроме того, в целях экономии времени и денег клиентов, мы сразу можем доставить удобрения на ваше поле.</p>
						<a class="text-item__btn" href="/services/transportation">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="activ_item">
				<div class="active_img">
					<img src="/img/company_agro.jpg" alt="">
				</div>
				<div class="activity_text">
					<div class="activ_name">Агроконсалтинг</div>
					<div class="text_item">
						<p>Агрослужба КAZCHEM оказывает комплекс профессиональных консалтинговых услуг, которые помогают фермерам по всему Казахстану повысить урожайность выращиваемых культу</p>
						<a class="text-item__btn" href="/services/agroconsulting">Подробнее</a>
					</div>
				</div>
			</div>
			<div class="activ_item">
				<div class="active_img">
					<img src="/img/subsid-company.jpg" alt="">
				</div>
				<div class="activity_text">
					<div class="activ_name">Субсидирование</div>
					<div class="text_item">
						<p>В ассортименте компании представлены основные виды азотных, фосфорных и калийных удобрений ведущих заводов России, такие как: «ФосАгро», «УралХим», «ЕвроХим» и «КуйбышевАзот».</p>
						<a class="text-item__btn" href="/products">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="small_title center">Наша команда</div>
		<div class="team_slider">
			<?php foreach($teams as $item): ?>
				<div>
					<div class="team_item">
						<div class="team_img">
							<img src="/img/teams/<?=$item['Team']['img']?>" alt="">
						</div>
						<div class="team_name"><?=$item['Team']['title']?></div>
						<div class="team_position"><?=$item['Team']['position']?></div>
						<?php 
							$array = array("+"," ");
							$phone = str_replace($array, "", trim($item['Team']['phone']));
						?>
						<a class="team_phone" href="https://wa.me/<?=$phone?>"><?=$item['Team']['phone']?></a>
						<a class="team_mail" href="mailto:<?=$item['Team']['email']?>"><?=$item['Team']['email']?></a>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="team_slider_control">
			<div class="comment_arrows team_arrows"></div>
			<div class="comment_dots team_dots"></div>
		</div>
	</div>
</section>
<section class="gray">
	<div class="container">
		<div class="small_title center">Моя выгода</div>
		<div class="profit">
			<div class="profit_item way">
				<div class="profit_num_block">
					<div class="profit_num">1</div>
				</div>
				<div class="profit_name">Доступность</div>
				<div class="text_item">
					<p>Вся продукция KAZCHEM представлена в наличии на складах в 8-ми регионах Казахстана. Отгрузки товаров совершаются круглый год.</p>
				</div>
				<div class="profit_icon">
					<img src="/img/icons/about/warehouse.svg" alt="">
				</div>
			</div>
			<div class="profit_item way">
				<div class="profit_num_block">
					<div class="profit_num">2</div>
				</div>
				<div class="profit_name">Транспортировка</div>
				<div class="text_item">
					<p>Для удобства клиентов отгрузки товаров осуществляется круглый год, как до ж/д станции, так и до склада клиента.</p>
				</div>
				<div class="profit_icon">
					<img src="/img/icons/about/train.svg" alt="">
				</div>
			</div>
			<div class="profit_item way">
				<div class="profit_num_block">
					<div class="profit_num">3</div>
				</div>
				<div class="profit_name">Гарантия качества</div>
				<div class="text_item">
					<p>Вся продукция KAZCHEM зарегистрирована, сертифицирована и соответствует стандартам качества.</p>
				</div>
				<div class="profit_icon">
					<img src="/img/icons/about/quality.svg" alt="">
				</div>
			</div>
			<div class="profit_item way">
				<div class="profit_num_block">
					<div class="profit_num">4</div>
				</div>
				<div class="profit_name">Сопровождение</div>
				<div class="text_item">
					<p>Личный агроном-консультант для контроля качества систем земледелия.</p>
				</div>
				<div class="profit_icon">
					<img src="/img/icons/about/call-center.svg" alt="">
				</div>
			</div>
			<div class="profit_item way">
				<div class="profit_num_block">
					<div class="profit_num">5</div>
				</div>
				<div class="profit_name">Программа лояльности</div>
				<div class="text_item">
					<p>Привилегированные условия для участников клуба "KAZCHEM BAY".</p>
				</div>
				<div class="profit_icon">
					<img src="/img/icons/about/loyalty.svg" alt="">
				</div>
			</div>
		</div>
	</div>
</section>