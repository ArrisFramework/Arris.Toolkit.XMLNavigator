<?php

namespace Arris\Toolkit\XMLNavigator\Handlers;

/**
 * Class ArrayHandler
 */
class ArrayHandlerBase
{
    /**
     * Массив с данными
     *
     * @var $_data array массив с которым работает класс
     */
    protected $_data = [];

    /**
     * Синглтон для неопределённого значения (значение не задано)
     *
     * @var $_undefined null|static
     */
    private static $_undefined = null;

    private $isUndefined = true;

    /**
     * возвращает флаг "Массив не задан"
     *
     * @return bool
     */
    public function isUndefined(): bool
    {
        return $this->isUndefined;
    }

    /**
     * Возвращает с незаданным значением
     *
     * @return static
     */
    protected static function asUndefined()
    {
        $wasInit = !\is_null(self::$_undefined);
        if (!$wasInit) {
            $handler = new static();
            $handler->_setUndefined();
            self::$_undefined = $handler;
        }

        return self::$_undefined;
    }

    /**
     * Установить значение незаданным
     *
     * @return static
     */
    private function _setUndefined()
    {
        $this->isUndefined = true;

        return $this;
    }

    /**
     * Установить как не заданное
     *
     * @return static
     */
    protected function setAsDefined()
    {
        $this->isUndefined = false;

        return $this;
    }
}
