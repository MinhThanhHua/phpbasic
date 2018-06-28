<?php
    namespace App\Model\Table;

    use Cake\ORM\Table;
    use Cake\Validation\Validator;

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
                    'message' => 'Độ dài mật khẩu từ 5 đến 20 ký tự'
                ]
            ])

            ->requirePresence('email', 'create', 'Chưa có email')
            ->notEmpty('email', 'Chưa nhập email')
            ->add('email', [
                'email' => [
                    'rule' => 'email',
                    'message' => 'Sai định dạng email'
                ],
                'unique' => [
                    'rule' => 'validateUnique',
                    'provider' => 'table',
                    'message' => 'Email này đã được sử dụng'
                ]
            ])

            ->requirePresence('phone', 'create', 'Chưa có điện thoại')
            ->notEmpty('phone', 'Chưa nhập số điện thoại')
            ->numeric('phone', 'Chỉ được là số', 'create')
            ->add('phone', 'length', [
                'rule' => ['lengthbetween', 8, 10],
                'message' => 'Số điện thoại từ 8 đến 10 chữ số'
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
    }