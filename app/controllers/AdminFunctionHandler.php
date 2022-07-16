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
            $this->AdminModel->findByUserName($_POST['username']);
            if ($this->AdminModel && password_verify(Input::get('password'), $this->AdminModel->password)) {
                $this->AdminModel->login();
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
        Router::redirect('home/index');
    }

    public function addHRManagerAction()
    {
        $validation = new Validate();
        if ($_POST) {

            $validation->check($_POST, [
//                'password' => [
//                    'display' => 'Password',
//                    'min' => 6
//                ],
//                'username' => [
//                    'display' => 'Username',
//                    'min' => 4
//                ],
//                'repassword' => [
//                    'display' => 'Confirm Password',
//                    'matches' => 'password'
//                ],
//                'contact_no' => [
//                    'display' => 'Mobile Number',
//                    'valid_contact' => true
//                ],
//                'email' => [
//                    'display' => 'Email',
//                    'valid_email' => true
//                ]
            ]);

            if ($validation->passed()) {
                $this->AdminModel->createNewHRManager()->registerNewHRManager($_POST);
                Router::redirect('AdminDashboard');
                $_SESSION['message'] = "HR Manager added";
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addEmployee');
            }
        } else {
            $admin = Admin::currentLoggedInEmployee();
            $attributeNames = $admin->getEmployeeAttributes();
            $attributes = [];
            foreach ($attributeNames as $an) {
                $tempAttributes = [];
                foreach ($admin->getPrimaryValues($an[0]) as $row) {
                    $tempAttributes[] = $row;
                }
                $attributes[$an[0]] = $tempAttributes;
            }
            $this->view->allAttributes = $attributes;
            $this->view->depts = $admin->getDeptNames();
            $this->view->emp_status_columns = $admin->get_columns_table('emp_status');
            $this->view->emp_status = $admin->getEmpStatus();
            $this->view->emp_type = 'hr_manager';
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
                $this->AdminModel = $admin->createNewHRManager();
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
            $this->AdminModel = Admin::currentLoggedInEmployee();
            if ($_POST['username']) {
                $this->AdminModel->removeEmployee($_POST);
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
            $fields = [];
            $col_definition = '';
            for ($i=1; $i<=$_POST['columns'];$i++){
                $temp=isset($_POST['primary'.$i]) ? ' PRIMARY KEY':'';
                $fields[$_POST['column'.$i]] = $_POST['type'.$i].'('.$_POST['length'.$i].')'.$temp;
                if ($temp!='') {
                    $col_definition = $_POST['column' . $i] . ' ' . $_POST['type' . $i] . '(' . $_POST['length' . $i] . ')';
                    $fk_definition = 'FOREIGN KEY ('. $_POST['column'.$i]. ') REFERENCES '.$_POST['table'].'('.$_POST['column'.$i].');';
                }
            }
            $admin->addEmployeeAttribute($_POST['table'], $fields, $col_definition, $fk_definition);
            $this->view->render('createTable/createTable');
        } else {
            $this->view->render('createTable/createTable');
        }
    }

//    public function addTableAction()
//    {
//        $this->view->render('createTable/createTable');
//    }

}