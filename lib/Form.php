<?php
namespace lib;

use lib\Debug;


class Form
{
    protected $fields = array();

    protected $form;

    public function __construct()
    {
        $this->useFields();
    }

    protected function useFields()
    {
        foreach ($this->fields as $field) {
            $this->form[$field] = '';
        }
    }

    public function bind($post)
    {
        $this->form = array();
        foreach ($post as $key => $value) {
            if (in_array($key, $this->fields)) {
                $this->form[$key] = $value;
            }
        }
        return $this->form;
    }
}