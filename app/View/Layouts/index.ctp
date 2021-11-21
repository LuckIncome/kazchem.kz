<!DOCTYPE html>
<html lang="ru">
    <head>        
        <meta charset="utf-8">
        <title><?=$title_for_layout?> | kazchem</title>
        <?php if(isset($meta['keywords'])): ?>                  
            <meta name="keywords" content="<?=$meta['keywords']?>">
        <?php endif; ?>
        <?php if(isset($meta['description'])): ?>
            <meta name="description" content="<?=$meta['description']?>">
        <?php endif; ?>
		<?php echo '<link rel="canonical" href="https://kazchem.kz'.$_SERVER['REQUEST_URI'].'" />'?>
        <link rel="shortcut icon" href="/img/favicon.png" type="image/png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="/img/favicon.png" />
        <link rel="stylesheet" href="/css/style.css?v=1.173455535773637651" />
        <link rel="stylesheet" href="/css/slick.css" />
        <link rel="stylesheet" href="/css/jquery.fancybox.css" />
        <meta name="format-detection" content="telephone=no">
        <meta property="og:site_name" content="kazchem.kz"/>
        <?php if(isset($meta['og_image'])): ?>
            <meta property="og:image" itemprop="image" content="https://kazchem.kz/img/<?=$meta['og_image']?>" />
            <meta property="og:image:type" content="image/jpeg" />
            <meta property="og:image:width" content="256" />
            <meta property="og:image:height" content="256" />
            <meta property="og:image:alt" content="<?=$title_for_layout?>" />
        <?php endif ?>
       <!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MVPJXBQ');</script> 

        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVPJXBQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
             
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
           (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
           m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
           (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
           ym(67315633, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
           });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/67315633" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177937788-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-177937788-1');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->

        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MVPJXBQ');</script>
<!-- End Google Tag Manager -->
    </head>
    <body class="<?=$l?>">
        <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MVPJXBQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div class="alert <?=(isset($_SESSION['Message'])) ? 'alert--active' : '';?>">
            <div class="container">                
                <div class="message-popup">
                    <div class="message-popup__heading">
                        <span>Уведомление</span>
                        <div class="my-alert__close"></div>
                    </div>
                    <div class="message-popup__pad">                                        
                        <?php echo $this->Session->flash('good'); ?>
                        <?php echo $this->Session->flash('bad'); ?>
                        <?php if(isset($_SESSION['Message'])){unset($_SESSION['Message']);} ?>
                        <div class="message-popup__close">
                            <span>Закрыть</span>
                        </div>
                    </div>    
                </div>                    
            </div>
        </div> 
        <header>
            <div class="header_top">
                <div class="container">
                    <a class="logo" href="/"></a>
					
                     <ul class="menu">
                        <li class="sub_menu_link">
                            <a class="menu_link" href="javascript:;"><?=__('О компании')?></a>
                            <div class="sub_menu">
                                <div class="sub_menu_list">
                                    <a class="sub_link" href="/pages/about"><?=__('О компании')?></a>
                                    <a class="sub_link" href="/partners"><?=__('Наши партнеры')?></a>
                                    <a class="sub_link" href="/reviews"><?=__('Отзывы')?></a>
                                    <a class="sub_link" href="/vacancies"><?=__('Вакансии')?></a>
                                    <a class="sub_link" href="/contacts"><?=__('Контакты')?></a>
                                </div>
                            </div>
                        </li>
                        <li class="sub_menu_link">
							<a class="menu_link" href="javascript:;"><?=__('Наша продукция')?></a>
							<div class="sub_menu">
								<div class="sub_menu_list">
									<a class="sub_link" href="/products"><?=__('Продукция')?></a>
									<a class="sub_link" href="/pages/agrocalc"><?=__('Агрокалькулятор')?></a>
									<a class="sub_link" href="/services/transportation#opendelcal"><?=__('Калькулятор доставки')?></a>
									<a class="sub_link" href="/pages/how_to_buy"><?=__('Как купить')?></a>
								</div>
							</div>
						</li>
                        <li class="sub_menu_link">
                            <a class="menu_link" href="javascript:;"><?=__('Услуги')?></a>
                            <div class="sub_menu">
                                <div class="sub_menu_list">
                                    <a class="sub_link" href="/services/agroconsulting"><?=__('Агроконсалтинг')?></a>
                                    <a class="sub_link" href="/services/transportation"><?=__('Доставка')?></a>
                                    <a class="sub_link" href="/services/subsiding"><?=__('Субсидирование')?></a>
                                </div>
                            </div>
                        </li>
                        <li><a class="menu_link" href="/news"><?=__('Новости')?></a></li>
                        <!-- <li><a class="menu_link" href="javascript:;">Полезное</a></li> -->
                    </ul>
					
                    <div class="head_right">
                        <a class="head_tel head_right_item" href="tel:+77010063633">+7 (701) 006 36 33</a>
                        <div class="head_login_block">
                            <?php if($login): ?>
                                <a class="cabinet_link head_right_item" href="/<?=$lang?>users/profile"><?=__('Мой кабинет')?></a>
                            <?php else: ?>
                                <a class="cabinet_link hide head_right_item" href="javascript:;"><?=__('Мой кабинет')?></a>
                            <div class="head_login">
                                <div class="head_login_top">
                                    <div class="head_login_item active"><?=__('Вход')?></div>
                                    <a class="head_login_item" href="/users/registration"><?=__('Регистрация')?></a>
                                </div>
                                <form class="login_body" action="/<?=$lang?>users/login" method="POST" accept-charset="utf-8">
                                        <div class="input_block">
                                            <div class="input_name"><?=__('Номер телефона')?></div>
                                            <input class="form_input" type="tel" name="data[User][username]" placeholder="+7 (___) ___ __ __">
                                        </div>
                                        <div class="input_block pass_input_block">
                                            <div class="input_name"><?=__('Пароль')?></div>
                                            <input class="form_input pass_input" type="password" name="data[User][password]">
                                            <div class="input_err pass_err"></div>
                                            <div class="pass_eye"></div>
                                        </div>
                                        <button class="form_btn orange_btn login_btn sign_btn" type="submit"><?=__('Войти')?></button>
                                        <a class="forget_pass" href="/users/forgetpwd"><?=__('Восстановить пароль')?></a>
                                    </form>
                            </div>
                            <?php endif ?>
                        </div>
                        <!-- <div class="lang_block head_right_item">
                            <div class="lang_choice">
                                <div class="lang_icon rus"></div>
                                <span class="lang_choice_name">ru</span>
                            </div>
                            <div class="other_lang">
                                <a class="lang active" href="javascript:;">ru</a>
                                <a class="lang" href="javascript:;">kz</a>
                                <a class="lang" href="javascript:;">en</a>
                            </div>
                        </div> -->
                        <a class="basket_btn" href="/baskets">
                            <div class="basket_btn_text"><?=__('Корзина')?></div>
                            <div class="basket_num">0</div>
                        </a>
                        <div class="mob_menu">
                       <span class="menu_btn">
                          <!-- <span class="menu_btn_span menu1"></span>
                          <span class="menu_btn_span menu2"></span>
                          <span class="menu_btn_span menu3"></span> -->
                          Меню
                       </span>
                    </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="under_nav">
            <div class="close_under_nav"></div>
            <div class="auth_buttons <?=($login) ? 'hide' : ''?>">
                <a class="auth_btn orange_btn" href="/users/login">Вход</a>
                <a class="auth_btn orange_btn" href="/users/registration">Регистрация</a>
            </div>
        </div>
        <?php echo $this->fetch('content'); ?>
        <footer class="<?php if($this->request->params['controller'] == 'pages' && $this->request->params['action'] == 'home' ): ?> main_footer <?php endif ?>">
            <div class="container">
                <!-- <a class="logo" href="/"></a> -->
                <div class="foot_right main_foot_right">
                    <a class="left_icon tel" href="tel:+77010063633">+7 (701) 006-36-33</a>
                    <div class="left_icon loc">г. Нур-Султан, пр-т. Мангилик Ел 52, БЦ "Noble"</div>
                    <div class="created">Разработка сайта Astanacreative</div>
                    <ul class="soc_list">
                        <li>
                            <a class="soc_link instagram" href="https://www.instagram.com/kazchem.kz/" target="_blank"></a>
                        </li>
                        <li>
                            <a class="soc_link facebook" href="https://web.facebook.com/kazchemagro" target="_blank"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
		<script src="/js/jquery-3.0.0.min.js"></script>
        <script src="/js/slick.min.js"></script>
        <script src="/js/jquery.maskedinput.min.js"></script>            
        <script src="/js/waypoint.js"></script>  
        <script src="/js/agro_calculator.js?v=1.15"></script>    
        <script src="/js/script.js?v=1.382463"></script>    
        <script src="/js/jquery.fancybox.min.js"></script>     
        <script src="//code.jivosite.com/widget/L00rJaOwuD" async></script>
        <!--[if lt IE 9]>
        <script src="/libs/html5shiv/es5-shim.min.js"></script>
        <script src="/libs/html5shiv/html5shiv.min.js"></script>
        <script src="/libs/html5shiv/html5shiv-printshiv.min.js"></script>
        <script src="/libs/respond/respond.min.js"></script>
        <![endif]-->
        <?php if($this->request->params['controller'] == 'baskets'): ?>
            <script type="text/javascript">
                openCart();
            </script>
        <?php endif ?>

        <?php if($this->request->params['controller'] == 'products' && $this->request->params['action'] == 'compare' ): ?>
            <script type="text/javascript">
                openCompare();
            </script>
        <?php endif ?>
    </body>
</html>