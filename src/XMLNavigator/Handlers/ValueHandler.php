<?php

namespace Arris\Toolkit\XMLNavigator\Handlers;

/**
 * Class ValueHandler
 */
class ValueHandler implements IValueHandler
{
    /**
     * Собственно значение
     *
     * @var $_value mixed
     */
    private $_value = null;

    /**
     * Флаг "Значение задано"
     *
     * @var $_has bool
     */
    private $_has = false;

    /**
     * Значение по умолчанию для неопределённого значения,
     * используется когда значение не задано
     *
     * @var $_default mixed произвольное значение
     */
    private $_default = null;

    /**
     * Создать экземпляр с заданным значением
     *
     * @param $value mixed произвольное значение
     */
    public function __construct($value = null)
    {
        $this->setValue($value)->setHas(true);
    }

    /**
     * Создать экземпляр с незаданным значением
     *
     * @return IValueHandler
     */
    public static function asUndefined(): IValueHandler
    {
        $handler = new static();
        $handler->_setUndefined();

        return $handler;
    }

    /**
     * Установить значение незаданным
     *
     * @return IValueHandler
     */
    private function _setUndefined(): IValueHandler
    {
        $this->setHas(false);

        return $this;
    }

    /**
     * Возвращает флаг "Имеет значение"
     *
     * @return bool
     */
    public function has(): bool
    {
        return $this->_has;
    }

    /**
     * Возвращает значение как оно есть
     *
     * @return mixed
     */
    public function asIs()
    {
        return $this->has() ? $this->_value : $this->_default;
    }

    /**
     * Возвращает значение приведённое к int
     *
     * @return int
     */
    public function int(): int
    {
        return (int)($this->asIs());
    }

    /**
     * Возвращает значение приведённое к string
     *
     * @return string
     */
    public function str(): string
    {
        return (string)($this->asIs());
    }

    /**
     * Возвращает значение приведённое к boolean
     *
     * @return bool
     */
    public function bool(): bool
    {
        return (bool)($this->asIs());
    }

    /**
     * Возвращает значение приведённое к double (float)
     *
     * @return float
     */
    public function double(): float
    {
        return (float)($this->asIs());
    }

    /**
     * Возвращает значение приведённое к массиву
     *
     * @return array
     */
    public function array(): array
    {
        return (array)($this->asIs());
    }

    /**
     * Возвращает значение приведённое к объекту
     *
     * @return object
     */
    public function object(): object
    {
        return (object)($this->asIs());
    }

    /**
     * Возвращает тип значения, одно из:
     * "boolean" "integer" "double"  "string" "array"
     * "object" "resource" "resource (closed)" "NULL" "unknown type"
     *
     * @return string
     */
    public function type(): string
    {
        return gettype($this->asIs());
    }

    /**
     * Использовать зданное значение в качестве значения по умолчанию
     *
     * @param $value mixed значение по умолчанию, будет присвоено
     *               если значение незаданное
     *
     * @return IValueHandler
     */
    public function default($value = null): IValueHandler
    {
        $this->_default = $value;

        return $this;
    }

    /**
     * @param mixed $value of any type
     *
     * @return self
     */
    private function setValue($value): self
    {
        $this->_value = $value;

        return $this;
    }

    /**
     * @param bool $has
     *
     * @return IValueHandler
     */
    private function setHas(bool $has): IValueHandler
    {
        $this->_has = $has;

        return $this;
    }
}
