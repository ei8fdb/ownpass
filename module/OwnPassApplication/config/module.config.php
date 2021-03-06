<?php
return [
    'service_manager' => [
        'factories' => [
            \OwnPassApplication\V1\Rest\Device\DeviceResource::class => \OwnPassApplication\V1\Rest\Device\DeviceResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'own-pass-application.rest.device' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/device[/:device_id]',
                    'defaults' => [
                        'controller' => 'OwnPassApplication\\V1\\Rest\\Device\\Controller',
                    ],
                ],
            ],
            'own-pass-application.rpc.device-activate' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/device/activate',
                    'defaults' => [
                        'controller' => 'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller',
                        'action' => 'deviceActivate',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'own-pass-application.rest.device',
            1 => 'own-pass-application.rpc.device-activate',
        ],
    ],
    'zf-rest' => [
        'OwnPassApplication\\V1\\Rest\\Device\\Controller' => [
            'listener' => \OwnPassApplication\V1\Rest\Device\DeviceResource::class,
            'route_name' => 'own-pass-application.rest.device',
            'route_identifier_name' => 'device_id',
            'collection_name' => 'device',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \OwnPassApplication\V1\Rest\Device\DeviceEntity::class,
            'collection_class' => \OwnPassApplication\V1\Rest\Device\DeviceCollection::class,
            'service_name' => 'Device',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'OwnPassApplication\\V1\\Rest\\Device\\Controller' => 'HalJson',
            'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'OwnPassApplication\\V1\\Rest\\Device\\Controller' => [
                0 => 'application/vnd.own-pass-application.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => [
                0 => 'application/vnd.own-pass-application.v1+json',
                1 => 'application/json',
                2 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'OwnPassApplication\\V1\\Rest\\Device\\Controller' => [
                0 => 'application/vnd.own-pass-application.v1+json',
                1 => 'application/json',
            ],
            'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => [
                0 => 'application/vnd.own-pass-application.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \OwnPassApplication\V1\Rest\Device\DeviceEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'own-pass-application.rest.device',
                'route_identifier_name' => 'device_id',
                'hydrator' => \Zend\Hydrator\ObjectProperty::class,
            ],
            \OwnPassApplication\V1\Rest\Device\DeviceCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'own-pass-application.rest.device',
                'route_identifier_name' => 'device_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'OwnPassApplication\\V1\\Rest\\Device\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => false,
                    'DELETE' => true,
                ],
            ],
            'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => [
                'actions' => [
                    'DeviceActivate' => [
                        'GET' => false,
                        'POST' => true,
                        'PUT' => false,
                        'PATCH' => false,
                        'DELETE' => false,
                    ],
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'OwnPassApplication\\V1\\Rest\\Device\\Controller' => [
            'input_filter' => 'OwnPassApplication\\V1\\Rest\\Device\\Validator',
        ],
        'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => [
            'input_filter' => 'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'OwnPassApplication\\V1\\Rest\\Device\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
                'description' => 'The name of the client.',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'description',
                'description' => 'The description of the client.',
            ],
        ],
        'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'code',
                'description' => 'The activation code',
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => \OwnPassApplication\V1\Rpc\DeviceActivate\DeviceActivateControllerFactory::class,
        ],
    ],
    'zf-rpc' => [
        'OwnPassApplication\\V1\\Rpc\\DeviceActivate\\Controller' => [
            'service_name' => 'DeviceActivate',
            'http_methods' => [
                0 => 'POST',
            ],
            'route_name' => 'own-pass-application.rpc.device-activate',
        ],
    ],
];
