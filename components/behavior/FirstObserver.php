<?php
/**
 * 第二个观察者
 */
namespace app\components\behavior;

class FirstObserver implements \SplObserver
{
    /**
     * 进行更新
     */
    public function update(\SplSubject $subject)
    {
        var_dump(get_class($subject),$subject->change_data);
    }
}
