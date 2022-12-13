<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CmsPagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CmsPagesTable Test Case
 */
class CmsPagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CmsPagesTable
     */
    public $CmsPages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cms_pages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CmsPages') ? [] : ['className' => CmsPagesTable::class];
        $this->CmsPages = TableRegistry::get('CmsPages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CmsPages);

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
