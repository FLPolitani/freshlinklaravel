<?php

use App\Models\PurchaseOrders;
use App\Repositories\PurchaseOrdersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PurchaseOrdersRepositoryTest extends TestCase
{
    use MakePurchaseOrdersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PurchaseOrdersRepository
     */
    protected $purchaseOrdersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->purchaseOrdersRepo = App::make(PurchaseOrdersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePurchaseOrders()
    {
        $purchaseOrders = $this->fakePurchaseOrdersData();
        $createdPurchaseOrders = $this->purchaseOrdersRepo->create($purchaseOrders);
        $createdPurchaseOrders = $createdPurchaseOrders->toArray();
        $this->assertArrayHasKey('id', $createdPurchaseOrders);
        $this->assertNotNull($createdPurchaseOrders['id'], 'Created PurchaseOrders must have id specified');
        $this->assertNotNull(PurchaseOrders::find($createdPurchaseOrders['id']), 'PurchaseOrders with given id must be in DB');
        $this->assertModelData($purchaseOrders, $createdPurchaseOrders);
    }

    /**
     * @test read
     */
    public function testReadPurchaseOrders()
    {
        $purchaseOrders = $this->makePurchaseOrders();
        $dbPurchaseOrders = $this->purchaseOrdersRepo->find($purchaseOrders->id);
        $dbPurchaseOrders = $dbPurchaseOrders->toArray();
        $this->assertModelData($purchaseOrders->toArray(), $dbPurchaseOrders);
    }

    /**
     * @test update
     */
    public function testUpdatePurchaseOrders()
    {
        $purchaseOrders = $this->makePurchaseOrders();
        $fakePurchaseOrders = $this->fakePurchaseOrdersData();
        $updatedPurchaseOrders = $this->purchaseOrdersRepo->update($fakePurchaseOrders, $purchaseOrders->id);
        $this->assertModelData($fakePurchaseOrders, $updatedPurchaseOrders->toArray());
        $dbPurchaseOrders = $this->purchaseOrdersRepo->find($purchaseOrders->id);
        $this->assertModelData($fakePurchaseOrders, $dbPurchaseOrders->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePurchaseOrders()
    {
        $purchaseOrders = $this->makePurchaseOrders();
        $resp = $this->purchaseOrdersRepo->delete($purchaseOrders->id);
        $this->assertTrue($resp);
        $this->assertNull(PurchaseOrders::find($purchaseOrders->id), 'PurchaseOrders should not exist in DB');
    }
}
