<section class="page">
	<div class="container">
		<div class="cabinet_title title">Личный кабинет</div>
		<div class="cabinet">
			<?php echo $this->element('cabinet_sidebar') ?>
			<div class="cabinet_content profile_content">
				<div class="profile_main">
					<div class="cab_content_head">Редактирование профиля</div>
					<div class="cab_content_body">
						<?php echo $this->Form->create('User', array('type' => 'file', 'class' => 'edit-form'));?>
							<div class="profile_img_edit">
								<div class="prodile_img">
									<?php if($data['User']['img']): ?>
										<img src="/img/users/<?=$data['User']['img']?>" alt="">
									<?php else: ?>
										<img src="/img/profile_img.png" alt="">
									<?php endif ?>
								</div>
								<label class="profile_img_label orange_btn" for="profile_file">Изменить фото</label>
								<input id="profile_file" type="file" name="data[User][img]" style="display: none;">
							</div>
							<div class="edit-form__right">
								<div class="input_block">
									<div class="input_name">ФИО:</div>
									<input class="form_input" type="text" name="data[User][fio]" value="<?=$data['User']['fio']?>">
								</div>
								<div class="input_block">
									<div class="input_name">Название компании:</div>
									<input class="form_input" type="text" name="data[User][company]"  value="<?=$data['User']['company']?>">
								</div>
								<div class="input_block">
									<div class="input_name">Контактный телефон:</div>
									<input class="form_input" type="tel" name="data[User][username]" value="<?=$data['User']['username']?>">
								</div>
								<div class="input_block">
									<div class="input_name">Электронная почта:</div>
									<input class="form_input" type="email" name="data[User][email]" value="<?=$data['User']['email']?>">
								</div>
								<div class="input_block">
									<div class="input_name">Регион:</div>
									<select class="form_select" id="profile_reg_region" name="data[User][area_id]" required="">
										<option value="0" selected="" disabled="">Выберите область</option>
<?php foreach($areas as $item): ?>
<option value="<?=$item['Area']['id']?>" <?=($data['User']['area_id'] == $item['Area']['id']) ? 'selected' : ''?>><?=$item['Area']['title_'.$l]?></option>
<?php endforeach ?>
									</select>
								</div>
								<div class="input_block">
									<button class="yellow_btn form_btn more_btn" type="submit">Сохранить изменения</button>
								</div>
							</div>	
						</form>
						<?php 
							#echo $this->Form->create('User', array('class' => 'anketa_form') );
							#echo $this->Form->input('username', array('label' => 'Логин', 'class' => 'form_input'));
							#echo $this->Form->input('password', array('label' => 'Пароль', 'type'=>'password', 'value'=>'', 'autocomplete'=>'off', 'class' => 'form_input'));
							#echo $this->Form->input('password_repeat', array('label' => 'Повтор пароля', 'type'=>'password', 'value'=>'', 'autocomplete'=>'off', 'class' => 'form_input', 'required' => false));
							#echo $this->Form->end('Редактировать' );
						?>
					</div>
					
					<div class="cab_content_head" id="psw_edit">Редактирование пароля</div>
					<div class="cab_content_body">
						 <form class="anketa_form pass_edit_form" action="/users/pswedit" method="post" style="margin-top: 0;">
							<div class="input_block pass_input_block full_input">
								<div class="input_name">Текущий пароль:</div>
								<input class="form_input" type="password" name="data[User][current_password]">
								<div class="input_err pass_err"></div>
								<div class="pass_eye"></div>
							</div>
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


