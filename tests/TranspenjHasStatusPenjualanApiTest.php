<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranspenjHasStatusPenjualanApiTest extends TestCase
{
    use MakeTranspenjHasStatusPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->fakeTranspenjHasStatusPenjualanData();
        $this->json('POST', '/api/v1/transpenjHasStatusPenjualans', $transpenjHasStatusPenjualan);

        $this->assertApiResponse($transpenjHasStatusPenjualan);
    }

    /**
     * @test
     */
    public function testReadTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->makeTranspenjHasStatusPenjualan();
        $this->json('GET', '/api/v1/transpenjHasStatusPenjualans/'.$transpenjHasStatusPenjualan->id);

        $this->assertApiResponse($transpenjHasStatusPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->makeTranspenjHasStatusPenjualan();
        $editedTranspenjHasStatusPenjualan = $this->fakeTranspenjHasStatusPenjualanData();

        $this->json('PUT', '/api/v1/transpenjHasStatusPenjualans/'.$transpenjHasStatusPenjualan->id, $editedTranspenjHasStatusPenjualan);

        $this->assertApiResponse($editedTranspenjHasStatusPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteTranspenjHasStatusPenjualan()
    {
        $transpenjHasStatusPenjualan = $this->makeTranspenjHasStatusPenjualan();
        $this->json('DELETE', '/api/v1/transpenjHasStatusPenjualans/'.$transpenjHasStatusPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transpenjHasStatusPenjualans/'.$transpenjHasStatusPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
