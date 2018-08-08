<?php


namespace Xervice\Session;


use Xervice\Core\Client\AbstractClient;

/**
 * @method \Xervice\Session\SessionFactory getFactory()
 * @method string getId()
 * @method bool has($name)
 * @method mixed get($name, $default = null)
 * @method void set($name, $value)
 * @method mixed remove($name)
 * @method void clear()
 */
class SessionClient extends AbstractClient
{
    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function __call($name, $arguments)
    {
        return $this->isSessionMethodExist($name) ? $this->callSessionMethod($name, $arguments) : null;
    }

    /**
     * @param $name
     *
     * @return bool
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    private function isSessionMethodExist($name): bool
    {
        return \method_exists($this->getFactory()->getSession(), $name);
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    private function callSessionMethod($name, $arguments)
    {
        return \call_user_func_array(
            [
                $this->getFactory()->getSession(),
                $name
            ],
            $arguments
        );
    }
}
