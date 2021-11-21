<section class="page agro_section">
	<div class="container">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><a>Услуги</a></li>
			<li><a>Агроконсалтинг</a></li>
		</ul>
		<div class="agro delivery_block agro_page">
			<div class="agro_text_block">
				<div class="main_slide delivery_slide">
					<?=$this->Common->get_element(25);?>
					<a class="more_btn orange_btn" data-fancybox data-src="#zayavka" href="javascript:;">Оставить заявку</a>
				</div> 
			</div>
			<div class="agro_img_block way">
				<div class="main_img_dots">
					<svg class="circle_svg" width="100" height="100" viewBox="0 0 100 100">
					  <defs>
					    <linearGradient id="grad1" x1="1" y2="1">
					      <stop offset="0%" stop-color="#FF7A00"></stop>
					      <stop offset="10%" stop-color="#ff7a007d"></stop>
					    <stop offset="50%" stop-color="#ff7a0000"></stop></linearGradient>
					  </defs>
					  <circle class="circle_gradient" cx="50" cy="50" r="45" fill="none" stroke="url(#grad1)" stroke-width="2"></circle>
					</svg>
				</div>
				<div class="main_img_silder">
					<div>
						<div class="main_img_item" style="background-image: url('/img/agro_bg.png');"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="serv_block">
			<?=$this->Common->get_element(26);?>
		</div>
	</div>
	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
</section>
<div class="page_down"></div>
<div class="page_up"></div>
<section>
	<div class="container">
		<div class="agro_club_line container"></div>
		<div class="agro_club">
			<?=$this->Common->get_element(27);?>
		</div>
	</div>
</section>
<div style="display: none;" id="zayavka">
	<div class="popup-form">
		<span class="popup-form__heading">
			Оставить заявку
		</span>		
		<form method="POST" action="/requests/agroconsulting">
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
	        <div class="popup-row">
	        	<label>Ваш вопрос:</label>
	            <!-- <input placeholder="Введите свой вопрос" type="text" name="" required=""> -->
	            <textarea placeholder="Введите свой вопрос" rows="5" required="" name="data[Request][question]"></textarea>
	        </div>
	        <input type="hidden" name="data[Request][page]" value="Агроконсалтинг">
	        <button class="popup-sbt" type="submit">Отправить</button>
	    </form>    
	</div>	
</div>