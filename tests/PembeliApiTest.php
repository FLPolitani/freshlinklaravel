<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PembeliApiTest extends TestCase
{
    use MakePembeliTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePembeli()
    {
        $pembeli = $this->fakePembeliData();
        $this->json('POST', '/api/v1/pembelis', $pembeli);

        $this->assertApiResponse($pembeli);
    }

    /**
     * @test
     */
    public function testReadPembeli()
    {
        $pembeli = $this->makePembeli();
        $this->json('GET', '/api/v1/pembelis/'.$pembeli->id);

        $this->assertApiResponse($pembeli->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePembeli()
    {
        $pembeli = $this->makePembeli();
        $editedPembeli = $this->fakePembeliData();

        $this->json('PUT', '/api/v1/pembelis/'.$pembeli->id, $editedPembeli);

        $this->assertApiResponse($editedPembeli);
    }

    /**
     * @test
     */
    public function testDeletePembeli()
    {
        $pembeli = $this->makePembeli();
        $this->json('DELETE', '/api/v1/pembelis/'.$pembeli->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pembelis/'.$pembeli->id);

        $this->assertResponseStatus(404);
    }
}
