<?php /** @noinspection PhpPropertyOnlyWrittenInspection */

declare(strict_types=1);

namespace App\Domain\Model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "signature_request")]
final class SignatureRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    private function __construct(
        #[ORM\Column(type: "string", length: 255)]
        private readonly string $name,
    ) {
    }

    public static function initiate(string $name): self
    {
        return new self($name);
    }
}
