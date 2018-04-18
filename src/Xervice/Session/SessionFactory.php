<?php


namespace Xervice\Session;


use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler;
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;
use Xervice\Core\Factory\AbstractFactory;

/**
 * @method \Xervice\Session\SessionConfig getConfig()
 */
class SessionFactory extends AbstractFactory
{
    /**
     * @var Session
     */
    private $session;

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Session
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
     */
    public function createSession(): Session
    {
        return new Session(
            $this->createSessionStorage()
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage
     */
    public function createSessionStorage(): SessionStorageInterface
    {
        return new NativeSessionStorage(
            [],
            $this->createSessionHandler()
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler
     */
    public function createSessionHandler()
    {
        return new NativeFileSessionHandler();
    }
}