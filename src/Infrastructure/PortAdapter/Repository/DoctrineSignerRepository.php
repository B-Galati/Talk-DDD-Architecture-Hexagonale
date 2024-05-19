<?php

declare(strict_types=1);

namespace App\Infrastructure\PortAdapter\Repository;

use App\Domain\Model\Signer;
use App\Domain\Model\SignerRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Adapter
 */
final readonly class DoctrineSignerRepository implements SignerRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(Signer $signer): void
    {
        $this->entityManager->persist($signer);
        $this->entityManager->flush();
    }
}
