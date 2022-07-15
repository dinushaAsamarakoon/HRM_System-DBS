<?php

class NMEmployeeFunctionHandler extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('NMEmployee');
        $this->load_model('LeaveRequest');
    }

    public function loginAction()
    {
        Session::delete();
        if ($_POST) {
            $this->EmployeeModel->findByUserName($_POST['username']);
            if ($this->EmployeeModel && password_verify(Input::get('password'), $this->EmployeeModel->password)) {
                $this->EmployeeModel->login();
                Router::redirect('NMEmployeeDashboard');
            } else {
                $this->view->message = "Check Your Username and Password";
                $this->view->render('register/login');
            }
        } else {
            $this->view->render('register/login');
        }
    }

    public function logoutAction()
    {
        $user = HRManager::currentLoggedInEmployee();
        $user->logout();
        Router::redirect('home/index');
    }

    public function completeRequestAction()
    {
        $this->LeaveRequestModel->update($_POST['id'],[
            'completed'=>true
        ]);
        Router::redirect('NMEmployeeDashboard');
    }

}