<?php

use Faker\Factory as Faker;
use App\Models\Agama;
use App\Repositories\AgamaRepository;

trait MakeAgamaTrait
{
    /**
     * Create fake instance of Agama and save it in database
     *
     * @param array $agamaFields
     * @return Agama
     */
    public function makeAgama($agamaFields = [])
    {
        /** @var AgamaRepository $agamaRepo */
        $agamaRepo = App::make(AgamaRepository::class);
        $theme = $this->fakeAgamaData($agamaFields);
        return $agamaRepo->create($theme);
    }

    /**
     * Get fake instance of Agama
     *
     * @param array $agamaFields
     * @return Agama
     */
    public function fakeAgama($agamaFields = [])
    {
        return new Agama($this->fakeAgamaData($agamaFields));
    }

    /**
     * Get fake data of Agama
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAgamaData($agamaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $agamaFields);
    }
}
