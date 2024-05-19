<?php

declare(strict_types=1);

namespace App\Ui\Http;

use App\Application\Service\SignatureService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final readonly class SignatureController
{
    public function __construct(private SignatureService $signatureService)
    {}

    /**
     * L'attribut `Route` de Symfony est le port de notre architecture hexagonal
     * L'implémentation de la méthode est l'adapter.
     * Il se contente de traduire les données reçues afin d'appeler l'application.
     *
     * => Bien souvent, il n'est donc pas nécessaire de coder soit-même les ports
     * => Le port constitue le contrat que l'on souhaite exposer à l'externe
     *    pour exploiter l'application.
     */
    #[Route('/sign', methods: ['POST'])]
    public function sign(Request $request): Response
    {
        // Get required HTTP data
        $name = $request->request->get('name');

        // Use these data with our Application
        $this->signatureService->sign($name);

        // Render the HTTP response
        return new Response();
    }
}
