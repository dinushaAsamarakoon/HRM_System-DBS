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

                }
                Router::redirect('EmployeeDashboard');
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
        $this->UserModel->logout();
        Router::redirect('home/index');
    }

    public function addEmployeeAction()
    {

        $validation = new Validate();
        if ($_POST) {

            $validation->check($_POST, [
                'password' => [
                    'display' => 'Password',
                    'min' => 6
                ],
                'username' => [
                    'display' => 'Username',
                    'min' => 4
                ],
                'repassword' => [
                    'display' => 'Confirm Password',
                    'matches' => 'password'
                ],
                'contact_no' => [
                    'display' => 'Mobile Number',
                    'valid_contact' => true
                ],
                'email' => [
                    'display' => 'Email',
                    'valid_email' => true
                ]
            ]);

            if ($validation->passed()) {
                switch ($_POST['job_title']){
                    case 'HRManager':
//                        $this->EmployeeModel = new HRManager();
                        $this->registerNewHRManager($_POST);
                        Router::redirect('EmployeeDashboard');
                        break;
                    case 'Supervisor':
                        break;
                    default:
                        break;
                }
//                $this->EmployeeModel = new Employee();
//                $this->EmployeeModel->registerNewEmployee($_POST);
//                Router::redirect('EmployeeDashboard');
                $_SESSION['message'] = "Employee added";
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addEmployee');
            }
        } else {
            $this->view->render('register/addEmployee');
        }
    }

    public function removeEmployeeAction()
    {
        $validation = new Validate();
        if ($_POST) {

            $validation->check($_POST, [
                'username' => [
                    'display' => 'Username',
                    'valid_username' => 'user'
                ]
            ]);
//                dnd($validation->passed());
            if ($validation->passed()) {
                $this->EmployeeModel = new Employee();
                $removingEmployee = $this->EmployeeModel->showRemovingEmployee($_POST);
                $this->view->removingEmployee = $removingEmployee;
                $this->view->render('register/addEmployee');
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addEmployee');
            }
        } else {
            $this->view->render('register/addEmployee');
        }


    }

    public function confirmRemoveEmployeeAction()
    {
        if ($_POST) {
            $this->EmployeeModel = new Employee();
            if ($_POST['username']) {
                $this->EmployeeModel->removeEmployee($_POST);
                $_SESSION['message'] = "Employee is removed";
                Router::redirect('EmployeeDashboard');
            }
            if ($_POST['cancel']) {
                Router::redirect('EmployeeDashboard');
            }
        }
    }

    public function cancelRemoveEmployeeAction()
    {
        $this->view->render('register/addEmployee');
    }
}