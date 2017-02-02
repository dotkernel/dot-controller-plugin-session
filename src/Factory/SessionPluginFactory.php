<?php
/**
 * @copyright: DotKernel
 * @library: dot-controller-plugin-session
 * @author: n3vrax
 * Date: 2/3/2017
 * Time: 12:44 AM
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
