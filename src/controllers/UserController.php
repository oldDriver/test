<?php
namespace src\controllers;

use src\controllers\BaseController;
use src\models\UserTable;
use src\forms\LoginForm;
use lib\Debug;
use lib\Session;
use src\models\User;
use src\services\ImageService;
use src\services\UserService;

class UserController extends BaseController
{
    public function profileAction()
    {
        $user = $this->getUser();
        $thumbnail = ImageService::getThumbnailPath($user);
        return array(
            'user' => $user,
            'thumbnail' => $thumbnail,
        );
    }

    public function loginAction()
    {
        $form = new LoginForm();
        $form = $form->bind($_POST);
        // validate form
        $errors = array();
        if ($_POST) {
            if (isset($_POST['username']) && $username = $_POST['username']) {
                
            } else {
                $errors['username'] = __('error.empty');
            }
            if (isset($_POST['password']) && $password = $_POST['password']) {
                
            } else {
                $errors['password'] = __('error.empty');
            }
            if (empty($errors)) {
                if ($id = UserService::login($username, $password)) {
                    Session::getInstance()->set('userId', $id);
                    return $this->redirect('profile');
                }
            }
        }
        return array(
            'user' => $this->getUser(),
            'errors' => $errors,
            'form' => $form,
        );
    }

    public function logoutAction()
    {
        Session::getInstance()->destroy('userId');
        $this->redirect('');
    }
}