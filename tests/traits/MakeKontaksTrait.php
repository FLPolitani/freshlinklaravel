<?php

use Faker\Factory as Faker;
use App\Models\Kontaks;
use App\Repositories\KontaksRepository;

trait MakeKontaksTrait
{
    /**
     * Create fake instance of Kontaks and save it in database
     *
     * @param array $kontaksFields
     * @return Kontaks
     */
    public function makeKontaks($kontaksFields = [])
    {
        /** @var KontaksRepository $kontaksRepo */
        $kontaksRepo = App::make(KontaksRepository::class);
        $theme = $this->fakeKontaksData($kontaksFields);
        return $kontaksRepo->create($theme);
    }

    /**
     * Get fake instance of Kontaks
     *
     * @param array $kontaksFields
     * @return Kontaks
     */
    public function fakeKontaks($kontaksFields = [])
    {
        return new Kontaks($this->fakeKontaksData($kontaksFields));
    }

    /**
     * Get fake data of Kontaks
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKontaksData($kontaksFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor' => $fake->word,
            'biodatas_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $kontaksFields);
    }
}
