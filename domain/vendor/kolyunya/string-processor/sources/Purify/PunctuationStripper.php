<?php

namespace Kolyunya\StringProcessor\Purify;

use Kolyunya\StringProcessor\Purify\BasePurifier;

/**
 * Processor which strips punctuation characters.
 * @author Kolyunya
 */
class PunctuationStripper extends BasePurifier
{
    /**
     * @inheritdoc
     */
    protected function getPattern()
    {
        $pattern = '/[[:punct:]]/u';
        return $pattern;
    }
}
