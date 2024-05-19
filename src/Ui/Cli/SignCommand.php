<?php

declare(strict_types=1);

namespace App\Ui\Cli;

use App\Application\Service\SignatureService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('app:sign')]
final class SignCommand extends Command
{
    public function __construct(private readonly SignatureService $signatureService)
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

        // Use these data with our Application
        $this->signatureService->sign($name);

        // Return the command result
        return Command::SUCCESS;
    }
}
