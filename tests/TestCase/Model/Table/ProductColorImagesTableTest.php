<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductColorImagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductColorImagesTable Test Case
 */
class ProductColorImagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductColorImagesTable
     */
    public $ProductColorImages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_color_images',
        'app.project_details',
        'app.projects',
        'app.galleries',
        'app.products',
        'app.materials',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductColorImages') ? [] : ['className' => ProductColorImagesTable::class];
        $this->ProductColorImages = TableRegistry::get('ProductColorImages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductColorImages);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
