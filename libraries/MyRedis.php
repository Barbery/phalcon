<?php
/**
 * 
 */
class MyRedis extends Redis
{
    
    public $host = '/var/run/redis/redis.sock';
    // public $host = '127.0.0.1';
    // public $port = 6379;
    public $port = 0;
    public $timeout = 0;
    public $instance = null;

    function __construct()
    {
        parent::__construct();
        $this->pconnect($this->host);
    }


    public function get($key)
    {
        $data = parent::GET($key);
        return msgpack_unpack($data);
    }


    public function set($key, $value, $timeout = null)
    {
        $value = msgpack_pack($value);
        if ($timeout === null)
            return parent::SET($key, $value);

        return parent::SET($key, $value, $timeout);
    }


    // persistent connection do not need close
    // function __destruct()
    // {
    //     $this->instance->close();
    // }
}