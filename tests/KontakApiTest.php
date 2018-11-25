<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KontakApiTest extends TestCase
{
    use MakeKontakTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKontak()
    {
        $kontak = $this->fakeKontakData();
        $this->json('POST', '/api/v1/kontaks', $kontak);

        $this->assertApiResponse($kontak);
    }

    /**
     * @test
     */
    public function testReadKontak()
    {
        $kontak = $this->makeKontak();
        $this->json('GET', '/api/v1/kontaks/'.$kontak->id);

        $this->assertApiResponse($kontak->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKontak()
    {
        $kontak = $this->makeKontak();
        $editedKontak = $this->fakeKontakData();

        $this->json('PUT', '/api/v1/kontaks/'.$kontak->id, $editedKontak);

        $this->assertApiResponse($editedKontak);
    }

    /**
     * @test
     */
    public function testDeleteKontak()
    {
        $kontak = $this->makeKontak();
        $this->json('DELETE', '/api/v1/kontaks/'.$kontak->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kontaks/'.$kontak->id);

        $this->assertResponseStatus(404);
    }
}
