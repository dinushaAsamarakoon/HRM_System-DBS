<?php

class EmployeeRegister extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Employee');
    }

    public function loginAction()
    {
        Session::delete();
        if ($_POST) {
            $this->EmployeeModel->findByUserName($_POST['username']);
            if ($this->EmployeeModel && password_verify(Input::get('password'), $this->EmployeeModel->password)) {
                $this->EmployeeModel->login();
                switch ($_SESSION['job_title']){
                    case "hr_manager":
                        Router::redirect('HRManagerDashboard');
                        break;
                    case "admin":
                        Router::redirect('AdminDashboard');
                        break;
                    case "nm_employee":
                        Router::redirect('NMEmployeeDashboard');
                        break;
                    case "supervisor":
                        Router::redirect('SupervisorDashboard');
                        break;
                    default:
                        $this->view->message = "Check Your Username and Password";
                        $this->view->render('register/login');
                }
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
        $user = Employee::currentLoggedInEmployee();
        $user->logout();
        Router::redirect('home/index');
    }
}
