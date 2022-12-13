<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AboutUsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AboutUsTable Test Case
 */
class AboutUsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AboutUsTable
     */
    public $AboutUs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.about_us'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AboutUs') ? [] : ['className' => AboutUsTable::class];
        $this->AboutUs = TableRegistry::get('AboutUs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AboutUs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
