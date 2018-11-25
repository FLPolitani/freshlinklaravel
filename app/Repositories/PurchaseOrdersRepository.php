<?php

namespace App\Repositories;

use App\Models\PurchaseOrders;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PurchaseOrdersRepository
 * @package App\Repositories
 * @version May 29, 2018, 7:17 am UTC
 *
 * @method PurchaseOrders findWithoutFail($id, $columns = ['*'])
 * @method PurchaseOrders find($id, $columns = ['*'])
 * @method PurchaseOrders first($columns = ['*'])
*/
class PurchaseOrdersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pembeli_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PurchaseOrders::class;
    }
}
