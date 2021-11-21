<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<div class="cabinet_sidebar">
				<a class="cabinet_sidebar_link" href="javascript:;">Мои заказы</a>
				<a class="cabinet_sidebar_link" href="cabinet_profile.html">Профиль</a>
				<a class="cabinet_sidebar_link active" href="javascript:;">Чат с администратором</a>
				<a class="cabinet_sidebar_link" href="cabinet_media.html">Медиатека</a>
				<a class="cabinet_sidebar_link" href="cabinet_subscribe.html">Подписка на новости</a>
			</div>
			<div class="cabinet_content">
				<div class="cab_content_head">Чат с администратором</div>
				<div class="cab_content_body">
					<div class="chat">
						<div class="chat_body">
							<div class="chat_item chat_item_left">
								<div class="chat_item_top">
									<div class="chat_item_name">Сабыров Диас Арсенович</div>
									<div class="chat_item_date">26.09.2020</div>
								</div>
								<div class="chat_item_text">
									<p>Здравствуйте, как я могу отследить статус своего заказа?</p>
								</div>
							</div>
							<div class="chat_item chat_item_right">
								<div class="chat_item_top">
									<div class="chat_item_name">Администратор</div>
									<div class="chat_item_date">26.09.2020</div>
								</div>
								<div class="chat_item_text">
									<p>Здравствуйте, Вам нужно перейти во вкладку “Мои заказы”.</p>
								</div>
							</div>
						</div>
						<form class="chat_bottom" action="/<?=$lang?>messages/add_message" method="POST">
							<!-- <label class="chat_file" for="file_input">
								<input id="file_input" type="file" name="" style="display: none;">
							</label> -->
							<input  type="hidden" name="data[Message][user_id]" value="<?=$user_id?>">
							<textarea name="data[Message][body]" class="chat_message" rows="1" cols="5"></textarea>
							<button class="chat_send_btn" type="submit"></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>