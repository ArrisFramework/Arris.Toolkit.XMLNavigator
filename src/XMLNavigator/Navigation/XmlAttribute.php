<?php

namespace Arris\Toolkit\XMLNavigator\Navigation;

use Arris\Toolkit\XMLNavigator\JsonSerializeTrait;

class XmlAttribute implements IXmlAttribute, \JsonSerializable
{
    use JsonSerializeTrait;

    private string $name;
    private string $value;

    /**
     * @param string $name Имя атрибута
     * @param string $value Значение атрибута
     */
    public function __construct(string $name, string $value,)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /* @inheritdoc */
    public function name(): string
    {
        return $this->name;
    }

    /* @inheritdoc */
    public function value(): string
    {
        return $this->value;
    }

}