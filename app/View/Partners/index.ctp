<section class="page">
	<div class="container">
		<ul class="breadcrumbs breadcrumbs_center">
			<li><a href="/">Главная</a></li>
			<li><a>Партнеры</a></li>
		</ul>
		<div class="title hidden">Партнеры</div>

		<div class="partner_list">
			<?php foreach ($partners as $item):?>
				<div class="part_item">
					<div class="part_img">
						<img src="/img/partners/<?=$item['Partner']['img'] ?>" alt="">
						<div class="part_img_line"></div>						
					</div>
					<div class="part_text">
						<div class="part_name"><?=$item['Partner']['title'] ?></div>
						<div class="text_item">
							<?=$item['Partner']['body'] ?>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
		<div class="page_down"></div>
		<div class="page_up"></div>
		<div class="title title--bot">Стать партнером</div>
		<div class="page_form_block">			
			<form class="page_form partner_form" method="POST" action="/partners/send">
				<div class="input_block">
					<div class="input_name">ФИО</div>
					<input placeholder="Введите ФИО" class="form_input" type="text" name="data[Partner][name]"  required>
				</div>
				<div class="input_block">
					<div class="input_name">Название компании</div>
					<input placeholder="Введите Название компании" class="form_input" type="text" name="data[Partner][company]" required>
				</div>
				<div class="input_block">
					<div class="input_name">Контактный телефон</div>
					<input placeholder="Введите конатктный телефон" class="form_input" type="tel" name="data[Partner][phone]" required>
				</div>
				<div class="input_block">
					<div class="input_name">Электронная почта</div>
					<input placeholder="Введите электронную почту" class="form_input" type="email" name="data[Partner][email]"  required>
				</div>
				<div class="input_block input_block_text">
					<!-- <label class="file_label" for="vakancy_file">
						<div class="file_name">Прикрепить резюме</div>
						<div class="file_icon"></div>
					</label> -->
					<!-- <input class="file_input" type="file" id="vakancy_file" name="" required> -->
					<div class="input_name">Ваше сообщение</div>
					<textarea class="form_input" rows="1" cols="3"  name="data[Partner][message]"  placeholder="Введите ваше сообщение"></textarea>
				</div>
				<div class="input_block">
					<button class="form_btn orange_btn" type="submit">Стать партнером</button>
				</div>
			</form>
		</div>
	</div>

	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
	<div class="leaf leaf_4"></div>
	</section>