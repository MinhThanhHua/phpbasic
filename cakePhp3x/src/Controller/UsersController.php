<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\Routing\Router;
use Cake\Validation\Validator;
use Cake\Controller\Component\PaginatorComponent;
use Cake\View\Helper;
use Cake\Mailer\Email;
use Cake\Utility\Security;

class UsersController extends Controller
{
    public $url;
    public $paginate = [
        'limit' => '5'
    ];

    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->setLayout('adminLayout');
        $this->url = Router::url('/', true);
        $base_url = $this->url;
        $this->set(compact('base_url'));
        $this->loadComponent('Paginator');
        
    }

    /**
    * Chức năng funtion: chạy trang chủ user, lọc tìm kiếm
    * return thông tin user
	*/
    public function index()
    {
        $name = $this->request->getQuery('Name');
        $email = $this->request->getQuery('Email');
        $phone = $this->request->getQuery('Phone');
        $address = $this->request->getQuery('Address');
        $id = ($this->request->getQuery('Id'));
        $sex = $this->request->getQuery('Sex');
        $active = $this->request->getQuery('Active');

        if (!empty($name) || !empty($email) || !empty($phone) || !empty($address) ||
        is_numeric($active) || is_numeric($sex) ) {
            $this->paginate = [
                'conditions' => [   
                    'name LIKE' =>'%' . $name . '%',
                    'email LIKE' =>'%' . $email . '%',
                    'phone LIKE' => '%' . $phone . '%',
                    'address LIKE' => '%' . $address . '%',
                ]
            ];
            if (is_numeric($active)) {
                $this->paginate = [
                    'conditions' => [  
                    'name LIKE' =>'%' . $name . '%',
                    'email LIKE' =>'%' . $email . '%',
                    'phone LIKE' => '%' . $phone . '%',
                    'address LIKE' => '%' . $address . '%', 
                    'active ' => $active
                    ]
                ]; 
            }
            if (is_numeric($sex)) {
                $this->paginate = [
                    'conditions' => [   
                        'name LIKE' =>'%' . $name . '%',
                        'email LIKE' =>'%' . $email . '%',
                        'phone LIKE' => '%' . $phone . '%',
                        'address LIKE' => '%' . $address . '%',
                        'sex ' => $sex
                    ]
                ]; 
            }
            if (is_numeric($sex) && is_numeric($active)) {
                $this->paginate = [
                    'conditions' => [   
                        'name LIKE' =>'%' . $name . '%',
                        'email LIKE' =>'%' . $email . '%',
                        'phone LIKE' => '%' . $phone . '%',
                        'address LIKE' => '%' . $address . '%',
                        'sex ' => $sex,
                        'active ' => $active
                    ]
                ];
            }
        }
        
        if (!empty($id)) {
            $this->paginate = [
                'conditions' => [   
                    'id ' => $id
                ]
            ];
        }
        $this->set('title', 'Admin');
        $data = $this->Users->find('all');
        $this->set('data', $this->paginate($data));
        
    }

    /**
	* Chức năng funtion: hiển thị trang thêm user
	*/
    public function showFormInsert() {
        $this->render('insert_user');
    }

    /**
	* Chức năng funtion: insert user vào csdl, gửi email active cho user
	
	* @return <trang them user>
	* @throw <error>
	*
	*/
    public function insertUser()
    {
        $data = $this->request->getData();
        
        $user = $this->Users->newEntity();
        $uploaded_path = '/img/uploads';
        $avatar = $this->request->getData()['avatar'];
        $tmp_name = $avatar['tmp_name'];
        $nameImage = $avatar['name'];
        move_uploaded_file($tmp_name, WWW_ROOT.$uploaded_path . '/' . $nameImage);
        $user->name = $data['name'];
        $user->sex = $data['sex'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->avatar = $data['avatar'];
        $user->address = $data['address'];
        $user->password = $data['password'];
        $user->active = false;
        
        $data = json_decode($user, true);
        $this->loadModel('Users');
        $validation = $this->Users->newEntity($data);
        $validationErr = $validation->getErrors();
        $err = $user->getErrors();
        if (!empty($validationErr) ) {
            $this->set(compact('validationErr'));   
        } else {
            $user->avatar = $nameImage;
            $hashPassword = Security::hash($data['password'], 'md5');
            $user->password = $hashPassword;
            if ($this->Users->save($user)) {
                Email::getConfigTransport('gmail', [
                    'host' => 'ssl://smtp.gmail.com',
                    'port' => 465,
                    'username' => 'uthunghua17@gmail.com',
                    'password' => 'uthunghua95',
                    'className' => 'Smtp',
                    'ssl' => true
                ]);
                $email = new Email('default');
                $email->setTransport('default');
                $email->setEmailFormat('html');
                $email->setFrom('uthunghua17@gmail.com', 'Hua Minh Thanh');
                $email->setSubject('Xác nhận đăng ký email');
                $email->setTo($user->email);
                $email->send("Xin chào $user->name, bạn đã đăng ký tài khoản abc, 
                vui lòng xác nhận email sau nếu đó chính là bạn: <br> 
                <a href='http://minhthanhhua.com/xac-nhan-email/" . $user->id . "'>Link xác nhận</a><br>
                Bỏ qua nội dung này nếu đó không phải là bạn.<br>
                Cám ơn. <br>
                "); 
                 $this->redirect("/?direction=desc&sort=id");
            } else {
                $err = $user->getErrors();
                $this->set('err',$err);  
            }
        }
    }

    /**
	* Chức năng funtion: active email 
	* @param <int> $id
	
	* @return <Trang xác nhận thông tin active>
	*/
    public function changeStatus($id) {
        $user = $this->Users->get($id);
        if ( $user->active == 0) {
            $user->active = 1;
            $this->Users->save($user);
            echo 'Xác nhận email thành công.';
        } else {
            echo 'Email này đã được xác nhận.';
        }
        $this->autoRender = false;
    }

    /**
	* Chức năng funtion: xóa thông tin user trong db 
	* @param <int> $id
	
	* @return <trang chu user>
	*/
    public function deleteUser($id) {
        $data = $this->Users->get($id);
        $this->Users->delete($data);
        $this->redirect($this->referer());//trở lại trang trước đó
    }

    /**
	* Chức năng funtion: hiển thị trang sửa thông tin user
	* @param <int> $id
	
	* @return <trang chu user>
	*/
    public function showFormEditUser($id) {
        $dataUser = $this->Users->get($id);
        $this->set(compact('dataUser'));
        $this->render('edit_user');
    }

    /**
	* Chức năng funtion: cập nhật thông tin user
	* @param <int> $id
	
	* @return <trang chu user>
	*/
    public function editUser($id) {
        $dataUpdate = $this->request->getData();
        $user = $this->Users->get($id);
        $uploaded_path = '/img/uploads';
        $avatar = $this->request->getData()['avatar'];
        $tmp_name = $avatar['tmp_name'];
        $nameImage = $avatar['name'];
        if ($tmp_name == '') {
            $nameImage = $user['avatar'];
            $user->avatar = $user['avatar'];
        } else {
            move_uploaded_file($tmp_name, WWW_ROOT.$uploaded_path . '/' . $nameImage);
            $user->avatar = $dataUpdate['avatar'];
        }
        $user->name = $dataUpdate['name'];
        $user->sex = $dataUpdate['sex'];
        $user->phone = $dataUpdate['phone'];
        $user->address = $dataUpdate['address'];
        $user->password = $user->password;
        $user->email = $dataUpdate['email'];
        $user->avatar = $avatar;
        $this->Users->id = $id;
        $this->loadModel('Users');
        $info = json_decode($user, true);
        $validation = $this->Users->newEntity($info);
        $validationErr = $validation->getErrors();

        if (!empty($validationErr)) {
            $dataUser = $this->Users->get($id);
            $this->set(compact('dataUser'));
            $this->set(compact('validationErr'));  
        } else {
            $user->avatar = $nameImage;
            if ($this->Users->save($user)) {
                $session = $this->request->getSession();
                if ($session->read('user')['id'] == $id) {
                    $session->write('user', ['name' => $user->name,
                     'avatar' => $user->avatar, 'id' => $user['id']]);
                }
                $this->redirect("/?Id=$id");
                
            } else {
                $dataUser = $this->Users->get($id);
                $this->set(compact('dataUser'));
                $err = $user->getErrors();
                $this->set('err',$err);
            }     
        }
    }

    public function showFormChangPassword() {}

    /**
	* Chức năng funtion: thay đổi mật khẩu
	* @param <int> $id
	
	* @return <trang chu user>
	*/
    public function changePassword() {
        $session = $this->request->getSession();
        $data = $this->request->getData();
        $user = $this->Users->get($session->read('user')['id']);
        if ($data['confirmPassword'] != $data['password']) {
            $this->set('err', 'Mật khẩu không khớp');
            $this->render('show_form_chang_password');
        } else {
            $hashPassword = Security::hash($data['password'], 'md5');
            $user->password = $hashPassword;
            $this->Users->save($user);
            $this->set('message', 'Thay đổi mật khẩu thành công');
            $this->render('show_form_chang_password');
        }
        
    }

    public function sortUser($id) {
        $user = $this->Users->get($id);
        $this->set('title', 'Admin');
        $this->render('index');
    }

    public function sendEmail() {

        $this->autoRender = false;
    }
}
