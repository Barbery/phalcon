<?php
namespace Test;

use Ishgo\Index\Models\Users,
    Ishgo\Admin\Controllers\IndexController,
    Phalcon\Test\ModelTestCase as PhalconTestCase;
/**
 * Class UnitTest
 */
class UnitTest extends PhalconTestCase {



    public function testTestCase() {

        $this->assertEquals('works',
            'works',
            'This is OK'
        );
    }



    public function testUser()
    {
        $data = Users::find();
        $this->assertFalse(empty($data->toArray()));
    }


    public function testController()
    {
        $a = new IndexController();
        $this->assertEquals('1', $a->testAction());
    }
}