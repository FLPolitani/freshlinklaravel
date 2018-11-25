<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateStatusPenjualanAPIRequest;
use App\Http\Requests\API\UpdateStatusPenjualanAPIRequest;
use App\Models\StatusPenjualan;
use App\Repositories\StatusPenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class StatusPenjualanController
 * @package App\Http\Controllers\API
 */

class StatusPenjualanAPIController extends AppBaseController
{
    /** @var  StatusPenjualanRepository */
    private $statusPenjualanRepository;

    public function __construct(StatusPenjualanRepository $statusPenjualanRepo)
    {
        $this->statusPenjualanRepository = $statusPenjualanRepo;
    }

    /**
     * Display a listing of the StatusPenjualan.
     * GET|HEAD /statusPenjualans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->statusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $this->statusPenjualanRepository->pushCriteria(new LimitOffsetCriteria($request));
        $statusPenjualans = $this->statusPenjualanRepository->all();

        return $this->sendResponse($statusPenjualans->toArray(), 'Status Penjualans retrieved successfully');
    }

    /**
     * Store a newly created StatusPenjualan in storage.
     * POST /statusPenjualans
     *
     * @param CreateStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        $statusPenjualans = $this->statusPenjualanRepository->create($input);

        return $this->sendResponse($statusPenjualans->toArray(), 'Status Penjualan saved successfully');
    }

    /**
     * Display the specified StatusPenjualan.
     * GET|HEAD /statusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var StatusPenjualan $statusPenjualan */
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            return $this->sendError('Status Penjualan not found');
        }

        return $this->sendResponse($statusPenjualan->toArray(), 'Status Penjualan retrieved successfully');
    }

    /**
     * Update the specified StatusPenjualan in storage.
     * PUT/PATCH /statusPenjualans/{id}
     *
     * @param  int $id
     * @param UpdateStatusPenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStatusPenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var StatusPenjualan $statusPenjualan */
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            return $this->sendError('Status Penjualan not found');
        }

        $statusPenjualan = $this->statusPenjualanRepository->update($input, $id);

        return $this->sendResponse($statusPenjualan->toArray(), 'StatusPenjualan updated successfully');
    }

    /**
     * Remove the specified StatusPenjualan from storage.
     * DELETE /statusPenjualans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var StatusPenjualan $statusPenjualan */
        $statusPenjualan = $this->statusPenjualanRepository->findWithoutFail($id);

        if (empty($statusPenjualan)) {
            return $this->sendError('Status Penjualan not found');
        }

        $statusPenjualan->delete();

        return $this->sendResponse($id, 'Status Penjualan deleted successfully');
    }
}
