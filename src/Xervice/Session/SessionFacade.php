<?php


namespace Xervice\Session;


use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Xervice\Session\SessionFactory getFactory()
 */
class SessionFacade extends AbstractFacade
{
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
}
