<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSatuanRequest;
use App\Http\Requests\UpdateSatuanRequest;
use App\Repositories\SatuanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SatuanController extends AppBaseController
{
    /** @var  SatuanRepository */
    private $satuanRepository;

    public function __construct(SatuanRepository $satuanRepo)
    {
        $this->satuanRepository = $satuanRepo;
    }

    /**
     * Display a listing of the Satuan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->satuanRepository->pushCriteria(new RequestCriteria($request));
        $satuans = $this->satuanRepository->all();

        return view('satuans.index')
            ->with('satuans', $satuans);
    }

    /**
     * Show the form for creating a new Satuan.
     *
     * @return Response
     */
    public function create()
    {
        return view('satuans.create');
    }

    /**
     * Store a newly created Satuan in storage.
     *
     * @param CreateSatuanRequest $request
     *
     * @return Response
     */
    public function store(CreateSatuanRequest $request)
    {
        $input = $request->all();

        $satuan = $this->satuanRepository->create($input);

        Flash::success('Satuan saved successfully.');

        return redirect(route('satuans.index'));
    }

    /**
     * Display the specified Satuan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        return view('satuans.show')->with('satuan', $satuan);
    }

    /**
     * Show the form for editing the specified Satuan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        return view('satuans.edit')->with('satuan', $satuan);
    }

    /**
     * Update the specified Satuan in storage.
     *
     * @param  int              $id
     * @param UpdateSatuanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSatuanRequest $request)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        $satuan = $this->satuanRepository->update($request->all(), $id);

        Flash::success('Satuan updated successfully.');

        return redirect(route('satuans.index'));
    }

    /**
     * Remove the specified Satuan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $satuan = $this->satuanRepository->findWithoutFail($id);

        if (empty($satuan)) {
            Flash::error('Satuan not found');

            return redirect(route('satuans.index'));
        }

        $this->satuanRepository->delete($id);

        Flash::success('Satuan deleted successfully.');

        return redirect(route('satuans.index'));
    }
}
