<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePurchaseOrdersAPIRequest;
use App\Http\Requests\API\UpdatePurchaseOrdersAPIRequest;
use App\Models\PurchaseOrders;
use App\Repositories\PurchaseOrdersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PurchaseOrdersController
 * @package App\Http\Controllers\API
 */

class PurchaseOrdersAPIController extends AppBaseController
{
    /** @var  PurchaseOrdersRepository */
    private $purchaseOrdersRepository;

    public function __construct(PurchaseOrdersRepository $purchaseOrdersRepo)
    {
        $this->purchaseOrdersRepository = $purchaseOrdersRepo;
    }

    /**
     * Display a listing of the PurchaseOrders.
     * GET|HEAD /purchaseOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchaseOrdersRepository->pushCriteria(new RequestCriteria($request));
        $this->purchaseOrdersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $purchaseOrders = $this->purchaseOrdersRepository->all();

        return $this->sendResponse($purchaseOrders->toArray(), 'Purchase Orders retrieved successfully');
    }

    /**
     * Store a newly created PurchaseOrders in storage.
     * POST /purchaseOrders
     *
     * @param CreatePurchaseOrdersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrdersAPIRequest $request)
    {
        $input = $request->all();

        $purchaseOrders = $this->purchaseOrdersRepository->create($input);

        return $this->sendResponse($purchaseOrders->toArray(), 'Purchase Orders saved successfully');
    }

    /**
     * Display the specified PurchaseOrders.
     * GET|HEAD /purchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PurchaseOrders $purchaseOrders */
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            return $this->sendError('Purchase Orders not found');
        }

        return $this->sendResponse($purchaseOrders->toArray(), 'Purchase Orders retrieved successfully');
    }

    /**
     * Update the specified PurchaseOrders in storage.
     * PUT/PATCH /purchaseOrders/{id}
     *
     * @param  int $id
     * @param UpdatePurchaseOrdersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrdersAPIRequest $request)
    {
        $input = $request->all();

        /** @var PurchaseOrders $purchaseOrders */
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            return $this->sendError('Purchase Orders not found');
        }

        $purchaseOrders = $this->purchaseOrdersRepository->update($input, $id);

        return $this->sendResponse($purchaseOrders->toArray(), 'PurchaseOrders updated successfully');
    }

    /**
     * Remove the specified PurchaseOrders from storage.
     * DELETE /purchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PurchaseOrders $purchaseOrders */
        $purchaseOrders = $this->purchaseOrdersRepository->findWithoutFail($id);

        if (empty($purchaseOrders)) {
            return $this->sendError('Purchase Orders not found');
        }

        $purchaseOrders->delete();

        return $this->sendResponse($id, 'Purchase Orders deleted successfully');
    }
}
