<?php

use Faker\Factory as Faker;
use App\Models\Kontak;
use App\Repositories\KontakRepository;

trait MakeKontakTrait
{
    /**
     * Create fake instance of Kontak and save it in database
     *
     * @param array $kontakFields
     * @return Kontak
     */
    public function makeKontak($kontakFields = [])
    {
        /** @var KontakRepository $kontakRepo */
        $kontakRepo = App::make(KontakRepository::class);
        $theme = $this->fakeKontakData($kontakFields);
        return $kontakRepo->create($theme);
    }

    /**
     * Get fake instance of Kontak
     *
     * @param array $kontakFields
     * @return Kontak
     */
    public function fakeKontak($kontakFields = [])
    {
        return new Kontak($this->fakeKontakData($kontakFields));
    }

    /**
     * Get fake data of Kontak
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKontakData($kontakFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nomor' => $fake->word,
            'biodatas_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $kontakFields);
    }
}
