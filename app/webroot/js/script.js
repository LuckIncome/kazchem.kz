$(document).ready(function(){
	// begin burger menu
  $('.mob-start').on('click', function () {
        if($('.mob-start').hasClass('mob-start--active')){
            $('.mob-start').removeClass('mob-start--active');
            $('.menu').removeClass('menu--active');
        }else{
            $('.mob-start').addClass('mob-start--active');
            $('.menu').addClass('menu--active');
        }                           
  });
  // end burger menu

  //begin tab
  createTabs();
  function createTabs(){  
        $('.table-area .shaq-ul li a').on('click', function(e)  {
            var currentAttrValue = $(this).attr('href');
            $('.tabs ' + currentAttrValue).fadeIn(150).show().addClass('active').siblings().hide().removeClass('active');
            $(this).parent('li').addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
  }
  // end tab  

  //begin cont tab
  createContTabs();
  function createContTabs(){  
        $('.cont-tab .city-ul li a').on('click', function(e)  {
            var currentAttrValue = $(this).attr('href');
            $('.ctab-area ' + currentAttrValue).fadeIn(150).show().siblings().hide();
            $(this).parent('li').addClass('active').siblings().removeClass('active');
            e.preventDefault();
        });
  }

  $('.delivery_next').on("click", function(){
    $('#shaq1').removeClass('active').hide();
    $('#shaq2').addClass('active').show();
    $('.shaq-ul').children('li').removeClass('active');
    $('.shaq-ul').children('li').eq(1).addClass('active');
    $('html, body').stop().animate({ scrollTop: $('.table-area_block').offset().top - 70 }, 1300, 'swing', function(){});
  });

  $('.delivery_back').on("click", function(){
    // $('#shaq2').removeClass('active').hide();
    // $('#shaq1').addClass('active').show();
    // $('.shaq-ul').children('li').removeClass('active');
    // $('.shaq-ul').children('li').eq(0).addClass('active');

    var tab_index = $('.shaq-ul').children('li.active').index();
    tab_index--;
    $('.shaq-ul').children('li.active').removeClass('active');
    $('.shaq-ul').children('li').eq(tab_index).addClass('active');
    $('.tabs').children('.tabs__item.active').removeClass('active').hide();
    $('.tabs').children('.tabs__item').eq(tab_index).addClass('active').show();
  });

  // end cont tab  

  // begin закрытия окна уведомления
  $(document).click(function(event) { 
      if(!$(event.target).closest('.message').length) { 
        if($('.alert').hasClass('alert--active')){
            $('.alert').removeClass('alert--active');
        }
      }  
  });
  $('.my-alert__close').click(function(event) {
      $('.alert').removeClass('alert--active');
  });   
  // end закрытия окна уведомления

  $('.main_text_slider').slick({
    autoplay: true,
    autoplaySpeed: 6000,
    arrows: false,
    dots: false,
    fade: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    speed: 1300,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.main_img_silder',
  });
  $('.agro_text_slider').slick({
    autoplay: true,
    autoplaySpeed: 6000,
    arrows: true,
    dots: false,
    fade: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    appendArrows: $('.agro_arrows'),
    speed: 1300,    
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.main_img_silder',
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
  });
  $('.akcia-slider').slick({
    autoplay: true,
    arrows: false,
    dots: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    fade: true,
    speed: 1200,
    slidesToShow: 1,
    slidesToScroll: 1
  });
  
  $('.video-slider').slick({
    autoplay: true,
    autoplaySpeed: 2500,
    arrows: true,
    appendArrows: $('.team_arrows'),
    dots: true,
    appendDots: $('.team_dots'),
    pauseOnHover: false,
    pauseOnFocus: false,
    speed: 1000,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
    responsive: [{
      breakpoint: 1201,
      settings:{
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 1002,
      settings:{
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 682,
      settings:{
        slidesToShow: 1,
      }
    }]
  });

  $("input:checkbox").on('click', function(){
    console.log( "click!!!" );
    $("#filtr").submit();
  });

  $('.filter_sel').on("change", function(){
    $('#filtr').submit();
  });

  if( $('.agro_text_slider').hasClass('agro_text_slider') ){

    if( !$('.main_img_silder').hasClass('not_slider') ){
      $('.main_img_silder').slick({
        autoplay: true,
        arrows: false,
        autoplaySpeed: 6000,
        dots: true,
        dotsClass: 'main_dots',
        appendDots: $('.main_img_dots'),
        pauseOnHover: false,
        pauseOnFocus: false,
        fade: true,
        speed: 50,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.agro_text_slider',
      });
    }
  } else{
    if( !$('.main_img_silder').hasClass('not_slider') ){
      $('.main_img_silder').slick({
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: false,
        dots: true,
        dotsClass: 'main_dots',
        appendDots: $('.main_img_dots'),
        pauseOnHover: false,
        pauseOnFocus: false,
        fade: true,
        speed: 50,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.main_text_slider',
      });
    }
  }


  $('.comment_slider').slick({
    autoplay: true,
    arrows: true,
    appendArrows: $('.comment_arrows'),
    dots: true,
    appendDots: $('.comment_dots'),
    pauseOnHover: false,
    pauseOnFocus: false,
    // fade: true,
    speed: 1200,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.comment_video_slider',
     prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
  });

  $('.comment_video_slider').slick({
    autoplay: true,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
    fade: true,
    speed: 1200,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.comment_slider',
  });

  $('.prod_inner_slider').slick({
    autoplay: true,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
  });

  $('.team_slider').slick({
    autoplay: true,
    arrows: true,
    appendArrows: $('.team_arrows'),
    dots: true,
    appendDots: $('.team_dots'),
    pauseOnHover: false,
    pauseOnFocus: false,
    speed: 1000,
    slidesToShow: 4,
    slidesToScroll: 2,
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
    responsive:[{
      breakpoint: 1351,
      settings:{
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 880,
      settings:{
        slidesToShow: 2,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 500,
      settings:{
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    }]
  });

  $('.news_gallery').slick({
    autoplay: true,
    arrows: true,
    appendArrows: $('.team_arrows'),
    dots: true,
    appendDots: $('.team_dots'),
    pauseOnHover: false,
    pauseOnFocus: false,
    speed: 1000,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
    responsive:[{
      breakpoint: 1201,
      settings:{
        slidesToShow: 2,
      }
    }, {
      breakpoint: 1101,
      settings:{
        slidesToShow: 3,
      }
    }, {
      breakpoint: 780,
      settings:{
        slidesToShow: 2,
      }
    }, {
      breakpoint: 500,
      settings:{
        slidesToShow: 1,
      }
    }]
  });

  mainSlider();

  if( !$('.page').hasClass('main_section') ){
    leafRandom();
  }


  // basket Amount

  $('.amount_btn').on("click", function(){
    var count;

    if( $(this).hasClass('add') ){
      count = $(this).siblings('.basket_summ').val();
      count++;
      $(this).siblings('.basket_summ').val(count);
    } else if( $(this).hasClass('remove') ){
      count = $(this).siblings('.basket_summ').val();
      count--;
      $(this).siblings('.basket_summ').val(count);
    }

    if( count < 1 ){
      $(this).siblings('.basket_summ').val(1);
      count = 1;
      // console.log("count val");
    }

    var inputs = $('.form_array').children();
    var prodId = $(this).parent().siblings('.basket_del').attr('data-id');
    for(i=0; i<inputs.length; i++){
      if( $(inputs[i]).attr('id') == prodId){
        $(inputs[i]).next().attr('value', count);
      }
    }

    var cartData = getCartData();
    var cartLen = getCartLen();

    if( cartData.hasOwnProperty(prodId) ){ // если такой товар уже в корзине, то добавляем +1 к его количеству
      cartData[prodId][5] = Number(count);
    } 

    setCartData(cartData, cartLen);

    addTable();
  });

  $('.basket_sel').on("change", function(){
    var prod_id = $(this).siblings('.basket_del').attr('data-id');
    var sel_val = $(this).val();
    var cartData = getCartData();
    var cartLen = getCartLen();

    if( cartData.hasOwnProperty(prod_id) ){ 
      if( $(this).hasClass('basket_sel__size') ){
        cartData[prod_id][6] = sel_val;
      } else if( $(this).hasClass('basket_sel__type') ){
        cartData[prod_id][7] = sel_val;
      }
    } 

    setCartData(cartData, cartLen);

    addTable();
  });

  $('.basket_summ').on("keypress, keyup", function(){
    var len = ($(this).val().length + 2) * 11;
    $(this).css("width", len);
    if($(this).val() == 0 || $(this).val() == '' || Number($(this).val() < 0) ){
      $(this).val(1);
      // console.log( "this val = " + $(this).val() );
    }

    $('.amount_btn').click();
  });

  $('[data-fancybox]').fancybox({
    touch : false
  });

  anketaCrops();

  $.fn.setCursorPosition = function(pos) {
    if ($(this).get(0).setSelectionRange) {
      $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
      var range = $(this).get(0).createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  };

  $('input[type="tel"]').click(function(){
    $(this).setCursorPosition(3);
  }).mask("+7 (999) 999 99 99");
  $('input[type="tel"]').mask("+7 (999) 999 99 99");

  // $('input[type="tel"]').mask('+7 (999) 999 99 99');

  $('.way').waypoint({
    handler: function() {
    $(this.element).addClass("way--active");
    },
    offset: '90%'
  });
 
});  

if (window.location.href.indexOf("opendelcal") > -1){
	$('.table-area_block').show();
}

var down_click = false;

$('.page_down').on("click", function(){
  var win_height = $(window).height();
  var head = $('.header_top').height();
  var topScroll = $(document).scrollTop();

  if( down_click ){
     $('html, body').stop().animate({ scrollTop: topScroll + win_height }, 1000, 'swing', function(){});
  } else{
    $('html, body').stop().animate({ scrollTop: win_height - head }, 1000, 'swing', function(){});
    down_click = true;
  }
  
});

$('.page_up').on("click", function(){
  $('html, body').stop().animate({ scrollTop:0 }, 1500, 'swing', function(){});
});


$(document).on("click", function(event){
  var target = event.target;

  if( !$(target).hasClass('lang_choice') && !$(target).hasClass('lang_icon') && !$(target).hasClass('lang_choice_name') ){
    $('.other_lang').slideUp();
    $('.lang_block').removeClass('active');
  }

  if( !$(target).hasClass('mob_menu') && !$(target).hasClass('menu_btn') && !$(target).hasClass('menu_btn_span') && !$(target).hasClass('menu_link') ){
    $('.mob_menu').removeClass('active');
    // $('.under_nav').slideUp(700);
    $('.under_nav').removeClass('active');
  }

  if( !$(target).hasClass('cabinet_link') && !$(target).hasClass('head_login_item') && !$(target).hasClass('login_body') && !$(target).hasClass('login_btn') && !$(target).hasClass('form_input') && !$(target).hasClass('input_name') && !$(target).hasClass('pass_eye') && !$(target).hasClass('input_block') ){
    $('.cabinet_link').removeClass('active');
    $('.head_login').fadeOut(700);
  }

  // if( !$(target).hasClass('search_input') && !$(target).hasClass('search_input') && !$(target).hasClass('search_btn') && !$(target).hasClass('search_show') ){
  //   $('.search_block, .search_show').removeClass('active');
  // }
});

$('.lang_choice').on("click", function(){
  $(this).siblings('.other_lang').slideToggle();
  $(this).parent('.lang_block').toggleClass('active');
});


$(window).resize(function(){
  mobMenu();
  tabContentHeight();
  headMob();
  prodCards();

  // if( $('.basket_form_body').hasClass('basket_form_body') ){
  //   $('.basket_form_body').height( $('.basket_body_step.active').outerHeight() );
  // }
});

function mobMenu(){
  if( $('.mob_menu').css("display") == 'block' ){
    $('.header_top .menu').prependTo('.under_nav');
    $('.sub_menu').hide();
  } else{
    $('.under_nav .menu').prependTo('.header_top .container');
    $('.header_top .container .logo').prependTo('.header_top .container');
    $('.sub_menu').show();
  }
}

mobMenu();

function headMob(){
  var doc_width = $(document).width();
  if( doc_width < 560 ){
    $('.head_right .basket_btn').prependTo('.under_nav');
    $('.head_login_block .cabinet_link').prependTo('.under_nav');
  } else{
    $('.under_nav .basket_btn').appendTo('.head_right');
    $('.head_right .mob_menu').appendTo('.head_right');
    $('.under_nav .cabinet_link').prependTo('.head_login_block');
  }
}

headMob();

$('.mob_menu').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    // $('.under_nav').slideUp(700);
    $('.under_nav').removeClass('active');
  } else{
    $(this).addClass('active');
    // $('.under_nav').slideDown(700);
    $('.under_nav').addClass('active');
  }
});

$('.under_nav').on("click", function(event){
  var target = event.target;
  if( $(target).hasClass('menu_link') ){
    if( $(target).hasClass('active') && $(target).siblings('.sub_menu').css("display") == 'none' ){
      $(target).siblings('.sub_menu').slideDown(600);
    } else if( $(target).hasClass('active') ){
      $(target).removeClass('active');
      $(target).siblings('.sub_menu').slideUp(600);
    } else{
      $(target).addClass('active');
      $(target).siblings('.sub_menu').slideDown(600);
    }
  }

  if( $(target).hasClass('sub_link') ){
     $(target).siblings('.sub_menu').slideToggle(600);
  }
});

$('.close_under_nav').on("click", function(){
  $('.under_nav, .mob_menu').removeClass('active');
});

$('.my-alert__close').on("click", function(){
  $('.alert.alert--active').removeClass('alert--active');
});


$('.cabinet_link').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    $('.head_login').fadeOut(700);
  } else{
    $(this).addClass('active');
    $('.head_login').fadeIn(700);
  }
});


function leafRandom(){
  var leaf = $('.leaf');

  for( i=0; i<leaf.length; i++ ){
    if( $(leaf[i]).hasClass('leaf_1') ){

      $(leaf[i]).css("left", getRandomIntInclusive(10, 30) + "px");
      $(leaf[i]).css("top", getRandomIntInclusive(10, 20) + "%");
      $(leaf[i]).css("filter", "blur(" + getRandomIntInclusive(0, 8) + "px)");

    } else if( $(leaf[i]).hasClass('leaf_2') ){

      $(leaf[i]).css("right", getRandomIntInclusive(5, 30) + "px");
      $(leaf[i]).css("top", getRandomIntInclusive(20, 50) + "%");
      $(leaf[i]).css("filter", "blur(" + getRandomIntInclusive(0, 12) + "px)");

    } else if( $(leaf[i]).hasClass('leaf_3') ){
      
      $(leaf[i]).css("left", getRandomIntInclusive(5, 30) + "px");
      $(leaf[i]).css("top", getRandomIntInclusive(50, 90) + "%");
      $(leaf[i]).css("filter", "blur(" + getRandomIntInclusive(0, 15) + "px)");

    } else{

      $(leaf[i]).css("left", getRandomIntInclusive(5, 60) + "%");
      $(leaf[i]).css("top", getRandomIntInclusive(10, 90) + "%");
      $(leaf[i]).css("filter", "blur(" + getRandomIntInclusive(0, 15) + "px)");

    }
  }

}
function getRandomIntInclusive(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min; //Максимум и минимум включаются
}


// Main Dots

function mainDot(){
  var dots_len = $('.main_dots').children('li');
  
  for( i=0; i<dots_len.length; i++ ){
    // $(dots_len[i]).children('button').addClass('dot_' + (i + 1));
    $(dots_len[i]).addClass('dot_' + (i + 1));
    $(dots_len[i]).append('<div class="main_dot_num">0' + (i + 1) + '</div>');
  }
}

$(document).ready(function(){
  if( $('.main_dots').hasClass('main_dots') ){
    mainDot();
  }
});


// Main Dots END

// Main IMG Slider

$('.main_img_silder').on('afterChange', function(event, slick, currentSlide, nextSlide){
  $('.main_img_silder').find('.slick-current').removeClass('prev');
  $('.main_img_silder').find('.slick-current').removeClass('next');

  $('.main_img_silder').find('.slick-current').prev('.slick-slide').prev('.slick-slide').addClass('prev');
  $('.main_img_silder').find('.slick-current').prev('.slick-slide').addClass('prev');
  $('.main_img_silder').find('.slick-current').next('.slick-slide').addClass('next');
  $('.main_img_silder').find('.slick-current').next('.slick-slide').next('.slick-slide').addClass('next');
});

function mainSlider(){
  $('.main_img_silder').find('.slick-current').next('.slick-slide').addClass('next');
}

// Main IMG Slider END

// Catalog Filter Check

// $('.filter_check').on("click", function(){
//   if( $(this).children('input').prop("checked") ){
//     $(this).removeClass('active');
//     $(this).children('input').prop("checked", false);
//   } else{
//     $(this).addClass('active');
//     $(this).children('input').prop("checked", true);
//   }
// });

// Catalog Filter Check END

// Catalog Inner Tab

$('.prod_tab_item').on("click", function(){
  var tabIndex = $(this).index();

  if( !$(this).hasClass('active') ){
    $('.prod_tab_item.active').removeClass('active');
    $(this).addClass('active');
    $('.prod_content').removeClass('active');
    $('.prod_content_block').children('.prod_content').eq(tabIndex).addClass('active');
    tabContentHeight();
  }
});

$('.buy_tab_item').on("click", function(){
  var tabIndex = $(this).index();

  if( !$(this).hasClass('active') ){
    $('.buy_tab_item.active').removeClass('active');
    $(this).addClass('active');
    $('.buy_content_item').removeClass('active');
    $('.buy_content_block').children('.buy_content_item').eq(tabIndex).addClass('active');
    tabContentHeight();
  }
});

function tabContentHeight(){
  if( $('.prod_content_block').hasClass('prod_content_block') ){
    $('.prod_content_block').height( $('.prod_content.active').outerHeight() );
  } else if( $('.buy_content_block').hasClass('buy_content_block') ){
    $('.buy_content_block').height( $('.buy_content_item.active').outerHeight() );
  }
  
}

tabContentHeight();

// Catalog Inner Tab END

// Transportation Map


$('.i-sklad').on("mouseover", function(){
  var obl_id = $(this).attr('data-id');
  $('#' + obl_id + '_oblast').addClass('hovered');
  $(this).children('.i-sklad_info').addClass('active');
});

$('.i-sklad').on("mouseleave", function(){
  var obl_id = $(this).attr('data-id');
  $('#' + obl_id + '_oblast').removeClass('hovered');
  $(this).children('.i-sklad_info').removeClass('active');
});

$('.map_oblast, .i-sklad').on("click", function(){ 

  var obl_name;

  if( $(this).hasClass('map_oblast') ){
    obl_name = $(this).attr('id').slice(0, -7);
  } else{
    obl_name = $(this).attr('data-id');
  }

  $('#map').children('.sklad-part').removeClass('active');
  $('#map').find('.sklad-part-' + obl_name).addClass('active');

  if( $('#map').find('.sklad-part.active').length > 0 ){
    $.fancybox.open({ // FancyBox 3
      src: '#map',
      type : 'inline'      
    });
  }
});  

$('.map_oblast').on("mouseover", function(){
  var obl_name = $(this).attr('id').slice(0, -7);
  $('.i-sklad').children('.i-sklad_info').removeClass('active');
  $('.i-sklad[data-id="' + obl_name + '"]').children('.i-sklad_info').addClass('active');
});

$('.map_oblast').on("mouseleave", function(){
  $('.i-sklad').children('.i-sklad_info').removeClass('active');
});


// Transportation Map END


// Vakancy File Input

$('.file_label').on("mouseleave", function(){
  var input_val = $('#vakancy_file').val();
  if( input_val != '' ){
    input_val = input_val.slice(12);
    $('.file_label').children('.file_name').text(input_val);
  } else{
    $('.file_label').children('.file_name').text('Прикрепить резюме');
  }
});

// Vakancy File Input END

// Profile Img

$('.profile_img_label').on("mouseleave", function(){
  var input_val = $('#profile_file').val();
  if( input_val != '' ){
    input_val = input_val.slice(12);
    $('.profile_img_label').text(input_val);
  } else{
    $('.profile_img_label').text('Прикрепить фото');
  }
});

// Profile Img

// Products Filter

$('.catalog_filter_name').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    $(this).siblings('.catalog_filter').removeClass('active');
    setTimeout(function(){
      $('.catalog_filter_name').siblings('.catalog_filter').removeClass('show');
    }, 400);
  } else{
    $(this).addClass('active');
    $(this).siblings('.catalog_filter').addClass('active');
    $(this).siblings('.catalog_filter').addClass('show');
  }
});

