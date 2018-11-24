<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailPurchaseOrderApiTest extends TestCase
{
    use MakeDetailPurchaseOrderTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->fakeDetailPurchaseOrderData();
        $this->json('POST', '/api/v1/detailPurchaseOrders', $detailPurchaseOrder);

        $this->assertApiResponse($detailPurchaseOrder);
    }

    /**
     * @test
     */
    public function testReadDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->makeDetailPurchaseOrder();
        $this->json('GET', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrder->id);

        $this->assertApiResponse($detailPurchaseOrder->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->makeDetailPurchaseOrder();
        $editedDetailPurchaseOrder = $this->fakeDetailPurchaseOrderData();

        $this->json('PUT', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrder->id, $editedDetailPurchaseOrder);

        $this->assertApiResponse($editedDetailPurchaseOrder);
    }

    /**
     * @test
     */
    public function testDeleteDetailPurchaseOrder()
    {
        $detailPurchaseOrder = $this->makeDetailPurchaseOrder();
        $this->json('DELETE', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrder->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrder->id);

        $this->assertResponseStatus(404);
    }
}
