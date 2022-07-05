<?php

class Profile extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Employee');
    }

    public function indexAction() {
        $this->view->profile = $this->EmployeeModel->getPersonalInfo('1');
        $this->view->render('profile/index');
    }

}