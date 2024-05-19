<?php

declare(strict_types=1);

namespace App\Application\Model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: "signature_request")]
#[ORM\Entity]
final class SignatureRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $name;

    #[ORM\OneToOne(targetEntity: "Signer", cascade: ["persist", "remove"])]
    #[ORM\JoinColumn(name: "signer_id", referencedColumnName: "id")]
    private ?Signer $signer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getSigner(): ?Signer
    {
        return $this->signer;
    }

    public function setSigner(Signer $signer): self
    {
        $this->signer = $signer;
        // Assure que l'inverse est correctement établi
        if ($signer->getSignatureRequest() !== $this) {
            $signer->setSignatureRequest($this);
        }

        return $this;
    }
}
