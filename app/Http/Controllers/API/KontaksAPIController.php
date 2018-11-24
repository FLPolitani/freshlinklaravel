<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKontaksAPIRequest;
use App\Http\Requests\API\UpdateKontaksAPIRequest;
use App\Models\Kontaks;
use App\Repositories\KontaksRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class KontaksController
 * @package App\Http\Controllers\API
 */

class KontaksAPIController extends AppBaseController
{
    /** @var  KontaksRepository */
    private $kontaksRepository;

    public function __construct(KontaksRepository $kontaksRepo)
    {
        $this->kontaksRepository = $kontaksRepo;
    }

    /**
     * Display a listing of the Kontaks.
     * GET|HEAD /kontaks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kontaksRepository->pushCriteria(new RequestCriteria($request));
        $this->kontaksRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kontaks = $this->kontaksRepository->all();

        return $this->sendResponse($kontaks->toArray(), 'Kontaks retrieved successfully');
    }

    /**
     * Store a newly created Kontaks in storage.
     * POST /kontaks
     *
     * @param CreateKontaksAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKontaksAPIRequest $request)
    {
        $input = $request->all();

        $kontaks = $this->kontaksRepository->create($input);

        return $this->sendResponse($kontaks->toArray(), 'Kontaks saved successfully');
    }

    /**
     * Display the specified Kontaks.
     * GET|HEAD /kontaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kontaks $kontaks */
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            return $this->sendError('Kontaks not found');
        }

        return $this->sendResponse($kontaks->toArray(), 'Kontaks retrieved successfully');
    }

    /**
     * Update the specified Kontaks in storage.
     * PUT/PATCH /kontaks/{id}
     *
     * @param  int $id
     * @param UpdateKontaksAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKontaksAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kontaks $kontaks */
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            return $this->sendError('Kontaks not found');
        }

        $kontaks = $this->kontaksRepository->update($input, $id);

        return $this->sendResponse($kontaks->toArray(), 'Kontaks updated successfully');
    }

    /**
     * Remove the specified Kontaks from storage.
     * DELETE /kontaks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kontaks $kontaks */
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            return $this->sendError('Kontaks not found');
        }

        $kontaks->delete();

        return $this->sendResponse($id, 'Kontaks deleted successfully');
    }
}
