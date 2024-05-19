<?php

declare(strict_types=1);

namespace App\Controller;

use App\Domain\Model\SignatureRequest;
use App\Domain\Model\Signer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final readonly class SignatureController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[Route('/sign', methods: ['POST'])]
    public function sign(Request $request): Response
    {
        // Get required data from HTTP request
        $name = $request->request->get('name');

        // Use these data with the domain model
        $signatureRequest = SignatureRequest::initiate($name);
        $signer = new Signer($signatureRequest);
        $signer->sign();

        // Persist
        $this->entityManager->persist($signatureRequest);
        $this->entityManager->persist($signer);
        $this->entityManager->flush();

        // Render the HTTP response
        return new Response();
    }
}
