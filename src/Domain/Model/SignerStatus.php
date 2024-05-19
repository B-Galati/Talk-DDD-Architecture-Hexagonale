<?php

declare(strict_types=1);

namespace App\Domain\Model;

enum SignerStatus: string {
    case Init = 'init';
    case Signed = 'signed';
}
