<?php

class AdminFunctionHandler extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('Admin');
    }

    public function loginAction()
    {
        Session::delete();
        if ($_POST) {
            $this->EmployeeModel->findByUserName($_POST['username']);
            if ($this->EmployeeModel && password_verify(Input::get('password'), $this->EmployeeModel->password)) {
                $this->EmployeeModel->login();
                Router::redirect('AdminDashboard');
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
        $user = Admin::currentLoggedInEmployee();
        $user->logout();
//        $this->EmployeeModel->logout();
        Router::redirect('home/index');
    }

    public function addHRManagerAction()
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
                $this->EmployeeModel = Admin::currentLoggedInEmployee()->createNewHRManager();
                $this->EmployeeModel->registerNewHRManager($_POST);
                Router::redirect('AdminDashboard');
                $_SESSION['message'] = "HR Manager added";
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
                $admin = Admin::currentLoggedInEmployee();
                $this->EmployeeModel = $admin->createNewHRManager();
                $removingEmployee = $admin->showRemovingEmployee($_POST);
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
            $this->EmployeeModel = Admin::currentLoggedInEmployee();
            if ($_POST['username']) {
                $this->EmployeeModel->removeEmployee($_POST);
                $_SESSION['message'] = "Employee is removed";
                Router::redirect('AdminDashboard');
            }
            if ($_POST['cancel']) {
                Router::redirect('AdminDashboard');
            }
        }
    }

    public function cancelRemoveEmployeeAction()
    {
        $this->view->render('register/addEmployee');
    }

    public function addEmployeeAttributeAction()
    {
        if ($_POST) {
            $admin = Admin::currentLoggedInEmployee();
            $admin->addEmployeeAttribute($_POST['tableName'], $_POST['fields']);
        }
    }
    public function addTableAction()
    {
        $this->view->render('createTable/createTable');
    }

}