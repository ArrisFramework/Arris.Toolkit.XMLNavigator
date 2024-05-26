<?php

namespace Arris\Toolkit\XMLNavigator;

trait JsonSerializeTrait
{
    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

}