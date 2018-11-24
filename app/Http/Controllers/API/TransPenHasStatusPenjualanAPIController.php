<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransPenHasStatusPenjualanAPIRequest;
use App\Http\Requests\API\UpdateTransPenHasStatusPenjualanAPIRequest;
use App\Models\TransPenHasStatusPenjualan;
use App\Repositories\TransPenHasStatusPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransPenHasStatusPenjualanController
 * @package App\Http\Controllers\API
 */

class TransPenHasStatusPenjualanAPIController extends AppBaseController
{
    /** @var  TransPenHasStatusPenjualanRepository */
    private $transPenHasStatusPenjualanRepository;

    public function __construct(TransPenHasStatusPenjualanRepository $transPenHasStatusPenjualanRepo)
    {
        $this->transPenHasStatusPenjualanRepository = $transPenHasStatusPenjualanRepo;
    }

    /**
     * Display a listing of the TransPenHasStatusPenjualan.
     * GET|HEAD /transPenHasStatusPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transPenHasStatusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->transPenHasStatusPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transPenHasStatusPenjualans = $this->transPenHasStatusPenjualanRepository->all();

        return $this->sendResponse($transPenHasStatusPenjualans->toArray(), 'Trans Pen Has Status Penjualans retrieved successfully');
    }

    /**
     * Store a newly created TransPenHasStatusPenjualan in storage.
     * POST /transPenHasStatusPenjualans
     *
     * @param CreateTransPenHasStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransPenHasStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $transPenHasStatusPenjualans = $this->transPenHasStatusPenjualanRepository->create($input);

        return $this->sendResponse($transPenHasStatusPenjualans->toArray(), 'Trans Pen Has Status Penjualan saved successfully');
    }

    /**
     * Display the specified TransPenHasStatusPenjualan.
     * GET|HEAD /transPenHasStatusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransPenHasStatusPenjualan $transPenHasStatusPenjualan */
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            return $this->sendError('Trans Pen Has Status Penjualan not found');
        }

        return $this->sendResponse($transPenHasStatusPenjualan->toArray(), 'Trans Pen Has Status Penjualan retrieved successfully');
    }

    /**
     * Update the specified TransPenHasStatusPenjualan in storage.
     * PUT/PATCH /transPenHasStatusPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateTransPenHasStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransPenHasStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransPenHasStatusPenjualan $transPenHasStatusPenjualan */
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            return $this->sendError('Trans Pen Has Status Penjualan not found');
        }

        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->update($input, $id);

        return $this->sendResponse($transPenHasStatusPenjualan->toArray(), 'TransPenHasStatusPenjualan updated successfully');
    }

    /**
     * Remove the specified TransPenHasStatusPenjualan from storage.
     * DELETE /transPenHasStatusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransPenHasStatusPenjualan $transPenHasStatusPenjualan */
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            return $this->sendError('Trans Pen Has Status Penjualan not found');
        }

        $transPenHasStatusPenjualan->delete();

        return $this->sendResponse($id, 'Trans Pen Has Status Penjualan deleted successfully');
    }
}
