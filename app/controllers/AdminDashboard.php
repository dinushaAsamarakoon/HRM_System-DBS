<?php

class AdminDashboard extends Controller{

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
    }

    public function indexAction() {
        $this->view->id = Admin::currentLoggedInEmployee()->id;
        $this->view->render('dashboard/admin');
    }


}