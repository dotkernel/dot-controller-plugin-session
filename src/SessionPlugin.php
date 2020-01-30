<?php
/**
 * @see https://github.com/dotkernel/dot-controller-plugin-session/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-controller-plugin-session/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Controller\Plugin\Session;

use Dot\Controller\Plugin\PluginInterface;
use Psr\Container\ContainerInterface;
use Laminas\Session\Container;
use Laminas\Session\ManagerInterface;
use Laminas\Session\SessionManager;

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
