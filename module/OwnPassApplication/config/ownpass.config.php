<?php
/**
 * This file is part of OwnPass. (https://github.com/ownpass/)
 *
 * @link https://github.com/ownpass/ownpass for the canonical source repository
 * @copyright Copyright (c) 2016-2017 OwnPass. (https://github.com/ownpass/)
 * @license https://raw.githubusercontent.com/ownpass/ownpass/master/LICENSE MIT
 */

namespace OwnPassApplication;

use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Zend\Validator\Uuid;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\Api::class => InvokableFactory::class,
            Controller\Index::class => InvokableFactory::class,
            Controller\Installer::class => Controller\Service\InstallerFactory::class,
            Controller\KeyManagerCli::class => Controller\Service\KeyManagerCliFactory::class,
        ],
    ],
    'console' => [
        'router' => [
            'routes' => [
                'generate-keys' => [
                    'options' => [
                        'route' => 'ownpass:generate-keys',
                        'defaults' => [
                            'controller' => Controller\KeyManagerCli::class,
                            'action' => 'generate',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'doctrine' => [
        'driver' => [
            __NAMESPACE__ => [
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/doctrine',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    __NAMESPACE__ => __NAMESPACE__
                ],
            ],
        ],
        'eventmanager' => [
            'orm_default' => [
                'subscribers' => [
                    'Gedmo\\Timestampable\\TimestampableListener',
                ],
            ],
        ],
    ],
    'ownpass_email' => [
        'from_address' => 'no-reply@ownpass.io',
        'from_name' => 'OwnPass',
        'transport' => [
            'type' => 'smtp',
            'options' => [
                'host' => '',
                'port' => 587,
                'username' => '',
                'password' => '',
            ],
        ],
    ],
    'ownpass_notifications' => [
        'device.created' => [
            'email' => [
                'template' => 'notifications/device-created',
                'subject' => 'email_device_created_subject',
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'api' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/api',
                    'defaults' => [
                        'controller' => Controller\Api::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\Index::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            TaskService\KeyManager::class => TaskService\Service\KeyManagerFactory::class,
            TaskService\Notification::class => TaskService\Service\NotificationFactory::class,
        ],
        'invokables' => [
            'UnderscoreNamingStrategy' => UnderscoreNamingStrategy::class,
        ],
    ],
    'validators' => [
        'invokables' => [
            Uuid::class => Uuid::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
