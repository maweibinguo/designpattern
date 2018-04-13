<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\components\behavior\FirstObserver;
use app\components\behavior\SecondObserver;
use app\components\behavior\StatusSubject;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ObserverController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $observer_first = new FirstObserver();
        $observer_second = new SecondObserver();
        $subject = new StatusSubject();
        $subject->attach($observer_first);
        $subject->attach($observer_second);
        $subject->name = 'zero';
    }
}
