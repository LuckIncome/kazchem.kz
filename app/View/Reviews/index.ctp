<section class="page">
	<div class="container">
		<ul class="breadcrumbs breadcrumbs_center">
			<li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
			<li><a><?=__('Отзывы')?></a></li>
		</ul>
		<div class="title hidden"><?=__('Отзывы')?></div>

		<div class="comment_block">
			<div class="comment_text">
				<div class="comment_slider">
					<?php foreach($data as $item): ?>
					<div>
						<div class="comment_item">
							<div class="comment_head">
								<div class="comment_name"><?=$item['Review']['company']?></div>
								<div class="text_item">
									<p><?=$item['Review']['name']?></p>
								</div>
								<!-- <div class="comment_rating">
									<img src="img/stars.png" alt="">
								</div> -->
							</div>
							<div class="text_item">
								<?=$item['Review']['body']?>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
				<div class="comment_control">
					<div class="comment_arrows"></div>
					<div class="comment_dots"></div>
				</div>
			</div>
			<div class="comment_video_block">
				<div class="comment_video_slider">
					<?php foreach($data as $item): ?>
					<div>
						<div class="comment_video">
							<a class="comment_video_img" data-fancybox  style="background-image: url(/img/reviews/<?=$item['Review']['img']?>);" data-fancybox href="<?=$item['Review']['youtube']?>"></a>
							<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/44Wjhelb-5I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			<div class="comment_img">
				<img src="/img/comment_img.png" alt="">
			</div>
		</div>
	</div>

	<div class="popup video_popup" id="video_popup_id">
		<iframe width="560" height="315" src="https://www.youtube.com/embed/44Wjhelb-5I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>

	<div class="leaf leaf_1"></div>
	<div class="leaf leaf_2"></div>
	<div class="leaf leaf_3"></div>
</section>