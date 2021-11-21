<?php

	Router::connect('/admin/users/:action', array('controller' => 'users','admin' => true));
	Router::connect('/admin', array('controller' => 'pages', 'action' => 'welcome', 'admin' => true));
	Router::connect('/feedback', array('controller' => 'feedbacks', 'action' => 'index'));
	Router::connect('/page/*', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/admin/anketa', array('controller' => 'users', 'action' => 'anketa', 'admin' => true));
	Router::connect('/contacts', array('controller' => 'pages', 'action' => 'contacts'));
	Router::connect('/blog', array('controller' => 'news', 'action' => 'index'));
	Router::connect('/blog/*', array('controller' => 'news', 'action' => 'view'));
	Router::connect('/static_page/*', array('controller' => 'static_pages', 'action' => 'view'));
	Router::connect('/designer/*', array('controller' => 'designers', 'action' => 'view'));
	Router::connect('/collection/*', array('controller' => 'collections', 'action' => 'view'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/faq', array('controller' => 'categories', 'action' => 'index'));
	
	Router::connect('/faq/*', array('controller' => 'categories', 'action' => 'view'));
	
	Router::connect('/products', array('controller' => 'products', 'action' => 'index'));
	Router::connect('/product/*', array('controller' => 'products', 'action' => 'view'));
	Router::connect('/:language/partners', 
		array('controller' => 'partners', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/products', 
		array('controller' => 'products', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);

	Router::connect('/:language/product/*', 
		array('controller' => 'products', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/static_page/*', 
		array('controller' => 'static_pages', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/vacancies', 
		array('controller' => 'vacancies', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/faqs', 
		array('controller' => 'faqs', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/planjobs', 
		array('controller' => 'planjobs', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/npas', 
		array('controller' => 'npas', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/npaprojects', 
		array('controller' => 'npaprojects', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/gosservices', 
		array('controller' => 'gosservices', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/statistics', 
		array('controller' => 'statistics', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/stateprocurements', 
		array('controller' => 'stateprocurements', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/expertises', 
		array('controller' => 'expertises', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/expertises/view/*', 
		array('controller' => 'expertises', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/news', 
		array('controller' => 'news', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/news/view/*', 
		array('controller' => 'news', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/maps/view/*', 
		array('controller' => 'maps', 'action' => 'view'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/page/*', 
		array('controller' => 'pages', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language', 
		array('controller' => 'pages', 'action' => 'home'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/login', 
		array('controller' => 'users', 'action' => 'login'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/search', 
		array('controller' => 'search', 'action' => 'index'),
		array('language' => '[a-z]{2}')
	);
	Router::connect('/:language/users/view_order/*', 
		array('controller' => 'users', 'action' => 'view_order'),
		array('language' => '[a-z]{2}')
	);
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
