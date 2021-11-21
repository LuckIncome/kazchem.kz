<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title"><?=__('История Центра')?></div>
		<ul class="breadcrumbs">
			<li><a href="index.html"><?=__('Главная')?></a></li>
			<li><a><?=__('О нас')?></a></li>
			<li><a><?=__('История Центра')?></a></li>
		</ul>
	</div>
</section>

<section class="page_section">
	<div class="container">
		<div class="page_block">
			<div class="page_content histoty_content">
				<!-- <div class="history_img">
					<img src="img/history_img.jpg" alt="">
				</div> -->
				<div class="title"><?=$about['title']?></div>
				<div class="page_text">
					<?=$about['body']?>
				</div>
				<div class="history_block_list">
					<div class="block_list_title"><?=$about['block_title']?></div>
					<ul class="block_list">
						<?=$about['block_text']?>
					</ul>
				</div>
				<?php echo $this->element('partners') ?>
			</div>
			<?=$this->element('sidebar');?>
		</div>
	</div>
</section>