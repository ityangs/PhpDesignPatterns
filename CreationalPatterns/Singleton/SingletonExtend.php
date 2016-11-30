<?php
/**
 * Singleton class[单例模式:多个类创建单例的构造方式]
 * @author ITYangs<ityangs@163.com>
 */
abstract class FactoryAbstract {

    protected static $instances = array();

    public static function getInstance() {
        $className = self::getClassName();
        if (!(self::$instances[$className] instanceof $className)) {
            self::$instances[$className] = new $className();
        }
        return self::$instances[$className];
    }

    public static function removeInstance() {
        $className = self::getClassName();
        if (array_key_exists($className, self::$instances)) {
            unset(self::$instances[$className]);
        }
    }

    final protected static function getClassName() {
        return get_called_class();
    }

    protected function __construct() { }

    final protected function __clone() { }
}

abstract class Factory extends FactoryAbstract {

    final public static function getInstance() {
        return parent::getInstance();
    }

    final public static function removeInstance() {
        parent::removeInstance();
    }
}
// @test

class FirstProduct extends Factory {
    public $a = [];
}
class SecondProduct extends FirstProduct {
}

FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 11;
SecondProduct::getInstance()->a[] = 22;

print_r(FirstProduct::getInstance()->a);
// Array ( [0] => 1 [1] => 11 )
print_r(SecondProduct::getInstance()->a);
// Array ( [0] => 2 [1] => 22 )