<?php

declare(strict_types=1);

namespace App\Application\Model;

enum SignerStatus: string {
    case Init = 'init';
    case Signed = 'signed';
}
