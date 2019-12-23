<?php

declare(strict_types=1);

namespace App\Dto\Request;

use Symfony\Component\Validator\Constraints as Assert;

class questionRequest
{
    /**
     * @var string
     *
     * @Assert\NotNull
     * @Assert\NotBlank()
     */
    private $text;

    /**
     * @var string
     *
     * @Assert\NotNull
     * @Assert\NotBlank()
     * @Assert\DateTime
     */
    private $updatedAt;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * Getter for updatedAt
     *
     * @access
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Setter for updatedAt
     *
     * @param string $updatedAt New value for property
     *
     * @access
     * @return void
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
}
