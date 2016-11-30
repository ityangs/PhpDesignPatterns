<?php

class System{ /* ... */}
class WinSystem extends System{ /* ... */}
class MacSystem extends System{ /* ... */}
class LinuxSystem extends System{ /* ... */}



/**
 * Factory class[工厂模式]
 * @author ITYangs<ityangs@163.com>
 */
interface SystemFactory
{
    public function createSystem($type);
}

class MySystemFactory implements SystemFactory
{
    // 实现工厂方法
    public function createSystem($type)
    {
        switch ($type) {
            case 'Mac':
                return new MacSystem();
            case 'Win':
                return new WinSystem();
            case 'Linux':
                return new LinuxSystem();
        }
    }
}

//@test
//创建我的系统工厂
$System_obj = new MySystemFactory();
//用我的系统工厂分别创建不同系统对象
var_dump($System_obj->createSystem('Mac'));//输出：object(MacSystem)#2 (0) { }
var_dump($System_obj->createSystem('Win'));//输出：object(WinSystem)#2 (0) { }
var_dump($System_obj->createSystem('Linux'));//输出：object(LinuxSystem)#2 (0) { }