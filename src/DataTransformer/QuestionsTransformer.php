<?php

declare(strict_types=1);

namespace App\DataTransformer;

use App\Dto\Request\questionRequest;
use App\Entity\Choice;
use App\Entity\Question;
use Entity\PolicyHolder;

class QuestionsTransformer
{
    public function __construct()
    {
    }

    public function dtoToQuestion(questionRequest $questionRequest, Question $question): Question
    {
        $policyHolder->setHolder($customerInfoRequest->getHolder());
        $policyHolder->setIdNumber($customerInfoRequest->getIdNumber());
        $policyHolder->setAddressStreet($customerInfoRequest->getAddressStreet());
        $policyHolder->setAddressNumber($customerInfoRequest->getAddressNumber());
        $policyHolder->setAddressFloor($customerInfoRequest->getAddressFloor());
        $policyHolder->setAddressDoor($customerInfoRequest->getAddressDoor());
        $policyHolder->setAddressPostcode($customerInfoRequest->getPostcode());
        $policyHolder->setAddressState($customerInfoRequest->getState());

        return $policyHolder;
    }
}
