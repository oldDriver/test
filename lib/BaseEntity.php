<?php
namespace lib;

use lib\Debug;

class BaseEntity
{
    protected $id;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function save()
    {
        $class = get_class($this).'Table';
        $id = $this->getId();
        if ($id) {
            //$class::update($this);
        } else {
            $id = $class::insert($this);
            $this->setId($id);
        }
        return $this;
    }
}