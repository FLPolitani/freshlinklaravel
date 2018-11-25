<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTranspenjHasStatusPenjualanRequest;
use App\Http\Requests\UpdateTranspenjHasStatusPenjualanRequest;
use App\Repositories\TranspenjHasStatusPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TranspenjHasStatusPenjualanController extends AppBaseController
{
    /** @var  TranspenjHasStatusPenjualanRepository */
    private $transpenjHasStatusPenjualanRepository;

    public function __construct(TranspenjHasStatusPenjualanRepository $transpenjHasStatusPenjualanRepo)
    {
        $this->transpenjHasStatusPenjualanRepository = $transpenjHasStatusPenjualanRepo;
    }

    /**
     * Display a listing of the TranspenjHasStatusPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transpenjHasStatusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $transpenjHasStatusPenjualans = $this->transpenjHasStatusPenjualanRepository->all();

        return view('transpenj_has_status_penjualans.index')
            ->with('transpenjHasStatusPenjualans', $transpenjHasStatusPenjualans);
    }

    /**
     * Show the form for creating a new TranspenjHasStatusPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('transpenj_has_status_penjualans.create');
    }

    /**
     * Store a newly created TranspenjHasStatusPenjualan in storage.
     *
     * @param CreateTranspenjHasStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateTranspenjHasStatusPenjualanRequest $request)
    {
        $input = $request->all();

        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->create($input);

        Flash::success('Transpenj Has Status Penjualan saved successfully.');

        return redirect(route('transpenjHasStatusPenjualans.index'));
    }

    /**
     * Display the specified TranspenjHasStatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            Flash::error('Transpenj Has Status Penjualan not found');

            return redirect(route('transpenjHasStatusPenjualans.index'));
        }

        return view('transpenj_has_status_penjualans.show')->with('transpenjHasStatusPenjualan', $transpenjHasStatusPenjualan);
    }

    /**
     * Show the form for editing the specified TranspenjHasStatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            Flash::error('Transpenj Has Status Penjualan not found');

            return redirect(route('transpenjHasStatusPenjualans.index'));
        }

        return view('transpenj_has_status_penjualans.edit')->with('transpenjHasStatusPenjualan', $transpenjHasStatusPenjualan);
    }

    /**
     * Update the specified TranspenjHasStatusPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateTranspenjHasStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTranspenjHasStatusPenjualanRequest $request)
    {
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            Flash::error('Transpenj Has Status Penjualan not found');

            return redirect(route('transpenjHasStatusPenjualans.index'));
        }

        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->update($request->all(), $id);

        Flash::success('Transpenj Has Status Penjualan updated successfully.');

        return redirect(route('transpenjHasStatusPenjualans.index'));
    }

    /**
     * Remove the specified TranspenjHasStatusPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transpenjHasStatusPenjualan = $this->transpenjHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transpenjHasStatusPenjualan)) {
            Flash::error('Transpenj Has Status Penjualan not found');

            return redirect(route('transpenjHasStatusPenjualans.index'));
        }

        $this->transpenjHasStatusPenjualanRepository->delete($id);

        Flash::success('Transpenj Has Status Penjualan deleted successfully.');

        return redirect(route('transpenjHasStatusPenjualans.index'));
    }
}
