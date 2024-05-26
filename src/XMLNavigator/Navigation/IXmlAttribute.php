<?php

declare(strict_types=1);

namespace Arris\Toolkit\XMLNavigator\Navigation;

/**
 * Интерфейс для объекта XML атрибута
 */
interface IXmlAttribute
{
    /** Returns name of attribute */
    public function name(): string;

    /** Returns value of attribute */
    public function value(): string;
}