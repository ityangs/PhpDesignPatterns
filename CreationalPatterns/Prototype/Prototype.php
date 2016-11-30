<?php
/**
 * 
 * 原型接口
 *
 */
interface Prototype { public function copy(); }
 
/**
 * 具体实现
 *
 */
class ConcretePrototype implements Prototype{
    private  $_name;
    public function __construct($name) { $this->_name = $name; } 
    public function copy() { return clone $this;}
}
 
class Test {}
 
// client
$object1 = new ConcretePrototype(new Test());
var_dump($object1);//输出：object(ConcretePrototype)#1 (1) { ["_name":"ConcretePrototype":private]=> object(Test)#2 (0) { } } 
$object2 = $object1->copy();
var_dump($object2);//输出：object(ConcretePrototype)#3 (1) { ["_name":"ConcretePrototype":private]=> object(Test)#2 (0) { } }
?>