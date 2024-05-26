<?php

declare(strict_types=1);

namespace Arris\Toolkit\XMLNavigator\Extraction;

class ElementComposer
{
    /**
     * @param array $elems
     * @return int
     */
    protected static function extractBaseDepth(array $elems): int
    {
        $first = [];
        if ($elems) {
            reset($elems);
            $first = current($elems);
        }
        $base = 0;
        if ($first) {
            $base = current($first)[ElementExtractor::DEPTH];
        }

        return $base;
    }

}