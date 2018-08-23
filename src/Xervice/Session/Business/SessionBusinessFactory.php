<?php
declare(strict_types=1);

namespace Xervice\Session\Business;


use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\Session\SessionDependencyProvider;

class SessionBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Session
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function getSession(): Session
    {
        if ($this->session === null) {
            $this->session = $this->createSession();
        }
        return $this->session;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Session
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function createSession(): Session
    {
        return new Session(
            $this->createSessionStorage()
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    public function createSessionStorage(): SessionStorageInterface
    {
        return new NativeSessionStorage(
            [],
            $this->getSessionHandler()
        );
    }

    /**
     * @return \SessionHandlerInterface
     */
    public function getSessionHandler(): \SessionHandlerInterface
    {
        return $this->getDependency(SessionDependencyProvider::SESSION_HANDLER);
    }
}
