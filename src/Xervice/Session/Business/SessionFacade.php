<?php
declare(strict_types=1);

namespace Xervice\Session\Business;

use Xervice\Core\Business\Model\Facade\AbstractFacade;


/**
 * @method \Xervice\Session\Business\SessionBusinessFactory getFactory()
 * @method string getId()
 * @method bool has($name)
 * @method mixed get($name, $default = null)
 * @method void set($name, $value)
 * @method mixed remove($name)
 * @method void clear()
 */
class SessionFacade extends AbstractFacade
{
    /**
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function __call(string $name, array $arguments)
    {
        return $this->isSessionMethodExist($name) ? $this->callSessionMethod($name, $arguments) : null;
    }

    /**
     * Initialize session
     *
     * @api
     * @throws \InvalidArgumentException
     * @throws \RuntimeException
     */
    public function initSession(): void
    {
        $this->getFactory()->getSession()->start();
    }

    /**
     * @param string $name
     *
     * @return bool
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    private function isSessionMethodExist(string $name): bool
    {
        return \method_exists($this->getFactory()->getSession(), $name);
    }

    /**
     * @param string $name
     * @param array $arguments
     *
     * @return mixed
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     */
    private function callSessionMethod(string $name, array $arguments)
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
