<?php

declare(strict_types=1);

namespace App\DataTransformer;

use App\Dto\Request\CustomerInfoRequest;
use Entity\PolicyHolder;

class PolicyHolderDataTransformer
{
    public function __construct()
    {
    }

    public function dtoToPolicyHolder(CustomerInfoRequest $customerInfoRequest, PolicyHolder $policyHolder): PolicyHolder
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
