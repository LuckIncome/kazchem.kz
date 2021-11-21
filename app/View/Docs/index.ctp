<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<?php echo $this->element('cabinet_sidebar') ?>
			<div class="cabinet_content">
				<div class="cab-area">
					<div class="cab_content_body">
						<div class="media_name"><span>Мои документы</span></div>
						<div class="media_list">
							<?php foreach($data as $item): ?>
							<a class="media_item" href="/files/docs/<?=$item['Doc']['doc_'.$l]?>" target="_blank">
								<div class="media_img">
									<img src="/img/docs/<?=$item['Doc']['img']?>" alt="">
								</div>
								<div class="media_item_name"><?=$item['Doc']['title']?></div>
								<span class="media_item__download">Скачать бесплатно</span>
							</a>
							<?php endforeach ?>
						</div>
					</div>
					<?php if($data): ?>
						<div class="pagimation">
							<?php if($paginator['start']): ?>
								<a href="<?=$paginator['link']?>1" class="p_start pag_btn "> << </a>
							<?php endif ?>

							<?php if($paginator['prev']): ?>
								<a href="<?=$paginator['link']?><?=$paginator['prev']?>" class="p_prev pag_btn"> < </a>
							<?php endif ?>
							<span class="p_pages"><?=__('Страница')?> <?=$paginator['current_page']?> <?=__('из')?> <?=$paginator['count_pages']?></span>
							<?php if($paginator['next']): ?>
								<a href="<?=$paginator['link']?><?=$paginator['next']?>" class="p_next pag_btn"> > </a>
							<?php endif ?>

							<?php if($paginator['end']): ?>
								<a href="<?=$paginator['link']?><?=$paginator['count_pages']?>" class="p_end pag_btn "> >> </a>
							<?php endif ?>
						</div>
					<?php endif ?>
				</div>
				<!-- <div class="cab-area" style="margin-top: 30px;">
					<div class="cab_content_head">Мои видеозаписи</div>
					<div class="cab_content_body">

					</div>
				</div> -->
			</div>
		</div>
	</div>
	<div class="popup video_popup" id="video_popup_id">
		<iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	</div>
</section>
