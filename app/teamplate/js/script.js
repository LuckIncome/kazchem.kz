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
    autoplay: false,
    arrows: false,
    dots: false,
    fade: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    // appendDots: $('.bank_gal_control'),
    // appendArrows: $('.bank_gal_control'),
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.main_img_silder',
    // prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    // nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
    // responsive:[{
    //   breakpoint: 800,
    //   settings:{
    //     slidesToShow: 2,
    //   }
    // },
    // {
    //   breakpoint: 500,
    //   settings:{
    //     slidesToShow: 1,
    //   }
    // }]
  });

  $('.agro_text_slider').slick({
    autoplay: false,
    arrows: true,
    dots: false,
    fade: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    appendArrows: $('.agro_arrows'),
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.main_img_silder',
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
  });

  if( $('.agro_text_slider').hasClass('agro_text_slider') ){
    $('.main_img_silder').slick({
      autoplay: false,
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
      asNavFor: '.agro_text_slider',
    });
  } else{
    $('.main_img_silder').slick({
      autoplay: false,
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

  // $('.main_img_silder').slick({
  //   autoplay: false,
  //   arrows: false,
  //   dots: true,
  //   dotsClass: 'main_dots',
  //   appendDots: $('.main_img_dots'),
  //   pauseOnHover: false,
  //   pauseOnFocus: false,
  //   fade: true,
  //   speed: 50,
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   asNavFor: '.main_text_slider',
  // });

  $('.comment_slider').slick({
    autoplay: false,
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
    autoplay: false,
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
    autoplay: false,
    arrows: true,
    dots: false,
    // fade: true,
    pauseOnHover: false,
    pauseOnFocus: false,
    speed: 1000,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick_arrow slick_prev"></button>',
    nextArrow: '<button type="button" class="slick_arrow slick_next"></button>',
  });

  mainSlider();

  leafRandom();

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

  $('input[type="tel"]').mask('+7 (999) 999 99 99');

  $('.way').waypoint({
    handler: function() {
    $(this.element).addClass("way--active");
    },
    offset: '90%'
  });
 
});  

$(document).on("click", function(event){
  var target = event.target;

  if( !$(target).hasClass('lang_choice') && !$(target).hasClass('lang_icon') && !$(target).hasClass('lang_choice_name') ){
    $('.other_lang').slideUp();
    $('.lang_block').removeClass('active');
  }

  if( !$(target).hasClass('mob_menu') && !$(target).hasClass('menu_btn') && !$(target).hasClass('menu_btn_span') && !$(target).hasClass('menu_link') ){
    $('.mob_menu').removeClass('active');
    $('.under_nav').slideUp(700);
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

$('.mob_menu').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    $('.under_nav').slideUp(700);
  } else{
    $(this).addClass('active');
    $('.under_nav').slideDown(700);
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

$('.filter_check').on("click", function(){
  if( $(this).children('input').prop("checked") ){
    $(this).removeClass('active');
    $(this).children('input').prop("checked", false);
  } else{
    $(this).addClass('active');
    $(this).children('input').prop("checked", true);
  }
});

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

function tabContentHeight(){
  $('.prod_content_block').height( $('.prod_content.active').outerHeight() );
}

tabContentHeight();

// Catalog Inner Tab END


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
    itemCount = 1; // кол-во товара

     // сумма товара

  if( $(this).hasClass('prod_icon_shop') ){
    itemTitle = $(this).parent().parent().siblings('.prod_name').text(); // название товара
    itemImg = $(this).parent().siblings('img').attr('src'); // картинка товара
    itemText = $(this).parent().parent().siblings('.prod_text').html(); // описание товара
    itemHref = $(this).parent().parent().siblings('.prod_name').attr('href'); // ссылка на страниу товара
  }

  var cartLen = getCartLen() || 0; // получаем кол-во товаров в корзине или ставим значение 0
  $('.basket_num').text(cartLen);


  if( cartData.hasOwnProperty(itemId) ){ // если такой товар уже в корзине, то добавляем +1 к его количеству
    // cartData[itemId][5] += Number(itemCount);
    // cartData[itemId][6] = cartData[itemId][5] * cartData[itemId][4];
  } else{ // если товара в корзине еще нет, то добавляем в объект
    cartData[itemId] = [itemId, itemTitle, itemImg, itemText, itemHref, itemCount];
    cartLen++;
    $('.basket_num').text(cartLen);
    
  }

  if( setCartData(cartData, cartLen) ){ // Обновляем данные в LocalStorage
    this.disabled = false; // разблокируем кнопку после обновления LS
  }

  return false;
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


// Устанавливаем второй обработчик события на каждую иконку продукта "Добавить в корзину"
for(var i = 0; i < itemBoxInner.length; i++){
  addEvent(itemBoxInner[i].querySelector('.prod_icon_shop'), 'click', addToCart); // внутр страница

  var cartData = getCartData();
  var itemInnerId = $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_shop').attr('data-id');

  if( cartData != null && cartData.hasOwnProperty(itemInnerId) ){
    $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_shop').children('.prod_icon_text').text("Товар в корзине");
    $(itemBoxInner[i]).children('.prod_img').children('.prod_icon').children('.prod_icon_shop').addClass('disabled');
  }
}


// Открываем корзину со списком добавленных товаров
function openCart(e){
  var cartData = getCartData(), // вытаскиваем все данные корзины
  totalItems = '';

  var cartLen = getCartLen(); // получаем кол-во товаров в корзине
  $('.basket_num').text(cartLen);
  $('.basket_form_count').text(cartLen);

  var svg_icon = '<svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M35.284 5.42859H25.7841V4.07142C25.7841 1.82284 23.9613 0 21.7127 0H16.2841C14.0355 0 12.2127 1.82284 12.2127 4.07142V5.42859H2.71264C1.96308 5.42859 1.35547 6.0362 1.35547 6.78576C1.35547 7.53531 1.96316 8.14285 2.71264 8.14285H4.18781L6.78406 36.7663C6.84808 37.4672 7.4374 38.0028 8.14123 38H29.8555C30.5594 38.0029 31.1486 37.4673 31.2127 36.7663L33.8089 8.14285H35.2841C36.0337 8.14285 36.6413 7.53523 36.6413 6.78568C36.6413 6.03612 36.0336 5.42859 35.284 5.42859ZM14.9269 4.07142C14.9269 3.32187 15.5345 2.71426 16.2841 2.71426H21.7127C22.4622 2.71426 23.0698 3.32187 23.0698 4.07142V5.42859H14.927V4.07142H14.9269ZM28.6164 35.2856H9.38031L6.9198 8.14285H13.5698H31.0837L28.6164 35.2856Z" fill="black"/><path d="M14.9308 31.1235C14.9306 31.1217 14.9305 31.1198 14.9304 31.118L13.5732 12.118C13.52 11.3685 12.8692 10.804 12.1197 10.8572C11.3702 10.9104 10.8057 11.5612 10.8589 12.3107L12.2161 31.3107C12.2668 32.0223 12.8598 32.5733 13.5733 32.5714H13.671C14.4187 32.5195 14.9828 31.8713 14.9308 31.1235Z" fill="black"/><path d="M18.9978 10.8572C18.2482 10.8572 17.6406 11.4648 17.6406 12.2143V31.2143C17.6406 31.9639 18.2482 32.5715 18.9978 32.5715C19.7474 32.5715 20.355 31.9639 20.355 31.2143V12.2143C20.355 11.4648 19.7474 10.8572 18.9978 10.8572Z" fill="black"/><path d="M25.8807 10.8572C25.1312 10.804 24.4805 11.3685 24.4273 12.118L23.0701 31.118C23.0152 31.8655 23.5766 32.516 24.3241 32.571C24.3264 32.5711 24.3286 32.5713 24.3309 32.5714H24.4273C25.1407 32.5733 25.7338 32.0223 25.7844 31.3107L27.1416 12.3107C27.1948 11.5612 26.6303 10.9105 25.8807 10.8572Z" fill="black"/></svg>';

  // если что-то в корзине уже есть, начинаем формировать данные для вывода
  if( cartData !== null ){
    totalItems = '<div class="basket_head"><div class="basket_head_item">Товары</div><div class="basket_head_item basket_head_second">Кол-во</div> <div class="basket_head_item basket_head_third">Ед. измерения</div> <div class="basket_head_item basket_head_last">Упаковка</div></div><div class="basket_body">';
    for(var items in cartData){
      totalItems += '<div class="basket_row">';
      totalItems += '<a class="basket_img" href="' + cartData[items][4] + '"><img src="' + cartData[items][2] + '" alt=""></a>';
      totalItems += '<div class="basket_text"><a class="basket_name" href="' + cartData[items][4] + '">' + cartData[items][1] + '</a><div class="text_item">' + cartData[items][3] + '</div></div>';
      totalItems += '<div class="basket_amount"><span class="amount_btn remove"></span><input class="basket_summ" type="number" value="' + cartData[items][5] + '"><span class="amount_btn add"></span></div>';
      totalItems += '<select class="basket_sel"><option value="">Тонн</option><option value="">Килограмм</option></select><select class="basket_sel"><option value="">Мешки</option></select>';
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
    $('.basket').html('<div class="small_title">В корзине пусто</div>');
  }

  return false;
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
    $('.basket').html('<div class="small_title">В корзине пусто</div>');
  }
}

var cartLen = getCartLen(); // получаем кол-во товаров в корзине
if( cartLen == null ){
  cartLen = 0;
}
$('.basket_num').text(cartLen);


// Basket END


// Video Btn click

$('.comment_video_img').on("click", function(){
  $(this).fadeOut(800);
  var src = $(this).siblings('iframe').attr('src');
  $(this).siblings('iframe').attr('src', src + '?autoplay=1');
});

// Video Btn click END



// Reg / Login Validate


$('.login_btn').on("click", function(){
  var inputs = $('.login_body').find('.form_input');
  var input_errors = 0;

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

  // if( $(this).hasClass('pass_edit') ){
  //   accept_check = true;
  // }

  if( !accept_check || input_errors != 0 || !pass_equal ){
    return false;
  }

  
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


// Favorite FAQ

$('.favorite_question').on("click", function(){
  if( $(this).hasClass('active') ){
    $(this).removeClass('active');
    $(this).siblings('.favorite_answer').slideUp(700);
  } else{
    $(this).addClass('active');
    $(this).siblings('.favorite_answer').slideDown(700);
  }
});

// Favorite FAQ END

