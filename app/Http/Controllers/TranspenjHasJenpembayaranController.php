<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTranspenjHasJenpembayaranRequest;
use App\Http\Requests\UpdateTranspenjHasJenpembayaranRequest;
use App\Repositories\TranspenjHasJenpembayaranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TranspenjHasJenpembayaranController extends AppBaseController
{
    /** @var  TranspenjHasJenpembayaranRepository */
    private $transpenjHasJenpembayaranRepository;

    public function __construct(TranspenjHasJenpembayaranRepository $transpenjHasJenpembayaranRepo)
    {
        $this->transpenjHasJenpembayaranRepository = $transpenjHasJenpembayaranRepo;
    }

    /**
     * Display a listing of the TranspenjHasJenpembayaran.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transpenjHasJenpembayaranRepository->pushCriteria(new RequestCriteria($request));
        $transpenjHasJenpembayarans = $this->transpenjHasJenpembayaranRepository->all();

        return view('transpenj_has_jenpembayarans.index')
            ->with('transpenjHasJenpembayarans', $transpenjHasJenpembayarans);
    }

    /**
     * Show the form for creating a new TranspenjHasJenpembayaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('transpenj_has_jenpembayarans.create');
    }

    /**
     * Store a newly created TranspenjHasJenpembayaran in storage.
     *
     * @param CreateTranspenjHasJenpembayaranRequest $request
     *
     * @return Response
     */
    public function store(CreateTranspenjHasJenpembayaranRequest $request)
    {
        $input = $request->all();

        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->create($input);

        Flash::success('Transpenj Has Jenpembayaran saved successfully.');

        return redirect(route('transpenjHasJenpembayarans.index'));
    }

    /**
     * Display the specified TranspenjHasJenpembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            Flash::error('Transpenj Has Jenpembayaran not found');

            return redirect(route('transpenjHasJenpembayarans.index'));
        }

        return view('transpenj_has_jenpembayarans.show')->with('transpenjHasJenpembayaran', $transpenjHasJenpembayaran);
    }

    /**
     * Show the form for editing the specified TranspenjHasJenpembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            Flash::error('Transpenj Has Jenpembayaran not found');

            return redirect(route('transpenjHasJenpembayarans.index'));
        }

        return view('transpenj_has_jenpembayarans.edit')->with('transpenjHasJenpembayaran', $transpenjHasJenpembayaran);
    }

    /**
     * Update the specified TranspenjHasJenpembayaran in storage.
     *
     * @param  int              $id
     * @param UpdateTranspenjHasJenpembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranspenjHasJenpembayaranRequest $request)
    {
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            Flash::error('Transpenj Has Jenpembayaran not found');

            return redirect(route('transpenjHasJenpembayarans.index'));
        }

        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->update($request->all(), $id);

        Flash::success('Transpenj Has Jenpembayaran updated successfully.');

        return redirect(route('transpenjHasJenpembayarans.index'));
    }

    /**
     * Remove the specified TranspenjHasJenpembayaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transpenjHasJenpembayaran = $this->transpenjHasJenpembayaranRepository->findWithoutFail($id);

        if (empty($transpenjHasJenpembayaran)) {
            Flash::error('Transpenj Has Jenpembayaran not found');

            return redirect(route('transpenjHasJenpembayarans.index'));
        }

        $this->transpenjHasJenpembayaranRepository->delete($id);

        Flash::success('Transpenj Has Jenpembayaran deleted successfully.');

        return redirect(route('transpenjHasJenpembayarans.index'));
    }
}
