<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePembeliAPIRequest;
use App\Http\Requests\API\UpdatePembeliAPIRequest;
use App\Models\Pembeli;
use App\Repositories\PembeliRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PembeliController
 * @package App\Http\Controllers\API
 */

class PembeliAPIController extends AppBaseController
{
    /** @var  PembeliRepository */
    private $pembeliRepository;

    public function __construct(PembeliRepository $pembeliRepo)
    {
        $this->pembeliRepository = $pembeliRepo;
    }

    /**
     * Display a listing of the Pembeli.
     * GET|HEAD /pembelis
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pembeliRepository->pushCriteria(new RequestCriteria($request));
        $this->pembeliRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pembelis = $this->pembeliRepository->all();

        return $this->sendResponse($pembelis->toArray(), 'Pembelis retrieved successfully');
    }

    /**
     * Store a newly created Pembeli in storage.
     * POST /pembelis
     *
     * @param CreatePembeliAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePembeliAPIRequest $request)
    {
        $input = $request->all();

        $pembelis = $this->pembeliRepository->create($input);

        return $this->sendResponse($pembelis->toArray(), 'Pembeli saved successfully');
    }

    /**
     * Display the specified Pembeli.
     * GET|HEAD /pembelis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pembeli $pembeli */
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            return $this->sendError('Pembeli not found');
        }

        return $this->sendResponse($pembeli->toArray(), 'Pembeli retrieved successfully');
    }

    /**
     * Update the specified Pembeli in storage.
     * PUT/PATCH /pembelis/{id}
     *
     * @param  int $id
     * @param UpdatePembeliAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembeliAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pembeli $pembeli */
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            return $this->sendError('Pembeli not found');
        }

        $pembeli = $this->pembeliRepository->update($input, $id);

        return $this->sendResponse($pembeli->toArray(), 'Pembeli updated successfully');
    }

    /**
     * Remove the specified Pembeli from storage.
     * DELETE /pembelis/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pembeli $pembeli */
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            return $this->sendError('Pembeli not found');
        }

        $pembeli->delete();

        return $this->sendResponse($id, 'Pembeli deleted successfully');
    }
}
