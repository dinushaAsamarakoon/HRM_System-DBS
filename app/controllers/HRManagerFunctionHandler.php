<?php

class HRManagerFunctionHandler extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('HRManager');
    }

    public function loginAction()
    {
        Session::delete();
        if ($_POST) {
            $this->EmployeeModel->findByUserName($_POST['username']);
            if ($this->EmployeeModel && password_verify(Input::get('password'), $this->EmployeeModel->password)) {
                $this->EmployeeModel->login();
                Router::redirect('HRManagerDashboard');
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

//        $this->EmployeeModel->logout();
        Router::redirect('home/index');
    }

    public function addEmployeeAction()
    {
        $validation = new Validate();
        if ($_POST) {
            $validation->check($_POST, [
//                'password' => [
//                    'display' => 'Password',
//                    'min' => 6
//                ],
                'username' => [
                    'display' => 'Username',
                    'min' => 4
                ],
//                'repassword' => [
//                    'display' => 'Confirm Password',
//                    'matches' => 'password'
//                ],
                'phone_number' => [
                    'display' => 'Mobile Number',
                    'valid_contact' => true
                ],
                'email' => [
                    'display' => 'Email',
                    'valid_email' => true
                ]
            ]);

            if ($validation->passed()) {
                if ($_POST['job_title'] === 'supervisor') {
                    $emp = HRManager::currentLoggedInEmployee()->createNewSupervisor();
                    $emp->setCustomTableColomns('supervisor');
                    $emp->registerNewEmployee($_POST);
//                    $this->EmployeeModel = HRManager::currentLoggedInEmployee()->createNewSupervisor();
//                    $this->EmployeeModel->registerNewEmployee($_POST);
                    Router::redirect('HRManagerDashboard');
                } else {
                    $emp = HRManager::currentLoggedInEmployee()->createNewNMEmployee();
                    $emp->registerNewEmployee($_POST);
//                    $this->EmployeeModel = HRManager::currentLoggedInEmployee()->createNewNMEmployee();
//                    $this->EmployeeModel->registerNewEmployee($_POST);
                    Router::redirect('HRManagerDashboard');
                }
                $_SESSION['message'] = "Employee added";
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addEmployee');
            }
        } else {
//            dnd(HRManager::currentLoggedInEmployee()->getEmployeeAttributes());
            $hRManager = HRManager::currentLoggedInEmployee();
//            foreach($hRManager->getPrimaryValues('job_title') as $a){
//                echo $a[0];
//            }

            $attributeNames = $hRManager->getEmployeeAttributes();
//            dnd($attributeNames);
            $attributes = [];
            foreach ($attributeNames as $an) {
                $tempAttributes = [];

                foreach ($hRManager->getPrimaryValues($an[0]) as $row) {
                    $tempAttributes[] = $row;

                }
                $attributes[$an[0]] = $tempAttributes;
            }
//            dnd($attributes);
            $this->view->allAttributes = $attributes;
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
                $this->EmployeeModel = HRManager::currentLoggedInEmployee();
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
            $this->EmployeeModel = HRManager::currentLoggedInEmployee();
            if ($_POST['username']) {
                $this->EmployeeModel->removeEmployee($_POST['tableName'], 'username', $_POST['username']);
                $_SESSION['message'] = "Employee is removed";
                Router::redirect('');
            }
            if ($_POST['cancel']) {
                Router::redirect('');
            }
        }
    }

    public function cancelRemoveEmployeeAction()
    {
        $this->view->render('register/addEmployee');
    }

    public function addAttributeTypeAction()
    {
        if ($_POST) {
            $tableName = $_POST["tableName"];
            $employee = HRManager::currentLoggedInEmployee();
            $employee->addNewAttributeType($tableName, $_POST);
            Router::redirect('HRManagerDashboard');

            $_SESSION['message'] = "Attribute added";
        } else {
            $this->view->render('attribute/addAttribute');
        }
    }

    public function removeAttributeTypeAction()
    {

        if ($_POST) {
            $this->EmployeeModel = HRManager::currentLoggedInEmployee();
            $removingAttributeType = $this->EmployeeModel->showRemovingAttributeType($_POST['tableName'], $_POST);
            $this->view->removingAttributeType = $removingAttributeType;
            $this->view->render('attribute/addAttribute');

        } else {
            $this->view->render('attribute/addAttribute');
        }


    }

    public function confirmRemoveAttributeTypeAction()
    {
        if ($_POST) {
            $this->EmployeeModel = HRManager::currentLoggedInEmployee();
            if ($_POST['field']) {
                $this->EmployeeModel->removeAttributeType($_POST['tableName'], 'username', $_POST['username']);
                $_SESSION['message'] = "Attribute is removed";
                Router::redirect('HRManagerDashboard');
            }
            if ($_POST['cancel']) {
                Router::redirect('HRManagerDashboard');
            }
        }
    }

    public function cancelRemoveAttributeTypeAction()
    {
        $this->view->render('attribute/addAttribute');
    }

    public function reportGenerationAction()
    {
        if ($_POST) {
            $this->EmployeeModel = HRManager::currentLoggedInEmployee();
            switch ($_POST['report']) {
                case 'empByDepartment':
                    $this->view->report = $this->EmployeeModel->reportGeneration('emp_info');
                    $this->view->render('');
                    break;
                case 'totalLeave':
                    $this->view->report = $this->EmployeeModel->reportGeneration('leave_request');
                    $this->view->render('');
                    break;
                case 'empReports':
                    $this->view->report = $this->EmployeeModel->reportGeneration('employee');
                    $this->view->render('');
                    break;
                case 'customReports':
                    break;
            }
        }
    }

}

