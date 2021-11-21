<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<?php echo $this->element('cabinet_sidebar') ?>
			<div class="cabinet_content">
				<div class="cab-area">
					<div class="cab_content_head">Чат с администратором</div>
					<div class="cab_content_body">
						<div class="chat">
							<div class="chat_body">
								<?php foreach($messages as $item): ?>
								<div class="chat_item chat_item_<?=($item['User']['role'] == 'user') ? 'left': 'right'?>">
									<div class="chat_item_top">
										<div class="chat_item_name"><?=$item['User']['fio']?></div>
										<div class="chat_item_date"><?php echo $this->Time->format($item['Dialog']['created'], '%d.%m.%Y', '-'); ?></div>
									</div>
									<div class="chat_item_text">
										<p><?=$item['Message']['body']?></p>
									</div>
								</div>
								<?php endforeach ?>
							</div>
							<form class="chat_bottom" action="/<?=$lang?>dialogs/add_message" method="POST">
								
								<!-- <input  type="text" name=""> -->
								<textarea name="data[Dialog][body]" class="chat_message" rows="1" cols="5"></textarea>
								<input type="hidden" value="<?=$user_id?>" name="data[Dialog][user_id]">
								<input type="hidden" value="<?=$id?>" name="data[Dialog][id]">
								<button class="chat_send_btn" type="submit"></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>