<?php
namespace app\components\createobj\factory;

/**
 * 长方形
 */
class Rectangle implements ShapeInterface
{
    /**
     * 获取面积
     */
    public function getArea(array $params)
    {
        return $area = $params['width'] * $params['length'];
    }
}
