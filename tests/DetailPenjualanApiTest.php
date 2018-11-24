<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DetailPenjualanApiTest extends TestCase
{
    use MakeDetailPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDetailPenjualan()
    {
        $detailPenjualan = $this->fakeDetailPenjualanData();
        $this->json('POST', '/api/v1/detailPenjualans', $detailPenjualan);

        $this->assertApiResponse($detailPenjualan);
    }

    /**
     * @test
     */
    public function testReadDetailPenjualan()
    {
        $detailPenjualan = $this->makeDetailPenjualan();
        $this->json('GET', '/api/v1/detailPenjualans/'.$detailPenjualan->id);

        $this->assertApiResponse($detailPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDetailPenjualan()
    {
        $detailPenjualan = $this->makeDetailPenjualan();
        $editedDetailPenjualan = $this->fakeDetailPenjualanData();

        $this->json('PUT', '/api/v1/detailPenjualans/'.$detailPenjualan->id, $editedDetailPenjualan);

        $this->assertApiResponse($editedDetailPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteDetailPenjualan()
    {
        $detailPenjualan = $this->makeDetailPenjualan();
        $this->json('DELETE', '/api/v1/detailPenjualans/'.$detailPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/detailPenjualans/'.$detailPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
