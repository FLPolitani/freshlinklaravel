<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TranspenjHasJenpembayaranApiTest extends TestCase
{
    use MakeTranspenjHasJenpembayaranTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->fakeTranspenjHasJenpembayaranData();
        $this->json('POST', '/api/v1/transpenjHasJenpembayarans', $transpenjHasJenpembayaran);

        $this->assertApiResponse($transpenjHasJenpembayaran);
    }

    /**
     * @test
     */
    public function testReadTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->makeTranspenjHasJenpembayaran();
        $this->json('GET', '/api/v1/transpenjHasJenpembayarans/'.$transpenjHasJenpembayaran->id);

        $this->assertApiResponse($transpenjHasJenpembayaran->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->makeTranspenjHasJenpembayaran();
        $editedTranspenjHasJenpembayaran = $this->fakeTranspenjHasJenpembayaranData();

        $this->json('PUT', '/api/v1/transpenjHasJenpembayarans/'.$transpenjHasJenpembayaran->id, $editedTranspenjHasJenpembayaran);

        $this->assertApiResponse($editedTranspenjHasJenpembayaran);
    }

    /**
     * @test
     */
    public function testDeleteTranspenjHasJenpembayaran()
    {
        $transpenjHasJenpembayaran = $this->makeTranspenjHasJenpembayaran();
        $this->json('DELETE', '/api/v1/transpenjHasJenpembayarans/'.$transpenjHasJenpembayaran->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transpenjHasJenpembayarans/'.$transpenjHasJenpembayaran->id);

        $this->assertResponseStatus(404);
    }
}