function prodCards(){
  // if( $('.catalog_filter_name').css("display") == 'block' ){
  //   $('.catalog_sidebar').find('.delivery').appendTo('.catalog_content');
  // } else{
  //   $('.catalog_content').find('.delivery').appendTo('.catalog_sidebar');
  // }

  if( $('.catalog_filter_name').css("display") == 'block' ){
    $('.catalog_sidebar').find('.akcia-slider').prependTo('.catalog_content');
  } else{
    $('.catalog_content').find('.akcia-slider').prependTo('.catalog_sidebar');
  }
}

prodCards();

// Products Filter END


// Basket


var d = document,
  itemBox = $('.prod_inner_main'),
  itemBoxInner = $('.prod_item'),
  cartCont = $('.basket');

// Функция кроссбраузерной установка обработчика событий
function addEvent(elem, type, handler){
  if(elem.addEventListener){
    elem.addEventListener(type, handler, false);
  } else {
    elem.attachEvent('on'+type, function(){ handler.call( elem ); });
  }
  return false;
}

function removeEvent(elem, type, handler){
  if(elem.removeEventListener){
    elem.removeEventListener(type, handler, false);
  } else {
    elem.attachEvent('on'+type, function(){ handler.call( elem ); });
  }
  return false;
}

// Получаем данные из LocalStorage
function getCartData(){
  return JSON.parse(localStorage.getItem('KazChem'));
}
// Записываем данные в LocalStorage
function setCartData(o, i){
  localStorage.setItem('KazChem', JSON.stringify(o));
  localStorage.setItem('KazChem_Len', JSON.stringify(i));
  return false;
}

