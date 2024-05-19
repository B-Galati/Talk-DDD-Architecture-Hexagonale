<?php

declare(strict_types=1);

namespace App\Domain\Model;

/**
 * Port secondaire
 */
interface SignatureRequestRepository
{
    public function save(SignatureRequest $signatureRequest): void;
}
