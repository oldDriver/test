<?php
namespace src\models;

use lib\BaseEntity;
use lib\Debug;

class User extends BaseEntity
{
    private $username;

    private $firstname;

    private $lastname;

    private $email;

    private $password;

    private $salt;

    private $createdAt;

    private $updatedAt;

    public function __construct()
    {
        $this->setUpdatedAt('now');
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($value)
    {
        $this->username = $value;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($value)
    {
        $this->firstname = $value;
        return $this;
    }

    
    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($value)
    {
        $this->lastname = $value;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->setSalt();
        $this->password = md5($value.$this->getSalt());
        return $this;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt()
    {
        $this->salt = substr(md5(rand(1000, 10000)), 0, 10);
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt()
    {
        $date = new \DateTime();
        $this->createdAt = $date->format('Y-m-d H:i:s');
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($value)
    {
        $date = new \DateTime();
        $this->updatedAt = $date->format('Y-m-d H:i:s');
        return $this;
    }

    public function bindForm($form)
    {
        foreach ($form as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

}