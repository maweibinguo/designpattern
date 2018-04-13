<?php
/**
 * 所以形状的接口规范
 */
namespace app\components\createobj\factory;

Interface ShapeInterface
{
    /**
     * 获取面积
     */
    public function getArea(array $params);
}
