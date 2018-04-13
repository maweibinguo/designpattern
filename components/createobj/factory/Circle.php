<?php
/**
 * 圆形类
 */
namespace app\components\createobj\factory;

class Circle implements ShapeInterface
{
    /**
     * 获取面积
     */
    public function getArea(array $params)
    {
        return $area = pi() * pow($params['r'], 2);
    }
}
