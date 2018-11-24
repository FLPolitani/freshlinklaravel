<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransPenHasStatusPenjualanApiTest extends TestCase
{
    use MakeTransPenHasStatusPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->fakeTransPenHasStatusPenjualanData();
        $this->json('POST', '/api/v1/transPenHasStatusPenjualans', $transPenHasStatusPenjualan);

        $this->assertApiResponse($transPenHasStatusPenjualan);
    }

    /**
     * @test
     */
    public function testReadTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->makeTransPenHasStatusPenjualan();
        $this->json('GET', '/api/v1/transPenHasStatusPenjualans/'.$transPenHasStatusPenjualan->id);

        $this->assertApiResponse($transPenHasStatusPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->makeTransPenHasStatusPenjualan();
        $editedTransPenHasStatusPenjualan = $this->fakeTransPenHasStatusPenjualanData();

        $this->json('PUT', '/api/v1/transPenHasStatusPenjualans/'.$transPenHasStatusPenjualan->id, $editedTransPenHasStatusPenjualan);

        $this->assertApiResponse($editedTransPenHasStatusPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteTransPenHasStatusPenjualan()
    {
        $transPenHasStatusPenjualan = $this->makeTransPenHasStatusPenjualan();
        $this->json('DELETE', '/api/v1/transPenHasStatusPenjualans/'.$transPenHasStatusPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transPenHasStatusPenjualans/'.$transPenHasStatusPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
