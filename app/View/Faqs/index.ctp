<section class="page page_heading">
  <img class="page_heading_img" src="/img/page_heading.jpg" alt=""></img>
  <div class="container">
    <div class="title"><?=__('Часто задаваемые вопросы')?></div>
    <ul class="breadcrumbs">
      <li><a href="/"><?=__('Главная')?></a></li>
      <li><a><?=__('Гражданам')?></a></li>
      <li><a><?=__('Часто задаваемые вопросы')?></a></li>
    </ul>
  </div>
</section>
<section>
  <div class="container">
      <div class="title "><?=__('Часто задаваемые вопросы')?></div>
    <div class="faq">

      <?php foreach($faqs as $item): ?>
        <div class="faq_item">
          <div class="faq_question"><?=$item['Faq']['question']?><div class="faq_quest_icon"></div></div>
          <div class="faq_answer">
            <p><?=$item['Faq']['answer']?> </p>
          </div>
        </div>
      <?php endforeach ?>

      
    </div>
    <?=$this->element('partners');?>
  </div>
</section>