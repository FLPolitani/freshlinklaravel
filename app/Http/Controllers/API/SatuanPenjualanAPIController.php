<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSatuanPenjualanAPIRequest;
use App\Http\Requests\API\UpdateSatuanPenjualanAPIRequest;
use App\Models\SatuanPenjualan;
use App\Repositories\SatuanPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SatuanPenjualanController
 * @package App\Http\Controllers\API
 */

class SatuanPenjualanAPIController extends AppBaseController
{
    /** @var  SatuanPenjualanRepository */
    private $satuanPenjualanRepository;

    public function __construct(SatuanPenjualanRepository $satuanPenjualanRepo)
    {
        $this->satuanPenjualanRepository = $satuanPenjualanRepo;
    }

    /**
     * Display a listing of the SatuanPenjualan.
     * GET|HEAD /satuanPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->satuanPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->satuanPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $satuanPenjualans = $this->satuanPenjualanRepository->all();

        return $this->sendResponse($satuanPenjualans->toArray(), 'Satuan Penjualans retrieved successfully');
    }

    /**
     * Store a newly created SatuanPenjualan in storage.
     * POST /satuanPenjualans
     *
     * @param CreateSatuanPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSatuanPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $satuanPenjualans = $this->satuanPenjualanRepository->create($input);

        return $this->sendResponse($satuanPenjualans->toArray(), 'Satuan Penjualan saved successfully');
    }

    /**
     * Display the specified SatuanPenjualan.
     * GET|HEAD /satuanPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SatuanPenjualan $satuanPenjualan */
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            return $this->sendError('Satuan Penjualan not found');
        }

        return $this->sendResponse($satuanPenjualan->toArray(), 'Satuan Penjualan retrieved successfully');
    }

    /**
     * Update the specified SatuanPenjualan in storage.
     * PUT/PATCH /satuanPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateSatuanPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSatuanPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var SatuanPenjualan $satuanPenjualan */
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            return $this->sendError('Satuan Penjualan not found');
        }

        $satuanPenjualan = $this->satuanPenjualanRepository->update($input, $id);

        return $this->sendResponse($satuanPenjualan->toArray(), 'SatuanPenjualan updated successfully');
    }

    /**
     * Remove the specified SatuanPenjualan from storage.
     * DELETE /satuanPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SatuanPenjualan $satuanPenjualan */
        $satuanPenjualan = $this->satuanPenjualanRepository->findWithoutFail($id);

        if (empty($satuanPenjualan)) {
            return $this->sendError('Satuan Penjualan not found');
        }

        $satuanPenjualan->delete();

        return $this->sendResponse($id, 'Satuan Penjualan deleted successfully');
    }
}
