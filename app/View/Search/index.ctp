<section class="page">
    <div class="container">
        <!-- <div class="title title_border__bottom blue_border">Присвоение разрядов и званий</div> -->

        <ul class="breadcrumbs">
            <li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
            <li><a><?=__('Поиск')?></a></li>
        </ul>
        <h1><?=__('Результаты поиска')?></h1>
        <ul class="search-list">
	       
	        <?php foreach($res['News'] as $item): ?>
	            <li><a href="/<?=$lang?>news/view/<?=$item['i18n']['foreign_key']?>" class="news-item-second__title">
	                    <?= $this->Text->truncate(strip_tags($item['i18n']['content']), 125, array('ellipsis' => '...', 'exact' => true)) ?>
	            </a></li>
	        <?php endforeach ?>
	       
		</ul>
        <?php if(!$res['News'] ): ?>
            <p><?=__('К сожалению по вашему запросу ничего не найдено...')?></p>
        <?php endif ?>
    </div>
</section>