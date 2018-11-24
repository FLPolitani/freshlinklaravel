<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransaksiPenjualanApiTest extends TestCase
{
    use MakeTransaksiPenjualanTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->fakeTransaksiPenjualanData();
        $this->json('POST', '/api/v1/transaksiPenjualans', $transaksiPenjualan);

        $this->assertApiResponse($transaksiPenjualan);
    }

    /**
     * @test
     */
    public function testReadTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->makeTransaksiPenjualan();
        $this->json('GET', '/api/v1/transaksiPenjualans/'.$transaksiPenjualan->id);

        $this->assertApiResponse($transaksiPenjualan->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->makeTransaksiPenjualan();
        $editedTransaksiPenjualan = $this->fakeTransaksiPenjualanData();

        $this->json('PUT', '/api/v1/transaksiPenjualans/'.$transaksiPenjualan->id, $editedTransaksiPenjualan);

        $this->assertApiResponse($editedTransaksiPenjualan);
    }

    /**
     * @test
     */
    public function testDeleteTransaksiPenjualan()
    {
        $transaksiPenjualan = $this->makeTransaksiPenjualan();
        $this->json('DELETE', '/api/v1/transaksiPenjualans/'.$transaksiPenjualan->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transaksiPenjualans/'.$transaksiPenjualan->id);

        $this->assertResponseStatus(404);
    }
}
