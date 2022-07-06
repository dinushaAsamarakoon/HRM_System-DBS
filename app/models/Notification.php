<?php

class Notification extends Model {

    public function __construct()
    {
        $table = 'notification';
        parent::__construct($table);
    }

    public function create($sender, $receiver, $message){
        date_default_timezone_set('Asia/Colombo');
        $params['time'] = date('Y-m-d H:i:s');
        $params['sender'] = $sender;
        $params['receiver'] = $receiver;
        $params['message'] = $message;
        $params['status'] = 'unread';
        $this->assign($params);
        $this->save();
    }

    public function getNotifications($id){
        return $this->_db->find('notification',[
            'conditions' => 'receiver=? and status=?',
            'bind' => [$id, 'unread']
        ]);
    }

}