<?php
/**
 * This file is part of OwnPass. (https://github.com/ownpass/)
 *
 * @link https://github.com/ownpass/ownpass for the canonical source repository
 * @copyright Copyright (c) 2016-2017 OwnPass. (https://github.com/ownpass/)
 * @license https://raw.githubusercontent.com/ownpass/ownpass/master/LICENSE MIT
 */

use ZF\Apigility\Admin\Model\ModulePathSpec;

return [
    'zf-apigility-admin' => [
        'path_spec' => ModulePathSpec::PSR_4,
    ],
];
