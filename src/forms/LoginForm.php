<?php
namespace src\forms;

use lib\Form;

class LoginForm extends Form
{
    public function useFields()
    {
        $this->fields = array('username', 'password');
    }
}