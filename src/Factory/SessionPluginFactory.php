<?php
/**
 * @see https://github.com/dotkernel/dot-controller-plugin-session/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-controller-plugin-session/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Controller\Plugin\Session\Factory;

use Dot\Controller\Plugin\Session\SessionPlugin;
use Interop\Container\ContainerInterface;

/**
 * Class SessionPluginFactory
 * @package Dot\Controller\Plugin\Session\Factory
 */
class SessionPluginFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new SessionPlugin($container);
    }
}
