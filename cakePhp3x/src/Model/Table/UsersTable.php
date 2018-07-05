<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;
    use Cake\Validation\Validator;
    use Cake\ORM\Rule\IsUnique;
    use Cake\ORM\RulesChecker;

    class UsersTable extends Table
    {
        function validationDefault(Validator $validator) {
            $validator->requirePresence('name')
            ->notEmpty('name', 'Chưa nhập tên')
            ->add('name', 'length', [
                'rule' => ['minlength', 3],
                'message' => 'Tên độ dài ít nhất 3 ký tự'
            ])

            ->requirePresence('password', 'create', 'Chưa có password')
            ->notEmpty('password', 'Chưa nhập password')
            ->ascii('password', 'Không bỏ dấu')
            ->add('password', [
                'length' => [
                    'rule' => ['lengthbetween', 5, 20],
                    'message' => 'Độ dài mật khẩu từ 5 đến 20 ký tự',
                    'on' => 'create'
                ]
            ])

            ->requirePresence('email', 'update', 'Chưa có email')
            ->notEmpty('email', 'Chưa nhập email')
            ->add('email',[
                'required' => array(
                    'on'         => 'create',
                    'rule'       => 'notBlank',
                    'message'    => 'Enter your email address',
                    'required'   => true,
                    'last'       => true
                ),
                'email' => [
                    'rule' => 'email',
                    'message' => 'Sai định dạng email',
                    'last' => true
                ],
                'emailUnique' => [
                    'rule' => [$this, 'checkUniqueEmail'],
                    'message' => 'Trùng email'
                ]
            ])

            ->requirePresence('phone', 'create', 'Chưa có điện thoại')
            ->notEmpty('phone', 'Chưa nhập số điện thoại')
            ->numeric('phone', 'Chỉ được là số', 'create')
            ->add('phone', 'length', [
                'rule' => ['lengthbetween', 8, 10],
                'message' => 'Số điện thoại từ 8 đến 10 chữ số'
            ])

            ->requirePresence('avatar', 'create', 'Chưa có hình ảnh')
            ->allowEmpty('avatar', 'Cho phép ko chọn ảnh')
            ->add('avatar',[
                'uploadError' => array(
                    'rule' => 'uploadError',         
                    'message' => 'The logo upload failed.',
                    'last' => true,
                    'allowEmpty' => true
                ),
                'mimeType' => array(
                    'rule' => array('mimeType', array('image/gif', 'image/png', 'image/jpg', 'image/jpeg')),
                    'message' => 'Chỉ upload được ảnh',
                    'allowEmpty' => true
                ),
                'fileSize' =>array (
                    'rule' => array('fileSize', '<=', '1MB'),
                    'message' => 'Logo image must be less than 1MB.',
                    'allowEmpty' => true
                ),
            ])

            ->requirePresence('address', 'create', 'Chưa có địa chỉ')
            ->notEmpty('address', 'Chưa nhập địa chỉ')
            ->add('address', [
                'length'=>[
                    'rule' => ['lengthbetween', 10, 150],
                    'message' => 'Địa chỉ từ 10 đến 150 ký tự'
                ]
            ]);
            return $validator;
        }

        public function checkUniqueEmail($data) {
            $isUnique = $this->find('all',[
                //'fields' => ['id'],//lấy thẻ id
                'conditions' => [
                    'email' => $data,
                ]
            ]);
            if($isUnique->first() != NULL){  
                if(isset($this->id)){
                    if ($this->id == $isUnique->first()['id']) {
                        return true;
                    } else {
                        return false;
                    }
                }else{
                    return false; 
                }
            }else{
                return true; 
            }
        }

        // public function buildRules(RulesChecker $rules)
        // {
        //     $rules->add($rules->isUnique(['email'], 'Email không được trùng'));
        //     return $rules;
        // }
    }