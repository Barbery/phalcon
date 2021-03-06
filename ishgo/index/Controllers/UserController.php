<?php
namespace Ishgo\Index\Controllers;

/**
 * @RoutePrefix("/api/users")
 */
class UserController extends CommonController
{
    /**
     * @Get("/?{id:\d*}")
     */
    public function indexAction($id=0)
    {
        if (empty($id)) {
            echo 'all users';
        } else {
            echo 'user by id:' . $id;
        }
    }


    /**
     * @Post("/{id:\d+}")
     */
    public function saveAction($id)
    {
        echo 'update user by id:' . $id;
    }


    /**
     * @Put("/")
     */
    public function addAction()
    {
        echo 'add user';
    }


    /**
     * @Delete("/{id:\d+}")
     */
    public function deleteAction($id)
    {
        echo 'delete user by id:' . $id;
    }



    /**
     * @Post("/login")
     */
    public function loginAction()
    {
        echo 'user login';
    }

}