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
            $this->HRManagerModel->findByUserName($_POST['username']);
            if ($this->HRManagerModel && password_verify(Input::get('password'), $this->EmployeeModel->password)) {
                $this->HRManagerModel->login();
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
        Router::redirect('home/index');
    }

    public function addEmployeeAction($emp_type)
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
////                'repassword' => [
////                    'display' => 'Confirm Password',
////                    'matches' => 'password'
////                ],
//                'phone_number' => [
//                    'display' => 'Mobile Number',
//                    'valid_contact' => true
//                ],
//                'email' => [
//                    'display' => 'Email',
//                    'valid_email' => true
//                ]
            ]);

            if ($validation->passed()) {
                if ($_POST['job_title'] === 'supervisor') {
                    $this->HRManagerModel->createNewSupervisor()->registerNewEmployee($_POST);
                } else {
                    $this->HRManagerModel->createNewNMEmployee()->registerNewEmployee($_POST);

                }
                Router::redirect('HRManagerDashboard');
                $_SESSION['message'] = "Employee added";
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addEmployee');
            }
        } else {
            $hRManager = HRManager::currentLoggedInEmployee();

            $attributeNames = $hRManager->getEmployeeAttributes();
            $attributes = [];
            foreach ($attributeNames as $an) {
//                dnd($attributeNames);
                $tempAttributes = [];
                foreach ($hRManager->getPrimaryValues($an[0]) as $row) {

                    $tempAttributes[] = $row;
                }
                $attributes[$an[0]] = $tempAttributes;
            }
            $this->view->allAttributes = $attributes;
//            dnd($attributes);
            $this->view->depts = $hRManager->getDeptNames();
            $this->view->emp_status = $hRManager->getEmpStatus();
            $this->view->emp_status_columns = $hRManager->get_columns_table('emp_status');
            $this->view->emp_type = $emp_type;
            $this->view->sup_levels = $hRManager->getSupLevels();
            $this->view->sup_ids = $hRManager->getSupIds();
//            dnd($this->view->sup_ids);
//            dnd($this->view->sup_levels);
//            dnd($this->view->emp_status_columns);
//            dnd($this->view->emp_status);
//            dnd( $hRManager->getDeptNames());
            $this->view->render('register/addEmployee');
        }
    }

    public function editEmployeeAction($id)
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
//                'phone_number' => [
//                    'display' => 'Mobile Number',
//                    'valid_contact' => true
//                ],
                'email' => [
                    'display' => 'Email',
                    'valid_email' => true
                ]
            ]);

            if ($validation->passed()) {
                $this->HRManagerModel->editEmployee($id, $_POST);
                Router::redirect('HRManagerDashboard');
                $_SESSION['message'] = "Employee edited";
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('employeeDetails/employee');
            }
        } else {
            $hRManager = HRManager::currentLoggedInEmployee();
            $attributeNames = $hRManager->getEmployeeAttributes();
            $attributes = [];
            foreach ($attributeNames as $an) {
                $tempAttributes = [];
                foreach ($hRManager->getPrimaryValues($an[0]) as $row) {
                    $tempAttributes[] = $row;
                }
                $attributes[$an[0]] = $tempAttributes;
            }
            $this->view->allAttributes = $attributes;
            $this->view->depts = $hRManager->getDeptNames();
            $this->view->emp_status = $hRManager->getEmpStatus();
            $this->view->emp_status_columns = $hRManager->get_columns_table('emp_status');
            $this->view->sup_levels = $hRManager->getSupLevels();
            $emp_details = $hRManager->getEmployeeDetails($id);
            $this->view->Employee = $emp_details;
            if ($emp_details[0]->job_title == 'supervisor') {
                dnd($hRManager->getSupervisorLevel($id));
            }
            $this->view->render('employeeDetails/employee');
        }
    }

    public function removeEmployeeAction($id, $job_title)
    {
        if ($job_title === 'supervisor') {
            $this->HRManagerModel->removeEmployee(['employee', 'supervisor'], 'id', $id);
        } else
            $this->HRManagerModel->removeEmployee(['employee'], 'id', $id);

        $hrManager = HRManager::currentLoggedInEmployee();
        $this->view->allEmployees = $hrManager->getAllEmployees('', '', '');
        $this->view->render('employeeDetails/all');

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

    public function viewAllEmployeesAction()
    {
        $hrManager = HRManager::currentLoggedInEmployee();
        $this->view->allEmployees = $hrManager->getAllEmployees('', '', '');
        $this->view->render('employeeDetails/all');
    }

    public function redirectAction()
    {
        $this->view->render('dashboard/hrmanager');
    }

    public function searchEmployeeAction()
    {
        if ($_POST['search_name']!='') {
            $this->view->allEmployees = $this->HRManagerModel->searchEmployee($_POST['search_name']);
            $this->view->render('employeeDetails/all');
        } else {
            $hrManager = HRManager::currentLoggedInEmployee();
            $this->view->allEmployees = $hrManager->getAllEmployees();
            $this->view->render('employeeDetails/all');
        }
    }
    
    public function viewAllEmployeesByDeptAction()
    {
        $hrManager = HRManager::currentLoggedInEmployee();
        $this->view->depts = $hrManager->getDeptNames();
        if (isset($_POST['filter_employee_by_dept_name'])) {
            $this->view->allEmployees = $hrManager->getAllEmployees($_POST['filter_employee_by_dept_name'], '', '');
        } else {
            $this->view->allEmployees = $hrManager->getAllEmployees('', '', '');
        }
        $this->view->render('employeeDept/EmployeeByDept');
    }

    public function viewLeaveRecordByDeptAction()
    {
        $hrManager = HRManager::currentLoggedInEmployee();
        $emp_leave_details = [];
        if (isset($_POST['filter_employee_by_dept_name'])) {
            $emps = $hrManager->getAllEmployees($_POST['filter_employee_by_dept_name'], '', '');
        } else {
            $emps = $hrManager->getAllEmployees('', '', '');
        }

        foreach ($emps as $emp) {
            if (isset($_POST['start_date'])) {
                $emp_leave_details[$emp->id] = [$emp->id, $emp->first_name, $emp->last_name, $hrManager->getTotalLeavesByEmployee($emp->id, $_POST['start_date'], $_POST['end_date']), $emp->dept_name];
            } else {
                $emp_leave_details[$emp->id] = [$emp->id, $emp->first_name, $emp->last_name, $hrManager->getTotalLeavesByEmployee($emp->id), $emp->dept_name];
            }
        }
        $this->view->emp_leave_details = $emp_leave_details;
        $this->view->depts = $hrManager->getDeptNames();
        $this->view->render('leavesDept/LeavesDept');
    }

    public function viewEmployeeReportAction()
    {
        $hrManager = HRManager::currentLoggedInEmployee();
        $this->view->job_titles = $hrManager->getJobTitles();
        $this->view->pay_grades = $hrManager->getPayGrades();
        $this->view->depts = $hrManager->getDeptNames();
        $dept_name = '';
        $pay_garde = '';
        $job_title = '';
        if (isset($_POST['filter_by_dept_name_er'])) {
//            dnd($_POST['filter_by_dept_name_er']);
            $dept_name = $_POST['filter_by_dept_name_er'];
        }
        if (isset($_POST['filter_by_pay_grade_er'])) {
//            dnd($_POST['filter_by_pay_grade_er']);
            $pay_garde = $_POST['filter_by_pay_grade_er'];
        }
        if (isset($_POST['filter_by_job_title_er'])) {
//            dnd($_POST['filter_by_job_title_er']);
            $job_title = $_POST['filter_by_job_title_er'];
        }
        $this->view->allEmployees = $hrManager->getAllEmployees($dept_name, $pay_garde, $job_title);

        $this->view->render('employeeReport/EmployeeReport');
    }

    public function viewCustomReportAction()
    {
        $this->view->render('customReport/CustomReport');
    }


}