// Получаем данные из LocalStorage KazChem_Len кол-во товара
function getCartLen(){
  return JSON.parse(localStorage.getItem('KazChem_Len'));
}

// Добавляем товар в корзину
function addToCart(e){
  // this.disabled = true; // блокируем кнопку на время операции с корзиной
  // $(this).text("Товар в корзине");
  // $(this).addClass('disabled');

  this.disabled = true; // блокируем кнопку на время операции с корзиной

  if( $(this).hasClass('prod_icon_shop') ){
    $(this).children('.prod_icon_text').text('Товар в корзине');
  } else{
    $(this).text("Товар в корзине");
  }

  if( $(this).hasClass('disabled') ){
    var basket_href = $('.head_shop_cart').attr('href');
    $(this).attr('href', basket_href);
    return;
  }

  $(this).addClass('disabled');


  var cartData = getCartData() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
    // parentBox = $(this).parent(), // родительский элемент кнопки "Добавить в корзину"
    itemId = $(this).attr('data-id'), // ID товара
    itemTitle = $(this).siblings('.small_title').text(), // название товара
    itemImg = $(this).parent().siblings('.prod_inner_slider').find('.slick-current').children('.prod_inner_img').children('img').attr('src'), // картинка товара
    itemText = $(this).siblings('.text_item').html(), // описание товара
    itemHref = window.location.href, // ссылка на страниу товара
    itemCount = 1, // кол-во товара
    itemSize = 'Килограмм', // Ед. измерения
    itemType = 'Мешки'; // упаковка

     // сумма товара

  if( $(this).hasClass('add_card_catalog') ){
    // itemId = $(this).parent().attr('data-id');
    itemTitle = $(this).parent().siblings('.prod_name').text(); // название товара
    itemImg = $(this).parent().parent().siblings('.prod_img').children('img').attr('src'); // картинка товара
    itemText = $(this).parent().siblings('.prod_text').html(); // описание товара
    itemHref = $(this).parent().siblings('.prod_name').attr('href'); // ссылка на страниу товара

    // $.fancybox.open( $('#zakas-pop') );
  }

  var cartLen = getCartLen() || 0; // получаем кол-во товаров в корзине или ставим значение 0
  $('.basket_num').text(cartLen);


  if( cartData.hasOwnProperty(itemId) ){ // если такой товар уже в корзине, то добавляем +1 к его количеству
    // cartData[itemId][5] += Number(itemCount);
    // cartData[itemId][6] = cartData[itemId][5] * cartData[itemId][4];
  } else{ // если товара в корзине еще нет, то добавляем в объект
    cartData[itemId] = [itemId, itemTitle, itemImg, itemText, itemHref, itemCount, itemSize, itemType];
    cartLen++;
    $('.basket_num').text(cartLen);
    
  }

  if( setCartData(cartData, cartLen) ){ // Обновляем данные в LocalStorage
    this.disabled = false; // разблокируем кнопку после обновления LS
  }

  openMiniBasket();

  return false;
}

function openMiniBasket(){
  var basketCont = $('#zakas-pop').find('.basket');

  var cartData = getCartData(), // вытаскиваем все данные корзины
  totalItems = '';
  // var cartLen = getCartLen(); // получаем кол-во товаров в корзине

  if( cartData !== null ){
    // totalItems = '<div class="basket_head"><div class="basket_head_item">Товары</div><div class="basket_head_item basket_head_second">Кол-во</div> <div class="basket_head_item basket_head_third">Ед. измерения</div> <div class="basket_head_item basket_head_last">Упаковка</div></div><div class="basket_body">';
    for(var items in cartData){
      totalItems += '<div class="basket_row">';
      totalItems += '<a class="basket_img" href="' + cartData[items][4] + '"><img src="' + cartData[items][2] + '" alt=""></a>';
      totalItems += '<div> <a class="basket_name" href="' + cartData[items][4] + '">' + cartData[items][1] + '</a>';
      totalItems += '<div class="text_item text_item--korz"> ' + cartData[items][3] + ' </div> </div>';
      // totalItems += '<div class="basket_text"><a class="basket_name" href="' + cartData[items][4] + '">' + cartData[items][1] + '</a><div class="text_item">' + cartData[items][3] + '</div></div>';
      // totalItems += '<div class="basket_amount"><span class="amount_btn remove"></span><input class="basket_summ" type="number" value="' + cartData[items][5] + '"><span class="amount_btn add"></span></div>';
      // totalItems += '<select class="basket_sel basket_sel__size"><option selected value="tonn">Тонн</option><option value="kilo">Килограмм</option></select><select class="basket_sel basket_sel__type"><option value="">Мешки</option></select>';
      // totalItems += '<a class="basket_del" href="javascript:;" data-id="' + cartData[items][0] + '" onclick="deleteCart()"></a>';
      totalItems += '</div>';

      // $('.form_array').append('<input type="number" name="prod_id[]" id="' + cartData[items][0] + '"> <input type="number" name="prod_amount[]" value="' + cartData[items][5] + '">');
    }
    // totalItems += '</div>';
    $(basketCont).html(totalItems);
  }
}

// Устанавливаем обработчик события на каждую кнопку "Добавить в корзину"
for(var i = 0; i < itemBox.length; i++){
  addEvent(itemBox[i].querySelector('.add_card'), 'click', addToCart);

  var cartData = getCartData();
  var itemId = $(itemBox[i]).children('.prod_inner_text').children('.add_card').attr('data-id');

  if( cartData != null && cartData.hasOwnProperty(itemId) ){ // если такой товар уже в корзине, то пишем что товар в корзине
    $(itemBox[i]).children('.prod_inner_text').children('.add_card').text("Товар в корзине");
    $(itemBox[i]).children('.prod_inner_text').children('.add_card').addClass('disabled');
  }
}


function shopEventListener(){
  itemBoxInner = $('.prod_item');

  // Устанавливаем обработчик события на каждую кнопку "Добавить в корзину" в Каталоге
  for(var i = 0; i < itemBoxInner.length; i++){
    addEvent(itemBoxInner[i].querySelector('.add_card_catalog'), 'click', addToCart);

    var cartData = getCartData();
    var itemId = $(itemBoxInner[i]).children('.prod_info').children('.prod_buttons').children('.add_card_catalog').attr('data-id');

    if( cartData != null && cartData.hasOwnProperty(itemId) ){ // если такой товар уже в корзине, то пишем что товар в корзине
      $(itemBoxInner[i]).children('.prod_info').children('.prod_buttons').children('.add_card_catalog').text("Товар в корзине");
      $(itemBoxInner[i]).children('.prod_info').children('.prod_buttons').children('.add_card_catalog').addClass('disabled');
    }
  }
}

if( $('.catalog').hasClass('catalog') || $('.prod_item--view').hasClass('prod_item--view') ){
  shopEventListener();
}



// Открываем корзину со списком добавленных товаров
function openCart(e){
  var cartData = getCartData(), // вытаскиваем все данные корзины
  totalItems = '';

  var cartLen = getCartLen(); // получаем кол-во товаров в корзине
  $('.basket_num').text(cartLen);
  $('.basket_form_count').text(cartLen);
  $('#product_count').val(cartLen);

  // если что-то в корзине уже есть, начинаем формировать данные для вывода
  if( cartData !== null ){
    totalItems = '<div class="basket_head"><div class="basket_head_item">Товары</div><div class="basket_head_item basket_head_second">Кол-во</div> <div class="basket_head_item basket_head_third">Ед. измерения</div> <div class="basket_head_item basket_head_last">Упаковка</div></div><div class="basket_body">';
    for(var items in cartData){
      totalItems += '<div class="basket_row">';
      totalItems += '<a class="basket_img" href="' + cartData[items][4] + '"><img src="' + cartData[items][2] + '" alt=""></a>';
      totalItems += '<div class="basket_text"><a class="basket_name" href="' + cartData[items][4] + '">' + cartData[items][1] + '</a><div class="text_item">' + cartData[items][3] + '</div></div>';
      totalItems += '<div class="basket_amount"><span class="amount_btn remove"></span><input class="basket_summ" type="number" value="' + cartData[items][5] + '"><span class="amount_btn add"></span></div>';
      
      if( cartData[items][6] == 'Тонн' ){
        totalItems += '<select class="basket_sel basket_sel__size"><option value="Килограмм">Килограмм</option><option selected value="Тонн">Тонн</option><option value="Литр">Литр</option></select>';
      } else if( cartData[items][6] == 'Килограмм' ){
        totalItems += '<select class="basket_sel basket_sel__size"><option selected value="Килограмм">Килограмм</option><option value="Тонн">Тонн</option> <option value="Литр">Литр</option></select>';
      } else if( cartData[items][6] == 'Литр' ){
        totalItems += '<select class="basket_sel basket_sel__size"><option value="Килограмм">Килограмм</option><option value="Тонн">Тонн</option> <option selected value="Литр">Литр</option></select>';
      }

      if( cartData[items][7] == 'Мешки' ){
        totalItems += '<select class="basket_sel basket_sel__type"><option selected value="Мешки">Мешки</option><option value="Биг-бэг">Биг бэги</option> <option value="Цистерна">Цистерна</option></select>';
      } else if( cartData[items][7] == 'Биг-бэг' ){
        totalItems += '<select class="basket_sel basket_sel__type"><option value="Мешки">Мешки</option><option selected value="Биг-бэг">Биг бэги</option> <option value="Цистерна">Цистерна</option></select>';
      } else if( cartData[items][7] == 'Цистерна' ){
        totalItems += '<select class="basket_sel basket_sel__type"><option value="Мешки">Мешки</option><option value="Биг-бэг">Биг бэги</option> <option selected value="Цистерна">Цистерна</option></select>';
      }

      // totalItems += '<select class="basket_sel basket_sel__size"><option ' + if(cartData[items][6] == 'tonn') + ' selected value="tonn">Тонн</option><option value="kilo">Килограмм</option></select><select class="basket_sel basket_sel__type"><option selected value="mesh">Мешки</option></select>';
      totalItems += '<a class="basket_del" href="javascript:;" data-id="' + cartData[items][0] + '" onclick="deleteCart()"></a>';
      totalItems += '</div>';

      $('.form_array').append('<input type="number" name="prod_id[]" id="' + cartData[items][0] + '"> <input type="number" name="prod_amount[]" value="' + cartData[items][5] + '">');
    }
    totalItems += '</div>';
    $(cartCont).html(totalItems);
  } else{
    cartCont.innerHTML = "В корзине пусто";
  }

  if( $('.basket').text().length < 70 ){
    // $('.basket').html('<div class="small_title">В корзине пусто</div>');
    $('.basket').html('<div class="small_title">Ваша корзина пуста.<br> Выберите нужный вам товар из раздела продукции и добавьте ее в корзину.<br> <a class="more_btn orange_btn" href="/products">Перейти в каталог</a></div>');
  }

  addTable();

  return false;
}


