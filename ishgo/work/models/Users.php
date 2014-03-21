<?php

namespace Ishgo\Index\Models;

use Phalcon\Mvc\Model\Validator\Email as IsEmail;
use Phalcon\Mvc\Model\Validator\PresenceOf as IsPresence;
/**
 *  
 */
class Users extends \Phalcon\Mvc\Model
{

    public $id;
    public $email;
    public $name;

    public function validation()
    {
        $this->validate(new IsEmail(array(
            'field' => 'email'
        )));

        $this->validate(new IsPresence(array(
            'field' => 'name',
            'message' => '名字不能为空丫'
        )));

        return !$this->validationHasFailed();
    }

    public function getAll()
    {
        return $this->modelsManager->executeQuery('select * from users');
    }
}