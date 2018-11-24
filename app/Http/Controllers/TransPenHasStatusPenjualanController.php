<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransPenHasStatusPenjualanRequest;
use App\Http\Requests\UpdateTransPenHasStatusPenjualanRequest;
use App\Repositories\TransPenHasStatusPenjualanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransPenHasStatusPenjualanController extends AppBaseController
{
    /** @var  TransPenHasStatusPenjualanRepository */
    private $transPenHasStatusPenjualanRepository;

    public function __construct(TransPenHasStatusPenjualanRepository $transPenHasStatusPenjualanRepo)
    {
        $this->transPenHasStatusPenjualanRepository = $transPenHasStatusPenjualanRepo;
    }

    /**
     * Display a listing of the TransPenHasStatusPenjualan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transPenHasStatusPenjualanRepository->pushCriteria(new RequestCriteria($request));
        $transPenHasStatusPenjualans = $this->transPenHasStatusPenjualanRepository->all();

        return view('trans_pen_has_status_penjualans.index')
            ->with('transPenHasStatusPenjualans', $transPenHasStatusPenjualans);
    }

    /**
     * Show the form for creating a new TransPenHasStatusPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('trans_pen_has_status_penjualans.create');
    }

    /**
     * Store a newly created TransPenHasStatusPenjualan in storage.
     *
     * @param CreateTransPenHasStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateTransPenHasStatusPenjualanRequest $request)
    {
        $input = $request->all();

        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->create($input);

        Flash::success('Trans Pen Has Status Penjualan saved successfully.');

        return redirect(route('transPenHasStatusPenjualans.index'));
    }

    /**
     * Display the specified TransPenHasStatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            Flash::error('Trans Pen Has Status Penjualan not found');

            return redirect(route('transPenHasStatusPenjualans.index'));
        }

        return view('trans_pen_has_status_penjualans.show')->with('transPenHasStatusPenjualan', $transPenHasStatusPenjualan);
    }

    /**
     * Show the form for editing the specified TransPenHasStatusPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            Flash::error('Trans Pen Has Status Penjualan not found');

            return redirect(route('transPenHasStatusPenjualans.index'));
        }

        return view('trans_pen_has_status_penjualans.edit')->with('transPenHasStatusPenjualan', $transPenHasStatusPenjualan);
    }

    /**
     * Update the specified TransPenHasStatusPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateTransPenHasStatusPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransPenHasStatusPenjualanRequest $request)
    {
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            Flash::error('Trans Pen Has Status Penjualan not found');

            return redirect(route('transPenHasStatusPenjualans.index'));
        }

        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->update($request->all(), $id);

        Flash::success('Trans Pen Has Status Penjualan updated successfully.');

        return redirect(route('transPenHasStatusPenjualans.index'));
    }

    /**
     * Remove the specified TransPenHasStatusPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transPenHasStatusPenjualan = $this->transPenHasStatusPenjualanRepository->findWithoutFail($id);

        if (empty($transPenHasStatusPenjualan)) {
            Flash::error('Trans Pen Has Status Penjualan not found');

            return redirect(route('transPenHasStatusPenjualans.index'));
        }

        $this->transPenHasStatusPenjualanRepository->delete($id);

        Flash::success('Trans Pen Has Status Penjualan deleted successfully.');

        return redirect(route('transPenHasStatusPenjualans.index'));
    }
}
