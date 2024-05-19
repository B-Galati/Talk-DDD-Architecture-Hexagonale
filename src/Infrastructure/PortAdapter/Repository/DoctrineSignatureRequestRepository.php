<?php

declare(strict_types=1);

namespace App\Infrastructure\PortAdapter\Repository;

use App\Domain\Model\SignatureRequest;
use App\Domain\Model\SignatureRequestRepository;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Adapter
 */
final readonly class DoctrineSignatureRequestRepository implements SignatureRequestRepository
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(SignatureRequest $signatureRequest): void
    {
        $this->entityManager->persist($signatureRequest);
        $this->entityManager->flush();
    }
}
