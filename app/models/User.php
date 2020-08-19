<?php

namespace app\models;


class User extends AppModel{

    public $attributes = [
      'login' => '',
      'password' => '',
      'name' => '',
      'email' => '',
      'phone' => '',
      'address' => '',
      'role' => 'user'
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['name'],
            ['email'],
            ['phone'],
            ['address']
        ],
        'email' => [
            ['email']
        ],
        'lengthMin' => [
            ['password', 6]
        ],
        'lengthMax' => [
            ['phone', 13]
        ]
    ];

    public function checkUnique() {
        $user = \R::findOne('users', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);
        if($user) {
            if($user->login == $this->attributes['login']) {
                $this->errors['unique'][] = "Пользователь с таким логином ужe существуеть!";
            }
            if($user->email == $this->attributes['email']) {
                $this->errors['unique'][] = "Пользователь с таким email-ом ужe существуеть!";
            }
            return false;
        }
        return true;
    }

    public function login($isAdmin = false) {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;

        if($login && $password) {
            if($isAdmin) {
                $user = \R::findOne('users', "login = ? AND role = 'admin'", [$login]);
            } else {
                $user = \R::findOne('users', "login = ?", [$login]);
            }
            if($user) {
                if(password_verify($password, $user->password)) {
                    foreach ($user as $k => $v) {
                        $_SESSION['user'][$k] = $v;
                    }
                    return true;
                }
            }
        }
        return false;
    }

    public static function checkAuth(){
        return isset($_SESSION['user']);
    }

    public static function isAdmin(){
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }
}