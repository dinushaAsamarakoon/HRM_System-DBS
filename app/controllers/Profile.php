<?php

class Profile extends Controller {

    public function __construct($controller,$action)
    {
        parent::__construct($controller,$action);
        $this->load_model('Employee');
    }

    public function displayAction($id) {
        $this->view->profile = $this->EmployeeModel->getPersonalInfo($id);
        $this->view->render('profile/index');
    }

}