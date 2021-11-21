<section class="page">
    <div class="container">
        <div class="cabinet_title title">Личный кабинет</div>
        <div class="cabinet">
            <?php echo $this->element('cabinet_sidebar') ?>
            <div class="cabinet_content profile_content">
                <div class="profile_main cabinet_content">
                    <div class="cab_content_head">Добавить на отслеживание</div>
                    <div class="cab_content_body">
                        
                    </div>
                </div>
                
                <div class="profile_anketa cab_content_body">
                   
                    <form class="anketa_form" action="/<?=$lang?>vagons/add" method="POST">
                        <div class="input_block">
                            <div class="input_name">Номер вагона</div>
                            <input class="form_input" type="text" name="data[Vagon][vagon]">
                            <input class="form_input" type="hidden" name="data[Vagon][user_id]" value="<?=$user_data['id']?>">
                        </div>
                        

                        <button class="yellow_btn form_btn anketa_btn" type="submit">Добавить</button>
                    </form>
                </div>

                <!-- <div class="cab_content_body">

                </div> -->
            </div>
        </div>
    </div>
</section>