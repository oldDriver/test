<?php
namespace lib;


class Page
{
    private $controller;
    private $action;
    private $template;

    public function __construct($Controller, $Action, $Template)
    {
        $this->controller = $Controller;
        $this->action = $Action;
        $this->template = $Template;
    }

    public function getContent()
    {
        //$this->controller->preView();
        $data = $this->controller->{$this->action}();

        extract($data);

        // render
        ob_start();
        ob_implicit_flush(0);
        
        try {
            require dirname(__DIR__).'/src/views/'.$this->template.'.php';
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        return ob_get_clean();
    }
}