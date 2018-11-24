<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransaksiPenjualanAPIRequest;
use App\Http\Requests\API\UpdateTransaksiPenjualanAPIRequest;
use App\Models\TransaksiPenjualan;
use App\Repositories\TransaksiPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TransaksiPenjualanController
 * @package App\Http\Controllers\API
 */

class TransaksiPenjualanAPIController extends AppBaseController
{
    /** @var  TransaksiPenjualanRepository */
    private $transaksiPenjualanRepository;

    public function __construct(TransaksiPenjualanRepository $transaksiPenjualanRepo)
    {
        $this->transaksiPenjualanRepository = $transaksiPenjualanRepo;
    }

    /**
     * Display a listing of the TransaksiPenjualan.
     * GET|HEAD /transaksiPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transaksiPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->transaksiPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $transaksiPenjualans = $this->transaksiPenjualanRepository->all();

        return $this->sendResponse($transaksiPenjualans->toArray(), 'Transaksi Penjualans retrieved successfully');
    }

    /**
     * Store a newly created TransaksiPenjualan in storage.
     * POST /transaksiPenjualans
     *
     * @param CreateTransaksiPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $transaksiPenjualans = $this->transaksiPenjualanRepository->create($input);

        return $this->sendResponse($transaksiPenjualans->toArray(), 'Transaksi Penjualan saved successfully');
    }

    /**
     * Display the specified TransaksiPenjualan.
     * GET|HEAD /transaksiPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TransaksiPenjualan $transaksiPenjualan */
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            return $this->sendError('Transaksi Penjualan not found');
        }

        return $this->sendResponse($transaksiPenjualan->toArray(), 'Transaksi Penjualan retrieved successfully');
    }

    /**
     * Update the specified TransaksiPenjualan in storage.
     * PUT/PATCH /transaksiPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateTransaksiPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var TransaksiPenjualan $transaksiPenjualan */
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            return $this->sendError('Transaksi Penjualan not found');
        }

        $transaksiPenjualan = $this->transaksiPenjualanRepository->update($input, $id);

        return $this->sendResponse($transaksiPenjualan->toArray(), 'TransaksiPenjualan updated successfully');
    }

    /**
     * Remove the specified TransaksiPenjualan from storage.
     * DELETE /transaksiPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TransaksiPenjualan $transaksiPenjualan */
        $transaksiPenjualan = $this->transaksiPenjualanRepository->findWithoutFail($id);

        if (empty($transaksiPenjualan)) {
            return $this->sendError('Transaksi Penjualan not found');
        }

        $transaksiPenjualan->delete();

        return $this->sendResponse($id, 'Transaksi Penjualan deleted successfully');
    }
}
