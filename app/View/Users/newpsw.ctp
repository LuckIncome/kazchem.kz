<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<?php echo $this->element('cabinet_sidebar') ?>
			<div class="cabinet_content profile_content">
				<div class="profile_main">
					<div class="cab_content_head">Создание нового пароля</div>
					
					
					<div class="cab_content_body">
					

						 <form class="anketa_form" action="/users/changepsw" method="post" style="margin-top: 0;">
							
							<div class="input_block pass_input_block full_input">
								<div class="input_name">Новый пароль:</div>
								<input class="form_input" type="password" name="data[User][password]">
								<div class="input_err pass_err"></div>
								<div class="pass_eye"></div>
							</div>
							<div class="input_block pass_input_block full_input">
								<div class="input_name">Повтор пароля:</div>
								<input class="form_input" type="password" name="data[User][password_retype]">
								<div class="input_err pass_err"></div>
								<div class="pass_eye"></div>
							</div> 
							<div class="input_block">
							<input type="hidden" name="data[User][id]" value="<?=$id?>">
								<button class="yellow_btn form_btn more_btn" type="submit">Редактировать пароль</button>
							</div>
						</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>


