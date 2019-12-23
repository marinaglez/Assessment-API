<?php

declare(strict_types=1);

namespace App\DataTransformer;

use App\Dto\Request\questionRequest;
use App\Entity\Question;

class QuestionsTransformer
{
    public function __construct()
    {
    }

    /**
     * Put a description here
     *
     * @param questionRequest $questionRequest
     * @param Question        $question
     *
     * @access
     * @return Question
     * @throws \Exception
     */
    public function dtoToQuestion(questionRequest $questionRequest, Question $question): Question
    {
        $question->setText($questionRequest->getText());
        $question->setChoices($questionRequest->getChoices());
        $question->setCreatedAt(new \Datetime($questionRequest->getCreatedAt()));
        return $question;
    }
}
