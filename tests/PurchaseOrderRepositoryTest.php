<?php

use App\Models\PurchaseOrder;
use App\Repositories\PurchaseOrderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PurchaseOrderRepositoryTest extends TestCase
{
    use MakePurchaseOrderTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PurchaseOrderRepository
     */
    protected $purchaseOrderRepo;

    public function setUp()
    {
        parent::setUp();
        $this->purchaseOrderRepo = App::make(PurchaseOrderRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePurchaseOrder()
    {
        $purchaseOrder = $this->fakePurchaseOrderData();
        $createdPurchaseOrder = $this->purchaseOrderRepo->create($purchaseOrder);
        $createdPurchaseOrder = $createdPurchaseOrder->toArray();
        $this->assertArrayHasKey('id', $createdPurchaseOrder);
        $this->assertNotNull($createdPurchaseOrder['id'], 'Created PurchaseOrder must have id specified');
        $this->assertNotNull(PurchaseOrder::find($createdPurchaseOrder['id']), 'PurchaseOrder with given id must be in DB');
        $this->assertModelData($purchaseOrder, $createdPurchaseOrder);
    }

    /**
     * @test read
     */
    public function testReadPurchaseOrder()
    {
        $purchaseOrder = $this->makePurchaseOrder();
        $dbPurchaseOrder = $this->purchaseOrderRepo->find($purchaseOrder->id);
        $dbPurchaseOrder = $dbPurchaseOrder->toArray();
        $this->assertModelData($purchaseOrder->toArray(), $dbPurchaseOrder);
    }

    /**
     * @test update
     */
    public function testUpdatePurchaseOrder()
    {
        $purchaseOrder = $this->makePurchaseOrder();
        $fakePurchaseOrder = $this->fakePurchaseOrderData();
        $updatedPurchaseOrder = $this->purchaseOrderRepo->update($fakePurchaseOrder, $purchaseOrder->id);
        $this->assertModelData($fakePurchaseOrder, $updatedPurchaseOrder->toArray());
        $dbPurchaseOrder = $this->purchaseOrderRepo->find($purchaseOrder->id);
        $this->assertModelData($fakePurchaseOrder, $dbPurchaseOrder->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePurchaseOrder()
    {
        $purchaseOrder = $this->makePurchaseOrder();
        $resp = $this->purchaseOrderRepo->delete($purchaseOrder->id);
        $this->assertTrue($resp);
        $this->assertNull(PurchaseOrder::find($purchaseOrder->id), 'PurchaseOrder should not exist in DB');
    }
}
