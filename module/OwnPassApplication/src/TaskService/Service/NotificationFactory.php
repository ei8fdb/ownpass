<?php
/**
 * This file is part of OwnPass. (https://github.com/ownpass/)
 *
 * @link https://github.com/ownpass/ownpass for the canonical source repository
 * @copyright Copyright (c) 2016-2017 OwnPass. (https://github.com/ownpass/)
 * @license https://raw.githubusercontent.com/ownpass/ownpass/master/LICENSE MIT
 */

namespace OwnPassApplication\TaskService\Service;

use Interop\Container\ContainerInterface;
use OwnPassApplication\TaskService\KeyManager;
use OwnPassApplication\TaskService\Notification;
use Zend\I18n\Translator\TranslatorInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class NotificationFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('config');
        $renderer = $container->get('ViewRenderer');
        $translator = $container->get(TranslatorInterface::class);

        return new Notification($config, $renderer, $translator);
    }
}
