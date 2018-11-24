<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailPurchaseOrdersAPIRequest;
use App\Http\Requests\API\UpdateDetailPurchaseOrdersAPIRequest;
use App\Models\DetailPurchaseOrders;
use App\Repositories\DetailPurchaseOrdersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetailPurchaseOrdersController
 * @package App\Http\Controllers\API
 */

class DetailPurchaseOrdersAPIController extends AppBaseController
{
    /** @var  DetailPurchaseOrdersRepository */
    private $detailPurchaseOrdersRepository;

    public function __construct(DetailPurchaseOrdersRepository $detailPurchaseOrdersRepo)
    {
        $this->detailPurchaseOrdersRepository = $detailPurchaseOrdersRepo;
    }

    /**
     * Display a listing of the DetailPurchaseOrders.
     * GET|HEAD /detailPurchaseOrders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPurchaseOrdersRepository->pushCriteria(new RequestCriteria($request));
        $this->detailPurchaseOrdersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detailPurchaseOrders = $this->detailPurchaseOrdersRepository->all();

        return $this->sendResponse($detailPurchaseOrders->toArray(), 'Detail Purchase Orders retrieved successfully');
    }

    /**
     * Store a newly created DetailPurchaseOrders in storage.
     * POST /detailPurchaseOrders
     *
     * @param CreateDetailPurchaseOrdersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPurchaseOrdersAPIRequest $request)
    {
        $input = $request->all();

        $detailPurchaseOrders = $this->detailPurchaseOrdersRepository->create($input);

        return $this->sendResponse($detailPurchaseOrders->toArray(), 'Detail Purchase Orders saved successfully');
    }

    /**
     * Display the specified DetailPurchaseOrders.
     * GET|HEAD /detailPurchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetailPurchaseOrders $detailPurchaseOrders */
        $detailPurchaseOrders = $this->detailPurchaseOrdersRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrders)) {
            return $this->sendError('Detail Purchase Orders not found');
        }

        return $this->sendResponse($detailPurchaseOrders->toArray(), 'Detail Purchase Orders retrieved successfully');
    }

    /**
     * Update the specified DetailPurchaseOrders in storage.
     * PUT/PATCH /detailPurchaseOrders/{id}
     *
     * @param  int $id
     * @param UpdateDetailPurchaseOrdersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPurchaseOrdersAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailPurchaseOrders $detailPurchaseOrders */
        $detailPurchaseOrders = $this->detailPurchaseOrdersRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrders)) {
            return $this->sendError('Detail Purchase Orders not found');
        }

        $detailPurchaseOrders = $this->detailPurchaseOrdersRepository->update($input, $id);

        return $this->sendResponse($detailPurchaseOrders->toArray(), 'DetailPurchaseOrders updated successfully');
    }

    /**
     * Remove the specified DetailPurchaseOrders from storage.
     * DELETE /detailPurchaseOrders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DetailPurchaseOrders $detailPurchaseOrders */
        $detailPurchaseOrders = $this->detailPurchaseOrdersRepository->findWithoutFail($id);

        if (empty($detailPurchaseOrders)) {
            return $this->sendError('Detail Purchase Orders not found');
        }

        $detailPurchaseOrders->delete();

        return $this->sendResponse($id, 'Detail Purchase Orders deleted successfully');
    }
}
