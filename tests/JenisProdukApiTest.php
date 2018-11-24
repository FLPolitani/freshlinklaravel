<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisProdukApiTest extends TestCase
{
    use MakeJenisProdukTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJenisProduk()
    {
        $jenisProduk = $this->fakeJenisProdukData();
        $this->json('POST', '/api/v1/jenisProduks', $jenisProduk);

        $this->assertApiResponse($jenisProduk);
    }

    /**
     * @test
     */
    public function testReadJenisProduk()
    {
        $jenisProduk = $this->makeJenisProduk();
        $this->json('GET', '/api/v1/jenisProduks/'.$jenisProduk->id);

        $this->assertApiResponse($jenisProduk->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJenisProduk()
    {
        $jenisProduk = $this->makeJenisProduk();
        $editedJenisProduk = $this->fakeJenisProdukData();

        $this->json('PUT', '/api/v1/jenisProduks/'.$jenisProduk->id, $editedJenisProduk);

        $this->assertApiResponse($editedJenisProduk);
    }

    /**
     * @test
     */
    public function testDeleteJenisProduk()
    {
        $jenisProduk = $this->makeJenisProduk();
        $this->json('DELETE', '/api/v1/jenisProduks/'.$jenisProduk->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jenisProduks/'.$jenisProduk->id);

        $this->assertResponseStatus(404);
    }
}
