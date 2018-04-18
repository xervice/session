<?php
namespace XerviceTest\Session;

use Xervice\Core\Locator\Dynamic\DynamicLocator;

/**
 * @method \Xervice\Session\SessionFacade getFacade()
 * @method \Xervice\Session\SessionClient getClient()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicLocator;

    /**
     * @var \XerviceTest\XerviceTester
     */
    protected $tester;

    protected function _before()
    {
        $this->getFacade()->initSession();
    }

    /**
     * @group Xervice
     * @group Session
     * @group Integration
     */
    public function testSessionSet()
    {
        $this->getClient()->set('my.test', 'testval');
        $this->assertEquals(
            'testval',
            $this->getClient()->get('my.test', 'default')
        );
    }

    /**
     * @group Xervice
     * @group Session
     * @group Integration
     */
    public function testSessionGet()
    {

    }
}