function addTable(){

  var cartData = getCartData(), // вытаскиваем все данные корзины
  table_Items = '';

  table_Items += '<table width="100%" border="1" cellspacing="1" cellpadding="1"><tbody>';
  table_Items += '<tr> <th>ID</th> <th>Наименование</th> <th>Количество</th> <th>Ед. измерения</th> <th>Упаковка</th></tr>';

  for(var items in cartData){
    table_Items += '<tr> <td>' + cartData[items][0] +'</td> <td>' + cartData[items][1] + ' <td>' + cartData[items][5] + '</td> <td>' + cartData[items][6] + '</td> <td>' + cartData[items][7] + '</td> </tr>';
  }

  // table_Items += '<tr> <td colspan="5"> Общая стоимость: 0</td> </tr>';
  table_Items += '</tbody></table>';
  
  $('.korz-json').text( localStorage.getItem('KazChem') );
  $('.korz-textarea').text(table_Items);
}


function deleteCart(){
  var target = event.target;
  var cls_name = $(target).attr('data-id');
  var cartData = getCartData();

  var cartLen = getCartLen(); // получаем кол-во товаров в корзине
  $('.basket_num').text(cartLen);

  delete cartData[cls_name];

    // удаление input из массива в форме
  var inputs = $('.form_array').children();
  for(i=0; i<inputs.length; i++){
    if( $(inputs[i]).attr('id') == cls_name){
      $(inputs[i]).next().remove();
      $(inputs[i]).remove();
    }
  }

  cartLen--;
  $('.basket_num').text(cartLen);
  setCartData(cartData, cartLen);
  $(target).parent().remove();

  if( $('.basket').text().length < 70 ){
    // $('.basket').html('<div class="small_title">В корзине пусто</div>');
    $('.basket').html('<div class="small_title">Ваша корзина пуста.<br> Выберите нужный вам товар из раздела продукции и добавьте ее в корзину.<br> <a class="more_btn orange_btn" href="/products">Перейти в каталог</a></div>');
  }
}

var cartLen = getCartLen(); // получаем кол-во товаров в корзине
if( cartLen == null ){
  cartLen = 0;
}
$('.basket_num').text(cartLen);

$('#basket_region_sel').on("change", function(){
  var reg_sel_val = $(this).children('option:selected').text();
  $('#basket_region').val(reg_sel_val);
});

// Basket END


// Compare Products

var compareContTop = $('#compare_head'),
  compareContBottom = $('#compare_body');

// Получаем данные из LocalStorage
function getCompare(){
  return JSON.parse(localStorage.getItem('KazChem_Compare'));
}
// Записываем данные в LocalStorage
function setCompare(o, i){
  localStorage.setItem('KazChem_Compare', JSON.stringify(o));
  localStorage.setItem('KazChem_Compare_Len', JSON.stringify(i));
  return false;
}

// Получаем данные из LocalStorage KazChem_Compare_Len кол-во товара
function getCompareLen(){
  return JSON.parse(localStorage.getItem('KazChem_Compare_Len'));
}

// Добавляем товар в корзину
function addToCompare(e){

  var compareLen = getCompareLen() || 0;

  if( compareLen == 2 ){
    $.fancybox.open( $('#compare_max') );
    console.log("max compare");
  } else{
    
    this.disabled = true; // блокируем кнопку на время операции с корзиной

    // $(this).children('.prod_icon_text').text('В сравнении');

    // if( $(this).hasClass('disabled') ){
    //   var basket_href = $('.head_shop_cart').attr('href');
    //   $(this).attr('href', basket_href);
    //   return;
    // }

    $(this).addClass('disabled');

    var compareData = getCompare() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
      // parentBox = $(this).parent(), // родительский элемент кнопки "Добавить в корзину"
      itemId = $(this).attr('data-id'),
      itemTitle = $(this).parent().siblings('.prod_name').text(), // название товара
      itemImg = $(this).parent().parent().siblings('.prod_img').children('img').attr('src'), // картинка товара
      itemText = $(this).parent().siblings('.prod_text').html(), // описание товара
      itemHref = $(this).parent().siblings('.prod_name').attr('href'), // ссылка на страниу товара
      itemInfo = $(this).parent().siblings('.compare_info').html(),
      itemJson = $(this).parent().siblings('.compare_json').children('textarea').text();
      // itemCount = 1; // кол-во товара

      $.fancybox.open( $('#compare-pop') );

    // var compareLen = getCompareLen() || 0; // получаем кол-во товаров в корзине или ставим значение 0
    compareLen = getCompareLen() || 0; // получаем кол-во товаров в корзине или ставим значение 0
    $('.compare_num').text(compareLen);


    if( compareData.hasOwnProperty(itemId) ){ // если такой товар уже в корзине, то добавляем +1 к его количеству
      // cartData[itemId][5] += Number(itemCount);
      // cartData[itemId][6] = cartData[itemId][5] * cartData[itemId][4];
    } else{ // если товара в корзине еще нет, то добавляем в объект
      compareData[itemId] = [itemId, itemTitle, itemImg, itemText, itemHref, itemInfo, itemJson];
      compareLen++;
      $('.compare_num').text(compareLen);
      
    }

    if( setCompare(compareData, compareLen) ){ // Обновляем данные в LocalStorage
      this.disabled = false; // разблокируем кнопку после обновления LS
    }

    openMiniCompare();
  }

  return false;
}

function openMiniCompare(){
  var compareCont = $('#compare-pop').find('.compare_pop_content');

  var compareData = getCompare(), // вытаскиваем все данные корзины
  totalItems = '';

  if( compareData !== null ){
    for(var items in compareData){
      totalItems += '<div class="basket_row">';
      totalItems += '<a class="basket_img" href="' + compareData[items][4] + '"><img src="' + compareData[items][2] + '" alt=""></a>';
      totalItems += '<div> <a class="basket_name" href="' + compareData[items][4] + '">' + compareData[items][1] + '</a>';
      totalItems += '<div class="text_item text_item--korz"> ' + compareData[items][3] + ' </div> </div>';
      totalItems += '</div>';
    }
    $(compareCont).html(totalItems);
  }
}

// Устанавливаем обработчик события на каждую иконку "Сравнить"

function compareEventListener(){
  itemBoxInner = $('.prod_item');

  for(var i = 0; i < itemBoxInner.length; i++){
    addEvent(itemBoxInner[i].querySelector('.prod_compare'), 'click', addToCompare); 

    var compareData = getCompare();
    var itemInnerId = $(itemBoxInner[i]).children('.prod_info').children('.prod_buttons').children('.prod_compare').attr('data-id');

    if( compareData != null && compareData.hasOwnProperty(itemInnerId) ){
      // $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_compare').children('.prod_icon_text').text("В сравнении");
      $(itemBoxInner[i]).children('.prod_info').children('.prod_buttons').children('.prod_compare').addClass('disabled');
    } else{
      // $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_compare').children('.prod_icon_text').text("Сравнить");
      $(itemBoxInner[i]).children('.prod_info').children('.prod_buttons').children('.prod_compare').removeClass('disabled');
    }
  }
}

if( $('.prod_compare').hasClass('prod_compare') ){
  compareEventListener();
}

$('.close-compare-pop').on("click", function(){
  $('#compare-pop .fancybox-close-small').click();
});

$('.compare_max_close').on("click", function(){
  $('#compare_max .fancybox-close-small').click();
});

$('.compare_add').on("click", function(){
  var compareLen = getCompareLen();

  if( compareLen == 2 ){
    $.fancybox.open( $('#compare_max') );
    return false;
  }
});

var site_lang = 'ru';

if( $('body').hasClass('kz') ){
  site_lang = 'kz';
} else if( $('body').hasClass('en') ){
  site_lang = 'en';
}


// Открываем корзину со списком добавленных товаров
function openCompare(e){
  var compareData = getCompare(), // вытаскиваем все данные корзины
  compareItems_Top = '',
  compareItems_Bottom = '',
  compare_bottom_new = '';

  var compareLen = getCompareLen(); // получаем кол-во товаров в корзине
  if( compareLen == null || compareLen == 0 ){
    compareLen = 0;
  }
  $('.compare_num').text(compareLen);
  // $('.basket_form_count').text(compareLen);

  var prod_data;

  var prod_index = compareLen; // индекс продукта

  // если что-то в корзине уже есть, начинаем формировать данные для вывода
  if( compareData !== null ){

    // compare Top (Products)

    for(var items in compareData){ 
      compareItems_Top += '<div class="compare_content_item"> <div class="compare_prod">';
      compareItems_Top += '<div class="prod_img"><img src="' + compareData[items][2] + '" alt=""></div> <div class="compare_prod_text">';
      compareItems_Top += '<a class="prod_name" href="' + compareData[items][4] + '">' + compareData[items][1] + '</a> <div class="text_item"> ' + compareData[items][3] +' </div>';
      compareItems_Top += '<div class="compare_prod_btn"> <a class="more_btn orange_btn" href="' + compareData[items][4] + '">Заказать</a> <a class="more_btn white_btn" href="javascript:;" onclick="deleteCompare()" data-id="' + compareData[items][0] + '">Убрать <div class="white_btn_icon"></div></a> </div>';
      compareItems_Top += ' </div> </div> </div>';
    }

    // compare Top (Products) END

     // Compare Bottom 

    var compos_array = []; // массив с названиями хим-ких элементов
    // var chemical_list = '';
    var data_index = 0;
    var employ_array = []; // массив со списком применений
    var compare_index = 0;

    for(var items in compareData){
      prod_data = JSON.parse( compareData[items][6] );

      console.log( prod_data );

      for( i=0; i<prod_data['Composition'].length; i++ ){
        if( compos_array.indexOf( (prod_data['Composition'][i]['title_' + site_lang]).trim() ) == -1 ){
          compos_array.push( (prod_data['Composition'][i]['title_' + site_lang]).trim() ); // заполняем массив названиями хим. эл.
        }
      }

      for( i=0; i<prod_data['Employment'].length; i++ ){
        if( employ_array.indexOf( (prod_data['Employment'][i]['title_' + site_lang]).trim() ) == -1 ){
          employ_array.push( (prod_data['Employment'][i]['title_' + site_lang]).trim() ); // заполняем массив названиями хим. эл.
        }
      }
    }

    console.log("employ_array");
    console.log(employ_array);

    console.log("compos_array");
    console.log(compos_array);

    // $(compareContBottom).siblings('.compare_left').append(chemical_list);

    // console.log("compos_array");
    // console.log(compos_array);
    // console.log("employ_array");
    // console.log(employ_array);

    var line_len = compos_array.length + employ_array.length;
    var compos_index_new = 0;

    // console.log("line_len = " + line_len);


    for( i=0; i<line_len; i++ ){

      var row_index = i;
      var row_inner_index = -1;
      var compare_row_val = '';

      for( var items in compareData ){
        prod_data = JSON.parse( compareData[items][6] );
        // console.log(prod_data);

        if( data_index == 0 ){
          compare_bottom_new += '<div class="prod_info_row">';
          compare_row_val = '';
          
          if( i < 4 ){
            compare_bottom_new += '<div class="compare_content_item first">' + employ_array[i] + '</div>';
          } else{
            compare_bottom_new += '<div class="compare_content_item first">' + compos_array[compos_index_new] + '</div>';
          }
        }


        if( compare_index < 4 ){

          if( row_inner_index != row_index ){
            compare_row_val = prod_data['Employment'][compare_index]['body_' + site_lang];
            row_inner_index = row_index;
            compare_bottom_new += '<div class="compare_content_item">' + prod_data['Employment'][compare_index]['body_' + site_lang] + '</div>';
          } else if( row_inner_index == row_index ){
            if( compare_row_val == prod_data['Employment'][compare_index]['body_' + site_lang] ){
              compare_bottom_new += '<div class="compare_content_item">' + prod_data['Employment'][compare_index]['body_' + site_lang] + '</div>';
            } else{
              compare_bottom_new += '<div class="compare_content_item different">' + prod_data['Employment'][compare_index]['body_' + site_lang] + '</div>';
            }
          }
          // compare_bottom_new += '<div class="compare_content_item">' + prod_data['Employment'][compare_index]['body_' + site_lang] + '</div>'; // proginal
        } else{
          var print = true;

          for( j=0; j<prod_data['Composition'].length; j++ ){
            if( compos_array[compos_index_new] == prod_data['Composition'][j]['title_' + site_lang].trim() ){

              if( row_inner_index != row_index ){
                compare_row_val = prod_data['Composition'][j]['body_' + site_lang];
                row_inner_index = row_index;
                compare_bottom_new += '<div class="compare_content_item">' + prod_data['Composition'][j]['body_' + site_lang] + '</div>';
              } else if( row_inner_index == row_index ){
                if( compare_row_val == prod_data['Composition'][j]['body_' + site_lang] ){
                  compare_bottom_new += '<div class="compare_content_item">' + prod_data['Composition'][j]['body_' + site_lang] + '</div>';
                } else{
                  compare_bottom_new += '<div class="compare_content_item different">' + prod_data['Composition'][j]['body_' + site_lang] + '</div>';
                }
              }

              // compare_bottom_new += '<div class="compare_content_item">' + prod_data['Composition'][j]['body_' + site_lang] + '</div>'; // original

              print = false;
            } 
          }
          
          if( print ){
            compare_bottom_new += '<div class="compare_content_item">&nbsp;</div>';
          }
        }


        if( data_index == (compareLen - 1) ){
          compare_bottom_new += '</div>';
        }

        data_index++;
        if( data_index > (compareLen - 1) ){
          data_index = 0;
        }
      }
      // console.log("compos_index_new = " + compos_index_new);
      compare_index++;

      if( i > 3 ){
        compos_index_new++;
      }
    }

    // -------  OLD  ------ //
    // for( var items in compareData ){

    //   compareItems_Bottom += '<div class="compare_content_item"> ';

    //   for( i=0; i<4; i++){
    //     compareItems_Bottom += '<div class="prod_info_row">' + prod_data['Employment'][i]['body_' + site_lang ] + '</div>';
    //   }

    //   var compos_index = 0;
    //   for( j=0; j<compos_array.length; j++ ){
    //     if( prod_data['Composition'][compos_index] == undefined ){
          
    //       if( j != compos_array.length ){
    //         compareItems_Bottom += '<div class="prod_info_row">&nbsp;</div>';
    //       } else{
    //         break;
    //       }
    //     } else{
    //       if( prod_data['Composition'][compos_index]['title_' + site_lang ] != compos_array[j] ){
    //         compareItems_Bottom += '<div class="prod_info_row">&nbsp;</div>';
    //       } else{
    //         compareItems_Bottom += '<div class="prod_info_row">' + prod_data['Composition'][compos_index]['body_' + site_lang ] + '</div>';
    //         compos_index++;
    //       }
    //     }
    //   }

    //   compareItems_Bottom += '</div>';
    //   // !!!
    // }


    // compareItems_Top += '</div>';
    $('.compare_head, .compare_body').css("display", 'flex');
    // $('.compare_head').removeClass('hidden');
    $(compareContTop).html(compareItems_Top);
    // $(compareContBottom).html(compareItems_Bottom);
    $(compareContBottom).html(compare_bottom_new);
    // $('#compare_body_2').html(compare_bottom_new);
  } else{
    // compareEmpty();
  }

  if( $('.compare').text().length < 300 ){
    compareEmpty();
  }

  // console.log( JSON.parse( $('#area_id').text() ) )

  return false;
}

