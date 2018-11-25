<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PurchaseOrdersApiTest extends TestCase
{
    use MakePurchaseOrdersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePurchaseOrders()
    {
        $purchaseOrders = $this->fakePurchaseOrdersData();
        $this->json('POST', '/api/v1/purchaseOrders', $purchaseOrders);

        $this->assertApiResponse($purchaseOrders);
    }

    /**
     * @test
     */
    public function testReadPurchaseOrders()
    {
        $purchaseOrders = $this->makePurchaseOrders();
        $this->json('GET', '/api/v1/purchaseOrders/'.$purchaseOrders->id);

        $this->assertApiResponse($purchaseOrders->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePurchaseOrders()
    {
        $purchaseOrders = $this->makePurchaseOrders();
        $editedPurchaseOrders = $this->fakePurchaseOrdersData();

        $this->json('PUT', '/api/v1/purchaseOrders/'.$purchaseOrders->id, $editedPurchaseOrders);

        $this->assertApiResponse($editedPurchaseOrders);
    }

    /**
     * @test
     */
    public function testDeletePurchaseOrders()
    {
        $purchaseOrders = $this->makePurchaseOrders();
        $this->json('DELETE', '/api/v1/purchaseOrders/'.$purchaseOrders->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/purchaseOrders/'.$purchaseOrders->id);

        $this->assertResponseStatus(404);
    }
}
