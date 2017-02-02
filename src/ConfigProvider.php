<?php
/**
 * @copyright: DotKernel
 * @library: dot-controller-plugin-session
 * @author: n3vrax
 * Date: 2/3/2017
 * Time: 12:28 AM
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