function deleteCompare(){
  var target = event.target;
  var cls_name = $(target).attr('data-id');
  var compareData = getCompare();

  var compareLen = getCompareLen(); // получаем кол-во товаров в корзине
  $('.compare_num').text(compareLen);

  delete compareData[cls_name];

  compareLen--;
  $('.compare_num').text(compareLen);
  setCompare(compareData, compareLen);
  var compareItemIndex = $(target).parent().parent().parent().parent().index();
  $(target).parent().parent().parent().parent().remove();

  // $('#compare_body').children('.compare_content_item').eq(compareItemIndex).remove();
  var compare_rows = $('#compare_body').children('.prod_info_row');

  for( i=0; i<compare_rows.length; i++ ){
    $(compare_rows[i]).children('.compare_content_item').eq( (compareItemIndex + 1) ).remove();
  }

  if( $('.compare').text().length < 300 ){
    compareEmpty();
  }
}

function clearCompare(){
  localStorage.removeItem('KazChem_Compare');
  localStorage.removeItem('KazChem_Compare_Len');

  $(compareContTop).html('');
  $(compareContBottom).html('');
  compareEmpty();

  var compareLen = getCompareLen(); // получаем кол-во товаров в корзине
  if( compareLen == null || compareLen == 0 ){
    compareLen = 0;
  }
  $('.compare_num').text(compareLen);
}

var compareLen = getCompareLen(); // получаем кол-во товаров в корзине
if( compareLen == null || compareLen == 0 ){
  compareLen = 0;
}
$('.compare_num').text(compareLen);

function compareEmpty(){
  $('.compare').prepend('<div class="small_title">Ваш список сравнения пуст. Для сравнения характеристик товаров выберите нужный вам товар и добавьте его к сравнению. <br><a class="more_btn orange_btn" href="/products">Перейти в каталог</a></div>');

  $('.compare_body, .compare_head').hide();
  // $('.compare_head').addClass('hidden');
}

// Compare Products END


// Favorite

var favoriteCont = $('.favorite_grid');

// Получаем данные из LocalStorage
function getFavorite(){
  return JSON.parse(localStorage.getItem('KazChem_Favorite'));
}
// Записываем данные в LocalStorage
function setFavorite(o, i){
  localStorage.setItem('KazChem_Favorite', JSON.stringify(o));
  localStorage.setItem('KazChem_Favorite_Len', JSON.stringify(i));
  return false;
}

// Получаем данные из LocalStorage KazChem_Favorite_Len кол-во товара
function getFavoriteLen(){
  return JSON.parse(localStorage.getItem('KazChem_Favorite_Len'));
}

// Добавляем товар в корзину
function addToFavorite(e){

  this.disabled = true; // блокируем кнопку на время операции с корзиной
  $(this).children('.prod_icon_text').text('В избранном');
  $(this).addClass('disabled');

  var favoriteData = getFavorite() || {}, // получаем данные корзины или создаём новый объект, если данных еще нет
    itemId = $(this).parent().attr('data-id'),
    itemProd = $(this).parent().parent().parent().html();

  var favoriteLen = getFavoriteLen() || 0; // получаем кол-во товаров в корзине или ставим значение 0
  // $('.favorite_num').text(favoriteLen);

  if( favoriteData.hasOwnProperty(itemId) ){ // если такой товар уже в корзине, то добавляем +1 к его количеству
    // cartData[itemId][5] += Number(itemCount);
    // cartData[itemId][6] = cartData[itemId][5] * cartData[itemId][4];
  } else{ // если товара в корзине еще нет, то добавляем в объект
    favoriteData[itemId] = [itemId, itemProd];
    favoriteLen++;
    // $('.favorite_num').text(favoriteLen);
    
  }

  if( setFavorite(favoriteData, favoriteLen) ){ // Обновляем данные в LocalStorage
    this.disabled = false; // разблокируем кнопку после обновления LS
  }

  favoriteEventListener();

  return false;
}


// Устанавливаем обработчик события на каждую иконку "В избранное"

function favoriteEventListener(){
  itemBoxInner = $('.prod_item');

  for(var i = 0; i < itemBoxInner.length; i++){
    addEvent(itemBoxInner[i].querySelector('.prod_icon_favorite'), 'click', addToFavorite); 

    var favoriteData = getFavorite();
    var itemInnerId = $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').attr('data-id');

    if( favoriteData != null && favoriteData.hasOwnProperty(itemInnerId) ){
      $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_favorite').children('.prod_icon_text').text("В избранном");
      $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_favorite').addClass('disabled');
      removeEvent(itemBoxInner[i].querySelector('.prod_icon_favorite'), 'click', addToFavorite);
      addEvent(itemBoxInner[i].querySelector('.prod_icon_favorite'), 'click', deleteFavorite);

    } else{
      $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_favorite').children('.prod_icon_text').text("В избранное");
      $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_favorite').removeClass('disabled');

      addEvent(itemBoxInner[i].querySelector('.prod_icon_favorite'), 'click', addToFavorite);
      removeEvent(itemBoxInner[i].querySelector('.prod_icon_favorite'), 'click', deleteFavorite);
    }
  }
}

// favoriteEventListener();


// Открываем корзину со списком добавленных товаров
function openFavorite(e){
  var favoriteData = getFavorite(), // вытаскиваем все данные корзины
  favoriteItems = '';

  var favoriteLen = getFavoriteLen(); // получаем кол-во товаров в корзине
  if( favoriteLen == null || favoriteLen == 0 ){
    favoriteLen = 0;
  }
  // $('.favorite_num').text(favoriteLen);

  // если что-то в корзине уже есть, начинаем формировать данные для вывода
  if( favoriteData !== null ){

    for(var items in favoriteData){
      favoriteItems +=  '<div class="prod_item">' + favoriteData[items][1] + '</div>';
    }

    $(favoriteCont).html(favoriteItems);
    favoriteEventListener();
    shopEventListener();
    compareEventListener();

  } else{
    // compareEmpty();
  }

  if( $(favoriteCont).text().length < 200 ){
    // compareEmpty();
    $(favoriteCont).parent().prepend('<div class="small_title">Список избранного пуст</div>');
  }

  return false;
}

function deleteFavorite(){
  var target = event.target;
  var cls_name = $(target).parent().attr('data-id');
  var favoriteData = getFavorite();

  var favoriteLen = getFavoriteLen(); // получаем кол-во товаров в корзине
  // $('.favorite_num').text(favoriteLen);

  delete favoriteData[cls_name];

  $(this).removeClass('disabled');
  $(this).children('.prod_icon_text').text('В избранное');

  favoriteLen--;
  // $('.favorite_num').text(favoriteLen);
  setFavorite(favoriteData, favoriteLen);

  if( $(favoriteCont).hasClass('favorite_grid') ){
    $(target).parent().parent().parent().remove();
  }

  favoriteEventListener();

  if( $(favoriteCont).text().length < 200 ){
    // compareEmpty();
    $(favoriteCont).parent().prepend('<div class="small_title">Список избранного пуст</div>');
  }
}


var favoriteLen = getFavoriteLen(); // получаем кол-во товаров в корзине
if( favoriteLen == null || favoriteLen == 0 ){
  favoriteLen = 0;
  // console.log("fav = 0");
}

// console.log("favorite len = " + favoriteLen);

// $('.favorite_num').text(favoriteLen);

// Favorite END


// Basket Page Form


