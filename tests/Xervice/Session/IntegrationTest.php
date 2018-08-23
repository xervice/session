<?php
namespace XerviceTest\Session;

use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;

/**
 * @method \Xervice\Session\Business\SessionFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

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
        $this->getFacade()->set('my.test', 'testval');
        $this->assertEquals(
            'testval',
            $this->getFacade()->get('my.test', 'default')
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