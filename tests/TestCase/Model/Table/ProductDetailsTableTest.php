<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductDetailsTable Test Case
 */
class ProductDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductDetailsTable
     */
    public $ProductDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductDetails') ? [] : ['className' => ProductDetailsTable::class];
        $this->ProductDetails = TableRegistry::get('ProductDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductDetails);

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
     * Test uploadImage method
     *
     * @return void
     */
    public function testUploadImage()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
