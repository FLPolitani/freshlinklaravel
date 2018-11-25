<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProdukAPIRequest;
use App\Http\Requests\API\UpdateProdukAPIRequest;
use App\Models\Produk;
use App\Repositories\ProdukRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProdukController
 * @package App\Http\Controllers\API
 */

class ProdukAPIController extends AppBaseController
{
    /** @var  ProdukRepository */
    private $produkRepository;

    public function __construct(ProdukRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
    }

    /**
     * Display a listing of the Produk.
     * GET|HEAD /produks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $produks = Produk::with(['kategori','satuan','jenisProduk'])->get();

        return $this->sendResponse($produks->toArray(), 'Produks retrieved successfully');
    }

    /**
     * Store a newly created Produk in storage.
     * POST /produks
     *
     * @param CreateProdukAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukAPIRequest $request)
    {
        $input = $request->all();

        $produks = $this->produkRepository->create($input);

        return $this->sendResponse($produks->toArray(), 'Produk saved successfully');
    }

    /**
     * Display the specified Produk.
     * GET|HEAD /produks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Produk $produk */
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            return $this->sendError('Produk not found');
        }

        return $this->sendResponse($produk->toArray(), 'Produk retrieved successfully');
    }

    /**
     * Update the specified Produk in storage.
     * PUT/PATCH /produks/{id}
     *
     * @param  int $id
     * @param UpdateProdukAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdukAPIRequest $request)
    {
        $input = $request->all();

        /** @var Produk $produk */
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            return $this->sendError('Produk not found');
        }

        $produk = $this->produkRepository->update($input, $id);

        return $this->sendResponse($produk->toArray(), 'Produk updated successfully');
    }

    /**
     * Remove the specified Produk from storage.
     * DELETE /produks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Produk $produk */
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            return $this->sendError('Produk not found');
        }

        $produk->delete();

        return $this->sendResponse($id, 'Produk deleted successfully');
    }
}
