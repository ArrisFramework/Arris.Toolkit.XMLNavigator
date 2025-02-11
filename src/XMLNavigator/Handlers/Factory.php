<?php

namespace Arris\Toolkit\XMLNavigator\Handlers;

class Factory implements IFactory
{
    public static function getValueHandler($value = null): IValueHandler
    {
        return new ValueHandler($value);
    }

    public static function getUndefinedValue(): IValueHandler
    {
        return ValueHandler::asUndefined();
    }
}
