<?php
namespace Ishgo\Admin\Controllers;

class SignupController extends CommonController
{
    public function indexAction()
    {

    }


    public function testAction()
    {
        echo 'admin test';
    }


    public function registerAction()
    {

        $user = new Users();

        //Store and check for errors
        $success = $user->save($this->request->getPost(), array('name', 'email'));

        if ($success) {
            echo "Thanks for registering!";
        } else {
            echo "Sorry, the following problems were generated: ";
            foreach ($user->getMessages() as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
}