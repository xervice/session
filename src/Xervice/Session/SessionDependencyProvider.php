<?php


namespace Xervice\Session;


use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;
use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;

class SessionDependencyProvider extends AbstractProvider
{
    public const SESSION_HANDLER = 'session.handler';

    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::SESSION_HANDLER] = function () {
            return $this->getSessionHandler();
        };
    }

    /**
     * @return \SessionHandlerInterface
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    protected function getSessionHandler(): \SessionHandlerInterface
    {
        return new NativeFileSessionHandler();
    }

}