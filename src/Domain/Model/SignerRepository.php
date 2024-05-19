<?php

declare(strict_types=1);

namespace App\Domain\Model;

/**
 * Port secondaire
 */
interface SignerRepository
{
    public function save(Signer $signer): void;
}
