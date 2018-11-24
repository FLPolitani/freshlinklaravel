<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailPurchaseOrdersApiTest extends TestCase
{
    use MakeDetailPurchaseOrdersTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->fakeDetailPurchaseOrdersData();
        $this->json('POST', '/api/v1/detailPurchaseOrders', $detailPurchaseOrders);

        $this->assertApiResponse($detailPurchaseOrders);
    }

    /**
     * @test
     */
    public function testReadDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->makeDetailPurchaseOrders();
        $this->json('GET', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrders->id);

        $this->assertApiResponse($detailPurchaseOrders->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->makeDetailPurchaseOrders();
        $editedDetailPurchaseOrders = $this->fakeDetailPurchaseOrdersData();

        $this->json('PUT', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrders->id, $editedDetailPurchaseOrders);

        $this->assertApiResponse($editedDetailPurchaseOrders);
    }

    /**
     * @test
     */
    public function testDeleteDetailPurchaseOrders()
    {
        $detailPurchaseOrders = $this->makeDetailPurchaseOrders();
        $this->json('DELETE', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrders->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/detailPurchaseOrders/'.$detailPurchaseOrders->id);

        $this->assertResponseStatus(404);
    }
}
