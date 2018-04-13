<?php
/**
 * 状态主题
 */
namespace app\components\behavior;

class StatusSubject implements \SplSubject
{
    /**
     * 观察者列表
     */
    protected $observer_list;

    /**
     * 改变的数据
     */
    public $change_data = [];

    /**
     * 初始化对象容器
     */
    public function __construct()
    {
        $this->observer_list = new \SplObjectStorage();
    }

    /**
     * 添加观察者
     */
    public function attach(\SplObserver $observer)
    {
       $this->observer_list->attach($observer);  
    }

    /**
     * 删除观察者
     */
    public function detach(\SplObserver $observer)
    {
        $this->observer_list->detach($observer); 
    }

    /**
     * 通知观察者
     */
    public function notify()
    {
        if($this->observer_list->count() <= 0) {
            throw new \LogicException('add observer first');
        }
        foreach($this->observer_list as $observer) {
            $observer->update($this);
        } 
    }

    /**
     * 发生改变
     */
    public function __set($name, $value)
    {
        $this->change_data[$name] = $value;
        $this->notify();
    }
}
