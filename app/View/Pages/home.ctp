<section class="main_section page">
	<div class="container">
		<div class="main_block agro">
			<div class="agro_text_block">
				<div class="agro_text_slider way">
					<?php foreach($slides as $item): ?>
					<div>
						<div class="main_slide agro_slide">
							<div class="title"><?=$item['Slide']['title']?></div>
							<div class="main_text">
								<?=$item['Slide']['body']?>
							</div>
							<div class="main_buttons">
								<a class="main_btn orange_btn" href="<?=$item['Slide']['link']?>"><?=__('Подробнее')?><span></span></a>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<div class="agro_arrows"></div>
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
					<?php foreach($slides as $item): ?>
					<div>
						<div class="main_img_item" style="background-image: url(/img/slides/<?=$item['Slide']['img']?>);">
							<!-- <div class="main_slide_img">
								<img src="img/slider_prod.png" alt="">
							</div> -->
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<h1 style="font-size: 15px;text-align: center;color: #fff;">Минеральные удобрения в Казахстане</h1>
	</div>

	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
</section>


<!-- <section class="main_section page">
    <div class="container">
      <div class="main_text_slider way">
        <div>
          <div class="main_slide">
            <div class="title">Современные минеральные удобрения</div>
            <div class="main_text">
              <p>Мы главный поставщик самых качественных удобрений в Казахстане, впервые в Казахстане продукт высшего качества из России</p>
            </div>
            <a class="main_btn orange_btn" href="javascript:;">Подобрать удобрения</a>
          </div>
        </div>
        <div>
          <div class="main_slide">
            <div class="title">Высокое содержание действующего вещества</div>
            <div class="main_text">
              <p>Мы главный поставщик самых качественных удобрений в Казахстане, впервые в Казахстане продукт высшего качества из России</p>
            </div>
            <a class="main_btn orange_btn" href="javascript:;">Подобрать удобрения</a>
          </div>
        </div>
        <div>
          <div class="main_slide">
            <div class="title">Доставка по всему Казахстану</div>
            <div class="main_text">
              <p>Мы главный поставщик самых качественных удобрений в Казахстане, впервые в Казахстане продукт высшего качества из России</p>
            </div>
            <a class="main_btn orange_btn" href="javascript:;">Подобрать удобрения</a>
          </div>
        </div>
      </div>

      <div class="main_bottom">
        <ul class="soc_list">
          <li><a class="soc_link instagram" href="javascript:;" target="_blank"></a></li>
          <li><a class="soc_link facebook" href="javascript:;" target="_blank"></a></li>
          <li><a class="soc_link vkontakte" href="javascript:;" target="_blank"></a></li>
        </ul>
        <a class="left_icon tel" href="tel:+77010063633">+7 (701) 006-36-33</a>
        <div class="left_icon loc">г. Нур-Султан, пр-т. Мангилик Ел 52, БЦ "Noble"</div>
      </div>
    </div>
    <div class="main_img_block way">
      <div class="main_img_dots"></div>
      <div class="main_img_silder">
        <div>
          <div class="main_img_item" style="background-image: url('img/slider_bg.jpg');">
            <div class="main_slide_img">
              <img src="/img/slider_prod.png" alt="">
            </div>
          </div>
        </div>
        <div>
          <div class="main_img_item" style="background-image: url('img/slider_bg_2_1.jpg');">
            <div class="main_slide_img">
              <img src="/img/slider_prod_2.png" alt="">
            </div>
          </div>
        </div>
        <div>
          <div class="main_img_item" style="background-image: url('img/slider_bg_3_1.jpg');">
            <div class="main_slide_img">
              <img src="/img/slider_prod_3.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="leaf leaf_1"></div>
    <div class="leaf leaf_2"></div>
    <div class="leaf leaf_3"></div>
  </section> -->