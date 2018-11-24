<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDataUsahaRequest;
use App\Http\Requests\UpdateDataUsahaRequest;
use App\Repositories\DataUsahaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataUsahaController extends AppBaseController
{
    /** @var  DataUsahaRepository */
    private $dataUsahaRepository;

    public function __construct(DataUsahaRepository $dataUsahaRepo)
    {
        $this->dataUsahaRepository = $dataUsahaRepo;
    }

    /**
     * Display a listing of the DataUsaha.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataUsahaRepository->pushCriteria(new RequestCriteria($request));
        $dataUsahas = $this->dataUsahaRepository->all();

        return view('data_usahas.index')
            ->with('dataUsahas', $dataUsahas);
    }

    /**
     * Show the form for creating a new DataUsaha.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_usahas.create');
    }

    /**
     * Store a newly created DataUsaha in storage.
     *
     * @param CreateDataUsahaRequest $request
     *
     * @return Response
     */
    public function store(CreateDataUsahaRequest $request)
    {
        $input = $request->all();

        $dataUsaha = $this->dataUsahaRepository->create($input);

        Flash::success('Data Usaha saved successfully.');

        return redirect(route('dataUsahas.index'));
    }

    /**
     * Display the specified DataUsaha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            Flash::error('Data Usaha not found');

            return redirect(route('dataUsahas.index'));
        }

        return view('data_usahas.show')->with('dataUsaha', $dataUsaha);
    }

    /**
     * Show the form for editing the specified DataUsaha.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            Flash::error('Data Usaha not found');

            return redirect(route('dataUsahas.index'));
        }

        return view('data_usahas.edit')->with('dataUsaha', $dataUsaha);
    }

    /**
     * Update the specified DataUsaha in storage.
     *
     * @param  int              $id
     * @param UpdateDataUsahaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataUsahaRequest $request)
    {
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            Flash::error('Data Usaha not found');

            return redirect(route('dataUsahas.index'));
        }

        $dataUsaha = $this->dataUsahaRepository->update($request->all(), $id);

        Flash::success('Data Usaha updated successfully.');

        return redirect(route('dataUsahas.index'));
    }

    /**
     * Remove the specified DataUsaha from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataUsaha = $this->dataUsahaRepository->findWithoutFail($id);

        if (empty($dataUsaha)) {
            Flash::error('Data Usaha not found');

            return redirect(route('dataUsahas.index'));
        }

        $this->dataUsahaRepository->delete($id);

        Flash::success('Data Usaha deleted successfully.');

        return redirect(route('dataUsahas.index'));
    }
}
