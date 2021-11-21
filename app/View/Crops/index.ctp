<section class="page page_heading">
	<img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
	<div class="container">
		<div class="title">Платные услуги Центра Судебных Экспертиз</div>
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><a>Деятельность</a></li>
			<li><a>Платные услуги Центра Судебных Экспертиз</a></li>
		</ul>
	</div>
</section>

<section class="page_section">
	<div class="container">
		<div class="page_block">
			<div class="page_content">
				<div class="title small_title">Нормативно-правовая база обеспечения деятельности по производству судебных экспертиз</div>
				<div class="npa_list">
					<?php foreach($data as $item): ?>
                        <div class="npa_list_item">
							<a class="npa_list_link" href="/files/npaprojects/<?php
								if($l != 'ru' ){
									echo $item['Npaproject']['doc_'.$l];
								}else{
									echo $item['Npaproject']['doc'];
								}
							?>" download><?=$item['Npaproject']['title']; ?></a>
						</div>
                    <?php endforeach ?>
					
					
				</div>
			</div>
			<?=$this->element('sidebar');?>
		</div>
	</div>
</section>