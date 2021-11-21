<div class="cab_sidebar_block">
	<div class="cabinet_sidebar">
		<a class="cabinet_sidebar_link <?=($this->action == 'profile') ? 'active' : ''?>" href="/<?=$lang?>users/profile">Профиль</a>
		<a class="cabinet_sidebar_link <?=($this->action == 'anketa') ? 'active' : ''?>" href="/<?=$lang?>users/anketa">Анкета</a>
		<a class="cabinet_sidebar_link <?=($controller == 'vagons' && $_SERVER['REQUEST_URI'] != '/vagons/archive') ? 'active' : ''?>" href="/<?=$lang?>vagons">Отслеживание грузов</a>
		<a class="cabinet_sidebar_link <?=($this->action == 'archive') ? 'active' : ''?>" href="/<?=$lang?>vagons/archive">Архив</a>
		<a class="cabinet_sidebar_link <?=($this->action == 'my_orders') ? 'active' : ''?>" href="/<?=$lang?>users/my_orders">Мои заказы</a>
		<a class="cabinet_sidebar_link <?=($controller == 'docs') ? 'active' : ''?>" href="/<?=$lang?>docs">Мои документы</a>
		<a class="cabinet_sidebar_link <?=($controller == 'videos') ? 'active' : ''?>" href="/<?=$lang?>videos">Мои видеозаписи</a>
		<a class="cabinet_sidebar_link <?=($controller == 'seminars') ? 'active' : ''?>" href="/<?=$lang?>seminars">Семинары</a>
		<a class="cabinet_sidebar_link <?=($controller == 'dialogs') ? 'active' : ''?>" href="/<?=$lang?>dialogs/add">Чат с администратором</a>
		<!-- <a class="cabinet_sidebar_link" href="/<?=$lang?>news/subscribe">Подписка на новости</a> -->
		<a class="cabinet_sidebar_link" href="/users/logout">Выход</a>
	</div>
</div>
