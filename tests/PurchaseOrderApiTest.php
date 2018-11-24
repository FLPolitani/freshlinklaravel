<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PurchaseOrderApiTest extends TestCase
{
    use MakePurchaseOrderTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePurchaseOrder()
    {
        $purchaseOrder = $this->fakePurchaseOrderData();
        $this->json('POST', '/api/v1/purchaseOrders', $purchaseOrder);

        $this->assertApiResponse($purchaseOrder);
    }

    /**
     * @test
     */
    public function testReadPurchaseOrder()
    {
        $purchaseOrder = $this->makePurchaseOrder();
        $this->json('GET', '/api/v1/purchaseOrders/'.$purchaseOrder->id);

        $this->assertApiResponse($purchaseOrder->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePurchaseOrder()
    {
        $purchaseOrder = $this->makePurchaseOrder();
        $editedPurchaseOrder = $this->fakePurchaseOrderData();

        $this->json('PUT', '/api/v1/purchaseOrders/'.$purchaseOrder->id, $editedPurchaseOrder);

        $this->assertApiResponse($editedPurchaseOrder);
    }

    /**
     * @test
     */
    public function testDeletePurchaseOrder()
    {
        $purchaseOrder = $this->makePurchaseOrder();
        $this->json('DELETE', '/api/v1/purchaseOrders/'.$purchaseOrder->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/purchaseOrders/'.$purchaseOrder->id);

        $this->assertResponseStatus(404);
    }
}
