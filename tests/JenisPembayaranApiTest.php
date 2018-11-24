<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JenisPembayaranApiTest extends TestCase
{
    use MakeJenisPembayaranTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateJenisPembayaran()
    {
        $jenisPembayaran = $this->fakeJenisPembayaranData();
        $this->json('POST', '/api/v1/jenisPembayarans', $jenisPembayaran);

        $this->assertApiResponse($jenisPembayaran);
    }

    /**
     * @test
     */
    public function testReadJenisPembayaran()
    {
        $jenisPembayaran = $this->makeJenisPembayaran();
        $this->json('GET', '/api/v1/jenisPembayarans/'.$jenisPembayaran->id);

        $this->assertApiResponse($jenisPembayaran->toArray());
    }

    /**
     * @test
     */
    public function testUpdateJenisPembayaran()
    {
        $jenisPembayaran = $this->makeJenisPembayaran();
        $editedJenisPembayaran = $this->fakeJenisPembayaranData();

        $this->json('PUT', '/api/v1/jenisPembayarans/'.$jenisPembayaran->id, $editedJenisPembayaran);

        $this->assertApiResponse($editedJenisPembayaran);
    }

    /**
     * @test
     */
    public function testDeleteJenisPembayaran()
    {
        $jenisPembayaran = $this->makeJenisPembayaran();
        $this->json('DELETE', '/api/v1/jenisPembayarans/'.$jenisPembayaran->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/jenisPembayarans/'.$jenisPembayaran->id);

        $this->assertResponseStatus(404);
    }
}
