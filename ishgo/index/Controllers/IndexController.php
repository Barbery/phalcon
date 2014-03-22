<?php
namespace Ishgo\Index\Controllers;

use Ishgo\Index\Models\Users;

class IndexController extends CommonController
{
    public function indexAction()
    {
        echo '<h1>hello world!</h1>';
        echo \Phalcon\Tag::linkTo('signup', 'sign up here');

        parse_str(file_get_contents("php://input"), $post_vars);
        print_r($post_vars);
        print_r($_SERVER);

        $this->view->disable();
    }


    public function getUserAction()
    {
        $data = Users::find();

        $this->returnJson($data->toArray());
        $this->view->disable();
    }


    public function testAction($value='1')
    {
        print_r($_SERVER);
        var_dump($value);
        $this->view->disable();
    }
}