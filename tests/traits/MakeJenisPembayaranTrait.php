<?php

use Faker\Factory as Faker;
use App\Models\JenisPembayaran;
use App\Repositories\JenisPembayaranRepository;

trait MakeJenisPembayaranTrait
{
    /**
     * Create fake instance of JenisPembayaran and save it in database
     *
     * @param array $jenisPembayaranFields
     * @return JenisPembayaran
     */
    public function makeJenisPembayaran($jenisPembayaranFields = [])
    {
        /** @var JenisPembayaranRepository $jenisPembayaranRepo */
        $jenisPembayaranRepo = App::make(JenisPembayaranRepository::class);
        $theme = $this->fakeJenisPembayaranData($jenisPembayaranFields);
        return $jenisPembayaranRepo->create($theme);
    }

    /**
     * Get fake instance of JenisPembayaran
     *
     * @param array $jenisPembayaranFields
     * @return JenisPembayaran
     */
    public function fakeJenisPembayaran($jenisPembayaranFields = [])
    {
        return new JenisPembayaran($this->fakeJenisPembayaranData($jenisPembayaranFields));
    }

    /**
     * Get fake data of JenisPembayaran
     *
     * @param array $postFields
     * @return array
     */
    public function fakeJenisPembayaranData($jenisPembayaranFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'keterangan' => $fake->word
        ], $jenisPembayaranFields);
    }
}
