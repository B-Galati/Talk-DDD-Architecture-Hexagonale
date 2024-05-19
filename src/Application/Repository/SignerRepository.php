<?php

namespace App\Application\Repository;

use App\Application\Model\Signer;

/**
 * Port secondaire
 */
interface SignerRepository
{
    public function save(Signer $signer): void;
}
