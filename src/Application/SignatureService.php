<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Model\SignatureRequest;
use App\Domain\Model\SignatureRequestRepository;
use App\Domain\Model\Signer;
use App\Domain\Model\SignerRepository;

final readonly class SignatureService
{
    public function __construct(
        private SignatureRequestRepository $signatureRequestRepository,
        private SignerRepository $signerRepository
    ) { }

    public function sign(string $name): void
    {
        /**
         * Les services de la couche application deviennent des orchestrateurs.
         * Toute le la logique métier est maintenant dans la couche `Domain`.
         */

        $signatureRequest = SignatureRequest::initiate($name);
        $signer = new Signer($signatureRequest);
        $signer->sign();

        $this->signatureRequestRepository->save($signatureRequest);
        $this->signerRepository->save($signer);
    }
}
