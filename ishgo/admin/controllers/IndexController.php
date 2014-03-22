<?php
namespace Ishgo\Admin\Controllers;

use \Ishgo\Admin\Models\Admin,
    \Gregwar\Captcha\CaptchaBuilder,
    \Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        // if (empty($_SESSION['adminId'])) {
        //     $this->response->redirect('admin/index/login');
        // }
    }


    public function getUserAction()
    {
        $data = Users::find();

        $this->returnJson($data->toArray());
        $this->view->disable();
    }


    public function loginAction()
    {
        if ( ! empty($_SESSION['adminId'])) {
            $this->response->redirect("admin/index/index");
        }
    }



    public function loginPostAction()
    {
        $data = Admin::findFirst(array(
            'username = :username:',
            'bind' => array('username' => $_POST['username'])
        ));
        if (empty($data)) {
            return $this->error('用户不存在');
        }

        $data = $data->toArray();
        if ( ! password_verify($_POST['password'], $data['password'])) {
            return $this->error('密码错误');
        }

        $_SESSION['adminId'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        return $this->success('ok');
    }


    public function captchaAction()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        $_SESSION['captcha'] = $builder->getPhrase();

        header('Content-type: image/jpeg');
        $builder->output();
    }



    public function isRightCaptchaAction()
    {
        if (empty($_GET['captcha']) || strtolower($_GET['captcha'] !== strtolower($_SESSION['captcha']))) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }

        $this->response->setJsonContent($data);
        $this->response->send();
    }


    public function testAction()
    {
        return '1';
    }
}