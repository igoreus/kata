<?php

namespace Kata\AppBundle\Command;

use Kata\Encryption\Encryption;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Igor Veremchuk igor.veremchuk@rocket-internet.de
 */
class EncryptionCommand extends Command
{
    const DEFAULT_STRING = 'if man was meant to stay on the ground god would have given us roots';

    protected function configure()
    {
        $this->setName('encryption');
        $this->addArgument('str', InputArgument::OPTIONAL, 'The string to be encrypted.', self::DEFAULT_STRING);

    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Encryption:');
        $output->writeln(sprintf('Original string: "%s"', $input->getArgument('str')));

        $encryption = new Encryption();
        $output->writeln(sprintf('Encrypted string: "%s"', $encryption->encrypt($input->getArgument('str'))));
    }
}