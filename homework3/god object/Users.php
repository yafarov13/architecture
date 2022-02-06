<?php

/*
* Антипаттерн ООП - God Object

* класс User и создает объекты, и авторизирует пользователей
* решение: разделить на сущность Users и репозиторий UserRepository


*/


namespace app\models;

use app\engine\Session;

class Users extends DBModel
{
    protected $id;
    protected $login;
    protected $pass;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

    /**
     * Users constructor.
     * @param $login
     * @param $pass
     */
    public function __construct($login = null, $pass = null)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public static function getTableName() {
        return 'users';
    }

    public static function isAuth() {
        $session = (new Session())->getWithKey('login');
        return isset($session);
    }

    public static function isAdmin() {
        return (new Session())->getWithKey('login') == 'admin';
    }

    public static function getName() {
        return (new Session())->getWithKey('login');
    }

    public static function auth($login, $pass) {
        $user = static::getOneWhere('login', $login);
        if (password_verify("{$pass}", $user->pass)) {
            (new Session())->set('login', $login);
            return true;
        }
        return false;
    }

}