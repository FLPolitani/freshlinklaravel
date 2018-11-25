<?php

use Faker\Factory as Faker;
use App\Models\Produk;
use App\Repositories\ProdukRepository;

trait MakeProdukTrait
{
    /**
     * Create fake instance of Produk and save it in database
     *
     * @param array $produkFields
     * @return Produk
     */
    public function makeProduk($produkFields = [])
    {
        /** @var ProdukRepository $produkRepo */
        $produkRepo = App::make(ProdukRepository::class);
        $theme = $this->fakeProdukData($produkFields);
        return $produkRepo->create($theme);
    }

    /**
     * Get fake instance of Produk
     *
     * @param array $produkFields
     * @return Produk
     */
    public function fakeProduk($produkFields = [])
    {
        return new Produk($this->fakeProdukData($produkFields));
    }

    /**
     * Get fake data of Produk
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProdukData($produkFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'jenis_produk_id' => $fake->randomDigitNotNull,
            'satuan_terkecil_id' => $fake->randomDigitNotNull,
            'kategori_id' => $fake->randomDigitNotNull,
            'keterangan' => $fake->word,
            'harga_petani' => $fake->randomDigitNotNull,
            'harga_jual' => $fake->randomDigitNotNull
        ], $produkFields);
    }
}
