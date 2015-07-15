<?php
namespace src\controllers;

use src\controllers\BaseController;
use lib\Session;
use src\forms\RegisterForm;
use lib\Debug;
use src\models\User;
use src\models\UserTable;
use src\services\ImageService;

class IndexController extends BaseController
{
    public function indexAction()
    {
        return array(
            'user' => $this->getUser(),
        );
    }

    public function registerAction()
    {
        $form = new RegisterForm();
        $form = $form->bind($_POST);
        // validate form
        $errors = array();
        if ($_POST) {
            if (isset($_POST['username']) && $value = $_POST['username']) {
                if (strlen($value) < 2) {
                    $errors['username'] = __('error.short');
                }
            } else {
                $errors['username'] = __('error.empty');
            }
            if (isset($_POST['firstname']) && $value = $_POST['firstname']) {
                if (strlen($value) < 2) {
                    $errors['firstname'] = __('error.short');
                }
            } else {
                $errors['firstname'] = __('error.empty');
            }
            if (isset($_POST['email']) && $value = $_POST['email']) {
                // Check valid email
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = __('error.email');
                }
            } else {
                $errors['email'] = __('error.empty');
            }
            if (isset($_POST['password']) && $password = $_POST['password']) {
            } else {
                $errors['password'] = __('error.empty');
            }
            if (isset($_POST['retype']) && $retype = $_POST['retype']) {
                if ($password != $retype) {
                    $errors['retype'] = __('error.retype');
                }
            } else {
                $errors['retype'] = __('error.empty');
            }
            if (empty($errors)) {
                $user = new User();
                $user->bindForm($form);
                $user->setPassword($form['password']);
                $user->setCreatedAt();
                $user->save();
                Session::getInstance()->set('userId', $user->getId());
                if ($_FILES) {
                    ImageService::uploadUserPhoto($user, $_FILES['file']);
                }
                return $this->redirect('profile');
            }
        }
        return array(
                'user' => $this->getUser(),
                'errors' => $errors,
                'form' => $form,
        );
    }

    public function cultureAction()
    {
        Session::getInstance()->set('culture', $_REQUEST['lang']);
        return $this->reload();
    }
}