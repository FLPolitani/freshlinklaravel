<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StatusPenjualanApiTest extends TestCase
{
    use MakeStatusPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateStatusPenjualan()
    {
        $statusPenjualan = $this->fakeStatusPenjualanData();
        $this->json('POST', '/api/v1/statusPenjualans', $statusPenjualan);

        $this->assertApiResponse($statusPenjualan);
    }

    /**
     * @test
     */
    public function testReadStatusPenjualan()
    {
        $statusPenjualan = $this->makeStatusPenjualan();
        $this->json('GET', '/api/v1/statusPenjualans/'.$statusPenjualan->id);

        $this->assertApiResponse($statusPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateStatusPenjualan()
    {
        $statusPenjualan = $this->makeStatusPenjualan();
        $editedStatusPenjualan = $this->fakeStatusPenjualanData();

        $this->json('PUT', '/api/v1/statusPenjualans/'.$statusPenjualan->id, $editedStatusPenjualan);

        $this->assertApiResponse($editedStatusPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteStatusPenjualan()
    {
        $statusPenjualan = $this->makeStatusPenjualan();
        $this->json('DELETE', '/api/v1/statusPenjualans/'.$statusPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/statusPenjualans/'.$statusPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
