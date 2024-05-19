<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

declare(strict_types=1);

namespace App\Domain\Model;

use Doctrine\DBAL\Types\Types;
use Symfony\Component\Clock\Clock;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "signer")]
final class Signer
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(Types::BIGINT)]
    private int $id;

    #[ORM\Column(Types::DATE_IMMUTABLE, enumType: SignerStatus::class)]
    private ?\DateTimeImmutable $signedAt = null;

    public function __construct(
        #[ORM\OneToOne(targetEntity: "SignatureRequest", mappedBy: "signer", cascade: ["persist", "remove"])]
        private readonly SignatureRequest $signatureRequest,

        #[ORM\Column(Types::STRING, enumType: SignerStatus::class)]
        private SignerStatus $status = SignerStatus::Init,
    ) {
    }

    public function sign(): void
    {
        $this->status = SignerStatus::Signed;
        $this->signedAt = Clock::get()->now();
    }
}
