<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransPenHasJenPembayaranRequest;
use App\Http\Requests\UpdateTransPenHasJenPembayaranRequest;
use App\Repositories\TransPenHasJenPembayaranRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TransPenHasJenPembayaranController extends AppBaseController
{
    /** @var  TransPenHasJenPembayaranRepository */
    private $transPenHasJenPembayaranRepository;

    public function __construct(TransPenHasJenPembayaranRepository $transPenHasJenPembayaranRepo)
    {
        $this->transPenHasJenPembayaranRepository = $transPenHasJenPembayaranRepo;
    }

    /**
     * Display a listing of the TransPenHasJenPembayaran.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->transPenHasJenPembayaranRepository->pushCriteria(new RequestCriteria($request));
        $transPenHasJenPembayarans = $this->transPenHasJenPembayaranRepository->all();

        return view('trans_pen_has_jen_pembayarans.index')
            ->with('transPenHasJenPembayarans', $transPenHasJenPembayarans);
    }

    /**
     * Show the form for creating a new TransPenHasJenPembayaran.
     *
     * @return Response
     */
    public function create()
    {
        return view('trans_pen_has_jen_pembayarans.create');
    }

    /**
     * Store a newly created TransPenHasJenPembayaran in storage.
     *
     * @param CreateTransPenHasJenPembayaranRequest $request
     *
     * @return Response
     */
    public function store(CreateTransPenHasJenPembayaranRequest $request)
    {
        $input = $request->all();

        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->create($input);

        Flash::success('Trans Pen Has Jen Pembayaran saved successfully.');

        return redirect(route('transPenHasJenPembayarans.index'));
    }

    /**
     * Display the specified TransPenHasJenPembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            Flash::error('Trans Pen Has Jen Pembayaran not found');

            return redirect(route('transPenHasJenPembayarans.index'));
        }

        return view('trans_pen_has_jen_pembayarans.show')->with('transPenHasJenPembayaran', $transPenHasJenPembayaran);
    }

    /**
     * Show the form for editing the specified TransPenHasJenPembayaran.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            Flash::error('Trans Pen Has Jen Pembayaran not found');

            return redirect(route('transPenHasJenPembayarans.index'));
        }

        return view('trans_pen_has_jen_pembayarans.edit')->with('transPenHasJenPembayaran', $transPenHasJenPembayaran);
    }

    /**
     * Update the specified TransPenHasJenPembayaran in storage.
     *
     * @param  int              $id
     * @param UpdateTransPenHasJenPembayaranRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransPenHasJenPembayaranRequest $request)
    {
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            Flash::error('Trans Pen Has Jen Pembayaran not found');

            return redirect(route('transPenHasJenPembayarans.index'));
        }

        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->update($request->all(), $id);

        Flash::success('Trans Pen Has Jen Pembayaran updated successfully.');

        return redirect(route('transPenHasJenPembayarans.index'));
    }

    /**
     * Remove the specified TransPenHasJenPembayaran from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transPenHasJenPembayaran = $this->transPenHasJenPembayaranRepository->findWithoutFail($id);

        if (empty($transPenHasJenPembayaran)) {
            Flash::error('Trans Pen Has Jen Pembayaran not found');

            return redirect(route('transPenHasJenPembayarans.index'));
        }

        $this->transPenHasJenPembayaranRepository->delete($id);

        Flash::success('Trans Pen Has Jen Pembayaran deleted successfully.');

        return redirect(route('transPenHasJenPembayarans.index'));
    }
}
