<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Cache\Cache;
use Cake\I18n\Time;
use Cake\Utility\Security;

class LoginController extends Controller
{
    public $url;

    public function initialize() {
        parent::initialize();
        $this->url = Router::url('/', true);
        $base_url = $this->url;
        $this->set(compact('base_url'));
    }

    /**
	* Chức năng funtion: xóa session khi logout
	* @return <Trang chủ login>
	*/
    public function index() {
        $session = $this->request->getSession();
        if ($session->check('user')) {
            $session->delete('user');
        }
    }

    /**
	* Chức năng funtion: kiểm tra tài khoản login
	
	* @return <Trang danh sách tk nếu đúng, sai trả về trang login>
	*/
    public function checkUserLogin() {
        $data = $this->request->getData();
        $hashPassword = Security::hash($data['password'], 'md5');
        $userEmail = $data['email'];
        $this->loadModel('Users');
        $result = $this->Users->find('all', [
            'conditions' => [
                'email' => $userEmail,
                'password' => $hashPassword
            ]
        ]);
        if ($result->first() == NULL || !$result->first()['active']) {
            $this->set('err', 'Sai tài khoản hoặc mật khẩu');
            $this->render('index');
        } else {
            $user = $result->first();
            $session = $this->request->getSession();
            $session->write('user', ['name' => $user['name'],
             'avatar' => $user['avatar'], 'id' => $user['id']]);
            if ($user->countLogin == 0) {
                $user->firstTimeLogin = Time::now()->i18nFormat('dd-MM-yyyy HH:mm:ss');
            }
            $user->lastTimeLogin = Time::now()->i18nFormat('dd-MM-yyyy HH:mm:ss');
            $user->countLogin += 1;
            $this->Users->save($user);
            $this->redirect([
                'controller' => 'Users',
                'action' => 'index'
            ]);
        }
    }
}