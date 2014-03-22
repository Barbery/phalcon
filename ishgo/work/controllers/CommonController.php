<?php
namespace Ishgo\Work\Controllers;


class CommonController extends \Phalcon\Mvc\Controller
{


    protected function returnJson($data = array(), $msg = '', $status = 1)
    {
        $this->view->disable();
        $this->response->setContentType('application/json', 'UTF-8');
        $result = array('data'=>$data, 'status'=>$status);
        empty($msg) || $result['msg'] = $msg;
        echo json_encode($result);
    }


    protected function error($msg = '', $data = array())
    {
        if ($this->request->isAjax()) {
            $this->returnJson($data, $msg, 0);
        }
    }


    protected function success($msg = '', $data = array())
    {
        if ($this->request->isAjax()) {
            $this->returnJson($data, $msg, 1);
        }
    }
}