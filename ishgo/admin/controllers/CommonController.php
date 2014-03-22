<?php
namespace Ishgo\Admin\Controllers;


class CommonController extends \Phalcon\Mvc\Controller
{

    public function initialize()
    {
        if (empty($_SESSION['adminId'])) {
            $this->response->redirect('admin/index/login');
        }
    }


    protected function returnJson($data = array(), $msg = '', $status = 1)
    {
        $this->view->disable();

        $result = array('data'=>$data, 'status'=>$status);
        empty($msg) || $result['msg'] = $msg;
        $this->response->setContentType('application/json', 'UTF-8');
        $this->response->setJsonContent($result);
        $this->response->send();
    }


    protected function error($msg = '', $data = array())
    {
        // if ($this->request->isAjax()) {
            return $this->returnJson($data, $msg, 0);
        // }
    }


    protected function success($msg = '', $data = array())
    {
        // if ($this->request->isAjax()) {
            return $this->returnJson($data, $msg, 1);
        // }
    }
}