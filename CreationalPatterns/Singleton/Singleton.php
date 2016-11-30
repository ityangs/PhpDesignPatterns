<?php

/**
 * Singleton class[单例模式]
 * @author ITYangs<ityangs@163.com>
 */
final class Mysql
{

    /**
     *
     * @var self[该属性用来保存实例]
     */
    private static $instance;

    /**
     *
     * @var mixed
     */
    public $mix;

    /**
     * Return self instance[创建一个用来实例化对象的方法]
     *
     * @return self
     */
    public static function getInstance()
    {
        if (! (self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 构造函数为private,防止创建对象
     */
    private function __construct()
    {}

    /**
     * 防止对象被复制
     */
    private function __clone()
    {
        trigger_error('Clone is not allowed !');
    }
}

// @test
$firstMysql = Mysql::getInstance();
$secondMysql = Mysql::getInstance();

$firstMysql->mix = 'ityangs_one';
$secondMysql->mix = 'ityangs_two';

print_r($firstMysql->mix);
// 输出： ityangs_two
print_r($secondMysql->mix);
// 输出： ityangs_two