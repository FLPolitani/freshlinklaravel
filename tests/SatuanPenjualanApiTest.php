<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SatuanPenjualanApiTest extends TestCase
{
    use MakeSatuanPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSatuanPenjualan()
    {
        $satuanPenjualan = $this->fakeSatuanPenjualanData();
        $this->json('POST', '/api/v1/satuanPenjualans', $satuanPenjualan);

        $this->assertApiResponse($satuanPenjualan);
    }

    /**
     * @test
     */
    public function testReadSatuanPenjualan()
    {
        $satuanPenjualan = $this->makeSatuanPenjualan();
        $this->json('GET', '/api/v1/satuanPenjualans/'.$satuanPenjualan->id);

        $this->assertApiResponse($satuanPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSatuanPenjualan()
    {
        $satuanPenjualan = $this->makeSatuanPenjualan();
        $editedSatuanPenjualan = $this->fakeSatuanPenjualanData();

        $this->json('PUT', '/api/v1/satuanPenjualans/'.$satuanPenjualan->id, $editedSatuanPenjualan);

        $this->assertApiResponse($editedSatuanPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteSatuanPenjualan()
    {
        $satuanPenjualan = $this->makeSatuanPenjualan();
        $this->json('DELETE', '/api/v1/satuanPenjualans/'.$satuanPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/satuanPenjualans/'.$satuanPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
