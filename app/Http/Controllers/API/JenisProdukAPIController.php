<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJenisProdukAPIRequest;
use App\Http\Requests\API\UpdateJenisProdukAPIRequest;
use App\Models\JenisProduk;
use App\Repositories\JenisProdukRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JenisProdukController
 * @package App\Http\Controllers\API
 */

class JenisProdukAPIController extends AppBaseController
{
    /** @var  JenisProdukRepository */
    private $jenisProdukRepository;

    public function __construct(JenisProdukRepository $jenisProdukRepo)
    {
        $this->jenisProdukRepository = $jenisProdukRepo;
    }

    /**
     * Display a listing of the JenisProduk.
     * GET|HEAD /jenisProduks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jenisProdukRepository->pushCriteria(new RequestCriteria($request));
        $this->jenisProdukRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jenisProduks = $this->jenisProdukRepository->all();

        return $this->sendResponse($jenisProduks->toArray(), 'Jenis Produks retrieved successfully');
    }

    /**
     * Store a newly created JenisProduk in storage.
     * POST /jenisProduks
     *
     * @param CreateJenisProdukAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisProdukAPIRequest $request)
    {
        $input = $request->all();

        $jenisProduks = $this->jenisProdukRepository->create($input);

        return $this->sendResponse($jenisProduks->toArray(), 'Jenis Produk saved successfully');
    }

    /**
     * Display the specified JenisProduk.
     * GET|HEAD /jenisProduks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var JenisProduk $jenisProduk */
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            return $this->sendError('Jenis Produk not found');
        }

        return $this->sendResponse($jenisProduk->toArray(), 'Jenis Produk retrieved successfully');
    }

    /**
     * Update the specified JenisProduk in storage.
     * PUT/PATCH /jenisProduks/{id}
     *
     * @param  int $id
     * @param UpdateJenisProdukAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisProdukAPIRequest $request)
    {
        $input = $request->all();

        /** @var JenisProduk $jenisProduk */
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            return $this->sendError('Jenis Produk not found');
        }

        $jenisProduk = $this->jenisProdukRepository->update($input, $id);

        return $this->sendResponse($jenisProduk->toArray(), 'JenisProduk updated successfully');
    }

    /**
     * Remove the specified JenisProduk from storage.
     * DELETE /jenisProduks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var JenisProduk $jenisProduk */
        $jenisProduk = $this->jenisProdukRepository->findWithoutFail($id);

        if (empty($jenisProduk)) {
            return $this->sendError('Jenis Produk not found');
        }

        $jenisProduk->delete();

        return $this->sendResponse($id, 'Jenis Produk deleted successfully');
    }
}
