<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionListRepository")
 */
class QuestionList
{

    /**
     * @OneToMany(targetEntity="Question", mappedBy="question")
     * @var Question[]
     */
    private $questions;


    /**
     * Getter for questions
     *
     * @access
     * @return Question[]
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Setter for questions
     *
     * @param Question[] $questions New value for property
     *
     * @access
     * @return void
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;
    }

    /**
     *
     * @param $question
     *
     * @access
     * @return void
     */
    public function addQuestion($question)
    {
        $this->questions[$question];
    }

}