$('.basket_step_btn, .basket_form_step, .delivery_step_btn').on("click", function(){
  var basket_errors = 0;
  var basket_sel = $('.basket_first_step').find('.form_select');
  
  if( $(this).hasClass('delivery_step_btn') ){
    basket_sel = $('.delivery_sel_list').find('.delivery_select');
  }

  var index, basket_address, basket_fasovka, basket_input;

  for( i=0; i<basket_sel.length; i++ ){
    if( $(basket_sel[i]).hasClass('not_required') ){
      continue;
    } else if( $(basket_sel[i]).val() == 0 || $(basket_sel[i]).val() == undefined || $(basket_sel[i]).val() == null ){
      $(basket_sel[i]).addClass('error');
      basket_errors++;
    }  else{
      $(basket_sel[i]).removeClass('error');

      if( $(basket_sel[i]).attr('id') == 'basket_address' ){
        basket_address = $(basket_sel[i]).children('option:selected').text();
      } else if( $(basket_sel[i]).attr('id') == 'basket_fasovka' ){
        basket_fasovka = $(basket_sel[i]).children('option:selected').text();
      }
    }
  }

  if( $('.basket_zero_step').hasClass('basket_zero_step') && $('.basket_first_step').hasClass('active') ){
    basket_input = $('.basket_first_step').find('.form_input');

    for( i=0; i<basket_input.length; i++ ){
      if( $(basket_input[i]).hasClass('not_required') ){
        continue;
      } else if( $(basket_input[i]).val() == 0 || $(basket_input[i]).val() == undefined || $(basket_input[i]).val() == null ){
        $(basket_input[i]).addClass('error');
        basket_errors++;
      } else{
        $(basket_input[i]).removeClass('error');

        // if( $(basket_input[i]).attr('id') == 'basket_address' ){
        //   basket_address = $(basket_input[i]).children('option:selected').text();
        // } else if( $(basket_input[i]).attr('id') == 'basket_fasovka' ){
        //   basket_fasovka = $(basket_input[i]).children('option:selected').text();
        // }
      }
    }
  }

  $('#basket_address_text').text(basket_address);
  $('#basket_fasovka_text').text(basket_fasovka);

  if( $(this).hasClass('basket_form_step') ){
    index = $(this).attr('data-index');

    // if( basket_errors == 0 && !$(this).hasClass('active') ){
    if( !$(this).hasClass('active') ){
      $('.basket_form_body').children('.basket_body_step.active').removeClass('active');
      $('.basket_form_body').children('.basket_body_step').eq(index).addClass('active');
      $('.basket_form_top').children('.basket_form_step.active').removeClass('active');
      $('.basket_form_top').children('.basket_form_step').eq(index).addClass('active');

      // $('.basket_form_body').height( $('.basket_body_step.active').outerHeight() );

      if( index == 2 ){
        $('.basket_form_bottom').addClass('padding_right');
      } else{
        $('.basket_form_bottom').removeClass('padding_right');
      }
    }
  } else{

      // if( basket_errors == 0 ){
      //   $('.basket_first_step').removeClass('active');
      //   $('.basket_last_step').addClass('active');

      //   $('.basket_form_body').height( $('.basket_body_step.active').outerHeight() );
      //   $('.basket_form_top').children('.basket_form_step.active').removeClass('active');
      //   $('.basket_form_top').children('.basket_form_step').eq(1).addClass('active');
      // }

      // if( basket_errors == 0 ){

        index = $('.basket_form_step.active').attr('data-index');
        index++;
        $('.basket_form_body').children('.basket_body_step.active').removeClass('active');
        $('.basket_form_body').children('.basket_body_step').eq(index).addClass('active');
        $('.basket_form_top').children('.basket_form_step.active').removeClass('active');
        $('.basket_form_top').children('.basket_form_step').eq(index).addClass('active');
        // $('.basket_form_body').height( $('.basket_body_step.active').outerHeight() );

        if( index == 2 ){
          $('.basket_form_bottom').addClass('padding_right');
        } else{
          $('.basket_form_bottom').removeClass('padding_right');
        }
      // }
  }

  if( $('.basket_zero_step').hasClass('active') ){
    $('.delivery_step_btn').removeClass('hide');
    $('.basket_step_btn').addClass('hide');
    $('.basket_form_price').hide();

  } else if( $('.basket_first_step').hasClass('active') ){

    $('.delivery_step_btn').addClass('hide');
    $('.basket_step_btn').removeClass('hide');
    $('.basket_form_price').hide();

  } else{

    $('.delivery_step_btn').addClass('hide');
    $('.basket_step_btn').addClass('hide');
    $('.basket_form_price').show();

  }

  if( !$(this).hasClass('basket_form_step') ){
    $('html, body').stop().animate({ scrollTop: $('.basket_inner_form').offset().top - 130 }, 1000, 'swing', function(){});
  }
});

// $('.basket_form_body').height( $('.basket_body_step.active').outerHeight() );

$('.form_select, .delivery_select').on("change", function(){
  $(this).removeClass('error');
});

// basket_weight();

// $('.basket_amount, .basket_sel').on("click", function(){
//   basket_weight();
// });

// function basket_weight(){
//   var basket_item = $('.basket_body').children('.basket_row');
//   var basket_tonn = 0, basket_kilo = 0, basket_size = '';

//   for( i=0; i<basket_item.length; i++ ){
//     if( $(basket_item[i]).children('.basket_sel__size').val() == 'tonn' ){
//       basket_tonn = basket_tonn + $(basket_item[i]).find('.basket_summ').val();
//     } else if( $(basket_item[i]).children('.basket_sel__size').val() == 'kilo' ){
//       basket_kilo = basket_kilo + $(basket_item[i]).find('.basket_summ').val();
//     }
//   }

//   if( basket_tonn != 0 && basket_kilo != 0 ){
//     basket_size += basket_tonn + ' Тонн, ' + basket_kilo + ' Килограмм' ;
//   } else if( basket_tonn != 0 ){
//     basket_size += basket_tonn + ' Тонн';
//   } else if( basket_kilo != 0 ){
//     basket_size += basket_kilo + ' Килограмм';
//   }
  
//   $('#basket_size_text').text(basket_size);
// }

// Basket Page Form END 


// Video Btn click
// var video_src = '';

// $('.comment_video_img, .media_video_item').on("click", function(){
//   // $(this).fadeOut(800);
//   video_src = $(this).attr('data-video-src');
//   // $('#video_popup_id').children('iframe').attr('src', video_src + '?autoplay=1');
//   // $('#video_popup_id').children('iframe').attr('src', src);
// });

// $('#video_popup_id').children('.fancybox-close-small').on("click", function(){
//   // $('#video_popup_id').children('iframe').attr('src', '0');
//   console.log("close click");
//   // $("iframe").each(function() {
//   //     $(this)[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*')
//   //   });

//   $('#video_popup_id').find('iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
//   $('#video_popup_id').find('iframe').attr('src', video_src);
// });

// Video Btn click END



// Reg / Login Validate


$('.login_btn').on("click", function(){
  var inputs = $('.login_body').find('.form_input');
  var input_errors = 0;

  if( $(this).hasClass('reg_btn') ){
    inputs = $('.reg_block').find('.form_input');
  } else if( $(this).hasClass('sign_btn') ){
    inputs = $('.head_login').find('.form_input');
  }

  if( $('.login_btn').hasClass('sign_btn') && !$('.login_block').hasClass('reg_block') ){
    inputs = $('.login_block').find('.form_input');
  }

  var pass_1, pass_2;
  var pass_equal = false;

  var accept_check = false;

  for( i=0; i<inputs.length; i++ ){
    if( $(inputs[i]).attr('type') == 'email' && $(inputs[i]).val().search(/@/) < 0 ){
      $(inputs[i]).addClass('error');
      input_errors++;
    } else if( $(inputs[i]).hasClass('pass_input') && $(inputs[i]).val().length > 0 ){

      if( $(inputs[i]).val().length < 5 ){
        $(inputs[i]).siblings('.pass_err').text('Пароль должен содержать не менее 5 символов');
        $(inputs[i]).siblings('.pass_err').show();
        $(inputs[i]).addClass('error');
        input_errors++;
      } else{
        $(inputs[i]).siblings('.pass_err').hide();
        $(inputs[i]).removeClass('error');

        if( $(inputs[i]).hasClass('pass_input__pass') ){
          pass_1 = $(inputs[i]).val();
        } else{
          pass_2 = $(inputs[i]).val();
        }

        // if( $(inputs[i]).hasClass('pass_input_new') ){
        //   pass_1 = $(inputs[i]).val();
        // } else if( $(inputs[i]).hasClass('pass_input_new_repeat') ){
        //   pass_2 = $(inputs[i]).val();
        // }
      }

    } else if( $(inputs[i]).val() == '' ){
      $(inputs[i]).addClass('error');
      input_errors++;
    } else{
      $(inputs[i]).removeClass('error');
    }
  }

  if( pass_1 != undefined && pass_2 != undefined ){
    if( pass_1 != pass_2  ){
      $('.pass_err').text('Пароли не совпадают');
      $('.pass_err').show();
      pass_equal = false;
      $('.pass_input').addClass('error');
    } else{
      pass_equal = true;
      $('.pass_err').hide();
      $('.pass_err').text('Пароль должен содержать не менее 5 символов');
      $('.pass_input').removeClass('error');
    }
  } else{
    pass_equal = false;
  }


  if( $('#accept').prop('checked') ){
    accept_check = true;
    $('.accept_err').hide();
  } else{
    accept_check = false;
    $('.accept_err').show();
  }

  if( $('.head_login').hasClass('head_login') && !$('.reg_block').hasClass('reg_block') ){
    accept_check = true;
    pass_equal  = true;
  }

  console.log("pass_equal = " + pass_equal);
  console.log("input_errors = " + input_errors);
  console.log("accept_check = " + accept_check);

  if( $(this).hasClass('sign_btn') ){
    accept_check = true;
    pass_equal = true;
  }

  if( !accept_check || input_errors != 0 || !pass_equal ){
    return false;
  }

  
});
$('.zakas-pop__prod').on("click", function(){
  $('#zakas-pop .fancybox-close-small').click();  
});

$('.pass_eye').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    $(this).siblings('input').attr('type', 'password');
  } else{
    $(this).addClass('active');
    $(this).siblings('input').attr('type', 'text');
  }
});

// Reg / Login Validate END


// Vakancy

if( $('.vakancy_list').hasClass('vakancy_list') ){
  var firstId = $('.vakancy_select').children('option').eq(0).attr('data-id');
  $('.vakancy_list').children('.table_block[data-table-id="' + firstId + '"]').show();
}

$('.vakancy_select').on("change", function(){
  // var selIndex = $(this).children('option:selected').index();
  // $('.vakancy_list').children('.table_block').hide();
  // $('.vakancy_list').children('.table_block').eq(selIndex).show();
  var setId = $(this).children('option:selected').attr('data-id');
  $('.vakancy_list').children('.table_block').hide();
  $('.vakancy_list').children('.table_block[data-table-id="' + setId + '"]').show();
});

// Vakancy END


// Compare Sync Scroll

