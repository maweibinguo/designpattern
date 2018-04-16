<?php
/**
 * 组合模式,以zend-config 组建为例子
 */
namespace app\commands\structure;

use yii\console\Controller;
use Zend\Config\Config;

class CompositeController extends Controller
{
    /**
     * 测试数据
     */
    public function  actionIndex()
    {
        $config_list =  [
                            'webhost'  => 'www.example.com',
                            'database' => [
                                'adapter' => 'pdo_mysql',
                                'params'  => [
                                    'host'    => 'db.example.com',
                                    'username'=> 'dbuser',
                                    'password'=> 'secret',
                                    'dbname'  => 'mydatabase',
                                ],
                            ]   ,
                        ]; 
        try{
            $config_obj = new Config($config_list, true);    
            //var_dump($config_obj->database->params->host);die();
            $config_obj->database->params->host = 'sdf';
        } catch (\Exception $e) {
            var_dump($e->getMessage(), get_class($e));die();
        }
    }


    public function actionWrite()
    {
        $config = new \Zend\Config\Config([], true);
        $config->production = [];

        $config->production->webhost = 'www.example.com';
        $config->production->database = [];
        $config->production->database->params = [];
        $config->production->database->params->host = 'localhost';
        $config->production->database->params->username = 'production';
        $config->production->database->params->password = 'secret';
        $config->production->database->params->dbname = 'dbproduction';

        $writer = new \Zend\Config\Writer\Ini();
        echo $writer->toString($config);
    }
}
