<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailPenjualanAPIRequest;
use App\Http\Requests\API\UpdateDetailPenjualanAPIRequest;
use App\Models\DetailPenjualan;
use App\Repositories\DetailPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DetailPenjualanController
 * @package App\Http\Controllers\API
 */

class DetailPenjualanAPIController extends AppBaseController
{
    /** @var  DetailPenjualanRepository */
    private $detailPenjualanRepository;

    public function __construct(DetailPenjualanRepository $detailPenjualanRepo)
    {
        $this->detailPenjualanRepository = $detailPenjualanRepo;
    }

    /**
     * Display a listing of the DetailPenjualan.
     * GET|HEAD /detailPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->detailPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->detailPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $detailPenjualans = $this->detailPenjualanRepository->all();

        return $this->sendResponse($detailPenjualans->toArray(), 'Detail Penjualans retrieved successfully');
    }

    /**
     * Store a newly created DetailPenjualan in storage.
     * POST /detailPenjualans
     *
     * @param CreateDetailPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $detailPenjualans = $this->detailPenjualanRepository->create($input);

        return $this->sendResponse($detailPenjualans->toArray(), 'Detail Penjualan saved successfully');
    }

    /**
     * Display the specified DetailPenjualan.
     * GET|HEAD /detailPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetailPenjualan $detailPenjualan */
        $detailPenjualan = $this->detailPenjualanRepository->findWithoutFail($id);

        if (empty($detailPenjualan)) {
            return $this->sendError('Detail Penjualan not found');
        }

        return $this->sendResponse($detailPenjualan->toArray(), 'Detail Penjualan retrieved successfully');
    }

    /**
     * Update the specified DetailPenjualan in storage.
     * PUT/PATCH /detailPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateDetailPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailPenjualan $detailPenjualan */
        $detailPenjualan = $this->detailPenjualanRepository->findWithoutFail($id);

        if (empty($detailPenjualan)) {
            return $this->sendError('Detail Penjualan not found');
        }

        $detailPenjualan = $this->detailPenjualanRepository->update($input, $id);

        return $this->sendResponse($detailPenjualan->toArray(), 'DetailPenjualan updated successfully');
    }

    /**
     * Remove the specified DetailPenjualan from storage.
     * DELETE /detailPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DetailPenjualan $detailPenjualan */
        $detailPenjualan = $this->detailPenjualanRepository->findWithoutFail($id);

        if (empty($detailPenjualan)) {
            return $this->sendError('Detail Penjualan not found');
        }

        $detailPenjualan->delete();

        return $this->sendResponse($id, 'Detail Penjualan deleted successfully');
    }
}
