<div class="page_up"></div>
<div class="page_down"></div>

<section class="page">
    <div class="container">
        <ul class="breadcrumbs breadcrumbs_center">
            <li><a href="/<?=$lang?>"><?=__('Главная')?></a></li>
            <li><a><?=__('Вакансии')?></a></li>
        </ul>
        <div class="title hidden"><?=__('Вакансии')?></div>

        <div class="vakancy_advan">
            <div class="vakancy_advan_item way">
                <div class="vakancy_advan_img">
                    <img src="img/vakancy_advan_1.svg" alt="">
                </div>
                <div class="vakancy_advan_text">
                    <p>Официальное трудоустройство и оформление согласно ТК РК</p>
                </div>
            </div>
            <div class="vakancy_advan_item way">
                <div class="vakancy_advan_img">
                    <img src="img/vakancy_advan_2.svg" alt="">
                </div>
                <div class="vakancy_advan_text">
                    <p>Возможность получить опыт работы в крупной компании</p>
                </div>
            </div>
            <div class="vakancy_advan_item way">
                <div class="vakancy_advan_img">
                    <img src="img/vakancy_advan_3.svg" alt="">
                </div>
                <div class="vakancy_advan_text">
                    <p>Своевременная оплата труда</p>
                </div>
            </div>
            <div class="vakancy_advan_item way">
                <div class="vakancy_advan_img">
                    <img src="img/vakancy_advan_4.svg" alt="">
                </div>
                <div class="vakancy_advan_text">
                    <p>Ежегодный оплачиваемый отпуск</p>
                </div>
            </div>
            <div class="vakancy_advan_item way">
                <div class="vakancy_advan_img">
                    <img src="img/vakancy_advan_5.svg" alt="">
                </div>
                <div class="vakancy_advan_text">
                    <p>Обучение и развитие в отрасли  сельского хозяйства</p>
                </div>
            </div>
        </div>

        <div class="vakancy_sel_block">
            <div class="vakancy_sel_name"><?=__('Выберите город')?>:</div>
            <select class="vakancy_select">
                <?php foreach($cities as $item): ?>
                <option data-id="<?=$item['City']['id']?>"><?=($item['City']['title_'.$l]) ? $item['City']['title_'.$l] : $item['City']['title_ru']?></option>
                <?php endforeach ?>
                
            </select>
        </div>
        
        <div class="vakancy_list">
            <?php foreach($cities as $item): ?>
            <div class="table_block" data-table-id="<?=$item['City']['id']?>">
                <!-- <p>Вакансии по г. Нур-Султан</p> -->
                <table>
                    <thead>
                        <tr>
                            <th><?=__('Название')?></th>
                            <th><?=__('Описания')?></th>
                            <th><?=__('Требования')?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $v): ?>
                        <?php if($item['City']['id'] == $v['Vacancy']['city_id']): ?>
                        <tr>
                            <td><?=$v['Vacancy']['title']?></td>
                            <td><?=$v['Vacancy']['body']?></td>
                            <td><?=$v['Vacancy']['requirement']?></td>
                        </tr>
                        <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php endforeach ?>
            
        </div>

        
       

        <div class="page_form_block">
            <div class="form_title"><?=__('Заявка на вакансию')?></div>
            <form class="page_form" enctype="multipart/form-data"  action="/vacancies/send" method="POST">
                <div class="input_block">
                    <div class="input_name"><?=__('ФИО')?></div>
                    <input placeholder="Введите ФИО" class="form_input" type="text" name="data[Vacancy][name]" required>
                </div>
                <div class="input_block">
                    <div class="input_name"><?=__('Вакансия')?></div>
                    <input class="form_input" type="text" name="data[Vacancy][vacancy]" placeholder="Название вакансии">

                    <!-- <select class="form_select" name="data[Vacancy][vacancy]">
                        <option value="0" selected disabled><?=__('Выберите вакансию')?></option>
                        <option value="Агроном"><?=__('Агроном')?></option>
                        <option value="Главный агроном"><?=__('Главный агроном')?></option>
                    </select> -->
                </div>
                <div class="input_block">
                    <div class="input_name"><?=__('Контактный телефон')?></div>
                    <input placeholder="+7(__)__ __ __" class="form_input" type="tel" name="data[Vacancy][phone]" required>
                </div>
                <div class="input_block">
                    <div class="input_name"><?=__('Электронная почта')?></div>
                    <input placeholder="Введите почту" class="form_input" type="email" name="data[Vacancy][email]" required>
                </div>
                <div class="input_block">
                    <label class="file_label" for="vakancy_file">
                        <div class="file_name"><?=__('Прикрепить резюме')?></div>
                        <div class="file_icon"></div>
                    </label>
                    <input class="file_input" type="file" id="vakancy_file" name="data[Vacancy][file]">
                </div>
                <div class="input_block">
                    <button class="form_btn orange_btn" type="submit"><?=__('Откликнуться')?></button>
                </div>
            </form>
        </div>
    </div>

    <div class="leaf leaf_1"></div>
    <div class="leaf leaf_2"></div>
    <div class="leaf leaf_3"></div>
</section>