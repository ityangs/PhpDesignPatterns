<?php

class System{}
class Soft{}

class MacSystem extends System{}
class MacSoft extends Soft{}

class WinSystem extends System{}
class WinSoft extends Soft{}


/**
 * AbstractFactory class[抽象工厂模式]
 * @author ITYangs<ityangs@163.com>
 */
interface AbstractFactory {
    public function CreateSystem();
    public function CreateSoft();
}

class MacFactory implements AbstractFactory{
    public function CreateSystem(){ return new MacSystem(); }
    public function CreateSoft(){ return new MacSoft(); }
}

class WinFactory implements AbstractFactory{
    public function CreateSystem(){ return new WinSystem(); }
    public function CreateSoft(){ return new WinSoft(); }
}






//@test:创建工厂->用该工厂生产对应的对象

//创建MacFactory工厂
$MacFactory_obj = new MacFactory();
//用MacFactory工厂分别创建不同对象
var_dump($MacFactory_obj->CreateSystem());//输出：object(MacSystem)#2 (0) { }
var_dump($MacFactory_obj->CreateSoft());// 输出：object(MacSoft)#2 (0) { }

  
//创建WinFactory
$WinFactory_obj = new WinFactory();
//用WinFactory工厂分别创建不同对象
var_dump($WinFactory_obj->CreateSystem());//输出：object(WinSystem)#3 (0) { }
var_dump($WinFactory_obj->CreateSoft());//输出：object(WinSoft)#3 (0) { }
