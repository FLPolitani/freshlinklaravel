<?php

use App\Models\DetailPurchaseOrders;
use App\Repositories\DetailPurchaseOrdersRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailPurchaseOrdersRepositoryTest extends TestCase
{
    use MakeDetailPurchaseOrdersTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DetailPurchaseOrdersRepository
     */
    protected $detailPurchaseOrdersRepo;

    public function setUp()
    {
        parent::setUp();
        $this->detailPurchaseOrdersRepo = App::make(DetailPurchaseOrdersRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->fakeDetailPurchaseOrdersData();
        $createdDetailPurchaseOrders = $this->detailPurchaseOrdersRepo->create($detailPurchaseOrders);
        $createdDetailPurchaseOrders = $createdDetailPurchaseOrders->toArray();
        $this->assertArrayHasKey('id', $createdDetailPurchaseOrders);
        $this->assertNotNull($createdDetailPurchaseOrders['id'], 'Created DetailPurchaseOrders must have id specified');
        $this->assertNotNull(DetailPurchaseOrders::find($createdDetailPurchaseOrders['id']), 'DetailPurchaseOrders with given id must be in DB');
        $this->assertModelData($detailPurchaseOrders, $createdDetailPurchaseOrders);
    }

    /**
     * @test read
     */
    public function testReadDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->makeDetailPurchaseOrders();
        $dbDetailPurchaseOrders = $this->detailPurchaseOrdersRepo->find($detailPurchaseOrders->id);
        $dbDetailPurchaseOrders = $dbDetailPurchaseOrders->toArray();
        $this->assertModelData($detailPurchaseOrders->toArray(), $dbDetailPurchaseOrders);
    }

    /**
     * @test update
     */
    public function testUpdateDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->makeDetailPurchaseOrders();
        $fakeDetailPurchaseOrders = $this->fakeDetailPurchaseOrdersData();
        $updatedDetailPurchaseOrders = $this->detailPurchaseOrdersRepo->update($fakeDetailPurchaseOrders, $detailPurchaseOrders->id);
        $this->assertModelData($fakeDetailPurchaseOrders, $updatedDetailPurchaseOrders->toArray());
        $dbDetailPurchaseOrders = $this->detailPurchaseOrdersRepo->find($detailPurchaseOrders->id);
        $this->assertModelData($fakeDetailPurchaseOrders, $dbDetailPurchaseOrders->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->makeDetailPurchaseOrders();
        $resp = $this->detailPurchaseOrdersRepo->delete($detailPurchaseOrders->id);
        $this->assertTrue($resp);
        $this->assertNull(DetailPurchaseOrders::find($detailPurchaseOrders->id), 'DetailPurchaseOrders should not exist in DB');
    }
}
