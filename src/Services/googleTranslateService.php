<?php

declare(strict_types=1);

namespace App\Services;

use Stichoza\GoogleTranslate\GoogleTranslate;

class googleTranslateService
{

    /**
     * @var string
     */
    private $source = 'es';

    /**
     * @var GoogleTranslate
     */
    private $tr;

    public function __construct()
    {
        $this->tr = new GoogleTranslate($this->source);
    }

    /**
     *
     * @param string $sentence
     * @param string $target
     *
     * @return string
     * @throws \ErrorException
     * @access
     */
    public function translate(string $sentence, string $target): string
    {
        $this->tr->setTarget($target);

        return $this->tr->translate($sentence);
    }

}
