<?php

declare(strict_types=1);

namespace App\Dto\Request;

use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

class questionRequest
{
    /**
     * @Type("string")
     * @Assert\NotNull
     * @Assert\NotBlank()
     */
    private $text;

    /**
     * @Type("string")
     * @Assert\NotNull
     * @Assert\NotBlank()
     * @Assert\DateTime
     */
    private $createdAt;

    /**
     * @Type("array")
     * @Assert\Count(
     *      min = 3,
     *      max = 3,
     *      exactMessage = "You must specify 3 choices"
     * )
     * @Assert\NotNull
     * @Assert\Valid
     */
    private $choices;

    /**
     * Put a description here
     *
     *
     * @access
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * Put a description here
     *
     * @param string $text
     *
     * @access
     * @return void
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * Getter for createdAt
     *
     * @access
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Setter for createdAt
     *
     * @param string $createdAt New value for property
     *
     * @access
     * @return void
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Getter for choices
     *
     * @access
     * @return array
     */
    public function getChoices(): array
    {
        return $this->choices;
    }

    /**
     * Setter for choices
     *
     * @param array $choices New value for property
     *
     * @access
     * @return void
     */
    public function setChoices(array $choices): void
    {
        $this->choices = $choices;
    }
}
