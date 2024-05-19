<?php

declare(strict_types=1);

namespace App\Application\Model;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "signer")]
final class Signer
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\OneToOne(targetEntity: "SignatureRequest", mappedBy: "signer", cascade: ["persist", "remove"])]
    private ?SignatureRequest $signatureRequest = null;

    #[ORM\Column(type: 'string', enumType: SignerStatus::class)]
    public SignerStatus $status;

    #[ORM\Column(Types::DATE_IMMUTABLE, enumType: SignerStatus::class)]
    private ?\DateTimeImmutable $signedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSignatureRequest(): ?SignatureRequest
    {
        return $this->signatureRequest;
    }

    public function setSignatureRequest(SignatureRequest $signatureRequest): self
    {
        $this->signatureRequest = $signatureRequest;
        // Assure que l'inverse est correctement établi
        if ($signatureRequest->getSigner() !== $this) {
            $signatureRequest->setSigner($this);
        }

        return $this;
    }

    public function getSignerStatus(): SignerStatus
    {
        return $this->status;
    }

    public function setSignerStatus(SignerStatus $status): void
    {
        $this->status = $status;
    }

    public function getSignedAt(): ?\DateTimeImmutable
    {
        return $this->signedAt;
    }

    public function setSignedAt(\DateTimeImmutable $signedAt): void
    {
        $this->signedAt = $signedAt;
    }
}
