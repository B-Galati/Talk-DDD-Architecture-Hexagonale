<?php
declare(strict_types=1);

namespace App\Application\Repository;

use App\Application\Model\SignatureRequest;

/**
 * Port secondaire
 */
interface SignatureRequestRepository
{
    public function save(SignatureRequest $signatureRequest): void;
}
