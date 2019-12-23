<?php

declare(strict_types=1);

namespace App\Dto\Request;

use Symfony\Component\Validator\Constraints as Assert;

class choiceRequest
{
    /**
     * @Typy("string")
     *
     * @Assert\NotNull
     * @Assert\NotBlank()
     */
    private $text;


    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}
