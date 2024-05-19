<?php

declare(strict_types=1);

namespace App\Application\Service;

use App\Application\Model\SignatureRequest;
use App\Application\Model\Signer;
use App\Application\Model\SignerStatus;
use App\Application\Repository\SignatureRequestRepository;
use App\Application\Repository\SignerRepository;
use Symfony\Component\Clock\Clock;

final readonly class SignatureService
{
    public function __construct(
        private SignatureRequestRepository $signatureRequestRepository,
        private SignerRepository $signerRepository
    ) { }

    public function sign(string $name): void
    {
        $signatureRequest = new SignatureRequest();
        $signatureRequest->setName($name);

        $signer = new Signer();
        $signer->setSignatureRequest($signatureRequest);
        $signer->setSignerStatus(SignerStatus::Signed);
        $signer->setSignedAt(Clock::get()->now());

        $this->signatureRequestRepository->save($signatureRequest);
        $this->signerRepository->save($signer);
    }
}
