<?php


namespace Xervice\Session;


use Xervice\Core\Facade\AbstractFacade;
use Xervice\Core\Factory\FactoryInterface;

/**
 * @method \Xervice\Session\SessionFactory getFactory()
 */
class SessionFacade extends AbstractFacade
{
    /**
     * Initialize session
     *
     * @api
     */
    public function initSession()
    {
        $this->getFactory()->getSession()->start();
    }
}