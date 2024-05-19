<?php

declare(strict_types=1);

namespace App\Command;

use App\Domain\Model\SignatureRequest;
use App\Domain\Model\Signer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('app:sign')]
final  class SignCommand extends Command
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->addArgument('name');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Get required data from command
        $name = $input->getArgument('name');

        // Use these data with the domain model
        $signatureRequest = SignatureRequest::initiate($name);
        $signer = new Signer($signatureRequest);
        $signer->sign();

        // Persist
        $this->entityManager->persist($signatureRequest);
        $this->entityManager->persist($signer);
        $this->entityManager->flush();

        // Return the command result
        return Command::SUCCESS;
    }
}
