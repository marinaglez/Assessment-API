<?php

declare(strict_types=1);

namespace App\Dto\Request;

use Symfony\Component\Validator\Constraints as Assert;

class translateQuestionsRequest
{
    /**
     * @var string
     *
     * @Assert\NotNull
     * @Assert\NotBlank()
     * @Assert\Locale()
     */
    private $lang;

    public function getLang(): string
    {
        return $this->lang;
    }

    public function setLang(string $lang): void
    {
        $this->lang = $lang;
    }
}
