<?php
namespace Ishgo\Work\Controllers;

use Ishgo\Index\Models\Users;

class IndexController extends CommonController
{
    public function indexAction()
    {
        echo '<h1>hello world! work station</h1>';
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