<?php
/**
 * 对象工厂用于产生对象
 */
namespace app\components\createobj\factory;

class Factory 
{
    /**
     * 生产对象
     */
    public static function getInstance(string $shape)
    {
        switch($shape) {
            case 'circle':
                $obj = new Circle();
                break; 
            case 'rectangle':
                $obj = new Rectangle();
                break;
            default:
                throw new \InvalidArgumentException("{$shape} is not supossed");
                break;
        } 
        return $obj;
    }
}
