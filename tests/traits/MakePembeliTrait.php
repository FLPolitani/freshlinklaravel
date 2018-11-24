<?php

use Faker\Factory as Faker;
use App\Models\Pembeli;
use App\Repositories\PembeliRepository;

trait MakePembeliTrait
{
    /**
     * Create fake instance of Pembeli and save it in database
     *
     * @param array $pembeliFields
     * @return Pembeli
     */
    public function makePembeli($pembeliFields = [])
    {
        /** @var PembeliRepository $pembeliRepo */
        $pembeliRepo = App::make(PembeliRepository::class);
        $theme = $this->fakePembeliData($pembeliFields);
        return $pembeliRepo->create($theme);
    }

    /**
     * Get fake instance of Pembeli
     *
     * @param array $pembeliFields
     * @return Pembeli
     */
    public function fakePembeli($pembeliFields = [])
    {
        return new Pembeli($this->fakePembeliData($pembeliFields));
    }

    /**
     * Get fake data of Pembeli
     *
     * @param array $postFields
     * @return array
     */
    public function fakePembeliData($pembeliFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'users_id' => $fake->randomDigitNotNull
        ], $pembeliFields);
    }
}