if( $('.compare').hasClass('compare') ){
  var isSyncingLeftScroll = false;
  var isSyncingRightScroll = false;
  var compare_head = document.getElementById('compare_head');
  var compare_body = document.getElementById('compare_body');

  compare_head.onscroll = function() {
    if (!isSyncingLeftScroll) {
      isSyncingRightScroll = true;
      compare_body.scrollLeft = this.scrollLeft;
    }
    isSyncingLeftScroll = false;
  }

  compare_body.onscroll = function() {
    if (!isSyncingRightScroll) {
      isSyncingLeftScroll = true;
      compare_head.scrollLeft = this.scrollLeft;
    }
    isSyncingRightScroll = false;
  }
}


// Compare Sync Scroll END

// Toggle Block Func

function blockToggle(block, className, toggleBlock, speed){

  if( speed == undefined || speed == null ){
    speed = 500;
  }

  if( $(block).hasClass(className) ){
    $(block).removeClass(className);
    $(block).siblings(toggleBlock).slideUp(speed);
  } else{
    $(block).addClass(className);
    $(block).siblings(toggleBlock).slideDown(speed);
  }
}

// Toggle Block Func END

// Favorite FAQ

$('.favorite_question').on("click", function(){
  blockToggle( $(this), 'active', '.favorite_answer', 700);
});

// Favorite FAQ END

// Subsiding Video List

$('.video_item_head').on("click", function(){
  blockToggle( $(this), 'active', '.video_item_body', 800);
});

// Subsiding Video List END

// Read More

var open_text = 'Смотреть полностью';
var close_text = 'Скрыть';

if( $('body').hasClass('kk') ){
  open_text = 'Толық көру';
  close_text = 'Жабу';
} else if( $('body').hasClass('en') ){
  open_text = 'Read more';
  close_text = 'Hide';
}

$('.read_more').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    $(this).parent('.subsiding_text').removeClass('active');
    $(this).text(open_text);
  } else{
    $(this).addClass('active');
    $(this).parent('.subsiding_text').addClass('active');
    $(this).text(close_text);
  }
});

// Read More END

// Cabinet Media Toggle

$('.media_name').on("click", function(){
  blockToggle( $(this), 'active', '.media_body', 800);
});

// Cabinet Media Toggle END


// Chat File Input

$('.chat_file').on("mouseleave", function(){
  var input_val = $('#file_input').val();
    
  if(input_val != ""){
    input_val = input_val.slice(12);
    $('.chat_file').addClass('active');

    var dogovorName = $('#dogovor_input').val();
    console.log("input_val = " + input_val);

  } else{
    $('.chat_file').removeClass('active');
  }
});

// Chat File Input END


// Anketa Form

$('.anketa_btn').on("click", function(){
  var anketa_input = $('.anketa_form').find('.form_input');
  var anketa_errors = 0;

  for( i=0; i<anketa_input.length; i++ ){
    if( $(anketa_input[i]).val() == '' ){
      $(anketa_input[i]).addClass('error');
      anketa_errors++;
    } else{
      $(anketa_input[i]).removeClass('error');
    }
  }

  // console.log("anketa_errors = " + anketa_errors);

  if( anketa_errors != 0 ){
    $('html, body').stop().animate({ scrollTop: $('.profile_anketa').offset().top - 130 }, 1000, 'swing', function(){});
    return false;
  }
});

$('.anketa_form .form_input').on("keypress", function(){
  $(this).removeClass('error');
});

// Anketa Form END

// Main Btn Hover

$('.main_btn').on('mouseenter', function(e) {
  var parentOffset = $(this).offset(),
      relX = e.pageX - parentOffset.left,
      relY = e.pageY - parentOffset.top;
  $(this).find('span').css({top:relY, left:relX})
}).on('mouseout', function(e) {
  var parentOffset = $(this).offset(),
      relX = e.pageX - parentOffset.left,
      relY = e.pageY - parentOffset.top;
  $(this).find('span').css({top:relY, left:relX})
});

// Main Btn Hover END

function openDelCalc(){
  $('.table-area_block').slideDown(700);
  $('html, body').stop().animate({ scrollTop: $('.table-area_block').offset().top - 70 }, 1300, 'swing', function(){});
}

// Delivery Page

$('.select-row_input').on("focusout", function(){
	var target = event.target;
  if($(target).val() == 0 || $(target).val() == '' || Number($(target).val() < 0) ){
    $(target).val(1);
  }
});


var del_len = $('#delivery_list_id').children('.select-line').length;
var del_tonn = 0;
var del_kilo = 0;
var del_array = {};

var del_row = $('#delivery_list_id').children('.select-line'), 
	del_row_id = $(del_row).attr('data-id'),
	del_row_amount = $(del_row).find('.select-row_amount').val(),
	del_row_size = $(del_row).find('.select-row_size option:selected').val(),
	del_row_type = $(del_row).find('.select-row_type option:selected').val();

if( del_array.hasOwnProperty(del_row_id) ){
	// continue;
} else{
	del_array[del_row_id] = { id: del_row_id, amount: del_row_amount, size: del_row_size, type: del_row_type  };
	// console.log(del_array);
}

function addToDel(){
	// console.log((del_len - 1));
	var del_row = $('#delivery_list_id').children('.select-line').eq( (del_len - 1) ), 
		del_row_id = $(del_row).attr('data-id'),
		del_row_amount = $(del_row).find('.select-row_amount').val(),
		del_row_size = $(del_row).find('.select-row_size option:selected').val(),
		del_row_type = $(del_row).find('.select-row_type option:selected').val();

	// console.log("del_row_id = " + del_row_id);
	if( del_array.hasOwnProperty(del_row_id) ){
		// continue;
	} else{
		del_array[del_row_id] = { id: del_row_id, amount: del_row_amount, size: del_row_size, type: del_row_type  };
		// console.log(del_array);
	}
}

delUpdate();

function delUpdate(){
	// $('.select-row_amount').on("keypress, keyup", function(){
	// 	var target = event.target;
	// 	if($(target).val() == 0 || $(target).val() == '' || Number($(target).val() < 0) ){
	// 		$(target).val(1);
	// 	}

	// 	var del_amount = $(target).val();
	// 	var del_id = $(target).parent().parent().attr('data-id');
	// 	del_array[del_id].amount = del_amount;
	// 	// console.log("del_array update amount");
	// 	// console.log(del_array);
	// 	setDelTop();
	// });

  $('.select-row_amount').on("focusout", function(){
   var target = event.target;
   if($(target).val() == 0 || $(target).val() == '' || Number($(target).val() < 0) ){
     $(target).val(1);
   }

   var del_amount = $(target).val();
   var del_id = $(target).parent().parent().attr('data-id');
   del_array[del_id].amount = del_amount;
   // console.log("del_array update amount");
   // console.log(del_array);
   setDelTop();
  });

	$('.select-row_size').on("change", function(){
		var target = event.target;
		var del_size = $(target).val();
		var del_id = $(target).parent().parent().attr('data-id');
		del_array[del_id].size = del_size;
		// console.log("del_array update size sel");
		// console.log(del_array);
		setDelTop();
	});

	$('.select-row_type').on("change", function(){
		var target = event.target;
		var del_type = $(target).val();
		var del_id = $(target).parent().parent().attr('data-id');
		del_array[del_id].type = del_type;
		// console.log("del_array update type sel");
		// console.log(del_array);
		setDelTop();
	});
}


setDelTop();

function setDelTop(){
	// console.log("len = " + del_len);
	del_kilo = 0;
	del_tonn = 0;

	if( del_array !== null ){
	    for(var items in del_array){
	    	if( del_array[items]['size'] == 'kilo' ){
	    		del_kilo += Number(del_array[items]['amount']);
	    	} else if( del_array[items]['size'] == 'tonn' ){
	    		del_tonn += Number(del_array[items]['amount']);
	    	}
	    }
	}

	if( del_kilo > 1000 ){
		// console.log( (del_kilo / 1000).toFixed(3) );
		// console.log( Math.trunc( (del_kilo / 1000).toFixed(3) ) );
		// console.log( del_kilo % 1000 );

		del_tonn += Math.trunc( (del_kilo / 1000).toFixed(3) );
		del_kilo = del_kilo % 1000;
	}

	if( del_kilo != 0 ){
		$('.del-kilo').removeClass('hide');
		$('#del-ves-kilo').text(del_kilo);
	} else{
		$('.del-kilo').addClass('hide');
		$('#del-ves-kilo').text(del_kilo);
	}

	$('#del-kolvo').text(del_len);
	$('#del-ves').text(del_tonn);

	// console.log(del_array);
}

var default_del = $('#delivery_template').html();
var default_id = 2;

$('.delivery_add').on("click", function(){
  $('#delivery_list_id').append( default_del );
  del_len = $('#delivery_list_id').children('.select-line').length;
  default_id++;
  $('#delivery_template').find('.select-line').attr('data-id', default_id);
  default_del = $('#delivery_template').html();

  addToDel();
  delUpdate();
  setDelTop();
});


function del_line(){
  var target = event.target;
  $(target).parent().remove();
  var del_row_id = $(target).parent().attr('data-id');
  del_len = $('#delivery_list_id').children('.select-line').length;

  delete del_array[del_row_id];
  // console.log(del_array);
  setDelTop();
}



