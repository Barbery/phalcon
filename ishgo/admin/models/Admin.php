<?php
namespace Ishgo\Admin\Models;

class Admin extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;
     
    /**
     *
     * @var string
     */
    public $username;
     
    /**
     *
     * @var string
     */
    public $password;
     
    /**
     *
     * @var integer
     */
    public $role_id;
     
    /**
     *
     * @var integer
     */
    public $status;
     
    /**
     *
     * @var string
     */
    public $remark;
     
    /**
     * Independent Column Mapping.
     */
    public function columnMap() {
        return array(
            'id' => 'id', 
            'username' => 'username', 
            'password' => 'password', 
            'role_id' => 'role_id', 
            'status' => 'status', 
            'remark' => 'remark'
        );
    }

}
