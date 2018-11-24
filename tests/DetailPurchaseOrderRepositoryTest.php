<?php

use App\Models\DetailPurchaseOrder;
use App\Repositories\DetailPurchaseOrderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailPurchaseOrderRepositoryTest extends TestCase
{
    use MakeDetailPurchaseOrderTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailPurchaseOrderRepository
     */
    protected $detailPurchaseOrderRepo;

    public function setUp()
    {
        parent::setUp();
        $this->detailPurchaseOrderRepo = App::make(DetailPurchaseOrderRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->fakeDetailPurchaseOrderData();
        $createdDetailPurchaseOrder = $this->detailPurchaseOrderRepo->create($detailPurchaseOrder);
        $createdDetailPurchaseOrder = $createdDetailPurchaseOrder->toArray();
        $this->assertArrayHasKey('id', $createdDetailPurchaseOrder);
        $this->assertNotNull($createdDetailPurchaseOrder['id'], 'Created DetailPurchaseOrder must have id specified');
        $this->assertNotNull(DetailPurchaseOrder::find($createdDetailPurchaseOrder['id']), 'DetailPurchaseOrder with given id must be in DB');
        $this->assertModelData($detailPurchaseOrder, $createdDetailPurchaseOrder);
    }

    /**
     * @test read
     */
    public function testReadDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->makeDetailPurchaseOrder();
        $dbDetailPurchaseOrder = $this->detailPurchaseOrderRepo->find($detailPurchaseOrder->id);
        $dbDetailPurchaseOrder = $dbDetailPurchaseOrder->toArray();
        $this->assertModelData($detailPurchaseOrder->toArray(), $dbDetailPurchaseOrder);
    }

    /**
     * @test update
     */
    public function testUpdateDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->makeDetailPurchaseOrder();
        $fakeDetailPurchaseOrder = $this->fakeDetailPurchaseOrderData();
        $updatedDetailPurchaseOrder = $this->detailPurchaseOrderRepo->update($fakeDetailPurchaseOrder, $detailPurchaseOrder->id);
        $this->assertModelData($fakeDetailPurchaseOrder, $updatedDetailPurchaseOrder->toArray());
        $dbDetailPurchaseOrder = $this->detailPurchaseOrderRepo->find($detailPurchaseOrder->id);
        $this->assertModelData($fakeDetailPurchaseOrder, $dbDetailPurchaseOrder->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->makeDetailPurchaseOrder();
        $resp = $this->detailPurchaseOrderRepo->delete($detailPurchaseOrder->id);
        $this->assertTrue($resp);
        $this->assertNull(DetailPurchaseOrder::find($detailPurchaseOrder->id), 'DetailPurchaseOrder should not exist in DB');
    }
}
