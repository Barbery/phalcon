<?php

use Phalcon\Mvc\Model\Validator\Email as CheckEmail;
use Phalcon\Mvc\Model\Validator\PresenceOf as CheckPresence;
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
        $this->validate(new CheckEmail(array(
            'field' => 'email'
        )));

        $this->validate(new CheckPresence(array(
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