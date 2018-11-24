<?php

use Faker\Factory as Faker;
use App\Models\Agama--fromTable;
use App\Repositories\Agama--fromTableRepository;

trait MakeAgama--fromTableTrait
{
    /**
     * Create fake instance of Agama--fromTable and save it in database
     *
     * @param array $agamaFromTableFields
     * @return Agama--fromTable
     */
    public function makeAgama--fromTable($agamaFromTableFields = [])
    {
        /** @var Agama--fromTableRepository $agamaFromTableRepo */
        $agamaFromTableRepo = App::make(Agama--fromTableRepository::class);
        $theme = $this->fakeAgama--fromTableData($agamaFromTableFields);
        return $agamaFromTableRepo->create($theme);
    }

    /**
     * Get fake instance of Agama--fromTable
     *
     * @param array $agamaFromTableFields
     * @return Agama--fromTable
     */
    public function fakeAgama--fromTable($agamaFromTableFields = [])
    {
        return new Agama--fromTable($this->fakeAgama--fromTableData($agamaFromTableFields));
    }

    /**
     * Get fake data of Agama--fromTable
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAgama--fromTableData($agamaFromTableFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $agamaFromTableFields);
    }
}
