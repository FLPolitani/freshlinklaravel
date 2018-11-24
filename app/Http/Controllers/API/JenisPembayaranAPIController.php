<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJenisPembayaranAPIRequest;
use App\Http\Requests\API\UpdateJenisPembayaranAPIRequest;
use App\Models\JenisPembayaran;
use App\Repositories\JenisPembayaranRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JenisPembayaranController
 * @package App\Http\Controllers\API
 */

class JenisPembayaranAPIController extends AppBaseController
{
    /** @var  JenisPembayaranRepository */
    private $jenisPembayaranRepository;

    public function __construct(JenisPembayaranRepository $jenisPembayaranRepo)
    {
        $this->jenisPembayaranRepository = $jenisPembayaranRepo;
    }

    /**
     * Display a listing of the JenisPembayaran.
     * GET|HEAD /jenisPembayarans
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisPembayaranRepository->pushCriteria(new RequestCriteria($request));
        $this->jenisPembayaranRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jenisPembayarans = $this->jenisPembayaranRepository->all();

        return $this->sendResponse($jenisPembayarans->toArray(), 'Jenis Pembayarans retrieved successfully');
    }

    /**
     * Store a newly created JenisPembayaran in storage.
     * POST /jenisPembayarans
     *
     * @param CreateJenisPembayaranAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisPembayaranAPIRequest $request)
    {
        $input = $request->all();

        $jenisPembayarans = $this->jenisPembayaranRepository->create($input);

        return $this->sendResponse($jenisPembayarans->toArray(), 'Jenis Pembayaran saved successfully');
    }

    /**
     * Display the specified JenisPembayaran.
     * GET|HEAD /jenisPembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var JenisPembayaran $jenisPembayaran */
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            return $this->sendError('Jenis Pembayaran not found');
        }

        return $this->sendResponse($jenisPembayaran->toArray(), 'Jenis Pembayaran retrieved successfully');
    }

    /**
     * Update the specified JenisPembayaran in storage.
     * PUT/PATCH /jenisPembayarans/{id}
     *
     * @param  int $id
     * @param UpdateJenisPembayaranAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisPembayaranAPIRequest $request)
    {
        $input = $request->all();

        /** @var JenisPembayaran $jenisPembayaran */
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            return $this->sendError('Jenis Pembayaran not found');
        }

        $jenisPembayaran = $this->jenisPembayaranRepository->update($input, $id);

        return $this->sendResponse($jenisPembayaran->toArray(), 'JenisPembayaran updated successfully');
    }

    /**
     * Remove the specified JenisPembayaran from storage.
     * DELETE /jenisPembayarans/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var JenisPembayaran $jenisPembayaran */
        $jenisPembayaran = $this->jenisPembayaranRepository->findWithoutFail($id);

        if (empty($jenisPembayaran)) {
            return $this->sendError('Jenis Pembayaran not found');
        }

        $jenisPembayaran->delete();

        return $this->sendResponse($id, 'Jenis Pembayaran deleted successfully');
    }
}
