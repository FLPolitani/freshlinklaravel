<?php

use Faker\Factory as Faker;
use App\Models\JenisProduk;
use App\Repositories\JenisProdukRepository;

trait MakeJenisProdukTrait
{
    /**
     * Create fake instance of JenisProduk and save it in database
     *
     * @param array $jenisProdukFields
     * @return JenisProduk
     */
    public function makeJenisProduk($jenisProdukFields = [])
    {
        /** @var JenisProdukRepository $jenisProdukRepo */
        $jenisProdukRepo = App::make(JenisProdukRepository::class);
        $theme = $this->fakeJenisProdukData($jenisProdukFields);
        return $jenisProdukRepo->create($theme);
    }

    /**
     * Get fake instance of JenisProduk
     *
     * @param array $jenisProdukFields
     * @return JenisProduk
     */
    public function fakeJenisProduk($jenisProdukFields = [])
    {
        return new JenisProduk($this->fakeJenisProdukData($jenisProdukFields));
    }

    /**
     * Get fake data of JenisProduk
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJenisProdukData($jenisProdukFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_jenis_produk' => $fake->word,
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $jenisProdukFields);
    }
}
