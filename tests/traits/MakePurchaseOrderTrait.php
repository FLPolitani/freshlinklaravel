<?php

use Faker\Factory as Faker;
use App\Models\PurchaseOrder;
use App\Repositories\PurchaseOrderRepository;

trait MakePurchaseOrderTrait
{
    /**
     * Create fake instance of PurchaseOrder and save it in database
     *
     * @param array $purchaseOrderFields
     * @return PurchaseOrder
     */
    public function makePurchaseOrder($purchaseOrderFields = [])
    {
        /** @var PurchaseOrderRepository $purchaseOrderRepo */
        $purchaseOrderRepo = App::make(PurchaseOrderRepository::class);
        $theme = $this->fakePurchaseOrderData($purchaseOrderFields);
        return $purchaseOrderRepo->create($theme);
    }

    /**
     * Get fake instance of PurchaseOrder
     *
     * @param array $purchaseOrderFields
     * @return PurchaseOrder
     */
    public function fakePurchaseOrder($purchaseOrderFields = [])
    {
        return new PurchaseOrder($this->fakePurchaseOrderData($purchaseOrderFields));
    }

    /**
     * Get fake data of PurchaseOrder
     *
     * @param array $postFields
     * @return array
     */
    public function fakePurchaseOrderData($purchaseOrderFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s'),
            'pembeli_id' => $fake->randomDigitNotNull
        ], $purchaseOrderFields);
    }
}