$('.delivery_calc_btn').on("click", function(){
	if( del_len > 0 && (del_tonn > 0 || del_kilo > 0) ){
		var way_distance = $('#way_distance option:selected').val();
		var prod_size = 0;
		var total = 0;

    var city = $('#basket_address option:selected').text();
    var address = $('#del_address').val();
    var distance = $('#way_distance option:selected').text();

		// console.log("del_tonn = " + del_tonn);
		// console.log( (del_tonn * 1000) + del_kilo );
		// del_tonn = del_tonn * 1000;
		if( ((del_tonn * 1000) + del_kilo) > 0 && ((del_tonn * 1000) + del_kilo) <= 5000 ){
			prod_size = 5;
		} else if( ((del_tonn * 1000) + del_kilo) >= 5001 && ((del_tonn * 1000) + del_kilo) < 10000 ){
			prod_size = 10;
		} else if( ((del_tonn * 1000) + del_kilo) >= 10001 && ((del_tonn * 1000) + del_kilo) < 20001 ){
			prod_size = 20;
		} else{
			prod_size = 30;
		}

    var total_size = ((del_tonn + (del_kilo / 1000)) / 20).toFixed(2);
    var fura_len = total_size.slice(0, -3);
    var gazel_len = 0;

    if( total_size.slice(-2) <= 25 && total_size.slice(-2) != 0 ){
      gazel_len = 1;
    } else if( total_size.slice(-2) != 0 ){
      fura_len++;
    }

    var gazel_price = 0;

    // console.log( "del_tonn / 20 = " + total_size );
    // console.log( "остаток = " + total_size.slice(-2) );
    // console.log( "фуры = " + fura_len );
    // console.log( "газели = " + gazel_len );
    // console.log( "------- " );

    if( way_distance == 0 ){
      $('.delivery_error').addClass('active');
      $('.delivery_total').removeClass('active');
      return;
    }

		if( way_distance == 'more' ){
			// console.log("request");
			// console.log("way_distance = " + way_distance);
			// console.log("prod_size = " + prod_size);
			// alert("request");
      $.fancybox.open( $('#zayavka_delivery') );
      delivery_table();
		} else{
			if( way_distance == 100 ){
				if( prod_size == 5  ){
					total = 550 * way_distance;
				} else{
					total = 900 * way_distance;
				}
        gazel_price = 550 * way_distance;

			} else if( way_distance == 200 ){
				if( prod_size == 5  ){
					total = 500 * way_distance;
				} else{
					total = 800 * way_distance;
				}
        gazel_price = 500 * way_distance;

			} else if( way_distance == 300 ){
				if( prod_size == 5  ){
					total = 450 * way_distance;
          gazel_price = total;
				} else{
					total = 700 * way_distance;
				}
        gazel_price = 450 * way_distance;
			}

      if( fura_len != 0 ){
        total = total * fura_len;
        
        if( gazel_len != 0 ){
          total = total + gazel_price;
        }
      }


      $('.delivery_total span').text( total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") );
      $('.delivery_total').addClass('active');
      $('.delivery_error').removeClass('active');

      $('#mesto').text(city); 
      $('#address').text(address);
      $('#distance').text(distance);

      $('.tabs').children('.tabs__item.active').removeClass('active').hide();
      $('.tabs').children('.tabs__item').eq(2).addClass('active').show();
      $('.shaq-ul').children('li.active').removeClass('active');
      $('.shaq-ul').children('li').eq(2).addClass('active');
		}
	}
});

function delivery_table(){
  var del_prod = $('#delivery_list_id').find('.select-line');
  var del_table = '<table border="1" cellspacing="0" cellpadding="5"><thead><tr> <th>Наименование</th> <th>Количество</th> <th>Вес</th> <th>Упаковка</th> </tr></thead>';

  for( i=0; i<del_prod.length; i++ ){
    del_table += '<tr><td>' + $(del_prod[i]).find('.select-row_prod option:selected').text() + '</td>';
    del_table += '<td>' + $(del_prod[i]).find('.select-row_amount').val() + '</td>';
    del_table += '<td>' + $(del_prod[i]).find('.select-row_size option:selected').text() + '</td>';
    del_table += '<td>' + $(del_prod[i]).find('.select-row_type option:selected').text() + '</td></tr>';
  }

  del_table += '</table>\n';

  var del_info = '<p>Место отгрузки: ' + $('#basket_address option:selected').text() + '</p>\n';
  del_info += '<p>Область доставки: ' + $('#del_region option:selected').text() + '</p>\n';
  del_info += '<p>Точный адрес: ' + $('#del_address').val() + '</p>\n';
  del_info += '<p>Расстояние: ' + $('#way_distance option:selected').text() + '</p>\n';


  $('#delivery_area').text(del_table + del_info);
}

// Delivery Page END

// Prodcuts Quiz

$('.quiz_btn').on("click", function(){
  var quest_len = $('.quiz_form').find('.quiz_item').length;
  var quest_error = 0;

  for( i=0; i<quest_len; i++ ){
    if( $('.quiz_item').eq(i).find('.quiz_text_input').hasClass('quiz_text_input') ){

      if( $('.quiz_item').eq(i).find('.quiz_text_input').val() == '' ){
        if( $('.quiz_option input[data-name="q_' + (i + 1) +'"]:checked').length == 0 ){
          $('.quiz_item').eq(i).find('.quiz_name').addClass('error');
          quest_error++;
        }
      } else{
        $('.quiz_item').eq(i).find('.quiz_name').removeClass('error');
      }

    } else{

        if( $('.quiz_option input[data-name="q_' + (i + 1) +'"]:checked').length > 0 ){
          $('.quiz_option input[data-name="q_' + (i + 1) +'"]').parent().siblings('.quiz_name').removeClass("error");
        } else{
          $('.quiz_option input[data-name="q_' + (i + 1) +'"]').parent().siblings('.quiz_name').addClass("error");
          quest_error++;
        }

    }
  }

  // console.log("quest_error = " + quest_error);

  if( quest_error > 0 ){
    $('html, body').stop().animate({ scrollTop: $('.quiz_form').offset().top - 150 }, 1000, 'swing', function(){});
    return false;
  }
});

$('.quiz_option').on("click", function(){
  $(this).siblings('.quiz_name').removeClass('error');
});

$('.close_quiz_pop').on("click", function(){
  $('.quiz_popup, .quiz_pop_bg').removeClass('active');
});


// Prodcuts Quiz END



// Cabinet Scroll

var head_size = $('.header_top').outerHeight() + 20;

$(window).resize(function(){
  head_size = $('.header_top').outerHeight() + 20;

  if( $('.header_top .container').width() > 700 ){
    cab_scroll = true
  } else{
    cab_scroll = false;
    $('.cab_sidebar_block').children('.sticky').css("top", 0).removeClass('sticky');
  }
});

var cab_scroll = true;

if( $('.header_top .container').width() > 700 ){
  cab_scroll = true
} else{
  cab_scroll = false;
}


(function(){
var a = document.querySelector('.cab_sidebar_block'), b = null, P = head_size;  // если ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента. Может быть отрицательным числом
window.addEventListener('scroll', Ascroll, false);
document.body.addEventListener('scroll', Ascroll, false);
function Ascroll() {

  if( cab_scroll && $('.cabinet').hasClass('cabinet') ){
    if (b == null) {
      var Sa = getComputedStyle(a, ''), s = '';
      for (var i = 0; i < Sa.length; i++) {
        if (Sa[i].indexOf('overflow') == 0 || Sa[i].indexOf('padding') == 0 || Sa[i].indexOf('border') == 0 || Sa[i].indexOf('outline') == 0 || Sa[i].indexOf('box-shadow') == 0 || Sa[i].indexOf('background') == 0) {
          s += Sa[i] + ': ' +Sa.getPropertyValue(Sa[i]) + '; '
        }
      }
      b = document.createElement('div');
      b.style.cssText = s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
      a.insertBefore(b, a.firstChild);
      var l = a.childNodes.length;
      for (var i = 1; i < l; i++) {
        b.appendChild(a.childNodes[1]);
      }
      a.style.height = b.getBoundingClientRect().height + 'px';
      a.style.padding = '0';
      a.style.border = '0';
    }
    var Ra = a.getBoundingClientRect(),
        R = Math.round(Ra.top + b.getBoundingClientRect().height - document.querySelector('footer').getBoundingClientRect().top + 80);  // селектор блока, при достижении верхнего края которого нужно открепить прилипающий элемент;  Math.round() только для IE; если ноль заменить на число, то блок будет прилипать до того, как нижний край элемента дойдёт до футера
    if ((Ra.top - P) <= 0) {
      if ((Ra.top - P) <= R) {
        b.className = 'stop';
        b.style.top = - R +'px';
      } else {
        b.className = 'sticky';
        b.style.top = P + 'px';
      }
    } else {
      b.className = '';
      b.style.top = '';
    }
    window.addEventListener('resize', function() {
      a.children[0].style.width = getComputedStyle(a, '').width
    }, false);
  }
  
}
})()


// Cabinet Scroll END


// Cabinet Print

$('.zakas-btn--print').on("click", function(){
  print();
});

// Cabinet Print END

$('.prog_btn').on("click", function(){
  var name = $(this).siblings('.buy_circle_name').text().replace(/"/g,"");
  console.log( name );
  $('#zayavka').find('#program').val(name);
});


// Cabinet Anketa Crop List

var crop_next = [],
  crop_prev = [],
  crop_next_names = '',
  crop_prev_names = '';

function anketaCrops(){
  var next_crop_checked = $('#next_crop').find('.crop_item.active');
  var prev_crop_checked = $('#prev_crop').find('.crop_item.active');

  for( i=0; i<next_crop_checked.length; i++ ){
    crop_next.push( $(next_crop_checked[i]).children('span').text() );
  }

  for( i=0; i<prev_crop_checked.length; i++ ){
    crop_prev.push( $(prev_crop_checked[i]).children('span').text() );
  }

  setCrops();

  // console.log("next_crop_checked len = " + next_crop_checked.length);
  // console.log("prev_crop_checked len = " + prev_crop_checked.length);
  // console.log("crop_next = " + crop_next);
  // console.log("crop_prev = " + crop_prev);
}

// anketaCrops(); - вызывается в doc.ready

$('.crop_item').on("click", function(){
  
  var crop_name = $(this).find('span').text();
  
  // if( $(this).hasClass('active') ){


  //   if( $(this).parent().parent().attr('id') == 'next_crop' ){
  //     if( crop_next.indexOf(crop_name) < 0 ){
  //       crop_next.push(crop_name);
  //     } else{
  //       crop_next.splice(crop_next.indexOf(crop_name), 1);
  //     }
  //   } else{
  //     if( crop_prev.indexOf(crop_name) < 0 ){
  //       crop_prev.push(crop_name);
  //     } else{
  //       crop_prev.splice(crop_prev.indexOf(crop_name), 1);
  //     }
  //   }
  // }

  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    if( $(this).parent().parent().attr('id') == 'next_crop' ){
      crop_next.splice(crop_next.indexOf(crop_name), 1);
    } else{
      crop_prev.splice(crop_prev.indexOf(crop_name), 1);
    }
  } else{
    $(this).addClass('active');
    if( $(this).parent().parent().attr('id') == 'next_crop' ){
      crop_next.push(crop_name);
    } else{
      crop_prev.push(crop_name);
    }
  }
  // console.log("crop_next");
  // console.log(crop_next);
  // console.log("crop_prev");
  // console.log(crop_prev);
});

$('.crop_btn').on("click", function(){
  setCrops();
  $('.crop_pop').children('.fancybox-close-small').click();
  console.log("----");
  console.log("Засеваемая");
  console.log(crop_next);
  console.log("Предыдущая");
  console.log(crop_prev);
  console.log("----");
});


function setCrops(){
  crop_next_names = '';
  crop_prev_names = '';

  for( i=0; i<crop_next.length; i++ ){
    if( i > 0 ){
      crop_next_names += ', ';
    }
    crop_next_names += crop_next[i];
  }

  for( i=0; i<crop_prev.length; i++ ){
    if( i > 0 ){
      crop_prev_names += ', ';
    }
    crop_prev_names += crop_prev[i];
  }

  $('.next_crop').attr('value', crop_next_names);
  $('.next_crop').attr('data-value', crop_next_names);
  $('.prev_crop').attr('value', crop_prev_names);
  $('.prev_crop').attr('data-value', crop_prev_names);
}

// Cabinet Anketa Crop List END

// Cabinet Anketa Edit Btn

$('.anketa_edit').on("click", function(){
  $(this).addClass('hide');
  $('.anketa_form').removeClass('disabled');
  $('.anketa_save').removeClass('hide');
});

// Cabinet Anketa Edit Btn END


// KP Download PDF

// $('.zakas-btn--download').on("click", function(){
//   var html_elem_new = $('.cab-area').clone();
//   var doc = new jsPDF('p','pt','a4');

//   $(html_elem_new).find('.zakas-top__right').remove();
//   $(html_elem_new).find('.zakas-bot').remove();
//   $(html_elem_new).css("border-radius", 0);
//   $(html_elem_new).appendTo('#kp_block');

//   var html_element = $('#kp_block');

//   doc.addHTML(html_element, function() {
//       doc.save('KP_KazChem.pdf');
//   });

//   setTimeout(function(){
//     $('#kp_block').hide();
//     $('#kp_block').html('');
//     $('#kp_block').show();
//   }, 1000);

// });

// KP Download PDF END
