<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Agama--fromTableApiTest extends TestCase
{
    use MakeAgama--fromTableTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAgama--fromTable()
    {
        $agamaFromTable = $this->fakeAgama--fromTableData();
        $this->json('POST', '/api/v1/agamaFromTables', $agamaFromTable);

        $this->assertApiResponse($agamaFromTable);
    }

    /**
     * @test
     */
    public function testReadAgama--fromTable()
    {
        $agamaFromTable = $this->makeAgama--fromTable();
        $this->json('GET', '/api/v1/agamaFromTables/'.$agamaFromTable->id);

        $this->assertApiResponse($agamaFromTable->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAgama--fromTable()
    {
        $agamaFromTable = $this->makeAgama--fromTable();
        $editedAgama--fromTable = $this->fakeAgama--fromTableData();

        $this->json('PUT', '/api/v1/agamaFromTables/'.$agamaFromTable->id, $editedAgama--fromTable);

        $this->assertApiResponse($editedAgama--fromTable);
    }

    /**
     * @test
     */
    public function testDeleteAgama--fromTable()
    {
        $agamaFromTable = $this->makeAgama--fromTable();
        $this->json('DELETE', '/api/v1/agamaFromTables/'.$agamaFromTable->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/agamaFromTables/'.$agamaFromTable->id);

        $this->assertResponseStatus(404);
    }
}
