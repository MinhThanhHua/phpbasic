<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Routing\Router;

class UsersController extends Controller
{
    public $url;
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('adminLayout');
        $this->url = Router::url('/', true);
        $base_url = $this->url;
        $this->set(compact('base_url'));
    }

    // hiển thị trang chủ admin
    public function index()
    {
        $this->set('title', 'Admin');
        $data = $this->Users->find('all', [
            'order' => ['id'=>'desc']
        ])->toArray();
        $this->set('data', $data);
    }

    // hiển thị trang thêm user
    public function showFormInsert() {
        $this->render('insert_user');
    }

    // nhận value từ form và thêm vào cơ sở dữ liệu, nếu có lỗi sẽ xuất ra
    public function insertUser()
    {
        $data = $this->request->getData();
        $user = $this->Users->newEntity();
        $user->name = $data['name'];
        $user->sex = $data['sex'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->avatar = $data['avatar'];
        $user->address = $data['address'];
        $user->password = $data['password'];
        $user->active = false;
        $user->firstTimeLogin = Time::now();
        $data = json_decode($user, true);
        $this->loadModel('Users');
        $validation = $this->Users->newEntity($data);
        $validationErr = $validation->getErrors();
        if (!empty($validationErr)) {
            $this->set(compact('validationErr'));   
        } else {
            $this->Users->save($user);
        }
    }

    public function deleteUser($id) {
        $this->autoRender = false;
        $data = $this->Users->get($id);
        $this->Users->delete($data);

        $this->index();
        
    }
}