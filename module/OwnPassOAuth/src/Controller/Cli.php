<?php
/**
 * This file is part of OwnPass. (https://github.com/ownpass/)
 *
 * @link https://github.com/ownpass/ownpass for the canonical source repository
 * @copyright Copyright (c) 2016-2017 OwnPass. (https://github.com/ownpass/)
 * @license https://raw.githubusercontent.com/ownpass/ownpass/master/LICENSE MIT
 */

namespace OwnPassOAuth\Controller;

use Doctrine\ORM\EntityManagerInterface;
use OwnPassOAuth\Entity\Application;
use Zend\Console\Prompt\Confirm;
use Zend\Console\Prompt\Line;
use Zend\Mvc\Console\Controller\AbstractConsoleController;

class Cli extends AbstractConsoleController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createAction()
    {
        $correct = false;
        $force = $this->params()->fromRoute('force', false);

        while (!$correct) {
            $name = $this->params()->fromRoute('name');
            if (!$name) {
                $name = Line::prompt('Application name: ');
            }

            $clientId = $this->params()->fromRoute('client');
            if (!$clientId) {
                $clientId = Line::prompt('Client id: ');
            }

            $clientSecret = $this->params()->fromRoute('secret');
            if ($clientSecret === null && !$force) {
                $clientSecret = Line::prompt('Client secret (leave empty for public client): ', true);
            }

            $correct = $force;
            if (!$correct) {
                $this->getConsole()->writeLine('');
                $this->getConsole()->writeLine('Reviewing information:');
                $this->getConsole()->writeLine('');
                $this->getConsole()->writeLine('Name: ' . $name);
                $this->getConsole()->writeLine('Client ID: ' . $clientId);
                $this->getConsole()->writeLine('Client secret: ' . $clientSecret);
                $this->getConsole()->writeLine('');

                $correct = Confirm::prompt('Is this information correct? (y/n) ');
            }
        }

        $application = new Application($clientId, $name);

        if ($clientSecret) {
            $application->setClientSecret($clientSecret);
        }

        $this->entityManager->persist($application);
        $this->entityManager->flush($application);
    }
}
