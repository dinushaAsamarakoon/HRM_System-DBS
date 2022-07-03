<?php

class User extends Model
{

    private $_sessionName;
    public static $currentLoggedInUser = null;

    public function __construct()
    {
        $table = 'users';
        parent::__construct($table);

    }

    public function findByUserName($username)
    {
        $this->findFirst(['conditions' => 'username=? and is_closed=?', 'bind' => [$username, 0]]);
    }


    public static function currentLoggedInUser()
    {
        $user = new User();
        $user->findByUserName(Session::get('username'));
        self::$currentLoggedInUser = $user;
        return self::$currentLoggedInUser;
    }

    public function login()
    {
        Session::set($this->_sessionName,$this->id);
        Session::set('username',$this->username);
        Session::set('role',$this->role);
    }


    public function registerNewUser($params)
    {
        $params['is_closed'] = 0;
        $params['status'] = "available";
        $this->assign($params);
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->save();
    }

    public function removeUser($params)
    {
        if ($params['username']) {
            $this->_db->query("UPDATE users SET is_closed = ? WHERE username = ?", [1, $params['username']]);
        }
    }

    public function showRemovingUser($params)
    {
        if ($params['username']) {
            return $this->_db->find('users', [
                'conditions' => 'username=?',
                'bind' => [$params['username']]]);
        }
    }

    public function logout()
    {
        Session::delete();
        self::$currentLoggedInUser = null;
        return true;

    }

    public function getWorkerUsers()
    {
        return $this->_db->find('users', [
            'conditions' => 'role=? and is_closed=?',
            'bind' => ['worker', 0]
        ]);
    }


}