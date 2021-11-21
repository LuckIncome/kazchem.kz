<div class="content">
	<section class="content-header">
	  <div class="container-fluid">
	    <div class="row mb-2">
	      <div class="col-sm-6">
	        <h1>Заказ с корзины</h1>
	      </div>
	    </div>
	  </div><!-- /.container-fluid -->
	</section>
	<div class="designer-part clearfix">
		<div class="card card-primary">
			<div class="card-header">Данные</div>
			<div class="card-body">
				<p><strong>Имя:</strong> <?=$data['Basket']['name']?></p> <p><strong>Телефон:</strong> <?=$data['Basket']['phone']?></p>
				<p><strong>E-mail:</strong> <?=$data['Basket']['email']?></p>
				
				<p><strong>Адрес:</strong> <?=$data['Basket']['address']?></p>
				<!-- <p><strong>Комментарий к заказу:</strong> <?=$data['Basket']['comments']?></p> -->
				<?php
				echo $data['Basket']['senddata'];
				?>
				<!-- <div class="design-text">
					<div class="design-text__top">
						Дизайнер: <span>Queensbee</span>
					</div>
					<div class="design-text__info">
						<?//=$data['Designer']['body']?>
					</div>
					
				</div> -->
				<div class="admin_add">
					<div style="margin-bottom:15px;" class="admin-table">
						<?php echo $this->Form->create('Basket', array('type' => 'file'));?>
					</div>
					<p style="margin-bottom:5px;"><b>Статус:</b></p>	
					<select style="margin-bottom:12px" name="data[Basket][status]">
						<option value="На модерации">На модерации</option>
						<option value="В работе">В работе</option>
						<option value="Выполнено">Выполнено</option>
					</select>
					<?php echo $this->Form->input('kp', array('label' => 'Коммерческое предложение: ', 'type' => 'file'));
					?>
					<div class="edit_bot">
						<div class="bot_r bottom-zakas">
						<?
						echo $this->Form->input('id');
						echo $this->Form->end('Сохранить');
						?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
<style>
	.bottom-zakas input{
		display: inline-block;
	    font-weight: 400;
	    color: #212529;
	    text-align: center;
	    vertical-align: middle;
	    cursor: pointer;
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
	    background-color: transparent;
	    border: 1px solid transparent;
	    padding: 0.375rem 0.75rem;
	    font-size: 1rem;
	    line-height: 1.5;
	    border-radius: 0.25rem;
	    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	    color: #ffffff;
	    background-color: #28a745;
	    border-color: #28a745;
	    box-shadow: none;
	}
	.admin-table td{
		padding:5px;
	}
</style>	