<?php


App::uses('Controller', 'Controller');


class AppController extends Controller {

	public $uses = array('App', 'Setting','User','News','Partner','CommonComponent');

	public $components = array('DebugKit.Toolbar', 'Session', 'Cookie','Auth' => array(
            'loginRedirect' => '/users/profile',
            'logoutRedirect' => '/',
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            ),
            'authorize' => array('Controller'),
            'authError' => 'Вы не имеете прав доступа к данной странице'
        ));

	public $helpers = array('Html', 'Form', 'Session');

	public function isAuthorized($user) {
	    // Admin can access every action
	    if (isset($user['role']) && $user['role'] === 'admin') {
	        return true;
	    }

	    // Default deny
	    return false;
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
		$admin = (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'admin') ? 'admin/' : false;
		if(!$admin) $this->Auth->allow();
		$login = $this->Auth->login();
		// $cabinet = (isset($this->request->params['prefix']) && $this->request->params['prefix'] == 'cabinet') ? 'cabinet/' : false;
		// if(!$cabinet) $this->Auth->allow();
		// debug($admin);
		if(isset($this->params['language']) && $this->params['language'] == 'kz'){
            Configure::write('Config.language', 'kz');
            $this->Session->write('lang',  'kz');
        }elseif(isset($this->params['language']) && $this->params['language'] == 'en'){
            Configure::write('Config.language', 'en');
            $this->Session->write('lang',  'en');
        }else{
            Configure::write('Config.language', 'ru');
        }
		if($admin){
			$this->layout = 'default';
		}else{
			$this->layout = 'index';
		}
		$adminlogin = $this->User->find('all', array(
			'conditions' => array('User.role ' => 'admin'),
		));
		$l = Configure::read('Config.language');
		$lang = ($this->params['language']) ? $this->params['language'] . '/' : '';
		$adminname = $adminlogin[0];
		$params = $this->Setting->find('first');
		$params = $params['Setting'];
		
		$this->News->locale = Configure::read('Config.language');
		$this->Partner->locale = Configure::read('Config.language');
		$sidebar = $this->News->find('all', array(
			'order' => array('News.date' => 'desc'),
			'limit' => 3,
		));
		$partners=  $this->Partner->find('all');
		$controller = $this->request->params['controller'];

		$current_user = $this->Auth->user();
		if($current_user){
			$current_user = $this->User->findById($current_user['id']);
			$current_user = $current_user['User'];
			//Проверка почты
			if( $current_user['active_email'] == 0){
				$this->Session->setFlash('Необходимо активировать свой логин на почте! Мы отправили вам письмо. <br><br><a style="color:#007cff;border-decoration:underline" href="/users/send_activation_email">Я не получил письмо, отправить еще раз активационное письмо</a>', 'default', array(), 'good');
				return $this->redirect($this->Auth->logout());
			}
		}

		$this->set(compact('admin', 'lang', 'l', 'login', 'params', 'cookie','login','adminname','sidebar','partners','controller' ));

	}
}
