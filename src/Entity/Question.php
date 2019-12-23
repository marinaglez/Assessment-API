<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @OneToMany(targetEntity="Choice", mappedBy="question")
     * @var Choice[]
     */
    private $choices = [];



    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface  $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Getter for choices
     *
     * @access
     * @return Choice[]
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Setter for choices
     *
     * @param Choice[] $choices New value for property
     *
     * @access
     * @return void
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
    }

    public function addChoice($choice): void
    {
        $this->choices[$choice];
    }


}
