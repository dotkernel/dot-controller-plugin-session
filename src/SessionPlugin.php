<?php
/**
 * @copyright: DotKernel
 * @library: dot-controller-plugin-session
 * @author: n3vrax
 * Date: 2/3/2017
 * Time: 12:30 AM
 */

declare(strict_types = 1);

namespace Dot\Controller\Plugin\Session;

use Dot\Controller\Plugin\PluginInterface;
use Interop\Container\ContainerInterface;
use Zend\Session\Container;
use Zend\Session\ManagerInterface;
use Zend\Session\SessionManager;

/**
 * Class SessionPlugin
 * @package Dot\Controller\Plugin\Session
 */
class SessionPlugin implements PluginInterface
{
    /** @var ContainerInterface * */
    protected $container;

    /** @var  ManagerInterface */
    protected $sessionManager;

    /**
     * SessionPlugin constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $name
     * @return Container
     */
    public function __invoke(string $name): Container
    {
        $fullName = 'dot-session.' . $name;

        $session = null;
        if ($this->container->has($fullName)) {
            $session = $this->container->get($fullName);
        }

        if (!$session instanceof Container) {
            $session = new Container($name, $this->getSessionManager());
        }

        return $session;
    }

    /**
     * @return ManagerInterface
     */
    protected function getSessionManager(): ManagerInterface
    {
        if ($this->sessionManager) {
            return $this->sessionManager;
        }

        if ($this->container->has(ManagerInterface::class)) {
            $this->sessionManager = $this->container->get(ManagerInterface::class);
        }

        if (!$this->sessionManager instanceof ManagerInterface) {
            $this->sessionManager = new SessionManager();
        }

        return $this->sessionManager;
    }
}
