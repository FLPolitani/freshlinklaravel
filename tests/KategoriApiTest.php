<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KategoriApiTest extends TestCase
{
    use MakeKategoriTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKategori()
    {
        $kategori = $this->fakeKategoriData();
        $this->json('POST', '/api/v1/kategoris', $kategori);

        $this->assertApiResponse($kategori);
    }

    /**
     * @test
     */
    public function testReadKategori()
    {
        $kategori = $this->makeKategori();
        $this->json('GET', '/api/v1/kategoris/'.$kategori->id);

        $this->assertApiResponse($kategori->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKategori()
    {
        $kategori = $this->makeKategori();
        $editedKategori = $this->fakeKategoriData();

        $this->json('PUT', '/api/v1/kategoris/'.$kategori->id, $editedKategori);

        $this->assertApiResponse($editedKategori);
    }

    /**
     * @test
     */
    public function testDeleteKategori()
    {
        $kategori = $this->makeKategori();
        $this->json('DELETE', '/api/v1/kategoris/'.$kategori->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kategoris/'.$kategori->id);

        $this->assertResponseStatus(404);
    }
}
