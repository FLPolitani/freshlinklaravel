<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransPenHasJenPembayaranApiTest extends TestCase
{
    use MakeTransPenHasJenPembayaranTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->fakeTransPenHasJenPembayaranData();
        $this->json('POST', '/api/v1/transPenHasJenPembayarans', $transPenHasJenPembayaran);

        $this->assertApiResponse($transPenHasJenPembayaran);
    }

    /**
     * @test
     */
    public function testReadTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->makeTransPenHasJenPembayaran();
        $this->json('GET', '/api/v1/transPenHasJenPembayarans/'.$transPenHasJenPembayaran->id);

        $this->assertApiResponse($transPenHasJenPembayaran->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->makeTransPenHasJenPembayaran();
        $editedTransPenHasJenPembayaran = $this->fakeTransPenHasJenPembayaranData();

        $this->json('PUT', '/api/v1/transPenHasJenPembayarans/'.$transPenHasJenPembayaran->id, $editedTransPenHasJenPembayaran);

        $this->assertApiResponse($editedTransPenHasJenPembayaran);
    }

    /**
     * @test
     */
    public function testDeleteTransPenHasJenPembayaran()
    {
        $transPenHasJenPembayaran = $this->makeTransPenHasJenPembayaran();
        $this->json('DELETE', '/api/v1/transPenHasJenPembayarans/'.$transPenHasJenPembayaran->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transPenHasJenPembayarans/'.$transPenHasJenPembayaran->id);

        $this->assertResponseStatus(404);
    }
}
