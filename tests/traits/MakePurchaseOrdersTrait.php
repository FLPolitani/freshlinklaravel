<?php

use Faker\Factory as Faker;
use App\Models\PurchaseOrders;
use App\Repositories\PurchaseOrdersRepository;

trait MakePurchaseOrdersTrait
{
    /**
     * Create fake instance of PurchaseOrders and save it in database
     *
     * @param array $purchaseOrdersFields
     * @return PurchaseOrders
     */
    public function makePurchaseOrders($purchaseOrdersFields = [])
    {
        /** @var PurchaseOrdersRepository $purchaseOrdersRepo */
        $purchaseOrdersRepo = App::make(PurchaseOrdersRepository::class);
        $theme = $this->fakePurchaseOrdersData($purchaseOrdersFields);
        return $purchaseOrdersRepo->create($theme);
    }

    /**
     * Get fake instance of PurchaseOrders
     *
     * @param array $purchaseOrdersFields
     * @return PurchaseOrders
     */
    public function fakePurchaseOrders($purchaseOrdersFields = [])
    {
        return new PurchaseOrders($this->fakePurchaseOrdersData($purchaseOrdersFields));
    }

    /**
     * Get fake data of PurchaseOrders
     *
     * @param array $postFields
     * @return array
     */
    public function fakePurchaseOrdersData($purchaseOrdersFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'pembeli_id' => $fake->randomDigitNotNull
        ], $purchaseOrdersFields);
    }
}
