<?php

use Faker\Factory as Faker;
use App\Models\StatusPenjualan;
use App\Repositories\StatusPenjualanRepository;

trait MakeStatusPenjualanTrait
{
    /**
     * Create fake instance of StatusPenjualan and save it in database
     *
     * @param array $statusPenjualanFields
     * @return StatusPenjualan
     */
    public function makeStatusPenjualan($statusPenjualanFields = [])
    {
        /** @var StatusPenjualanRepository $statusPenjualanRepo */
        $statusPenjualanRepo = App::make(StatusPenjualanRepository::class);
        $theme = $this->fakeStatusPenjualanData($statusPenjualanFields);
        return $statusPenjualanRepo->create($theme);
    }

    /**
     * Get fake instance of StatusPenjualan
     *
     * @param array $statusPenjualanFields
     * @return StatusPenjualan
     */
    public function fakeStatusPenjualan($statusPenjualanFields = [])
    {
        return new StatusPenjualan($this->fakeStatusPenjualanData($statusPenjualanFields));
    }

    /**
     * Get fake data of StatusPenjualan
     *
     * @param array $postFields
     * @return array
     */
    public function fakeStatusPenjualanData($statusPenjualanFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_status' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $statusPenjualanFields);
    }
}
