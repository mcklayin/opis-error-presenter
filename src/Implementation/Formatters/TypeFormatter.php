<?php

declare(strict_types=1);

namespace OpisErrorPresenter\Implementation\Formatters;

use Opis\JsonSchema\ValidationError;
use OpisErrorPresenter\Contracts\MessageFormatter;

class TypeFormatter implements MessageFormatter
{
    private const MESSAGE = "Attribute expected to be of type ':expected:' but ':used:' given.";

    public function format(ValidationError $error): string
    {
        $keywordArgs = $error->keywordArgs();

        $replacements = [
            ':expected:' => $keywordArgs['expected'],
            ':used:' => $keywordArgs['used'],
        ];

        return strtr(self::MESSAGE, $replacements);
    }
}
