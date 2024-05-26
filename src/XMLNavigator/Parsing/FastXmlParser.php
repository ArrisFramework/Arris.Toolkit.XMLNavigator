<?php

namespace Arris\Toolkit\XMLNavigator\Parsing;

use Arris\Toolkit\XMLNavigator\Extraction\HierarchyComposer;
use Arris\Toolkit\XMLNavigator\Extraction\PrettyPrintComposer;
use Arris\Toolkit\XMLNavigator\General\Notation;
use Generator;
use XMLReader;

class FastXmlParser
{
    /**
     * @param XMLReader $reader
     * @param callable $detectElement
     * @param string $val
     * @param string $attr
     * @param string $name
     * @param string $seq
     * @return Generator
     */
    public static function extractHierarchy(
        XMLReader $reader,
        callable $detectElement,
        string $val = Notation::VALUE,
        string $attr = Notation::ATTRIBUTES,
        string $name = Notation::NAME,
        string $seq = Notation::SEQUENCE,
    ): Generator {
        $isSuitable = $detectElement($reader);
        $mayRead = true;
        while ($mayRead && !$isSuitable) {
            $mayRead = $reader->read();

            $isSuitable = $detectElement($reader);
        }

        while ($isSuitable) {
            $result = HierarchyComposer::compose(
                $reader,
                $val,
                $attr,
                $name,
                $seq,
            );

            yield $result;

            while (
                $mayRead &&
                $reader->nodeType !== XMLReader::ELEMENT
            ) {
                $mayRead = $reader->read();
            }

            $isSuitable = $detectElement($reader);
        }
    }

    /**
     * @param XMLReader $reader
     * @param callable $detectElement
     * @param string $val
     * @param string $attr
     * @return Generator
     */
    public static function extractPrettyPrint(
        XMLReader $reader,
        callable $detectElement,
        string $val = Notation::VAL,
        string $attr = Notation::ATTR,
    ): Generator {
        $isSuitable = $detectElement($reader);
        $mayRead = true;
        while ($mayRead && !$isSuitable) {
            $mayRead = $reader->read();

            $isSuitable = $detectElement($reader);
        }

        while ($isSuitable) {
            $result = PrettyPrintComposer::compose(
                $reader,
                $val,
                $attr,
            );

            yield $result;

            while (
                $mayRead &&
                $reader->nodeType !== XMLReader::ELEMENT
            ) {
                $mayRead = $reader->read();
            }

            $isSuitable = $detectElement($reader);
        }
    }
}