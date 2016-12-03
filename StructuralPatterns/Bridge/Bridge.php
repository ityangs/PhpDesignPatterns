<?php
/**
 * 
 *实现化角色, 给出实现化角色的接口，但不给出具体的实现。
 */
abstract class Implementor { 
    abstract public function operationImp();
}
 
class ConcreteImplementorA extends Implementor { // 具体化角色A
    public function operationImp() {echo "A";}
}
 
class ConcreteImplementorB extends Implementor { // 具体化角色B
    public function operationImp() {echo "B";}
}
 

/**
 * 
 * 抽象化角色，抽象化给出的定义，并保存一个对实现化对象的引用
 */
abstract class Abstraction { 
    protected $imp; // 对实现化对象的引用
    public function operation() {
        $this->imp->operationImp();
    }
}
class RefinedAbstraction extends Abstraction { // 修正抽象化角色, 扩展抽象化角色，改变和修正父类对抽象化的定义。
    public function __construct(Implementor $imp) {
        $this->imp = $imp;
    }
    public function operation() { $this->imp->operationImp(); }
}





// client
$abstraction = new RefinedAbstraction(new ConcreteImplementorA());
$abstraction->operation();//输出:A
$abstraction = new RefinedAbstraction(new ConcreteImplementorB());
$abstraction->operation();//输出:B
?>