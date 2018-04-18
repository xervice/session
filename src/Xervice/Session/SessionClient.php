<?php


namespace Xervice\Session;


use Xervice\Core\Client\AbstractClient;

/**
 * @method \Xervice\Session\SessionFactory getFactory()
 * @method \Xervice\Session\SessionConfig getConfig()
 */
class SessionClient extends AbstractClient
{
    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        if (\method_exists($this->getFactory()->getSession(), $name)) {
            return \call_user_func_array([$this->getFactory()->getSession(), $name], $arguments);
        }
    }

}