<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="/css/admin/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="/css/admin/ionicons.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="/css/admin/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/css/admin/adminlte.min.css?v=1.12">
	<link rel="stylesheet" href="/js/admin/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<?php
		echo $this->Html->meta('icon');
		if(isset($login) && !empty($login)){
			// echo $this->Html->css(array('cake.generic'));
		}

		echo $this->Html->script(array('ckeditor/ckeditor', 'admin/admin_script', 'admin/jquery.imgareaselect'));
		echo $this->fetch('meta');
	?>
</head>
<?php if(isset($login) && !empty($login)): ?>
	<body class="hold-transition sidebar-mini layout-fixed">
	    <!-- Site wrapper -->
	    <div class="wrapper">
	      <!-- Navbar -->
	      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
	        <!-- Left navbar links -->
	        <ul class="navbar-nav">
	          <li class="nav-item">
	            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
	          </li>
	          <li class="nav-item d-none d-sm-inline-block">
	            <a href="/" class="nav-link">Перейти на сайт</a>
	          </li>
	         
	        </ul>

	       
	        
	      </nav>
	      <!-- /.navbar -->

	      <!-- Main Sidebar Container -->
	    <aside class="main-sidebar sidebar-dark-primary elevation-4" >
       
        <a href="/" class="brand-link">
          <img src="/img/admin_img/admin_logo.svg"
               alt="AdminLTE Logo"
               class="brand-image "
              >
   
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="/img/admin_img/technical-support.svg" class="img-circle " alt="User Image">
            </div>
            <div class="info">
              <div class="d-block" style="color:#fff"><?php echo $adminname['User']['username']?></div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="/admin/baskets" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>Заказы</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    О компании
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/admin/teams" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Команда
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/partners" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Партнеры</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/reviews" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Отзывы</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/vacancies" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Вакансии</p>
                      </a>
                    </li>
                </ul>
              </li>  
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Продукция
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/products" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Продукты</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/types" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Виды</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/shapes" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Формы </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/periods" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Период </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/crops" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Культуры </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/manufacturers" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Производители </p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Услуги
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">                                      
                  <li class="nav-item">
                    <a href="/admin/docs?type=%D0%9F%D1%80%D0%B0%D0%B2%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B1%D0%B0%D0%B7%D0%B0" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Субсидирование - Правовая база
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/videos?type=Видеоинструкции" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Субсидирование - Видеоинструкции
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/comps" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Элементы
                      </p>
                    </a>
                  </li>  
                </ul>  
              </li>                
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Личный кабинет
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Пользователи
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/users/anketa" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Анкета
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/seminars" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Семинары 
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/dialogs" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                        Чат
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/docs?type=Медиатека" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Медиатека - Файлы
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/admin/videos?type=Видео" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                         Медиатека - Видео
                      </p>
                    </a>
                  </li>
                </ul>
              </li> 
              <li class="nav-item">
                <a href="/admin/news" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Новости 
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/shares" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Акции 
                  </p>
                </a>
              </li>
             <!--  <li class="nav-item">
                <a href="/admin/static_pages" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Статичные страницы
                  </p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="/admin/slides" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Слайдер на главной
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/subscribers" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Подписчики
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/questionnaires" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                     Опросник
                  </p>
                </a>
              </li>
              <li class="nav-item">
                  <a href="/users/logout" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                       Выход
                    </p>
                  </a>
                </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

	      <!-- Content Wrapper. Contains page content -->
	      <div class="content-wrapper">
	        <!-- Content Header (Page header) -->
	        <!-- Main content -->
	        <section class="content">
	            <?php echo $this->Session->flash('good'); ?>
      				<?php echo $this->Session->flash('bad'); ?>
      				<?php echo $this->fetch('content'); ?>
	        </section>
	        <!-- /.content -->
	      </div>
	      <!-- /.content-wrapper -->

	      <footer class="main-footer">
	       
	        <strong>Разработка сайтов в   <a href="https://astanacreative.kz/">AstanaCreative.kz</a>.</strong> 
	      </footer>

	    </div>
	    <!-- ./wrapper -->

	    <!-- jQuery -->
	    <script src="/js/admin/jquery/jquery.min.js"></script>
	    <!-- Bootstrap 4 -->
	    <script src="/js/admin/bootstrap/js/bootstrap.bundle.min.js"></script>
	    <!-- overlayScrollbars -->
	    <script src="/js/admin/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	    <!-- AdminLTE App -->
	    <script src="/js/admin/adminlte.min.js"></script>
	    <script src="/js/admin/bs-custom-file-input/bs-custom-file-input.min.js"></script>
	    <!-- AdminLTE for demo purposes -->
	    <script src="/js/admin/inputmask/min/jquery.inputmask.bundle.min.js"></script>
		<!-- date-range-picker -->
		<script src="/js/admin/moment/moment-with-locales.min.js"></script>
		<script src="/js/admin/daterangepicker/daterangepicker.js"></script>
		<script src="/js/admin/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	    <script src="/js/admin/demo.js"></script>
	    <script type="text/javascript">
			$(document).ready(function () {
			  bsCustomFileInput.init();
			});
			$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		    //Datemask2 mm/dd/yyyy
		    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		    //Money Euro
		    $('[data-mask]').inputmask()

		    //Date range picker
		   $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
    locale: 'ru'

    });
		</script>
	</body>

<?php else: ?>
	
	<div class="login-page">
		<div class="form">
			<?php echo $this->Session->flash('good'); ?>
			<?php echo $this->Session->flash('bad'); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
<?php endif ?>

</html>
