<?php
/**
 * @see https://github.com/dotkernel/dot-controller-plugin-session/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-controller-plugin-session/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Controller\Plugin\Session;

use Dot\Controller\Plugin\Session\Factory\SessionPluginFactory;

/**
 * Class ConfigProvider
 * @package Dot\Controller\Plugin\Session
 */
class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'dot_controller' => [
                'plugin_manager' => [
                    'factories' => [
                        'session' => SessionPluginFactory::class,
                    ]
                ]
            ]
        ];
    }
}
