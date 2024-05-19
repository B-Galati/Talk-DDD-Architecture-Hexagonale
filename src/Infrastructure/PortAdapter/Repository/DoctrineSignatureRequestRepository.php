<?php

declare(strict_types=1);

namespace App\Infrastructure\PortAdapter\Repository;

use App\Application\Model\SignatureRequest;
use App\Application\Repository\SignatureRequestRepository;
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
