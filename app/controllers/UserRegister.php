<?php

class UserRegister extends Controller
{

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->load_model('User');
    }

    public function loginAction()
    {
        Session::delete();
        if ($_POST) {
            $this->UserModel->findByUserName($_POST['username']);
            if ($this->UserModel && password_verify(Input::get('password'), $this->UserModel->password)) {
                $this->UserModel->login();
                Router::redirect('UserDashboard');
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
        $user = User::currentLoggedInUser();
        $this->UserModel->logout();
        Router::redirect('home/index');
    }

    public function addUserAction()
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
                'username' => [
                    'display' => 'Username',
                    'unique' => 'customer'
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
                $this->UserModel = new User();
                $this->UserModel->registerNewUser($_POST);
                Router::redirect('UserDashboard');
                $_SESSION['message'] = "User added";
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addUser');
            }
        } else {
            $this->view->render('register/addUser');
        }
    }

    public function removeUserAction()
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
                $this->UserModel = new User();
                $removingUser = $this->UserModel->showRemovingUser($_POST);
                $this->view->removingUser = $removingUser;
                $this->view->render('register/addUser');
            } else {
                $this->view->displayErrors = $validation->displayErrors();
                $this->view->render('register/addUser');
            }
        } else {
            $this->view->render('register/addUser');
        }


    }

    public function confirmRemoveUserAction()
    {
        if ($_POST) {
            $this->UserModel = new User();
            if ($_POST['username']) {
                $this->UserModel->removeUser($_POST);
                $_SESSION['message'] = "User is removed";
                Router::redirect('UserDashboard');
            }
            if ($_POST['cancel']) {
                Router::redirect('UserDashboard');
            }
        }
    }

    public function cancelRemoveUserAction()
    {
        $this->view->render('register/addUser');
    }
}