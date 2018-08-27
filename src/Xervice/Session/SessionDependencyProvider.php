<?php


namespace Xervice\Session;


use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;
use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;

class SessionDependencyProvider extends AbstractDependencyProvider
{
    public const SESSION_HANDLER = 'session.handler';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container = $this->addSessionHandler($container);

        return $container;
    }

    /**
     * @return \SessionHandlerInterface
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    protected function getSessionHandler(DependencyContainerInterface $container): \SessionHandlerInterface
    {
        return new NativeFileSessionHandler();
    }

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    protected function addSessionHandler(
        DependencyContainerInterface $container
    ): DependencyContainerInterface {
        $container[self::SESSION_HANDLER] = function (DependencyContainerInterface $container) {
            return $this->getSessionHandler($container);
        };
        return $container;
    }

}