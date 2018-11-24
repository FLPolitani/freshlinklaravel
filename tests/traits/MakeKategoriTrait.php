<?php

use Faker\Factory as Faker;
use App\Models\Kategori;
use App\Repositories\KategoriRepository;

trait MakeKategoriTrait
{
    /**
     * Create fake instance of Kategori and save it in database
     *
     * @param array $kategoriFields
     * @return Kategori
     */
    public function makeKategori($kategoriFields = [])
    {
        /** @var KategoriRepository $kategoriRepo */
        $kategoriRepo = App::make(KategoriRepository::class);
        $theme = $this->fakeKategoriData($kategoriFields);
        return $kategoriRepo->create($theme);
    }

    /**
     * Get fake instance of Kategori
     *
     * @param array $kategoriFields
     * @return Kategori
     */
    public function fakeKategori($kategoriFields = [])
    {
        return new Kategori($this->fakeKategoriData($kategoriFields));
    }

    /**
     * Get fake data of Kategori
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKategoriData($kategoriFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'parent_kategori_id' => $fake->randomDigitNotNull
        ], $kategoriFields);
    }
}
