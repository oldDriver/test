<?php
namespace src\forms;

use lib\Form;

class RegisterForm extends Form
{
    public function useFields()
    {
        $this->fields = array(
            'username',
            'firstname',
            'lastname',
            'email',
            'password',
            'retype'
        );
    }
}