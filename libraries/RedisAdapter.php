<?php

/**
 * @class redis适配器，主要用于缓存annotations parse, 提高性能
 */
class RedisAdapter extends \Phalcon\Annotations\Adapter\Memory
{
    public function read($key)
    {
        // echo $key, PHP_EOL;
    }


    public function write($key, $data)
    {
        // echo $key, PHP_EOL;
        // var_dump($data);
    }
}